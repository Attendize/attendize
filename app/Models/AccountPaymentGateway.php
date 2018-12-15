<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\AccountPaymentGateway
 *
 * @property int $id
 * @property int $account_id
 * @property int $payment_gateway_id
 * @property mixed $config
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Account $account
 * @property-read \App\Models\PaymentGateway $payment_gateway
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccountPaymentGateway newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccountPaymentGateway newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AccountPaymentGateway onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccountPaymentGateway query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MyBaseModel scope($accountId = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccountPaymentGateway whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccountPaymentGateway whereConfig($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccountPaymentGateway whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccountPaymentGateway whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccountPaymentGateway whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccountPaymentGateway wherePaymentGatewayId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccountPaymentGateway whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AccountPaymentGateway withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AccountPaymentGateway withoutTrashed()
 * @mixin \Eloquent
 */
class AccountPaymentGateway extends MyBaseModel
{

    use softDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payment_gateway_id',
        'config'
    ];

    /**
     * Account associated with gateway
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account() {
        return $this->belongsTo(\App\Models\Account::class);
    }

    /**
     * Parent payment gateway
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payment_gateway()
    {
        return $this->belongsTo(\App\Models\PaymentGateway::class, 'payment_gateway_id', 'id');
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function getConfigAttribute($value) {
        return json_decode($value, true);
    }

    public function setConfigAttribute($value) {
        $this->attributes['config'] = json_encode($value);
    }
}
