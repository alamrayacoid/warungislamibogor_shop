@extends('frontpage.main-frontpage')

@section('extra_style')

@endsection

@section('content')

<section style="margin-top:5em;">
    @foreach($data as $row)
    <ol class="breadcrumb breadcumb-header">
        <li><a href="#">Home</a></li>
        <li><a href="#">Produk</a></li>
        <li class="active">{{$row->i_name}}</li>
        @endforeach
    </ol>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="ibox product-detail">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="product-images product-imitations" style="outline:none;border:0;">
                                    @foreach($gambar as $roww)
                                    @if($roww->ip_ciproduct)
                                    <div>
                                        <a href="/warungislamibogor/storage/image/master/produk/{{$roww->ip_path}}" sty
                                            data-gallery="">

                                            <img
                                                src="/warungislamibogor/storage/image/master/produk/{{$roww->ip_path}}">
                                        </a>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>


                            </div>
                            @foreach($data as $row)
                            <div class="col-md-7">
                                <div class="col-lg-12">
                                <h2 class="title-detail-product">{{$row->i_name}}
                                    <span class="text-info-title-detail-product" id="stocknya">Tersisa 13</span></h2>
                                <div class="">
                                    <i class="fa fa-star f-14 c-gold"></i>
                                    <i class="fa fa-star c-gold"></i>
                                    <i class="fa fa-star c-gold"></i>
                                    <i class="fa fa-star c-gold"></i>
                                    <i class="fa fa-star c-grey"></i>
                                </div>
                                <hr>
                                </div>
                                <div class="col-lg-12">
                                <p class=""><i class="fa fa-archive"></i>  Offiicial Store</p>
                                <p class=""><i class="fa fa-clock-o"></i>  05 Januari 2019</p>
                                <p class=""><i class="fa fa-map-marker"></i>  Pasuruan</p>

                                <!-- <span>{{$row->itp_tagtitle}}</span> -->
                                <div class="m-t-md">
                                    <h2 class="product-detail-price">Rp. {{$row->ipr_sunitprice}} <small
                                            class="text-info-price">Tidak Termasuk Pajak pengiriman</small> </h2>
                                </div>
                                </div>
                                
                                    <div class="col-md-4 p-detail-product-first">
                                        <select id="cabang" name="" class="form-control fs-12 c-pointer">
                                            <option value="" selected>~ pilih cabang ~</option>
                                            @foreach($cabang as $cbng)
                                            <option value="{{$cbng->b_code}}">{{$cbng->b_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control fs-12 c-pointer" id="label" name="">
                                            <option value="" selected>~ pilih Merk ~</option>
                                            @foreach($label as $rows)
                                            <option value="{{$rows->s_code}}">{{$rows->s_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 p-detail-product-last">
                                        <select class="form-control fs-12 c-pointer" id="satuan" name="">
                                            <option value="" selected>~ pilih Satuan ~</option>
                                            @foreach($satuan as $rows)
                                                @foreach($rows as $rowss)
                                                    <option value="{{$rowss->iu_code}}">{{$rowss->iu_name}}</option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12 mt-2 d-flex">
                                        <button class="btn btn-count-product-stock border-right-0"><i class="fa fa-minus"></i></button>
                                        <input type="number" id="qty" value="1" min="1"
                                            class="form-control border-radius-0 text-center" name=""
                                            class="form-control">
                                        <button class="btn btn-count-product-stock border-left-0"><i class="fa fa-plus"></i></button>
                                    </div>
                                    <div class="col-md-12 column-add-cart mt-2 w-100">
                                        <div class="row">
                                            @if(Auth::check())
                                            <div class="col-md-12">
                                                <button class="btn btn-product-detail-cart" id="addcart"
                                                    data-product="{{$code}}"><i
                                                        class="fa fa-cart-plus"></i>&ensp;Tambahkan ke
                                                    keranjang</button>
                                            </div>
                                            <div class="col-md-6 p-detail-product-first">
                                                <button class="btn btn-product-detail-wishlist"><i
                                                        class="fa fa-star"></i>&ensp;Add to wishlist
                                                </button>
                                            </div>
                                            <div class="col-md-6 p-detail-product-last">
                                                <a href="{{url('/')}}" style="color:#676a6c;"><button class="btn btn-product-detail-wishlist">Lihat Produk Lainnya
                                                </button></a>
                                            </div>
                                            @else
                                            <div class="col-md-12 ">
                                                <button class="btn btn-product-detail-cart"
                                                    onclick="window.location.href='http://localhost/warungislamibogor_shop/signin'"><i
                                                        class="fa fa-cart-plus"></i> Tambahkan ke keranjang</button>
                                            </div>
                                            <div class="col-md-6 p-detail-product-first">
                                                <button class="btn btn-product-detail-wishlist"
                                                    onclick="window.location.href='http://localhost/warungislamibogor_shop/signin'"><i
                                                        class="fa fa-star"></i> Add to wishlist </button>
                                            </div>
                                            <div class="col-md-6 p-detail-product-last">
                                                <button class="btn btn-product-detail-wishlist">Lihat Produk Lainnya
                                                </button>
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <!-- <hr>
                        <dl class="small m-t-md">
                            <dt>Tag Keyword</dt>
                            <dd>{{$row->itp_tagkeyword}}</dd>
                            <dt>Category</dt>
                            <dd>{{$row->ity_name}}</dd>
                        </dl>
                        <hr> -->


                            </div>
                            @endforeach
                        </div>

                    </div>
                    <!-- <div class="ibox-footer">
                <span class="pull-right">
                    Full stock - <i class="fa fa-clock-o"></i> 14.04.2016 10:04 pm
                </span>
                The generated Lorem Ipsum is therefore always free
            </div> -->
                </div>
    </div>
<div class="row">
            <div class="col-lg-12">
                <div class="ibox product-description">
                    <div class="ibox-title" style="background:#fafafa;">
                        Detail Keterangan Barang
                    </div>
                    <div class="ibox-content">
                        <div class="small text-muted" style="line-height:2;">
                            {!! html_entity_decode($row->itp_description) !!}
                        </div>
                    </div>
                </div>
            </div>
</div>
        <div class="row">
            <h3 class="title-product-opsi-same">Pembeli Yang Melihat Barang Ini, Juga Tertarik Dengan</h3>
            <div class="col-lg-product col-md-3 col-sm-6 ">
                <div class="thumbnail product-box-item">
                    <div class="image-product-box"
                        style="background:url('{{asset('assets/img/img-product/product-4.png')}}')">
                    </div>
                    <div class="caption">
                        <div class="title-product-group">
                            <a href="javascript:void(0)" class="title-product-item">Botol Aqua Gelas 250 mil</a>
                        </div>
                        <div class="footer-product-item">
                            <div class="">
                                <i class="fa fa-star f-14 c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-grey"></i>
                            </div>
                            <div class="price-product-item">Rp. 10.000</div>
                        </div>
                    </div>

                </div>
            </div>
            <div class=" col-lg-product col-md-3 col-sm-6">
                <div class="thumbnail product-box-item">
                    <div class="image-product-box"
                        style="background:url('{{asset('assets/img/img-product/product-3.jpg')}}')">
                    </div>
                    <div class="caption">
                        <div class="title-product-group">
                            <a href="javascript:void(0)" class="title-product-item">Botol Aqua Gelas 250 mil</a>
                        </div>
                        <div class="footer-product-item">
                            <div class="">
                                <i class="fa fa-star f-14 c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-grey"></i>
                            </div>
                            <div class="price-product-item">Rp. 10.000</div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-product col-md-3 col-sm-6 ">
                <div class="thumbnail product-box-item">
                    <div class="image-product-box"
                        style="background:url('{{asset('assets/img/img-product/product-4.png')}}')">
                    </div>
                    <div class="caption">
                        <div class="title-product-group">
                            <a href="javascript:void(0)" class="title-product-item">Botol Aqua Gelas 250 ML</a>
                        </div>
                        <div class="footer-product-item">
                            <div class="">
                                <i class="fa fa-star f-14 c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-grey"></i>
                            </div>
                            <div class="price-product-item">Rp. 10.000</div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-product col-md-3 col-sm-6 ">
                <div class="thumbnail product-box-item">
                    <div class="image-product-box"
                        style="background:url('{{asset('assets/img/img-product/product-3.jpg')}}')">
                    </div>
                    <div class="caption">
                        <div class="title-product-group">
                            <a href="javascript:void(0)" class="title-product-item">Botol Aqua Gelas 250 mil</a>
                        </div>
                        <div class="footer-product-item">
                            <div class="">
                                <i class="fa fa-star f-14 c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-grey"></i>
                            </div>
                            <div class="price-product-item">Rp. 10.000</div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-product col-md-3 col-sm-6 ">
                <div class="thumbnail product-box-item">
                    <div class="image-product-box"
                        style="background:url('{{asset('assets/img/img-product/product-4.png')}}')">
                    </div>
                    <div class="caption">
                        <div class="title-product-group">
                            <a href="javascript:void(0)" class="title-product-item">Botol Aqua Gelas 250 ML</a>
                        </div>
                        <div class="footer-product-item">
                            <div class="">
                                <i class="fa fa-star f-14 c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-grey"></i>
                            </div>
                            <div class="price-product-item">Rp. 10.000</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</section>


@endsection

@section('extra_script')
<script>
    $(document).ready(function () {
        $('#cabang').on('change',function(){
            setInterval(function(){
                ajax_helper('{{route("stock_check")}}','POST',{'_token' : '{{csrf_token()}}' , 'cabang' : $('#cabang').val() , 'produk' : '{{$code}}' , 'suplier' : $('#label').val()});
            },1000);
        })

        function ajax_helper(url,type,data,success,error,modal)
        {
            $.ajax({
                url : url,
                type : type,
                data : data,
                success : function(get){
                    if (get['stock'] >= 21) {
                        $('#stocknya').text('stock '+ get['stock']);

                    }else{
                        $('#stocknya').text('Tersisa '+ get['stock']);
                    }
                    // swal("Informasi!", success, "success");
                    modal;
                    success;
                    // table.ajax.reload();
                    // $(':input').val('');
                },
                error:function(xhr,textStatus,errorThrowl){
                            // swal("Gagal!", error, "error");
                            // $(':input').val('');
                        } 

            })
        }

        $('#ncart').html($('.ncart').length);


        $('#addcart').on('click', function () {
            var cproduct = $(this).data('product');
            var label = $('#label').val();
            var qty = $('#qty').val();
            var cabang = $('#cabang').val();
            $.ajax({
                url: '{{route("addcart")}}',
                method: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'code': cproduct,
                    'user': 'user',
                    'cart_label': label,
                    'cart_qty': qty,
                    'satuan': $('#satuan').val(),
                    'cart_location': cabang,
                },
                success: function (get) {
                    console.log(get);
                    console.log(get['error']);
                    if (get['error'] == 'error') {
                        iziToast.error({
                            title: 'Gagal!',
                            message: 'Cabang dan Merk kosong / Barang Sudah Di Keranjang',
                        });
                    } else if (get['done'] == 'done') {
                        iziToast.success({
                            title: 'Berhasil!',
                            message: 'Memasukkan Barang ke Keranjang',
                        });
                        setTimeout(function () {
                            window.location.href = "{{route('home')}}";
                        }, 1000);
                    } else if (get['error'] == 'stock') {
                        iziToast.error({
                            title: 'Gagal!',
                            message: 'Stock Gudang Tinggal ' + get['stock'],
                        });
                        iziToast.warning({
                            title: 'Peringatan!',
                            message: 'Cek Merk Yang Dimasukkan',
                        });
                    }
                },
                error: function (xhr, textStatus, errorThrow) {
                    iziToast.error({
                        title: 'Gagal!',
                        message: 'Masukkan Cabang dan Merk Barang',
                    });
                }
            })
        })

        $('.product-images').slick({
            autoplay: true,
            autoplaySpeed: 5000,
            dots: false,
            infinite: true,
        });

    });
</script>
@endsection