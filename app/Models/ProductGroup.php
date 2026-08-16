<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class ProductGroup extends Model
{
    use SoftDeletes, HasSlug;

    protected $fillable = [
        'parent_id',
        'user_id',
        'name',
        'slug',
        'description',
        'image',
        'is_active'
    ];

    /**
     * تنظیمات مربوط به اسلاگ
     */
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

    public function childs()
    {
        return $this->hasMany(ProductGroup::class, 'parent_id');
    }
    public function product()
    {
        return $this->hasMany(Product::class, 'group_id');
    }

    public function parent()
    {
        return $this->belongsTo(ProductGroup::class, 'parent_id');
    }


    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeParents($query)
    {
        return $query->whereNull('parent_id');
    }
    #[Scope]
    public function scopeSearch(Builder $builder){
        $builder->when(request()->query('q'),function ($query,$value){
            $query->where('name','like',"%{$value}%")->orWhere('slug','like',"%$value%");
        });
    }
}
