<?php

namespace App\Http\Controllers\Frontpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ProdukController extends Controller
{
    public function produk()
    {
    	return view('frontpage.produk.produk-frontpage');
    }

    public function produk_detail(Request $request)
    {
    	$code = $request->code;
    	$data = DB::table('m_item')
            ->join('m_itemprice','ipr_ciproduct','i_code')
            ->join('m_itemproduct','itp_ciproduct','i_code')
            ->join('m_itemtype','ity_code','itp_citype')
            ->where('i_code',$code)
            ->groupBy('i_name')
            ->get();
    	return view('frontpage.produk.produk-detail-frontpage',array(
    		'data' => $data,
    	));
    }

}
