<?php

namespace App\Trait;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

trait HasCart
{
    protected function addCart(){
        $this->setSessionCart();
        if ($user=$this->isLogin()){
            $cart=Cart::firstOrCreate(['user_id'=>$user->id],[
                'cart_token'=>$this->getSessionCart(),
                'status'=>'active'
            ]);
        }else{
            $cart=Cart::firstOrCreate(['cart_token'=>$this->getSessionCart()],[
                'status'=>'active'
            ]);
        }
    }
    protected function isLogin(){
        return Auth::user();
    }
    protected function findCart(){

    }
    protected function generateToken(){
        $token=Cart::generateToken();
        return $token;
    }
    protected function setSessionCart(){
        session('cart')->put($this->generateToken());
    }
    protected function getSessionCart(){
        return session('cart');
    }


}
