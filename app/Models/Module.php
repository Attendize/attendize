<?php

namespace App\Models;
use GrahamCampbell\Markdown\Facades\Markdown;
use Storage;

class Module extends MyBaseModel
{
    protected $fillable = [
        'event_id',
        'module'
    ];

    /**
     * The validation rules of the model.
     *
     * @var array $rules
     */
    public $rules = [
        'event_id' => ['required'],
        'module' => ['required'],
    ];

    /**
     * The validation error messages.
     *
     * @var array $messages
     */
    public $messages = [
    ];

    /**
     * The event associated with the module.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function event()
    {
        return $this->belongsTo('\App\Models\Event');
    }

    public static function getDescription($module)
    {
        $file = '';
        $path = base_path().'/modules/'.$module.'/module.json';

        if(file_exists($path)) {
            $file = json_decode(file_get_contents($path))->description;
        }

        return $file;
    }
}
