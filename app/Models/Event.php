<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Str;
use URL;

/**
 * App\Models\Event
 *
 * @property int $id
 * @property string $title
 * @property string|null $location
 * @property string $bg_type
 * @property string $bg_color
 * @property string|null $bg_image_path
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $start_date
 * @property \Illuminate\Support\Carbon|null $end_date
 * @property string|null $on_sale_date
 * @property int $account_id
 * @property int $user_id
 * @property int|null $currency_id
 * @property float $sales_volume
 * @property float $organiser_fees_volume
 * @property float $organiser_fee_fixed
 * @property float $organiser_fee_percentage
 * @property int $organiser_id
 * @property string $venue_name
 * @property string|null $venue_name_full
 * @property string|null $location_address
 * @property string $location_address_line_1
 * @property string $location_address_line_2
 * @property string|null $location_country
 * @property string|null $location_country_code
 * @property string $location_state
 * @property string $location_post_code
 * @property string|null $location_street_number
 * @property string|null $location_lat
 * @property string|null $location_long
 * @property string|null $location_google_place_id
 * @property string|null $pre_order_display_message
 * @property string|null $post_order_display_message
 * @property string|null $social_share_text
 * @property int $social_show_facebook
 * @property int $social_show_linkedin
 * @property int $social_show_twitter
 * @property int $social_show_email
 * @property int $social_show_googleplus
 * @property int $location_is_manual
 * @property int $is_live
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $barcode_type
 * @property string $ticket_border_color
 * @property string $ticket_bg_color
 * @property string $ticket_text_color
 * @property string $ticket_sub_text_color
 * @property int $social_show_whatsapp
 * @property string $questions_collection_type
 * @property int $checkout_timeout_after
 * @property int $is_1d_barcode_enabled
 * @property int $enable_offline_payments
 * @property string|null $offline_payment_instructions
 * @property-read \App\Models\Account $account
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Affiliate[] $affiliates
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Attendee[] $attendees
 * @property-read \App\Models\Currency|null $currency
 * @property-read string $bg_image_url
 * @property-read \Illuminate\Support\Collection $currency_code
 * @property-read \Illuminate\Support\Collection $currency_symbol
 * @property-read string $embed_html_code
 * @property-read mixed $embed_url
 * @property-read string $event_url
 * @property-read mixed $fixed_fee
 * @property-read bool $happening_now
 * @property-read mixed $map_address
 * @property-read mixed $percentage_fee
 * @property-read \Illuminate\Support\Collection|mixed|static $sales_and_fees_voulme
 * @property-read array $survey_answers
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EventImage[] $images
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Message[] $messages
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read \App\Models\Organiser $organiser
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Question[] $questions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Question[] $questions_with_trashed
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EventStats[] $stats
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Ticket[] $tickets
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Event onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MyBaseModel scope($accountId = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereBarcodeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereBgColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereBgImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereBgType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereCheckoutTimeoutAfter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereEnableOfflinePayments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereIs1dBarcodeEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereIsLive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereLocationAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereLocationAddressLine1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereLocationAddressLine2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereLocationCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereLocationCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereLocationGooglePlaceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereLocationIsManual($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereLocationLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereLocationLong($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereLocationPostCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereLocationState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereLocationStreetNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereOfflinePaymentInstructions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereOnSaleDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereOrganiserFeeFixed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereOrganiserFeePercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereOrganiserFeesVolume($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereOrganiserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event wherePostOrderDisplayMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event wherePreOrderDisplayMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereQuestionsCollectionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereSalesVolume($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereSocialShareText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereSocialShowEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereSocialShowFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereSocialShowGoogleplus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereSocialShowLinkedin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereSocialShowTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereSocialShowWhatsapp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereTicketBgColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereTicketBorderColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereTicketSubTextColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereTicketTextColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereVenueName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Event whereVenueNameFull($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Event withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Event withoutTrashed()
 * @mixin \Eloquent
 */
class Event extends MyBaseModel
{
    use SoftDeletes;

    protected $dates = ['start_date', 'end_date', 'on_sale_date'];

    /**
     * The validation rules.
     *
     * @return array $rules
     */
    public function rules()
    {
        $format = config('attendize.default_datetime_format');
        return [
            'title'               => 'required',
            'description'         => 'required',
            'location_venue_name' => 'required_without:venue_name_full',
            'venue_name_full'     => 'required_without:location_venue_name',
            'start_date'          => 'required|date_format:"' . $format . '"',
            'end_date'            => 'required|date_format:"' . $format . '"',
            'organiser_name'      => 'required_without:organiser_id',
            'event_image'         => 'mimes:jpeg,jpg,png|max:3000',
        ];
    }

    /**
     * The validation error messages.
     *
     * @var array $messages
     */
    protected $messages = [
        'title.required'                       => 'You must at least give a title for your event.',
        'organiser_name.required_without'      => 'Please create an organiser or select an existing organiser.',
        'event_image.mimes'                    => 'Please ensure you are uploading an image (JPG, PNG, JPEG)',
        'event_image.max'                      => 'Please ensure the image is not larger then 3MB',
        'location_venue_name.required_without' => 'Please enter a venue for your event',
        'venue_name_full.required_without'     => 'Please enter a venue for your event',
    ];

    /**
     * The questions associated with the event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function questions()
    {
        return $this->belongsToMany(\App\Models\Question::class, 'event_question');
    }

    /**
     * The questions associated with the event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function questions_with_trashed()
    {
        return $this->belongsToMany(\App\Models\Question::class, 'event_question')->withTrashed();
    }

    /**
     * The attendees associated with the event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attendees()
    {
        return $this->hasMany(\App\Models\Attendee::class);
    }

    /**
     * The images associated with the event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(\App\Models\EventImage::class);
    }

    /**
     * The messages associated with the event.
     *
     * @return mixed
     */
    public function messages()
    {
        return $this->hasMany(\App\Models\Message::class)->orderBy('created_at', 'DESC');
    }

    /**
     * The tickets associated with the event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany(\App\Models\Ticket::class);
    }

    /**
     * The stats associated with the event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stats()
    {
        return $this->hasMany(\App\Models\EventStats::class);
    }

    /**
     * The affiliates associated with the event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function affiliates()
    {
        return $this->hasMany(\App\Models\Affiliate::class);
    }

    /**
     * The orders associated with the event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class);
    }

    /**
     * The access codes associated with the event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function access_codes()
    {
        return $this->hasMany(\App\Models\EventAccessCodes::class, 'event_id', 'id');
    }

    /**
     * The account associated with the event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        return $this->belongsTo(\App\Models\Account::class);
    }

    /**
     * The currency associated with the event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo(\App\Models\Currency::class);
    }

    /**
     * The organizer associated with the event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organiser()
    {
        return $this->belongsTo(\App\Models\Organiser::class);
    }

    /**
     * Get the embed url.
     *
     * @return mixed
     */
    public function getEmbedUrlAttribute()
    {
        return str_replace(['http:', 'https:'], '', route('showEmbeddedEventPage', ['event' => $this->id]));
    }

    /**
     * Get the fixed fee.
     *
     * @return mixed
     */
    public function getFixedFeeAttribute()
    {
        return config('attendize.ticket_booking_fee_fixed') + $this->organiser_fee_fixed;
    }

    /**
     * Get the percentage fee.
     *
     * @return mixed
     */
    public function getPercentageFeeAttribute()
    {
        return config('attendize.ticket_booking_fee_percentage') + $this->organiser_fee_percentage;
    }

    /**
     * Parse start_date to a Carbon instance if necessary
     *
     * @param mixed $date DateTime
     */
    public function setStartDateAttribute($date)
    {
        $format = config('attendize.default_datetime_format');

        $this->attributes['start_date'] = ($date instanceof Carbon) ? $date : Carbon::createFromFormat($format, $date);
    }

    /**
     * Format start date from user preferences
     * @return String Formatted date
     */
    public function startDateFormatted()
    {
        return $this->start_date->format(config('attendize.default_datetime_format'));
    }

    /**
     * Parse end_date to a Carbon instance if necessary
     *
     * @param mixed $date DateTime
     */
    public function setEndDateAttribute($date)
    {
        $format = config('attendize.default_datetime_format');

        $this->attributes['end_date'] = ($date instanceof Carbon) ? $date : Carbon::createFromFormat($format, $date);
    }

    /**
     * Format end date from user preferences
     * @return String Formatted date
     */
    public function endDateFormatted()
    {
        return $this->end_date->format(config('attendize.default_datetime_format'));
    }

    /**
     * Indicates whether the event is currently happening.
     *
     * @return bool
     */
    public function getHappeningNowAttribute()
    {
        return Carbon::now()->between($this->start_date, $this->end_date);
    }

    /**
     * Get the currency symbol.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getCurrencySymbolAttribute()
    {
        return $this->currency->symbol_left;
    }

    /**
     * Get the currency code.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getCurrencyCodeAttribute()
    {
        return $this->currency->code;
    }

    /**
     * Return an array of attendees and answers they gave to questions at checkout
     *
     * @return array
     */
    public function getSurveyAnswersAttribute()
    {
        $rows[] = array_merge([
            'Order Ref',
            'Attendee Name',
            'Attendee Email',
            'Attendee Ticket'
        ], $this->questions->pluck('title')->toArray());

        $attendees = $this->attendees()->has('answers')->get();

        foreach ($attendees as $attendee) {
            $answers = [];

            foreach ($this->questions as $question) {
                if (in_array($question->id, $attendee->answers->pluck('question_id')->toArray())) {
                    $answers[] = $attendee->answers->where('question_id', $question->id)->first()->answer_text;
                } else {
                    $answers[] = null;
                }
            }

            $rows[] = array_merge([
                $attendee->order->order_reference,
                $attendee->full_name,
                $attendee->email,
                $attendee->ticket->title
            ], $answers);
        }

        return $rows;
    }

    /**
     * Get the embed html code.
     *
     * @return string
     */
    public function getEmbedHtmlCodeAttribute()
    {
        return "<!--Attendize.com Ticketing Embed Code-->
                <iframe style='overflow:hidden; min-height: 350px;' frameBorder='0' seamless='seamless' width='100%' height='100%' src='" . $this->embed_url . "' vspace='0' hspace='0' scrolling='auto' allowtransparency='true'></iframe>
                <!--/Attendize.com Ticketing Embed Code-->";
    }

    /**
     * Get a usable address for embedding Google Maps
     *
     */
    public function getMapAddressAttribute()
    {
        $string = $this->venue . ','
            . $this->location_street_number . ','
            . $this->location_address_line_1 . ','
            . $this->location_address_line_2 . ','
            . $this->location_state . ','
            . $this->location_post_code . ','
            . $this->location_country;

        return urlencode($string);
    }

    /**
     * Get the big image url.
     *
     * @return string
     */
    public function getBgImageUrlAttribute()
    {
        return URL::to('/') . '/' . $this->bg_image_path;
    }

    /**
     * Get the url of the event.
     *
     * @return string
     */
    public function getEventUrlAttribute()
    {
        return route("showEventPage", ["event_id" => $this->id, "event_slug" => Str::slug($this->title)]);
        //return URL::to('/') . '/e/' . $this->id . '/' . Str::slug($this->title);
    }

    /**
     * Get the sales and fees volume.
     *
     * @return \Illuminate\Support\Collection|mixed|static
     */
    public function getSalesAndFeesVoulmeAttribute()
    {
        return $this->sales_volume + $this->organiser_fees_volume;
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @return array $dates
     */
    public function getDates()
    {
        return ['created_at', 'updated_at', 'start_date', 'end_date'];
    }

    public function getIcsForEvent()
    {
        $siteUrl = URL::to('/');
        $eventUrl = $this->getEventUrlAttribute();

        $start_date = $this->start_date;
        $end_date = $this->end_date;
        $timestamp = new Carbon();

        $icsTemplate = <<<ICSTemplate
BEGIN:VCALENDAR
VERSION:2.0
PRODID:{$siteUrl}
BEGIN:VEVENT
UID:{$eventUrl}
DTSTAMP:{$timestamp->format('Ymd\THis\Z')}
DTSTART:{$start_date->format('Ymd\THis\Z')}
DTEND:{$end_date->format('Ymd\THis\Z')}
SUMMARY:$this->title
LOCATION:{$this->venue_name}
DESCRIPTION:{$this->description}
END:VEVENT
END:VCALENDAR
ICSTemplate;

        return $icsTemplate;
    }

    /**
     * @param integer $accessCodeId
     * @return bool
     */
    public function hasAccessCode($accessCodeId)
    {
        return (is_null($this->access_codes()->where('id', $accessCodeId)->first()) === false);
    }
}
