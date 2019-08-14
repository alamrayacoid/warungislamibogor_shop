<?php

namespace App\Http\Controllers\Frontpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ProdukController extends Controller
{
    public function produk(Request $request)
    {
        $type = DB::table('m_itemtype')->get();
        $kategory = $request->ctr;
            if ($kategory != null) {
            $data = DB::table('m_item')
                ->join('m_itemprice','ipr_ciproduct','i_code')
                ->join('m_itemproduct','itp_ciproduct','i_code')
                ->join('m_itemtype','ity_code','itp_citype')
                ->groupBy('i_name')
                ->where('m_item.status_data','true')
                ->get();

            

            $gambar = DB::table('m_item')->join('m_imgproduct','ip_ciproduct','i_code')->join('m_itemproduct','itp_ciproduct','i_code')->groupBy('i_code')->where('itp_citype',$kategory)->get();

            if ($request->search != null) {
                $data->where('i_name',$request->search)->get();
            }

            if ($request->nama_produk != null) {
                $data->where('i_name',$request->nama_produk)->get();
            }

            if ($request->harga_min != null && $request->harga_max != null) {
                $data->whereBetween('ipr_sunitprice',[$request->harga_min,$request->harga_max])->get();
            }

            if ($request->jenis != null) {
                $data->where('itp_citype',$request->jenis)->get();
            }
        }else{
            $data = DB::table('m_item')
                ->join('m_itemprice','ipr_ciproduct','i_code')
                ->join('m_itemproduct','itp_ciproduct','i_code')
                ->join('m_itemtype','ity_code','itp_citype')
                ->groupBy('i_name');
                

            $gambar = DB::table('m_item')->join('m_imgproduct','ip_ciproduct','i_code')->join('m_itemproduct','itp_ciproduct','i_code')->groupBy('i_code')->get();

        }

            

            $wish = DB::table('d_wishlist')->where('status_data','true')->get();

            if ($request->search != null) {
                $data->where('i_name',$request->search)->get();
            }

            if ($request->nama_produk != null) {
                $data->where('i_name',$request->nama_produk)->get();
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
            ));
    }

    public function produk_detail(Request $request)
    {
    	$code = $request->code;
        $cabang = DB::table('d_stock')
        ->leftJoin('m_whouse','w_code','st_cwhouse')
            ->join('m_branch','b_code','w_cbranch')
            ->groupBy('w_cbranch')
            ->get();

        $label = DB::table('d_stock')
            ->join('m_supplier','s_code','st_csupplier')
            ->where('st_ciproduct',$code)
            ->groupBy('st_csupplier')
            ->get();

        $gambar = DB::table('m_item')->join('m_imgproduct','ip_ciproduct','i_code')->where('i_code',$code)->get();
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
            $kategori = DB::table('m_itemtype')->where('status_data','true')->get();
    	return view('frontpage.produk.produk-detail-frontpage',array(
    		'data' => $data,
            'gambar' => $gambar,
            'code' => $code,
            'label' => $label,
            'cabang' => $cabang,
            'kategori' => $kategori,
            'satuan' => $satuan

    	));
    }
    public function caribarang(Request $request){
        $term = $request->get('term');
        $results = array();
        $queries = DB::table('m_item')
            ->where('i_name', 'LIKE', '%'.$term.'%')
            ->take(10)->get();
        
        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->i_id, 'value' => $query->i_name];
        }
    return response()->json($results);
    }
    public function produk_kategori($id){
        $datas = DB::table('m_itemtype')->where('ity_name',$id)->first();
        $data = DB::table('m_item')
                ->join('m_itemprice','ipr_ciproduct','i_code')
                ->join('m_itemproduct','itp_ciproduct','i_code')
                ->join('m_itemtype','ity_code','itp_citype')
                ->where('itp_citype',$datas->ity_code)
                ->get();

                $kategori = DB::table('m_itemtype')->where('status_data','true')->get();
                $type = DB::table('m_itemtype')->get();
                $wish = DB::table('d_wishlist')->where('status_data','true')->get();
                $gambar = DB::table('m_item')->join('m_imgproduct','ip_ciproduct','i_code')->join('m_itemproduct','itp_ciproduct','i_code')->groupBy('i_code')->get();
        return view('frontpage.produk.produk-kategori-frontpage',array(
            'test'=>$data,
            'namakategori'=>$datas,
            'kategori'=>$kategori,
            'tipe'=>$type,
            'wish'=>$wish,
            'gambar'=>$gambar,
        ));
    }
}