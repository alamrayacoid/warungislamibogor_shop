<?php

namespace App\Http\Controllers\Frontpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cookie;
use Auth;
use App\User;
use DB;

class FrontpageController extends Controller
{
    public function frontpage(Request $request)
    {
            $data = DB::table('m_item')
            ->join('m_itemprice','ipr_ciproduct','i_code')
            ->join('m_itemproduct','itp_ciproduct','i_code')
            ->join('m_itemtype','ity_code','itp_citype')
            ->groupBy('i_name')
            ->get();
            $gambar = DB::table('m_item')->join('m_imgproduct','ip_ciproduct','i_code')->groupBy('i_code')->get();
            return view('frontpage.dashboard',array(
                'data' => $data,
                'gambar' => $gambar
            ));
    }
    public function login_frontpage()
    {
    	return view('frontpage.auth.login-frontpage');
    }
    public function register_frontpage()
    {
    	return view('frontpage.auth.register-frontpage');
    }

}
