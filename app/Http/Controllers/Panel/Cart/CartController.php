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

    public function index(CartService $cartService)
    {
        $cart = null;

        $userId = Auth::id();
        $cartToken = session('cart_item');

        if ($userId || $cartToken) {
            $cart = Cart::query()
                ->where('status', 'active')
                ->where(function ($query) use ($userId, $cartToken) {

                    $query->when($userId, function ($query) use ($userId) {
                        $query->where('user_id', $userId);
                    });

                    $query->when($cartToken, function ($query) use ($cartToken) {
                        $query->orWhere('cart_token', $cartToken);
                    });
                })
                ->first();
            $cartService->calculateCartTotal();
        }

        if (!isset($cart))
            return redirect()->route('panel.index')->with(['error' => 'سبد خرید شما خالی میباشد']);
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

    public function applyDiscount(Request $request, CartService $cartService)
    {

        $request->validate([
            'quantity' => 'required|exists:discounts,code'
        ], [
            'quantity.required' => 'وارد کردن کپن تخفیف الزامی است',
            'quantity.exists' => 'کد تخفیف وارد شده صحیح  نمیباشد',
        ]);
        $cartService->applyDiscountCode();
        return $cartService->responseHttpClient();
    }
}
