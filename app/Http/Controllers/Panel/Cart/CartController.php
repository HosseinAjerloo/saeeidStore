<?php

namespace App\Http\Controllers\Panel\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Cart\CartRequest;
use App\Models\Cart;
use App\Models\CartItem;
use App\Service\Cart\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            if(!isset($cart))
                return redirect()->route('panel.index')->with(['error'=>'سبد خرید شما خالی میباشد']);
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
    public function destroy(Request $request, CartItem $cartItem, CartService $cartService)
    {
        $cartService->removeItem($cartItem);
        return $cartService->responseHttpClient();
    }

    public function applyDiscount(Request $request,CartService $cartService){
     
        $request->validate([
            'quantity'=>'required|exists:discounts,code'
        ],[
            'quantity.required'=>'وارد کردن کپن تخفیف الزامی است',
            'quantity.exists'=>'کد تخفیف وارد شده صحیح  نمیباشد',
        ]);
        $cartService->applyDiscountCode();


    }
}
