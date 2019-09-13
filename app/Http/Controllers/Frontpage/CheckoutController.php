<?php

namespace App\Http\Controllers\Frontpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;
use DB;
use DataTables;
use App\orderpenjualan;
use App\Events\PushPembelian;

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
        if(\Auth::check()){
        $keranjang = DB::table('d_cart')->where('cart_cmember',Auth::user()->cm_code)->where('status_data','true')->count();
        }else{
            $keranjang = '';
        }
        return view('frontpage.checkout.checkout',array(
            'produk' => $produk->get(),
            'gambar' => $gambar,
            'count' => $produk->count(),
            'kategori' => $kategori,
            'provinsi' => $provinsi,
            'keranjang'=> $keranjang,
        ));
    }

    public function sell(Request $request){
        DB::beginTransaction();

        try {

        $ppn = 10/100;

    	$date = Carbon::now()->format('Y,m,d');

        $urutan = count(DB::table('d_sales')->groupBy('s_nota')->get());

        $urutan += 1;

        $nota = 'NOTA/WIB'. Carbon::parse($request->tanggal_penjualan)->format('Y') . Carbon::parse($request->jatuh_tempo)->format('md').'/'.$urutan;

    	$data = [];

        $detailid = DB::table('d_salesdt')->where('sd_sales',$urutan)->count();

        $total_pembelian = 0;
            
        for ($run=0; $run < count($request->qty) ; $run++) { 

                $get_discount = 0;

                if ($request->disc[$run] > 0 || $request->disc[$run] != null) {

                    $get_discount += $request->disc[$run] * ($request->hargabarang[$run] * $request->qty[$run]) / 100;

                }

                if ($request->discv[$run] > 0 || $request->discv[$run] != null) {

                    $get_discount += $request->discv[$run];

                }

            $harga_total = ($request->hargabarang[$run] * $request->qty[$run]) - $get_discount;

            $dengan_ppn = $harga_total + ($harga_total * $ppn);

            $total_pembelian += $dengan_ppn;

        }

        for ($run=0; $run < count($request->qty) ; $run++) { 

            ++$detailid;

            $pilih_gudang = DB::table('d_stock')
                ->leftJoin('m_whouse','w_code','st_cwhouse')
                ->leftJoin('m_branch','b_code','w_cbranch')
                ->where('w_cbranch',$request->gudang)
                ->where('st_qty','>=',$request->qty[$run])
                ->orderBy('st_qty' ,'desc')
                ->get(); 

            $id = $request->id[$run];

            DB::table('d_cart')
                ->where('cart_id',$id)
                ->update([
                	'status_data' => 'false',
                ]);


                $get_discount = 0;

                if ($request->disc[$run] > 0 || $request->disc[$run] != null) {

                    $get_discount += $request->disc[$run] * ($request->hargabarang[$run] * $request->qty[$run]) / 100;

                }

                if ($request->discv[$run] > 0 || $request->discv[$run] != null) {

                    $get_discount += $request->discv[$run];

                }

            $harga_total = ($request->hargabarang[$run] * $request->qty[$run]) - $get_discount;

            $dengan_ppn = $harga_total + ($harga_total * $ppn);

            $total_barang = $dengan_ppn;


            $cek_nota = DB::table('d_sales')
            ->where('s_nota',$nota)
            ->count();

            if ($cek_nota < 1) { 

                if ($request->metode == 'Tunai') {
                    $stat_pay = 'Y';
                    $method_pay = 'T';

                }else{
                    $stat_pay = 'N';
                    $method_pay = 'N';
                }

                DB::table('d_sales')->insert([
                    's_id' => $urutan,
                    's_whouse' => $pilih_gudang[0]->st_cwhouse,
                    's_member' => Auth::user()->cm_code,
                    's_date' => $date,
                    's_nota' => $nota,
                    's_total' => $total_pembelian,
                    's_province' => $request->provinsi,
                    's_city' => $request->kota,
                    's_district' => $request->kecamatan,
                    's_postalcode' => $request->kodepos,
                    's_address' => $request->alamat,
                    's_paystatus' => $stat_pay,
                    's_paymethod' => $method_pay,
                    's_created_at' => Carbon::now('Asia/Jakarta'),
                    's_created_by' => Auth::user()->cm_code,
                ]);
            }

                $arr = array(
                    'sd_sales' => $urutan,
                    'sd_detailid' => $detailid,
                    'sd_item' => $request->ciproduct[$run],
                    'sd_qty' => $request->qty[$run],
                    'sd_price' => $request->hargabarang[$run],
                    'sd_discvalue' => $request->discv[$run],
                    'sd_discpercent' => $request->disc[$run],
                    'sd_branch' => $pilih_gudang[0]->w_cbranch,
                    'sd_total' => $total_barang,
                );

        $cabang = DB::table('m_whouse')->join('m_branch','b_code','w_cbranch')->where('w_code',$pilih_gudang[0]->st_cwhouse)->get();
        
        foreach ($cabang as $row) {

            $cek_lokasi = DB::table('d_otostockies')
                ->where('os_nota',$nota)
                ->where('os_address',$row->b_address)
                ->where('os_province',$row->b_province)
                ->where('os_city',$row->b_city)
                ->count();

        if ($cek_lokasi == 0) {   

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
        }

            array_push($data, $arr);

            }

        DB::table('d_salesdt')->insert($data);

        $pushdata = array(
            'nota'=> $nota,
            'totalpembelian'=> $total_pembelian,
            'namacustomer'=> Auth::user()->cm_name,
            'jumlahpenjualan'=> DB::table('d_sales')->count(),
        );
        event(new PushPembelian($pushdata));

       DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
            return response()->json('error','ada yang aneh');
        }
    }

    public function ubahalamat(Request $request){
    	DB::table('d_sales')
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
