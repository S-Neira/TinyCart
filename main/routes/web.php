<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('index');
    });

    Route::view('/cart', 'cart')->name('cart');

    // CRUD Products
    Route::resource('products', ProductController::class);


