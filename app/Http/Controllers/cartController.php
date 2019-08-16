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
    	->where('d_cart.status_data','true')
    	->get();
    	return $datacart;
    }

    static function img(){
    	$gambar = DB::table('m_imgproduct')
    	->join('m_item','i_code','ip_ciproduct')
    	->groupBy('ip_ciproduct')
    	->get();
    	return $gambar;
    }
}
            