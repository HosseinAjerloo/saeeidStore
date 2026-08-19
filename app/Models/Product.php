<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use SoftDeletes,HasSlug;
    protected $fillable=[
        'group_id',
        'brand_id',
        'name',
        'slug',
        'short_description',
        'description',
        'image',
        'is_active',
        'is_featured',

    ];
    public function getSlugOptions(): SlugOptions
    {

        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

}

