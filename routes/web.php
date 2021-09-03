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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/register', ['uses' => 'RegisterController@index', 'as' => 'auth.register']);

Route::get('/products', ['uses' => 'ProductController@index', 'as' => 'product.index']);

Route::get('/products/{product}', ['uses' => 'ProductController@show', 'as' => 'product.show']);

Route::get('/category/{category}', ['uses' => 'ProductController@showProductByCategory', 'as' => 'product.showProductByCategory']);

Route::get('/search/name', 'ProductController@searchByName');

// Route::get('/order', ['uses' => 'OrderController@show', 'as' => 'order.checkout']);
Auth::routes();


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
});
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'adminLogin'], function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::resource('users', 'UserController');
    Route::get('categories/{category}/show-child', 'CategoryController@showChild')->name('categories.showChild');
    Route::resource('categories', 'CategoryController');
    Route::resource('orders', 'OrderController');
    Route::get('delProductImage', 'ProductController@delProductImage')->name('delImage');
    Route::resource('products', 'ProductController');
    
});

Route::group(['namespace' => 'Home'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Route::resource('products', 'ProductController');
    // Route::get('/profile', 'UserController@index')->name('user.info');
    Route::get('/cart', 'CartController@index')->name('cart');
    // Route::get('/checkout','OrderController@create')->name('order.create');
    Route::resource('orders', 'OrderController');
    Route::get('/test', 'TestController@index')->name('test');
    Route::get('/test/getData', 'TestController@getData');
    Route::get('/test/getTmp', 'TestController@getTmp');
});