<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class menuController extends Controller
{
	static function menu()
	{
    $menu = DB::table('m_itemtype')->get();
    return $menu;
	}
	static function category(){
		$category = DB::table('m_itemtype')
					->where('status_data','true')
					->select('ity_name','ity_link')
					->get();

		return $category;
	}	
}
