<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix("/")->group(function () {
    // Trang chủ
    Route::get('/', [HomeController::class, 'index'])->name("home");
    // Tìm kiếm
    Route::get('/tim-kiem', [HomeController::class, 'search'])->name("home.search");
    // Đăng nhập client
    Route::get('/dang-nhap', [CustomerController::class, 'login'])->name("home.login");
    Route::post('/dang-nhap', [CustomerController::class, 'login_store'])->name("home.login.store");
    // Đăng ký client
    Route::get('/dang-ky', [CustomerController::class, 'register'])->name("home.register");
    Route::post('/dang-ky', [CustomerController::class, 'register_store'])->name("home.register.store");
    // Trang giới thiệu
    Route::get('/gioi-thieu', [HomeController::class, 'about'])->name("about");
    // Trang sản phẩm
    Route::get('/san-pham/{id?}', [HomeController::class, 'product'])->name("product");
    // Trang thông tin  
    Route::get('/thong-tin', [CustomerController::class, 'info'])->name("home.info");

});
Route::prefix('admin')->group(function () {
    // Đăng nhập
    Route::get('/', [AdminController::class, 'index'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'store_login'])->name('admin.store_login');
    // Đăng ký admin
    Route::get('/register', [AdminController::class, 'register'])->name('admin.register');
    Route::post('/store-register', [AdminController::class, 'store_register'])->name('admin.store_register');
    // Đăng xuât
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth');

    // Sản phẩm
    Route::prefix('products')->middleware('auth')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.product');
    });
    // Danh mục
    Route::prefix('categories')->middleware('auth')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.category');
    });
    // User
    Route::prefix('users')->middleware('auth')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user');
        Route::get('/add', [UserController::class, 'add'])->name('admin.user.add');
        Route::get('/edit/{id?}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('/store/{id?}', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/delete/{id?}', [UserController::class, 'delete'])->name('admin.user.delete');
    });

});
