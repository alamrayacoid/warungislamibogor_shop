<?php

namespace App\Http\Controllers\Frontpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class KeranjangController extends Controller
{
    public function keranjang()
    {
        $produk = DB::table('d_cart')
                    ->join('m_item','i_code','cart_ciproduct')
                    ->join('m_itemproduct','itp_ciproduct','i_code')
                    ->join('m_itemprice','ipr_ciproduct','i_code')
                    ->where('cart_cmember',Auth::user()->cm_code)
                    ->groupBy('cart_ciproduct')
                    ->get();

        $gambar = DB::table('m_item')->join('m_imgproduct','ip_ciproduct','i_code')->groupBy('i_code')->get();

    	return view('frontpage.keranjang.keranjang-frontpage',array(
            'produk' => $produk,
            'gambar' => $gambar
        ));
    }

    public function addcart(Request $request)
    {
    		$code = $request->code;
            $stock = DB::table('m_warehouse')->where('ware_ciproduct',$code)->where('ware_csupplier',$request->cart_label)->sum('ware_stock');
    	    $cek = DB::table('d_cart')->where('cart_cmember',Auth::user()->cm_code)->where('status_data','true')->where('cart_ciproduct',$code)->count();
            $update = $stock - $request->cart_qty;
            if ($stock > $request->cart_qty) {
                if ($cek == 0) {
                            
        	    	DB::table('d_cart')->insert([
        	    		'cart_ciproduct' => $request->code,
        	    		'cart_cmember' => Auth::user()->cm_code,
        	    		'cart_label' => $request->cart_label,
        	    		'cart_qty' => $request->cart_qty,
        	    		'cart_location' =>$request->cart_location,
        	    		'status_data' => 'true',
        	    	]);
                    return response()->json(array(
                        'done' => 'done',
                    ));
                }else{
                	return response()->json(array(
                		'error' => 'error',
            	));
            }
        }else{
            return response()->json(array(
                        'error' => 'stock',
                        'stock' => $stock,
                    ));
        }
    }

    public function removecart(Request $request){
        $id = $request->id;
        $code = $request->code;
        $stock = DB::table('m_warehouse')->where('ware_ciproduct',$code)->where('ware_csupplier',$request->label)->sum('ware_stock');
        $cek = DB::table('d_cart')->where('cart_cmember',Auth::user()->cm_code)->where('status_data','true')->where('cart_ciproduct',$code)->count();
        $update = $stock - $request->qty;
        if ($id != '') {
            DB::table('d_cart')
                ->where('cart_id',$id)
                ->delete();
            return redirect()->with('done','produk dihapus');
        }
    }
}
