<?php

namespace App\Models;

    /*
      Attendize.com   - Event Management & Ticketing
     */

/**
 * Description of Timezone.
 *
 * @author Dave
 * @property int $id
 * @property string $name
 * @property string $location
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Timezone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Timezone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Timezone query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Timezone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Timezone whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Timezone whereName($value)
 * @mixin \Eloquent
 */
class Timezone extends \Illuminate\Database\Eloquent\Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool $timestamps
     */
    public $timestamps = false;

    /**
     * Indicates if the model should use soft deletes.
     *
     * @var bool $softDelete
     */
    protected $softDelete = false;
}
