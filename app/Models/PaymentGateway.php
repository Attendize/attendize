<?php

namespace App\Models;

/**
 * Class PaymentGateway
 *
 * @package App\Models
 * @property int $id
 * @property string $provider_name
 * @property string $provider_url
 * @property int $is_on_site
 * @property int $can_refund
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentGateway newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentGateway newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentGateway query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MyBaseModel scope($accountId = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentGateway whereCanRefund($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentGateway whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentGateway whereIsOnSite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentGateway whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentGateway whereProviderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PaymentGateway whereProviderUrl($value)
 * @mixin \Eloquent
 */
class PaymentGateway extends MyBaseModel
{


}
