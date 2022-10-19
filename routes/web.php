<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReplyController;
use Illuminate\Support\Facades\Route;

Route::get('test',function(){
    return view('test');
});
// Client
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
    Route::get('/gioi-thieu', [HomeController::class, 'about'])->name("home.about");
    // Trang sản phẩm
    Route::get('/san-pham/{id?}', [HomeController::class, 'product'])->name("home.product");
    // Trang Chi tiết sản phẩm
    Route::get('/chi-tiet/{id?}', [HomeController::class, 'product_detail'])->name("home.product_detail");
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
    // Reply
    Route::post('/tra-loi', [ReplyController::class, 'store'])->name('home.reply.store')->middleware('customer');
    // Liên hệ
    Route::get('/lien-he',[HomeController::class, 'contact'])->name('home.contact');
    Route::post('/lien-he',[HomeController::class, 'contact_store'])->name('home.contact.store');
    // Thực đơn
    Route::get('/thuc-don',[HomeController::class, 'menu'])->name('home.menu');
    
});
// Admin
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
        Route::get('/list', [ProductController::class, 'list']);
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

    Route::prefix('banners')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('admin.banner');
        Route::get('/add', [BannerController::class, 'add'])->name('admin.banner.add');
        Route::get('/edit/{id?}', [BannerController::class, 'edit'])->name('admin.banner.edit');
        Route::post('/store/{id?}', [BannerController::class, 'store'])->name('admin.banner.store');
        Route::get('/delete/{id?}', [BannerController::class, 'delete'])->name('admin.banner.delete');
    });
    
});
