<?php
/**
 * Created by PhpStorm.
 * User: merdan
 * Date: 12/9/2018
 * Time: 9:52 PM
 */

namespace App\Models;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class Category extends \Illuminate\Database\Eloquent\Model{
    use \Backpack\CRUD\CrudTrait;
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
    protected $fillable = ['title_tm','title_ru','view_type','lft','rgt','parent_id','depth'];

    /**
     * Get the url of the event.
     *
     * @return string
     */
    public function getUrlAttribute()
    {
        return route("showCategoryEventsPage", ["cat_id"=>$this->id, "cat_slug"=>Str::slug($this->title)]);
        //return URL::to('/') . '/e/' . $this->id . '/' . Str::slug($this->title);
    }

    public function getTitleAttribute(){

        return $this->{'title_'.Config::get('app.locale')};
    }
    /**
     * The events associated with the category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events(){
        return $this->hasMany(\App\Models\Event::class);
    }

    public function scopeMain($query){
        return $query->where('depth',1)->orderBy('lft','asc');
    }
    public function scopeSub($query){
        return $query->where('depth',2)->orderBy('lft','asc');
    }

    public function scopeChildren($query,$parent_id){
        return $query->where('parent_id',$parent_id)->orderBy('lft','asc');
    }

    public function parent(){
        return $this->belongsTo(Category::class,'parent_id');
    }
}