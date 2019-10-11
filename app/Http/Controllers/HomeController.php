<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function user()
    {
        DB::table('m_member')
        
                ->where('cm_username', '=', Auth::user()->cm_username)
        
                ->update([
        
                    'cm_lastlogin' => Carbon::now('Asia/Jakarta')
        
                ]);
        $user = Auth::user();

        return response()->json($user);
    }
}
