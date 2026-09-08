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
        $this->clientCart = $cart;
        $inputs = request()->all();

        if( !$this->canAddToCart($inputs['productVariant']) )
        {
                 $this->message = 'موجودی این محصول برای تعداد درخواستی کافی نیست.';
        }
        if(! $this->hasProductInCart())
        {

        }
       
        
    }

    public function canAddToCart($variant_id, $quantity = 1)
    {
        return CartItem::isAddToCartAllowed($variant_id, $quantity);
    }

    public function generateCart()
    {
        $this->setSessionCart();
        if ($user = $this->isLogin()) {
            $cart = Cart::firstOrCreate(['user_id' => $user->id,'status' => 'active'], ['cart_token' => $this->getSessionCart(), 'status' => 'active']);
        } else {
            $cart = Cart::firstOrCreate(['cart_token' => $this->getSessionCart(),'status' => 'active'], ['status' => 'active']);
        }
        return $cart;
    }

    public function isLogin()
    {
        return Auth::user();
    }

    protected function generateToken()
    {
        if (session('cart_item'))
            return session('cart_item');

        $token = Cart::generateToken();
        return $token;
    }

    public function setSessionCart()
    {
        session(['cart_item' => $this->generateToken()]);
    }
    public function hasProductInCart(): bool
    {
        $inputs = request()->all();
        return    CartItem::isForProduct($this->clientCart, $inputs['productVariant'], $inputs['variant_attribute_ids']);
    }

    public function getSessionCart()
    {
        return session('cart_item');
    }
    protected function setMessageResonse(){

    }
}
