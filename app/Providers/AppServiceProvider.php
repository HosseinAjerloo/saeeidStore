<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\ProductGroup;
use App\Service\Cart\CartService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        \view()->composer('panel.Layout.header', function (View $view) {
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
            }

            $categories = ProductGroup::whereNull('parent_id')->wherehas('childs')->where('is_active', '1')->limit(3)->get();
            $view->with(['categories' => $categories, 'cart' => $cart]);
        });
    }
}
