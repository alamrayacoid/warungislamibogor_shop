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
Route::get('/signup', 'Frontpage\FrontpageController@register_frontpage')->name('register_frontpage-frontpage');
Route::get('/signin', 'Frontpage\FrontpageController@login_frontpage')->name('login-frontpage');
Route::post('/login', 'Frontpage\FrontpageController@login')->name('login');
Route::post('/register', 'Frontpage\FrontpageController@register')->name('register');
Route::post('/logout', 'Frontpage\FrontpageController@logout')->name('logout');


Route::get('/produk', 'Frontpage\ProdukController@produk')->name('produk-frontpage');
Route::post('/stock_check', 'Frontpage\ProdukController@stock_check')->name('stock_check');
Route::get('/produk-detail', 'Frontpage\ProdukController@produk_detail')->name('produk-detail-frontpage');
Route::get('produk/kategori-produk/{id}','Frontpage\ProdukController@produk_kategori')->name('kategori-produk');

Route::get('/cari-barang','Frontpage\ProdukController@caribarang')->name('cari-barang');
// Group wib-cpanel
//add cart 
Route::post('/addcart', 'Frontpage\KeranjangController@addcart')->name('addcart');

Route::group(['middleware' => ['auth.custom']], function(){
Route::get('/keranjang', 'Frontpage\KeranjangController@keranjang')->name('keranjang-frontpage');
Route::post('/keranjang/remove', 'Frontpage\KeranjangController@removecart')->name('remove.keranjang');
Route::post('/keranjang/check', 'Frontpage\KeranjangController@gocheck')->name('check.keranjang');
Route::post('/keranjang/detail_keranjang', 'Frontpage\KeranjangController@detail_keranjang')->name('detail.keranjang');
Route::post('/keranjang/updatecart', 'Frontpage\KeranjangController@updatecart')->name('updatecart.keranjang');
// Status semua
Route::get('pembelian/semua', 'Frontpage\PembelianController@pembelian')->name('pembelian-semua-frontpage');
// Status pembayaran
Route::get('pembelian/pembayaran', 'Frontpage\PembelianController@pembelian')->name('pembelian-pembayaran-frontpage');
//detail pembayaran
Route::post('pembelian/pembayaran/detail', 'Frontpage\PembelianController@detail')->name('detail.pembayaran');
//system pembayaran
Route::post('pembelian/gambar', 'Frontpage\PembelianController@bayar')->name('bayar.pembelian');
// Status diproses
Route::get('pembelian/diproses', 'Frontpage\PembelianController@pembelian')->name('pembelian-diproses-frontpage');
// Status dikirim
Route::get('pembelian/dikirim', 'Frontpage\PembelianController@pembelian')->name('pembelian-dikirim-frontpage');

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
    
Route::get('/filterstatusall','Frontpage\PembelianController@filterallstatus')->name('filterallstatus');
Route::get('/filterdateallstatus','Frontpage\PembelianController@filtertanggalall')->name('filterdateallstatus');
Route::get('/resetallstatus','Frontpage\PembelianController@resetallstatus')->name('resetallstatus');

Route::get('/filterstatuspembayaran','Frontpage\PembelianController@filter_paymentstatus')->name('filter_paymentstatus');
Route::get('/filterdatestatuspembayaran','Frontpage\PembelianController@filterdate_paymentstatus')->name('filterdate_paymentstatus');
Route::get('/resetstatuspembayaran','Frontpage\PembelianController@reset_paymentstatus')->name('reset_paymentstatus');

Route::get('/filterstatusprosess','Frontpage\PembelianController@filter_prosesstatus')->name('filter_prosesstatus');
Route::get('/filterdatestatusproses','Frontpage\PembelianController@filterdate_prosesstatus')->name('filterdate_prosesstatus');
Route::get('/resetstatusproses','Frontpage\PembelianController@reset_prosesstatus')->name('reset_prosesstatus');

Route::get('/filterstatuspengiriman','Frontpage\PembelianController@filter_pengirimanstatus')->name('filter_pengirimanstatus');
Route::get('/filterdatestatuspengiriman','Frontpage\PembelianController@filterdate_pengirimanstatus')->name('filterdate_pengirimanstatus');
Route::get('/resetstatuspengiriman','Frontpage\PembelianController@reset_pengirimanstatus')->name('reset_pengirimanstatus');
Route::post('/table_allstatus','Frontpage\PembelianController@table_allstatus')->name('table_allstatus');
}); //End Route::Group wib-cpanel
