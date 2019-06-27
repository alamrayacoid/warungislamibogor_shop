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
}
