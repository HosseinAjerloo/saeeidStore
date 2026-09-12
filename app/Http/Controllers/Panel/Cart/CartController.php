<?php

namespace App\Http\Controllers\Panel\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Cart\CartRequest;
use App\Models\Cart;
use App\Models\CartItem;
use App\Service\Cart\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        $cart = Cart::query()
            ->when(Auth::user(), function ($query, $user) {
                $query->where('user_id', $user->id);
            })
            ->when(session('cart_item'), function ($query, $cartToken) {
                $query->where('cart_token', $cartToken);
            })
            ->where('status', 'active')
            ->first();
        return view('panel.cart.index', compact('cart'));
    }
    public function addCart(CartRequest $request, CartService $cartService)
    {
        $cartService->addToCart();
        return $cartService->responseHttpClient();
    }
    public function updateQuantity(CartItem $cartItem, Request $request, CartService $cartService)
    {
        $request->validate(
            [
                'quantity' => 'required|integer|min:1',
            ],
            [
                'quantity.required' => 'تعداد محصول الزامی است.',
                'quantity.integer' => 'تعداد محصول باید عدد صحیح باشد.',
                'quantity.min' => 'تعداد محصول باید حداقل ۱ عدد باشد.',
            ]
        );
        $cartService->updateCartItemQuantity($cartItem, $request->input('quantity'));
        return $cartService->responseHttpClient();
    }
}
