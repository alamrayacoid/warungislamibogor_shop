@extends('frontpage.main-frontpage')

@section('extra_style')
<style type="text/css">
    @keyframes placeHolderShimmer {
        0% {
            background-position: -468px 0;
        }

        100% {
            background-position: 468px 0;
        }
    }

    .title-product-load {
        background: #f7c703 !important;
        opacity: 0.5;
    }

    .desc-product-load {
        background: #ff5722 !important;
        opacity: 0.5;
    }

    .animated-background,
    .image,
    .text-line,
    .image-product {
        animation-duration: 1.25s;
        animation-fill-mode: forwards;
        animation-iteration-count: infinite;
        animation-name: placeHolderShimmer;
        animation-timing-function: linear;
        background: #f6f6f6;
        background: linear-gradient(to right, #e6e6e6 8%, #f0f0f0 18%, #e6e6e6 33%);
        background-size: 800px 104px;
        height: 96px;
        /* position: relative; */
    }

    .image-product {
        height: 150px;
        width: 100%;

    }

    .image {
        height: 70px;
        width: 70px;
        border-radius: 10px;
    }

    .wrapper-cell {
        display: flex;
        margin-bottom: 30px;
    }

    .text {
        /* margin-left: 20px; */
    }

    .text-line {
        height: 9px;
        border-radius: 5px;

        margin: 4px 0;
    }

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
            margin-bottom: 0 !important;
        }
    }

    .icon-onwishlist {
        color: #ed5565 !important;
    }
</style>
@endsection

@section('content')

<section style="margin-top:4.5em;">
    @foreach($data as $row)
    <ol class="breadcrumb breadcumb-header">
        <li><a href="#">Home</a></li>
        <li><a href="#">Produk</a></li>
        <li class="active">{{$row->i_name}}</li>
        @endforeach
    </ol>
    <div class="container-fluid">
        {{-- <div class="ibox product-detail mt-5" style="border:1px solid #efeff4;"> --}}
        {{-- jangan dihapus --}}
        <div class="ibox-content d-none">
            <div class="row">
                <div class="col-lg-5">
                    <div class="text">
                        <div class="text-line" style="width:100%;height:400px"> </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text">
                                <div class="text-line" style="width:200px;height:15px;border-radius:0;"> </div>
                                <div style="margin-top:15px;">
                                    <div class="text-line title-product-load"
                                        style="width:100px;height:15px;border-radius:0;"> </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <div class="text">
                                <div class="text-line" style="width:120px;height:15px;border-radius:0;"> </div>
                                <div class="mt-4">
                                    <div class="text-line" style="width:120px;height:15px;border-radius:0;"> </div>
                                </div>
                                <div class="mt-4">
                                    <div class="text-line" style="width:120px;height:15px;border-radius:0;"> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-5">
                            <div class="text">
                                <div class="text-line" style="width:200px;height:15px;border-radius:0;"> </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-5">
                        </div class="row">
                        <div class="col-lg-6 p-detail-product-first">
                            <div class="text">
                                <div class="text-line" style="width:100%;height:25px;border-radius:0;"> </div>
                            </div>
                        </div>
                        <div class="col-lg-6 p-detail-product-last">
                            <div class="text">
                                <div class="text-line" style="width:100%;height:25px;border-radius:0;"> </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="text">
                                <div class="text-line" style="width:100%;height:25px;border-radius:0;"> </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="text">
                                <div class="text-line" style="width:100%;height:25px;border-radius:0;"> </div>
                            </div>
                        </div>
                        <div class="col-lg-6 p-detail-product-first">
                            <div class="text">
                                <div class="text-line" style="width:100%;height:25px;border-radius:0;"> </div>
                            </div>
                        </div>
                        <div class="col-lg-6 p-detail-product-last">
                            <div class="text">
                                <div class="text-line" style="width:100%;height:25px;border-radius:0;"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end --}}
        {{-- </div> --}}
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="ibox product-detail" style="border:1px solid #efeff4;">
                    <div class="ibox-content">
                        <div class="row loader-wib">
                            <div class="col-lg-5">
                                <div class="text">
                                    <div class="text-line" style="width:100%;height:400px"> </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="text">
                                            <div class="text-line" style="width:200px;height:15px;border-radius:0;">
                                            </div>
                                            <div style="margin-top:15px;">
                                                <div class="text-line title-product-load"
                                                    style="width:100px;height:15px;border-radius:0;"> </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                        <div class="text">
                                            <div class="text-line" style="width:120px;height:15px;border-radius:0;">
                                            </div>
                                            <div class="mt-4">
                                                <div class="text-line" style="width:120px;height:15px;border-radius:0;">
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <div class="text-line" style="width:120px;height:15px;border-radius:0;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-5">
                                        <div class="text">
                                            <div class="text-line" style="width:200px;height:15px;border-radius:0;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-5">
                                    </div class="row">
                                    <div class="col-lg-6">
                                        <div class="text">
                                            <div class="text-line" style="width:100%;height:25px;border-radius:0;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="text">
                                            <div class="text-line" style="width:100%;height:25px;border-radius:0;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="text">
                                            <div class="text-line" style="width:100%;height:25px;border-radius:0;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="text">
                                            <div class="text-line" style="width:100%;height:25px;border-radius:0;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="text">
                                            <div class="text-line" style="width:100%;height:25px;border-radius:0;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row content-wib d-none">
                            <div class="col-md-5">
                                <div class="product-images product-imitations" style="outline:none;border:0;">
                                    @foreach($gambar as $roww)
                                    @if($roww->ip_ciproduct)
                                    <div>
                                        <a href="env('APP_WIB')}}storage/image/master/produk/{{$roww->ip_path}}" sty
                                            data-gallery="">
                                            <img src="env('APP_WIB')}}storage/image/master/produk/{{$roww->ip_path}}">
                                        </a>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            @foreach($data as $row)
                            <input type="hidden" value="{{$row->i_code}}" id="codedetailproduk" name="">
                            <div class="col-md-7">
                                <div class="col-lg-12">
                                    <h2 class="title-detail-product">{{$row->i_name}}
                                        <span class="text-info-title-detail-product" id="stocknya"></span>
                                    </h2>
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

                                <div class="col-md-6 column-input-detail-product">
                                    <select id="cabang" name="" class="form-control select2 c-pointer">
                                        <option value="-" selected="" disabled="">Pilih Cabang Pengiriman</option>
                                        @foreach($cabang as $cbng)
                                        <option value="{{$cbng->b_code}}">{{$cbng->c_nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 column-input-detail-product">
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
                                            <button class="btn btn-product-detail-wishlist addwishlist" style="color:#676a6c;
                                                data-ciproduct="{{$row->i_code}}" id="{{$row->i_code}}" type="button"><i
                                                    class="fa fa-heart  icon-onwishlist"></i>&ensp;Add to wishlist
                                            </button>
                                            @else
                                            <button class="btn btn-product-detail-wishlist addwishlist" style="color:#676a6c;
                                                data-ciproduct="{{$row->i_code}}" id="{{$row->i_code}}" type="button"><i
                                                    class="fa fa-heart"></i>&ensp;Add to wishlist
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
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="ibox product-description">
                    <div class="ibox-title" style="background:#fafafa;">
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
            <!-- @if($rows->itp_citype == $typeproduk->itp_citype && $rows->i_code != $typeproduk->i_code) -->
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
                            <div class="image-product-box"
                                  style="background:url('{{asset('assets/img/noimage.jpg')}}')"
                            alt="Sorry! Image not available at this time">
                            </div>
                    @endif
                    <div class="caption">
                        <div class="title-product-group">
                            <a href="{{route('produk-detail-frontpage')}}?code={{$rows->i_code}}"
                                class="title-product-item">{{$rows->i_name}}</a>
                        </div>
                        <div class="footer-product-item">
                            <div class="">
                                <i class="fa fa-star f-14 c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-grey"></i>
                            </div>
                            <div class="price-product-item">Rp. {{$rows->ipr_sunitprice}}</div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- @endif -->
            @endforeach
            @endif
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
                    <span class="rating-sticky-product">
                        <i class="fa fa-star f-14 c-gold"></i>
                        <i class="fa fa-star c-gold"></i>
                        <i class="fa fa-star c-gold"></i>
                        <i class="fa fa-star c-gold"></i>
                        <i class="fa fa-star c-grey"></i>
                    </span>
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
                    id="{{$row->i_code}}" type="button"><i class="fa fa-heart icon-onwishlist"></i></button>
                @else
                <button class="btn btn-wishlist-sticky-product addwishlist" data-ciproduct="{{$row->i_code}}"
                    id="{{$row->i_code}}" type="button"><i class="fa fa-heart"></i></button>
                @endif
                @else
                <a href="{{route('login-frontpage')}}" style="color:#676a6c;"><button
                        class="btn btn-wishlist-sticky-product" type="button"><i class="fa fa-heart"></i></button></a>
                @endif
                <a href="{{url('/')}}"><button class="btn btn-more-sticky-product">Produk Lainnya</button></a>
                <button class="btn btn-addcart-sticky-product addcart" data-product="{{$code}}">Tambah Ke
                    Keranjang</button>
            </div>
        </div>
        @endforeach
    </div>

</div>

@endsection

@section('extra_script')
<script>
    $(document).ready(function () {
        $('#cabang').on('change', function () {
            $('#stocknya').removeClass('selected');                    

            setInterval(function () {
                ajax_helper('{{route("stock_check")}}', 'POST', {
                    '_token': '{{csrf_token()}}',
                    'cabang': $('#cabang').val(),
                    'produk': '{{$code}}'
                });
            }, 3000);
        })

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
            if ($('#cabang').val() == null) {
                iziToast.error({
                    title: 'Peringatan!',
                    message: 'Silahkan Pilih Cabang Pengiriman Terlebih Dahulu',
                });
            } else {
                $('.content-dropdown-cart').append(
                    '<div class="loader-cart-nav-wib-group"><div class="loader-cart-nav--element"></div></div>'
                    );
                $('#cart-navbar').hide();
                var tablecart = $('.cart-refresh');
                var cproduct = $(this).data('product');
                var qty = $('#qty').val();
                var cabang = $('#cabang').val();
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
                                    document.getElementById('js-amount-cart--mobile').innerHTML = data;
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
            }
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