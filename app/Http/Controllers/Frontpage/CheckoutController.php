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
use GuzzleHttp\Client;

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
        if(\Auth::check()){
        $keranjang = DB::table('d_cart')->where('cart_cmember',Auth::user()->cm_code)->where('status_data','true')->count();
        }else{
            $keranjang = '';
        }
        return view('frontpage.checkout.checkout',array(
            'produk' => $produk->get(),
            'gambar' => $gambar,
            'count' => $produk->count(),
            'provinsi' => $provinsi,
            'keranjang'=> $keranjang,
        ));
    }

    public function ongkir(Request $request)
    {

        $getkota  = DB::table('d_city')
            ->where('c_id',$request->kota)
            ->select('c_city_ro')
            ->get();

        if ($getkota == '[]'){
            return response()->json([
                'error' => 'Anda Belum Memilih Lokasi Kirim'
            ]);
        }

        $getcart = DB::table('d_cart')
            ->where('cart_cmember',Auth::user()->cm_code)
            ->select('cart_location','cart_weight')
            ->get();

        $ongkir_real = 0;
        foreach ($getcart as $row){
            $ongkir_real += $row->cart_weight;
        }

        if ($getcart == '[]'){
            return response()->json([
                'error' => 'tidak ada barang di checkout'
            ]);
        }

        $cabangkota = DB::table('m_whouse')
            ->leftJoin('m_branch','b_code','w_cbranch')
            ->leftJoin('d_city','c_id','b_city')
            ->where('w_code',$getcart[0]->cart_location)
            ->groupBy('w_id')
            ->select('c_city_ro')
            ->get();

        if ($cabangkota == '[]'){
            return resposnse()->json([
                'error' => 'tidak ada Cabang Terdekat'
            ]);
        }


        $client = new Client();

        try {
            $response = $client->request('POST','https://api.rajaongkir.com/starter/cost',
                [
                    'body' => 'origin='.$cabangkota[0]->c_city_ro.'&destination='.$getkota[0]->c_city_ro.'&weight='.$ongkir_real.'&courier=jne',
                    'headers' => [
                        'key' => 'a8a1d75c6420a4cd7dd4f17018791219',
                        'content-type' => 'application/x-www-form-urlencoded',
                    ],
                ]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse()->getBody()->getContents());
        }

        $json = $response->getBody()->getContents();

        $total_ongkir = json_decode($json, true);

        // dd($total_ongkir);
//        $kota_asal = $total_ongkir["rajaongkir"]["origin_details"]["city_name"];
//        $kota_tujuan = $total_ongkir["rajaongkir"]["destination_details"]["city_name"];


        // print_r($array_result);
        // echo $array_result["rajaongkir"]["results"][0]["costs"][1]["cost"][0]["value"];

        // return response()->json(['status' => 'nonaktif']);

//        return view('master.ongkir.result_ongkir', compact('kota_asal', 'kota_tujuan', 'total_ongkir'));

        return response()->json([
            'total' => $total_ongkir['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value'],
        ]);
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

            $dengan_ppn = $harga_total;

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

            if($pilih_gudang == '[]'){
                return response()->json(['error' => 'Tidak Ada Cabang Terdekat']);
            }

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

            $dengan_ppn = $harga_total;

            $total_barang = $dengan_ppn;


            $cek_nota = DB::table('d_sales')
            ->where('s_nota',$nota)
            ->count();

            if ($cek_nota < 1) { 

                    $stat_pay = 'N';
                    $method_pay = 'T';
                    $approve = 'C';

                    if($request->tunai == 'Y'){
                        $dompet = DB::table('d_walletmember')
                                    ->where('wm_ccustomer',Auth::user()->cm_code)
                                    ->get();
                        $uang = 0;
                        foreach ($dompet as $row){
                            $uang += (float)$row->wm_total;
                        }
                        if($uang < (float)$total_pembelian){
                            return response()->json([
                                'status' => 'saldokurang'
                            ]);
                            return false;
                        }
                        DB::table('d_walletmember')
                            ->where('wm_ccustomer',Auth::user()->cm_code)
                            ->update([
                               'wm_total' => $uang - (float)$total_pembelian,
                                'wm_last' => $uang,
                            ]);

                        $stat_pay = 'Y';
                        $method_pay = 'T';
                        $approve = 'P';
                    }

                DB::table('d_sales')->insert([
                    's_id' => $urutan,
                    's_whouse' => $pilih_gudang[0]->st_cwhouse,
                    's_member' => Auth::user()->cm_code,
                    's_date' => $date,
                    's_nota' => $nota,
                    's_total' => $total_pembelian + $request->ongkir,
                    's_province' => $request->provinsi,
                    's_city' => $request->kota,
                    's_district' => $request->kecamatan,
                    's_postalcode' => $request->kodepos,
                    's_address' => $request->alamat,
                    's_paystatus' => $stat_pay,
                    's_paymethod' => $method_pay,
                    's_isapprove' => $approve,
                    's_category' => 'ON',
                    's_payexpedition' => $request->ongkir,
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
    public function checkout_repeat_order(Request $request){
        DB::table('d_cart')
        ->where('cart_cmember',Auth::user()->cm_code)
        ->where('status_data','check')
        ->delete();
        for ($i=0; $i < count($request->item) ; $i++) { 
                DB::table('d_cart')
                ->insert([
                    'cart_ciproduct'=>$request->item{$i},
                    'cart_qty'=> $request->qty{$i},
                    'cart_location'=> $request->cabang{$i},
                    'cart_cmember'=> Auth::user()->cm_code,
                    'status_data'=> 'check',
                ]);
        }
    }
}
