<?php

namespace App\Http\Controllers\Frontpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Carbon\Carbon;
use App\gambar;

class PembelianController extends Controller
{

    public function pembelian()
    {

    		$group = DB::table('d_seller')->join('m_item','i_code','sell_ciproduct')
    		->join('m_imgproduct','ip_ciproduct','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
    		->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
    		->groupBy('sell_nota');
    		

    		$allstatus = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
    		->join('m_itemprice','ipr_ciproduct','sell_ciproduct');

    		$pembayaran = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
    		->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
    		->where('sell_status','Pembayaran')->get();

    		$proses = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
    		->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
    		->where('sell_status','Sedang Proses')->get();

    		$pengiriman = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
    		->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
    		->where('sell_status','Sedang Dikirim')->get();
    		
            $gambar = DB::table('d_seller')->join('m_imgproduct','ip_ciproduct','sell_ciproduct')->groupBy('sell_nota');
    	return view('frontpage.pembelian.pembelian',array(
    		'allstatus' => $allstatus->get(),
    		'pembayaran' => $pembayaran,
    		'proses' => $proses,
    		'pengiriman' => $pengiriman,
    		'sum' => $allstatus->SUM('sell_total'),
    		'group' => $group->get(),	
    		'groupp' => $group->where('sell_status','Pembayaran')->get(),
    		'grouppro' => $group->where('sell_status','Sedang Proses')->get(),
    		'groupppeng' => $group->where('sell_status','Sedang Dikirim')->get(),
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


}
