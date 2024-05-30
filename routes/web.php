<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\DivisiController;
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

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// routes/web.php

// Shop
Route::get('/shop', [ProductController::class, 'index'])->name('shop.index');
Route::get('/shop/product/{slug}', [ProductController::class, 'show'])->name('shop.show');

Route::middleware(['auth', 'verified'])->group(function () {
    // Cart Route
    Route::get('/shop/cart', [CartController::class, 'index'])
        ->name('cart.index');
    Route::post('/shop/cart/store', [CartController::class, 'store'])
        ->name('cart.store');
    Route::delete('/shop/cart/{id}', [CartController::class, 'destroy'])
        ->name('cart.destroy');

    // Button Increment & Decrement quantity in cart table
    Route::patch('/shop/cart/increment/{id}', [CartController::class, 'increment'])
        ->name('cart.increment');
    Route::patch('/shop/cart/decrement/{id}', [CartController::class, 'decrement'])
        ->name('cart.decrement');


    // Account Route
    Route::get('/shop/account', [AccountController::class, 'index'])
        ->name('account.index');

    Route::get('/shop/account/alamat', [AccountController::class, 'alamat'])
        ->name('account.alamat');

    Route::patch('/shop/account/update', [AccountController::class, 'update'])
        ->name('account.update');


    // Checkout Route 
    Route::get('/shop/checkout-alamat', [CheckoutController::class, 'index'])->name('shop.checkout-alamat');
    Route::get('/shop/checkout-ongkir/{id}/{total_berat}', [CheckoutController::class, 'ongkir'])->name('shop.checkout-ongkir');

    Route::post('/shop/checkout/store', [CheckoutController::class, 'store'])->name('shop.checkout-store');

    Route::get('/shop/checkout-payment/{no_order}', [CheckoutController::class, 'paymentMethod'])->name('shop.checkout-payment');

    Route::post('/shop/checkout-payment/store', [CheckoutController::class, 'storePayment'])->name('shop.checkout-payment-store');

    Route::get('/shop/checkout-konfirmasi/{no_pembayaran}', [CheckoutController::class, 'konfirmasiPembayaran'])->name('shop.checkout-konfirmasi');

    Route::get('/shop/checkout-sukses/{no_order}', [CheckoutController::class, 'orderDiterima'])->name('shop.checkout-success');

    Route::post('/shop/checkout-konfirmasi/store/{no_pembayaran}', [CheckoutController::class, 'storeBuktiPembayaran'])->name('shop.checkout-konfirmasi-store');

    // Beli Sekarang
    Route::post('shop/product/topi-hitam-laravel', [CheckoutController::class, 'beliSekarang'])->name('beli-sekarang');

    // Cancel Order
    Route::patch('/shop/checkout-konfirmasi/cancel/{no_order}', [CheckoutController::class, 'cancelOrder'])
        ->name('order-cancel');

    // Order History
    Route::get('/shop/account/order-history', [AccountController::class, 'orderHistory'])
        ->name('order-history');

    //Detail Orders
    Route::get('/shop/account/order-history/{no_pembayaran}', [AccountController::class, 'showOrder'])
        ->name('order-detail');
});


//  google auth
Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle'])->name('google.callback');


// Verify email page
Route::get('/email/verify', function () {
    toastr()->info('Link verifikasi telah terkirim!', 'Info', ['timeOut' => 1500]);
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


// Divisi Pages
Route::get('/divisi/{slug}', [DivisiController::class, 'showDevisi'])->name('divisi.show');





// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';


