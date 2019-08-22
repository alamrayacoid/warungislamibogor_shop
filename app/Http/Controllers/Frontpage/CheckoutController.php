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
        $provinsi = DB::table('d_province')->get();
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
            'provinsi' => $provinsi,
        ));
    }

    public function sell(Request $request){
        DB::beginTransaction();
        try {
    	$date = Carbon::now()->format('Y,m,d');
        $urutan = DB::table('d_seller')->count() +1;
        $nota = 'NOTA/WIB'. Carbon::parse($request->tanggal_penjualan)->format('Y') . Carbon::parse($request->jatuh_tempo)->format('md').'/'.$urutan;
    	$data = [];

       if($request->count != 0){

        for ($run=0; $run < $request->count ; $run++) { 
        $pilih_gudang = DB::table('d_stock')->leftJoin('m_whouse','w_code','st_cwhouse')->leftJoin('m_branch','b_code','w_cbranch')->where('w_cbranch',$request->gudang)->where('st_qty','>=',$request->qty[$run])->orderBy('st_qty' ,'desc')->get(); 

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
                    'sell_quantity' => $request->qty[$run],
                    'sell_cunit' => $request->satuan[$run],
                    'sell_total' => $request->total[$run],
                    'sell_price'=> $request->hargabarang[$run],
                    'sell_cwhouse' => $pilih_gudang[0]->st_cwhouse,
                    'sell_status' => 'P',
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
                    'sell_quantity' => $request->qty[$run],
                    'sell_cunit' => $request->satuan[$run],
                    'sell_total' => $request->total[$run],
                    'sell_price'=> $request->hargabarang[$run],
                    'sell_cwhouse' => $pilih_gudang[0]->st_cwhouse,
                    'sell_status' => 'P',
                    'status_data' => 'true',
                );
        
        }
        
        foreach ($pilih_gudang as $row) {
            DB::table('d_otostockies')->insert([
                'os_branch' => $row->b_name,
                'os_date' => $date,
                'os_nota' => $nota,
                'os_cprovince' => $request->provinsi,
                'os_ccity' => $request->kota,
                'os_cdistrict' => $request->kecamatan,
                'os_caddress' => $request->alamat,
                'os_address' => $row->b_address,
                'os_province' => $row->b_province,
                'os_city' => $row->b_city,
                'status_data' => 'true',
            ]);
        }


        array_push($data, $arr);
        };



        orderpenjualan::insert($data);
       }else{
        return false;
       }
       DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
            return response()->json('error','ada yang aneh');
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
