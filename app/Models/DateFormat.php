<?php

namespace App\Models;

    /*
      Attendize.com   - Event Management & Ticketing
     */

/**
 * Description of DateFormat.
 *
 * @author Dave
 * @property int $id
 * @property string $format
 * @property string $picker_format
 * @property string $label
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DateFormat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DateFormat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DateFormat query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DateFormat whereFormat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DateFormat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DateFormat whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DateFormat wherePickerFormat($value)
 * @mixin \Eloquent
 */
class DateFormat extends \Illuminate\Database\Eloquent\Model
{
    /**
     * Indicates whether the model should be timestamped.
     *
     * @var bool $timestamps
     */
    public $timestamps = false;

    /**
     * Indicates whether the model should use soft deletes.
     *
     * @var bool $softDelete
     */
    protected $softDelete = false;
}
