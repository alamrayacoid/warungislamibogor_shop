<?php

namespace App\Http\Controllers\Frontpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Carbon\Carbon;
use App\gambar;
use DataTables;
use App\d_seller;

class PembelianController extends Controller
{

    public function pembelian(Request $request)
    {
            $totalbayar = 0;   
            $group = DB::table('d_seller')->join('m_item','i_code','sell_ciproduct')
    		->leftJoin('m_itemproduct','itp_ciproduct','sell_ciproduct')
            ->leftJoin('m_itemprice','ipr_ciproduct','sell_ciproduct')
            ->leftJoin('d_province','p_id','sell_province')
            ->leftJoin('d_district','d_id','sell_district')
            ->leftJoin('d_city','c_id','sell_city')
    		->groupBy('sell_nota')
    		->where('sell_ccustomer',Auth::user()->cm_code);
    		$allstatus = DB::table('d_seller')
    		->leftJoin('m_item','i_code','sell_ciproduct')
    		->leftJoin('m_itemproduct','itp_ciproduct','sell_ciproduct')
            ->leftJoin('m_itemprice','ipr_ciproduct','sell_ciproduct')
            ->leftJoin('d_province','p_id','sell_province')
            ->leftJoin('d_district','d_id','sell_district')
            ->leftJoin('d_city','c_id','sell_city')
            ->groupBy('sell_id')
            ->where('sell_ccustomer',Auth::user()->cm_code);
    		

            if ($request->nama_produk != null) {
                $group->where('i_name',$request->nama_produk);
                $allstatus->where('i_name',$request->nama_produk);
            }
            
            if($request->tanggal_transaksi_awal != null && $request->tanggal_transaksi_akhir != null){
                $group->whereBetween('sell_date',[Carbon::parse($request->tanggal_transaksi_awal)->format('Y,m,d'),Carbon::parse($request->tanggal_transaksi_akhir)->format('Y,m,d')]);
                $allstatus->whereBetween('sell_date',[Carbon::parse($request->tanggal_transaksi_awal)->format('Y,m,d'),Carbon::parse($request->tanggal_transaksi_akhir)->format('Y,m,d')]);

            }

            if($request->orderby){
                if($request->orderby == '1'){
                    $group->orderBy('sell_date','desc');
                    $allstatus->orderBy('sell_date','desc');
                }else if ($request->orderby == '2'){
                    $group->orderBy('sell_total','desc');
                    $allstatus->orderBy('sell_total','desc');
                }
            }

            $gambar = DB::table('d_seller')->join('m_imgproduct','ip_ciproduct','sell_ciproduct')->groupBy('sell_nota');
            $kategori = DB::table('m_itemtype')->where('status_data','true')->get();
            $countproses = DB::table('d_seller')->whereIn('sell_status',['SP','PS','PP','TS'])->where('sell_ccustomer',Auth::user()->cm_code)->count();
            $countkirim = DB::table('d_seller')->where('sell_status','SD')->where('sell_ccustomer',Auth::user()->cm_code)->count();
    	return view('frontpage.pembelian.pembelian',array(
            'totalbayar' => $totalbayar,
    		'allstatus' => $allstatus->get(),
    		'pembayaran' => $allstatus->whereIn('sell_status',['P','SB'])->get(),
    		'proses' => $allstatus->whereIn('sell_status',['SP','PS','PP','TS'])->get(),
    		'pengiriman' => $allstatus->where('sell_status','SD')->get(),
            'group' => $group->select('d_seller.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))->get(),	
    		'groupp' => $group->whereIn('sell_status',['P','SB'])->select('d_seller.*','m_itemproduct.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))->orderBy('sell_status','asc')->get(),
            'grouppro' => $group->where('sell_status','SP')->select('d_seller.*','m_itemproduct.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))->get(),
            'groupprostat' => $countproses,
            'groupppengstat' => $countkirim,
    		'groupppeng' => $group->where('sell_status','SD')->select('d_seller.*','m_itemproduct.*','m_itemprice.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))->get(),
            'gambar' => $gambar->get(),
            'kategori'=>$kategori,
    	));
    }

    public function table_allstatus()
    {
        $data = DB::table('d_seller')
            ->leftJoin('m_item','i_code','sell_ciproduct')
            ->leftJoin('m_itemproduct','itp_ciproduct','sell_ciproduct')
            ->leftJoin('m_itemprice','ipr_ciproduct','sell_ciproduct')
            ->leftJoin('d_province','p_id','sell_province')
            ->leftJoin('d_district','d_id','sell_district')
            ->leftJoin('d_city','c_id','sell_city')
            ->groupBy('sell_id')
            ->where('sell_ccustomer',Auth::user()->cm_code)
            ->get();

        return Datatables::of($data)
        ->addColumn('all',function($data){
            $image = 0 ;
            $totalbayar = 0 ;
            if($data->sell_status == 'P'){
                    $stat = 'Pembayaran';
                }else if($data->sell_status == 'PP'){
                    $stat = 'Proses Packing';
                }else if($data->sell_status == 'PS'){
                    $stat = 'Packing Selesai';
                }else if($data->sell_status == 'SD'){
                    $stat = 'Sedang Dikirim';
                }else if($data->sell_status == 'SB'){
                    $stat = 'Sudah Bayar';
                }else if($data->sell_status == 'SP'){
                    $stat = 'Sedang Diproses';
                }else if($data->sell_status == 'TS'){
                    $stat = 'Sedang Diproses';
                }else if($data->sell_status == 'T'){
                    $stat = 'Pengiriman Terhambat';
                }else {
                    $stat = 'Unkown';
                }

            return '<div id="itemproduct-group-allstatus">
                        <div class="row">
                        <div class="col-lg-8 col-md-8">
                        <span class="fs-14 semi-bold">'.$data->sell_nota.'</span><span class="text-full-payment-transaction">Total Semua Barang : <span class="text-full-price-transaction semi-bold" id="count">Rp. '. number_format($totalbayar,2).'</span></span>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <a data-target="#modal-detail" data-id="'.$data->sell_nota.'"
                                                        data-status="'.$data->sell_status.'"
                                                        data-date="'.$data->sell_date.'"
                                                        data-customer="'.Auth::user()->cm_name.'"
                                                        data-alamat="'.$data->sell_address.'"
                                                        data-totalb="'.$data->sell_total.'"
                                                        data-provinsi="'.$data->p_nama.'"
                                                        data-kecamatan="'.$data->c_nama.'"
                                                        data-district="'.$data->d_nama.'"
                                                        data-metode="'.$data->sell_method.'"
                                                        data-pos="'.$data->sell_postalcode.'"
                                                        data-hargat="Rp. '.$totalbayar.'" data-toggle="modal"
                                                        class="detail"><button
                                                            class="btn btn-view-more-all-transaction">Lihat Detail
                                                            Transaksi</button></a>
                                                </div>
                                            </div>
                                            <div class="row column-item-product item-product-allstatus">
                                                <div class="col-lg-6">
                                                    <div class="d-flex">
                                                        <img src="'.env("APP_WIB").'storage/image/master/produk/'.$image.'"
                                                            width="100px" height="100px">
                                                        <div class="padding-0-15">
                                                            <div class="fs-14 semi-bold nameproduct">'.$data->i_name.'
                                                            </div>
                                                            <div class="fs-14 semi-bold pt-3">'.$data->sell_nota.'<span>
                                                            </div>
                                                            <div class="fs-14 semi-bold pt-3">
                                                                '.Carbon::parse($data->sell_date)->formatLocalized('%d %B %Y').'<span
                                                                    class="text-full-payment-transaction">Total
                                                                    Pembayaran :
                                                                    <span class="text-full-price-transaction">Rp.
                                                                        '.$data->sell_total.'</span></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 text-center">
                                                    <label class="label label-primary bg-primary-wib">'.
                                                        $stat
                                                    .'</label>
                                                </div>
                                                <div class="col-lg-4">
                                                    <a
                                                        href="'.route('produk-detail-frontpage', ['code'=>$data->i_code]).'"><button
                                                            class="btn btn-buy-more-product">Beli Lagi</button></a>
                                                </div>
                                            </div>
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
                    DB::table('d_seller')->where('sell_nota',$request->nota)->update([
                        'sell_status'=>'SB',
                        'sell_method'=>'transfer',
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
        $data = DB::table('d_seller')
                ->join('m_member','cm_code','sell_ccustomer')
                ->leftjoin('m_imgproduct','ip_ciproduct','sell_ciproduct')
                ->leftJoin('m_itemunit','iu_code','d_seller.sell_cunit')
                ->leftjoin('m_item','i_code','sell_ciproduct')
                ->leftjoin('m_itemprice','ipr_ciproduct','sell_ciproduct')
                ->where('sell_nota',$request->nota)
                ->groupBy('sell_ciproduct')
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
    public function filterallstatus(Request $request){
        $tanggalawal = Carbon::parse($request->tanggalawal);
        $tanggalakhir = Carbon::parse($request->tanggalakhir);

        $allstatus = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
            ->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
            ->leftJoin('d_province','p_id','sell_province')
            ->leftJoin('d_district','d_id','sell_district')
            ->leftJoin('d_city','c_id','sell_city')
            ->where('sell_ccustomer',Auth::user()->cm_code)
            ->groupBy('sell_nota');

            $item = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
            ->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
            ->leftJoin('d_province','p_id','sell_province')
            ->leftJoin('d_district','d_id','sell_district')
            ->leftJoin('d_city','c_id','sell_city')
            ->where('sell_ccustomer',Auth::user()->cm_code)
            ->get();

            $gambar = DB::table('d_seller')->join('m_imgproduct','ip_ciproduct','sell_ciproduct')->groupBy('sell_nota')->get();

        if($request->sell_date == 'Terbaru'){
            if($request->tanggalawal != null && $request->tanggalakhir != null){

                $group = $allstatus->orderBy('sell_date','desc')->whereBetween('sell_date', [$tanggalawal->format('Y,m,d'), $tanggalakhir->format('Y,m,d')])
                ->select('d_seller.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
                ->get();

            }else{
                $group = $allstatus->orderBy('sell_date','desc')
                        ->select('d_seller.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
                        ->get();    
            }
        }else if($request->sell_date == 'Total Belanja'){

            if($request->tanggalawal != null && $request->tanggalakhir != null){

                $group = $allstatus->whereBetween('sell_date', [$tanggalawal->format('Y,m,d'), $tanggalakhir->format('Y,m,d')])
                ->select('d_seller.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
                ->orderBy('totalbayar','desc')
                ->get();

            }else{

                $group = $allstatus->select('d_seller.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
                ->orderBy('totalbayar','desc')
                ->get();
            }

        }
        return view('frontpage.pembelian.filterallstatus.filterstatus',array(
            'group'=>$group,
            'allstatus'=> $item,
            'gambar'=> $gambar,
        ));
    }
    public function filtertanggalall(Request $request){
        $tanggalawal = Carbon::parse($request->tanggalawal);
        $tanggalakhir = Carbon::parse($request->tanggalakhir);
        $allstatus = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
            ->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
            ->leftJoin('d_province','p_id','sell_province')
            ->leftJoin('d_district','d_id','sell_district')
            ->leftJoin('d_city','c_id','sell_city')
            ->where('sell_ccustomer',Auth::user()->cm_code)
            ->groupBy('sell_nota');

        $item = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
            ->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
            ->leftJoin('d_province','p_id','sell_province')
            ->leftJoin('d_district','d_id','sell_district')
            ->leftJoin('d_city','c_id','sell_city')
            ->where('sell_ccustomer',Auth::user()->cm_code)
            ->get();
        
        if($request->tanggalawal != null && $request->tanggalakhir != null){
            if($request->sell_date == 'Terbaru'){

                $group = $allstatus->whereBetween('sell_date', [$tanggalawal->format('Y,m,d'), $tanggalakhir->format('Y,m,d')])
                ->select('d_seller.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
                ->orderBy('sell_date','desc')
                ->get();

            }else if($request->sell_date == 'Total Belanja'){

                $group = $allstatus->whereBetween('sell_date', [$tanggalawal->format('Y,m,d'), $tanggalakhir->format('Y,m,d')])
                ->select('d_seller.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
                ->orderBy('totalbayar','desc')
                ->get();
            }else{

                $group = $allstatus->whereBetween('sell_date', [$tanggalawal->format('Y,m,d'), $tanggalakhir->format('Y,m,d')])
                ->select('d_seller.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
                ->get();
            }
        }else{
            // $group = $allstatus->whereBetween('sell_date', [$tanggalawal->format('Y,m,d'), $tanggalakhir->format('Y,m,d')])
            // ->select('d_seller.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
            // ->get();
        }
            
            $gambar = DB::table('d_seller')->join('m_imgproduct','ip_ciproduct','sell_ciproduct')->groupBy('sell_nota')->get();
            return view('frontpage.pembelian.filterallstatus.filterstatus',array(
                'group'=>$group,
                'allstatus'=> $item,
                'gambar'=> $gambar,
            ));
    }
    public function resetallstatus(){
        $allstatus = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
            ->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
            ->leftJoin('d_province','p_id','sell_province')
            ->leftJoin('d_district','d_id','sell_district')
            ->leftJoin('d_city','c_id','sell_city')
            ->where('sell_ccustomer',Auth::user()->cm_code)
            ->groupBy('sell_nota')
            ->select('d_seller.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
            ->orderBy('sell_date','desc')
            ->get();

        $item = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
            ->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
            ->leftJoin('d_province','p_id','sell_province')
            ->leftJoin('d_district','d_id','sell_district')
            ->leftJoin('d_city','c_id','sell_city')
            ->where('sell_ccustomer',Auth::user()->cm_code)
            ->get();

            $gambar = DB::table('d_seller')->join('m_imgproduct','ip_ciproduct','sell_ciproduct')->groupBy('sell_nota')->get();
            
            return view('frontpage.pembelian.filterallstatus.filterstatus',array(
                'group'=>$allstatus,
                'allstatus'=> $item,
                'gambar'=> $gambar,
            ));
    }

    public function filter_paymentstatus(Request $request){
        $tanggalawal = Carbon::parse($request->tanggalawal);
        $tanggalakhir = Carbon::parse($request->tanggalakhir);

        $allstatus = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
            ->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
            ->leftJoin('d_province','p_id','sell_province')
            ->leftJoin('d_district','d_id','sell_district')
            ->leftJoin('d_city','c_id','sell_city')
            ->where('sell_ccustomer',Auth::user()->cm_code)
            ->whereIn('sell_status',['P','SB'])
            ->groupBy('sell_nota');

            $item = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
            ->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
            ->leftJoin('d_province','p_id','sell_province')
            ->leftJoin('d_district','d_id','sell_district')
            ->leftJoin('d_city','c_id','sell_city')
            ->where('sell_ccustomer',Auth::user()->cm_code)
            ->whereIn('sell_status',['P','SB'])
            ->get();

            $gambar = DB::table('d_seller')->join('m_imgproduct','ip_ciproduct','sell_ciproduct')->groupBy('sell_nota')->get();

        if($request->sell_date == 'Terbaru'){
            if($request->tanggalawal != null && $request->tanggalakhir != null){

                $group = $allstatus->orderBy('sell_date','desc')->whereBetween('sell_date', [$tanggalawal->format('Y,m,d'), $tanggalakhir->format('Y,m,d')])
                ->select('d_seller.*','m_itemproduct.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
                ->get();

            }else{
                $group = $allstatus->orderBy('sell_date','desc')
                ->select('d_seller.*','m_itemproduct.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
                ->get();    
            }
        }else if($request->sell_date == 'Total Belanja'){
            if($request->tanggalawal != null && $request->tanggalakhir != null){
                $group = $allstatus->whereBetween('sell_date', [$tanggalawal->format('Y,m,d'), $tanggalakhir->format('Y,m,d')])
                ->select('d_seller.*','m_itemproduct.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
                ->orderBy('totalbayar','desc')
                ->get();

            }else{
                $group = $allstatus->select('d_seller.*','m_itemproduct.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
                ->orderBy('totalbayar','desc')
                ->get();
            }
        }
        return view('frontpage.pembelian.filterstatuspembayaran.filterstatus',array(
            'groupp'=>$group,
            'allstatus'=> $item,
            'gambar'=> $gambar,
        ));
    }

    public function filterdate_paymentstatus(Request $request){
        $tanggalawal = Carbon::parse($request->tanggalawal);
        $tanggalakhir = Carbon::parse($request->tanggalakhir);
        $allstatus = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
            ->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
            ->leftJoin('d_province','p_id','sell_province')
            ->leftJoin('d_district','d_id','sell_district')
            ->leftJoin('d_city','c_id','sell_city')
            ->where('sell_ccustomer',Auth::user()->cm_code)
            ->whereIn('sell_status',['P','SB'])
            ->groupBy('sell_nota');

        $item = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
            ->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
            ->leftJoin('d_province','p_id','sell_province')
            ->leftJoin('d_district','d_id','sell_district')
            ->leftJoin('d_city','c_id','sell_city')
            ->whereIn('sell_status',['P','SB'])
            ->where('sell_ccustomer',Auth::user()->cm_code)
            ->get();
        
        if($request->tanggalawal != null && $request->tanggalakhir != null){
            if($request->sell_date == 'Terbaru'){

                $group = $allstatus->whereBetween('sell_date', [$tanggalawal->format('Y,m,d'), $tanggalakhir->format('Y,m,d')])
                ->select('d_seller.*','m_itemproduct.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
                ->orderBy('sell_date','desc')
                ->get();

            }else if($request->sell_date == 'Total Belanja'){

                $group = $allstatus->whereBetween('sell_date', [$tanggalawal->format('Y,m,d'), $tanggalakhir->format('Y,m,d')])
                ->select('d_seller.*','m_itemproduct.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
                ->orderBy('totalbayar','desc')
                ->get();
            }else{

                $group = $allstatus->whereBetween('sell_date', [$tanggalawal->format('Y,m,d'), $tanggalakhir->format('Y,m,d')])
                ->select('d_seller.*','m_itemproduct.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
                ->get();
            }
        }else{
           
        }      
            $gambar = DB::table('d_seller')->join('m_imgproduct','ip_ciproduct','sell_ciproduct')->groupBy('sell_nota')->get();
            return view('frontpage.pembelian.filterallstatus.filterstatus',array(
                'group'=>$group,
                'allstatus'=> $item,
                'gambar'=> $gambar,
            ));
    }
    public function reset_paymentstatus(Request $request){
        $allstatus = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
            ->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
            ->leftJoin('d_province','p_id','sell_province')
            ->leftJoin('d_district','d_id','sell_district')
            ->leftJoin('d_city','c_id','sell_city')
            ->where('sell_ccustomer',Auth::user()->cm_code)
            ->whereIn('sell_status',['P','SB'])
            ->groupBy('sell_nota')
            ->select('d_seller.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
            ->orderBy('sell_date','desc')
            ->get();

        $item = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
            ->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
            ->leftJoin('d_province','p_id','sell_province')
            ->leftJoin('d_district','d_id','sell_district')
            ->leftJoin('d_city','c_id','sell_city')
            ->where('sell_ccustomer',Auth::user()->cm_code)
            ->whereIn('sell_status',['P','SB'])
            ->get();
        $gambar = DB::table('d_seller')->join('m_imgproduct','ip_ciproduct','sell_ciproduct')->groupBy('sell_nota')->get();
            
            return view('frontpage.pembelian.filterstatuspembayaran.filterstatus',array(
                'groupp'=>$allstatus,
                'allstatus'=> $item,
                'gambar'=> $gambar,
            ));
    }

    public function filter_prosesstatus(Request $request){
        $allstatus = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
            ->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
            ->leftJoin('d_province','p_id','sell_province')
            ->leftJoin('d_district','d_id','sell_district')
            ->leftJoin('d_city','c_id','sell_city')
            ->where('sell_ccustomer',Auth::user()->cm_code)
            ->groupBy('sell_nota');

        $item = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
            ->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
            ->leftJoin('d_province','p_id','sell_province')
            ->leftJoin('d_district','d_id','sell_district')
            ->leftJoin('d_city','c_id','sell_city')
            ->where('sell_ccustomer',Auth::user()->cm_code)
            ->get();
            
        $gambar = DB::table('d_seller')->join('m_imgproduct','ip_ciproduct','sell_ciproduct')->groupBy('sell_nota')->get();
        if($request->sell_date == 'Terbaru'){
            if($request->tanggalawal != null && $request->tanggalakhir != null){

                $group = $allstatus->orderBy('sell_date','desc')->whereBetween('sell_date', [$tanggalawal->format('Y,m,d'), $tanggalakhir->format('Y,m,d')])
                ->select('d_seller.*','m_itemproduct.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
                ->get();

            }else{
                $group = $allstatus->orderBy('sell_date','desc')
                ->select('d_seller.*','m_itemproduct.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
                ->get();    
            }
        }else if($request->sell_date == 'Total Belanja'){
            if($request->tanggalawal != null && $request->tanggalakhir != null){
                $group = $allstatus->whereBetween('sell_date', [$tanggalawal->format('Y,m,d'), $tanggalakhir->format('Y,m,d')])
                ->select('d_seller.*','m_itemproduct.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
                ->orderBy('totalbayar','desc')
                ->get();

            }else{
                $group = $allstatus->select('d_seller.*','m_itemproduct.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
                ->orderBy('totalbayar','desc')
                ->get();
            }
        }
        $gambar = DB::table('d_seller')->join('m_imgproduct','ip_ciproduct','sell_ciproduct')->groupBy('sell_nota')->get();
        $countproses = DB::table('d_seller')->whereIn('sell_status',['SP','PS','PP','TS'])->where('sell_ccustomer',Auth::user()->cm_code)->count();

        return view('frontpage.pembelian.filterstatusproses.filterstatus',array(
            'group'=>$group,
            'allstatus'=> $item,
            'gambar'=> $gambar,
            'groupprostat' => $countproses,
        ));
    }
    public function filterdate_prosesstatus(Request $request){
        $tanggalawal = Carbon::parse($request->tanggalawal);
        $tanggalakhir = Carbon::parse($request->tanggalakhir);
        $allstatus = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
            ->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
            ->leftJoin('d_province','p_id','sell_province')
            ->leftJoin('d_district','d_id','sell_district')
            ->leftJoin('d_city','c_id','sell_city')
            ->where('sell_ccustomer',Auth::user()->cm_code)
            ->groupBy('sell_nota');

        $item = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
            ->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
            ->leftJoin('d_province','p_id','sell_province')
            ->leftJoin('d_district','d_id','sell_district')
            ->leftJoin('d_city','c_id','sell_city')
            ->where('sell_ccustomer',Auth::user()->cm_code)
            ->get();
        
        if($request->tanggalawal != null && $request->tanggalakhir != null){
            if($request->sell_date == 'Terbaru'){
                $group = $allstatus->whereBetween('sell_date', [$tanggalawal->format('Y,m,d'), $tanggalakhir->format('Y,m,d')])
                ->select('d_seller.*','m_itemproduct.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
                ->orderBy('sell_date','desc')
                ->get();

            }else if($request->sell_date == 'Total Belanja'){

                $group = $allstatus->whereBetween('sell_date', [$tanggalawal->format('Y,m,d'), $tanggalakhir->format('Y,m,d')])
                ->select('d_seller.*','m_itemproduct.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
                ->orderBy('totalbayar','desc')
                ->get();
            }else{

                $group = $allstatus->whereBetween('sell_date', [$tanggalawal->format('Y,m,d'), $tanggalakhir->format('Y,m,d')])
                ->select('d_seller.*','m_itemproduct.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
                ->get();
            }
        }else{
           
        }  
        
            $gambar = DB::table('d_seller')->join('m_imgproduct','ip_ciproduct','sell_ciproduct')->groupBy('sell_nota')->get();
            $countproses = DB::table('d_seller')->whereIn('sell_status',['SP','PS','PP','TS'])->where('sell_ccustomer',Auth::user()->cm_code)->count();
            return view('frontpage.pembelian.filterstatusproses.filterstatus',array(
                'group'=>$group,
                'allstatus'=> $item,
                'gambar'=> $gambar,
                'groupprostat' => $countproses,
            ));
    }
    public function reset_prosesstatus(Request $request){
        $allstatus = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
            ->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
            ->leftJoin('d_province','p_id','sell_province')
            ->leftJoin('d_district','d_id','sell_district')
            ->leftJoin('d_city','c_id','sell_city')
            ->where('sell_ccustomer',Auth::user()->cm_code)
            ->groupBy('sell_nota')
            ->select('d_seller.*','m_itemproduct.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
            ->get();

        $item = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
            ->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
            ->leftJoin('d_province','p_id','sell_province')
            ->leftJoin('d_district','d_id','sell_district')
            ->leftJoin('d_city','c_id','sell_city')
            ->where('sell_ccustomer',Auth::user()->cm_code)
            ->get();

        $gambar = DB::table('d_seller')->join('m_imgproduct','ip_ciproduct','sell_ciproduct')->groupBy('sell_nota')->get();
        $countproses = DB::table('d_seller')->whereIn('sell_status',['SP','PS','PP','TS'])->where('sell_ccustomer',Auth::user()->cm_code)->count();
        return view('frontpage.pembelian.filterstatusproses.filterstatus',array(
            'group'=>$allstatus,
            'allstatus'=> $item,
            'gambar'=> $gambar,
            'groupprostat' => $countproses,
        ));
    }
    public function filter_pengirimanstatus(Request $request){
        $allstatus = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
            ->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
            ->leftJoin('d_province','p_id','sell_province')
            ->leftJoin('d_district','d_id','sell_district')
            ->leftJoin('d_city','c_id','sell_city')
            ->where('sell_ccustomer',Auth::user()->cm_code)
            ->groupBy('sell_nota');

        $item = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
            ->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
            ->leftJoin('d_province','p_id','sell_province')
            ->leftJoin('d_district','d_id','sell_district')
            ->leftJoin('d_city','c_id','sell_city')
            ->where('sell_ccustomer',Auth::user()->cm_code)
            ->get();
            
        $gambar = DB::table('d_seller')->join('m_imgproduct','ip_ciproduct','sell_ciproduct')->groupBy('sell_nota')->get();
        if($request->sell_date == 'Terbaru'){
            if($request->tanggalawal != null && $request->tanggalakhir != null){

                $group = $allstatus->orderBy('sell_date','desc')->whereBetween('sell_date', [$tanggalawal->format('Y,m,d'), $tanggalakhir->format('Y,m,d')])
                ->select('d_seller.*','m_itemproduct.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
                ->get();

            }else{
                $group = $allstatus->orderBy('sell_date','desc')
                ->select('d_seller.*','m_itemproduct.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
                ->get();    
            }
        }else if($request->sell_date == 'Total Belanja'){
            if($request->tanggalawal != null && $request->tanggalakhir != null){
                $group = $allstatus->whereBetween('sell_date', [$tanggalawal->format('Y,m,d'), $tanggalakhir->format('Y,m,d')])
                ->select('d_seller.*','m_itemproduct.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
                ->orderBy('totalbayar','desc')
                ->get();

            }else{
                $group = $allstatus->select('d_seller.*','m_itemproduct.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
                ->orderBy('totalbayar','desc')
                ->get();
            }
        }
        $gambar = DB::table('d_seller')->join('m_imgproduct','ip_ciproduct','sell_ciproduct')->groupBy('sell_nota')->get();
        $countkirim = DB::table('d_seller')->where('sell_status','SD')->where('sell_ccustomer',Auth::user()->cm_code)->count();

        return view('frontpage.pembelian.filterstatuspengiriman.filterstatus',array(
            'group'=>$group,
            'allstatus'=> $item,
            'gambar'=> $gambar,
            'groupppengstat' => $countkirim,
        ));
    }
    public function filterdate_pengirimanstatus(Request $request){
        $tanggalawal = Carbon::parse($request->tanggalawal);
        $tanggalakhir = Carbon::parse($request->tanggalakhir);
        $allstatus = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
            ->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
            ->leftJoin('d_province','p_id','sell_province')
            ->leftJoin('d_district','d_id','sell_district')
            ->leftJoin('d_city','c_id','sell_city')
            ->where('sell_ccustomer',Auth::user()->cm_code)
            ->groupBy('sell_nota');

        $item = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
            ->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
            ->leftJoin('d_province','p_id','sell_province')
            ->leftJoin('d_district','d_id','sell_district')
            ->leftJoin('d_city','c_id','sell_city')
            ->where('sell_ccustomer',Auth::user()->cm_code)
            ->get();
        
        if($request->tanggalawal != null && $request->tanggalakhir != null){
            if($request->sell_date == 'Terbaru'){
                $group = $allstatus->whereBetween('sell_date', [$tanggalawal->format('Y,m,d'), $tanggalakhir->format('Y,m,d')])
                ->select('d_seller.*','m_itemproduct.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
                ->orderBy('sell_date','desc')
                ->get();

            }else if($request->sell_date == 'Total Belanja'){

                $group = $allstatus->whereBetween('sell_date', [$tanggalawal->format('Y,m,d'), $tanggalakhir->format('Y,m,d')])
                ->select('d_seller.*','m_itemproduct.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
                ->orderBy('totalbayar','desc')
                ->get();
            }else{
                $group = $allstatus->whereBetween('sell_date', [$tanggalawal->format('Y,m,d'), $tanggalakhir->format('Y,m,d')])
                ->select('d_seller.*','m_itemproduct.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
                ->get();
            }
        }else{
           
        }  
        $gambar = DB::table('d_seller')->join('m_imgproduct','ip_ciproduct','sell_ciproduct')->groupBy('sell_nota')->get();
        $countkirim = DB::table('d_seller')->where('sell_status','SD')->where('sell_ccustomer',Auth::user()->cm_code)->count();
            return view('frontpage.pembelian.filterstatuspengiriman.filterstatus',array(
             'group'=>$group,
            'allstatus'=> $item,
            'gambar'=> $gambar,
            'groupppengstat' => $countkirim,
            ));
    }
    public function reset_pengirimanstatus(Request $request){
        $allstatus = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
            ->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
            ->leftJoin('d_province','p_id','sell_province')
            ->leftJoin('d_district','d_id','sell_district')
            ->leftJoin('d_city','c_id','sell_city')
            ->where('sell_ccustomer',Auth::user()->cm_code)
            ->groupBy('sell_nota')
            ->orderBy('sell_nota','asc')
            ->select('d_seller.*','m_itemproduct.*','m_itemprice.*','d_province.*','d_city.*','d_district.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))
            ->get();

        $item = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
            ->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
            ->leftJoin('d_province','p_id','sell_province')
            ->leftJoin('d_district','d_id','sell_district')
            ->leftJoin('d_city','c_id','sell_city')
            ->where('sell_ccustomer',Auth::user()->cm_code)
            ->get();
            $gambar = DB::table('d_seller')->join('m_imgproduct','ip_ciproduct','sell_ciproduct')->groupBy('sell_nota')->get();
            $countkirim = DB::table('d_seller')->where('sell_status','SD')->where('sell_ccustomer',Auth::user()->cm_code)->count();
            return view('frontpage.pembelian.filterstatuspengiriman.filterstatus',array(
            'group'=>$allstatus,
            'allstatus'=> $item,
            'gambar'=> $gambar,
            'groupppengstat' => $countkirim,
            ));
    }
}
