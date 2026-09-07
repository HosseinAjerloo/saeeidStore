<?php

namespace App\Http\Controllers\Panel\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Cart\CartRequest;
use App\Models\Cart;
use App\Service\Cart\CartService;
use Illuminate\Http\Request;
class CartController extends Controller
{
    public function index(){

        return view('panel.cart.index');
    }
    public function addCart(CartRequest $request,CartService $cartService){
        $cartService->cart();
        dd(session()->get('cart'));

    }
}
