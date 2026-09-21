<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'cart_token',
        'discount_id',
        'discount_type',
        'status',
        'final_price'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }
    public static function  generateToken()
    {
        do {
            $token = Str::random(12);
        } while (Cart::where('cart_token', $token)->exists());
        return $token;
    }
    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'cart_id');
    }

public function getDiscountCode(): ?Discount
    {
        $discount = null;
        $dateNow = Carbon::now()->toDateString();
        $discount = $this->discount()->where('is_active', '1')->where('starts_at', "<=", $dateNow)->where('expires_at', '>=', $dateNow)->first();
        return $discount;
    }

    public function calculateTotalDiscount()
    {
        $totalDiscount = 0;
        $totalDiscount = $this->cartItems->sum(function ($item) {
            if (isset($item->discount_type) && !isset($this->discount_id)) {
                return (($item->unit_price - $item->final_unit_price) * $item->quantity);
            }

        
        });
        return $totalDiscount;
    }
}
