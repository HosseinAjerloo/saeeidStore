<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cart extends Model
{
    protected $fillable=[
        'user_id',
        'cart_token',
        'discount_id',
        'discount_type',
        'status',
        'final_price'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function discount(){
        return $this->belongsTo(Discount::class);
    }
    public static function  generateToken(){
        do{
            $token=Str::random(12);
        }while(Cart::where('cart_token',$token)->exists());
        return $token;
    }
    public function cartItem(){
        return $this->hasOne(CartItem::class,'cart_id');
    }

}


