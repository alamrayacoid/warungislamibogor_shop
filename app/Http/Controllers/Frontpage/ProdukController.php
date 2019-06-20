<?php

namespace App\Http\Controllers\Frontpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdukController extends Controller
{
    public function produk()
    {
    	return view('frontpage.produk.produk-frontpage');
    }

    public function produk_detail()
    {
    	return view('frontpage.produk.produk-detail-frontpage');
    }

}
