<?php

namespace App\Models;

    /*
      Attendize.com   - Event Management & Ticketing
     */

/**
 * Description of TicketStatuses.
 *
 * @author Dave
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TicketStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TicketStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TicketStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TicketStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TicketStatus whereName($value)
 * @mixin \Eloquent
 */
class TicketStatus extends \Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;
}
