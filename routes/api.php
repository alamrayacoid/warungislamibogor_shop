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

//keranjang
Route::get('/listKeranjangAndroid','Frontpage\KeranjangController@listKeranjangAndroid');
Route::post('/addQtyKeranjangAndroid','Frontpage\KeranjangController@addQtyKeranjangAndroid');
Route::post('/reduceQtyKeranjangAndroid','Frontpage\KeranjangController@reduceQtyKeranjangAndroid');
Route::post('/removelistKeranjangAndroind','Frontpage\KeranjangController@removelistKeranjangAndroind');

//wishlist
Route::get('/listWishlistAndroid','Frontpage\WishlistController@listWishlistAndroid');
Route::post('/removeWishlistAndrouid','Frontpage\WishlistController@removeWishlistAndrouid');