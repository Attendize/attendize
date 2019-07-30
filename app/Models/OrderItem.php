<?php

namespace App\Models;

    /*
      Attendize.com   - Event Management & Ticketing
     */

/**
 * Description of OrderItems.
 *
 * @author Dave
 * @property int $id
 * @property string $title
 * @property int $quantity
 * @property float $unit_price
 * @property float|null $unit_booking_fee
 * @property int $order_id
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MyBaseModel scope($accountId = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderItem whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderItem whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderItem whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderItem whereUnitBookingFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderItem whereUnitPrice($value)
 * @mixin \Eloquent
 */
class OrderItem extends MyBaseModel
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool $timestamps
     */
    public $timestamps = false;
}
