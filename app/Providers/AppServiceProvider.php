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

        \view()->composer('panel.Layout.header',function (View $view){
            $cart = Cart::query()
                ->when(Auth::user(), function ($query, $user) {
                    $query->where('user_id', $user->id);
                })
                ->when(session('cart_item'), function ($query, $cartToken) {
                    $query->where('cart_token', $cartToken);
                })
                ->where('status', 'active')
                ->first();
            
           $categories=ProductGroup::whereNull('parent_id')->wherehas('childs')->where('is_active','1')->limit(3)->get();
           $view->with(['categories'=>$categories,'cart'=>$cart]);
        });
    }
}
