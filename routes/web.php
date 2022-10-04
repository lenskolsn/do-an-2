<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
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
    // Trang đăng xuất
    Route::get('/dang-xuat', [CustomerController::class, 'logout'])->name("home.logout");
    // Trang giới thiệu
    Route::get('/gioi-thieu', [HomeController::class, 'about'])->name("about");
    // Trang sản phẩm
    Route::get('/san-pham/{id?}', [HomeController::class, 'product'])->name("product");
    // Trang thông tin  
    Route::get('/thong-tin', [CustomerController::class, 'info'])->name("home.info")->middleware('customer');
    // Trang tin tức
    Route::get('/tin-tuc', [HomeController::class, 'news'])->name("home.news");
    // Trang chi tiết bài viết
    Route::get('/chi-tiet-bai-viet/{id?}', [HomeController::class, 'new_detail'])->name("home.new_detail");
    // Comment
    Route::post('/binh-luan', [CommentController::class, 'store'])->name('home.comment.store')->middleware('customer');
    // Xóa comment
    Route::get('/binh-luan/{id?}', [CommentController::class, 'delete'])->name('home.comment.delete')->middleware('customer');
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
    // Khách hàng
    Route::prefix('customers')->middleware('auth')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('admin.customer');
        Route::get('/add', [CustomerController::class, 'add'])->name('admin.customer.add');
        Route::get('/edit/{id?}', [CustomerController::class, 'edit'])->name('admin.customer.edit');
        Route::post('/store/{id?}', [CustomerController::class, 'store'])->name('admin.customer.store');
        Route::get('/delete/{id?}', [CustomerController::class, 'delete'])->name('admin.customer.delete');
    });
    // Bài viết
    Route::prefix('posts')->middleware('auth')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('admin.post');
        Route::get('/add', [PostController::class, 'add'])->name('admin.post.add');
        Route::get('/edit/{id?}', [PostController::class, 'edit'])->name('admin.post.edit');
        Route::get('/show/{id?}', [PostController::class, 'show'])->name('admin.post.show');
        Route::post('/store/{id?}', [PostController::class, 'store'])->name('admin.post.store');
        Route::get('/delete/{id?}', [PostController::class, 'delete'])->name('admin.post.delete');
    });
    // Bình luận
    Route::prefix('comments')->group(function () {
        Route::get('/', [CommentController::class, 'index'])->name('admin.comment');
        Route::get('/edit/{id?}', [CommentController::class, 'edit'])->name('admin.comment.edit');
        Route::post('/store/{id?}', [CommentController::class, 'store'])->name('admin.comment.store');
        Route::get('/delete/{id?}', [CommentController::class, 'delete'])->name('admin.comment.delete');
    });
    
});
