<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;

class AntrianLayananController extends Controller
{
	public function index(){

		$kategori = DB::table('m_itemtype')->where('status_data','true')->get();

		if(\Auth::check()){

            $keranjang = DB::table('d_cart')->where('cart_cmember',Auth::user()->cm_code)->where('status_data','true')->count();

        }

        else{

            $keranjang = '';

        }

        if(\Auth::check()){

            $antrian = DB::table('d_servicequeue')->where('sq_customer',Auth::user()->cm_name)->orderBy('sq_id','desc')->paginate(8);
            DB::table('d_servicequeue')
            ->where('sq_customer',Auth::user()->cm_name)
            ->where('sq_date','<', Carbon::now('Asia/Jakarta')->format('y,m,d'))
            ->where('sq_status','O')
            ->update([
                'sq_status' => 'C',
            ]);

        }

        else{

            $keranjang = '';

        }

		return view('frontpage.antrianlayanan.index', array(

			'kategori' => $kategori,

			'keranjang' => $keranjang,

			'antrian' => $antrian,

		));
	}
	public function add_antrian(Request $request){
		DB::beginTransaction();
            try{
                $cekuser = DB::table('d_servicequeue')
                                ->where('sq_date','=',Carbon::now('Asia/Jakarta')->format('y,m,d'))
                                ->where('sq_customer','=',Auth::user()->cm_name)
                                ->where('sq_status','O')
                                ->count();

            	$ceknomorurut = DB::table('d_servicequeue')
            					->where('sq_date','=',Carbon::now('Asia/Jakarta')->format('y,m,d'))
            					->max('sq_nomor') + 1;
                if($cekuser == 0){
                    DB::table('d_servicequeue')->insert([
                    'sq_nomor' => $ceknomorurut,
                    'sq_customer' => $request->customer,
                    'sq_status' => 'O',
                    'sq_date' => Carbon::now('Asia/Jakarta'),
                ]);

                DB::commit();

                return response()->json([
                    'status' => 'Success',
                ]);
                }else{
                return response()->json([
                    'status' => 'sudah ada',
                ]);
                }


                
            }
                catch (\Exception $e) {
             DB::rollBack();
             throw $e;
             return response()->json(['status' => 'Error', 'message' => 'Hubungi Pengembang Software']);
             } catch (\Throwable $e) {
             DB::rollBack();
             throw $e;
             return response()->json(['status' => 'Error', 'message' => 'Hubungi Pengembang Software']);
        }
	}
    public function nonaktif_antrian(Request $request){
        DB::beginTransaction();
            try{

                $cek = DB::table('d_servicequeue')->where('sq_id',$request->id)->update([
                    'sq_status' => 'C',
                ]);

                DB::commit();

                return response()->json();


                
            }
                catch (\Exception $e) {
             DB::rollBack();
             throw $e;
             return response()->json(['status' => 'Error', 'message' => 'Hubungi Pengembang Software']);
             } catch (\Throwable $e) {
             DB::rollBack();
             throw $e;
             return response()->json(['status' => 'Error', 'message' => 'Hubungi Pengembang Software']);
        }   
    }
}
