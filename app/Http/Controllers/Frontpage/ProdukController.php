<?php

namespace App\Http\Controllers\Frontpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use DataTables;

class ProdukController extends Controller
{
    public function produk(Request $request)
    {
        $type = DB::table('m_itemtype')->get();
        if(\Auth::check()){
        $keranjang = DB::table('d_cart')->where('cart_cmember',Auth::user()->cm_code)->where('status_data','true')->count();
        }else{
            $keranjang = '';
        }
        $kategory = $request->ctr;
            if ($kategory != null) {
            $data = DB::table('m_item')
                ->leftJoin('m_itemprice','ipr_ciproduct','i_code')
                ->leftJoin('m_itemproduct','itp_ciproduct','i_code')
                ->leftJoin('m_itemtype','ity_code','itp_citype')
                ->where('m_item.status_data','true')
                ->groupBy('i_name');

            

            $gambar = DB::table('m_item')->join('m_imgproduct','ip_ciproduct','i_code')->join('m_itemproduct','itp_ciproduct','i_code')->groupBy('i_code')->where('itp_citype',$kategory)->get();

            if ($request->search != null) {
                $data->where('i_name','LIKE', $request->search.'%')->get();
            }

            if ($request->nama_produk != null) {
                $data->where('i_name','LIKE', $request->nama_produk.'%')->get();
            }

            if ($request->harga_min != null && $request->harga_max != null) {
                $data->whereBetween('ipr_sunitprice',[$request->harga_min,$request->harga_max])->get();
            }

            if ($request->jenis != null) {
                $data->where('itp_citype',$request->jenis)->get();
            }
        }else{
            $data = DB::table('m_item')
                ->leftJoin('m_itemprice','ipr_ciproduct','i_code')
                ->leftJoin('m_itemproduct','itp_ciproduct','i_code')
                ->leftJoin('m_itemtype','ity_code','itp_citype')
                ->where('m_item.status_data','true')
                ->groupBy('i_name');
                

            $gambar = DB::table('m_item')->join('m_imgproduct','ip_ciproduct','i_code')->join('m_itemproduct','itp_ciproduct','i_code')->groupBy('i_code')->get();

        }

            

            $wish = DB::table('d_wishlist')->where('status_data','true')->get();

            if ($request->search != null) {
                $data->where('i_name','LIKE', $request->search.'%')->get();
            }

            if ($request->nama_produk != null) {
                $data->where('i_name','LIKE', $request->nama_produk.'%')->get();
            }

            if ($request->harga_min != null && $request->harga_max != null) {
                $data->whereBetween('ipr_sunitprice',[$request->harga_min,$request->harga_max])->get();
            }

            if ($request->jenis != null) {
                if ($request->jenis == 'All') {
                    $data->get();
                }else{
                    $data->where('itp_citype',$request->jenis)->get();
                }
            }
            $namabarang = $request->search;
            $kategori = DB::table('m_itemtype')->where('status_data','true')->get();
    	return view('frontpage.produk.produk-frontpage',array(
                'data' => $data->get(),
                'gambar' => $gambar,
                'wish' => $wish,
                'tipe' => $type,
                'namabarang' => $namabarang,
                'kategori'=>$kategori,
                'keranjang'=> $keranjang,
            ));
    }

    public function produk_detail(Request $request)
    {
        if(\Auth::check()){
            $dataseen = DB::table('d_lastseen')
                    ->where('ls_ccustomer',Auth::user()->cm_code)            
                    ->first();
        if (is_null($dataseen)) {
            DB::table('d_lastseen')->insert([
                'ls_cproduct'=>$request->code,
                'ls_ccustomer'=>Auth::user()->cm_code,
                'status_data'=>'true',
            ]);
        } else {
            DB::table('d_lastseen')->where('ls_ccustomer',Auth::user()->cm_code)->update([
                'ls_cproduct'=>$request->code,
                'status_data'=>'true',
            ]);
        }
        }else{

        }
    	$code = $request->code;
        $cabang = DB::table('d_stock')
            ->leftJoin('m_whouse','w_code','st_cwhouse')
            ->join('m_branch','b_code','w_cbranch')
            ->leftJoin('d_province','p_id','b_province')
            ->leftJoin('d_city','c_id','b_city')
            ->groupBy('w_cbranch')
            ->get();

        // $label = DB::table('d_stock')
        //     ->join('m_supplier','s_code','st_csupplier')
        //     ->where('st_ciproduct',$code)
        //     ->groupBy('st_csupplier')
        //     ->get();

        $gambar = DB::table('m_item')->join('m_imgproduct','ip_ciproduct','i_code')->where('i_code',$code)->get();
        $gambarsejenis = DB::table('m_item')->join('m_imgproduct','ip_ciproduct','i_code')->groupBy('i_code')->get();
        $satuan = [];
        $satuan1 = DB::table('m_itemproduct')->leftJoin('m_itemunit','iu_code','itp_ciunit')->where('itp_ciproduct',$code)->get();
        $satuan2 = DB::table('m_itemproduct')->leftJoin('m_itemunit','iu_code','itp_ciunit2')->where('itp_ciproduct',$code)->get();
        $satuan3 = DB::table('m_itemproduct')->leftJoin('m_itemunit','iu_code','itp_ciunit3')->where('itp_ciproduct',$code)->get();
        array_push($satuan,$satuan1);
        array_push($satuan,$satuan2);
        array_push($satuan,$satuan3);
    	$data = DB::table('m_item')
            ->join('m_itemprice','ipr_ciproduct','i_code')
            ->join('m_itemproduct','itp_ciproduct','i_code')
            ->join('m_itemtype','ity_code','itp_citype')
            ->where('i_code',$code)
            ->groupBy('i_name')
            ->get();
        $datas = DB::table('m_item')
            ->join('m_itemprice','ipr_ciproduct','i_code')
            ->join('m_itemproduct','itp_ciproduct','i_code')
            ->join('m_itemtype','ity_code','itp_citype')
            ->where('i_code',$code)
            ->groupBy('i_name')
            ->first();
        $produksejenis = DB::table('m_item')
            ->join('m_itemprice','ipr_ciproduct','i_code')
            ->join('m_itemproduct','itp_ciproduct','i_code')
            ->join('m_itemtype','ity_code','itp_citype')
            ->groupBy('i_name')
            ->where('m_item.status_data','true')
            ->where('itp_citype',$datas->itp_citype)
            ->where('i_code','!=',$code)
            ->take(5)
            ->get();
            
            $kategori = DB::table('m_itemtype')->where('status_data','true')->get();
            if(\Auth::check()){
            $keranjang = DB::table('d_cart')->where('cart_cmember',Auth::user()->cm_code)->where('status_data','true')->count();
            $wish = DB::table('d_wishlist')->where('status_data','true')->where('wl_ciproduct',$code)->where('wl_cmember',Auth::user()->cm_code)->count();
            }else{
                $keranjang = '';
                $wish = '';
            }

    	return view('frontpage.produk.produk-detail-frontpage',array(
            'data' => $data,
            'typeproduk'=>$datas,
            'gambar' => $gambar,
            'gambarsejenis'=>$gambarsejenis,
            'code' => $code,
            // 'label' => $label,
            'cabang' => $cabang,
            'kategori' => $kategori,
            'satuan' => $satuan,
            'wish'=> $wish,
            'produksejenis'=> $produksejenis,
            'keranjang'=> $keranjang,

    	));
    }
    public function caribarang(Request $request){
        $term = $request->get('term');
        $results = array();
        $queries = DB::table('m_item')
            ->orWhere('i_name','LIKE', '%'.$term.'%')
            ->where('status_data','true')
            ->take(10)->get();
        
        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->i_id, 'value' => $query->i_name];
        }
    return response()->json($results);
    }


    public function stock_check(Request $request)
    {
        $stock = DB::table('d_stock')
                ->leftJoin('m_whouse','w_code','st_cwhouse')
                ->where('w_cbranch',$request->cabang)
                ->where('st_ciproduct',$request->produk)
                ->get();

        $total_stock = 0;
        $stock_sementara = 0;

        foreach ($stock as $row) {
            $stocks = DB::table('d_salesdt')
                ->leftJoin('d_sales','s_id','sd_sales')
                ->where('sd_item',$request->produk)
                ->where('s_whouse',$row->st_cwhouse)
                ->where('s_paystatus','N')
                ->get();

            foreach ($stocks as $rows) {
                $stock_sementara += $rows->sd_qty;
            }

            $total_stock += $row->st_qty;
        }

        $stocknow = $total_stock - $stock_sementara;

//        dd($stock_sementara);

        return response()->json(['stock' => $stocknow]);
    }

    public function produk_kategori($id){
        $datas = DB::table('m_itemtype')->where('ity_name',$id)->first();
        $data = DB::table('m_item')
                ->join('m_itemprice','ipr_ciproduct','i_code')
                ->join('m_itemproduct','itp_ciproduct','i_code')
                ->join('m_itemtype','ity_code','itp_citype')
                ->leftJoin('m_imgproduct','ip_ciproduct','i_code')
                ->where('itp_citype',$datas->ity_code)
                ->where('m_item.status_data','true')
                ->groupBy('i_code')
                ->paginate(12);
        $data1 = DB::table('m_item')
                ->join('m_itemprice','ipr_ciproduct','i_code')
                ->join('m_itemproduct','itp_ciproduct','i_code')
                ->join('m_itemtype','ity_code','itp_citype')
                ->leftJoin('m_imgproduct','ip_ciproduct','i_code')
                ->where('itp_citype',$datas->ity_code)
                ->where('m_item.status_data','true')
                ->get();

                $kategori = DB::table('m_itemtype')->where('status_data','true')->get();
                $type = DB::table('m_itemtype')->get();
                $wish = DB::table('d_wishlist')->where('status_data','true')->get();
                $gambar = DB::table('m_item')->join('m_imgproduct','ip_ciproduct','i_code')->join('m_itemproduct','itp_ciproduct','i_code')->groupBy('i_code')->get();
                if(\Auth::check()){
                $keranjang = DB::table('d_cart')->where('cart_cmember',Auth::user()->cm_code)->where('status_data','true')->count();
                }else{
                    $keranjang = '';
                }
        return view('frontpage.produk.produk-kategori-frontpage',array(
            'test'=>$data,
            'test1'=> $data1,
            'namakategori'=>$datas,
            'kategori'=>$kategori,
            'tipe'=>$type,
            'wish'=>$wish,
            'gambar'=>$gambar,
            'keranjang'=> $keranjang,
        ));
    }
}