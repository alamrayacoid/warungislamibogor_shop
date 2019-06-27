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
Route::get('/', 'Frontpage\FrontpageController@frontpage')->name('home');



// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/signup', 'Frontpage\FrontpageController@register_frontpage')->name('register_frontpage-frontpage');
Route::get('/signin', 'Frontpage\FrontpageController@login_frontpage')->name('login-frontpage');
Route::post('/login', 'Frontpage\FrontpageController@login')->name('login');
Route::post('/register', 'Frontpage\FrontpageController@register')->name('register');
Route::post('/logout', 'Frontpage\FrontpageController@logout')->name('logout');


Route::get('/produk', 'Frontpage\ProdukController@produk')->name('produk-frontpage');
Route::get('/produk-detail', 'Frontpage\ProdukController@produk_detail')->name('produk-detail-frontpage');
// Group wib-cpanel
Route::get('/keranjang', 'Frontpage\KeranjangController@keranjang')->name('keranjang-frontpage');
//add cart 
Route::post('/addcart', 'Frontpage\KeranjangController@addcart')->name('addcart');

// Status semua
Route::get('pembelian/semua', 'Frontpage\PembelianController@pembelian')->name('pembelian-semua-frontpage');
// Status pembayaran
Route::get('pembelian/pembayaran', 'Frontpage\PembelianController@pembelian')->name('pembelian-pembayaran-frontpage');
// Status diproses
Route::get('pembelian/diproses', 'Frontpage\PembelianController@pembelian')->name('pembelian-diproses-frontpage');
// Status dikirim
Route::get('pembelian/dikirim', 'Frontpage\PembelianController@pembelian')->name('pembelian-dikirim-frontpage');

// Wishlist
Route::get('/wishlist', 'Frontpage\WishlistController@wishlist')->name('wishlist-frontpage');
// system wishlist
Route::post('/addwishlist', 'Frontpage\WishlistController@addwishlist')->name('addwishlist');


// Profile
Route::get('/profile', 'Frontpage\ProfileController@profile')->name('profile');

// Checkout
Route::get('/checkout', 'Frontpage\CheckoutController@checkout')->name('checkout');
	
//End Route::Group wib-cpanel
