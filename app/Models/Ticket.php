<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

/**
 * App\Models\Ticket
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $edited_by_user_id
 * @property int $account_id
 * @property int|null $order_id
 * @property int $event_id
 * @property string $title
 * @property string $description
 * @property float $price
 * @property int|null $max_per_person
 * @property int|null $min_per_person
 * @property int|null $quantity_available
 * @property int $quantity_sold
 * @property \Illuminate\Support\Carbon|null $start_sale_date
 * @property \Illuminate\Support\Carbon|null $end_sale_date
 * @property float $sales_volume
 * @property float $organiser_fees_volume
 * @property int $is_paused
 * @property int|null $public_id
 * @property int $user_id
 * @property int $sort_order
 * @property int $is_hidden
 * @property-read \App\Models\Event $event
 * @property-read float|int $booking_fee
 * @property-read bool $is_free
 * @property-read float|int $organiser_booking_fee
 * @property-read \Illuminate\Support\Collection|int|mixed|static $quantity_remaining
 * @property-read mixed $quantity_reserved
 * @property-read int $sale_status
 * @property-read array $ticket_max_min_rang
 * @property-read float|int $total_booking_fee
 * @property-read float|int $total_price
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $order
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Question[] $questions
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Ticket onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MyBaseModel scope($accountId = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket soldOut()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereEditedByUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereEndSaleDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereIsHidden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereIsPaused($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereMaxPerPerson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereMinPerPerson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereOrganiserFeesVolume($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket wherePublicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereQuantityAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereQuantitySold($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereSalesVolume($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereStartSaleDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Ticket whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Ticket withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Ticket withoutTrashed()
 * @mixin \Eloquent
 */
class Ticket extends MyBaseModel
{
    use SoftDeletes;

    protected $dates = ['start_sale_date', 'end_sale_date'];

    /**
     * The rules to validate the model.
     *
     * @return array $rules
     */
    public function rules()
    {
        $format = config('attendize.default_datetime_format');
        return [
            'title'              => 'required',
            'price'              => 'required|numeric|min:0',
            'description'        => '',
            'start_sale_date'    => 'date_format:"' . $format . '"',
            'end_sale_date'      => 'date_format:"' . $format . '"|after:start_sale_date',
            'quantity_available' => 'integer|min:' . ($this->quantity_sold + $this->quantity_reserved)
        ];
    }

    /**
     * The validation error messages.
     *
     * @var array $messages
     */
    public $messages = [
        'price.numeric'              => 'The price must be a valid number (e.g 12.50)',
        'title.required'             => 'You must at least give a title for your ticket. (e.g Early Bird)',
        'quantity_available.integer' => 'Please ensure the quantity available is a number.',
    ];
    protected $perPage = 10;

    /**
     * The event associated with the ticket.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo(\App\Models\Event::class);
    }

    /**
     * The order associated with the ticket.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function order()
    {
        return $this->belongsToMany(\App\Models\Order::class);
    }

    /**
     * The questions associated with the ticket.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function questions()
    {
        return $this->belongsToMany(\App\Models\Question::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    function event_access_codes()
    {
        return $this->belongsToMany(
            EventAccessCodes::class,
            'ticket_event_access_code',
            'ticket_id',
            'event_access_code_id'
        )->withTimestamps();
    }

    /**
     * TODO:implement the reserved method.
     */
    public function reserved()
    {
    }

    /**
     * Parse start_sale_date to a Carbon instance
     *
     * @param string $date DateTime
     */
    public function setStartSaleDateAttribute($date)
    {
        if (!$date) {
            $this->attributes['start_sale_date'] = Carbon::now();
        } else {
            $this->attributes['start_sale_date'] = ($date instanceof Carbon) ? $date : Carbon::createFromFormat(
                config('attendize.default_datetime_format'),
                $date
            );
        }
    }

    /**
     * Parse end_sale_date to a Carbon instance
     *
     * @param string|null $date DateTime
     */
    public function setEndSaleDateAttribute($date)
    {
        if (!$date) {
            $this->attributes['end_sale_date'] = null;
        } else {
            $this->attributes['end_sale_date'] = ($date instanceof Carbon) ? $date : Carbon::createFromFormat(
                config('attendize.default_datetime_format'),
                $date
            );
        }
    }

    /**
     * Scope a query to only include tickets that are sold out.
     *
     * @param $query
     */
    public function scopeSoldOut($query)
    {
        $query->where('remaining_tickets', '=', 0);
    }

    /**
     * Get the number of tickets remaining.
     *
     * @return \Illuminate\Support\Collection|int|mixed|static
     */
    public function getQuantityRemainingAttribute()
    {
        if (is_null($this->quantity_available)) {
            return 9999; //Better way to do this?
        }

        return $this->quantity_available - ($this->quantity_sold + $this->quantity_reserved);
    }

    /**
     * Get the number of tickets reserved.
     *
     * @return mixed
     */
    public function getQuantityReservedAttribute()
    {
        $reserved_total = DB::table('reserved_tickets')
            ->where('ticket_id', $this->id)
            ->where('expires', '>', Carbon::now())
            ->sum('quantity_reserved');

        return $reserved_total;
    }

    /**
     * Get the total price of the ticket.
     *
     * @return float|int
     */
    public function getTotalPriceAttribute()
    {
        return $this->getTotalBookingFeeAttribute() + $this->price;
    }

    /**
     * Get the total booking fee of the ticket.
     *
     * @return float|int
     */
    public function getTotalBookingFeeAttribute()
    {
        return $this->getBookingFeeAttribute() + $this->getOrganiserBookingFeeAttribute();
    }

    /**
     * Get the booking fee of the ticket.
     *
     * @return float|int
     */
    public function getBookingFeeAttribute()
    {
        return (int)ceil($this->price) === 0 ? 0 : round(
            ($this->price * (config('attendize.ticket_booking_fee_percentage') / 100)) + (config('attendize.ticket_booking_fee_fixed')),
            2
        );
    }

    /**
     * Get the organizer's booking fee.
     *
     * @return float|int
     */
    public function getOrganiserBookingFeeAttribute()
    {
        return (int)ceil($this->price) === 0 ? 0 : round(
            ($this->price * ($this->event->organiser_fee_percentage / 100)) + ($this->event->organiser_fee_fixed),
            2
        );
    }

    /**
     * Get the maximum and minimum range of the ticket.
     *
     * @return array
     */
    public function getTicketMaxMinRangAttribute()
    {
        $range = [];

        for ($i = $this->min_per_person; $i <= $this->max_per_person; $i++) {
            $range[] = [$i => $i];
        }

        return $range;
    }

    /**
     * Indicates if the ticket is free.
     *
     * @return bool
     */
    public function getIsFreeAttribute()
    {
        return ceil($this->price) == 0;
    }

    /**
     * Return the maximum figure to go to on dropdowns.
     *
     * @return int
     */
    public function getSaleStatusAttribute()
    {
        if ($this->start_sale_date !== null && $this->start_sale_date->isFuture()) {
            return config('attendize.ticket_status_before_sale_date');
        }

        if ($this->end_sale_date !== null && $this->end_sale_date->isPast()) {
            return config('attendize.ticket_status_after_sale_date');
        }

        if ((int)$this->quantity_available > 0 && (int)$this->quantity_remaining <= 0) {
            return config('attendize.ticket_status_sold_out');
        }

        if ($this->event->start_date->lte(Carbon::now())) {
            return config('attendize.ticket_status_off_sale');
        }

        return config('attendize.ticket_status_on_sale');
    }
}
