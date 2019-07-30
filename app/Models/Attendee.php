<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/*
  Attendize.com   - Event Management & Ticketing
 */

/**
 * Description of Attendees.
 *
 * @author Dave
 * @property int $id
 * @property int $order_id
 * @property int $event_id
 * @property int $ticket_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property int $private_reference_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int $is_cancelled
 * @property int $has_arrived
 * @property \Illuminate\Support\Carbon|null $arrival_time
 * @property int $account_id
 * @property int $reference_index
 * @property int $is_refunded
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\QuestionAnswer[] $answers
 * @property-read \App\Models\Event $event
 * @property-read string $full_name
 * @property-read string $reference
 * @property-read \App\Models\Order $order
 * @property-read \App\Models\Ticket $ticket
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attendee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attendee newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Attendee onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attendee query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MyBaseModel scope($accountId = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attendee whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attendee whereArrivalTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attendee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attendee whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attendee whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attendee whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attendee whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attendee whereHasArrived($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attendee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attendee whereIsCancelled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attendee whereIsRefunded($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attendee whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attendee whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attendee wherePrivateReferenceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attendee whereReferenceIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attendee whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attendee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Attendee withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Attendee withoutCancelled()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Attendee withoutTrashed()
 * @mixin \Eloquent
 */
class Attendee extends MyBaseModel
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'event_id',
        'order_id',
        'ticket_id',
        'account_id',
        'reference',
        'has_arrived',
        'arrival_time'
    ];

    /**
     * Generate a private reference number for the attendee. Use for checking in the attendee.
     *
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($order) {

            do {
                //generate a random string using Laravel's str_random helper
                $token = Str::Random(15);
            } //check if the token already exists and if it does, try again

            while (Attendee::where('private_reference_number', $token)->first());
            $order->private_reference_number = $token;
        });

    }

    /**
     * The order associated with the attendee.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class);
    }

    /**
     * The ticket associated with the attendee.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ticket()
    {
        return $this->belongsTo(\App\Models\Ticket::class);
    }

    /**
     * The event associated with the attendee.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo(\App\Models\Event::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany('App\Models\QuestionAnswer');
    }

    /**
     * Scope a query to return attendees that have not cancelled.
     *
     * @param $query
     *
     * @return mixed
     */
    public function scopeWithoutCancelled($query)
    {
        return $query->where('attendees.is_cancelled', '=', 0);
    }

    /**
     * Get the attendee reference
     *
     * @return string
     */
    public function getReferenceAttribute()
    {
        return $this->order->order_reference . '-' . $this->reference_index;
    }

    /**
     * Get the full name of the attendee.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }


    /**
     * The attributes that should be mutated to dates.
     *
     * @return array $dates
     */
    public function getDates()
    {
        return ['created_at', 'updated_at', 'arrival_time'];
    }
}
