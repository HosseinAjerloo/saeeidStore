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
        \view()->composer('panel.Layout.header',function (View $view){
           $categories=ProductGroup::whereNull('parent_id')->wherehas('childs')->where('is_active','1')->limit(3)->get();
           $view->with(['categories'=>$categories]);
        });
    }
}
