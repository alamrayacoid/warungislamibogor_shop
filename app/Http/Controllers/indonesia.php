<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class indonesia extends Controller
{
    public function kota(Request $request)
    {
    	$data = DB::table('d_city')->where('c_pid',$request->provinsi)->get();
    	return response()->json(['kota' => $data]);
    }

    public function desa(Request $request)
    {
    	$data = DB::table('d_district')->where('d_cid',$request->kota)->get();
    	return response()->json(['desa' => $data]);
    }
}
