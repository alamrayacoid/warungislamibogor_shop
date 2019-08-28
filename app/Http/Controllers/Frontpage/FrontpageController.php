<?php

namespace App\Http\Controllers\Frontpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cookie;
use Auth;
use App\d_user;
use DB;
use Carbon\Carbon;


class FrontpageController extends Controller
{
    public function frontpage(Request $request)
    {
            $data = DB::table('m_item')
            ->join('m_itemprice','ipr_ciproduct','i_code')
            ->join('m_itemproduct as p','itp_ciproduct','i_code')
            ->join('m_itemtype','ity_code','itp_citype')
            ->groupBy('i_name')
            ->where('m_item.status_data','true')
            ->get();

            $kategori = DB::table('m_itemtype')->where('status_data','true')->get();
            $gambar = DB::table('m_item')->join('m_imgproduct','ip_ciproduct','i_code')->groupBy('i_code')->get();
            $wish = DB::table('d_wishlist')->where('status_data','true')->get();
            $imageslider = DB::table('m_banner')->where('status_data','true')->where('b_statusimage','Slider')->get();
            $imagesbasic = DB::table('m_banner')->where('status_data','true')->where('b_statusimage','Basic')->get();
            $user_info = DB::table('d_wishlist') 
             ->where('status_data','true')
             ->select('d_wishlist.wl_ciproduct', DB::raw('count(*) as total'))
             ->groupBy('d_wishlist.wl_ciproduct')
             ->orderBy('total','desc')
             ->take(10)
             ->get();
             $rekomendasi = DB::table('d_wishlist')
             ->where('d_wishlist.status_data','true')
             ->select('d_wishlist.wl_ciproduct','m_itemtype.*','m_item.*','m_itemproduct.*', DB::raw('count(*) as total'))
             ->groupBy('d_wishlist.wl_ciproduct')
             ->orderBy('total','desc')
             ->join('m_item','i_code','wl_ciproduct')
             ->join('m_itemproduct','itp_ciproduct','wl_ciproduct')
             ->join('m_itemtype','ity_code','itp_citype')
             ->first();
             $rekomendasiproduk = DB::table('m_item')
            ->join('m_itemprice','ipr_ciproduct','i_code')
            ->join('m_itemproduct as p','itp_ciproduct','i_code')
            ->join('m_itemtype','ity_code','itp_citype')
            ->groupBy('i_name')
            ->where('m_item.status_data','true')
            ->where('itp_citype',$rekomendasi->itp_citype)
            ->where('i_code','!=',$rekomendasi->i_code)
            ->take(10)
            ->get();
            
             $popularproduk = DB::table('d_wishlist')->where('status_data','true')->get();
            //  dd($user_info)
            return view('frontpage.dashboard',array(
                'data' => $data,
                'rekomendasiproduk'=> $rekomendasiproduk,
                'gambar' => $gambar,
                'wish' => $wish,
                'kategori' => $kategori,
                'imgslider'=> $imageslider,
                'imgbasic'=> $imagesbasic,
                'popular' => $user_info,
                'rekomendasi' => $rekomendasi,
                'popularnull' => $popularproduk,
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

    public function login(Request $request){
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required',
        ]);
       
        $data = ([
            'cm_username' => $request->get('username'),
            'password' => $request->get('password') 
        ]);

        if (Auth::attempt($data)) {
            DB::table('m_member')
                ->where('cm_username', '=', $request->username)
                ->update([
                    'cm_lastlogin' => Carbon::now('Asia/Jakarta')
                ]);
            return redirect()->route('home')->with(['berhasil' => 'berhasil']);
        } else {
            return redirect()->route('login-frontpage')->with(['gagal' => 'gagal']);
        }
    }

    public function logout(){
        DB::table('m_member')
            ->where('cm_username', '=', Auth::user()->cm_username)
            ->update([
                'cm_lastlogout' => Carbon::now('Asia/Jakarta')
            ]);
        Auth::logout();
        return redirect()->route('home');
    }

    public function register(Request $request){
        $address = $request->email;
        $username = $request->username;
        $check = DB::table('m_member')->where('cm_email',$address)->count();
        $checku = DB::table('m_member')->where('cm_username',$username)->count();
        $urutan = DB::table('m_member')->count();
        $code = 'SA'.$urutan.Carbon::now()->format('yhs');
        if ($check == 0 && $checku == 0  ) {
            d_user::create([
                'cm_name' => $request->name,
                'cm_username' => $request->username,
                'cm_email' => $request->email,
                'password' => bcrypt($request->password),
                'cm_user' => $request->user,
                'cm_code' => $code,
                'status_data' =>'true',
            ]);     

            return redirect()->route('login-frontpage')->with('registerc','berhasil register'); 
        }else{
            return redirect()->back()->with('registere','Email atau Username Sudah Terpakai'); 
        }
    }

}
