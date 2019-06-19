<?php

namespace App\Http\Controllers\Frontpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cookie;
use Auth;
use App\User;

class FrontpageController extends Controller
{
    public function frontpage(Request $request)
    {
            return view('frontpage.dashboard');
    }
    public function login_frontpage()
    {
    	return view('frontpage.auth.login-frontpage');
    }
    public function register_frontpage()
    {
    	return view('frontpage.auth.register-frontpage');
    }
    public function produk()
    {
    	return view('frontpage.produk-frontpage');
    }

    public function produk_detail()
    {
    	return view('frontpage.produk-detail-frontpage');
    }

    public function keranjang()
    {
    	return view('frontpage.keranjang-frontpage');
    }

    public function pembelian()
    {
    	return view('frontpage.pembelian-frontpage');
    }

    public function wishlist()
    {
    	return view('frontpage.wishlist-frontpage');
    }
    public function profile()
    {
        return view('frontpage.profile');
    }
    public function checkout()
    {
        return view('frontpage.checkout');
    }
}
