<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/users','App\Http\Controllers\Api\UsersController@index')->name('api.users.index');
Route::post('/users','App\Http\Controllers\Api\UsersController@store')->name('api.users.store');
Route::get('/users/{id}','App\Http\Controllers\Api\UsersController@show')->name('api.users.show');
Route::put('/users/{id}','App\Http\Controllers\Api\UsersController@update')->name('api.users.update');
Route::delete('/users/{id}','App\Http\Controllers\Api\UsersController@destroy')->name('api.users.destroy');

Route::get('/products','App\Http\Controllers\Api\ProductsController@index')->name('api.products.index');
Route::post('/products','App\Http\Controllers\Api\ProductsController@store')->name('api.products.store');
Route::get('/products/{id}','App\Http\Controllers\Api\ProductsController@show')->name('api.products.show');
Route::put('/products/{id}','App\Http\Controllers\Api\ProductsController@update')->name('api.products.update');
Route::delete('/products/{id}','App\Http\Controllers\Api\ProductsController@destroy')->name('api.products.destroy');

Route::get('/carts','App\Http\Controllers\Api\CartsController@index')->name('api.carts.index');
Route::post('/carts','App\Http\Controllers\Api\CartsController@store')->name('api.carts.store');
Route::delete('/carts/{id}','App\Http\Controllers\Api\CartsController@destroy')->name('api.carts.destroy');

Route::post('/checkout','App\Http\Controllers\Api\CheckoutController@store')->name('api.checkout.store');

Route::get('/transaction/{id}','App\Http\Controllers\Api\TransactionController@show')->name('api.transaction.show');
//Route::apiResource('/users','App\Http\Controllers\Api\UsersController') // semua method

// Route::apiResource(/'products','App\Http\Controllers\Api\UsersController')->only['store']); 