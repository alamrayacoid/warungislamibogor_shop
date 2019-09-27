<?php

namespace App\Http\Controllers\Frontpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cookie;
use DataTables;
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
            ->join('m_itemproduct','itp_ciproduct','i_code')
            ->join('m_itemtype','ity_code','itp_citype')
            ->leftJoin('m_groupperprice', function($join){
                $join->on('m_groupperprice.gpp_ciproduct','=','m_item.i_code')
                ->where('m_groupperprice.status_data','=','true');
            })
            ->leftJoin('m_imgproduct','ip_ciproduct','i_code')
            ->groupBy('i_name')
            ->where('m_item.status_data','true')
            ->select('m_item.i_name','m_item.i_code','m_itemprice.ipr_sunitprice','m_imgproduct.ip_path','m_groupperprice.gpp_sellprice','m_itemtype.ity_name')
            ->paginate(5);

            $kategori = DB::table('m_itemtype')->where('status_data','true')->select('ity_name')->get();
            $gambar = DB::table('m_item')->leftjoin('m_imgproduct','ip_ciproduct','i_code')->groupBy('i_code')->get();
            // $cekgambar = DB::table('m_item')->leftJoin('m_imgproduct','ip_ciproduct','i_code')->first();
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
             
             if($rekomendasi != null){
                 $rekomendasiproduk = DB::table('m_item')
                ->join('m_itemprice','ipr_ciproduct','i_code')
                ->leftJoin('m_groupperprice', function($join){
                $join->on('m_groupperprice.gpp_ciproduct','=','m_item.i_code')
                ->where('m_groupperprice.status_data','=','true');
                })
                ->join('m_itemproduct as p','itp_ciproduct','i_code')
                ->join('m_itemtype','ity_code','itp_citype')
                ->leftJoin('m_imgproduct','ip_ciproduct','i_code')
                ->groupBy('i_name')
                ->where('m_item.status_data','true')
                ->where('itp_citype',$rekomendasi->itp_citype)
                ->where('i_code','!=',$rekomendasi->i_code)
                ->select('m_item.i_name','m_item.i_code','m_itemprice.ipr_sunitprice','m_imgproduct.ip_path','m_groupperprice.gpp_sellprice','m_itemtype.ity_name')
                ->take(10)
                ->get();
             }else{
                 $rekomendasiproduk = '';
             }
            
             $popularproduk = DB::table('d_wishlist')->where('status_data','true')->get();
             if(\Auth::check()){
             $keranjang = DB::table('d_cart')->where('cart_cmember',Auth::user()->cm_code)->where('status_data','true')->count();
             }else{
                $keranjang = '';
             }
            //  dd($user_info)
            return view('frontpage.dashboard',array(
                'data' => $data,
                'rekomendasiproduk'=> $rekomendasiproduk,
                'gambar' => $gambar,
                'wish' => $wish,
                // 'cekgambar'=> $cekgambar,
                'kategori' => $kategori,
                'imgslider'=> $imageslider,
                'imgbasic'=> $imagesbasic,
                'popular' => $user_info,
                'rekomendasi' => $rekomendasi,
                'popularnull' => $popularproduk,
                'keranjang'=> $keranjang,
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
        DB::beginTransaction();
        try {
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

                DB::commit();
                return redirect()->route('login-frontpage')->with('registerc','berhasil register');
            }else{
                return redirect()->back()->with('registere','Email atau Username Sudah Terpakai');
            }
        } catch (Exception $e) {
            throw $e;
            return redirect()->back()->with('registere','Email atau Username Sudah Terpakai');
        }

    }

}
