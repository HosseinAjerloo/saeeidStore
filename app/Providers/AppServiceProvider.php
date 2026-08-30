<?php

namespace App\Providers;

use App\Models\ProductGroup;
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
        \Illuminate\Support\Facades\View::composer('*',function (View $view){
            $categories = ProductGroup::whereHas('childs.products.productVariant', function ($query) {
                $query->where('is_active', 1)
                    ->where('stock', '>', 0);
            })->whereNull('parent_id')
                ->limit(3)
                ->get();
            $view->with(['categories'=>$categories]);
        });
    }
}
