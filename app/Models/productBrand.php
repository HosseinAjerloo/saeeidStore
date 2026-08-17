<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class productBrand extends Model
{
    use SoftDeletes,HasSlug;
    protected $fillable=[
        'name',
        'slug',
        'description',
        'logo',
        'website',
        'is_active',
    ];
    public function getSlugOptions(): SlugOptions
    {

        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getActive(): Attribute
    {
        return Attribute::make(
            get: fn($value) =>$this->is_active=='1'?'فعال':'غیرفعال'
        );
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'group_id');
    }

    #[Scope]
    public function scopeSearch(Builder $builder){
        $builder->when(request()->query('q'),function ($query,$value){
            $query->where('name','like',"%{$value}%")->orWhere('slug','like',"%$value%");
        });
    }

}
