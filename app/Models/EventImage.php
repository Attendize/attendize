<?php

namespace App\Models;

    /*
      Attendize.com   - Event Management & Ticketing
     */

/**
 * Description of EventImage.
 *
 * @author Dave
 * @property int $id
 * @property string $image_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $event_id
 * @property int $account_id
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EventImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EventImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EventImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MyBaseModel scope($accountId = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EventImage whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EventImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EventImage whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EventImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EventImage whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EventImage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EventImage whereUserId($value)
 * @mixin \Eloquent
 */
class EventImage extends MyBaseModel
{
    //put your code here.
}
