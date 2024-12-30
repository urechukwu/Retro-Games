<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Cart\CombocartController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;


Route::get('/', [GuestController::class, 'index'])->name('home');
Route::get('/product-view/{product}', [GuestController::class, 'view'])->name('view');
Route::get('/combo-view/{combo}', [GuestController::class, 'viewcombo'])->name('view-combo');
Route::get('/product-all', [GuestController::class, 'viewall'])->name('view-all');
Route::get('/combo-all', [GuestController::class, 'allcombo'])->name('combo-all');


Route::get('/search', SearchController::class)->name('search');

Route::post('/cart-add', [CartController::class, 'buy'])->name('cart-add');
Route::get('/cart-index', [CartController::class, 'index'])->name('cart-index');
Route::post('/cart-checkout', [CartController::class, 'checkout'])->name('cart-checkout');
Route::get('/checkout-status', [CartController::class, 'status'])->name('checkout-status');


Route::post('/combo-add', [CombocartController::class, 'buy'])->name('combo-add');
Route::get('/combocart-index', [CombocartController::class, 'index'])->name('combo-index');
Route::post('/combo-checkout', [CombocartController::class, 'checkout'])->name('combo-checkout');





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');

Route::get('/product', [ProductController::class, 'index'])->name('product-index');
Route::post('/productstore', [ProductController::class, 'store'])->name('product-store');
Route::get('/product-show/{product}', [ProductController::class, 'show'])->name('product-show');
Route::get('/product-edit/{product}', [ProductController::class, 'edit'])->name('product-edit');
Route::put('/product-update/{id}', [ProductController::class, 'update'])->name('product-update');
Route::delete('/product-delete/{id}', [ProductController::class, 'destroy'])->name('product-delete');

Route::get('/tag', [TagController::class, 'index'])->name('tag-index');
Route::post('/tag-store', [TagController::class, 'store'])->name('tag-store');
Route::get('/tag-show/{id}', [TagController::class, 'show'])->name('tag-show');
Route::get('/tag-edit/{id}', [TagController::class, 'edit'])->name('tag-edit');
Route::put('/tag-update/{id}', [TagController::class, 'update'])->name('tag-update');
Route::delete('/tag-delete/{id}', [TagController::class, 'destroy'])->name('tag-destroy');

Route::get('/sales', [SaleController::class, 'index'])->name('sale-index');
Route::post('/sale-store', [SaleController::class, 'store'])->name('sale-store');
Route::get('/sale-show/{id}', [SaleController::class, 'show'])->name('sale-show');
Route::get('/sale-edit/{id}', [SaleController::class, 'edit'])->name('sale-edit');
Route::put('/sale-update/{id}', [SaleController::class, 'update'])->name('sale-update');

Route::get('/customer', [CustomerController::class, 'index'])->name('customer-index');
Route::get('/customer-show/{id}', [CustomerController::class, 'show'])->name('customer-show');

});




require __DIR__.'/auth.php';
