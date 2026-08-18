<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Attribute extends Model
{
    use SoftDeletes,HasSlug;

    protected $fillable=[
        'name',
        'slug',
        'is_active',
        'type',
    ];
    public function getSlugOptions(): SlugOptions
    {

        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
    public function attributeValues(){
       return $this->hasMany(AttributeValue::class,'attribute_id');
    }

}
