@extends('frontpage.main-frontpage')

@section('extra_style')
<style type="text/css">


</style>
@endsection

@section('content')

    
            <div class="row">
                <div class="col-lg-12">

                    <div class="ibox product-detail">
                        <div class="ibox-content">

                            <div class="row">
                                <div class="col-md-5">


                                    <div class="product-images product-imitations" >
                                        
                                        @foreach($gambar as $roww)
                                            @if($roww->ip_ciproduct)
                                                <div>
                                                    <a href="/warungislamibogor/storage/image/master/produk/{{$roww->ip_path}}" sty data-gallery="">
                                                        
                                                        <img src="/warungislamibogor/storage/image/master/produk/{{$roww->ip_path}}">
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>

                                </div>
                                @foreach($data as $row)
                                <div class="col-md-7">

                                    <h2 class="font-bold m-b-xs">
                                        {{$row->i_name}}
                                    </h2>
                                    <small>{{$row->itp_tagtitle}}</small>
                                    <div class="m-t-md">
                                        <h2 class="product-main-price">Rp. {{$row->ipr_sunitprice}} <small class="text-muted">Termasuk Pajak</small> </h2>
                                    </div>

                                        <div class="product-qty">
                                            <label>Qty</label>
                                            <div class="group-product-qty">
                                                <input type="number" id="qty" value="1" min="1" class="form-control" name="">
                                            </div>
                                            <select class="form-control" id="cabang" name="">
                                                    <option value="" selected>~ pilih cabang ~</option>
                                                    @foreach($cabang as $cbng)
                                                    <option value="{{$cbng->b_code}}">{{$cbng->c_name}}</option>
                                                    @endforeach
                                                </select>
                                                <select class="form-control" id="label" name="">
                                                    <option value="" selected>~ pilih Merk ~</option>
                                                    @foreach($label as $rows)
                                                    <option value="{{$rows->s_code}}">{{$rows->s_name}}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                    <hr>

                                    <div class="small text-muted">
                                        {!! html_entity_decode($row->itp_description) !!}
                                    </div>
                                    <dl class="small m-t-md">
                                        <dt>Tag Keyword</dt>
                                        <dd>{{$row->itp_tagkeyword}}</dd>
                                        <dt>Category</dt>
                                        <dd>{{$row->ity_name}}</dd>
                                    </dl>
                                    <hr>

                                    <div>
                                        <div class="btn-group">
                                            @if(Auth::check())
                                            <button class="btn btn-primary btn-sm" id="addcart" data-product="{{$code}}"><i class="fa fa-cart-plus"></i> Add to cart</button>
                                            <button class="btn btn-white btn-sm"><i class="fa fa-star"></i> Add to wishlist </button>
                                            @else
                                            <button class="btn btn-primary btn-sm" onclick="window.location.href='http://localhost/warungislamibogor_shop/signin'"><i class="fa fa-cart-plus"></i> Add to cart</button>
                                            <button class="btn btn-white btn-sm" onclick="window.location.href='http://localhost/warungislamibogor_shop/signin'"><i class="fa fa-star"></i> Add to wishlist </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                        <div class="ibox-footer">
                            <span class="pull-right">
                                Full stock - <i class="fa fa-clock-o"></i> 14.04.2016 10:04 pm
                            </span>
                            The generated Lorem Ipsum is therefore always free
                        </div>
                    </div>

                </div>
            </div>

@endsection

@section('extra_script')
<script>
    $(document).ready(function(){
        $('#ncart').html($('.ncart').length);


        $('#addcart').on('click',function(){
            var cproduct = $(this).data('product');
            var label = $('#label').val();
            var qty = $('#qty').val();
            var cabang = $('#cabang').val();
            $.ajax({
                url : '{{route("addcart")}}',
                method : 'POST',
                data : {
                    '_token' : '{{csrf_token()}}',
                    'code' : cproduct,
                    'user' : 'user',
                    'cart_label' : label,
                    'cart_qty' : qty,
                    'cart_location' : cabang,
                },
                success : function(get){
                    console.log(get);
                    console.log(get['error']);  
                    if (get['error'] == 'error') {
                            iziToast.error({
                                        title: 'Gagal!',
                                        message: 'Cabang dan Merk kosong / Barang Sudah Di Keranjang',
                                    });
                        }else if(get['done'] == 'done'){
                            iziToast.success({
                                        title: 'Berhasil!',
                                        message: 'Memasukkan Barang ke Keranjang',
                                    });
                            setTimeout(function(){
                                 window.location.href="{{route('home')}}";
                             },1000);
                        }else if(get['error'] == 'stock'){
                            iziToast.error({
                                        title: 'Gagal!',
                                        message: 'Stock Gudang Tinggal '+get['stock'],
                                    });
                        }
                },
                error:function(xhr,textStatus,errorThrow){
                                iziToast.error({
                                title: 'Gagal!',
                                message: 'Masukkan Cabang dan Merk Barang',
                            });
                        }
            })
        })

        $('.product-images').slick({
            autoplay:true,
            autoplaySpeed:5000,
            dots: true,
            centerMode: true,
            infinite: true,
        });

    });

</script>
@endsection