<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/sellers', 'SellerController@index');
Route::get('/sellers/{id}', 'SellerController@show');
Route::post('/sellers', 'SellerController@store');
Route::put('/sellers/{id}', 'SellerController@update');
Route::patch('/sellers/{id}', 'SellerController@edit');
Route::delete('/sellers/{id}', 'SellerController@destroy');

Route::post('/sellers/{sellerId}/address', 'SellerAddressController@store');
Route::put('/sellers/{sellerId}/address', 'SellerAddressController@update');

Route::get('/products', 'ProductController@index');
Route::get('/products/{id}', 'ProductController@show');
Route::post('products', 'ProductController@store');
Route::put('/products/{id}', 'ProductController@update');
Route::patch('/products/{id}', 'ProductController@edit');
Route::delete('/products/{id}', 'ProductController@destroy');

Route::get('/products/{productId}/review', 'ReviewController@index');
Route::post('/products/{productId}/review', 'ReviewController@store');
Route::delete('/products/{productId}/review/{reviewId}', 'ReviewController@destroy');