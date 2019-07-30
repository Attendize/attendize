<?php

namespace App\Models;

    /*
      Attendize.com   - Event Management & Ticketing
     */

/**
 * Description of DateTimeFormat.
 *
 * @author Dave
 * @property int $id
 * @property string $format
 * @property string $picker_format
 * @property string $label
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DateTimeFormat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DateTimeFormat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DateTimeFormat query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DateTimeFormat whereFormat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DateTimeFormat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DateTimeFormat whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\DateTimeFormat wherePickerFormat($value)
 * @mixin \Eloquent
 */
class DateTimeFormat extends \Illuminate\Database\Eloquent\Model
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
    protected $table = 'datetime_formats';
    /**
     * Indicates whether the model should use soft deletes.
     *
     * @var bool $softDelete
     */
    protected $softDelete = false;
}
