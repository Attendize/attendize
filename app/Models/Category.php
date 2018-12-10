<?php
/**
 * Created by PhpStorm.
 * User: merdan
 * Date: 12/9/2018
 * Time: 9:52 PM
 */

namespace App\Models;


class Category extends \Illuminate\Database\Eloquent\Model
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
    protected $table = 'categories';
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