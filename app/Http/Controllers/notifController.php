<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class notifController extends Controller
{
	    static function pembelian(){
			if (Auth::check()) {
		    	$notif = DB::table('d_sales')
		    		->where('s_member',Auth::user()->cm_code)
		    		// ->whereNotIn('s_paystatus',['N'])
		    		->count();

		    	return $notif; 
			}
	    }

	    static function proses(){
	    	if (Auth::check()) {
	    	$notiff = DB::table('d_sales')
	    		->where('s_member',Auth::user()->cm_code)
	    		->where('s_isapprove','Y')
                ->where('s_delivered','N')
	    		->count();

	    	return $notiff; 
	    }
	    }

	    static function pembayaran(){
	    	if (Auth::check()) {
	    	$notifff = DB::table('d_sales')
	    		->where('s_member',Auth::user()->cm_code)
	    		->where('s_paystatus','N')
	    		->where('s_isapprove','P')
	    		->count();

	    	return $notifff; 
	    }
	    }

	    static function pengiriman(){
	    	if (Auth::check()) {
	    	$notif2 = DB::table('d_sales')
	    		->where('s_member',Auth::user()->cm_code)
	    		->whereIn('s_delivered',['L','P'])
	    		->count();

	    	return $notif2; 
	    }
	    }
}
