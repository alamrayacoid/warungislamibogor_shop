<?php

namespace App\Http\Controllers\Frontpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class WishlistController extends Controller
{
    public function wishlist()
    {
    	$data = DB::table('m_item')
            ->join('m_itemprice','ipr_ciproduct','i_code')
            ->join('m_itemproduct','itp_ciproduct','i_code')
            ->join('m_itemtype','ity_code','itp_citype')
            ->join('d_wishlist','wl_ciproduct','i_code')
            ->where('wl_cmember',Auth::user()->cm_code)
            ->where('d_wishlist.status_data','true')
            ->groupBy('i_name')
            ->get();
            $gambar = DB::table('m_item')->join('m_imgproduct','ip_ciproduct','i_code')->groupBy('i_code')->get();
            $wish = DB::table('d_wishlist')->where('status_data','true')->get();
            return view('frontpage.wishlist.wishlist-frontpage',array(
                'data' => $data,
                'gambar' => $gambar,
                'wish' => $wish,
            ));
    }

    public function addwishlist(Request $request)
    {
    	$cek = DB::table('d_wishlist')->where('wl_ciproduct',$request->code)->where('wl_cmember',Auth::user()->cm_code);
    	if ($cek->count() == 0) {
	    	$masuk = DB::table('d_wishlist')
	    	->insert([
	    		'wl_ciproduct' => $request->code,
	    		'wl_cmember' => Auth::user()->cm_code,
	    		'status_data' => 'true',
	    	]);
    	}else{
    		if ($cek->where('status_data','true')->count() == 1) {
	    		DB::table('d_wishlist')->where('wl_ciproduct',$request->code)->where('wl_cmember',Auth::user()->cm_code)
		    	->update([
		    		'status_data' => 'false',
		    	]);
    		}else{
    			DB::table('d_wishlist')->where('wl_ciproduct',$request->code)->where('wl_cmember',Auth::user()->cm_code)
		    	->update([
		    		'status_data' => 'true',
		    	]);
    		}

    	}
    }
}
