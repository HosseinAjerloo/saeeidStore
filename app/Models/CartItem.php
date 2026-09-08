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
        'discount_type',
        'final_unit_price',
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
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
    public static function isForProduct($cart, $variant_id, $variant_attribute_ids):bool
    {
        $hasInCartItem = $cart->cartItem()->where('variant_id', $variant_id);
        if (isset($variant_attribute_ids))
            $hasInCartItem->whereJsonContains('variant_attribute_ids', $variant_attribute_ids);

        return $hasInCartItem->exists();
    }
}
