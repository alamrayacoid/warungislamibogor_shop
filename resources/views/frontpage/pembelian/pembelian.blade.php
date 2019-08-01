@extends('frontpage.main-frontpage')

@section('extra_style')
<style type="text/css">
    .ibox-produk {
        padding: 0px;
        position: relative;
    }

    .ibox-produk img {

        height: 160px;
        width: 100%;
        /*max-width: 240px;*/
        object-fit: cover;
    }

    @media(max-width: 768px) {
        .ibox-produk img {

            height: auto;
            width: 100%;

            object-fit: cover;
        }
    }

    .d-block {
        display: block;
    }

    .ibox-produk-title {
        padding-left: 30px;
        border-width: 1px 0 0;
    }

    .mb-4 {
        margin-bottom: 1.5rem;
    }

    .ibox-custom {
        border-radius: 5px;
        border: 1px solid transparent;
        box-shadow: 0 0 3px 1px lightgray;
    }

    .ibox-custom .ibox-title {
        border-top: none;
    }

    .shoping-cart-table tbody>tr {
        border-bottom: 1px solid #e9e7e7;
    }

    .input-group.input-daterange {
        width: 100%;
    }

    table.shoping-cart-table tr td:last-child {
        width: unset;
    }

    .tabs-container .nav-tabs li>a {
        margin-right: 0;
    }

    .modal {
        z-index: 9999999 !important;
    }
</style>
@endsection

@section('content')

@include('frontpage.pembelian.modal-detailpembelian')
@include('frontpage.pembelian.modal-detailpengiriman')
@include('frontpage.pembelian.modal-pembayaran')
<section style="margin-top:5em">
    <ol class="breadcrumb breadcumb-header">
        <li><a href="#">Home</a></li>
        <li><a href="">Semua Transaksi</a></li>
    </ol>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-2" style="padding:0;">
                <div class="thumbnail profile-frame--sidebar">
                    <div class="d-flex align-items-center padding-0-15">
                        <img src="/warungislamibogor_shop/storage/image/member/profile/0GxvBYkDNk.png" width="50px"
                            height="50px">
                        <h5 class="title-profile-sidebar">Muhammad Bakhrul Bila Sakhil</h5>
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
                            <a href="" class="c-primary-wib fs-12 semi-bold">Lengkapi Sekarang&ensp;<i
                                    class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <hr>
                    <div class="">
                        <h5 class="heading-section-profile-frame padding-0-15">Daftar Transaksi</h5>
                        <ul class="list-item-profile-sidebar">
                            <a class="c-primary-wib semi-bold" href="">
                                <li>Daftar Pembelian</li>
                            </a>
                            <a class="c-primary-wib semi-bold" href="">
                                <li class="">Pembayaran</li>
                            </a>
                            <a class="c-primary-wib semi-bold" href="">
                                <li>Sedang diproses</li>
                            </a>
                        </ul>
                    </div>
                    <hr>
                    <div class="">
                        <h5 class="heading-section-profile-frame padding-0-15">Pengiriman</h5>
                        <ul class="list-item-profile-sidebar">
                            <a class="c-primary-wib semi-bold" href="">
                                <li>Proses Pengiriman</li>
                            </a>
                        </ul>
                    </div>
                    <hr>
                    <div class="">
                        <h5 class="heading-section-profile-frame padding-0-15">Profile Saya</h5>
                        <ul class="list-item-profile-sidebar">
                            <a class="c-primary-wib semi-bold" href="">
                                <li>Pengaturan</li>
                            </a>
                            <a class="c-primary-wib semi-bold" href="">
                                <li>Barang Favorit</li>
                            </a>
                        </ul>
                    </div>


                </div>
            </div>
            <div class="col-lg-10" sty;e="padding:5px;">
                <div class="thumbnail">
                    <div class="caption p-0">
                        <div class="tabs-container">
                            <ul class="nav nav-tabs nav-tabs-custom">
                                <li class="active">
                                    <a data-toggle="tab" href="#tab-1"><span class="tab-title">Semua Status</span></a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#tab-2"><span class="tab-title">Pembayaran</span></a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#tab-3"><span class="tab-title">Sedang
                                            diproses</span></a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#tab-4"><span class="tab-title">Proses
                                            Pengiriman</span></a>
                                </li>
                            </ul>
                            <div class="tab-content padding-15">
                                <div id="tab-1" class="tab-pane animated fadeIn active">
                                    <form id="">
                                        <div class="row ">
                                            <div class="col-lg-5 mt-4">
                                                <div class="input-group input-daterange">
                                                    <input type="text" name="tanggal_transaksi_awal" value=""
                                                        placeholder="Tanggal Awal"
                                                        class="form-control datepicker c-cart-filter c-pointer fs-12">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-minus"></i>
                                                    </span>
                                                    <input type="text" name="tanggal_transaksi_akhir" value=""
                                                        placeholder="Tanggal Akhir"
                                                        class="form-control datepicker c-cart-filter c-pointer fs-12">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 d-flex mt-4">
                                                <select name="orderby" id="orderby"
                                                    class="form-control c-cart-filter c-pointer fs-12">
                                                    <option value="1" selected="">Terbaru</option>
                                                    <option value="2">Total Belanja</option>
                                                </select>
                                                <button class="btn bg-transparent c-primary-wib semi-bold fs-12"
                                                    type="button">Reset
                                                    Filter</button>
                                            </div>
                                            <div class="col-lg-4 d-flex mt-4">
                                                <input type="text" placeholder="Cari Berdasarkan Nama Barang"
                                                    class="form-control c-cart-filter fs-12">
                                                <button class="btn btn-filter-product" type="button"><img
                                                        src="{{asset('assets/img/img-product/img-search.svg')}}"></button>
                                            </div>
                                        </div>
                                    </form>
                                    @foreach($group as $row)
                                    @if($row->sell_ccustomer == Auth::user()->cm_code)
                                    <div class="column-group-item-product mt-5">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8">
                                                <span class="fs-14 semi-bold">{{$row->sell_nota}}</span><span
                                                    class="text-full-payment-transaction">Total
                                                    Semua
                                                    Barang : <span class="text-full-price-transaction semi-bold"
                                                        id="count">Rp.
                                                        {{$row->totalbayar}}</span></span>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <a data-target="#modal-detail" data-id="{{$row->sell_nota}}"
                                                    data-status="{{$row->sell_status}}" data-date="{{$row->sell_date}}"
                                                    data-customer="{{Auth::user()->cm_name}}"
                                                    data-alamat="{{Auth::user()->cm_address}},  {{$row->sell_address}}"
                                                    data-totalb="{{$row->totalbeli}}"
                                                    data-hargat="Rp. {{$row->sell_total}}" data-toggle="modal"
                                                    class="detail"><button
                                                        class="btn btn-view-more-all-transaction">Lihat Detail
                                                        Transaksi</button></a>
                                            </div>
                                        </div>
                                        @foreach($allstatus as $roww)
                                        @if($roww->sell_nota == $row->sell_nota)
                                        <div class="row column-item-product">
                                            <div class="col-lg-6">
                                                <div class="d-flex">
                                                    @foreach($gambar as $image)
                                                    @if($image->sell_nota == $row->sell_nota)
                                                    <img src="/warungislamibogor/storage/image/master/produk/{{$image->ip_path}}"
                                                        width="100px" height="100px">
                                                    @endif
                                                    @endforeach
                                                    <div class="padding-0-15">
                                                        <div class="fs-14 semi-bold">{{$roww->i_name}}</div>
                                                        <div class="fs-14 semi-bold pt-3">{{$row->sell_nota}}<span>
                                                        </div>
                                                        <div class="fs-14 semi-bold pt-3">
                                                            {{\Carbon\Carbon::parse($row->sell_date)->formatLocalized('%d %B %Y')}}<span
                                                                class="text-full-payment-transaction">Total
                                                                Pembayaran :
                                                                <span class="text-full-price-transaction">Rp.
                                                                    {{$roww->sell_total}}</span></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 text-center">
                                                <label class="label label-primary bg-primary-wib fs-12">
                                                    {{$row->sell_status}}</label>
                                            </div>
                                            <div class="col-lg-4">
                                                <a href="{{route('produk-detail-frontpage')}}?code={{$roww->i_code}}"><button
                                                        class="btn btn-buy-more-product">Beli Lagi</button></a>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                <div id="tab-2" class="tab-pane animated fadeIn">
                                    <form id="">
                                        <div class="row ">
                                            <div class="col-lg-5 mt-4">
                                                <div class="input-group input-daterange">
                                                    <input type="text" name="tanggal_transaksi_awal" value=""
                                                        placeholder="Tanggal Awal"
                                                        class="form-control datepicker c-cart-filter c-pointer fs-12">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-minus"></i>
                                                    </span>
                                                    <input type="text" name="tanggal_transaksi_akhir" value=""
                                                        placeholder="Tanggal Akhir"
                                                        class="form-control datepicker c-cart-filter c-pointer fs-12">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 d-flex mt-4">
                                                <select name="orderby" id="orderby"
                                                    class="form-control c-cart-filter c-pointer fs-12">
                                                    <option value="1" selected="">Terbaru</option>
                                                    <option value="2">Total Belanja</option>
                                                </select>
                                                <button class="btn bg-transparent c-primary-wib semi-bold fs-12"
                                                    type="button">Reset
                                                    Filter</button>
                                            </div>
                                            <div class="col-lg-4 d-flex mt-4">
                                                <input type="text" placeholder="Cari Berdasarkan Nama Barang"
                                                    class="form-control c-cart-filter fs-12">
                                                <button class="btn btn-filter-product" type="button"><img
                                                        src="{{asset('assets/img/img-product/img-search.svg')}}"></button>
                                            </div>
                                        </div>
                                    </form>
                                    @foreach($groupp as $row)
                                    @if($row->sell_ccustomer == Auth::user()->cm_code)
                                    <div class="column-group-item-product mt-5">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8">
                                                <span class="fs-14 semi-bold">{{$row->sell_nota}}</span><span
                                                    class="text-full-payment-transaction">Total
                                                    Semua
                                                    Barang : <span class="text-full-price-transaction">Rp.
                                                        {{$row->sell_total}}</span></span>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <a data-target="#modal-detail" data-id="{{$row->sell_nota}}"
                                                    data-status="{{$row->sell_status}}" data-date="{{$row->sell_date}}"
                                                    data-customer="{{Auth::user()->cm_name}}"
                                                    data-alamat="{{Auth::user()->cm_address}},  {{$row->sell_address}}"
                                                    data-totalb="{{$row->totalbeli}}"
                                                    data-hargat="Rp. {{$row->sell_total}}" data-toggle="modal"
                                                    class="detail"><button class="btn btn-view-more-transaction">Lihat
                                                        Detail
                                                        Transaksi</button></a>
                                                <button class="btn btn-payment-transaction bayar"
                                                    data-nota="{{$row->sell_nota}}" type="button" data-toggle="modal"
                                                    data-target="#modal-bayar">Bayar Sekarang</button>
                                            </div>
                                        </div>
                                        @foreach($allstatus as $roww)
                                        @if($roww->sell_nota == $row->sell_nota)
                                        <div class="row column-item-product">
                                            <div class="col-lg-7">
                                                <div class="d-flex">
                                                    @foreach($gambar as $image)
                                                    @if($image->sell_nota == $row->sell_nota)
                                                    <img src="/warungislamibogor/storage/image/master/produk/{{$image->ip_path}}"
                                                        width="100px" height="100px">
                                                    @endif
                                                    @endforeach
                                                    <div class="padding-0-15">
                                                        <div class="fs-14 semi-bold">{{$roww->i_name}}</div>
                                                        <div class="fs-14 semi-bold pt-3">{{$row->sell_nota}}<span>
                                                        </div>
                                                        <div class="fs-14 semi-bold pt-3">
                                                            {{\Carbon\Carbon::parse($row->sell_date)->formatLocalized('%d %B %Y')}}<span
                                                                class="text-full-payment-transaction">Total
                                                                Pembayaran :
                                                                <span class="text-full-price-transaction">Rp.
                                                                    {{$row->sell_total}}</span></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 text-center">
                                                <label class="label label-primary bg-primary-wib">
                                                {{$roww->sell_status}}</label>
                                            </div>
                                            <div class="col-lg-3">
                                                <a href="{{route('produk-detail-frontpage')}}?code={{$roww->i_code}}"><button
                                                        class="btn btn-buy-more-product">Beli Lagi</button></a>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                <div id="tab-3" class="tab-pane animated fadeIn">
                                
                                    <form id="">
                                        <div class="row ">
                                            <div class="col-lg-5 mt-4">
                                                <div class="input-group input-daterange">
                                                    <input type="text" name="tanggal_transaksi_awal" value=""
                                                        placeholder="Tanggal Awal"
                                                        class="form-control datepicker c-cart-filter c-pointer fs-12">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-minus"></i>
                                                    </span>
                                                    <input type="text" name="tanggal_transaksi_akhir" value=""
                                                        placeholder="Tanggal Akhir"
                                                        class="form-control datepicker c-cart-filter c-pointer fs-12">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 d-flex mt-4">
                                                <select name="orderby" id="orderby"
                                                    class="form-control c-cart-filter c-pointer fs-12">
                                                    <option value="1" selected="">Terbaru</option>
                                                    <option value="2">Total Belanja</option>
                                                </select>
                                                <button class="btn bg-transparent c-primary-wib semi-bold fs-12"
                                                    type="button">Reset
                                                    Filter</button>
                                            </div>
                                            <div class="col-lg-4 d-flex mt-4">
                                                <input type="text" placeholder="Cari Berdasarkan Nama Barang"
                                                    class="form-control c-cart-filter fs-12">
                                                <button class="btn btn-filter-product" type="button"><img
                                                        src="{{asset('assets/img/img-product/img-search.svg')}}"></button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                    @foreach($group as $row)
                                    @if($row->sell_status == 'Sedang Proses' && $row->sell_ccustomer == Auth::user()->cm_code)
                                    <div class="column-group-item-product mt-5">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8">
                                                <span class="fs-14 semi-bold">{{$row->sell_nota}}</span><span
                                                    class="text-full-payment-transaction">Total
                                                    Semua
                                                    Barang : <span class="text-full-price-transaction">Rp.
                                                        {{$row->sell_total}}</span></span>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <a data-target="#modal-detail" data-id="{{$row->sell_nota}}"
                                                    data-status="{{$row->sell_status}}" data-date="{{$row->sell_date}}"
                                                    data-customer="{{Auth::user()->cm_name}}"
                                                    data-alamat="{{Auth::user()->cm_address}},  {{$row->sell_address}}"
                                                    data-totalb="{{$row->totalbeli}}"
                                                    data-hargat="Rp. {{$row->sell_total}}" data-toggle="modal"
                                                    class="detail"><button class="btn btn-view-more-transaction">Lihat
                                                        Detail
                                                        Transaksi</button></a>
                                                <button class="btn btn-payment-transaction bayar"
                                                    data-nota="{{$row->sell_nota}}" type="button" data-toggle="modal"
                                                    data-target="#modal-bayar">Bayar Sekarang</button>
                                            </div>
                                        </div>
                                        @foreach($allstatus as $roww)
                                        @if($roww->sell_nota == $row->sell_nota)
                                        <div class="row column-item-product">
                                            <div class="col-lg-7">
                                                <div class="d-flex">
                                                    @foreach($gambar as $image)
                                                    @if($image->sell_nota == $row->sell_nota)
                                                    <img src="/warungislamibogor/storage/image/master/produk/{{$image->ip_path}}"
                                                        width="100px" height="100px">
                                                    @endif
                                                    @endforeach
                                                    <div class="padding-0-15">
                                                        <div class="fs-14 semi-bold">  {{$roww->i_name}}</div>
                                                        <div class="fs-14 semi-bold pt-3">{{$row->sell_nota}}<span>
                                                        </div>
                                                        <div class="fs-14 semi-bold pt-3">{{\Carbon\Carbon::parse($row->sell_date)->formatLocalized('%d %B %Y')}}<span
                                                                class="text-full-payment-transaction">Total
                                                                Pembayaran :
                                                                <span class="text-full-price-transaction">Rp. {{$roww->sell_total}}</span></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 text-center">
                                                <label class="label label-primary bg-primary-wib">
                                                {{$roww->sell_status}}</label>
                                            </div>
                                            <div class="col-lg-3">
                                                <button class="btn btn-buy-more-product">Beli Lagi</button>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                <div id="tab-4" class="tab-pane animated fadeIn">
                                    <form id="">
                                        <div class="row ">
                                            <div class="col-lg-5 mt-4">
                                                <div class="input-group input-daterange">
                                                    <input type="text" name="tanggal_transaksi_awal" value=""
                                                        placeholder="Tanggal Awal"
                                                        class="form-control datepicker c-cart-filter c-pointer fs-12">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-minus"></i>
                                                    </span>
                                                    <input type="text" name="tanggal_transaksi_akhir" value=""
                                                        placeholder="Tanggal Akhir"
                                                        class="form-control datepicker c-cart-filter c-pointer fs-12">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 d-flex mt-4">
                                                <select name="orderby" id="orderby"
                                                    class="form-control c-cart-filter c-pointer fs-12">
                                                    <option value="1" selected="">Terbaru</option>
                                                    <option value="2">Total Belanja</option>
                                                </select>
                                                <button class="btn bg-transparent c-primary-wib semi-bold fs-12"
                                                    type="button">Reset
                                                    Filter</button>
                                            </div>
                                            <div class="col-lg-4 d-flex mt-4">
                                                <input type="text" placeholder="Cari Berdasarkan Nama Barang"
                                                    class="form-control c-cart-filter fs-12">
                                                <button class="btn btn-filter-product" type="button"><img
                                                        src="{{asset('assets/img/img-product/img-search.svg')}}"></button>
                                            </div>
                                        </div>
                                    </form>
                                    @foreach($group as $row)
                                    @if($row->sell_status == 'Sedang Dikirim' && $row->sell_ccustomer == Auth::user()->cm_code)
                                    <div class="column-group-item-product mt-5">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8">
                                                <span class="fs-14 semi-bold">{{$row->sell_nota}}</span><span
                                                    class="text-full-payment-transaction">Total
                                                    Semua
                                                    Barang : <span class="text-full-price-transaction">Rp.
                                                        {{$row->sell_total}}</span></span>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <a data-target="#modal-detail" data-id="{{$row->sell_nota}}"
                                                    data-status="{{$row->sell_status}}" data-date="{{$row->sell_date}}"
                                                    data-customer="{{Auth::user()->cm_name}}"
                                                    data-alamat="{{Auth::user()->cm_address}},  {{$row->sell_address}}"
                                                    data-totalb="{{$row->totalbeli}}"
                                                    data-hargat="Rp. {{$row->sell_total}}" data-toggle="modal"
                                                    class="detail"><button class="btn btn-view-more-transaction">Lihat
                                                        Detail
                                                        Transaksi</button></a>
                                                <button class="btn btn-delivery-transaction" type="button"
                                                    data-toggle="modal" data-target="#modal-pengiriman">Lacak
                                                    Pengiriman</button>
                                            </div>
                                        </div>
                                        @foreach($allstatus as $roww)
                                        @if($roww->sell_nota == $row->sell_nota)
                                        <div class="row column-item-product">
                                            <div class="col-lg-7">
                                                <div class="d-flex">
                                                @foreach($gambar as $image)
                                                @if($image->sell_nota == $row->sell_nota)
                                                    <img src="/warungislamibogor/storage/image/master/produk/{{$image->ip_path}}"
                                                        width="100px" height="100px">
                                                @endif
                                                @endforeach
                                                    <div class="padding-0-15">
                                                        <div class="fs-14 semi-bold"> {{$roww->i_name}}</div>
                                                        <div class="fs-14 semi-bold pt-3">{{$row->sell_nota}}<span>
                                                        </div>
                                                        <div class="fs-14 semi-bold pt-3">{{\Carbon\Carbon::parse($row->sell_date)->formatLocalized('%d %B %Y')}}<span
                                                                class="text-full-payment-transaction">Total
                                                                Pembayaran :
                                                                <span class="text-full-price-transaction">Rp.  {{$roww->sell_total}}</span></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 text-center">
                                                <label class="label label-primary bg-primary-wib">
                                                {{$roww->sell_status}}</label>
                                            </div>
                                            <div class="col-lg-3">
                                                <button class="btn btn-buy-more-product">Beli Lagi</button>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                    @endif
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('extra_script')
<script type="text/javascript">
    $(document).ready(function () {

        var totall = $('.total').length;

        $(document).on('click', '.detail', function () {
            var nota = $(this).data('id');
            console.log(nota);
            var stat = $(this).data('status');
            $('#nota').html(nota);
            $('#notaa').val(nota);
            $('#date').html($(this).data('date'));
            $('#customer').html($(this).data('customer'));
            $('#alamat').html($(this).data('alamat'));
            $('#total_barang').html($(this).data('totalb'));
            $('#harga_total').html($(this).data('hargat'));
            console.log(stat);
            if (stat == 'Pembayaran') {
                $('#status').html('<span class="label label-warning">Pembayaran</span>');
            } else if (stat == 'Sedang Dikirim') {
                $('#status').html('<span class="label label-info">Sedang Dikirim</span>');
            } else if (stat == 'Sedang Proses') {
                $('#status').html('<span class="label label-primary">Sedang Diproses</span>');
            } else if (stat == 'Transaksi Selesai') {
                $('#status').html('<span class="label label-success">Transaksi Selesai</span>');
            } else {
                $('#status').html('<span class="label label-success">Transaksi Selesai</span>');
            }
            var table2 = $('#table_detail').DataTable({
                responsive: true,
                serverSide: true,
                destroy: true,
                paging: false,
                filter: false,
                ajax: {
                    url: "{{ route('detail.pembayaran') }}",
                    type: "post",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'nota': nota,
                    }
                },
                columns: [{
                        data: 'daftar',
                        name: 'daftar'
                    },
                    {
                        data: 'harga',
                        name: 'harga'
                    },
                ],
            })

        })

        @if(Session::get('success'))
        iziToast.success({
            title: 'Berhasil!',
            message: 'Mengupload Bukti Bayar',
        });
        @endif
        @if(Session::get('error'))
        iziToast.error({
            title: 'Error!',
            message: 'Mengupload Bukti Bayar',
        });
        @endif
        @if(Session::get('many'))
        iziToast.warning({
            title: 'Peringatan!',
            message: 'sudah ada Bukti Bayar',
        });
        @endif


        $('.bayar').on('click', function () {
            var nota = $(this).data('nota');
            var isi = $('#cnota');
            if (isi.val() != '') {
                $('#cnota').val('#');
                $('#cnota').val(nota);
            } else {
                $('#cnota').val(nota);
            }
        })

        $('#ncart').html($('.ncart').length);

        var url_string = window.location.href;
        var url = new URL(url_string);
        var status = url.searchParams.get("status");

        if (status) {
            $('.tabs-container').find('[href="#tab-' + status + '"]').tab('show');
        }
        console.log(status);

        $('.input-daterange').datepicker();

        $('[name="foto"]').change(function () {
            readURL(this);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $(input).parents('.form-group').find('img').attr('src', e.target.result);
                    $(input).parents('.form-group').find('a').attr('href', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

    });
</script>
@endsection