<?php

namespace App\Models;

use File;
use Illuminate\Database\Eloquent\SoftDeletes;
use PDF;
use Illuminate\Support\Str;

/**
 * App\Models\Order
 *
 * @property mixed email
 * @property mixed order_reference
 * @property string ticket_pdf_path
 * @property Event event
 * @property mixed attendees
 * @property int $id
 * @property int $account_id
 * @property int $order_status_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string|null $ticket_pdf_path
 * @property string $order_reference
 * @property string|null $transaction_id
 * @property float|null $discount
 * @property float|null $booking_fee
 * @property float|null $organiser_booking_fee
 * @property string|null $order_date
 * @property string|null $notes
 * @property int $is_deleted
 * @property int $is_cancelled
 * @property int $is_partially_refunded
 * @property int $is_refunded
 * @property float $amount
 * @property float|null $amount_refunded
 * @property int $event_id
 * @property int|null $payment_gateway_id
 * @property int $is_payment_received
 * @property float $taxamt
 * @property-read \App\Models\Account $account
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Attendee[] $attendees
 * @property-read \App\Models\Event $event
 * @property-read string $full_name
 * @property-read \Illuminate\Support\Collection|mixed|static $organiser_amount
 * @property-read \Illuminate\Support\Collection|mixed|static $total_amount
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderItem[] $orderItems
 * @property-read \App\Models\OrderStatus $orderStatus
 * @property-read \App\Models\PaymentGateway|null $payment_gateway
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Ticket[] $tickets
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Order onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MyBaseModel scope($accountId = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereAmountRefunded($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereBookingFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereIsCancelled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereIsDeleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereIsPartiallyRefunded($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereIsPaymentReceived($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereIsRefunded($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereOrderDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereOrderReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereOrderStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereOrganiserBookingFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order wherePaymentGatewayId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereTaxamt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereTicketPdfPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Order withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Order withoutTrashed()
 * @mixin \Eloquent
 */
class Order extends MyBaseModel
{
    use SoftDeletes;

    /**
     * The validation rules of the model.
     *
     * @var array $rules
     */
    public $rules = [
        'order_first_name' => ['required'],
        'order_last_name'  => ['required'],
        'order_email'      => ['required', 'email'],
    ];

    /**
     * The validation error messages.
     *
     * @var array $messages
     */
    public $messages = [
        'order_first_name.required' => 'Please enter a valid first name',
        'order_last_name.required'  => 'Please enter a valid last name',
        'order_email.email'         => 'Please enter a valid email',
    ];

    protected $casts = [
        'is_business' => 'boolean',
    ];

    /**
     * The items associated with the order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems()
    {
        return $this->hasMany(\App\Models\OrderItem::class);
    }

    /**
     * The attendees associated with the order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attendees()
    {
        return $this->hasMany(\App\Models\Attendee::class);
    }

    /**
     * The account associated with the order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        return $this->belongsTo(\App\Models\Account::class);
    }

    /**
     * The event associated with the order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo(\App\Models\Event::class);
    }

    /**
     * The tickets associated with the order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany(\App\Models\Ticket::class);
    }


    public function payment_gateway()
    {
        return $this->belongsTo(\App\Models\PaymentGateway::class);
    }

    /**
     * The status associated with the order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderStatus()
    {
        return $this->belongsTo(\App\Models\OrderStatus::class);
    }


    /**
     * Get the organizer fee of the order.
     *
     * @return \Illuminate\Support\Collection|mixed|static
     */
    public function getOrganiserAmountAttribute()
    {
        return $this->amount + $this->organiser_booking_fee + $this->taxamt;
    }

    /**
     * Get the total amount of the order.
     *
     * @return \Illuminate\Support\Collection|mixed|static
     */
    public function getTotalAmountAttribute()
    {
        return $this->amount + $this->organiser_booking_fee + $this->booking_fee;
    }

    /**
     * Get the full name of the order.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Generate and save the PDF tickets.
     *
     * @todo Move this from the order model
     *
     * @return bool
     */
    public function generatePdfTickets()
    {
        $data = [
            'order'     => $this,
            'event'     => $this->event,
            'tickets'   => $this->event->tickets,
            'attendees' => $this->attendees,
            'css'       => file_get_contents(public_path('css/ticket.css')),
            'image'     => base64_encode(file_get_contents(public_path($this->event->organiser->full_logo_path))),
        ];

        $pdf_file_path = public_path(config('attendize.event_pdf_tickets_path')) . '/' . $this->order_reference;
        $pdf_file = $pdf_file_path . '.pdf';

        if (file_exists($pdf_file)) {
            return true;
        }

        if (!is_dir($pdf_file_path)) {
            File::makeDirectory(dirname($pdf_file_path), 0777, true, true);
        }

        PDF::loadView('Public.ViewEvent.Partials.PDFTicket', $data)->save($pdf_file_path);

        $this->ticket_pdf_path = config('attendize.event_pdf_tickets_path') . '/' . $this->order_reference . '.pdf';
        $this->save();

        return file_exists($pdf_file);
    }

    /**
     * Boot all of the bootable traits on the model.
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            do {
                    //generate a random string using Laravel's str_random helper
                    $token = Str::Random(5) . date('jn');
            } //check if the token already exists and if it does, try again
            
			while (Order::where('order_reference', $token)->first());
            $order->order_reference = $token;
        
		});
    }
}
