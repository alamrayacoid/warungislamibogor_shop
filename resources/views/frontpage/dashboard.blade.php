@extends('frontpage.main-frontpage')
@section('extra_style')
<style type="text/css">

</style>
@endsection
@section('content')

<div class="dashboard-frontpage" style="padding:0;">
    {{-- <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="ibox">

                <div class="ibox-content ">
                    <div class="row">
                        
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-center">
                            
                                <img alt="image" class="img-responsive" src="{{asset('assets/img/profile_big.jpg')}}">

</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <h4 class="pt-4"><strong>Nama Customer</strong></h4>
    <ul class="ibox-list-pembelian">
        <li><a href="{{route('pembelian-pembayaran-frontpage' , ['status' => 2])}}"><span>Pembayaran</span> <label
                    class="label label-info">0</label></a></li>
        <li><a href="{{route('pembelian-diproses-frontpage' , ['status' => 3])}}"><span>Sedang di Proses</span> <label
                    class="label label-info">0</label></a></li>
        <li><a href="{{route('pembelian-dikirim-frontpage' , ['status' => 4])}}"><span>Proses Pengiriman</span> <label
                    class="label label-info">0</label></a></li>
    </ul>
</div>

</div>
</div>

<div class="ibox-content p-3">
    <div class="ibox-profile">
        <img src="{{asset('assets/img/profile_small.jpg')}}" height="48px" width="48px">
        <span>Nama Customer</span>
    </div>

    <ul class="ibox-list-pembelian">
        <li><a href="{{route('pembelian-pembayaran-frontpage' , ['status' => 2])}}"><span>Pembayaran</span> <label
                    class="label label-info">0</label></a></li>
        <li><a href="{{route('pembelian-diproses-frontpage' , ['status' => 3])}}"><span>Sedang di Proses</span> <label
                    class="label label-info">0</label></a></li>
        <li><a href="{{route('pembelian-dikirim-frontpage' , ['status' => 4])}}"><span>Proses Pengiriman</span> <label
                    class="label label-info">0</label></a></li>
    </ul>
</div>

</div>
</div> --}}
<section class="header_wrapper" style="margin-top:10em;">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="your-class">
                    <div><img src="{{asset('assets/img/img-product/bg-utama.jpg')}}"></div>
                    <div><img src="{{asset('assets/img/img-product/bg-utama-2.jpg')}}"></div>
                    <div><img src="{{asset('assets/img/img-product/bg-utama.jpg')}}"></div>
                </div>
            </div>
            <div class="col-md-5 img-header-column" style="padding-left:0;">
                <div class="img-header-second">
                    <img src="{{asset('assets/img/img-product/bg-header.jpg')}}" style="width:100%;">

                </div>
                <div class="img-header-second mt-4">
                    <img src="{{asset('assets/img/img-product/bg-header-2.jpg')}}" style="width:100%;">
                </div>

            </div>
        </div>
</section>

<section class="">
    <div class="container">
        <div class="row mt-5">
            <!-- <div class="col-md-12">

                    <div class="title-categories">
                        Kategori Produk
                    </div>
                    <div class="ibox_content_categories">
                        <a href="#">
                            <div class="col-md-2">
                                <img src="{{asset('assets/img/img-product/grid.png')}}" class="icon-categories">
                                <p class="text-categories">Besi Baja</p>
                            </div>
                        </a>
                    



                    </div>
                </div> -->
            <!-- <h2 class="">Produk yang tersedia</h2>
            @foreach($data as $row)
            <div class="col-md-3">
                <div class="thumbnail">
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
                            <button class="btn btn-circle btn-lg btn-wishlist" data-ciproduct="{{$row->i_code}}"
                                id="{{$row->i_code}}" type="button" title="Tambah ke wishlist"><i
                                    class="far fa-heart"></i></button>
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
                        <div class="image-product-box">
                            <img src="/warungislamibogor/storage/image/master/produk/{{$roww->ip_path}}">
                        </div>
                        @endif
                        @endforeach
                        <div class="caption">
                            <span class="product-price">
                                            Rp. {{$row->ipr_sunitprice}}
                                        </span>
                            <small class="text-muted">{{$row->ity_name}}</small>
                            <h2 class="title-product-item">{{$row->i_name}}</h2>
                            <div class="footer-product-item">
                                <div class="">
                                    <i class="fa fa-star f-14 c-gold"></i>
                                    <i class="fa fa-star c-gold"></i>
                                    <i class="fa fa-star c-gold"></i>
                                    <i class="fa fa-star c-gold"></i>
                                    <i class="fa fa-star c-grey"></i>
                                </div>
                                <div class="price-product-item">Rp. {{$row->ipr_sunitprice}}</div>
                            </div>
                            <a href="{{route('produk-detail-frontpage')}}?code={{$row->i_code}}" class="product-name"> {{$row->i_name}}</a>



                            <div class="small m-t-xs">
                                {{$row->itp_tagdesc}}
                            </div>
                            <div class="m-t text-right">
                                <form action="{{route('produk-detail-frontpage')}}" method="GET">
                                    <input type="hidden" name="code" value="{{$row->i_code}}">
                                    <button class="btn btn-xs btn-outline btn-primary">Info <i
                                            class="fa fa-long-arrow-right"></i> </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach -->
        </div>
        <div class="row">
            <div class="product-opsi-group">
                <h3 class="title-product-opsi">Rekomendasi Produk buat anda</h3>
                <button class="btn view-more-product">Lihat Semua</button>
            </div>
            <div class="slick">
                <div class="thumbnail product-box-item">
                    <div class="image-product-box">
                        <img src="{{asset('assets/img/img-product/product-3.jpg')}}" alt="...">
                    </div>
                    <div class="caption">
                        <a href="javascript:void(0)"
                            class="title-product-item">Botol Bekas Aqua Gelas 250 mili liter</a>
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
                <div class="thumbnail product-box-item">
                    <div class="image-product-box">
                        <img src="{{asset('assets/img/img-product/product-3.jpg')}}" alt="...">
                    </div>
                    <div class="caption">
                        <a href="javascript:void(0)"
                            class="title-product-item">Botol Bekas Aqua Gelas 250 mili liter</a>
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
                <div class="thumbnail product-box-item">
                    <div class="image-product-box">
                        <img src="{{asset('assets/img/img-product/product-3.jpg')}}" alt="...">
                    </div>
                    <div class="caption">
                        <a href="javascript:void(0)"
                            class="title-product-item">Botol Bekas Aqua Gelas 250 mili liter</a>
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

                <div class="thumbnail product-box-item">
                    <div class="image-product-box">
                        <img src="{{asset('assets/img/img-product/product-3.jpg')}}" alt="...">
                    </div>
                    <div class="caption">
                        <a href="javascript:void(0)"
                            class="title-product-item">Botol Bekas Aqua Gelas 250 mili liter</a>
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
                <div class="thumbnail product-box-item">
                    <div class="image-product-box">
                        <img src="{{asset('assets/img/img-product/product-3.jpg')}}" alt="...">
                    </div>
                    <div class="caption">
                        <a href="javascript:void(0)"
                            class="title-product-item">Botol Bekas Aqua Gelas 250 mili liter</a>
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
                <div class="thumbnail product-box-item">
                    <div class="image-product-box">
                        <img src="{{asset('assets/img/img-product/product-3.jpg')}}" alt="...">
                    </div>
                    <div class="caption">
                        <a href="javascript:void(0)"
                            class="title-product-item">Botol Bekas Aqua Gelas 250 mili liter</a>
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

        <div class="row">
        <div class="product-opsi-group">
                <h3 class="title-product-opsi">Produk Paling Banyak Dicari</h3>
                <button class="btn view-more-product">Lihat Semua</button>
            </div>
            <div class="slick">
                <div class="thumbnail product-box-item">
                    <div class="image-product-box">
                        <img src="{{asset('assets/img/img-product/product-3.jpg')}}" alt="...">
                    </div>
                    <div class="caption">
                        <a href="javascript:void(0)"
                            class="title-product-item">Botol Bekas Aqua Gelas 250 mili liter</a>
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
                <div class="thumbnail product-box-item">
                    <div class="image-product-box">
                        <img src="{{asset('assets/img/img-product/product-3.jpg')}}" alt="...">
                    </div>
                    <div class="caption">
                        <a href="javascript:void(0)"
                            class="title-product-item">Botol Bekas Aqua Gelas 250 mili liter</a>
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
                <div class="thumbnail product-box-item">
                    <div class="image-product-box">
                        <img src="{{asset('assets/img/img-product/product-3.jpg')}}" alt="...">
                    </div>
                    <div class="caption">
                        <a href="javascript:void(0)"
                            class="title-product-item">Botol Bekas Aqua Gelas 250 mili liter</a>
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

                <div class="thumbnail product-box-item">
                    <div class="image-product-box">
                        <img src="{{asset('assets/img/img-product/product-3.jpg')}}" alt="...">
                    </div>
                    <div class="caption">
                        <a href="javascript:void(0)"
                            class="title-product-item">Botol Bekas Aqua Gelas 250 mili liter</a>
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
                <div class="thumbnail product-box-item">
                    <div class="image-product-box">
                        <img src="{{asset('assets/img/img-product/product-3.jpg')}}" alt="...">
                    </div>
                    <div class="caption">
                        <a href="javascript:void(0)"
                            class="title-product-item">Botol Bekas Aqua Gelas 250 mili liter</a>
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

                <div class="thumbnail product-box-item">
                    <div class="image-product-box">
                        <img src="{{asset('assets/img/img-product/product-3.jpg')}}" alt="...">
                    </div>
                    <div class="caption">
                        <a href="javascript:void(0)"
                            class="title-product-item">Botol Bekas Aqua Gelas 250 mili liter</a>
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

        <div class="row">
        <div class="product-opsi-group">
                <h3 class="title-product-opsi">Semua Produk</h3>
                <button class="btn view-more-product">Lihat Semua</button>
            </div>
            @foreach($data as $row)
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail product-box-item">
                    <div class="image-product-box">
                        @foreach($gambar as $roww)
                        @if($row->i_code == $roww->ip_ciproduct)
                        <img src="/warungislamibogor/storage/image/master/produk/{{$roww->ip_path}}">
                        @endif
                        @endforeach
                    </div>
                    <div class="caption">
                        <a href="{{route('produk-detail-frontpage')}}?code={{$row->i_code}}"
                            class="title-product-item">{{$row->i_name}}</a>
                        <div class="footer-product-item">
                            <div class="">
                                <i class="fa fa-star f-14 c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-grey"></i>
                            </div>
                            <div class="price-product-item">Rp. {{$row->ipr_sunitprice}}</div>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
        </div>

</section>



@endsection
@section('extra_script')
<script>
    $(document).ready(function () {

        $('#ncart').html($('.ncart').length);

        $(".variable").slick({
            autoplay: true,
            autoplaySpeed: 5000,
            dots: true,
            centerMode: true,
            infinite: true,
            variableWidth: true
        });

        $('.btn-wishlist').click(function () {
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
                        slidesToShow: 1
                    }
                }
            ]
        });

    });
</script>
@endsection