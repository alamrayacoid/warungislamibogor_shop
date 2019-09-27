@extends('frontpage.main-frontpage')
@section('extra_style')
<style type="text/css">
    .testproduk {
        display: flex;
    }

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
    .jscroll-added{
        padding: 0 15px;
    }
</style>
@endsection
@section('content')

<div class="dashboard-frontpage" style="padding:0;">
    <section class="header_wrapper" style="margin-top:6em;">
        <div class="loader-wib" style="margin-bottom:2em;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="text">
                            <div class="text-line" style="width:100%;height:250px"> </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="text">
                            <div class="text-line" style="width:100%;height:120px"> </div>
                            <div style="margin-top:10px;">
                                <div class="text-line" style="width:100%;height:120px"> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5" id="">
                    <div class="col-lg-product col-md-4">
                        <div class="thumbnail product-box-item">
                            <div class="image-product"></div>
                            <div class="caption">
                                <div class="text">
                                    <div class="text-line" style="width:100px;height:13px;border-radius:0;">
                                    </div>
                                    <div class="mt-3">
                                        <div class="text-line title-product-load"
                                            style="width:60px;height:10px;border-radius:0;">
                                        </div>
                                        <div class="mt-3">
                                            <div class="text-line desc-product-load"
                                                style="width:60px;height:10px;border-radius:0;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-product col-md-4">
                        <div class="thumbnail product-box-item">
                            <div class="image-product"></div>
                            <div class="caption">
                                <div class="text">
                                    <div class="text-line" style="width:100px;height:13px;border-radius:0;">
                                    </div>
                                    <div class="mt-3">
                                        <div class="text-line title-product-load"
                                            style="width:60px;height:10px;border-radius:0;">
                                        </div>
                                        <div class="mt-3">
                                            <div class="text-line desc-product-load"
                                                style="width:60px;height:10px;border-radius:0;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-product col-md-4">
                        <div class="thumbnail product-box-item">
                            <div class="image-product"></div>
                            <div class="caption">
                                <div class="text">
                                    <div class="text-line" style="width:100px;height:13px;border-radius:0;">
                                    </div>
                                    <div class="mt-3">
                                        <div class="text-line title-product-load"
                                            style="width:60px;height:10px;border-radius:0;">
                                        </div>
                                        <div class="mt-3">
                                            <div class="text-line desc-product-load"
                                                style="width:60px;height:10px;border-radius:0;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-product col-md-4">
                        <div class="thumbnail product-box-item">
                            <div class="image-product"></div>
                            <div class="caption">
                                <div class="text">
                                    <div class="text-line" style="width:100px;height:13px;border-radius:0;">
                                    </div>
                                    <div class="mt-3">
                                        <div class="text-line title-product-load"
                                            style="width:60px;height:10px;border-radius:0;">
                                        </div>
                                        <div class="mt-3">
                                            <div class="text-line desc-product-load"
                                                style="width:60px;height:10px;border-radius:0;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-product col-md-4">
                        <div class="thumbnail product-box-item">
                            <div class="image-product"></div>
                            <div class="caption">
                                <div class="text">
                                    <div class="text-line" style="width:100px;height:13px;border-radius:0;">
                                    </div>
                                    <div class="mt-3">
                                        <div class="text-line title-product-load"
                                            style="width:60px;height:10px;border-radius:0;">
                                        </div>
                                        <div class="mt-3">
                                            <div class="text-line desc-product-load"
                                                style="width:60px;height:10px;border-radius:0;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-wib d-none">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-7">
                        <div class="your-class">
                            @foreach($imgslider as $row)
                            <div><img src="{{env('APP_WIB')}}storage/image/master/banner/{{$row->b_image}}"></div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-5 img-header-column" style="padding-left:0;">
                        @foreach($imgbasic as $row)
                        <div class="img-header-second">
                            <img src="{{env('APP_WIB')}}storage/image/master/banner/{{$row->b_image}}"
                                style="width:100%;">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-5">
        <div class="container-fluid">
            @if($popularnull == '[]')
            @else
            <div class="row">
                <div class="product-opsi-group">
                    <h3 class="title-product-opsi">Rekomendasi Produk buat anda</h3>
                </div>
                <div class="slick">
                    @foreach($rekomendasiproduk as $row)
                    <div class="thumbnail product-box-item-slider">
                        @foreach($gambar as $roww)
                        @if($row->i_code == $roww->ip_ciproduct)
                        <div class="image-product-box"
                            style="background:url('{{env('APP_WIB')}}storage/image/master/produk/{{$roww->ip_path}}')">
                        </div>
                        @endif
                        @endforeach
                        @if($row->ip_path == null)
                            <div class="image-product-box"
                                  style="background:url('{{asset('assets/img/noimage.jpg')}}')"
                            alt="Sorry! Image not available at this time">
                            </div>
                            @endif
                        <div class="caption">
                            <div class="title-product-group">
                                <a href="{{route('produk-detail-frontpage')}}?code={{$row->i_code}}"
                                    class="title-product-item">{{$row->i_name}}</a>
                            </div>
                            @if($row->gpp_sellprice == null)
                                    <div class="discount-product-item">
                                        
                                    </div>
                                    @else
                                    <div class="discount-product-item">
                                        <span class="discount-value">{{number_format(($row->ipr_sunitprice - $row->gpp_sellprice) / ($row->ipr_sunitprice / 100))}}%</span><span class="discount-price"> Rp. {{$row->ipr_sunitprice}}</span>
                                    </div>
                                    @endif
                                <div class="footer-product-item">
                                    @if($row->gpp_sellprice == null)
                                    <div class="price-product-item">
                                        Rp. {{$row->ipr_sunitprice}}
                                    </div>
                                    @else
                                    <div class="price-product-item">
                                        Rp. {{$row->gpp_sellprice}}
                                    </div>
                                    @endif
                                    <div class="">
                                        <i class="fas fa-tags" style="color: #009a51;"></i>&ensp;<span style="color: #595959;"> {{$row->ity_name}}</span>
                                    </div>
                                </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            @if($popularnull == '[]')
            @else
            <div class="row">
                <div class="product-opsi-group">
                    <h3 class="title-product-opsi">Produk Paling Banyak Dicari</h3>
                </div>
                <div class="slick">
                @foreach($popular as $row)
                    @foreach($data as $rows)
                    @if($rows->i_code == $row->wl_ciproduct)
                    <div class="thumbnail product-box-item-slider">
                        @foreach($gambar as $roww)
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
                            @if($rows->gpp_sellprice == null)
                                    <div class="discount-product-item">
                                        
                                    </div>
                                    @else
                                    <div class="discount-product-item">
                                        <span class="discount-value">{{number_format(($rows->ipr_sunitprice - $rows->gpp_sellprice) / ($rows->ipr_sunitprice / 100))}}%</span><span class="discount-price"> Rp. {{$rows->ipr_sunitprice}}</span>
                                    </div>
                                    @endif
                                <div class="footer-product-item">
                                    @if($rows->gpp_sellprice == null)
                                    <div class="price-product-item">
                                        Rp. {{$rows->ipr_sunitprice}}
                                    </div>
                                    @else
                                    <div class="price-product-item">
                                        Rp. {{$rows->gpp_sellprice}}
                                    </div>
                                    @endif
                                    <div class="">
                                        <i class="fas fa-tags" style="color: #009a51;"></i>&ensp;<span style="color: #595959;"> {{$rows->ity_name}}</span>
                                    </div>
                                </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @endforeach
                </div>
            </div>
            @endif
            <div class="row">
                <div class="product-opsi-group">
                    <h3 class="title-product-opsi">Semua Produk</h3>
                </div>
            </div>
            <div class="infinite-scroll row">
                @foreach($data as $row)
                <div class="col-lg-product col-md-4">
                    <div class="thumbnail product-box-item">
                        <div class="product-box">
                            @foreach($wish as $wis)
                            @if(Auth::check())
                            @if($wis->wl_cmember == Auth::user()->cm_code && $wis->wl_ciproduct == $row->i_code)
                            <div class="product-wishlist onproduk-page onwishlist">
                                <button class="btn btn-circle btn-lg btn-wishlist" data-ciproduct="{{$row->i_code}}"
                                    type="button" title="Tambah ke wishlist"><i class="fa-heart fa"></i></button>
                            </div>
                            @else
                            <div class="product-wishlist onproduk-page">
                                <button class="btn btn-circle btn-lg btn-wishlist" data-ciproduct="{{$row->i_code}}"
                                    id="{{$row->i_code}}" type="button" title="Tambah ke wishlist"><i
                                        class="far fa-heart"></i></button>
                            </div>
                            @endif
                            @else
                            <div class="product-wishlist onproduk-page">

                                <a href="{{route('login-frontpage')}}"><button class="btn btn-circle btn-lg btn-wishlist" type="button" title="Tambah ke wishlist"><i
                                        class="far fa-heart"></i></button></a>
                            </div>
                            @endif
                            @endforeach
                            @if($wish == '[]')
                            <div class="product-wishlist onproduk-page">
                                <button class="btn btn-circle btn-lg btn-wishlist" data-ciproduct="{{$row->i_code}}"
                                    id="{{$row->i_code}}" type="button" title="Tambah ke wishlist"><i
                                        class="far fa-heart"></i></button>
                            </div>
                            @endif
                            @foreach($gambar as $roww)
                            @if($row->i_code == $roww->ip_ciproduct)
                            <div class="image-product-box"
                                style="background:url('{{env('APP_WIB')}}storage/image/master/produk/{{$roww->ip_path}}')"
                                alt="Sorry! Image not available at this time">
                            </div>
                            @endif
                            @endforeach
                            @if($row->ip_path == null)
                            <div class="image-product-box"
                                  style="background:url('{{asset('assets/img/noimage.jpg')}}')"
                            alt="Sorry! Image not available at this time">
                            </div>
                            @endif
                            <div class="caption">
                                <div class="title-product-group">
                                    <a href="{{route('produk-detail-frontpage')}}?code={{$row->i_code}}"
                                        class="title-product-item">{{$row->i_name}}</a>
                                </div>
                                @if($row->gpp_sellprice == null)
                                    <div class="discount-product-item">
                                        
                                    </div>
                                    @else
                                    <div class="discount-product-item">
                                        <span class="discount-value">{{number_format(($row->ipr_sunitprice - $row->gpp_sellprice) / ($row->ipr_sunitprice / 100))}}%</span><span class="discount-price"> Rp. {{$row->ipr_sunitprice}}</span>
                                    </div>
                                    @endif
                                <div class="footer-product-item">
                                    @if($row->gpp_sellprice == null)
                                    <div class="price-product-item">
                                        Rp. {{$row->ipr_sunitprice}}
                                    </div>
                                    @else
                                    <div class="price-product-item">
                                        Rp. {{$row->gpp_sellprice}}
                                    </div>
                                    @endif
                                    <div class="">
                                        <i class="fas fa-tags" style="color: #009a51;"></i>&ensp;<span style="color: #595959;"> {{$row->ity_name}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{$data->links()}}
            </div>
    </section>
    @endsection
    @section('extra_script')
    <script>
        $(document).ready(function () {
            $('ul.pagination').hide();
            var appendload = `<div class="row mt-5" id="">
                    <div class="col-lg-product col-md-4">
                        <div class="thumbnail product-box-item">
                            <div class="image-product"></div>
                            <div class="caption">
                                <div class="text">
                                    <div class="text-line" style="width:100px;height:13px;border-radius:0;">
                                    </div>
                                    <div class="mt-3">
                                        <div class="text-line title-product-load"
                                            style="width:60px;height:10px;border-radius:0;">
                                        </div>
                                        <div class="mt-3">
                                            <div class="text-line desc-product-load"
                                                style="width:60px;height:10px;border-radius:0;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-product col-md-4">
                        <div class="thumbnail product-box-item">
                            <div class="image-product"></div>
                            <div class="caption">
                                <div class="text">
                                    <div class="text-line" style="width:100px;height:13px;border-radius:0;">
                                    </div>
                                    <div class="mt-3">
                                        <div class="text-line title-product-load"
                                            style="width:60px;height:10px;border-radius:0;">
                                        </div>
                                        <div class="mt-3">
                                            <div class="text-line desc-product-load"
                                                style="width:60px;height:10px;border-radius:0;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-product col-md-4">
                        <div class="thumbnail product-box-item">
                            <div class="image-product"></div>
                            <div class="caption">
                                <div class="text">
                                    <div class="text-line" style="width:100px;height:13px;border-radius:0;">
                                    </div>
                                    <div class="mt-3">
                                        <div class="text-line title-product-load"
                                            style="width:60px;height:10px;border-radius:0;">
                                        </div>
                                        <div class="mt-3">
                                            <div class="text-line desc-product-load"
                                                style="width:60px;height:10px;border-radius:0;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-product col-md-4">
                        <div class="thumbnail product-box-item">
                            <div class="image-product"></div>
                            <div class="caption">
                                <div class="text">
                                    <div class="text-line" style="width:100px;height:13px;border-radius:0;">
                                    </div>
                                    <div class="mt-3">
                                        <div class="text-line title-product-load"
                                            style="width:60px;height:10px;border-radius:0;">
                                        </div>
                                        <div class="mt-3">
                                            <div class="text-line desc-product-load"
                                                style="width:60px;height:10px;border-radius:0;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-product col-md-4">
                        <div class="thumbnail product-box-item">
                            <div class="image-product"></div>
                            <div class="caption">
                                <div class="text">
                                    <div class="text-line" style="width:100px;height:13px;border-radius:0;">
                                    </div>
                                    <div class="mt-3">
                                        <div class="text-line title-product-load"
                                            style="width:60px;height:10px;border-radius:0;">
                                        </div>
                                        <div class="mt-3">
                                            <div class="text-line desc-product-load"
                                                style="width:60px;height:10px;border-radius:0;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;
            $(function() {
            $('.infinite-scroll').jscroll({
                autoTrigger: true,
                loadingHtml: appendload,
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinite-scroll',
                callback: function() {
                $('ul.pagination').remove();
            }
        });
    });
            $('#ncart').html($('.ncart').length);

            $(".variable").slick({
                autoplay: true,
                autoplaySpeed: 5000,
                dots: true,
                centerMode: true,
                infinite: true,
                variableWidth: true
            });
            $('.infinite-scroll').on('click', '.btn-wishlist', function () {
                var code = $(this).data('ciproduct');
                $(this).find('i').toggleClass('fa far');
                $(this).parents('.product-wishlist').toggleClass('onwishlist');
                $.ajax({
                    url: '{{route("addwishlist")}}',
                    method: 'POST',
                    data: {
                        '_token': '{{csrf_token()}}',
                        'code': code,
                    },

                })
            })
            $('.your-class').slick({
                slidesToShow: 1,
                arrows: false,
                autoplay: true,
            });
            $('.slick').slick({
                slidesToShow: 5,
                cssEase: "ease",
                prevArrow: '<button class=" slick-prev-product" aria-label="Previous" type="button"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>',
                nextArrow: '<button class=" slick-next-product" aria-label="Next" type="button"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>',
                autoplay: true,
                responsive: [{
                        breakpoint: 992,
                        settings: {

                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 820,
                        settings: {
                            arrows: false,
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            slidesToShow: 1,
                        }
                    },
                    {
                        breakpoint: 300,
                        settings: {
                            arrows: false,
                            centerMode: false,
                            slidesToShow: 1,
                        }
                    }
                ]
            });

        });
    </script>
    @endsection