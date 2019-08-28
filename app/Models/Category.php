<?php
/**
 * Created by PhpStorm.
 * User: merdan
 * Date: 12/9/2018
 * Time: 9:52 PM
 */

namespace App\Models;


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
    protected $fillable = ['title','lft','rgt','parent_id','depth'];
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
        return $query->where('depth',2);
    }

    public function getChildren($parent_id){
        return $this->where('parent_id',$parent_id);
    }
}