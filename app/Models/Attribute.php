<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Casts\Attribute as At;

class Attribute extends Model
{
    use SoftDeletes, HasSlug;

    protected $fillable = [
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

    public function attributeValues()
    {
        return $this->hasMany(AttributeValue::class, 'attribute_id');
    }
    public function getActive():At
    {
        return At::make(
            get: fn($value) =>$this->is_active=='1'?'فعال':'غیرفعال'
        );
    }

    #[scope]
    public function scopeSearch(Builder $builder)
    {
        $builder->when(request()->query('q'), function ($query, $value) {
            $query->where('name', 'like', "%{$value}%")
                ->orWhereHas('attributeValues', function ($q) use ($value) {
                    $q->where('value', 'like', "%{$value}%");
                });
        });
    }

}
