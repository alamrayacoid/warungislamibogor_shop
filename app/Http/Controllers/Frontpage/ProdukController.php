<?php

namespace App\Http\Controllers\Frontpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ProdukController extends Controller
{
    public function produk(Request $request)
    {
        $kategory = $request->ctr;
            if ($kategory != null) {
            $data = DB::table('m_item')
                ->join('m_itemprice','ipr_ciproduct','i_code')
                ->join('m_itemproduct','itp_ciproduct','i_code')
                ->join('m_itemtype','ity_code','itp_citype')
                ->where('itp_citype',$kategory)
                ->groupBy('i_name')
                ->get();

                $gambar = DB::table('m_item')->join('m_imgproduct','ip_ciproduct','i_code')->join('m_itemproduct','itp_ciproduct','i_code')->groupBy('i_code')->where('itp_citype',$kategory)->get();
        }else{
            $data = DB::table('m_item')
                ->join('m_itemprice','ipr_ciproduct','i_code')
                ->join('m_itemproduct','itp_ciproduct','i_code')
                ->join('m_itemtype','ity_code','itp_citype')
                ->groupBy('i_name')
                ->get();

            $gambar = DB::table('m_item')->join('m_imgproduct','ip_ciproduct','i_code')->join('m_itemproduct','itp_ciproduct','i_code')->groupBy('i_code')->get();
        }
            $wish = DB::table('d_wishlist')->where('status_data','true')->get();

    	return view('frontpage.produk.produk-frontpage',array(
                'data' => $data,
                'gambar' => $gambar,
                'wish' => $wish,
            ));
    }

    public function produk_detail(Request $request)
    {
    	$code = $request->code;
        $cabang = DB::table('m_warehouse')
            ->join('m_branch','b_code','ware_cbranch')
            ->groupBy('ware_cbranch')
            ->get();

        $label = DB::table('m_warehouse')
            ->join('m_supplier','s_code','ware_csupplier')
            ->where('ware_ciproduct',$code)
            ->groupBy('ware_csupplier')
            ->get();

        $gambar = DB::table('m_item')->join('m_imgproduct','ip_ciproduct','i_code')->where('i_code',$code)->get();
    	$data = DB::table('m_item')
            ->join('m_itemprice','ipr_ciproduct','i_code')
            ->join('m_itemproduct','itp_ciproduct','i_code')
            ->join('m_itemtype','ity_code','itp_citype')
            ->where('i_code',$code)
            ->groupBy('i_name')
            ->get();
    	return view('frontpage.produk.produk-detail-frontpage',array(
    		'data' => $data,
            'gambar' => $gambar,
            'code' => $code,
            'label' => $label,
            'cabang' => $cabang,
    	));
    }

}
