<?php

namespace App\Http\Controllers\Frontpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class KeranjangController extends Controller
{
    public function keranjang()
    {
    	return view('frontpage.keranjang.keranjang-frontpage');
    }

    public function addcart(Request $request)
    {
    		$code = $request->code;
    	    $cek = DB::table('d_cart')->where('cart_ciproduct',$code)->count();
        if ($cek == 0) {
	    	DB::table('d_cart')->insert([
	    		'cart_ciproduct' => $request->code,
	    		'cart_cmember' => $request->user,
	    		'cart_label' => $request->cart_label,
	    		'cart_qty' => $request->cart_qty,
	    		'cart_location' =>$request->cart_location,
	    		'status_data' => 'true',
	    	]);
        }else{
        	return response()->json(array(
        		'error' => 'error'
        	));
        }
    }
}
