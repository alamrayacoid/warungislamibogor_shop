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

        return view('frontpage.profile.profile',array(
        	'wishlist' => $wishlist,
        	'transaksi' => $transaksi,
        ));
    }

    public function update(Request $request)
    {	

    	$this->validate($request,[
            'password' => 'required',
        ]);
       
        $data = ([
            'cm_username' => Auth::user()->cm_username,
            'password' => $request->get('password') 
        ]);


        if (Auth::attempt($data)) {
            
	    	DB::table('m_member')->where('cm_code',Auth::user()->cm_code)
	    	->update([
	    		'cm_name' => $request->name,
	            'cm_email' => $request->email,
	            'cm_nphone' => $request->nphone,
	            'cm_address' => $request->address,
	            'cm_gender' => $request->gender,
	            'password' => $request->password,
	            'cm_bank' => $request->bank,
	            'cm_nbank' => $request->nbank,
	            'cm_update_at' => Carbon::now('Asia/Jakarta'),
	    	]);
            return redirect()->back()->with('success','berhasil');

            if ($request->gambar != NULL) {
            $image = $request->gambar;  // your base64 encoded
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

                return redirect()->back()->with('success','lengkap');  
                
            }
        }
        return redirect()->back()->with('error','error');
    }
}