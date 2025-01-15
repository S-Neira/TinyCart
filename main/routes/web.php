<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

    Route::middleware([IsAdmin::class])->group(function () {
        // CRUD Products
        Route::resource('products', ProductController::class);
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });

    Route::get('/', function () {
        return view('index');
    })->name('index');

    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::view('/login', 'login')->name('login-form');
    Route::view('/cart', 'cart')->name('cart');



