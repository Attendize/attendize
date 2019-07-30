<?php

namespace App\Models;

    /*
      Attendize.com   - Event Management & Ticketing
     */

    /**
 * Description of Currency.
 *
 * @property mixed symbol_left
 * @property mixed thousand_point
 * @property mixed symbol_right
 * @property mixed decimal_place
 * @property mixed decimal_point
 * @author Dave
 * @property int $id
 * @property string $title
 * @property string $symbol_left
 * @property string $symbol_right
 * @property string $code
 * @property int $decimal_place
 * @property float $value
 * @property string $decimal_point
 * @property string $thousand_point
 * @property int $status
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \App\Models\Event $event
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Currency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Currency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Currency query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Currency whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Currency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Currency whereDecimalPlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Currency whereDecimalPoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Currency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Currency whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Currency whereSymbolLeft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Currency whereSymbolRight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Currency whereThousandPoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Currency whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Currency whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Currency whereValue($value)
 * @mixin \Eloquent
 */
class Currency extends \Illuminate\Database\Eloquent\Model
{
    /**
     * Indicates whether the model should be timestamped.
     *
     * @var bool $timestamps
     */
    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string $table
     */
    protected $table = 'currencies';
    /**
     * Indicates whether the model should use soft deletes.
     *
     * @var bool $softDelete
     */
    protected $softDelete = false;

    /**
     * The event associated with the currency.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo(\App\Models\Event::class);
    }
}
