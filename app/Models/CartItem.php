<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = [
        'cart_id',
        'variant_id',
        'variant_attribute_ids',
        'quantity',
        'discount_id',
        'discount_amount',
        'discount_type',
        'unit_price',
        'final_unit_price',
    ];

    protected $casts = [
        'variant_attribute_ids' => 'array'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }

    public static function isAddToCartAllowed($variant_id, $quantity)
    {
        $productVariant = ProductVariant::find($variant_id);
        $stock = $productVariant->stock;
     
        if ($stock < $quantity)
            return false;

        $sumQuantity = CartItem::whereHas('cart', function ($query) {
            $query->where('status', 'checkout');
        })->where('variant_id', $variant_id)->sum('quantity');

        if ($stock < ($quantity + $sumQuantity))
            return false;

        return true;
    }

    public function calculateRemainingStock($variant_id)
    {
        $productVariant = ProductVariant::findOrFail($variant_id);


        $sumQuantity = CartItem::whereHas('cart', function ($query) {
            $query->where('status', 'checkout');
        })->where('variant_id', $variant_id)->sum('quantity');

        $remaining = $productVariant->stock - $sumQuantity;
        $remaining = $remaining < 0 ? 0 : $remaining;
        return $remaining;
    }
    public static function isForProduct($cart, $variant_id, $variant_attribute_ids): bool
    {
        $hasInCartItem = $cart->cartItems()->where('variant_id', $variant_id);
        if (!empty($variant_attribute_ids))
            $hasInCartItem->whereJsonContains('variant_attribute_ids', $variant_attribute_ids);

        return $hasInCartItem->exists();
    }


    public function calculateDiscount()
    {

        $unitDiscountPrice = 0;
        if (isset($this->discount_type)) {
           $unitDiscountPrice= $this->unit_price - $this->final_unit_price;
        }
        return $unitDiscountPrice;
    }
}
