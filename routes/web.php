<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\GalleryImageController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\PostsController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\web\CartController;
use App\Http\Controllers\web\ContactController;
use App\Http\Controllers\web\CustomerController as WebCustomerController;
use App\Http\Controllers\web\GalleryController;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\web\PostsController as WebPostsController;
use App\Http\Controllers\web\ProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// .......................................................................BEGIN............................................................................
// trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');
// sản phẩm
Route::get('products/detail/{id}', [ProductsController::class, 'detail'])->name('detail');
Route::get('products/all', [ProductsController::class, 'products'])->name('products');
Route::get('products/new', [ProductsController::class, 'products_new']);
Route::get('products/selling', [ProductsController::class, 'products_selling']);
Route::get('category/products/{id}', [ProductsController::class, 'products_category']);
// bài viết
Route::get('blogs/news', [WebPostsController::class, 'index'])->name('news');
Route::get('blogs/news/detail/{id}', [WebPostsController::class, 'detail']);
Route::get('blogs/gallery', [GalleryController::class, 'index'])->name('gallery');
// giới thiệu
Route::get('blogs/introduce',[GalleryController::class, 'introduce']);
// giỏ hàng
Route::get('cart',[CartController::class, 'index']);
// checkout
Route::get('checkout',[CartController::class, 'checkout']);
// checkout
Route::get('account/information',[WebCustomerController::class, 'index']);
Route::get('order/order-detail/{id}',[WebCustomerController::class, 'detail']);
Route::get('pages/contact',[ContactController::class, 'index'])->name('contact');
// .......................................................................END............................................................................
Route::fallback(function () {
    return view('web.errors.404');
});
// .......................................................................BEGIN............................................................................


// management
Route::group(['prefix' => 'admin'], function () {
    // auth
    Route::group(['prefix' => 'auth'], function () {
        Route::get('login', [AuthController::class, 'index'])->name('login');
        Route::post('login', [AuthController::class, 'post_login'])->name('post_login');
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    });
    // management
    Route::group(['middleware' => ['auth']], function () {
        Route::get('', [DashboardController::class, 'index'])->name('dashboard');
        // user
        Route::get('list-user', [UserController::class, 'index'])->name('users')->middleware('can:list-user');
        // customers
        Route::get('list-customer', [CustomerController::class, 'index'])->name('customers')->middleware('can:list-customer');
        // role
        Route::get('list-category', [CategoryController::class, 'index'])->name('category')->middleware('can:list-category');
        // category
        Route::get('list-role', [RoleController::class, 'index'])->name('roles')->middleware('can:list-role');
        // products
        Route::get('list-product', [ProductController::class, 'index'])->name('list-product')->middleware('can:list-product');
        Route::get('create-product', [ProductController::class, 'create'])->name('create-product')->middleware('can:create-product');
        Route::post('post-create-product', [ProductController::class, 'store'])->name('post-create-product');
        Route::get('edit-product/{id}', [ProductController::class, 'edit'])->name('edit-product')->middleware('can:update-product');
        Route::post('update-product/{id}', [ProductController::class, 'update'])->name('update-product');
        // posts
        Route::get('list-posts', [PostsController::class, 'index'])->name('list-posts')->middleware('can:list-posts');
        // posts
        Route::get('list-gallery-images', [GalleryImageController::class, 'index'])->name('list-gallery-images');
        // order
        Route::get('list-order', [OrderController::class, 'index'])->name('list-order')->middleware('can:list-order');
        Route::get('detail-order/{id}', [OrderController::class, 'detail'])->name('detail-order')->middleware('can:detail-order');
        ;
    });
});
// .......................................................................END............................................................................
