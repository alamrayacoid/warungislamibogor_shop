@extends('frontpage.main-frontpage')

@section('extra_style')
<style type="text/css">

</style>
@endsection

@section('content')
<section style="margin-top:5em;">
    <ol class="breadcrumb breadcumb-header">
        <li><a href="#">Home</a></li>
        <li><a href="">Barang Favorit</a></li>
    </ol>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-2" style="padding:0;">
                <div class="thumbnail profile-frame--sidebar">
                    <div class="d-flex align-items-center padding-0-15">
                        <img src="/warungislamibogor_shop/storage/image/member/profile/{{Auth::user()->cm_path}}"
                            width="50px" height="50px">
                        <h5 class="title-profile-sidebar">{{Auth::user()->cm_name}}</h5>
                    </div>
                    <div class="mt-4 padding-0-15">
                        <div class="">
                            <span class="fs-12 text-black-54">Kelengkapan Profil</span>
                            <span class="fs-11 text-black-7 bold pull-right">60%</span>
                        </div>
                        <div class="profile-progress-bar mt-2">
                            <div class="profile-progress-bar-status" style="width: 60%;"></div>
                        </div>
                        <div class="text-right">
                            <a href="{{route('profile')}}" class="c-primary-wib fs-12 semi-bold">Lengkapi
                                Sekarang&ensp;<i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <hr>
                    <div class="">
                        <h5 class="heading-section-profile-frame padding-0-15">Daftar Transaksi</h5>
                        <ul class="list-item-profile-sidebar">
                            <a class="c-primary-wib semi-bold"
                                href="{{route('pembelian-semua-frontpage' , ['status' => 1])}}">
                                <li>Daftar Pembelian</li>
                            </a>
                            <a class="c-primary-wib semi-bold"
                                href="{{route('pembelian-pembayaran-frontpage', ['status' => 2])}}">
                                <li class="">Pembayaran</li>
                            </a>
                            <a class="c-primary-wib semi-bold"
                                href="{{route('pembelian-diproses-frontpage', ['status' => 3])}}">
                                <li>Sedang diproses</li>
                            </a>
                        </ul>
                    </div>
                    <hr>
                    <div class="">
                        <h5 class="heading-section-profile-frame padding-0-15">Pengiriman</h5>
                        <ul class="list-item-profile-sidebar">
                            <a class="c-primary-wib semi-bold"
                                href="{{route('pembelian-dikirim-frontpage', ['status' => 4])}}">
                                <li>Proses Pengiriman</li>
                            </a>
                        </ul>
                    </div>
                    <hr>
                    <div class="">
                        <h5 class="heading-section-profile-frame padding-0-15">Profile Saya</h5>
                        <ul class="list-item-profile-sidebar">
                            <a class="c-primary-wib semi-bold" href="{{route('profile')}}">
                                <li>Pengaturan</li>
                            </a>
                            <a class="c-primary-wib semi-bold" href="{{route('wishlist-frontpage')}}">
                                <li>Barang Favorit</li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-10" style="padding:0 30px;">
                <div class="tabs-container">
                    <ul class="nav nav-tabs nav-tabs-custom">
                        <li class="active">
                            <a data-toggle="tab" href="#tab-12"><span class="tab-title"><i
                                        class="fa fa-eye"></i>Terakhir Dilihat</span></a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#tab-22"><span class="tab-title"><i
                                        class="fa fa-heart"></i>Barang Favorit</span></a>
                        </li>
                    </ul>
                    <div class="tab-content padding-15-0">
                        <div id="tab-12" class="tab-pane animated fadeIn active">
                            <div class="row mt-5">
                                @foreach($lastseen as $row)
                                <div class="col-sm-6 col-md-3">
                                    <div class="thumbnail product-box-item">
                                        @foreach($gambar as $roww)
                                        @if($row->i_code == $roww->ip_ciproduct)
                                        <div class="image-product-box"
                                            style="background:url('/warungislamibogor/storage/image/master/produk/{{$roww->ip_path}}')">
                                        </div>
                                        @endif
                                        @endforeach
                                        <div class="caption">
                                            <div class="title-product-group">
                                                <a href="{{route('produk-detail-frontpage')}}?code={{$row->i_code}}"
                                                    class="title-product-item">{{$row->i_name}}</a>
                                            </div>
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
                            <div class="row mt-5">
                            @if($produkseen == '[]')
                            @else
                                <h3 class="title-product-opsi-same">Inspirasi dari minat anda</h3>
                                @foreach($produkseen as $rows)
                                <div class="col-sm-6 col-md-3">
                                    <div class="thumbnail product-box-item">
                                        @foreach($gambar as $roww)
                                        @if($row->i_code == $roww->ip_ciproduct)
                                        <div class="image-product-box"
                                            style="background:url('/warungislamibogor/storage/image/master/produk/{{$roww->ip_path}}')">
                                        </div>
                                        @endif
                                        @endforeach
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
                                                <div class="price-product-item">Rp. {{$row->ipr_sunitprice}}</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <div id="tab-22" class="tab-pane animated fadeIn">

                            <div class="d-flex">
                                <input placeholder="Cari Barang Favorit Anda" type="text" name="" id="filter-wishlist"
                                    class="form-control input-wishlist-filter">
                                <button class="btn btn-wishlist-filter" type="button"><img
                                        src="http://localhost/warungislamibogor_shop/assets/img/img-product/img-search.svg"></button>
                            </div>
                            @if($data != '[]')
                            <div class="row mt-5">
                                @foreach($data as $row)
                                <div class="col-md-3">
                                    <div class="thumbnail product-box-item">
                                        <div class="product-box">
                                            @foreach($gambar as $roww)
                                            @if($row->i_code == $roww->ip_ciproduct)
                                            <div class="image-product-box"
                                                style="background:url('/warungislamibogor/storage/image/master/produk/{{$roww->ip_path}}')">
                                            </div>
                                            @endif
                                            @endforeach
                                            <div class="caption">
                                                @foreach($wish as $wis)
                                                @if($wis->wl_cmember == Auth::user()->cm_code && $wis->wl_ciproduct ==
                                                $row->i_code)
                                                <div class="product-wishlist onproduk-page onwishlist">
                                                    <button data-ciproduct="{{$wis->wl_ciproduct}}"
                                                        data-member="{{Auth::user()->cm_code}}"
                                                        class="btn btn-circle btn-lg btn-danger btn-wishlist"
                                                        type="button" title="Tambah ke wishlist"><i
                                                            class="fa-heart fa"></i></button>
                                                </div>
                                                @endif
                                                @endforeach
                                                @if($wish == '[]')
                                                <div class="product-wishlist onproduk-page">
                                                    <button data-ciproduct="{{$row->i_code}}"
                                                        class="btn btn-circle btn-lg btn-wishlist" id="{{$row->i_code}}"
                                                        type="button" title="Tambah ke wishlist"><i
                                                            class="far fa-heart"></i></button>
                                                </div>
                                                @endif
                                                <div class="">
                                                    <div class="title-product-group">
                                                        <a href="{{route('produk-detail-frontpage')}}?code={{$row->i_code}}"
                                                            class="title-product-item">{{$row->i_name}}</a>
                                                    </div>
                                                    <div class="footer-product-item">
                                                        <div class="">
                                                            <i class="fa fa-star f-14 c-gold"></i>
                                                            <i class="fa fa-star c-gold"></i>
                                                            <i class="fa fa-star c-gold"></i>
                                                            <i class="fa fa-star c-gold"></i>
                                                            <i class="fa fa-star c-grey"></i>
                                                        </div>
                                                        <div class="price-product-item">Rp. Rp. {{$row->ipr_sunitprice}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </div>
                            @else
                            <div class="column-empty-wishlist mt-4">
                                <div>
                                    <img src="{{asset('assets/img/img-product/shopping-bag.png')}}" width="150px"
                                        height="150px">
                                </div>
                                <div class="padding-0-15">
                                    <h5>Anda dapat melihat produk di daftar keinginan Anda di sini</h5>
                                    <a href="{{url('/')}}"><button class="btn btn-empty-wishlist">Mulai Mencari
                                            Produk</button></a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row mt-5">

                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
@section('extra_script')
<script type="text/javascript">
    $(document).ready(function () {
        $('#ncart').html($('.ncart').length);

        $('#btn-hapus').click(function () {
            $('#filter-wishlist').val('');
            $(this).addClass('hidden');
            $('#filter-wishlist').focus();
        })

        $('#filter-wishlist').on('keyup', function () {
            if ($(this).val().length != 0) {
                $('#btn-hapus').removeClass('hidden');
            }
        })

        $('.btn-wishlist').click(function () {
            var code = $(this).data('ciproduct');
            var member = $(this).data('wl_cmember');
            $(this).find('i').toggleClass('fa far');
            $(this).parents('.product-wishlist').toggleClass('onwishlist');
            $.ajax({
                url: '{{route("addwishlist")}}',
                method: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'code': code,
                    'member': member,
                },

            })
        })
    });
</script>
@endsection