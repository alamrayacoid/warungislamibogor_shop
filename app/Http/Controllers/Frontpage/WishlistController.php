<?php

namespace App\Http\Controllers\Frontpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use DataTables;
use Auth;

class WishlistController extends Controller
{
    public function wishlist()
    {
    	$data = DB::table('m_item')
            	->leftJoin('m_itemprice','ipr_ciproduct','i_code')

            	->leftJoin('m_itemproduct','itp_ciproduct','i_code')

            	->leftJoin('m_itemtype','ity_code','itp_citype')

            	->leftJoin('d_wishlist','wl_ciproduct','i_code')

            	->leftJoin('m_imgproduct','ip_ciproduct','i_code')

            	->leftJoin('m_groupperprice', function($join){

                	$join->on('m_groupperprice.gpp_ciproduct','=','m_item.i_code')

                	->where('m_groupperprice.status_data','=','true');

            	})

            	->where('wl_cmember',Auth::user()->cm_code)

            	->where('d_wishlist.status_data','true')

            	->groupBy('i_name')

				->get();
			
		$datas = DB::table('d_lastseen')

				->join('m_item','i_code','ls_cproduct')

				->leftJoin('m_itemprice','ipr_ciproduct','i_code')
            	
            	->leftJoin('m_itemproduct','itp_ciproduct','i_code')
            	
            	->leftJoin('m_itemtype','ity_code','itp_citype')
            	
            	->leftJoin('m_imgproduct','ip_ciproduct','i_code')
            	
            	->leftJoin('m_groupperprice', function($join){
                	
                	$join->on('m_groupperprice.gpp_ciproduct','=','m_item.i_code')
                	
                	->where('m_groupperprice.status_data','=','true');
            	
            	})

				
				->where('d_lastseen.ls_ccustomer',Auth::user()->cm_code)
				
				->where('m_item.status_data','true')

				->get();

		$getlast = DB::table('d_lastseen')

				->join('m_item','i_code','ls_cproduct')

				->leftJoin('m_itemproduct','itp_ciproduct','i_code')
				
				->leftJoin('m_itemtype','ity_code','itp_citype')
				
				->leftJoin('m_imgproduct','ip_ciproduct','i_code')
				
				->where('d_lastseen.ls_ccustomer',Auth::user()->cm_code)
				
				->first();
		
		$lastseen = DB::table('m_item')
				
				->leftJoin('m_itemprice','ipr_ciproduct','i_code')
            	
            	->leftJoin('m_itemproduct','itp_ciproduct','i_code')
            	
            	->leftJoin('m_itemtype','ity_code','itp_citype')
            	
            	->leftJoin('m_imgproduct','ip_ciproduct','i_code')
           		
           		->leftJoin('m_groupperprice', function($join){
                	
                	$join->on('m_groupperprice.gpp_ciproduct','=','m_item.i_code')
                	
                	->where('m_groupperprice.status_data','=','true');
            	
            	})	
            	
            	->where('m_item.status_data','true')
            	
            	->where('itp_citype',$getlast->itp_citype)
				
				->where('i_code','!=',$getlast->ls_cproduct)
				
				->groupBy('i_name')
            	
            	->take(4)
            	
            	->get();

			
        $gambar = DB::table('m_item')

        		->join('m_imgproduct','ip_ciproduct','i_code')

        		->join('m_itemproduct','itp_ciproduct','i_code')

        		->groupBy('i_code')

        		->get();

		$wish = DB::table('d_wishlist')

				->where('status_data','true')

				->get();

		$kategori = DB::table('m_itemtype')->where('status_data','true')->get();

			if(\Auth::check()){

				$keranjang = DB::table('d_cart')

							->where('cart_cmember',Auth::user()->cm_code)

							->where('status_data','true')

							->count();

				}

				else{

					$keranjang = '';

				}

            return view('frontpage.wishlist.wishlist-frontpage',array(

                'data' => $data,

				'gambar' => $gambar,

				'lastseen' => $datas,

				'wish' => $wish,

				'produkseen' => $lastseen,

				'kategori'=>$kategori,

				'keranjang'=> $keranjang,

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

			return response()->json(['status' => 'New', 'message' => 'Berhasil ditambahkan ke wishlist']);

    	}

    	else{

    		if ($cek->where('status_data','true')->count() == 1) {

	    		$menambahkan = DB::table('d_wishlist')

	    						->where('wl_ciproduct',$request->code)

	    						->where('wl_cmember',Auth::user()->cm_code)

		    					->update([

		    						'status_data' => 'false',
		    						
								]);

				return response()->json(['status' => 'Hapus', 'message' => 'Berhasil hapus dari wishlist']);

    		}

    		else{

    			DB::table('d_wishlist')

    			->where('wl_ciproduct',$request->code)

    			->where('wl_cmember',Auth::user()->cm_code)

		    	->update([

		    		'status_data' => 'true',

				]);

				return response()->json(['status' => 'Tambah', 'message' => 'Berhasil ditambahkan ke wishlist']);
    		}

    	}
	}
}
