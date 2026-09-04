<?php

use App\Models\Discount;
use App\Models\ProductGroup;
use Illuminate\Support\Facades\Route;

//admin
Route::prefix('admin')->name('admin.')->group(function (){
   Route::prefix('user')->name('user.')->group(function (){
       Route::get('',[\App\Http\Controllers\Admin\User\UserController::class,'index'])->name('index');
       Route::get('create',[\App\Http\Controllers\Admin\User\UserController::class,'create'])->name('create');
       Route::post('store',[\App\Http\Controllers\Admin\User\UserController::class,'store'])->name('store');
       Route::get('edit/{user}',[\App\Http\Controllers\Admin\User\UserController::class,'edit'])->name('edit');
       Route::put('update/{user}',[\App\Http\Controllers\Admin\User\UserController::class,'update'])->name('update');
       Route::delete('destroy/{user}',[\App\Http\Controllers\Admin\User\UserController::class,'destroy'])->name('destroy');
   });
   Route::prefix('category')->name('category.')->group(function (){
       Route::get('',[\App\Http\Controllers\Admin\Category\ProductCategory::class,'index'])->name('index');
       Route::get('create',[\App\Http\Controllers\Admin\Category\ProductCategory::class,'create'])->name('create');
       Route::post('store',[\App\Http\Controllers\Admin\Category\ProductCategory::class,'store'])->name('store');
       Route::get('edit/{productGroup}',[\App\Http\Controllers\Admin\Category\ProductCategory::class,'edit'])->name('edit');
       Route::put('update/{productGroup}',[\App\Http\Controllers\Admin\Category\ProductCategory::class,'update'])->name('update');
       Route::delete('destroy/{productGroup}',[\App\Http\Controllers\Admin\Category\ProductCategory::class,'destroy'])->name('destroy');
   });

    Route::prefix('brand')->name('brand.')->group(function (){
        Route::get('',[\App\Http\Controllers\Admin\Brand\BrandController::class,'index'])->name('index');
        Route::get('create',[\App\Http\Controllers\Admin\Brand\BrandController::class,'create'])->name('create');
        Route::post('store',[\App\Http\Controllers\Admin\Brand\BrandController::class,'store'])->name('store');
        Route::get('edit/{productBrand}',[\App\Http\Controllers\Admin\Brand\BrandController::class,'edit'])->name('edit');
        Route::put('update/{productBrand}',[\App\Http\Controllers\Admin\Brand\BrandController::class,'update'])->name('update');
        Route::delete('destroy/{productBrand}',[\App\Http\Controllers\Admin\Brand\BrandController::class,'destroy'])->name('destroy');
    });

    Route::prefix('attribute')->name('attribute.')->group(function (){
        Route::get('',[\App\Http\Controllers\Admin\Attribute\AttributeController::class,'index'])->name('index');
        Route::get('create',[\App\Http\Controllers\Admin\Attribute\AttributeController::class,'create'])->name('create');
        Route::post('store',[\App\Http\Controllers\Admin\Attribute\AttributeController::class,'store'])->name('store');
        Route::get('edit/{attribute}',[\App\Http\Controllers\Admin\Attribute\AttributeController::class,'edit'])->name('edit');
        Route::put('update/{attribute}',[\App\Http\Controllers\Admin\Attribute\AttributeController::class,'update'])->name('update');
        Route::delete('destroy/{attribute}',[\App\Http\Controllers\Admin\Attribute\AttributeController::class,'destroy'])->name('destroy');
    });

    Route::prefix('product')->name('product.')->group(function (){
        Route::get('',[\App\Http\Controllers\Admin\Product\ProductController::class,'index'])->name('index');
        Route::get('create',[\App\Http\Controllers\Admin\Product\ProductController::class,'create'])->name('create');
        Route::post('store',[\App\Http\Controllers\Admin\Product\ProductController::class,'store'])->name('store');
        Route::get('edit/{product}',[\App\Http\Controllers\Admin\Product\ProductController::class,'edit'])->name('edit');
        Route::put('update/{product}',[\App\Http\Controllers\Admin\Product\ProductController::class,'update'])->name('update');
        Route::delete('destroy/{product}',[\App\Http\Controllers\Admin\Product\ProductController::class,'destroy'])->name('destroy');
        Route::prefix('variant')->name('variant.')->group(function (){
            Route::get('create/{product}',[\App\Http\Controllers\Admin\Product\ProductController::class,'variant'])->name('create');
            Route::post('store/{product}',[\App\Http\Controllers\Admin\Product\ProductController::class,'variantStore'])->name('store');
            Route::get('show/{product}',[\App\Http\Controllers\Admin\Product\ProductController::class,'show'])->name('show');
            Route::get('edit/{product}/{productVariant}',[\App\Http\Controllers\Admin\Product\ProductController::class,'editVariant'])->name('editVariant');
            Route::put('update/{product}/{productVariant}',[\App\Http\Controllers\Admin\Product\ProductController::class,'updateVariant'])->name('updateVariant');
            Route::delete('update/{productVariant}',[\App\Http\Controllers\Admin\Product\ProductController::class,'destroyVariant'])->name('destroyVariant');
        });
    });

    Route::prefix('tag')->name('tag.')->group(function (){
        Route::get('',[\App\Http\Controllers\Admin\Tag\TagController::class,'index'])->name('index');
        Route::get('/create',[\App\Http\Controllers\Admin\Tag\TagController::class,'create'])->name('create');
        Route::post('/store',[\App\Http\Controllers\Admin\Tag\TagController::class,'store'])->name('store');
        Route::get('/edit/{tag}',[\App\Http\Controllers\Admin\Tag\TagController::class,'edit'])->name('edit');
        Route::put('/update/{tag}',[\App\Http\Controllers\Admin\Tag\TagController::class,'update'])->name('update');
        Route::delete('/destroy/{tag}',[\App\Http\Controllers\Admin\Tag\TagController::class,'destroy'])->name('destroy');
        Route::get('sync-product/{product}',[\App\Http\Controllers\Admin\Tag\TagController::class,'syncProduct'])->name('syncProduct');
        Route::post('sync-product/store/{product}',[\App\Http\Controllers\Admin\Tag\TagController::class,'syncProductStore'])->name('syncProductStore');
        Route::get('sync-product-edit/{tag}',[\App\Http\Controllers\Admin\Tag\TagController::class,'syncProductEdit'])->name('syncProductEdit');
        Route::put('sync-product-update/{tag}',[\App\Http\Controllers\Admin\Tag\TagController::class,'syncProductUpdate'])->name('syncProductUpdate');

    });

    Route::prefix('discount')->name('discount.')->group(function (){
       Route::get('/',[\App\Http\Controllers\Admin\Discount\DisCountController::class,'index'])->name('index');
       Route::get('create',[\App\Http\Controllers\Admin\Discount\DisCountController::class,'create'])->name('create');
       Route::post('store',[\App\Http\Controllers\Admin\Discount\DisCountController::class,'store'])->name('store');
       Route::get('edit/{discount}',[\App\Http\Controllers\Admin\Discount\DisCountController::class,'edit'])->name('edit');
       Route::put('update/{discount}',[\App\Http\Controllers\Admin\Discount\DisCountController::class,'update'])->name('update');
       Route::delete('destroy/{discount}',[\App\Http\Controllers\Admin\Discount\DisCountController::class,'destroy'])->name('destroy');
    });
});

//panel

Route::name('panel.')->group(function (){
   Route::get('/',[App\Http\Controllers\Panel\PanelController::class,'index'])->name('index');
   Route::get('{product:slug}/{productVariant}',[App\Http\Controllers\Panel\PanelController::class,'show'])->name('show');
   Route::get('faq',[App\Http\Controllers\Panel\PanelController::class,'faq'])->name('faq');

   Route::name('cart.')->prefix('cart')->group(function (){
      Route::get('/',[App\Http\Controllers\Panel\Cart\CartController::class,'index'])->name('index');
   });
});
Route::get('test',function (){

});
