<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use App\Service\Cart\CartService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

use function Pest\Laravel\session;

class AuthController extends Controller
{
    public function viewLogin()
    {
        return view('auth.login');
    }

    public function viewRegister()
    {
        return view('auth.register');
    }

    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallBack()
    {
        try {
            $user = Socialite::driver('google')->user();

            if (isset($user->user)) {
                $user = $user->user;
                $newUser = User::updateOrCreate(
                    [
                        'email' => $user['email']
                    ],
                    [
                        'name' => $user['name'],
                        'family' => $user['family_name'],
                        'password' => null
                    ]
                );
                $sessionValue = Session::get('cart_item');
                Auth::login($newUser, true);

                if ($sessionValue) {
                    Session::put('cart_item', $sessionValue);

                    $cart = Cart::where('cart_token', $sessionValue)->latest()->first();
                    if ($cart) {
                        $cart->user_id = $newUser->id;
                        $cart->save();
                    }
                }

                $cart = $newUser->carts()->whereHas('cartItems')
                    ->where('status', 'active')
                    ->latest()->with('cartItems')
                    ->first();

                $outherCarts = $newUser->carts()->where(function ($query) use ($cart) {

                    $query->when($cart, function ($query) use ($cart) {

                        $query->where('id', '!=', $cart->id)->where('status', 'active');
                    });
                })->whereHas('cartItems')->with('cartItems');

                $userCarts = $outherCarts->get();

                if ($userCarts->isNotEmpty()) {
                    $currentItems = $cart->cartItems;

                    $otherItems = $userCarts->flatMap->cartItems;

                    $differenceCartItems = $otherItems->filter(function ($otherItem) use ($currentItems) {
                        return !$currentItems->contains(function ($currentItem) use ($otherItem) {

                            if ($currentItem->variant_id != $otherItem->variant_id) {
                                return false;
                            }

                            return empty(array_diff(
                                $otherItem->variant_attribute_ids??[],
                                $currentItem->variant_attribute_ids??[]
                            ));
                        });
                    });
                    $outherCarts->delete();
                    $cart->cartItems()->createMany($differenceCartItems->toArray());
                }

                if ($cart) {
                    $cartService = new CartService();
                    $cartService->calculateCartTotal();
                    Session::put('cart_item', $cart->cart_token);
                }




                return redirect()->route('panel.index');
            }
        } catch (Exception $e) {
            return redirect()->route('panel.index');
        }
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect()->route('panel.index');
    }
}
