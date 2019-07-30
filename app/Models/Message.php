<?php

namespace App\Models;

    /*
      Attendize.com   - Event Management & Ticketing
     */

/**
 * Description of Message.
 *
 * @author Dave
 * @property int $id
 * @property string $message
 * @property string $subject
 * @property string|null $recipients
 * @property int $account_id
 * @property int $user_id
 * @property int $event_id
 * @property int $is_sent
 * @property \Illuminate\Support\Carbon|null $sent_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Event $event
 * @property-read string $recipients_label
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MyBaseModel scope($accountId = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereIsSent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereRecipients($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereSentAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Message whereUserId($value)
 * @mixin \Eloquent
 */
class Message extends MyBaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = [
        'message',
        'subject',
        'recipients',
    ];

    /**
     * The event associated with the message.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo(\App\Models\Event::class);
    }

    /**
     * Get the recipient label of the model.
     *
     * @return string
     */
    public function getRecipientsLabelAttribute()
    {
        if ($this->recipients == 0) {
            return 'All Attendees';
        }

        $ticket = Ticket::scope()->find($this->recipients);

        return 'Ticket: ' . $ticket->title;
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @return array $dates
     */
    public function getDates()
    {
        return ['created_at', 'updated_at', 'sent_at'];
    }
}
