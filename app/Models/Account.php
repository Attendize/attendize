<?php

namespace App\Models;

use App\Attendize\Utils;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

/**
 * App\Models\Account
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property int|null $timezone_id
 * @property int|null $date_format_id
 * @property int|null $datetime_format_id
 * @property int|null $currency_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $name
 * @property string|null $last_ip
 * @property string|null $last_login_date
 * @property string|null $address1
 * @property string|null $address2
 * @property string|null $city
 * @property string|null $state
 * @property string|null $postal_code
 * @property int|null $country_id
 * @property string|null $email_footer
 * @property int $is_active
 * @property int $is_banned
 * @property int $is_beta
 * @property string|null $stripe_access_token
 * @property string|null $stripe_refresh_token
 * @property string|null $stripe_secret_key
 * @property string|null $stripe_publishable_key
 * @property string|null $stripe_data_raw
 * @property int $payment_gateway_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AccountPaymentGateway[] $account_payment_gateways
 * @property-read \App\Models\AccountPaymentGateway $active_payment_gateway
 * @property-read \App\Models\Currency|null $currency
 * @property-read \Illuminate\Support\Collection|mixed|static $stripe_api_key
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Account onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MyBaseModel scope($accountId = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereDateFormatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereDatetimeFormatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereEmailFooter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereIsBanned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereIsBeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereLastIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereLastLoginDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account wherePaymentGatewayId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereStripeAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereStripeDataRaw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereStripePublishableKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereStripeRefreshToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereStripeSecretKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereTimezoneId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Account whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Account withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Account withoutTrashed()
 * @mixin \Eloquent
 */
class Account extends MyBaseModel
{
    use SoftDeletes;

    /**
     * The validation rules
     *
     * @var array $rules
     */
    protected $rules = [
        'first_name' => ['required'],
        'last_name'  => ['required'],
        'email'      => ['required', 'email'],
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array $dates
     */
    public $dates = ['deleted_at'];

    /**
     * The validation error messages.
     *
     * @var array $messages
     */
    protected $messages = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'timezone_id',
        'date_format_id',
        'datetime_format_id',
        'currency_id',
        'name',
        'last_ip',
        'last_login_date',
        'address1',
        'address2',
        'city',
        'state',
        'postal_code',
        'country_id',
        'email_footer',
        'is_active',
        'is_banned',
        'is_beta',
        'stripe_access_token',
        'stripe_refresh_token',
        'stripe_secret_key',
        'stripe_publishable_key',
        'stripe_data_raw'
    ];

    /**
     * The users associated with the account.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(\App\Models\User::class);
    }

    /**
     * The orders associated with the account.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class);
    }

    /**
     * The currency associated with the account.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo(\App\Models\Currency::class);
    }

    /**
     * Payment gateways associated with an account
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function account_payment_gateways()
    {
        return $this->hasMany(\App\Models\AccountPaymentGateway::class);
    }

    /**
     * Alias for $this->account_payment_gateways()
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gateways() {
        return $this->account_payment_gateways();
    }

    /**
     * Get an accounts active payment gateway
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function active_payment_gateway()
    {
        return $this->hasOne(\App\Models\AccountPaymentGateway::class, 'payment_gateway_id', 'payment_gateway_id')->where('account_id', $this->id);
    }

    /**
     * Get an accounts gateways
     *
     * @param $gateway_id
     * @return mixed
     */
    public function getGateway($gateway_id)
    {
        return $this->gateways->where('payment_gateway_id', $gateway_id)->first();
    }

    /**
     * Get a config value for a gateway
     *
     * @param $gateway_id
     * @param $key
     * @return mixed
     */
    public function getGatewayConfigVal($gateway_id, $key)
    {
        $gateway = $this->getGateway($gateway_id);

        if($gateway && is_array($gateway->config)) {
            return isset($gateway->config[$key]) ? $gateway->config[$key] : false;
        }

        return false;
    }



    /**
     * Get the stripe api key.
     *
     * @return \Illuminate\Support\Collection|mixed|static
     */
    public function getStripeApiKeyAttribute()
    {
        if (Utils::isAttendize()) {
            return $this->stripe_access_token;
        }

        return $this->stripe_secret_key;
    }
}
