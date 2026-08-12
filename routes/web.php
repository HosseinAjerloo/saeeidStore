<?php

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
});
Route::get('test',function (){
   return view('welcome');
});
