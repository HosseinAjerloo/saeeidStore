<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
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
                Auth::login($newUser, true);
                $cart = Cart::where('user_id', $newUser->id)->where('status', 'active')->first();

                if ($cart) {
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
