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
                    ->where('d_cart.status_data','true')
                    ->groupBy('cart_ciproduct')
                    ->get();

        $gambar = DB::table('m_item')->join('m_imgproduct','ip_ciproduct','i_code')->groupBy('i_code')->get();
        $kategori = DB::table('m_itemtype')->where('status_data','true')->get();
    	return view('frontpage.keranjang.keranjang-frontpage',array(
            'produk' => $produk,
            'gambar' => $gambar,
            'kategori'=>$kategori,
        ));
    }

    public function addcart(Request $request)
    {
    		$code = $request->code;
            $stock = DB::table('d_stock')->where('st_ciproduct',$code)->sum('st_qty');
    	    $cek = DB::table('d_cart')->where('cart_cmember',Auth::user()->cm_code)->where('status_data','true')->where('cart_ciproduct',$code)->count();
            $update = $stock - $request->cart_qty;
            if ($stock >= $request->cart_qty) {
                if ($cek == 0) {
                            
        	    	DB::table('d_cart')->insert([
        	    		'cart_ciproduct' => $request->code,
        	    		'cart_cmember' => Auth::user()->cm_code,
                        'cart_qty' => $request->cart_qty,
        	    		'cart_cunit' => $request->satuan,
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
        $stock = DB::table('d_stock')->where('st_ciproduct',$code)->sum('st_qty');
        $cek = DB::table('d_cart')->where('cart_cmember',Auth::user()->cm_code)->where('status_data','true')->where('cart_ciproduct',$code)->count();
        $update = $stock + $request->qty;
        if ($id != '') {
            DB::table('d_cart')
                ->where('cart_id',$id)
                ->delete();
            return response()->json();
        }
    }

    public function gocheck(Request $request){
        $id = $request->id;
        for ($i=0; $i < $request->count ; $i++) { 
            if ($request->count != '') {
                DB::table('d_cart')
                    ->where('cart_id',$id[$i])
                    ->update([
                        'status_data' => 'check',
                    ]);
            }else{
                return false;
            }
        }
    }
}
