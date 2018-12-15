<?php

namespace App\Models;

use App\Scopes\AccountIdScope;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\UploadedFile;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

/**
 * App\Models\Organiser
 *
 * @property string full_logo_path
 * @property string logo_path
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int $account_id
 * @property string $name
 * @property string $about
 * @property string $email
 * @property string|null $phone
 * @property string $confirmation_key
 * @property string $facebook
 * @property string $twitter
 * @property string|null $logo_path
 * @property int $is_email_confirmed
 * @property int $show_twitter_widget
 * @property int $show_facebook_widget
 * @property string $page_header_bg_color
 * @property string $page_bg_color
 * @property string $page_text_color
 * @property int $enable_organiser_page
 * @property string|null $google_analytics_code
 * @property string $tax_name
 * @property float $tax_value
 * @property string $tax_id
 * @property int $charge_tax
 * @property-read \App\Models\Account $account
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Attendee[] $attendees
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Event[] $events
 * @property-read mixed|string $full_logo_path
 * @property-read mixed|\number $organiser_sales_volume
 * @property-read string $organiser_url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Organiser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Organiser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Organiser query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MyBaseModel scope($accountId = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Organiser whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Organiser whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Organiser whereChargeTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Organiser whereConfirmationKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Organiser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Organiser whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Organiser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Organiser whereEnableOrganiserPage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Organiser whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Organiser whereGoogleAnalyticsCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Organiser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Organiser whereIsEmailConfirmed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Organiser whereLogoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Organiser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Organiser wherePageBgColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Organiser wherePageHeaderBgColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Organiser wherePageTextColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Organiser wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Organiser whereShowFacebookWidget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Organiser whereShowTwitterWidget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Organiser whereTaxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Organiser whereTaxName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Organiser whereTaxValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Organiser whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Organiser whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Organiser extends MyBaseModel implements AuthenticatableContract
{
    use Authenticatable;
    /**
     * The validation rules for the model.
     *
     * @var array $rules
     */
    protected $rules = [
        'name'           => ['required'],
        'email'          => ['required', 'email'],
        'organiser_logo' => ['mimes:jpeg,jpg,png', 'max:10000'],
    ];

    protected $extra_rules = [
        'tax_name'        => ['required','max:15'],
        'tax_value'       => ['required','numeric'],
        'tax_id'          => ['required','max:100'],
    ];

    /**
     * The validation rules for the model.
     *
     * @var array $attributes
     */
    protected $attributes = [
        'tax_name'        => 'Tax Name',
        'tax_value'       => 'Tax Rate',
        'tax_id'          => 'Tax ID',
    ];

    /**
     * The validation error messages for the model.
     *
     * @var array $messages
     */
    protected $messages = [
        'name.required'        => 'You must at least give a name for the event organiser.',
        'organiser_logo.max'   => 'Please upload an image smaller than 10Mb',
        'organiser_logo.size'  => 'Please upload an image smaller than 10Mb',
        'organiser_logo.mimes' => 'Please select a valid image type (jpeg, jpg, png)',
    ];
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new AccountIdScope);
    }
    
    /**
     * The account associated with the organiser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    /**
     * The events associated with the organizer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany(Event::class);
    }

    /**
     * The attendees associated with the organizer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function attendees()
    {
        return $this->hasManyThrough(Attendee::class, Event::class);
    }

    /**
     * Get the orders related to an organiser
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function orders()
    {
        return $this->hasManyThrough(Order::class, Event::class);
    }

    /**
     * Get the full logo path of the organizer.
     *
     * @return mixed|string
     */
    public function getFullLogoPathAttribute()
    {
        if ($this->logo_path && (file_exists(config('attendize.cdn_url_user_assets') . '/' . $this->logo_path) || file_exists(public_path($this->logo_path)))) {
            return config('attendize.cdn_url_user_assets') . '/' . $this->logo_path;
        }

        return config('attendize.fallback_organiser_logo_url');
    }

    /**
     * Get the url of the organizer.
     *
     * @return string
     */
    public function getOrganiserUrlAttribute()
    {
        return route('showOrganiserHome', [
            'organiser_id'   => $this->id,
            'organiser_slug' => Str::slug($this->oraganiser_name),
        ]);
    }

    /**
     * Get the sales volume of the organizer.
     *
     * @return mixed|number
     */
    public function getOrganiserSalesVolumeAttribute()
    {
        return $this->events->sum('sales_volume');
    }

    /**
     * TODO:implement DailyStats method
     */
    public function getDailyStats()
    {
    }


    /**
     * Set a new Logo for the Organiser
     *
     * @param \Illuminate\Http\UploadedFile $file
     */
    public function setLogo(UploadedFile $file)
    {
        $filename = str_slug($this->name).'-logo-'.$this->id.'.'.strtolower($file->getClientOriginalExtension());

        // Image Directory
        $imageDirectory = public_path() . '/' . config('attendize.organiser_images_path');

        // Paths
        $relativePath = config('attendize.organiser_images_path').'/'.$filename;
        $absolutePath = public_path($relativePath);

        $file->move($imageDirectory, $filename);

        $img = Image::make($absolutePath);

        $img->resize(250, 250, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $img->save($absolutePath);

        if (file_exists($absolutePath)) {
            $this->logo_path = $relativePath;
        }
    }

    /**
     * Adds extra validator rules to the organiser object depending on whether tax is required or not
     */
    public function addExtraValidationRules() {
        $this->rules = $this->rules + $this->extra_rules;
    }
}

