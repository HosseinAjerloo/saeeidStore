<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
                        'password'=>null
                    ]
                );
                Auth::login($newUser, true);
                return redirect()->route('panel.index');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->route('panel.index');
        }
    }
}
