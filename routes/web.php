<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::middleware(['auth'])->group(function(){

	Route::resource('/product','App\Http\Controllers\ProductController')->names('product');
	Route::resource('/cart','App\Http\Controllers\CartController')->names('cart');
	Route::resource('/transaction','App\Http\Controllers\TransactionController')->names('transaction');

	Route::resource('/transaction_detail','App\Http\Controllers\TransactionDetailController')->names('transaction_detail');
	Route::resource('/user','App\Http\Controllers\UserController')->names('user');
});