@extends('frontpage.main-frontpage')

@section('extra_style')
<style type="text/css">
    .ibox-produk {
        padding: 0px;
        position: relative;
    }

    .dataTables_wrapper table thead{
    display:none;
}

    .btn-send-payment {
        color: #fff !important;
        font-size: 12px;
    }

    .ibox-produk img {

        height: 160px;
        width: 100%;
        /*max-width: 240px;*/
        object-fit: cover;
    }

    .btn-proof-payment {
        height: 40px;
        font-weight: 600;
        font-size: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .table-wib thead {
        background: #009a51 !important;
        z-index: 2;
        color: #fff;
        font-size: 12px !important;
    }

    .table-second-wib thead tr th {
        background: #009a51 !important;
        z-index: 2;
        color: #fff;
        font-size: 12px !important;
        text-align: center;
    }

    .table-wib thead tr th {
        background: #009a51 !important;
        font-size: 12px !important;
    }

    .dataTables_info {
        display: none;
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
            <div class="col-lg-2 col-md-3 column-profile-frame--sidebar" style="padding:0;">
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
            <div class="col-lg-10 col-md-9" style="padding:5px;">
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
                                <div id="tab-1" class="tab-pane animated fadeIn tabe-allstatus active">
                                    <form id="">
                                        <div class="row ">
                                            <div class="col-lg-5 mt-4">
                                                <div class="input-group input-daterange">
                                                    <input type="text" id="tanggalawalallstatus"
                                                        name="tanggal_transaksi_awal" value=""
                                                        placeholder="Tanggal Awal"
                                                        class="form-control datepicker c-cart-filter c-pointer fs-12">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-minus"></i>
                                                    </span>
                                                    <input type="text" id="tanggalakhirallstatus"
                                                        name="tanggal_transaksi_akhir" value=""
                                                        placeholder="Tanggal Akhir"
                                                        class="form-control datepicker c-cart-filter c-pointer fs-12">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 d-flex mt-4">
                                                <select name="orderby" id="orderby"
                                                    class="form-control c-cart-filter c-pointer filterbuyallstatus fs-12">
                                                    <option value="-" selected="" disabled="">Urutkan</option>
                                                    <option value="Terbaru">Terbaru</option>
                                                    <option value="Total Belanja">Total Belanja</option>
                                                </select>
                                                <button class="btn bg-transparent c-primary-wib semi-bold fs-12"
                                                    type="button" id="resetallstatus">Reset
                                                    Filter</button>
                                            </div>
                                            <div class="col-lg-4 d-flex mt-4">
                                                <input type="text" placeholder="Cari Berdasarkan Nama Barang"
                                                    class="form-control c-cart-filter fs-12 searchbuyallstatus">
                                                <button class="btn btn-filter-product" type="button"><img
                                                        src="{{asset('assets/img/img-product/img-search.svg')}}"></button>
                                            </div>
                                        </div>
                                    </form>
                                    @if($groupp !='[]')
                                        <table class="table table-striped table-bordered table-hover" style="width: 100%" id="detail_1">
                                            <thead style="opacity: 0;">
                                                <tr>
                                                    <th width="1%">No.</th>
                                                    <th>Nota</th>
                                                    <th>Tanggal Beli</th>
                                                    <th>Customer</th>
                                                    <th>No. HP</th>
                                                    <th>Alamat</th>
                                                    <th>Status</th>
                                                    <th width="15%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    @else
                                    <div class="column-empty-transaction">
                                        <img src="{{asset('assets/img/img-product/empty-transaction.png')}}">
                                        <h5>Oops, Anda Belum Transaksi Sama Sekali.</h5>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{url('/')}}"><button>Cari Produk Sekarang</button></a>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div id="tab-2" class="tab-pane animated fadeIn">
                                    <form id="">
                                        <div class="row ">
                                            <div class="col-lg-5 mt-4">
                                                <div class="input-group input-daterange">
                                                    <input type="text" name="tanggal_transaksi_awal" value=""
                                                        placeholder="Tanggal Awal"
                                                        class="form-control datepicker c-cart-filter c-pointer fs-12"
                                                        id="tanggalawalpaymentstatus">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-minus"></i>
                                                    </span>
                                                    <input type="text" name="tanggal_transaksi_akhir" value=""
                                                        placeholder="Tanggal Akhir"
                                                        class="form-control datepicker c-cart-filter c-pointer fs-12"
                                                        id="tanggalakhirpaymentstatus">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 d-flex mt-4">
                                                <select name="orderby" id="filterbuypaymentstatus"
                                                    class="form-control c-cart-filter c-pointer fs-12">
                                                    <option value="-" selected="" disabled="">Urutkan</option>
                                                    <option value="Terbaru">Terbaru</option>
                                                    <option value="Total Belanja">Total Belanja</option>
                                                </select>
                                                <button class="btn bg-transparent c-primary-wib semi-bold fs-12"
                                                    type="button" id="resetpaymentstatus">Reset
                                                    Filter</button>
                                            </div>
                                            <div class="col-lg-4 d-flex mt-4">
                                                <input type="text" placeholder="Cari Berdasarkan Nama Barang"
                                                    class="form-control c-cart-filter fs-12"
                                                    id="searchbuypaymentstatus">
                                                <button class="btn btn-filter-product" type="button"><img
                                                        src="{{asset('assets/img/img-product/img-search.svg')}}"></button>
                                            </div>
                                        </div>
                                    </form>
                                    @if($groupp !='[]')
                                    <div id="itemproduct-group-paymentstatus">
                                        @foreach($groupp as $row)
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
                                                        data-status="{{$row->sell_status}}"
                                                        data-date="{{$row->sell_date}}"
                                                        data-customer="{{Auth::user()->cm_name}}"
                                                        data-alamat="{{$row->sell_address}}"
                                                        data-totalb="{{$row->totalbeli}}"
                                                        data-provinsi="{{$row->p_nama}}"
                                                        data-kecamatan="{{$row->c_nama}}"
                                                        data-district="{{$row->d_nama}}"
                                                        data-pos="{{$row->sell_postalcode}}"
                                                        data-metode="{{$row->sell_method}}"
                                                        data-hargat="Rp. {{$row->totalbayar}}" data-toggle="modal"
                                                        class="detail"><button
                                                            class="btn btn-view-more-transaction">Lihat
                                                            Detail
                                                            Transaksi</button></a>
                                                    <button class="btn btn-payment-transaction bayar"
                                                        data-nota="{{$row->sell_nota}}" type="button"
                                                        data-toggle="modal" data-target="#modal-bayar">Bayar
                                                        Sekarang</button>
                                                </div>
                                            </div>
                                            @foreach($allstatus as $roww)
                                            @if($roww->sell_nota == $row->sell_nota)
                                            <div class="row column-item-product item-product-paymentstatus">
                                                <div class="col-lg-7">
                                                    <div class="d-flex">
                                                        @foreach($gambar as $image)
                                                        @if($image->sell_nota == $row->sell_nota)
                                                        <img src="env('APP_WIB')}}storage/image/master/produk/{{$image->ip_path}}"
                                                            width="100px" height="100px">
                                                        @endif
                                                        @endforeach
                                                        <div class="padding-0-15">
                                                            <div class="fs-14 semi-bold nameproduct">{{$roww->i_name}}
                                                            </div>
                                                            <div class="fs-14 semi-bold pt-3">{{$roww->sell_nota}}<span>
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
                                                    <label class="label label-primary bg-primary-wib">
                                                        @if($row->sell_status == 'P') Pembayaran
                                                        @elseif($row->sell_status == 'PP') Proses Packing
                                                        @elseif($row->sell_status == 'PS') Packing Selesai
                                                        @elseif($row->sell_status == 'SD') Sedang Dikirim
                                                        @elseif($row->sell_status == 'SB') Sudah Bayar
                                                        @elseif($row->sell_status == 'SP') Sedang Diproses
                                                        @elseif($row->sell_status == 'TS') Sedang Diproses
                                                        @else Unkown
                                                        @endif
                                                    </label>
                                                </div>
                                                <div class="col-lg-3">
                                                    <a
                                                        href="{{route('produk-detail-frontpage', ['code'=>$roww->i_code])}}"><button
                                                            class="btn btn-buy-more-product">Beli Lagi</button></a>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                        @endforeach
                                    </div>
                                    @else
                                    <div class="column-empty-transaction">
                                        <img src="{{asset('assets/img/img-product/empty-transaction.png')}}">
                                        <h5>Oops, Daftar Transaksi Status Pembayaran Anda Kosong.</h5>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{url('/')}}"><button>Cari Produk Sekarang</button></a>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div id="tab-3" class="tab-pane animated fadeIn">
                                    <form id="">
                                        <div class="row ">
                                            <div class="col-lg-5 mt-4">
                                                <div class="input-group input-daterange">
                                                    <input type="text" name="tanggal_transaksi_awal" value=""
                                                        placeholder="Tanggal Awal"
                                                        class="form-control datepicker c-cart-filter c-pointer fs-12" id="tanggalawalprosesstatus">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-minus"></i>
                                                    </span>
                                                    <input type="text" name="tanggal_transaksi_akhir" value=""
                                                        placeholder="Tanggal Akhir"
                                                        class="form-control datepicker c-cart-filter c-pointer fs-12" id="tanggalakhirprosesstatus">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 d-flex mt-4">
                                                <select name="orderby"
                                                    class="form-control c-cart-filter c-pointer fs-12"
                                                    id="filterbuyprosesstatus">
                                                    <option value="-" selected="" disabled="">Urutkan</option>
                                                    <option value="Terbaru">Terbaru</option>
                                                    <option value="Total Belanja">Total Belanja</option>
                                                </select>
                                                <button class="btn bg-transparent c-primary-wib semi-bold fs-12"
                                                    type="button" id="resetprosesstatus">Reset
                                                    Filter</button>
                                            </div>
                                            <div class="col-lg-4 d-flex mt-4">
                                                <input type="text" placeholder="Cari Berdasarkan Nama Barang"
                                                    class="form-control c-cart-filter fs-12" id="searchbuyprosesstatus">
                                                <button class="btn btn-filter-product" type="button"><img
                                                        src="{{asset('assets/img/img-product/img-search.svg')}}"></button>
                                            </div>
                                        </div>
                                    </form>
                                    <h5></h5>
                                    @if($groupprostat > 0)
                                    <div id="itemproduct-group-prosesstatus">
                                        @foreach($group as $row)
                                        @if($row->sell_status == 'SP' || $row->sell_status == 'PS' || $row->sell_status == 'PP' || $row->sell_status == 'TS')
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
                                                        data-status="{{$row->sell_status}}"
                                                        data-date="{{$row->sell_date}}"
                                                        data-customer="{{Auth::user()->cm_name}}"
                                                        data-alamat="{{$row->sell_address}}"
                                                        data-totalb="{{$row->totalbeli}}"
                                                        data-pos="{{$row->sell_postalcode}}"
                                                        data-hargat="Rp. {{$row->totalbayar}}" data-toggle="modal"
                                                        class="detail"><button
                                                            class="btn btn-view-more-transaction">Lihat
                                                            Detail
                                                            Transaksi</button></a>
                                                </div>
                                            </div>
                                            @foreach($allstatus as $roww)
                                            @if($roww->sell_nota == $row->sell_nota)
                                            <div class="row column-item-product item-product-prosesstatus">
                                                <div class="col-lg-7">
                                                    <div class="d-flex">
                                                        @foreach($gambar as $image)
                                                        @if($image->sell_nota == $row->sell_nota)
                                                        <img src="env('APP_WIB')}}storage/image/master/produk/{{$image->ip_path}}"
                                                            width="100px" height="100px">
                                                        @endif
                                                        @endforeach
                                                        <div class="padding-0-15">
                                                            <div class="fs-14 semi-bold nameproduct"> {{$roww->i_name}}
                                                            </div>
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
                                                    <label class="label label-primary bg-primary-wib">
                                                        @if($row->sell_status == 'P') Pembayaran
                                                        @elseif($row->sell_status == 'PP') Proses Packing
                                                        @elseif($row->sell_status == 'PS') Packing Selesai
                                                        @elseif($row->sell_status == 'SD') Sedang Dikirim
                                                        @elseif($row->sell_status == 'SB') Sudah Bayar
                                                        @elseif($row->sell_status == 'SP') Sedang Diproses
                                                        @elseif($row->sell_status == 'TS') Sedang Diproses
                                                        @else Unkown
                                                        @endif
                                                    </label>
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
                                    @else
                                    <div class="column-empty-transaction">
                                        <img src="{{asset('assets/img/img-product/empty-transaction.png')}}">
                                        <h5>Oops, Daftar Transaksi Status Sedang diproses Anda Kosong.</h5>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{url('/')}}"><button>Cari Produk Sekarang</button></a>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div id="tab-4" class="tab-pane animated fadeIn">
                                    <form id="">
                                        <div class="row ">
                                            <div class="col-lg-5 mt-4">
                                                <div class="input-group input-daterange">
                                                    <input type="text" name="tanggal_transaksi_awal" value=""
                                                        placeholder="Tanggal Awal"
                                                        class="form-control datepicker c-cart-filter c-pointer fs-12" id="tanggalawalpengirimantatus">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-minus"></i>
                                                    </span>
                                                    <input type="text" name="tanggal_transaksi_akhir" value=""
                                                        placeholder="Tanggal Akhir"
                                                        class="form-control datepicker c-cart-filter c-pointer fs-12" id="tanggalakhirpengirimantatus">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 d-flex mt-4">
                                                <select name="orderby"
                                                    class="form-control c-cart-filter c-pointer fs-12" id="filterbuypengirimanstatus">
                                                    <option value="-" selected="" disabled="">Urutkan</option>
                                                    <option value="Terbaru">Terbaru</option>
                                                    <option value="Total Belanja">Total Belanja</option>
                                                </select>
                                                <button class="btn bg-transparent c-primary-wib semi-bold fs-12"
                                                    type="button" id="resetpengirimanstatus">Reset
                                                    Filter</button>
                                            </div>
                                            <div class="col-lg-4 d-flex mt-4">
                                                <input type="text" placeholder="Cari Berdasarkan Nama Barang"
                                                    class="form-control c-cart-filter fs-12" id="searchbuypengirimanstatus">
                                                <button class="btn btn-filter-product" type="button"><img
                                                        src="{{asset('assets/img/img-product/img-search.svg')}}"></button>
                                            </div>
                                        </div>
                                    </form>
                                    @if($groupppengstat > 0)
                                    <div id="itemproduct-group-pengirimanstatus">
                                    @foreach($group as $row)
                                    @if($row->sell_status == 'SD')
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
                                                    data-pos="{{$row->sell_postalcode}}"
                                                    data-alamat="{{$row->sell_address}}"
                                                    data-totalb="{{$row->totalbeli}}" data-provinsi="{{$row->p_nama}}"
                                                    data-kecamatan="{{$row->c_nama}}" data-district="{{$row->d_nama}}"
                                                    data-metode="{{$row->sell_method}}"
                                                    data-hargat="Rp. {{$row->totalbayar}}" data-toggle="modal"
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
                                        <div class="row column-item-product item-product-pengirimanstatus">
                                            <div class="col-lg-7">
                                                <div class="d-flex">
                                                    @foreach($gambar as $image)
                                                    @if($image->sell_nota == $row->sell_nota)
                                                    <img src="env('APP_WIB')}}storage/image/master/produk/{{$image->ip_path}}"
                                                        width="100px" height="100px">
                                                    @endif
                                                    @endforeach
                                                    <div class="padding-0-15">
                                                        <div class="fs-14 semi-bold nameproduct"> {{$roww->i_name}}</div>
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
                                                <label class="label label-primary bg-primary-wib">
                                                    @if($row->sell_status == 'P') Pembayaran
                                                    @elseif($row->sell_status == 'PP') Proses Packing
                                                    @elseif($row->sell_status == 'PS') Packing Selesai
                                                    @elseif($row->sell_status == 'SD') Sedang Dikirim
                                                    @elseif($row->sell_status == 'SB') Sudah Bayar
                                                    @elseif($row->sell_status == 'SP') Sedang Diproses
                                                    @elseif($row->sell_status == 'TS') Sedang Diproses
                                                    @else Unkown
                                                    @endif
                                                </label>
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
                                    @else
                                    <div class="column-empty-transaction">
                                        <img src="{{asset('assets/img/img-product/empty-transaction.png')}}">
                                        <h5>Oops, Daftar Transaksi Status Proses Pengiriman Anda Kosong.</h5>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{url('/')}}"><button>Cari Produk Sekarang</button></a>
                                        </div>
                                    </div>
                                    @endif
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
            $('#provinsi').html($(this).data('provinsi'));
            $('#kecamatan').html($(this).data('kecamatan'))
            $('#district').html($(this).data('district'));
            $('#kodepos').html($(this).data('pos'));
            $('#metodepambayaran').html($(this).data('metode'));
            console.log($(this).data('metode'));
            $('#total_barang').html($(this).data('totalb'));
            $('#harga_total').html($(this).data('hargat'));
            console.log(stat);
            if (stat == 'P') {
                $('#status').html('<span class="label label-warning">Pembayaran</span>');
            } else if (stat == 'PP') {
                $('#status').html('<label class="label label-info">Proses Packing</label>');
            } else if (stat == 'PS') {
                $('#status').html('<label class="label label-info">Packing Selesai</label>');
            } else if (stat == 'SD') {
                $('#status').html('<span class="label label-info">Sedang Dikirim</span>');
            } else if (stat == 'SB') {
                $('#status').html('<label class="label label-info">Sudah Bayar</label>');
            } else if (stat == 'SP') {
                $('#status').html('<span class="label label-primary">Sedang Diproses</span>');
            } else if (stat == 'TS') {
                $('#status').html('<span class="label label-success">Transaksi Selesai</span>');
            } else {
                $('#status').html('<span class="label label-success">Unknown</span>');
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
                    }
                },
                columns: [{
                        data: 'daftar',
                        name: 'daftar'
                    },
                    {
                        data: 'namabarang',
                        name: 'namabarang'
                    },
                    {
                        data: 'satuanbarang',
                        name: 'satuanbarang'
                    },
                    {
                        data: 'jumlahbeli',
                        name: 'jumlahbeli'
                    },
                    {
                        data: 'harga',
                        name: 'harga'
                    },
                ],
            });
        });

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
            message: 'Sudah Mengirim Bukti Pembayaran',
        });
        @endif

        var table = $('#detail_1').DataTable({
            responsive: true,
            serverSide: true,
            destroy : true,
            ordering: false,
            bFilter: false, 
            bInfo: false,
            paging : false,
            ajax: {
                url: "{{ route('table_allstatus') }}",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}"
                }
            },
            columns: [
                {data: 'all'},
            ],
            pageLength: 10,
            lengthMenu: [[10, 20, 50, -1], [10, 20, 50, 'All']]
        });

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
        $('.tambahbanner').change(function () {
            readURLtambah(this);
        });

        function readURLtambah(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.img-preview-tambah').find('img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    });
    $(document).ready(function () {
        $('.searchbuyallstatus').keyup(function () {
            // Search text
            var text = $(this).val().toLowerCase();

            // Hide all content class element
            $('.item-product-allstatus').hide();
            // $('.item-product-allstatus .itemproduct-group-allstatus').hide();

            // Search 
            $('.item-product-allstatus .nameproduct').each(function () {
                if ($(this).text().toLowerCase().indexOf("" + text + "") != -1) {
                    $(this).closest('.item-product-allstatus').fadeIn();
                }
            });
        });
    });
    $(document).ready(function () {
        $('.filterbuyallstatus').change(function () {
            var filterstatus = this.value;
            $.ajax({
                url: "{{route('filterallstatus')}}",
                data: {
                    'tanggalawal': $('#tanggalawalallstatus').val(),
                    'tanggalakhir': $('#tanggalakhirallstatus').val(),
                    'sell_date': $('.filterbuyallstatus').val(),
                },
                success: function (data) {
                    console.log(data);
                    document.getElementById('itemproduct-group-allstatus').innerHTML = data;
                }
            });
        });
    });
    $(document).ready(function () {
        $('#tanggalakhirallstatus').change(function () {
            $.ajax({
                url: "{{route('filterdateallstatus')}}",
                data: {
                    'tanggalawal': $('#tanggalawalallstatus').val(),
                    'tanggalakhir': $('#tanggalakhirallstatus').val(),
                    'sell_date': $('.filterbuyallstatus').val(),
                },
                success: function (data) {
                    document.getElementById('itemproduct-group-allstatus').innerHTML = data;
                }
            });
        });
    });
    $(document).ready(function () {
        $('#resetallstatus').click(function () {
            $.ajax({
                url: "{{route('resetallstatus')}}",
                success: function (data) {
                    $('#tanggalawalallstatus').val('');
                    $('#tanggalakhirallstatus').val('');
                    $('.filterbuyallstatus').val('-').trigger('change');
                    document.getElementById('itemproduct-group-allstatus').innerHTML = data;
                }
            })
        });
    });


    $(document).ready(function () {
        $('#searchbuypaymentstatus').keyup(function () {
            // Search text
            var text = $(this).val().toLowerCase();

            // Hide all content class element
            $('.item-product-paymentstatus').hide();

            // Search 
            $('.item-product-paymentstatus .nameproduct').each(function () {
                if ($(this).text().toLowerCase().indexOf("" + text + "") != -1) {
                    $(this).closest('.item-product-paymentstatus').fadeIn();
                }
            });
        });
    });
    $(document).ready(function () {
        $('#filterbuypaymentstatus').change(function () {
            var filterstatus = this.value;
            $.ajax({
                url: "{{route('filter_paymentstatus')}}",
                data: {
                    'tanggalawal': $('#tanggalawalpaymentstatus').val(),
                    'tanggalakhir': $('#tanggalakhirpaymentstatus').val(),
                    'sell_date': $('#filterbuypaymentstatus').val(),
                },
                success: function (data) {
                    console.log(data);
                    document.getElementById('itemproduct-group-paymentstatus').innerHTML =
                        data;
                }
            });
        });
    });
    $(document).ready(function () {
        $('#tanggalakhirpaymentstatus').change(function () {
            $.ajax({
                url: "{{route('filterdate_paymentstatus')}}",
                data: {
                    'tanggalawal': $('#tanggalawalpaymentstatus').val(),
                    'tanggalakhir': $('#tanggalakhirpaymentstatus').val(),
                    'sell_date': $('#filterbuypaymentstatus').val(),
                },
                success: function (data) {
                    document.getElementById('itemproduct-group-paymentstatus').innerHTML =
                        data;
                }
            });
        });
    });
    $(document).ready(function () {
        $('#resetpaymentstatus').click(function () {
            $.ajax({
                url: "{{route('reset_paymentstatus')}}",
                success: function (data) {
                    $('#tanggalawalpaymentstatus').val('');
                    $('#tanggalakhirpaymentstatus').val('');
                    $('#filterbuypaymentstatus').val('-').trigger('change');
                    document.getElementById('itemproduct-group-paymentstatus').innerHTML =
                        data;
                }
            });
        });
    });

    $(document).ready(function () {
        $('#searchbuyprosesstatus').keyup(function () {
            // Search text
            var text = $(this).val().toLowerCase();

            // Hide all content class element
            $('.item-product-prosesstatus').hide();

            // Search 
            $('.item-product-prosesstatus .nameproduct').each(function () {
                if ($(this).text().toLowerCase().indexOf("" + text + "") != -1) {
                    $(this).closest('.item-product-prosesstatus').fadeIn();
                }
            });
        });
    });
    $(document).ready(function () {
        $('#filterbuyprosesstatus').change(function () {
            var filterstatus = this.value;
            $.ajax({
                url: "{{route('filter_prosesstatus')}}",
                data: {
                    'tanggalawal': $('#tanggalawalprosesstatus').val(),
                    'tanggalakhir': $('#tanggalakhirprosesstatus').val(),
                    'sell_date': $('#filterbuyprosesstatus').val(),
                },
                success: function (data) {
                    console.log(data);
                    document.getElementById('itemproduct-group-prosesstatus').innerHTML = data;
                }
            });
        });
    });
    $(document).ready(function () {
        $('#tanggalakhirprosesstatus').change(function () {
            $.ajax({
                url: "{{route('filterdate_prosesstatus')}}",
                data: {
                    'tanggalawal': $('#tanggalawalprosesstatus').val(),
                    'tanggalakhir': $('#tanggalakhirprosesstatus').val(),
                    'sell_date': $('#filterbuyprosesstatus').val(),
                },
                success: function (data) {
                    document.getElementById('itemproduct-group-prosesstatus').innerHTML = data;
                }
            });
        });
    });
    $(document).ready(function () {
        $('#resetprosesstatus').click(function () {
            $.ajax({
                url: "{{route('reset_prosesstatus')}}",
                success: function (data) {
                    $('#tanggalawalprosesstatus').val('');
                    $('#tanggalakhirprosesstatus').val('');
                    $('#filterbuyprosesstatus').val('-').trigger('change');
                    document.getElementById('itemproduct-group-prosesstatus').innerHTML =
                        data;
                }
            });
        });
    });
    $(document).ready(function () {
        $('#searchbuypengirimanstatus').keyup(function () {
            // Search text
            var text = $(this).val().toLowerCase();

            // Hide all content class element
            $('.item-product-pengirimanstatus').hide();

            // Search 
            $('.item-product-pengirimanstatus .nameproduct').each(function () {
                if ($(this).text().toLowerCase().indexOf("" + text + "") != -1) {
                    $(this).closest('.item-product-pengirimanstatus').fadeIn();
                }
            });
        });
    });
    $(document).ready(function () {
        $('#filterbuypengirimanstatus').change(function () {
            var filterstatus = this.value;
            $.ajax({
                url: "{{route('filter_pengirimanstatus')}}",
                data: {
                    'tanggalawal': $('#tanggalawalpengirimantatus').val(),
                    'tanggalakhir': $('#tanggalakhirpengirimantatus').val(),
                    'sell_date': $('#filterbuypengirimanstatus').val(),
                },
                success: function (data) {
                    console.log(data);
                    document.getElementById('itemproduct-group-pengirimanstatus').innerHTML = data;
                }
            });
        });
    });
    $(document).ready(function () {
        $('#tanggalakhirpengirimantatus').change(function () {
            $.ajax({
                url: "{{route('filterdate_pengirimanstatus')}}",
                data: {
                    'tanggalawal': $('#tanggalawalpengirimantatus').val(),
                    'tanggalakhir': $('#tanggalakhirpengirimantatus').val(),
                    'sell_date': $('#filterbuypengirimanstatus').val(),
                },
                success: function (data) {
                    document.getElementById('itemproduct-group-pengirimanstatus').innerHTML = data;
                }
            });
        });
    });
    $(document).ready(function () {
        $('#resetpengirimanstatus').click(function () {
            $.ajax({
                url: "{{route('reset_pengirimanstatus')}}",
                success: function (data) {
                    $('#tanggalawalpengirimantatus').val('');
                    $('#tanggalakhirpengirimantatus').val('');
                    $('#filterbuypengirimanstatus').val('-').trigger('change');
                    document.getElementById('itemproduct-group-pengirimanstatus').innerHTML = data;
                }
            });
        });
    });
</script>
@endsection