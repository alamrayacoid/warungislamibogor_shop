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

// Route::get('/', function () {
//     return view('home');
//     // for enable login
//     // return redirect('home');
// });
Route::get('/', 'Frontpage\FrontpageController@frontpage');



// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/signup', 'Frontpage\FrontpageController@register_frontpage')->name('register-frontpage');
Route::get('/signin', 'Frontpage\FrontpageController@login_frontpage')->name('login-frontpage');


Route::get('/produk', 'Frontpage\FrontpageController@produk')->name('produk-frontpage');
Route::get('/produk-detail', 'Frontpage\FrontpageController@produk_detail')->name('produk-detail-frontpage');
// Group wib-cpanel
Route::group(['middleware' => 'guest' ], function(){
Route::get('/keranjang', 'Frontpage\FrontpageController@keranjang')->name('keranjang-frontpage');
// Status semua
Route::get('pembelian/semua', 'Frontpage\FrontpageController@pembelian')->name('pembelian-semua-frontpage');
// Status pembayaran
Route::get('pembelian/pembayaran', 'Frontpage\FrontpageController@pembelian')->name('pembelian-pembayaran-frontpage');
// Status diproses
Route::get('pembelian/diproses', 'Frontpage\FrontpageController@pembelian')->name('pembelian-diproses-frontpage');
// Status dikirim
Route::get('pembelian/dikirim', 'Frontpage\FrontpageController@pembelian')->name('pembelian-dikirim-frontpage');

// Wishlist
Route::get('/wishlist', 'Frontpage\FrontpageController@wishlist')->name('wishlist-frontpage');


	
});//End Route::Group wib-cpanel
