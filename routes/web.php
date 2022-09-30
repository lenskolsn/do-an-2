<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function(){
    Route::get('/',[AdminController::class,'index']);

    Route::prefix('products')->group(function(){
        Route::get('/',[ProductController::class, 'index'])->name('admin.product');
    });
    Route::prefix('categories')->group(function(){
        Route::get('/',[CategoryController::class, 'index'])->name('admin.category');
    });
});