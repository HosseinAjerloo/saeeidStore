<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use SoftDeletes, HasSlug;

    protected $fillable = [
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

    public function group()
    {
        return $this->belongsTo(ProductGroup::class, 'group_id');
    }

    public function brand()
    {
        return $this->belongsTo(productBrand::class, 'brand_id');
    }

    public function productVariant()
    {
        return $this->hasMany(ProductVariant::class, 'product_id');
    }


    public function getActive(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->is_active == '1' ? 'فعال' : 'غیرفعال'
        );
    }

    public function discounts()
    {
        return $this->morphToMany(Discount::class, 'discountable')->using(Discountable::class)->withPivot('used');
    }

    public function getSlugOptions(): SlugOptions
    {

        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tag', 'product_id', 'tag_id', 'id', 'id');
    }

    #[Scope]
    public function scopeSearch(Builder $builder)
    {
        $search = request()->query('q');
        $brand = [];
        $group = [];
        if ($search) {
            $brand = productBrand::where('name', 'like', "%{$search}%")->pluck('id')->toArray();
            $group = ProductGroup::where('name', 'like', "%{$search}%")->pluck('id')->toArray();

        }
        $builder->when(!empty($brand), function ($query) use ($brand) {
            $query->orWhereIN('brand_id', $brand);
        })->when(!empty($group), function ($query) use ($group) {
            $query->orWhereIN('group_id', $group);
        })->when($search, function ($query, $value) {
            $query->orWhere('name', 'like', "%{$value}%");
        });
    }

    public function inValidDiscount()
    {
        $dateNow = Carbon::now()->toDateString();
        $discount = $this->discounts()->where('is_active', '1')->where('starts_at', "<=",$dateNow)->wherePivotNull('deleted_at')->where('expires_at', '>=', $dateNow)->first();
        return $discount;
    }



}

