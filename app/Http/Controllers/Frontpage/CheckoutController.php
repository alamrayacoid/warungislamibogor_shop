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
        $produk = DB::table('d_cart')
                    ->join('m_item','i_code','cart_ciproduct')
                    ->join('m_itemproduct','itp_ciproduct','i_code')
                    ->join('m_itemprice','ipr_ciproduct','i_code')
                    ->where('cart_cmember',Auth::user()->cm_code)
                    ->where('d_cart.status_data','check')
                    ->groupBy('cart_ciproduct');
                    

        $gambar = DB::table('m_item')->join('m_imgproduct','ip_ciproduct','i_code')->groupBy('i_code')->get();
        $kategori = DB::table('m_itemtype')->where('status_data','true')->get();
        return view('frontpage.checkout.checkout',array(
            'produk' => $produk->get(),
            'gambar' => $gambar,
            'count' => $produk->count(),
            'kategori' => $kategori,
        ));
    }

    public function sell(Request $request){
    	$date = Carbon::now()->format('Y,m,d');
        $urutan = DB::table('d_seller')->count() +1;
        $nota = 'NOTA/WIB'. Carbon::parse($request->tanggal_penjualan)->format('Y') . Carbon::parse($request->jatuh_tempo)->format('md').'/'.$urutan;
    	$data = [];
       if($request->count != 0){

        for ($run=0; $run < $request->count ; $run++) { 

        $id = $request->id[$run];
            DB::table('d_cart')
                ->where('cart_id',$id)
                ->update([
                	'status_data' => 'false',
                ]);
        if ($request->alamat != null ) {
                $arr = array(
                    'sell_nota' => $nota,
                    'sell_ccustomer' => Auth::user()->cm_code,
                    'sell_date' => $date,
                    'sell_address' => $request->alamat,
                    'sell_province' => $request->provinsi,
                    'sell_city' => $request->kota,
                    'sell_district' => $request->kecamatan,
                    'sell_ciproduct' => $request->ciproduct[$run],
                    'sell_label' => $request->label[$run],
                    'sell_quantity' => $request->qty[$run],
                    'sell_total' => $request->total[$run],
                    'sell_status' => 'Pembayaran',
                    'status_data' => 'true',
                );
        }else{
            $arr = array(
                    'sell_nota' => $nota,
                    'sell_ccustomer' => Auth::user()->cm_code,
                    'sell_date' => $date,
                    'sell_address' => Auth::user()->cm_address,
                    'sell_province' => $request->provinsi,
                    'sell_city' => $request->kota,
                    'sell_district' => $request->kecamatan,
                    'sell_ciproduct' => $request->ciproduct[$run],
                    'sell_label' => $request->label[$run],
                    'sell_quantity' => $request->qty[$run],
                    'sell_total' => $request->total[$run],
                    'sell_status' => 'Pembayaran',
                    'status_data' => 'true',
                );
        }

        
        $datastock = DB::table('m_warehouse')->where('ware_ciproduct',$request->ciproduct[$run])->where('ware_csupplier',$request->label[$run])->SUM('ware_stock');


        $update = $datastock - $request->qty[$run];
            DB::table('m_warehouse')
            ->where('ware_csupplier',$request->label[$run])
            ->where('ware_ciproduct',$request->ciproduct[$run])
            ->update([
                'ware_stock' => $update,
            ]);
           
        array_push($data, $arr);
        };



        orderpenjualan::insert($data);
       }else{
        return false;
       }
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
