<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class notifController extends Controller
{
	    static function pembelian(){
			if (Auth::check()) {
		    	$notif = DB::table('d_seller')->where('sell_ccustomer',Auth::user()->cm_code)->where('status_data','true')->count();
		    	return $notif; 
			}
	    }

	    static function proses(){
	    	if (Auth::check()) {
	    	$notiff = DB::table('d_seller')->where('sell_ccustomer',Auth::user()->cm_code)->where('sell_status','Sedang Proses')->where('status_data','true')->count();
	    	return $notiff; 
	    }
	    }

	    static function pembayaran(){
	    	if (Auth::check()) {
	    	$notifff = DB::table('d_seller')->where('sell_ccustomer',Auth::user()->cm_code)->where('sell_status','Pembayaran')->where('status_data','true')->count();
	    	return $notifff; 
	    }
	    }

	    static function pengiriman(){
	    	if (Auth::check()) {
	    	$notif2 = DB::table('d_seller')->where('sell_ccustomer',Auth::user()->cm_code)->where('sell_status','Sedang Dikirim')->where('status_data','true')->count();
	    	return $notif2; 
	    }
	    }
}
