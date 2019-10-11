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
Route::get('data/lokasi/kota', 'indonesia@kota')->name('kota');
Route::get('data/lokasi/desa', 'indonesia@desa')->name('desa');


// Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'guest'], function () {
Route::get('/signup', 'Frontpage\FrontpageController@register_frontpage')->name('register_frontpage-frontpage');
Route::get('/signin', 'Frontpage\FrontpageController@login_frontpage')->name('login-frontpage');
Route::post('/login', 'Frontpage\FrontpageController@login')->name('login');
Route::post('/register', 'Frontpage\FrontpageController@register')->name('register');

Route::get('/reset-password','Frontpage\ResetPasswordController@index')->name('lupa_password');
Route::post('/kirim-reset-password','Frontpage\ResetPasswordController@kirim_request_password')->name('kirim_request_password');
Route::get('/password/reset/{token}/{email}','Frontpage\ResetPasswordController@resetpasswordform')->name('reset.password.form');
Route::post('/ganti-password-member','Frontpage\ResetPasswordController@ganti_password_member')->name('ganti_password_member');
});
Route::post('/logout', 'Frontpage\FrontpageController@logout')->name('logout');




Route::get('/product', 'Frontpage\ProdukController@produk')->name('produk-frontpage');
Route::get('/filter-product','Frontpage\ProdukController@filter_produk')->name('filter_produk');
Route::post('/stock_check', 'Frontpage\ProdukController@stock_check')->name('stock_check');
Route::get('/product/{slug}', 'Frontpage\ProdukController@produk_detail')->name('produk-detail-frontpage');
Route::get('/category/{slug}','Frontpage\ProdukController@produk_kategori')->name('kategori-produk');

Route::get('/cari-barang','Frontpage\ProdukController@caribarang')->name('cari-barang');
Route::get('/filter-produk','Frontpage/ProdukController@filter_category_product')->name('filter_category_product');
Route::get('/product-filter', 'Frontpage\ProdukController@filter_product_frontpage')->name('produk-filter-frontpage');
// Group wib-cpanel
//add cart 
Route::post('/addcart', 'Frontpage\KeranjangController@addcart')->name('addcart');

Route::group(['middleware' => ['auth.custom']], function(){
Route::get('/keranjang', 'Frontpage\KeranjangController@keranjang')->name('keranjang-frontpage');
Route::post('/keranjang/remove', 'Frontpage\KeranjangController@removecart')->name('remove.keranjang');
Route::post('/keranjang/check', 'Frontpage\KeranjangController@gocheck')->name('check.keranjang');
Route::post('/keranjang/detail_keranjang', 'Frontpage\KeranjangController@detail_keranjang')->name('detail.keranjang');
Route::post('/keranjang/detail_keranjang_nav', 'Frontpage\KeranjangController@detail_keranjang_nav')->name('detail.keranjang.nav');
Route::post('/keranjang/table_keranjang','Frontpage\KeranjangController@table_keranjang')->name('table_keranjang');
Route::post('/keranjang/updatecart', 'Frontpage\KeranjangController@updatecart')->name('updatecart.keranjang');
Route::get('/getnow_price-cart','Frontpage\KeranjangController@getnow_price_cart')->name('getnow_price-cart');
Route::get('/getnow_qty-cart','Frontpage\KeranjangController@getnow_qty_cart')->name('getnow_qty-cart');

//
Route::get('/antrian_layanan','AntrianLayananController@index')->name('antrian_layanan');
Route::post('/tambah_antrian','AntrianLayananController@add_antrian')->name('add.antrian');
Route::post('/nonaktif-antrian','AntrianLayananController@nonaktif_antrian')->name('nonaktif-antrian');
// Status semua
Route::get('pembelian/semua', 'Frontpage\PembelianController@pembelian')->name('pembelian-semua-frontpage');
Route::post('pembelian/table_allstatus', 'Frontpage\PembelianController@table_allstatus')->name('table_allstatus');
Route::post('pembelian/table_pengiriman', 'Frontpage\PembelianController@table_pengiriman')->name('table_pengiriman');
Route::post('pembelian/table_proses', 'Frontpage\PembelianController@table_proses')->name('table_proses');
Route::post('pembelian/table_pembayaran', 'Frontpage\PembelianController@table_pembayaran')->name('table_pembayaran');


// Status pembayaran
Route::get('pembelian/pembayaran', 'Frontpage\PembelianController@pembelian')->name('pembelian-pembayaran-frontpage');
Route::post('pembelian/table_pembayaran', 'Frontpage\PembelianController@table_pembayaran')->name('table_pembayaran');
//detail pembayaran
Route::post('pembelian/pembayaran/detail', 'Frontpage\PembelianController@detail')->name('detail.pembayaran');
//system pembayaran
Route::post('pembelian/gambar', 'Frontpage\PembelianController@bayar')->name('bayar.pembelian');
// Status diproses
Route::get('pembelian/diproses', 'Frontpage\PembelianController@pembelian')->name('pembelian-diproses-frontpage');
// Status dikirim
Route::get('pembelian/dikirim', 'Frontpage\PembelianController@pembelian')->name('pembelian-dikirim-frontpage');
Route::get('pembelian/detail_pengiriman/{id}','Frontpage\PembelianController@detail_pengiriman')->name('detail_pengiriman');

// Wishlist
Route::get('/wishlist', 'Frontpage\WishlistController@wishlist')->name('wishlist-frontpage');
Route::get('cari-wishlist','Frontpage\WishlistController@cari_wishlist')->name('cari_wishlist');
// system wishlist
Route::post('/addwishlist', 'Frontpage\WishlistController@addwishlist')->name('addwishlist');


// Profile
Route::get('/profile', 'Frontpage\ProfileController@profile')->name('profile');
// system profile
Route::post('/profile/update', 'Frontpage\ProfileController@update')->name('update.profile');


// Checkout
Route::get('/checkout', 'Frontpage\CheckoutController@checkout')->name('checkout');
Route::post('/checkout/sell', 'Frontpage\CheckoutController@sell')->name('sell.checkout');
Route::post('/checkout/ubahalamat', 'Frontpage\CheckoutController@ubahalamat')->name('ubah.checkout');
Route::post('/checkout-repeat-order','Frontpage\CheckoutController@checkout_repeat_order')->name('checkout-repeat-order');
    Route::post('/ongkir','Frontpage\CheckoutController@ongkir')->name('ongkir');


Route::get('pembelian/detail/{id}','Frontpage\PembelianController@detail_transaksi')->name('detail_transaksi');

Route::get('pembelian/salin-nota-baru/{id}','Frontpage\PembelianController@salin_notabaru');


Broadcast::channel('my-channel', function ($user) {
    return true; // change this to your authentication logic
});
});
Route::get('/page/not/found',function($closure){
  // second parameter is optional. 
  abort(404,'Page not found');
  abort(403); 
}); //End Route::Group wib-cpanel
