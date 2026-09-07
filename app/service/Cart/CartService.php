<?php

namespace App\Service\Cart;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartService
{
    public function cart()
    {
        $cart = $this->generateCart();
    }

    public function canAddToCart($variant_id,$quantity = 1)
    {
        return CartItem::isAddToCartAllowed($variant_id,$quantity);
    }

    public function generateCart()
    {
        $this->setSessionCart();
        if ($user = $this->isLogin()) {
            $cart = Cart::firstOrCreate(['user_id' => $user->id], ['cart_token' => $this->getSessionCart(), 'status' => 'active']);
        } else {
            $cart = Cart::firstOrCreate(['cart_token' => $this->getSessionCart()], ['status' => 'active']);
        }
        return $cart;
    }

    public function isLogin()
    {
        return Auth::user();
    }

    protected function generateToken()
    {
        if (session()->has('cart'))
            return session()->get('cart');

        $token = Cart::generateToken();
        return $token;
    }

    public function setSessionCart()
    {
        session()->put('cart',$this->generateToken());
    }

    public function getSessionCart()
    {
        return session('cart');
    }

}
