<?php

use Illuminate\Support\Facades\Route;

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
// Auth
Auth::routes();
// User
Route::group(['prefix'=>'user', 'namespace'=>'User', 'middleware' => 'user'], function () {
    Route::get('/', 'HomeController@index')->name('user');
    Route::resource('/my-orders', 'OrderController');
});
// Admin
Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'HomeController@index')->name('admin');
    Route::resource('/users', 'UserController');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/orders', 'OrderController');
    Route::post('/orders/complete/{order}', 'OrderController@complete')->name('order-complete');
    Route::get('/new-orders', 'OrderController@new')->name('new-orders');
    Route::resource('/products', 'ProductController');
    Route::post('/delete-gallery-image', 'ProductController@deleteGalleryImage');
    Route::resource('/products/{product}/offers', 'OfferController');
    Route::get('/search', 'SearchController@index')->name('search-results');
});
// Get
Route::get('/', 'HomeController@index')->name('home');
Route::get('/catalog', 'CatalogController@index')->name('catalog');
Route::get('/cart', 'CartController@index')->name('cart');
Route::get('/checkout', 'CheckoutController@index')->name('checkout');
Route::get('/{category}', 'CategoryController@index')->name('category');
Route::get('/{category}/{product}', 'ProductController@index')->name('product');
// Post
Route::post('/cart/add/{product}', 'CartController@add')->name('cart-add');
Route::post('/cart/clear', 'CartController@clear')->name('cart-clear');
Route::post('/cart/calculate', 'CartController@calculate')->name('cart-calculate');
Route::post('/checkout', 'CheckoutController@add')->name('checkout-add');
