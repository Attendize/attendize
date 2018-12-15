<?php

namespace App\Models;

/*
  Attendize.com   - Event Management & Ticketing
 */

/**
 * App\Models\Affiliate
 *
 * @property int $id
 * @property string $name
 * @property int $visits
 * @property int $tickets_sold
 * @property float $sales_volume
 * @property string $last_visit
 * @property int $account_id
 * @property int $event_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Affiliate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Affiliate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Affiliate query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Affiliate whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Affiliate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Affiliate whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Affiliate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Affiliate whereLastVisit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Affiliate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Affiliate whereSalesVolume($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Affiliate whereTicketsSold($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Affiliate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Affiliate whereVisits($value)
 * @mixin \Eloquent
 */
class Affiliate extends \Illuminate\Database\Eloquent\Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = [
        'name',
        'visits',
        'tickets_sold',
        'event_id',
        'account_id',
        'sales_volume'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @return array $dates
     */
    public function getDates()
    {
        return ['created_at', 'updated_at'];
    }
}
