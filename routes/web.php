<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

DB::enableQueryLog();

Route::get('/', function () {
    return view('home');
});

Route::get('/products', ['uses' => 'ProductController@index', 'as' => 'product.index']);

Route::get('/products/{product}', ['uses' => 'ProductController@show', 'as' => 'product.show']);

Route::get('/order', ['uses' => 'OrderController@show', 'as' => 'order.checkout']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
