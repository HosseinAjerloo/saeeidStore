<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $fillable = [
        'product_id',
        'sku',
        'price',
        'stock',
        'is_active'
    ];

    public function product()
    {
        $this->belongsTo(Product::class, 'product_id');
    }

    public function variantAttributes()
    {
        return $this->hasMany(VariantAttribute::class,'variant_id');
    }

    public function getActive(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->is_active == '1' ? 'فعال' : 'غیرفعال'
        );
    }
}
