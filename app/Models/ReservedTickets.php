<?php

namespace App\Models;

    /*
      Attendize.com   - Event Management & Ticketing
     */

/**
 * Description of ReservedTickets.
 *
 * @author Dave
 * @property int $id
 * @property int $ticket_id
 * @property int $event_id
 * @property int $quantity_reserved
 * @property string $expires
 * @property string $session_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReservedTickets newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReservedTickets newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReservedTickets query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReservedTickets whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReservedTickets whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReservedTickets whereExpires($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReservedTickets whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReservedTickets whereQuantityReserved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReservedTickets whereSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReservedTickets whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReservedTickets whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ReservedTickets extends \Illuminate\Database\Eloquent\Model
{
    //put your code here
}
