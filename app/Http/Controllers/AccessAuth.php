<?php

namespace App\Http\Controllers;
use Auth;
use DB;

class accessAuth extends Controller
{
 	   public static function aksesSidebar(){
 	   		$user_id = Auth::user()->u_code;
 	   		$cek = DB::table('d_useraction')
 	   			->select('ua_cmaccess','ua_read')
 	   			->where('ua_cuser',$user_id)
 	   			->get();

 	   		return $cek;
 	   }

 	   public static function akses()
    {
    	dd(Auth::user());
        $user_id = Auth::user()->u_code;
        $check = DB::table('d_useraction')
 	   			->select('ua_cmaccess', 'ua_read','ua_create','ua_delete','ua_edit','ua_print')
 	   			->where('ua_cuser',$user_id)
 	   			->get();
        return $check;
    }
}
