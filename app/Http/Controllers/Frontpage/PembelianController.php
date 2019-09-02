<?php

namespace App\Http\Controllers\Frontpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Carbon\Carbon;
use App\gambar;
use DataTables;
use App\d_sales;

class PembelianController extends Controller
{

    public function pembelian(Request $request)
    {
            $totalbayar = 0;   
            $group = DB::table('d_sales')
            ->leftJoin('d_salesdt','sd_sales','s_id')
            ->join('m_item','i_code','sd_item')
    		->leftJoin('m_itemproduct','itp_ciproduct','sd_item')
            ->leftJoin('m_itemprice','ipr_ciproduct','sd_item')
            ->leftJoin('d_province','p_id','s_province')
            ->leftJoin('d_district','d_id','s_district')
            ->leftJoin('d_city','c_id','s_city')
    		->groupBy('s_nota')
    		->where('s_member',Auth::user()->cm_code);

    		$allstatus = DB::table('d_sales')
            ->leftJoin('d_salesdt','sd_sales','s_id')
    		->leftJoin('m_item','i_code','sd_item')
    		->leftJoin('m_itemproduct','itp_ciproduct','sd_item')
            ->leftJoin('m_itemprice','ipr_ciproduct','sd_item')
            ->leftJoin('d_province','p_id','s_province')
            ->leftJoin('d_district','d_id','s_district')
            ->leftJoin('d_city','c_id','s_city')
            ->groupBy('s_id')
            ->where('s_member',Auth::user()->cm_code);
    		

            if ($request->nama_produk != null) {
                $group->where('i_name',$request->nama_produk);
                $allstatus->where('i_name',$request->nama_produk);
            }
            
            if($request->tanggal_transaksi_awal != null && $request->tanggal_transaksi_akhir != null){
                $group->whereBetween('s_date',[Carbon::parse($request->tanggal_transaksi_awal)->format('Y,m,d'),Carbon::parse($request->tanggal_transaksi_akhir)->format('Y,m,d')]);
                $allstatus->whereBetween('s_date',[Carbon::parse($request->tanggal_transaksi_awal)->format('Y,m,d'),Carbon::parse($request->tanggal_transaksi_akhir)->format('Y,m,d')]);

            }

            if($request->orderby){
                if($request->orderby == '1'){
                    $group->orderBy('s_date','desc');
                    $allstatus->orderBy('s_date','desc');
                }else if ($request->orderby == '2'){
                    $group->orderBy('s_total','desc');
                    $allstatus->orderBy('s_total','desc');
                }
            }

            $gambar = DB::table('d_sales')->leftJoin('d_salesdt','sd_sales','s_id')->join('m_imgproduct','ip_ciproduct','sd_item')->groupBy('s_nota');
            $kategori = DB::table('m_itemtype')->where('status_data','true')->get();
            $countproses = DB::table('d_sales')->where('s_isapprove','Y')->where('s_member',Auth::user()->cm_code)->count();
            $countkirim = DB::table('d_sales')->whereIn('s_delivered',['L','P'])->where('s_member',Auth::user()->cm_code)->count();
    	return view('frontpage.pembelian.pembelian',array(
            'totalbayar' => $totalbayar,
    		'allstatus' => $allstatus->get(),
    		'pembayaran' => $allstatus->whereIn('s_paystatus',['N'])->get(),
    		'proses' => $allstatus->whereIn('s_isapprove',['Y'])->get(),
    		'pengiriman' => $allstatus->whereIn('s_delivered',['P','L'])->get(),
            'group' => $group->get(),	
    		'groupp' => $group->whereIn('s_paystatus',['N'])->get(),
            'grouppro' => $group->where('s_isapprove','Y')->get(),
            'groupprostat' => $countproses,
            'groupppengstat' => $countkirim,
    		'groupppeng' => $group->whereIn('s_delivered',['P','L'])->get(),
            'gambar' => $gambar->get(),
            'kategori'=>$kategori,
    	));
    }

    public function table_allstatus(Request $request)
    {   
        if ($request->category == 'Terbaru') {
            $data = DB::table('d_sales')
                ->where('s_member',Auth::user()->cm_code)
                ->leftJoin('d_province','p_id','=','s_province')
                ->leftJoin('d_city','c_id','=','s_city')
                ->leftJoin('d_district','d_id','=','s_district')
                ->orderBy('s_date','desc');
        }else if($request->category == 'Total Belanja'){
            $data = DB::table('d_sales')
                ->where('s_member',Auth::user()->cm_code)
                ->leftJoin('d_province','p_id','=','s_province')
                ->leftJoin('d_city','c_id','=','s_city')
                ->leftJoin('d_district','d_id','=','s_district')
                ->orderBy('s_total','desc');
        }else{
            $data = DB::table('d_sales')
                ->where('s_member',Auth::user()->cm_code)
                ->leftJoin('d_province','p_id','=','s_province')
                ->leftJoin('d_city','c_id','=','s_city')
                ->leftJoin('d_district','d_id','=','s_district');
        }


        if ($request->tanggal_transaksi_awal != null && $request->tanggal_transaksi_akhir != null) {

            $data = $data
                ->whereBetween('s_date',[Carbon::parse($request->tanggal_transaksi_awal)->format('Y-m-d'),Carbon::parse($request->tanggal_transaksi_akhir)->format('Y-m-d')]);

        }

        $data = $data->get();

        return Datatables::of($data)
        ->addColumn('all',function($data) use ($request){
                $data2 = DB::table('d_salesdt')
                    ->leftJoin('d_sales','s_id','=','sd_sales')
                    ->leftJoin('m_member','cm_code','=','s_member')
                    ->leftJoin('m_item','i_code','=','sd_item')
                    ->leftJoin('m_itemprice','ipr_ciproduct','=','i_code')
                    ->leftJoin('m_itemproduct','itp_ciproduct','=','i_code')
                    ->leftJoin('m_imgproduct','ip_ciproduct','=','i_code')
                    ->leftJoin('m_itemunit','iu_code','=','itp_ciunit')
                    ->leftJoin('m_whouse','w_code','=','s_whouse')
                    ->leftJoin('d_province','p_id','=','s_province')
                    ->leftJoin('d_city','c_id','=','s_city')
                    ->leftJoin('d_district','d_id','=','s_district')
                    ->groupBy('sd_detailid')
                    ->where('s_nota',$data->s_nota);

                if ($request->produk != null) {
                    $data2 = $data2->where('i_name','LIKE', '%'.$request->produk.'%');
                }
                

            $data2 = $data2->get();
            if ($data->s_paymethod == 'T') {
                    $metode = 'Tunai'; 
                }else if ($data->s_paymethod == 'N'){
                    $metode = 'Tempo';
                }else{
                    $metode = '';
                }

            if ($data->s_paystatus == 'N') {
                    $status = 'Pembayaran';
                    $stat = 'P';
                }

                if ($data->s_paystatus == 'Y') {
                    $status = 'Sudah Bayar';
                    $stat = 'SB';
                }

                if ($data->s_isapprove == 'Y') {
                    $status = 'Proses Packing';
                    $stat = 'PP';
                }

                if ($data->s_packing == 'Y') {
                    $status = 'Packing Selesai';
                    $stat = 'PS';
                }  

                if ($data->s_delivered == 'P') {
                    $status = 'Sedang Dikirim';
                    $stat = 'SD';
                }     

                if ($data->s_delivered == 'L') {
                    $status = 'Pengiriman Terhambat';
                    $stat = 'T';
                }

                if ($data->s_delivered == 'Y') {
                    $status = 'Transaksi Selesai';
                    $stat = 'TS';
                }   

                if ($data->s_isapprove == 'N') {
                    $status = 'Ditolak';
                    $stat = 'D';
                }

            $daftar_barang = '';

            $totalbeli = 0 ;
            foreach ($data2 as $row) {
                $daftar_barang .= '
                    <div class="row column-item-product item-product-allstatus">
                        <div class="col-lg-6">
                            <div class="d-flex">
                                <img src="'.env("APP_WIB").'storage/image/master/produk/'.$row->ip_path.'"
                                                            width="100px" height="100px">
                                <div class="padding-0-15">
                                    <div class="fs-14 semi-bold nameproduct">'.$row->i_name.'</div>
                                    <div class="fs-14 semi-bold pt-3">'.$row->s_nota.'<span></div>
                                    <div class="fs-14 semi-bold pt-3">'.Carbon::parse($row->s_date)->formatLocalized('%d %B %Y').'<span class="text-full-payment-transaction">Total Pembayaran :
                                    <span class="text-full-price-transaction">Rp. '.$row->sd_total.'</span></span></div>
                                </div>
                            </div>
                        </div>
                    <div class="col-lg-2 text-center">
                        <label class="label label-primary bg-primary-wib">'. $status .'</label>
                    </div>
                    <div class="col-lg-4">
                        <a href="'.route('produk-detail-frontpage', ['code'=>$row->i_code]).'"><button class="btn btn-buy-more-product">Beli Lagi</button></a>
                        </div>
                    </div>';

            $totalbeli += $row->sd_qty;
            }

            $image = 0 ;

            $totalbayar = 0 ;

            return '<div class="column-group-item-product mt-5">
                        <div class="row">
                            <div class="col-lg-8 col-md-8">
                            <span class="fs-14 semi-bold">'.$data->s_nota.'</span>
                            <span class="text-full-payment-transaction">Total Semua Barang : 
                                <span class="text-full-price-transaction semi-bold" id="count">Rp. '.number_format($data->s_total,2).'</span>
                            </span> 
                            </div> <div class="col-lg-4 col-md-4">
                                <a data-target="#modal-detail" data-id="'.$data->s_nota.'" data-status="'.$stat.'" data-date="'.$data->s_date.'" data-customer="'.Auth::user()->cm_name.'" data-alamat="'.$data->s_address.'" data-totalb="'.$totalbeli.'" data-provinsi="'.$data->p_nama.'" data-kecamatan="'.$data->c_nama.'" data-district="'.$data->d_nama.'" data-pos="'.$data->s_postalcode.'" data-metode="'.$metode.'" data-hargat="Rp. '.$data->s_total.'" data-toggle="modal" class="detail">
                                
                                <button class="btn btn-view-more-transaction">Lihat Detail Transaksi</button>
                            
                            </a>
                            
                            </div>
                        </div>'.$daftar_barang.'
                    </div>';
        })
        ->rawColumns(['all'])
        ->make(true);
    }

    public function table_pembayaran(Request $request)
    {
                
        if ($request->category == 'Terbaru') {
            $data = DB::table('d_sales')
                ->where('s_member',Auth::user()->cm_code)
                ->leftJoin('d_province','p_id','=','s_province')
                ->leftJoin('d_city','c_id','=','s_city')
                ->leftJoin('d_district','d_id','=','s_district')
                ->orderBy('s_date','desc')
                ->where('s_paystatus','N');
        }else if($request->category == 'Total Belanja'){
            $data = DB::table('d_sales')
                ->where('s_member',Auth::user()->cm_code)
                ->leftJoin('d_province','p_id','=','s_province')
                ->leftJoin('d_city','c_id','=','s_city')
                ->leftJoin('d_district','d_id','=','s_district')
                ->orderBy('s_total','desc')
                ->where('s_paystatus','N');
        }else{
            $data = DB::table('d_sales')
                ->where('s_member',Auth::user()->cm_code)
                ->leftJoin('d_province','p_id','=','s_province')
                ->leftJoin('d_city','c_id','=','s_city')
                ->leftJoin('d_district','d_id','=','s_district')
                ->where('s_paystatus','N');
        }


        if ($request->tanggal_transaksi_awal != null && $request->tanggal_transaksi_akhir != null) {

            $data = $data
                ->whereBetween('s_date',[Carbon::parse($request->tanggal_transaksi_awal)->format('Y-m-d'),Carbon::parse($request->tanggal_transaksi_akhir)->format('Y-m-d')]);

        }

        if ($request->order == 'Terbaru') {
            $data = $data->orderBy('s_date','desc');
        }else if ($request->order == 'Total Belanja') {
            $data = $data->orderBy('s_total','desc');
        }

        $data = $data->get();

        return Datatables::of($data)
        ->addColumn('all',function($data) use ($request){
            $data2 = DB::table('d_salesdt')
                ->leftJoin('d_sales','s_id','=','sd_sales')
                ->leftJoin('m_member','cm_code','=','s_member')
                ->leftJoin('m_item','i_code','=','sd_item')
                ->leftJoin('m_itemprice','ipr_ciproduct','=','i_code')
                ->leftJoin('m_itemproduct','itp_ciproduct','=','i_code')
                ->leftJoin('m_imgproduct','ip_ciproduct','=','i_code')
                ->leftJoin('m_itemunit','iu_code','=','itp_ciunit')
                ->leftJoin('m_whouse','w_code','=','s_whouse')
                ->leftJoin('d_province','p_id','=','s_province')
                ->leftJoin('d_city','c_id','=','s_city')
                ->leftJoin('d_district','d_id','=','s_district')
                ->groupBy('sd_detailid')
                ->where('s_nota',$data->s_nota)
                ->get();

            if ($request->produk != null) {
                $data2 = $data2->where('i_name','LIKE', '%'.$request->produk.'%');
            }

            if ($data->s_paymethod == 'T') {
                    $metode = 'Tunai'; 
                }else if ($data->s_paymethod == 'N'){
                    $metode = 'Tempo';
                }else{
                    $metode = '';
                }

            if ($data->s_paystatus == 'N') {
                    $status = 'Pembayaran';
                    $stat = 'P';
                }

                if ($data->s_paystatus == 'Y') {
                    $status = 'Sudah Bayar';
                    $stat = 'SB';
                }

                if ($data->s_isapprove == 'Y') {
                    $status = 'Proses Packing';
                    $stat = 'PP';
                }

                if ($data->s_packing == 'Y') {
                    $status = 'Packing Selesai';
                    $stat = 'PS';
                }  

                if ($data->s_delivered == 'P') {
                    $status = 'Sedang Dikirim';
                    $stat = 'SD';
                }     

                if ($data->s_delivered == 'L') {
                    $status = 'Pengiriman Terhambat';
                    $stat = 'T';
                }

                if ($data->s_delivered == 'Y') {
                    $status = 'Transaksi Selesai';
                    $stat = 'TS';
                }   

                if ($data->s_isapprove == 'N') {
                    $status = 'Ditolak';
                    $stat = 'D';
                }

            $daftar_barang = '';

            $totalbeli = 0 ;
            foreach ($data2 as $row) {
                $daftar_barang .= '
                    <div class="row column-item-product item-product-allstatus">
                        <div class="col-lg-6">
                            <div class="d-flex">
                                <img src="'.env("APP_WIB").'storage/image/master/produk/'.$row->ip_path.'"
                                                            width="100px" height="100px">
                                <div class="padding-0-15">
                                    <div class="fs-14 semi-bold nameproduct">'.$row->i_name.'</div>
                                    <div class="fs-14 semi-bold pt-3">'.$row->s_nota.'<span></div>
                                    <div class="fs-14 semi-bold pt-3">'.Carbon::parse($row->s_date)->formatLocalized('%d %B %Y').'<span class="text-full-payment-transaction">Total Pembayaran :
                                    <span class="text-full-price-transaction">Rp. '.$row->sd_total.'</span></span></div>
                                </div>
                            </div>
                        </div>
                    <div class="col-lg-2 text-center">
                        <label class="label label-primary bg-primary-wib">'. $status .'</label>
                    </div>
                    <div class="col-lg-4">
                        <a href="'.route('produk-detail-frontpage', ['code'=>$row->i_code]).'"><button class="btn btn-buy-more-product">Beli Lagi</button></a>
                        </div>
                    </div>';

            $totalbeli += $row->sd_qty;
            }

            $image = 0 ;

            $totalbayar = 0 ;

            return '<div class="column-group-item-product mt-5">
                        <div class="row">
                            <div class="col-lg-8 col-md-8">
                            <span class="fs-14 semi-bold">'.$data->s_nota.'</span>
                            <span class="text-full-payment-transaction">Total Semua Barang : 
                                <span class="text-full-price-transaction semi-bold" id="count">Rp. '.$data->s_total.'</span>
                            </span> 
                            </div> <div class="col-lg-4 col-md-4">
                                <a data-target="#modal-detail" data-id="'.$data->s_nota.'" data-status="'.$stat.'" data-date="'.$data->s_date.'" data-customer="'.Auth::user()->cm_name.'" data-alamat="'.$data->s_address.'" data-totalb="'.$totalbeli.'" data-provinsi="'.$data->p_nama.'" data-kecamatan="'.$data->c_nama.'" data-district="'.$data->d_nama.'" data-pos="'.$data->s_postalcode.'" data-metode="'.$metode.'" data-hargat="Rp. '.$data->s_total.'" data-toggle="modal" class="detail">
                                
                                <button class="btn btn-view-more-transaction">Lihat Detail Transaksi</button>
                            
                            </a>
                            
                            <button class="btn btn-payment-transaction bayar" data-nota="'.$data->s_nota.'" type="button" data-toggle="modal" data-target="#modal-bayar">Bayar Sekarang</button>
                            </div>
                        </div>'.$daftar_barang.'
                    </div>';
        })
        ->rawColumns(['all'])
        ->make(true);
    }

    public function table_pengiriman(Request $request)
    {

        if ($request->category == 'Terbaru') {
            $data = DB::table('d_sales')
                ->where('s_member',Auth::user()->cm_code)
                ->leftJoin('d_province','p_id','=','s_province')
                ->leftJoin('d_city','c_id','=','s_city')
                ->leftJoin('d_district','d_id','=','s_district')
                ->orderBy('s_date','desc')
                ->whereIn('s_delivered',['L','P']);
        }else if($request->category == 'Total Belanja'){
            $data = DB::table('d_sales')
                ->where('s_member',Auth::user()->cm_code)
                ->leftJoin('d_province','p_id','=','s_province')
                ->leftJoin('d_city','c_id','=','s_city')
                ->leftJoin('d_district','d_id','=','s_district')
                ->orderBy('s_total','desc')
                ->whereIn('s_delivered',['L','P']);
        }else{
            $data = DB::table('d_sales')
                ->where('s_member',Auth::user()->cm_code)
                ->leftJoin('d_province','p_id','=','s_province')
                ->leftJoin('d_city','c_id','=','s_city')
                ->leftJoin('d_district','d_id','=','s_district')
                ->whereIn('s_delivered',['L','P']);
        }


        if ($request->tanggal_transaksi_awal != null && $request->tanggal_transaksi_akhir != null) {

            $data = $data
                ->whereBetween('s_date',[Carbon::parse($request->tanggal_transaksi_awal)->format('Y-m-d'),Carbon::parse($request->tanggal_transaksi_akhir)->format('Y-m-d')]);

        }

        if ($request->order == 'Terbaru') {
            $data = $data->orderBy('s_date','desc');
        }else if ($request->order == 'Total Belanja') {
            $data = $data->orderBy('s_total','desc');
        }

        $data = $data->get();

        return Datatables::of($data)
        ->addColumn('all',function($data) use ($request){
                $data2 = DB::table('d_salesdt')
                    ->leftJoin('d_sales','s_id','=','sd_sales')
                    ->leftJoin('m_member','cm_code','=','s_member')
                    ->leftJoin('m_item','i_code','=','sd_item')
                    ->leftJoin('m_itemprice','ipr_ciproduct','=','i_code')
                    ->leftJoin('m_itemproduct','itp_ciproduct','=','i_code')
                    ->leftJoin('m_imgproduct','ip_ciproduct','=','i_code')
                    ->leftJoin('m_itemunit','iu_code','=','itp_ciunit')
                    ->leftJoin('m_whouse','w_code','=','s_whouse')
                    ->leftJoin('d_province','p_id','=','s_province')
                    ->leftJoin('d_city','c_id','=','s_city')
                    ->leftJoin('d_district','d_id','=','s_district')
                    ->groupBy('sd_detailid')
                    ->where('s_nota',$data->s_nota);

                if ($request->produk != null) {
                    $data2 = $data2->where('i_name','LIKE', '%'.$request->produk.'%');
                }
            $data2 = $data2->get();
            if ($data->s_paymethod == 'T') {
                    $metode = 'Tunai'; 
                }else if ($data->s_paymethod == 'N'){
                    $metode = 'Tempo';
                }else{
                    $metode = '';
                }

            if ($data->s_paystatus == 'N') {
                    $status = 'Pembayaran';
                    $stat = 'P';
                }

                if ($data->s_paystatus == 'Y') {
                    $status = 'Sudah Bayar';
                    $stat = 'SB';
                }

                if ($data->s_isapprove == 'Y') {
                    $status = 'Proses Packing';
                    $stat = 'PP';
                }

                if ($data->s_packing == 'Y') {
                    $status = 'Packing Selesai';
                    $stat = 'PS';
                }  

                if ($data->s_delivered == 'P') {
                    $status = 'Sedang Dikirim';
                    $stat = 'SD';
                }     

                if ($data->s_delivered == 'L') {
                    $status = 'Pengiriman Terhambat';
                    $stat = 'T';
                }

                if ($data->s_delivered == 'Y') {
                    $status = 'Transaksi Selesai';
                    $stat = 'TS';
                }   

                if ($data->s_isapprove == 'N') {
                    $status = 'Ditolak';
                    $stat = 'D';
                }

            $daftar_barang = '';

            $totalbeli = 0 ;
            foreach ($data2 as $row) {
                $daftar_barang .= '
                    <div class="row column-item-product item-product-allstatus">
                        <div class="col-lg-6">
                            <div class="d-flex">
                                <img src="'.env("APP_WIB").'storage/image/master/produk/'.$row->ip_path.'"
                                                            width="100px" height="100px">
                                <div class="padding-0-15">
                                    <div class="fs-14 semi-bold nameproduct">'.$row->i_name.'</div>
                                    <div class="fs-14 semi-bold pt-3">'.$row->s_nota.'<span></div>
                                    <div class="fs-14 semi-bold pt-3">'.Carbon::parse($row->s_date)->formatLocalized('%d %B %Y').'<span class="text-full-payment-transaction">Total Pembayaran :
                                    <span class="text-full-price-transaction">Rp. '.$row->sd_total.'</span></span></div>
                                </div>
                            </div>
                        </div>
                    <div class="col-lg-2 text-center">
                        <label class="label label-primary bg-primary-wib">'. $status .'</label>
                    </div>
                    <div class="col-lg-4">
                        <a href="'.route('produk-detail-frontpage', ['code'=>$row->i_code]).'"><button class="btn btn-buy-more-product">Beli Lagi</button></a>
                        </div>
                    </div>';

            $totalbeli += $row->sd_qty;
            }

            $image = 0 ;

            $totalbayar = 0 ;

            return '<div class="column-group-item-product mt-5">
                        <div class="row">
                            <div class="col-lg-8 col-md-8">
                            <span class="fs-14 semi-bold">'.$data->s_nota.'</span>
                            <span class="text-full-payment-transaction">Total Semua Barang : 
                                <span class="text-full-price-transaction semi-bold" id="count">Rp. '.number_format($data->s_total,2).'</span>
                            </span> 
                            </div> <div class="col-lg-4 col-md-4">
                                <a data-target="#modal-detail" data-id="'.$data->s_nota.'" data-status="'.$stat.'" data-date="'.$data->s_date.'" data-customer="'.Auth::user()->cm_name.'" data-alamat="'.$data->s_address.'" data-totalb="'.$totalbeli.'" data-provinsi="'.$data->p_nama.'" data-kecamatan="'.$data->c_nama.'" data-district="'.$data->d_nama.'" data-pos="'.$data->s_postalcode.'" data-metode="'.$metode.'" data-hargat="Rp. '.$data->s_total.'" data-toggle="modal" class="detail">
                                
                                <button class="btn btn-view-more-transaction">Lihat Detail Transaksi</button>
                            
                            </a>
                            
                            </div>
                        </div>'.$daftar_barang.'
                    </div>';
        })
        ->rawColumns(['all'])
        ->make(true);
    }

    public function table_proses(Request $request)
    {
        if ($request->category == 'Terbaru') {
            $data = DB::table('d_sales')
                ->where('s_member',Auth::user()->cm_code)
                ->leftJoin('d_province','p_id','=','s_province')
                ->leftJoin('d_city','c_id','=','s_city')
                ->leftJoin('d_district','d_id','=','s_district')
                ->orderBy('s_date','desc')
                ->where('s_isapprove','Y')
                ->where('s_delivered','N');
        }else if($request->category == 'Total Belanja'){
            $data = DB::table('d_sales')
                ->where('s_member',Auth::user()->cm_code)
                ->leftJoin('d_province','p_id','=','s_province')
                ->leftJoin('d_city','c_id','=','s_city')
                ->leftJoin('d_district','d_id','=','s_district')
                ->orderBy('s_total','desc')
               ->where('s_isapprove','Y')
                ->where('s_delivered','N');
        }else{
            $data = DB::table('d_sales')
                ->where('s_member',Auth::user()->cm_code)
                ->leftJoin('d_province','p_id','=','s_province')
                ->leftJoin('d_city','c_id','=','s_city')
                ->leftJoin('d_district','d_id','=','s_district')
                ->where('s_isapprove','Y')
                ->where('s_delivered','N');
        }


        if ($request->tanggal_transaksi_awal != null && $request->tanggal_transaksi_akhir != null) {

            $data = $data
                ->whereBetween('s_date',[Carbon::parse($request->tanggal_transaksi_awal)->format('Y-m-d'),Carbon::parse($request->tanggal_transaksi_akhir)->format('Y-m-d')]);

        }

        if ($request->order == 'Terbaru') {
            $data = $data->orderBy('s_date','desc');
        }else if ($request->order == 'Total Belanja') {
            $data = $data->orderBy('s_total','desc');
        }

        $data = $data->get();

        return Datatables::of($data)
        ->addColumn('all',function($data) use ($request){
                $data2 = DB::table('d_salesdt')
                    ->leftJoin('d_sales','s_id','=','sd_sales')
                    ->leftJoin('m_member','cm_code','=','s_member')
                    ->leftJoin('m_item','i_code','=','sd_item')
                    ->leftJoin('m_itemprice','ipr_ciproduct','=','i_code')
                    ->leftJoin('m_itemproduct','itp_ciproduct','=','i_code')
                    ->leftJoin('m_imgproduct','ip_ciproduct','=','i_code')
                    ->leftJoin('m_itemunit','iu_code','=','itp_ciunit')
                    ->leftJoin('m_whouse','w_code','=','s_whouse')
                    ->leftJoin('d_province','p_id','=','s_province')
                    ->leftJoin('d_city','c_id','=','s_city')
                    ->leftJoin('d_district','d_id','=','s_district')
                    ->groupBy('sd_detailid')
                    ->where('s_nota',$data->s_nota);

                if ($request->produk != null) {
                    $data2 = $data2->where('i_name','LIKE', '%'.$request->produk.'%');
                }
                

            $data2 = $data2->get();
            if ($data->s_paymethod == 'T') {
                    $metode = 'Tunai'; 
                }else if ($data->s_paymethod == 'N'){
                    $metode = 'Tempo';
                }else{
                    $metode = '';
                }

            if ($data->s_paystatus == 'N') {
                    $status = 'Pembayaran';
                    $stat = 'P';
                }

                if ($data->s_paystatus == 'Y') {
                    $status = 'Sudah Bayar';
                    $stat = 'SB';
                }

                if ($data->s_isapprove == 'Y') {
                    $status = 'Proses Packing';
                    $stat = 'PP';
                }

                if ($data->s_packing == 'Y') {
                    $status = 'Packing Selesai';
                    $stat = 'PS';
                }  

                if ($data->s_delivered == 'P') {
                    $status = 'Sedang Dikirim';
                    $stat = 'SD';
                }     

                if ($data->s_delivered == 'L') {
                    $status = 'Pengiriman Terhambat';
                    $stat = 'T';
                }

                if ($data->s_delivered == 'Y') {
                    $status = 'Transaksi Selesai';
                    $stat = 'TS';
                }   

                if ($data->s_isapprove == 'N') {
                    $status = 'Ditolak';
                    $stat = 'D';
                }

            $daftar_barang = '';

            $totalbeli = 0 ;
            foreach ($data2 as $row) {
                $daftar_barang .= '
                    <div class="row column-item-product item-product-allstatus">
                        <div class="col-lg-6">
                            <div class="d-flex">
                                <img src="'.env("APP_WIB").'storage/image/master/produk/'.$row->ip_path.'"
                                                            width="100px" height="100px">

                                <div class="padding-0-15">
                                    <div class="fs-14 semi-bold nameproduct">'.$row->i_name.'</div>
                                    <div class="fs-14 semi-bold pt-3">'.$row->s_nota.'<span></div>
                                    <div class="fs-14 semi-bold pt-3">'.Carbon::parse($row->s_date)->formatLocalized('%d %B %Y').'<span class="text-full-payment-transaction">Total Pembayaran :
                                    <span class="text-full-price-transaction">Rp. '.$row->sd_total.'</span></span></div>
                                </div>
                            </div>
                        </div>
                    <div class="col-lg-2 text-center">
                        <label class="label label-primary bg-primary-wib">'. $status .'</label>
                    </div>
                    <div class="col-lg-4">
                        <a href="'.route('produk-detail-frontpage', ['code'=>$row->i_code]).'"><button class="btn btn-buy-more-product">Beli Lagi</button></a>
                        </div>
                    </div>';

            $totalbeli += $row->sd_qty;
            }

            $image = 0 ;

            $totalbayar = 0 ;

            return '<div class="column-group-item-product mt-5">
                        <div class="row">
                            <div class="col-lg-8 col-md-8">
                            <span class="fs-14 semi-bold">'.$data->s_nota.'</span>
                            <span class="text-full-payment-transaction">Total Semua Barang : 
                                <span class="text-full-price-transaction semi-bold" id="count">Rp. '.number_format($data->s_total,2).'</span>
                            </span> 
                            </div> <div class="col-lg-4 col-md-4">
                                <a data-target="#modal-detail" data-id="'.$data->s_nota.'" data-status="'.$stat.'" data-date="'.$data->s_date.'" data-customer="'.Auth::user()->cm_name.'" data-alamat="'.$data->s_address.'" data-totalb="'.$totalbeli.'" data-provinsi="'.$data->p_nama.'" data-kecamatan="'.$data->c_nama.'" data-district="'.$data->d_nama.'" data-pos="'.$data->s_postalcode.'" data-metode="'.$metode.'" data-hargat="Rp. '.$data->s_total.'" data-toggle="modal" class="detail">
                                
                                <button class="btn btn-view-more-transaction">Lihat Detail Transaksi</button>
                            
                            </a>
                            
                            </div>
                        </div>'.$daftar_barang.'
                    </div>';
        })
        ->rawColumns(['all'])
        ->make(true);
    }

    public function bayar(Request $request)
    {
            request()->validate([

            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);

            $cek = DB::table('d_memberpurchase')->where('mp_nota',$request->nota)->count();
            $image = $request->file('gambar');
            if($request->hasFile('gambar')){ 
            $urutan = DB::table('d_memberpurchase')
                ->count();
            $name=time().$image->getClientOriginalName();
                if ($cek == 0) {
                $image->move(storage_path().'/image/member/pembayaran/',$name);  
                    DB::table('d_memberpurchase')->insert([
                        'mp_path' => $name,
                        'mp_nota' => $request->nota,
                        'mp_cmember' => Auth::user()->cm_code,
                        'status_data' => 'true',
                    ]);
                    DB::table('d_sales')->where('s_nota',$request->nota)->update([
                        's_paymethod'=>'T',
                    ]);

                return redirect()->back()->with('success','success');
                }else{
                    return redirect()->back()->with('many','error');
                }  
          }else{
            $storefilename = 'noimage.jpg';
            return redirect()->back()->with('error','error');
          }
    }

    public function detail(Request $request){
        $data = DB::table('d_sales')
                ->leftJoin('d_salesdt','sd_sales','s_id')
                ->join('m_member','cm_code','s_member')
                ->leftjoin('m_imgproduct','ip_ciproduct','sd_item')
                ->leftJoin('m_itemunit','iu_code','d_sales.sell_cunit')
                ->leftjoin('m_item','i_code','sd_item')
                ->leftjoin('m_itemprice','ipr_ciproduct','sd_item')
                ->where('s_nota',$request->nota)
                ->groupBy('sd_item')
                ->get();

        return Datatables::of($data)
        ->addColumn('daftar',function($data){
            return '
                        <td>
                            <img src="{{env("APP_WIB")}}storage/image/master/produk/'.$data->ip_path.'" width="60">
                                </td>
                                    <td>
                                        <h3>
                                            <a href="#" class="text-navy d-none">
                                                '.$data->i_name.'
                                            </a>
                                        </h3>
                                        <div class="m-t-sm">
                                            <span class="text-warning d-none">Rp. '.$data->ipr_sunitprice.'</span>
                                            <span class="text-muted d-none">'.$data->sell_quantity.' Produk</span>
                                        </div>
                                    </td>
                        
            ';
        })
        ->addColumn('namabarang',function($data){
            return $data->i_name;
        })
        ->addColumn('satuanbarang',function($data){
            return $data->iu_name;
        })
        ->addColumn('jumlahbeli',function($data){
            return $data->sell_quantity;
        })
        ->addColumn('harga',function($data){
            return '
                    <div class="text-right">Rp. '.$data->sell_priced.'</div>
            ';
        })
        ->rawColumns(['daftar','harga','namabarang','satuanbarang','jumlahbeli'])
        ->make(true);
    }
}
