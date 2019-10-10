@extends('frontpage.main-frontpage')

<style type="text/css">
    .select2 .select2-selection--single {
        height: 35px !important;
        display: flex;
        align-items: center;
    }

    .select2-selection__arrow {
        height: 35px !important;
        top: 0 !important;
    }

    .d-inline-block {
        display: inline-block;
    }

    .footer-copy--wrapper {
        margin-bottom: 7.2em;
    }

    .footer-new-wrapper {
        margin-top: 4em;
    }

    @media(max-width:992px) {
        .sticky-footer-product {
            display: none !important;
        }

        .footer-copy--wrapper {
            margin-bottom: 7.2em;
        }

        .footer-new-wrapper {
            margin-top: 4em;
        }

        /*@media (max-width: 992px) {*/
        /*    .sticky-footer-product {*/
        /*        display: none !important;*/
        /*    }*/

        /*    .footer-copy--wrapper {*/
        /*        margin-bottom: 0 !important;*/
        /*    }*/
        }

        .icon-onwishlist {
            color: #ed5565 !important;
        }
</style>
@section('extra_style')
@endsection

@section('content')

<section style="margin-top:4.5em;">
    @foreach($data as $row)
    <ol class="breadcrumb breadcumb-header">
        <li><a href="#">Home</a></li>
        <li>Produk</li>
        <li class="active">{{$row->i_name}}</li>
        @endforeach
    </ol>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="ibox product-detail" style="border:1px solid #efeff4;padding: 2em 15px;">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="product-images product-imitations" style="outline:none;border:0;">
                                    @foreach($gambar as $roww)
                                    @if($roww->ip_ciproduct)
                                    <div>
                                        <a href="{{env('APP_WIB')}}storage/image/master/produk/{{$roww->ip_path}}" sty
                                            data-gallery="">
                                            <img src="{{env('APP_WIB')}}storage/image/master/produk/{{$roww->ip_path}}">
                                        </a>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            @foreach($data as $row)
                            <input type="hidden" value="{{$row->i_code}}" id="codedetailproduk" name="">
                            <div class="col-md-7">a
                                <div class="col-lg-12">
                                    <h2 class="title-detail-product">{{$row->i_name}}
                                        @if($stokies == 'Tidak Ada Cabang Terdekat')
                                            <span class="text-info-title-detail-product">Ubah Alamat Di Pengaturan untuk Membeli</span>
                                        @else
                                            <span class="text-info-title-detail-product" id="stocknya"></span>
                                        @endif
                                    </h2>
                                    <hr>
                                </div>
                                <div class="col-lg-12">
                                    <p class=""><i class="fa fa-archive"></i>  Warung Islami Bogor</p>
                                    <p class=""><i class="fa fa-clock-o"></i>  05 Januari 2019</p>
                                    <p class=""><i class="fa fa-map-marker"></i>  Bogor</p>
                                    <div class="m-t-md">
                                        @if($row->gpp_sellprice == null)
                                        <h2 class="product-detail-price">Rp. {{$row->ipr_sunitprice}} <small
                                                class="text-info-price">Tidak Termasuk Pajak pengiriman</small>
                                        </h2>
                                        @else
                                        <span class="product-detail-percent">Rp. {{$row->ipr_sunitprice}}</span>
                                        <h2 class="product-detail-price">Rp. {{$row->gpp_sellprice}} <small
                                                class="text-info-price">Tidak Termasuk Pajak pengiriman</small>
                                        </h2>
                                        @endif
                                    </div>
                                </div>

                                
                                <div class="col-md-12 column-input-detail-product">
                                    <div class="d-flex">
                                        <button class="btn btn-count-product-stock border-right-0" onclick="minus()"><i
                                                class="fa fa-minus"></i></button>
                                        <input type="number" id="qty" value="1" min="1"
                                            class="form-control border-radius-0 text-center jumlahbelibarang" name="">
                                        <button class="btn btn-count-product-stock border-left-0" onclick="plus()"><i
                                                class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="col-md-12 column-add-cart mt-2 w-100">
                                    <div class="row">
                                        @if(Auth::check())
                                        <div class="col-md-12">
                                            <button class="btn btn-product-detail-cart addcart"
                                                data-product="{{$code}}"><i class="fa fa-cart-plus"></i>&ensp;Tambahkan
                                                ke
                                                keranjang</button>
                                        </div>
                                        <div class="col-md-6 p-detail-product-first">
                                            @if($wish > 0)
                                            <button class="btn btn-product-detail-wishlist addwishlist" style="color:#676a6c;"
                                                data-ciproduct="{{$row->i_code}}" id="{{$row->i_code}}"
                                                type="button"><i class="fa fa-heart  icon-onwishlist"></i>&ensp;Add to
                                                wishlist
                                            </button>
                                            @else
                                            <button class="btn btn-product-detail-wishlist addwishlist" style="color:#676a6c;"
                                                data-ciproduct=" {{$row->i_code}}" id="{{$row->i_code}}"
                                                type="button"><i class="fa fa-heart"></i>&ensp;Add to wishlist
                                            </button>
                                            @endif
                                        </div>
                                        <div class="col-md-6 p-detail-product-last">
                                            <a href="{{url('/')}}" style="color:#676a6c;"><button
                                                    class="btn btn-product-detail-wishlist">Lihat Produk Lainnya
                                                </button></a>
                                        </div>
                                        @else
                                        <div class="col-md-12 ">
                                            <a href="{{url('/signin')}}"><button class="btn btn-product-detail-cart"><i
                                                        class="fa fa-cart-plus"></i> Tambahkan ke
                                                    keranjang</button>
                                            </a>
                                        </div>
                                        <div class="col-md-6 p-detail-product-first">
                                            <a href="{{route('login-frontpage')}}" style="color:#676a6c;"><button
                                                    class="btn btn-product-detail-wishlist"><i class="fa fa-star"></i>
                                                    Add to wishlist </button></a>
                                        </div>
                                        <div class="col-md-6 p-detail-product-last">
                                            <a href="{{url('/')}}" style="color:#676a6c;"><button
                                                    class="btn btn-product-detail-wishlist">Lihat Produk Lainnya
                                                </button></a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5" style="margin-top:2em">
            <div class="col-lg-12">
                <div class="ibox product-description">
                    <div class="ibox-title border-top-none" style="background:#fafafa;">
                        Detail Keterangan Barang
                    </div>
                    <div class="ibox-content">
                        <div class="" style="line-height:2;">
                            {!! html_entity_decode($row->itp_description) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            @if($produksejenis == '[]')
            @else
            <h3 class="title-product-opsi-same">Pembeli Yang Melihat Barang Ini, Juga Tertarik Dengan</h3>
            @foreach($produksejenis as $rows)
            <div class="col-lg-product col-md-3 col-sm-6 ">
                <div class="thumbnail product-box-item">
                    @foreach($gambarsejenis as $roww)
                    @if($rows->i_code == $roww->ip_ciproduct)
                    <div class="image-product-box"
                        style="background:url('{{env('APP_WIB')}}storage/image/master/produk/{{$roww->ip_path}}')">
                    </div>
                    @endif
                    @endforeach
                    @if($rows->ip_path == null)
                    <div class="image-product-box" style="background:url('{{asset('assets/img/noimage.jpg')}}')"
                        alt="Sorry! Image not available at this time">
                    </div>
                    @endif
                    <div class="caption">
                        <div class="title-product-group">
                            <a href="{{url('product', $rows->i_link)}}" class="title-product-item">{{$rows->i_name}}</a>
                        </div>
                        <div class="footer-product-item">
                            <div class="price-product-item">Rp. {{$rows->ipr_sunitprice}}</div>
                            <div class="">
                                <i class="fa fa-tag" style="color: #009a51;"></i>&ensp;<span style="color: #595959;">
                                    {{$rows->ity_name}}</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
<div class="sticky-footer-product d-none" id="js-sticky-product">
    <div class="container-fluid">
        @foreach($data as $row)
        <div class="row">
            <div class="col-lg-6 col-md-4">
                <img src="{{asset('assets/img/img-product/product-4.png')}}" width="50px" height="50px">
                <div class="d-inline-block detail-product-sticky">
                    <a href="" class="title-sticky-product">{{$row->i_name}} </a>

                    <p class="desc-sticky-product">Warung Islami Bogor</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-8 text-right">
                <div class="full-price-sticy-product-group d-inline-block">
                    <div class="text-total-price-sticky-product">Harga</div>
                    <span class="price-sticky-product">Rp. {{$row->ipr_sunitprice}}</span>

                </div>
                @if(Auth::check())
                @if($wish > 0)
                <button class="btn btn-wishlist-sticky-product addwishlist" data-ciproduct="{{$row->i_code}}"
                    id="{{$row->i_code}}" type="button"><i class="fa fa-heart icon-onwishlist"></i>
                </button>
                @else
                <button class="btn btn-wishlist-sticky-product addwishlist" data-ciproduct="{{$row->i_code}}"
                    id="{{$row->i_code}}" type="button"><i class="fa fa-heart"></i></button>
                @endif
                @else
                <a href="{{route('login-frontpage')}}" style="color:#676a6c;">
                    <button class="btn btn-wishlist-sticky-product" type="button"><i class="fa fa-heart"></i></button>
                </a>
                @endif
                <a href="{{url('/')}}">
                    <button class="btn btn-more-sticky-product">Produk Lainnya</button>
                </a>
                <button class="btn btn-addcart-sticky-product addcart" data-product="{{$code}}">Tambah Ke
                    Keranjang
                </button>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>

@endsection

@section('extra_script')
<script>
    $(document).ready(function () {
        $('#stocknya').removeClass('selected');

        ajax_helper('{{route("stock_check")}}', 'POST', {
            '_token': '{{csrf_token()}}',
            'cabang': '{{$stokies}}',
            'produk': '{{$code}}'
        });


        function ajax_helper(url, type, data, success, error, modal) {
            $.ajax({
                url: url,
                type: type,
                data: data,
                success: function (get) {
                    if (get['stock'] >= 21) {
                        $('#stocknya').text('stock ' + get['stock']);

                    } else {
                        $('#stocknya').text('Tersisa ' + get['stock']);
                    }
                    $('#stocknya').addClass('selected');
                    // swal("Informasi!", success, "success");
                    modal;
                    success;
                    // table.ajax.reload();
                    // $(':input').val('');
                },
                error: function (xhr, textStatus, errorThrowl) {
                    // swal("Gagal!", error, "error");
                    // $(':input').val('');
                }

            })
        }

        $('#ncart').html($('.ncart').length);
        $('.addcart').on('click', function () {

            $('.content-dropdown-cart').append(
                '<div class="loader-cart-nav-wib-group"><div class="loader-cart-nav--element"></div></div>'
            );
            $('#cart-navbar').hide();
            var tablecart = $('.cart-refresh');
            var cproduct = $(this).data('product');
            var qty = $('#qty').val();
            var cabang = '{{$stokies}}';
            $.ajax({
                url: '{{route("addcart")}}',
                method: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'code': cproduct,
                    'user': 'user',
                    'cart_qty': qty,
                    'satuan': $('#satuan').val(),
                    'cart_location': cabang,
                },
                success: function (get) {
                    console.log(get['error']);
                    if (get['error'] == 'error') {
                        iziToast.error({
                            title: 'Gagal!',
                            message: 'Barang Sudah Di Keranjang',
                        });
                        $('.loader-cart-nav-wib-group').fadeOut();
                        $('.nav-link-shopping-cart').addClass('open');
                        setTimeout(function () {
                            $('#cart-navbar').fadeIn();
                        }, 300);
                    } else if (get['done'] == 'done') {
                        iziToast.success({
                            title: 'Berhasil!',
                            message: 'Memasukkan Barang ke Keranjang',
                        });
                        $('.cart-refresh').removeClass('d-none');
                        $('.rounded-cart-nav').removeClass('d-none');
                        $('.cart-nav-empty').addClass('d-none');
                        $('.nav-link-shopping-cart').addClass('open');
                        $('.cart-refresh').DataTable().ajax.reload();
                        $.ajax({
                            url: "{{route('getnow_qty-cart')}}",
                            data: {
                                'idcustomer': $('#idcustomer').val(),
                            },
                            success: function (data) {
                                document.getElementById('qty-cart-nav')
                                    .innerHTML = data;
                                document.getElementById('js-cart-nav')
                                    .innerHTML = data;
                                document.getElementById(
                                        'js-amount-cart--mobile').innerHTML =
                                    data;
                                $('.loader-cart-nav-wib-group').fadeOut();
                                setTimeout(function () {
                                    $('#cart-navbar').fadeIn();
                                }, 300);
                            }
                        });
                    } else if (get['error'] == 'stock') {
                        iziToast.error({
                            title: 'Gagal!',
                            message: 'Stock Gudang Tinggal ' + get['stock'],
                        });
                    }
                },
                error: function (xhr, textStatus, errorThrow) {
                    iziToast.error({
                        title: 'Gagal!',
                        message: 'Masukkan Cabang dan Merk Barang',
                    });
                }
            });
        });
        $('.addwishlist').click(function () {
            var code = $('#codedetailproduk').val();
            $('.addwishlist').find('i').toggleClass('icon-onwishlist');

            $.ajax({
                url: '{{route("addwishlist")}}',
                method: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'code': code,
                },
                success: function (response) {
                    if (response.status == 'New') {
                        iziToast.success({
                            title: response.status,
                            message: response.message
                        })
                    } else if (response.status == 'Tambah') {
                        iziToast.success({
                            title: response.status,
                            message: response.message
                        })
                    } else if (response.status == 'Hapus') {
                        iziToast.success({
                            title: response.status,
                            message: response.message
                        })
                    }
                }

            })
        });

        $('.product-images').slick({
            autoplay: true,
            autoplaySpeed: 5000,
            dots: false,
            infinite: true,
        });
    });


    function plus() {
        var countEl = parseInt($("#qty").val());
        count = countEl + 1;
        $('#qty').val(count);
    }

    function minus() {
        var countEl = parseInt($("#qty").val());
        if (count > 1) {
            count = countEl - 1;
            $('#qty').val(count);
        }
    }

    $(function () {
        $(window).scroll(function () {
            var scroll = $(window).scrollTop();
            if (scroll > 400) {
                $("#js-sticky-product").removeClass('d-none');
            } else {
                $("#js-sticky-product").addClass('d-none');
            }
        });
    });
</script>
@endsection