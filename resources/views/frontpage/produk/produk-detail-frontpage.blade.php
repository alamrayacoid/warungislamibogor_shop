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
                                                    <option value="Surabaya">Surabaya</option>
                                                    <option value="Malang">Malang</option>
                                                </select>
                                                <select class="form-control" id="label" name="">
                                                    <option value="" selected>~ pilih Merk ~</option>
                                                    <option value="AL">AL</option>
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
                                            <button class="btn btn-primary btn-sm" id="addcart" data-product="{{$code}}"><i class="fa fa-cart-plus"></i> Add to cart</button>
                                            <button class="btn btn-white btn-sm"><i class="fa fa-star"></i> Add to wishlist </button>
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
                    console.log(get['error']);  
                    if (get['error'] != '') {
                            iziToast.error({
                                        title: 'Gagal!',
                                        message: 'Barang Sudah Di Keranjang',
                                    });
                        }
                },
                error:function(xhr,textStatus,errorThrow){
                                iziToast.error({
                                title: 'Gagal!',
                                message: 'Barang Sudah dikeranjang',
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