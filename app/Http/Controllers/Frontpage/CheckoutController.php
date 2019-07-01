<?php

namespace App\Http\Controllers\Frontpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;
use DB;
use App\orderpenjualan;

class CheckoutController extends Controller
{
    public function checkout()
    {
        return view('frontpage.checkout.checkout');
    }

    public function sell(Request $request){
    	$date = Carbon::now()->format('Ymd');
        $urutan = DB::table('d_seller')->count() +1;
        $nota = 'NOTA/WIB'. Carbon::parse($request->tanggal_penjualan)->format('Y') . Carbon::parse($request->jatuh_tempo)->format('md').'/'.$urutan;
    	$data = [];
        for ($run=0; $run < $request->count ; $run++) { 

        $arr = array(
            'sell_nota' => $nota,
            'sell_ccustomer' => Auth::user()->cm_code,
            'sell_date' => $date,
            'sell_address' => Auth::user()->cm_address,
            'sell_ciproduct' => $request->ciproduct[$run],
            'sell_label' => $request->label[$run],
            'sell_quantity' => $request->qty[$run],
            'sell_total' => $request->total[$run],
            'sell_status' => 'Pembayaran',
            'status_data' => 'true',
        );

        
        $id = $request->id[$run];
        $datastock = DB::table('m_warehouse')->where('ware_ciproduct',$request->ciproduct[$run])->where('ware_csupplier',$request->label[$run])->SUM('ware_stock');

            DB::table('d_cart')
                ->where('cart_id',$id)
                ->update([
                	'status_data' => 'false',
                ]);

        $update = $datastock - $request->qty[$run];
            DB::table('m_warehouse')
            ->where('ware_csupplier',$request->label[$run])
            ->where('ware_ciproduct',$request->ciproduct[$run])
            ->update([
                'ware_stock' => $update,
            ]);
           
        array_push($data, $arr);
        print_r($request->qty[$run]);
        };


        orderpenjualan::insert($data);
    }

    public function ubahalamat(Request $request){
    	DB::table('d_seller')
    		->where('sell_ccustomer',Auth::user()->cm_code)
    		->where('status_data','true')
    		->update([
    			'sell_address' =>  $request->address,
    			'sell_district' =>  $request->kabupaten,
    			'sell_city' => $request->kota,
    			'sell_province' => $request->provinsi,
    		]);
    }
}
