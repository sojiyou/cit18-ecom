<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\OrderManager;
use App\Http\Controllers\ProductsManager;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('welcome');
});

Route::get('/home', [ProductsManager::class, 'index'])
        ->name('home');

Route::get('details/{slug}', [ProductsManager::class, 'show'])
        ->name('products.details');

Route::middleware('auth')->group(function () {
    Route::get('cart/{id}', [ProductsManager::class, 'addToCart'])
    ->name('cart.add');

    Route::get('cart', [ProductsManager::class, 'showCart'])
    ->name('cart.show');
    
    Route::get('checkout', [OrderManager::class, 'showCheckout'])
    ->name('checkout.show');
    
    Route::post('checkout', [OrderManager::class, 'checkoutPost'])
    ->name('checkout.post');

    Route::get('history', [OrderManager::class, 'Orderhistory'])
    ->name('order.history');

    Route::get('payment', [OrderManager::class, 'confirmPayment'])
    ->name('payment.show');

    Route::post('payment', [OrderManager::class, 'paymentPost'])
    ->name('payment.post');

});

Route::get('login', [AuthManager::class, 'login'])
    ->name('login');

Route::get('logout', [AuthManager::class, 'logout'])
->name('logout');

Route::post('login', [AuthManager::class, 'loginPost'])
    ->name('login.post');

Route::get('register', [AuthManager::class, 'register'])
    ->name('register');

Route::post('register', [AuthManager::class, 'registerPost'])
    ->name('register.post');

