<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\Attributes\Sluggable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

#[Sluggable(from: 'name', to: 'slug', selfHealing: true)]
class ProductGroup extends Model
{

    use SoftDeletes,HasSlug;
    protected $fillable=
        [
            'parent_id',
            'user_id',
            'name',
            'slug',
            'description',
            'image',
            'is_active'
        ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function child(){
        return $this->hasMany($this,'parent_id');
    }
    public function parent(){
        return $this->belongsTo($this,'parent_id');
    }


    public function getSlugOptions(): SlugOptions
    {
        // TODO: Implement getSlugOptions() method.
    }
}
