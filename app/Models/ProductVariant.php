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
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function variantAttributes()
    {
        return $this->hasMany(VariantAttribute::class, 'variant_id');
    }

    public function getActive(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->is_active == '1' ? 'فعال' : 'غیرفعال'
        );
    }

    public function countable()
    {
        $discount = $this->product->inValidDiscount();

        $price = $this->price;
        if (!$discount)
            return $price;

        $amount = $price;
        if ($discount->type == 'percentage') {
            $amount = ($price - (($discount->value * $price) / 100));
            $amount = ceil($amount);
        } else {
            $amount = ($price - $discount->value);
            $amount = ceil($amount);
        }
        return $amount;
    }
}
