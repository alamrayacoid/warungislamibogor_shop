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
        
            $group = DB::table('d_seller')->join('m_item','i_code','sell_ciproduct')
    		->leftJoin('m_itemproduct','itp_ciproduct','sell_ciproduct')
    		->leftJoin('m_itemprice','ipr_ciproduct','sell_ciproduct')
    		->groupBy('sell_nota');
    		

    		$allstatus = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
    		->join('m_itemprice','ipr_ciproduct','sell_ciproduct');
    		
            if ($request->nama_produk != null) {
                $group->where('i_name',$request->nama_produk);
                $allstatus>where('i_name',$request->nama_produk);
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


    	return view('frontpage.pembelian.pembelian',array(
    		'allstatus' => $allstatus->get(),
    		'pembayaran' => $allstatus->where('sell_status','Pembayaran')->groupBy('sell_nota')->get(),
    		'proses' => $allstatus->where('sell_status','Sedang Proses')->get(),
    		'pengiriman' => $allstatus->where('sell_status','Sedang Dikirim')->get(),
    		'group' => $group->select('d_seller.*','m_itemprice.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))->get(),	
    		'groupp' => $group->where('sell_status','Pembayaran')->select('d_seller.*','m_itemproduct.*','m_itemprice.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))->get(),
    		'grouppro' => $group->where('sell_status','Sedang Proses')->select('d_seller.*','m_itemproduct.*','m_itemprice.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))->get(),
    		'groupppeng' => $group->where('sell_status','Sedang Dikirim')->select('d_seller.*','m_itemproduct.*','m_itemprice.*',DB::raw('SUM(sell_total) as totalbayar'),DB::raw('SUM(sell_quantity) as totalbeli'))->get(),
            'gambar' => $gambar->get(),
    	));
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
                ->join('m_imgproduct','ip_ciproduct','sell_ciproduct')
                ->join('m_item','i_code','sell_ciproduct')
                ->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
                ->where('sell_nota',$request->nota)
                ->groupBy('sell_ciproduct')
                ->get();

        return Datatables::of($data)
        ->addColumn('daftar',function($data){
            return '
                        <td>
                            <img src="/warungislamibogor/storage/image/master/produk/'.$data->ip_path.'" width="250">
                                </td>
                                    <td>
                                        <h3>
                                            <a href="#" class="text-navy">
                                                '.$data->i_name.'
                                            </a>
                                        </h3>
                                        <div class="m-t-sm">
                                            <span class="text-warning">Rp. '.$data->ipr_sunitprice.'</span>
                                            |
                                            <span class="text-muted">'.$data->sell_quantity.' Produk</span>
                                        </div>
                                    </td>
                        
            ';
        })
        ->addColumn('harga',function($data){
            return '
                    <label class="d-block">Total Harga Produk</label>
                    <span class="text-info">Rp. '.$data->ipr_sunitprice.'</span>
            ';
        })
        ->rawColumns(['daftar','harga'])
        ->make(true);
    }


}
