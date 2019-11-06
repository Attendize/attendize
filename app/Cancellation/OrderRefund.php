<?php namespace App\Cancellation;

use App\Models\Attendee;
use App\Models\EventStats;
use Superbalist\Money\Money;
use Log;
use Omnipay;

class OrderRefund
{
    private $order;
    private $attendees;
    private $currency;
    private $organiserAmount;
    private $refundedAmount;
    private $maximumRefundableAmount;
    private $organiserTaxRate;
    private $refundAmount;

    public function __construct($order, $attendees)
    {
        $this->order = $order;
        $this->attendees = $attendees;
        // We need to set the refund starting amounts first
        $this->setRefundAmounts();
        // Then we need to check for a valid refund state before we can continue
        $this->checkValidRefundState();
    }

    public static function make($order, $attendees)
    {
        return new static($order, $attendees);
    }

    public function refund()
    {
        try {
            $response = $this->sendRefundRequest();
        } catch (\Exception $e) {
            throw new OrderRefundException(trans("Controllers.refund_exception"));
        }

        if ($response->isSuccessful()) {
            // New refunded amount needs to be saved on the order
            $updatedRefundedAmount = $this->refundedAmount->add($this->refundAmount);

            // Update the amount refunded on the order
            $this->order->amount_refunded = $updatedRefundedAmount->toFloat();

            if ($this->organiserAmount->subtract($updatedRefundedAmount)->isZero()) {
                $this->order->is_refunded = true;
                // Order can't be both partially and fully refunded at the same time
                $this->order->is_partially_refunded = false;
                $this->order->order_status_id = config('attendize.order_refunded');
            } else {
                $this->order->is_partially_refunded = true;
                $this->order->order_status_id = config('attendize.order_partially_refunded');
            }

            // Persist the order refund updates
            $this->order->save();

            // With the refunds done, we can mark the attendees as cancelled and refunded as well
            $this->attendees->map(function(Attendee $attendee) {
                $attendee->ticket->decrement('quantity_sold');
                $attendee->ticket->decrement('sales_volume', $attendee->ticket->price);
                $attendee->is_refunded = true;
                $attendee->save();

                /** @var EventStats $eventStats */ // TODO move this to the EventStats Model
                $eventStats = EventStats::where('event_id', $attendee->event_id)
                    ->where('date', $attendee->created_at->format('Y-m-d'))->first();
                if ($eventStats) {
                    $eventStats->decrement('tickets_sold',  1);
                    $eventStats->decrement('sales_volume',  $attendee->ticket->price);
                }
            });
        } else {
            throw new OrderRefundException($response->getMessage());
        }
    }

    public function getRefundAmount()
    {
        return $this->refundAmount->format();
    }

    private function sendRefundRequest()
    {
        $gateway = Omnipay::create($this->order->payment_gateway->name);
        $gateway->initialize($this->order->account->getGateway($this->order->payment_gateway->id)->config);

        $request = $gateway->refund([
            'transactionReference' => $this->order->transaction_id,
            'amount' => $this->refundAmount->toFloat(),
            'refundApplicationFee' => floatval($this->order->booking_fee) > 0 ? true : false,
        ]);

        Log::debug(strtoupper($this->order->payment_gateway->name), [
            'transactionReference' => $this->order->transaction_id,
            'amount' => $this->refundAmount->toFloat(),
            'refundApplicationFee' => floatval($this->order->booking_fee) > 0 ? true : false,
        ]);

        return $request->send();
    }

    private function setRefundAmounts()
    {
        $this->currency = $this->order->getEventCurrency();
        // Get the full order amount, tax and booking fees included
        $this->organiserAmount = new Money($this->order->organiser_amount, $this->currency);
        Log::debug(sprintf("Total Order Value: %s", $this->organiserAmount->display()));

        $this->refundedAmount = new Money($this->order->amount_refunded, $this->currency);
        Log::debug(sprintf("Already refunded amount: %s", $this->refundedAmount->display()));

        $this->maximumRefundableAmount = $this->organiserAmount->subtract($this->refundedAmount);
        Log::debug(sprintf("Maxmimum refundable amount: %s", $this->maximumRefundableAmount->display()));

        // We need the organiser tax value to calculate what the attendee would've paid
        $event = $this->order->event;
        $organiserTaxAmount = new Money($event->organiser->tax_value);
        $this->organiserTaxRate = $organiserTaxAmount->divide(100)->__toString();
        Log::debug(sprintf("Organiser Tax Rate: %s", $organiserTaxAmount->format() . '%'));

        // Sets refund total based on attendees, their ticket prices and the organiser tax rate
        $this->setRefundTotal();
    }

    /**
     * Calculates the refund amount from the selected attendees from the ticket price perspective.
     *
     * It will add the tax value from the organiser if it's set and build the refund amount to equal
     * the amount of tickets purchased by the selected attendees. Ex:
     * Refunding 2 attendees @ 100EUR with 15% VAT = 230EUR
     */
    private function setRefundTotal()
    {
        $organiserTaxRate = $this->organiserTaxRate;
        $currency = $this->currency;

        $this->refundAmount = new Money($this->attendees->map(function(Attendee $attendee) use ($organiserTaxRate, $currency) {
            $ticketPrice = new Money($attendee->ticket->price, $currency);
            Log::debug(sprintf("Ticket Price: %s", $ticketPrice->display()));
            Log::debug(sprintf("Ticket Tax: %s", $ticketPrice->multiply($organiserTaxRate)->display()));
            return $ticketPrice->add($ticketPrice->multiply($organiserTaxRate));
        })->reduce(function($carry, $singleTicketWithTax) use ($currency) {
            $refundTotal = (new Money($carry, $currency));
            return $refundTotal->add($singleTicketWithTax)->format();
        }), $currency);

        Log::debug(sprintf("Requested Refund should include Tax: %s", $this->refundAmount->display()));
    }

    private function checkValidRefundState()
    {
        $errorMessage = false;
        if (!$this->order->transaction_id) {
            $errorMessage = trans("Controllers.order_cant_be_refunded");
        }
        if ($this->order->is_refunded) {
            $errorMessage = trans('Controllers.order_already_refunded');
        } elseif ($this->maximumRefundableAmount->isZero()) {
            $errorMessage = trans('Controllers.nothing_to_refund');
        } elseif ($this->refundAmount->isGreaterThan($this->maximumRefundableAmount)) {
            // Error if the partial refund tries to refund more than allowed
            $errorMessage = trans('Controllers.maximum_refund_amount', [
                'money' => $this->maximumRefundableAmount->display(),
            ]);
        }

        if ($errorMessage) {
            throw new OrderRefundException($errorMessage);
        }
    }


    // Takes an order and attendees collection
    // Calculate the refund amounts including tax
    // refund()
}