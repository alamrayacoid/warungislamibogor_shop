<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class cartController extends Controller
{
    static function cart(){
    	
    	$datacart = DB::table('d_cart')
    	->join('m_item','i_code','cart_ciproduct')
    	->join('m_itemprice','ipr_ciproduct','i_code')
    	->get();
    	return $datacart;
    }
}
