<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = [
        'cart_id',
        'variant_attributes_id',
        'quantity',
        'discount_id',
        'discount_amount',
        'discount_type',
        'unit_price',
        'final_unit_price',

    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
    public function variant_attributes_id()
    {
        return $this->belongsTo(Varia::class);
    }
}
