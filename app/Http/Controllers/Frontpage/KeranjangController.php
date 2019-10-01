<?php

namespace App\Http\Controllers\Frontpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use DataTables;

class KeranjangController extends Controller
{
    public function keranjang()
    {   
        $produk = DB::table('d_cart')
                    ->join('m_item','i_code','cart_ciproduct')
                    ->join('m_itemproduct','itp_ciproduct','i_code')
                    ->join('m_itemprice','ipr_ciproduct','i_code')
                    ->where('cart_cmember',Auth::user()->cm_code)
                    ->where('d_cart.status_data','true')
                    ->groupBy('cart_ciproduct')
                    ->get();

        $gambar = DB::table('m_item')->join('m_imgproduct','ip_ciproduct','i_code')->groupBy('i_code')->get();
        $kategori = DB::table('m_itemtype')->where('status_data','true')->get();
        if(\Auth::check()){
        $keranjang = DB::table('d_cart')->where('cart_cmember',Auth::user()->cm_code)->where('status_data','true')->count();
        }else{
            $keranjang = '';
        }
    	return view('frontpage.keranjang.keranjang-frontpage',array(
            'produk' => $produk,
            'gambar' => $gambar,
            'kategori'=>$kategori,
            'keranjang'=> $keranjang,
        ));
    }

    public function table_keranjang(){
        $data = DB::table('d_cart')
        ->leftJoin('m_item','i_code','cart_ciproduct')
        ->leftJoin('m_itemproduct','itp_ciproduct','i_code')
        ->leftJoin('m_itemprice','ipr_ciproduct','i_code')
        ->where('cart_cmember',Auth::user()->cm_code)
        ->where('d_cart.status_data','true')
        ->groupBy('cart_ciproduct')
        ->get();

        return DataTables::of($data)
        ->addColumn('aksi',function($data){
                    return'<div class="column-full-price-cart border-top-0"><input type="text" value="'.$data->ipr_sunitprice * $data->cart_qty.'" class="totalyess" hidden>
                    <h5 class="">'.$data->i_name.'</h5><span class="text-price-cart-product total_price">Rp. '.$data->ipr_sunitprice * $data->cart_qty.'</span>
                    </div>';
        })
        ->rawColumns(['aksi'])
        ->make(true);

    }
    public function detail_keranjang()
    {
        $data = DB::table('d_cart')
                    ->leftJoin('m_item','i_code','cart_ciproduct')
                    ->leftJoin('m_itemproduct','itp_ciproduct','i_code')
                    ->leftJoin('m_itemprice','ipr_ciproduct','i_code')
                    ->where('cart_cmember',Auth::user()->cm_code)
                    ->where('d_cart.status_data','true')
                    ->groupBy('cart_ciproduct')
                    ->get();

        return DataTables::of($data)
        ->addColumn('detail',function($data){
            $gambar = DB::table('m_item')
            ->join('m_imgproduct','ip_ciproduct','i_code')
            ->groupBy('i_code')
            ->where('i_code',$data->i_code)
            ->get();
            if ($gambar != '[]') {
    
                $isi_gambar = ''.env("APP_WIB").'storage/image/master/produk/'.$gambar[0]->ip_path.'';
            }else{
                $isi_gambar = ''.asset("assets/img/noimage.jpg").'';
            }


            return '<input type="hidden" class="count" value="'.$data->cart_id.'" name="id[]">
                            <div class="row column-group-cart-item-product">
                                <div class="col-lg-8 col-md-7 column-left-cart-item-product">
                                    <div class="">
                                        <img src="'.$isi_gambar.'"
                                            class="img-item-product-cart">
                                    </div>
                                    <div class="column-description-cart-product">
                                        <h5 class="title-cart-product-item">'.$data->i_name.'</h5>
                                        <input type="hidden" class="" value="'.$data->i_code.'" name="ciproduct[]">
                                        <input type="hidden" class="id_produk" value="'.$data->cart_id.'">
                                        <input type="hidden" class="cabangproduk" value="'.$data->cart_location.'" name="cabang[]">
                                        
                                        <input type="hidden" value="'.$data->cart_qty.'" name="qty[]">
                                        <input type="hidden" value="'.$data->ipr_sunitprice * $data->cart_qty.'"
                                            name="total[]">
                                        <div class="input-group d-flex">
                                            <button class="btn btn-default btn-sm btn-count-item border-right-0 kurang" type="button" ><i
                                                    class="fa fa-minus"></i></button>
                                            <input type="text" class="form-control text-center" value="'.$data->cart_qty.'" aria-describedby="sizing-addon2">
                                            <button class="btn btn-default btn-sm btn-count-item border-left-0 tambah" type="button" ><i
                                                    class="fa fa-plus" ></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-5 column-right-cart-item-product">
                                    <div class="text-price-cart-item">Rp. '.$data->ipr_sunitprice * $data->cart_qty.'</div>
                                    <input type="hidden" value="'.$data->ipr_sunitprice * $data->cart_qty.'" class="total_harga">
                                    <a data-id="'.$data->cart_id.'" data-ciproduct="'.$data->cart_ciproduct.'" data-qty="'.$data->cart_qty.'"
                                        class="remove"><button class="btn btn-default"><i
                                                class="fa fa-times"></i></button></a>
                                </div>
                            </div>';
        })
        ->rawColumns(['detail'])
        ->make(true);
    }
    public function detail_keranjang_nav(){
        $data = DB::table('d_cart')
                    ->leftJoin('m_item','i_code','cart_ciproduct')
                    ->leftJoin('m_itemproduct','itp_ciproduct','i_code')
                    ->leftJoin('m_itemprice','ipr_ciproduct','i_code')
                    ->where('cart_cmember',Auth::user()->cm_code)
                    ->where('d_cart.status_data','true')
                    ->groupBy('cart_ciproduct')
                    ->get();

        return DataTables::of($data)
        ->addColumn('detail',function($data){
            $gambar = DB::table('m_item')
            ->join('m_imgproduct','ip_ciproduct','i_code')
            ->groupBy('i_code')
            ->where('i_code',$data->i_code)
            ->select('m_imgproduct.ip_path')
            ->get();
            if ($gambar != '[]') {
    
                $isi_gambar = ''.env("APP_WIB").'storage/image/master/produk/'.$gambar[0]->ip_path.'';
            }else{
                $isi_gambar = ''.asset("assets/img/noimage.jpg").'';
            }


            return '<li>
                <div class="product-item-cart-nav">
                    <div>
                        <img src="'.$isi_gambar.'" width="50"
            height="50">
        </div>
        <div class="text-product-item-cart-group">
            <h5 class="title-product-item-cart-nav">'.$data->i_name.'</h5>
            <p class="price-product-item-cart-nav">Rp. '.$data->ipr_sunitprice.' / Pcs</p>
            <span class="text-qty-cart-nav">Qty</span><input type="text" class="input-qty-cart-nav"
                value="'.$data->cart_qty.'" readonly>
            <div class="product-item-cart-nav-action">
            <a data-id="'.$data->cart_id.'" data-ciproduct="'.$data->cart_ciproduct.'" data-qty="'.$data->cart_qty.'"
                                        class="remove"><button class="btn btn-remove-cart-nav"><i
                        class="fa fa-trash"></i></button></a>
            </div>
        </div>

</div>
</li>';
        })
        ->rawColumns(['detail'])
        ->make(true);
    }
    public function getnow_price_cart(Request $request){
        $produk = DB::table('d_cart')
                    ->join('m_item','i_code','cart_ciproduct')
                    ->join('m_itemproduct','itp_ciproduct','i_code')
                    ->join('m_itemprice','ipr_ciproduct','i_code')
                    ->where('cart_cmember',Auth::user()->cm_code)
                    ->where('d_cart.status_data','true')
                    ->groupBy('cart_ciproduct')
                    ->get();
        return view('frontpage.keranjang.keranjang-subtotal',array(
            'produk'=> $produk,
        ));
    }
    public function getnow_qty_cart(Request $request){
        $keranjang = DB::table('d_cart')->where('cart_cmember',Auth::user()->cm_code)->where('status_data','true')->count();
        return view('frontpage.keranjang.keranjang-qty',array(
            'jumlah'=> $keranjang,
        ));
    }
    public function updatecart(Request $request)
    {
        $get_data = DB::table('d_cart')
            ->where('cart_cmember',Auth::user()->cm_code)
            ->where('cart_id',$request->produk)
            ->get();
        if ($get_data[0]->cart_qty > 0) {        
            if ($request->tambah == 'T') {
                DB::table('d_cart')
                ->where('cart_cmember',Auth::user()->cm_code)
                ->where('cart_id',$request->produk)
                ->where('status_data','true')
                ->update([
                    'cart_qty' => $get_data[0]->cart_qty + 1, 
                ]);
            }else if($request->kurang == 'T'){
                DB::table('d_cart')
                ->where('cart_cmember',Auth::user()->cm_code)
                ->where('cart_id',$request->produk)
                ->where('status_data','true')
                ->update([
                    'cart_qty' => $get_data[0]->cart_qty - 1, 
                ]);
            }
        }
    }

    public function addcart(Request $request)
    {
    		$code = $request->code;
            $stock = DB::table('d_stock')->where('st_ciproduct',$code)->sum('st_qty');
    	    $cek = DB::table('d_cart')->where('cart_cmember',Auth::user()->cm_code)->where('status_data','true')->where('cart_ciproduct',$code)->count();
            $update = $stock - $request->cart_qty;
            if ($stock >= $request->cart_qty) {
                if ($cek == 0) {
                            
        	    	DB::table('d_cart')->insert([
        	    		'cart_ciproduct' => $request->code,
        	    		'cart_cmember' => Auth::user()->cm_code,
                        'cart_qty' => $request->cart_qty,
        	    		'cart_location' =>$request->cart_location,
        	    		'status_data' => 'true',
        	    	]);
                    return response()->json(array(
                        'done' => 'done',
                    ));
                }else{
                	return response()->json(array(
                		'error' => 'error',
            	));
            }
        }else{
            return response()->json(array(
                        'error' => 'stock',
                        'stock' => $stock,
                    ));
        }
    }

    public function removecart(Request $request){
        $id = $request->id;
        $code = $request->code;
        $stock = DB::table('d_stock')->where('st_ciproduct',$code)->sum('st_qty');
        $cek = DB::table('d_cart')->where('cart_cmember',Auth::user()->cm_code)->where('status_data','true')->where('cart_ciproduct',$code)->count();
        $update = $stock + $request->qty;
        if ($id != '') {
            DB::table('d_cart')
                ->where('cart_id',$id)
                ->delete();
            return response()->json();
        }
    }

    public function gocheck(Request $request){
        $id = $request->id;
        DB::table('d_cart')
        ->where('cart_cmember',Auth::user()->cm_code)
        ->delete();
        for ($i=0; $i < count($request->ciproduct) ; $i++) { 
                DB::table('d_cart')
                ->insert([
                    'cart_ciproduct'=>$request->ciproduct{$i},
                    'cart_qty'=> $request->qty{$i},
                    'cart_location'=> $request->cabang{$i},
                    'cart_cmember'=> Auth::user()->cm_code,
                    'status_data'=> 'check',
                ]);
        }
    }
}
