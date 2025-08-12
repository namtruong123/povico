<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Ecom\HomeController::class, 'index'])->name('ecom.home');

// Auth routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Admin routes
Route::middleware('auth')->group(function () {
    Route::get('admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::get('categories/subcategories', [\App\Http\Controllers\Admin\CategoryController::class, 'subcategories'])->name('categories.subcategories');
    Route::resource('attribute_groups', \App\Http\Controllers\Admin\ProductAttributeGroupController::class);
    Route::resource('attributes', \App\Http\Controllers\Admin\ProductAttributeController::class);
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
    Route::get('attributes/by-group/{group}', [\App\Http\Controllers\Admin\ProductAttributeController::class, 'byGroup']);
    Route::delete('products/gallery/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'deleteGallery'])
        ->name('products.deleteGallery');
    Route::resource('lookbooks', \App\Http\Controllers\Admin\LookbookController::class);
    Route::resource('banners', \App\Http\Controllers\Admin\BannerController::class);
    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
    Route::resource('footers', \App\Http\Controllers\Admin\FooterController::class)->middleware('auth');
    Route::get('about/edit', [\App\Http\Controllers\Admin\AboutPageController::class, 'edit'])->name('about.edit');
    Route::post('about/update', [\App\Http\Controllers\Admin\AboutPageController::class, 'update'])->name('about.update');
});
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('category/{slug}', [\App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('shop.category');
Route::get('/product/{slug}', [\App\Http\Controllers\Ecom\ProductController::class, 'detail'])->name('product.detail');
Route::get('/san-pham', [\App\Http\Controllers\Ecom\ProductController::class, 'all'])->name('product.all');
Route::get('/products/filter', [\App\Http\Controllers\Ecom\ProductController::class, 'filter'])->name('products.filter');
Route::get('/products/list', [\App\Http\Controllers\Ecom\ProductController::class, 'list'])->name('products.list');
Route::get('/san-pham/phan-trang', [\App\Http\Controllers\Ecom\ProductController::class, 'pagination'])->name('products.pagination');
Route::get('/san-pham/loadmore', [\App\Http\Controllers\Ecom\ProductController::class, 'loadmore'])->name('products.loadmore');
// Hiển thị sản phẩm với cuộn vô hạn
Route::get('/san-pham/infinite', [\App\Http\Controllers\Ecom\ProductController::class, 'infinite'])->name('products.infinite');
// Hiển thị sản phẩm theo kiểu (style)
Route::get('/san-pham/style/{style}', [\App\Http\Controllers\Ecom\ProductController::class, 'style'])->name('product.style');

//cart
use App\Http\Controllers\Ecom\CartController;
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add',    [CartController::class,'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class,'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class,'remove'])->name('cart.remove');
Route::get( '/cart/modal',  [CartController::class,'modal'])->name('cart.modal');

Route::get('/checkout', [\App\Http\Controllers\Ecom\OrderController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [\App\Http\Controllers\Ecom\OrderController::class, 'process'])->name('checkout.process');
Route::get('/order/tracking', [\App\Http\Controllers\Ecom\OrderController::class, 'tracking'])->name('order.tracking');

Route::get('/wishlist', [\App\Http\Controllers\Ecom\WishlistController::class, 'index'])->name('wishlist');
Route::post('/wishlist/add', [\App\Http\Controllers\Ecom\WishlistController::class, 'add'])->name('wishlist.add');
Route::post('/wishlist/remove', [\App\Http\Controllers\Ecom\WishlistController::class, 'remove'])->name('wishlist.remove');

Route::get('/about', [\App\Http\Controllers\Ecom\HomeController::class, 'about'])->name('about');
Route::get('/contact', [\App\Http\Controllers\Ecom\HomeController::class, 'contact'])->name('contact');


//order admin
 Route::get('orders', [\App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.orders.index');
Route::get('orders/{order}', [\App\Http\Controllers\Admin\OrderController::class, 'show'])->name('admin.orders.show');
Route::get('/order/{order}', [\App\Http\Controllers\Ecom\OrderController::class, 'detail'])->name('order.detail');

Route::get('/tin-tuc', [\App\Http\Controllers\Ecom\PostController::class, 'index'])->name('posts.index');
Route::get('/tin-tuc/{slug}', [\App\Http\Controllers\Ecom\PostController::class, 'show'])
    ->name('posts.show');
Route::get('/search-products', [\App\Http\Controllers\Ecom\ProductController::class, 'search'])->name('products.search');
Route::get('/autocomplete-products', [\App\Http\Controllers\Ecom\ProductController::class, 'autocomplete'])->name('products.autocomplete');


use App\Http\Controllers\Ecom\ProductController;

Route::get('/quickview/{id}', [ProductController::class, 'quickview'])->name('product.quickview');