@extends('frontpage.main-frontpage')

@section('extra_style')
<style type="text/css">
    
</style>
@endsection

@section('content')

@include('frontpage.pembelian.modal-detailpembelian')
@include('frontpage.pembelian.modal-detailpengiriman')
@include('frontpage.pembelian.modal-pembayaran')
<section style="margin-top:4.5em">
    <ol class="breadcrumb breadcumb-header">
        <li><a href="#">Home</a></li>
        <li class="active">Semua Transaksi</li>
    </ol>
    <div class="container-fluid mt-5">
        <div class="loader-wib"></div>
        <div class="row" style="padding-bottom: 3em;">
            <div class="col-lg-2 col-md-3 column-profile-frame--sidebar">
                <div class="thumbnail profile-frame--sidebar">
                    <div class="d-flex align-items-center padding-0-15">
                        <img src="alamraya.site/warungislamibogor_shop/storage/image/member/profile/{{Auth::user()->cm_path}}"
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
            <div class="col-lg-10 col-md-9" style="padding:0 5px;">
                <div class="thumbnail">
                    <div class="caption padding-15">
                        <div class="row">
                            <div class="col-lg-2">
                                <img src="{{asset('assets/img/img-product/product-4.png')}}" width="120px" height="120px">
                            </div>
                            <div class="col-lg-10">
                                <h5 class="">Kharismatik 350 Mil</h5>
                                <div class="">Jumlah : <span>1</span></div>
                                <div class="">Rp. 1.000.00<span>/ Pcs</span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <img src="{{asset('assets/img/img-product/product-4.png')}}" width="120px" height="120px">
                            </div>
                            <div class="col-lg-10">
                                <h5 class="">Kharismatik 350 Mil</h5>
                                <div class="">Jumlah : <span>1</span></div>
                                <div class="">Rp. 1.000.00<span>/ Pcs</span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <h5>Status Pengiriman</h5>
                                <div>Dalam Perjalanan</div>
                                <div>Diberitahukan oleh Pegawai Warungislamibogor</div>
                            </div>
                            <div class="col-lg-4">
                                <h5>Jasa Pengiriman</h5>
                                <div>Jne</div>
                                <div>No. Resi <span>0002850363</span></div>
                            </div>
                        </div>
  
                    </div>
                </div>
            </div>
</section>
@endsection

@section('extra_script')
<script type="text/javascript">
    
</script>

@endsection