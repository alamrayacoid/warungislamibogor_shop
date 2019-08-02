<?php

namespace App\Http\Controllers\Frontpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Auth;
use DB;
use Carbon\Carbon;
use Hash;
use File;

class ProfileController extends Controller
{
    public function profile()
    {
    	$wishlist = DB::table('d_wishlist')->where('wl_cmember',Auth::user()->cm_code)->where('status_data','true')->count();
    	$transaksi = DB::table('d_seller')->where('sell_ccustomer',Auth::user()->cm_code)->where('status_data','true')->count();
    	$password = Auth::user()->password;
        $kategori = DB::table('m_itemtype')->where('status_data','true')->get();
        $provinsi = DB::table('d_province')->get();
        return view('frontpage.profile.profile',array(
        	'wishlist' => $wishlist,
            'transaksi' => $transaksi,
            'kategori'=>$kategori,
            'provinsi' => $provinsi,
        ));
    }

    public function update(Request $request)
    {	
        if ($request->newpassword != null) {
        DB::table('m_member')->where('cm_code',Auth::user()->cm_code)->update([
            'cm_name' => Auth::user()->cm_name,
            'cm_code' => Auth::user()->cm_code,
            'cm_email' => $request->email,
            'cm_nphone' => $request->nphone,
            'cm_address' => $request->address,
            'cm_gender' => $request->gender,
            'password' => bcrypt($request->newpassword),
            'cm_bank' => $request->bank,
            'cm_nbank' => $request->nbank,
            'cm_update_at' => Carbon::now('Asia/Jakarta'),
        ]);
        }else{
            DB::table('m_member')->where('cm_code',Auth::user()->cm_code)->update([
                'cm_name' => Auth::user()->cm_name,
                'cm_code' => Auth::user()->cm_code,
                'cm_email' => $request->email,
                'cm_nphone' => $request->nphone,
                'cm_address' => $request->address,
                'cm_gender' => $request->gender,
                'cm_bank' => $request->bank,
                'cm_nbank' => $request->nbank,
                'cm_update_at' => Carbon::now('Asia/Jakarta'),
                ]);
        }

        $datagambar = DB::table('m_member')->where([
            'cm_code' => Auth::user()->cm_code
        ])->get();
        $data = ([
            'cm_username' => Auth::user()->cm_username,
            'password' => $request->get('password') 
        ]);
            if ($request->gambar != null) {
               if(Auth::user()->cm_path != null){
                    File::delete(storage_path(). '/image/member/profile/' . Auth::user()->cm_path);
                    $image = $request->gambar;
                    $image = str_replace('data:image/png;base64,', '', $image);
                    $image = str_replace(' ', '+', $image);
                    $imageName = str_random(10).'.'.'png';
                    File::put(storage_path(). '/image/member/profile/' . $imageName, base64_decode($image));

                    $urutan = DB::table('m_member')
                        ->count();
                    DB::table('m_member')
                        ->where('cm_code',Auth::user()->cm_code)
                        ->update([
                                'cm_path' => $imageName,
                            ]);
               }else{
                    $image = $request->gambar;
                    $image = str_replace('data:image/png;base64,', '', $image);
                    $image = str_replace(' ', '+', $image);
                    $imageName = str_random(10).'.'.'png';
                    File::put(storage_path(). '/image/member/profile/' . $imageName, base64_decode($image));

                    $urutan = DB::table('m_member')
                        ->count();
                    DB::table('m_member')
                        ->where('cm_code',Auth::user()->cm_code)
                        ->update([
                                'cm_path' => $imageName,
                            ]);
               }

                return redirect()->back()->with('success','lengkap');  
                
            }
        }
        
    }

