<?php

use App\Models\ProductGroup;
use Illuminate\Support\Facades\Route;

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
});
Route::get('test',function (){
    $categories = ProductGroup::where('is_active', '1')->whereNull('parent_id')->get();

    foreach ($categories as $category){
        if ($category->childs()->exists())
        {
            dd('ye');
        }else{
            dd('no');
        }
    }

});
