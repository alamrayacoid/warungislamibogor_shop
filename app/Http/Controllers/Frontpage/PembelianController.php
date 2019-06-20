<?php

namespace App\Http\Controllers\Frontpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PembelianController extends Controller
{

    public function pembelian()
    {
    	return view('frontpage.pembelian.pembelian-frontpage');
    }

}
