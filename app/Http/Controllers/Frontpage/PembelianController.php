<?php

namespace App\Http\Controllers\Frontpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Carbon\Carbon;

class PembelianController extends Controller
{

    public function pembelian()
    {
    	if (Auth::check()) {
    		$allstatus = DB::table('d_seller')->where('sell_ccustomer',Auth::user()->cm_code)->get();
    		$sum = DB::table('d_seller')->where('sell_ccustomer',Auth::user()->cm_code)
    		->select(DB::raw('SUM(sell_total) as total_price'))
    		->where('d_seller.status_data','true')
    		->groupBy('sell_ccustomer')
    		->get();
    		$pembayaran = DB::table('d_seller')
    		->join('m_item','i_code','sell_ciproduct')
    		->join('m_imgproduct','ip_ciproduct','sell_ciproduct')
    		->join('m_itemproduct','itp_ciproduct','sell_ciproduct')
    		->join('m_itemprice','ipr_ciproduct','sell_ciproduct')
    		->where('sell_ccustomer',Auth::user()->cm_code)->where('sell_status','Pembayaran')->get();
    		$proses = DB::table('d_seller')->where('sell_ccustomer',Auth::user()->cm_code)->where('sell_status','Sedang Proses')->get();
    		$pengiriman = DB::table('d_seller')->where('sell_ccustomer',Auth::user()->cm_code)->where('sell_status','Sedang Dikirim')->get();
    	}

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


}
