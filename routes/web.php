<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'App\Http\Controllers\LandingpageController@index')->name('obaju.index');
Route::get('/product', 'App\Http\Controllers\LandingpageController@product')->name('obaju.product');
Route::get('/product/{id}', 'App\Http\Controllers\LandingpageController@productDetail')->name('obaju.product-detail');
Route::get('/cari', 'App\Http\Controllers\LandingpageController@cari')->name('obaju.cari');
Route::get('/cart','App\Http\Controllers\LandingpageController@cart')->name('obaju.cart');
Route::post('/cart-updateQuantity','App\Http\Controllers\LAndingpageController@tambahBarang')->name('obaju.updateQuantity');


Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


Route::middleware(['auth'])->group(function () {
	Route::post('/add-cart','App\Http\Controllers\Api\CartsController@store')->name('add-cart');
	Route::get('/cart/delete/{id}','App\Http\Controllers\LandingpageController@cartDestroy')->name('cart-delete');
	Route::prefix('/admin')->group(function () {
		Route::resource('/product', 'App\Http\Controllers\ProductController')->names('product');
		Route::resource('/product_kategori', 'App\Http\Controllers\ProductKategoriController')->names('product_kategori');
		Route::resource('/cart', 'App\Http\Controllers\CartController')->names('cart');
		Route::resource('/transaction', 'App\Http\Controllers\TransactionController')->names('transaction');

		Route::resource('/transaction_detail', 'App\Http\Controllers\TransactionDetailController')->names('transaction_detail');
		Route::resource('/user', 'App\Http\Controllers\UserController')->names('user');
	});
});
