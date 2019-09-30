@extends('frontpage.main-frontpage')

@section('extra_style')
<style type="text/css">
    .ibox-produk {
        padding: 0px;
        position: relative;
    }

    #detail_1_wrapper table tbody tr td {
        border-top: 0 !important;
    }

    .dataTables_wrapper table thead {
        display: none;
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
        border-bottom-width: 0 !important;
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






    .table tbody tr {
        background: white !important;
    }

    .table tbody tr td {
        border-top: 0 !important;
    }

    .table {
        border: 0 !important;
    }
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
            <div class="col-lg-10 col-md-9" style="padding:0 5px;">
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
                                        <div class="row">
                                            <div class="col-lg-5 mt-4">
                                                <div class="input-group input-daterange">
                                                    <input type="text" id="tanggalawalallstatus"
                                                        name="tanggal_transaksi_awal" value=""
                                                        placeholder="Tanggal Awal"
                                                        class="form-control datepicker c-cart-filter c-pointer fs-12 tanggal_awal">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-minus"></i>
                                                    </span>
                                                    <input type="text" id="tanggalakhirallstatus"
                                                        name="tanggal_transaksi_akhir" value=""
                                                        placeholder="Tanggal Akhir"
                                                        class="form-control datepicker c-cart-filter c-pointer fs-12 tanggal_akhir">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 d-flex mt-4">
                                                <select name="orderby" id="orderby"
                                                    class="form-control c-cart-filter c-pointer category fs-12">
                                                    <option value="-" selected="" disabled="">Urutkan</option>
                                                    <option value="Terbaru">Terbaru</option>
                                                    <option value="Total Belanja">Total Belanja</option>
                                                </select>
                                                <button class="btn bg-transparent c-primary-wib semi-bold fs-12 reset"
                                                    type="button" id="resetallstatus">Reset
                                                    Filter</button>
                                            </div>
                                            <div class="col-lg-4 d-flex mt-4">
                                                <input type="text" placeholder="Cari Berdasarkan Nama Barang"
                                                    class="form-control c-cart-filter fs-12 produk">
                                                <button class="btn btn-filter-product btn-filter-product-name" type="button"><img
                                                        src="{{asset('assets/img/img-product/img-search.svg')}}"></button>
                                            </div>
                                        </div>
                                    </form>
                                    @if($group !='[]')
                                    <div id="itemproduct-group-paymentstatus" class="row">
                                        
                                        <table class="table table-striped table-bordered table-hover" id="detail_1"
                                            style="width: 100%">
                                            <thead style="opacity: 0; position: absolute;">
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
                                    </div>
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
                                        <div class="row">
                                            <div class="col-lg-5 mt-4">
                                                <div class="input-group input-daterange">
                                                    <input type="text" name="tanggal_transaksi_awal" value=""
                                                        placeholder="Tanggal Awal"
                                                        class="form-control datepicker c-cart-filter c-pointer fs-12 tanggal_awal"
                                                        id="tanggalawalpaymentstatus">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-minus"></i>
                                                    </span>
                                                    <input type="text" name="tanggal_transaksi_akhir" value=""
                                                        placeholder="Tanggal Akhir"
                                                        class="form-control datepicker c-cart-filter c-pointer fs-12 tanggal_akhir"
                                                        id="tanggalakhirpaymentstatus">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 d-flex mt-4">
                                                <select name="orderby" id="filterbuypaymentstatus"
                                                    class="form-control c-cart-filter c-pointer fs-12 category">
                                                    <option value="-" selected="" disabled="">Urutkan</option>
                                                    <option value="Terbaru">Terbaru</option>
                                                    <option value="Total Belanja">Total Belanja</option>
                                                </select>
                                                <button class="btn bg-transparent c-primary-wib semi-bold fs-12 reset"
                                                    type="button" id="resetpaymentstatus">Reset
                                                    Filter</button>
                                            </div>
                                            <div class="col-lg-4 d-flex mt-4">
                                                <input type="text" placeholder="Cari Berdasarkan Nama Barang"
                                                    class="form-control c-cart-filter fs-12 produk"
                                                    id="searchbuypaymentstatus">
                                                <button class="btn btn-filter-product" type="button"><img
                                                        src="{{asset('assets/img/img-product/img-search.svg')}}"></button>
                                            </div>
                                        </div>
                                    </form>
                                    @if($groupp !='[]')
                                    <div id="itemproduct-group-paymentstatus" class="">
                                        <table class="table table-striped table-bordered table-hover" id="detail_2"
                                            style="width: 100%">
                                            <thead style="opacity: 0; position: absolute;">
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
                                        <div class="row">
                                            <div class="col-lg-5 mt-4">
                                                <div class="input-group input-daterange">
                                                    <input type="text" name="tanggal_transaksi_awal" value=""
                                                        placeholder="Tanggal Awal"
                                                        class="form-control datepicker c-cart-filter c-pointer fs-12 tanggal_awal"
                                                        id="tanggalawalprosesstatus">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-minus"></i>
                                                    </span>
                                                    <input type="text" name="tanggal_transaksi_akhir" value=""
                                                        placeholder="Tanggal Akhir"
                                                        class="form-control datepicker c-cart-filter c-pointer fs-12 tanggal_akhir"
                                                        id="tanggalakhirprosesstatus">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 d-flex mt-4">
                                                <select name="orderby"
                                                    class="form-control c-cart-filter c-pointer fs-12 category"
                                                    id="filterbuyprosesstatus">
                                                    <option value="-" selected="" disabled="">Urutkan</option>
                                                    <option value="Terbaru">Terbaru</option>
                                                    <option value="Total Belanja">Total Belanja</option>
                                                </select>
                                                <button class="btn bg-transparent c-primary-wib semi-bold fs-12 reset"
                                                    type="button" id="resetprosesstatus">Reset
                                                    Filter</button>
                                            </div>
                                            <div class="col-lg-4 d-flex mt-4">
                                                <input type="text" placeholder="Cari Berdasarkan Nama Barang"
                                                    class="form-control c-cart-filter fs-12 produk"
                                                    id="searchbuyprosesstatus">
                                                <button class="btn btn-filter-product" type="button"><img
                                                        src="{{asset('assets/img/img-product/img-search.svg')}}"></button>
                                            </div>
                                        </div>
                                    </form>
                                    <h5></h5>
                                    @if($groupprostat > 0)
                                    <div id="itemproduct-group-prosesstatus">
                                        <table class="table table-striped table-bordered table-hover" id="detail_3"
                                            style="width: 100%">
                                            <thead style="opacity: 0; position: absolute;">
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
                                        <div class="row">
                                            <div class="col-lg-5 mt-4">
                                                <div class="input-group input-daterange">
                                                    <input type="text" name="tanggal_transaksi_awal" value=""
                                                        placeholder="Tanggal Awal"
                                                        class="form-control datepicker c-cart-filter c-pointer fs-12 tanggal_awal"
                                                        id="tanggalawalpengirimantatus">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-minus"></i>
                                                    </span>
                                                    <input type="text" name="tanggal_transaksi_akhir" value=""
                                                        placeholder="Tanggal Akhir"
                                                        class="form-control datepicker c-cart-filter c-pointer fs-12 tanggal_akhir"
                                                        id="tanggalakhirpengirimantatus">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 d-flex mt-4">
                                                <select name="orderby"
                                                    class="form-control c-cart-filter c-pointer fs-12 category"
                                                    id="filterbuypengirimanstatus">
                                                    <option value="-" selected="" disabled="">Urutkan</option>
                                                    <option value="Terbaru">Terbaru</option>
                                                    <option value="Total Belanja">Total Belanja</option>
                                                </select>
                                                <button class="btn bg-transparent c-primary-wib semi-bold fs-12 reset"
                                                    type="button" id="resetpengirimanstatus">Reset
                                                    Filter</button>
                                            </div>
                                            <div class="col-lg-4 d-flex mt-4">
                                                <input type="text" placeholder="Cari Berdasarkan Nama Barang"
                                                    class="form-control c-cart-filter fs-12 produk"
                                                    id="searchbuypengirimanstatus">
                                                <button class="btn btn-filter-product" type="button"><img
                                                        src="{{asset('assets/img/img-product/img-search.svg')}}"></button>
                                            </div>
                                        </div>
                                    </form>
                                    @if($groupppengstat > 0)
                                    <div id="itemproduct-group-pengirimanstatus">
                                        <table class="table table-striped table-bordered table-hover" id="detail_4"
                                            style="width: 100%">
                                            <thead style="opacity: 0; position: absolute;">
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

                                    <!-- jangan dihapus -->
                                    <!-- end -->
                                </div>
                            </div>
                        </div>
</section>
@endsection

@section('extra_script')
<script type="text/javascript">
    $(document).ready(function () {
        var awal, akhir, category, produk;

        $('#tab-1').on('change', '.tanggal_awal', function () {
            awal = $(this).val();
            get_table1();
        })

        $('#tab-1').on('change', '.tanggal_akhir', function () {
            akhir = $(this).val();
            get_table1();
        })

        $('#tab-1').on('change', '.category', function () {
            category = $(this).val();
            get_table1();
        })

        $('#tab-1').on('keyup', '.produk', function () {
            produk = $(this).val();
            get_table1();
        })

        $('#tab-1').on('click', '.reset', function () {
            awal = '';
            akhir = '';
            category = '';
            produk = '';
            table1.ajax.reload();
        })

        $('#tab-2').on('change', '.tanggal_awal', function () {
            awal = $(this).val();
            get_table2();
        })

        $('#tab-2').on('change', '.tanggal_akhir', function () {
            akhir = $(this).val();
            get_table2();
        })

        $('#tab-2').on('change', '.category', function () {
            category = $(this).val();
            get_table2();
        })

        $('#tab-2').on('keyup', '.produk', function () {
            produk = $(this).val();
            get_table2();
        })

        $('#tab-2').on('click', '.reset', function () {
            awal = '';
            akhir = '';
            category = '';
            produk = '';
            table2.ajax.reload();
        })

        $('#tab-3').on('change', '.tanggal_awal', function () {
            awal = $(this).val();
            get_table3();
        })

        $('#tab-3').on('change', '.tanggal_akhir', function () {
            akhir = $(this).val();
            get_table3();
        })

        $('#tab-3').on('change', '.category', function () {
            category = $(this).val();
            get_table3();
        })

        $('#tab-3').on('keyup', '.produk', function () {
            produk = $(this).val();
            get_table3();
        })

        $('#tab-3').on('click', '.reset', function () {
            awal = '';
            akhir = '';
            category = '';
            produk = '';
            table3.ajax.reload();
        })

        $('#tab-4').on('change', '.tanggal_awal', function () {
            awal = $(this).val();
            get_table4();
        })

        $('#tab-4').on('change', '.tanggal_akhir', function () {
            akhir = $(this).val();
            get_table4();
        })

        $('#tab-4').on('change', '.category', function () {
            category = $(this).val();
            get_table4();
        })

        $('#tab-4').on('keyup', '.produk', function () {
            produk = $(this).val();
            get_table4();
        })

        $('#tab-4').on('click', '.reset', function () {
            awal = '';
            akhir = '';
            category = '';
            produk = '';
            table4.ajax.reload();
        })

        var totall = $('.total').length;
        $('#detail_1').on('click', '.detail_transaksi[data-id]', function (e) {
            e.preventDefault();
            var url = $(this).data('id');
            $.ajax({
                url: url,
                type: 'GET',
                datatype: 'json',
                success: function (data) {
                    console.log(data.p_name);
                    $('#date').text(data.datas.s_date);
                    $('#nota').text(data.datas.s_nota);
                    $('#customer').text(data.datas.cm_name);
                    $('#provinsi').text(data.datas.p_nama);
                    $('#kecamatan').text(data.datas.c_nama);
                    $('#district').text(data.datas.d_nama);
                    $('#alamat').text(data.datas.s_address);
                    $('#kodepos').text(data.datas.s_postalcode);
                    $('#harga_total').html('Rp. ' + accounting.formatNumber(data.datas
                        .s_total));
                    var dataagenda = data.item;
                    var trHTML = '';
                    $.each(dataagenda, function (i, item) {
                        trHTML += '<tr><td>' + item.i_name + '</td><td>' + item
                            .iu_name + '</td><td class="jumlahbarang">' + item
                            .sd_qty + '</td><td class="text-right">Rp. ' + item
                            .ipr_sunitprice + '</td></tr>';
                    });
                    $('#tabledetailtransaksi tbody').html(trHTML);
                    $('#modal-detail').modal('show');
                    var total = 0;
                    $('.jumlahbarang').each(function () {
                        var ini = $(this).text();
                        total += parseInt(ini);
                    });
                    $('#jumlahbarang').text(total);
                    if (data.datas.s_paymethod == 'N') {
                        $('#metodepambayaran').text('Tempo');
                    } else {
                        $('#metodepambayaran').text('Tunai');
                    }
                }
            });
        });
        $('#detail_2').on('click', '.detail_transaksi[data-id]', function (e) {
            e.preventDefault();
            var url = $(this).data('id');
            $.ajax({
                url: url,
                type: 'GET',
                datatype: 'json',
                success: function (data) {
                    console.log(data.p_name);
                    $('#date').text(data.datas.s_date);
                    $('#nota').text(data.datas.s_nota);
                    $('#customer').text(data.datas.cm_name);
                    $('#provinsi').text(data.datas.p_nama);
                    $('#kecamatan').text(data.datas.c_nama);
                    $('#district').text(data.datas.d_nama);
                    $('#alamat').text(data.datas.s_address);
                    $('#kodepos').text(data.datas.s_postalcode);
                    $('#harga_total').html('Rp. ' + accounting.formatNumber(data.datas
                        .s_total));
                    var dataagenda = data.item;
                    var trHTML = '';
                    $.each(dataagenda, function (i, item) {
                        trHTML += '<tr><td>' + item.i_name + '</td><td>' + item
                            .iu_name + '</td><td class="jumlahbarang">' + item
                            .sd_qty + '</td><td class="text-right">Rp. ' + item
                            .ipr_sunitprice + '</td></tr>';
                    });
                    $('#tabledetailtransaksi tbody').html(trHTML);
                    $('#modal-detail').modal('show');
                    var total = 0;
                    $('.jumlahbarang').each(function () {
                        var ini = $(this).text();
                        total += parseInt(ini);
                    });
                    $('#jumlahbarang').text(total);
                    if (data.datas.s_paymethod == 'N') {
                        $('#metodepambayaran').text('Tempo');
                    } else {
                        $('#metodepambayaran').text('Tunai');
                    }
                }
            });
        });
        $('#detail_4').on('click', '.detail_transaksi[data-id]', function (e) {
            e.preventDefault();
            var url = $(this).data('id');
            $.ajax({
                url: url,
                type: 'GET',
                datatype: 'json',
                success: function (data) {
                    console.log(data.p_name);
                    $('#date').text(data.datas.s_date);
                    $('#nota').text(data.datas.s_nota);
                    $('#customer').text(data.datas.cm_name);
                    $('#provinsi').text(data.datas.p_nama);
                    $('#kecamatan').text(data.datas.c_nama);
                    $('#district').text(data.datas.d_nama);
                    $('#alamat').text(data.datas.s_address);
                    $('#kodepos').text(data.datas.s_postalcode);
                    $('#harga_total').html('Rp. ' + accounting.formatNumber(data.datas
                        .s_total));
                    var dataagenda = data.item;
                    var trHTML = '';
                    $.each(dataagenda, function (i, item) {
                        trHTML += '<tr><td>' + item.i_name + '</td><td>' + item
                            .iu_name + '</td><td class="jumlahbarang">' + item
                            .sd_qty + '</td><td class="text-right">Rp. ' + item
                            .ipr_sunitprice + '</td></tr>';
                    });
                    $('#tabledetailtransaksi tbody').html(trHTML);
                    $('#modal-detail').modal('show');
                    var total = 0;
                    $('.jumlahbarang').each(function () {
                        var ini = $(this).text();
                        total += parseInt(ini);
                    });
                    $('#jumlahbarang').text(total);
                    if (data.datas.s_paymethod == 'N') {
                        $('#metodepambayaran').text('Tempo');
                    } else {
                        $('#metodepambayaran').text('Tunai');
                    }
                }
            });
        });
        $('#detail_3').on('click', '.detail_transaksi[data-id]', function (e) {
            e.preventDefault();
            var url = $(this).data('id');
            $.ajax({
                url: url,
                type: 'GET',
                datatype: 'json',
                success: function (data) {
                    console.log(data.p_name);
                    $('#date').text(data.datas.s_date);
                    $('#nota').text(data.datas.s_nota);
                    $('#customer').text(data.datas.cm_name);
                    $('#provinsi').text(data.datas.p_nama);
                    $('#kecamatan').text(data.datas.c_nama);
                    $('#district').text(data.datas.d_nama);
                    $('#alamat').text(data.datas.s_address);
                    $('#kodepos').text(data.datas.s_postalcode);
                    $('#harga_total').html('Rp. ' + accounting.formatNumber(data.datas
                        .s_total));
                    var dataagenda = data.item;
                    var trHTML = '';
                    $.each(dataagenda, function (i, item) {
                        trHTML += '<tr><td>' + item.i_name + '</td><td>' + item
                            .iu_name + '</td><td class="jumlahbarang">' + item
                            .sd_qty + '</td><td class="text-right">Rp. ' + item
                            .ipr_sunitprice + '</td></tr>';
                    });
                    $('#tabledetailtransaksi tbody').html(trHTML);
                    $('#modal-detail').modal('show');
                    var total = 0;
                    $('.jumlahbarang').each(function () {
                        var ini = $(this).text();
                        total += parseInt(ini);
                    });
                    $('#jumlahbarang').text(total);
                    if (data.datas.s_paymethod == 'N') {
                        $('#metodepambayaran').text('Tempo');
                    } else {
                        $('#metodepambayaran').text('Tunai');
                    }
                }
            });
        })
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
            } else if (stat == 'T') {
                $('#status').html('<span class="label label-success">Pengiriman Terlambat</span>');
            } else if (stat == 'D') {
                $('#status').html('<span class="label label-danger">Ditolak</span>');
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

        function get_table1() {
            $('#detail_1').DataTable({
                responsive: true,
                serverSide: true,
                destroy: true,
                ordering: false,
                bFilter: false,
                bInfo: false,
                paging: false,
                ajax: {
                    url: "{{ route('table_allstatus') }}",
                    type: "post",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'tanggal_transaksi_awal': awal,
                        'tanggal_transaksi_akhir': akhir,
                        'produk': produk,
                        'category': category
                    }
                },
                columns: [{
                    data: 'all'
                }, ],
                pageLength: 10,
                lengthMenu: [
                    [10, 20, 50, -1],
                    [10, 20, 50, 'All']
                ]
            });
        }

        function get_table2() {
            $('#detail_2').DataTable({
                responsive: true,
                serverSide: true,
                destroy: true,
                ordering: false,
                bFilter: false,
                bInfo: false,
                paging: false,
                ajax: {
                    url: "{{ route('table_pembayaran') }}",
                    type: "post",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'tanggal_transaksi_awal': awal,
                        'tanggal_transaksi_akhir': akhir,
                        'produk': produk,
                        'category': category
                    }
                },
                columns: [{
                    data: 'all'
                }, ],
                pageLength: 10,
                lengthMenu: [
                    [10, 20, 50, -1],
                    [10, 20, 50, 'All']
                ]
            });
        }

        function get_table3() {
            $('#detail_3').DataTable({
                responsive: true,
                serverSide: true,
                destroy: true,
                ordering: false,
                bFilter: false,
                bInfo: false,
                paging: false,
                ajax: {
                    url: "{{ route('table_proses') }}",
                    type: "post",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'tanggal_transaksi_awal': awal,
                        'tanggal_transaksi_akhir': akhir,
                        'produk': produk,
                        'category': category
                    }
                },
                columns: [{
                    data: 'all'
                }, ],
                pageLength: 10,
                lengthMenu: [
                    [10, 20, 50, -1],
                    [10, 20, 50, 'All']
                ]
            });
        }

        function get_table4() {
            $('#detail_4').DataTable({
                responsive: true,
                serverSide: true,
                destroy: true,
                ordering: false,
                bFilter: false,
                bInfo: false,
                paging: false,
                ajax: {
                    url: "{{ route('table_pengiriman') }}",
                    type: "post",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'tanggal_transaksi_awal': awal,
                        'tanggal_transaksi_akhir': akhir,
                        'produk': produk,
                        'category': category
                    }
                },
                columns: [{
                    data: 'all'
                }, ],
                pageLength: 10,
                lengthMenu: [
                    [10, 20, 50, -1],
                    [10, 20, 50, 'All']
                ]
            });
        }

        var table1 = $('#detail_1').DataTable({
            responsive: true,
            serverSide: true,
            destroy: true,
            ordering: false,
            bFilter: false,
            bInfo: false,
            paging: false,
            ajax: {
                url: "{{ route('table_allstatus') }}",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                }
            },
            columns: [{
                data: 'all'
            }, ],
            pageLength: 10,
            lengthMenu: [
                [10, 20, 50, -1],
                [10, 20, 50, 'All']
            ]
        });

        var table2 = $('#detail_2').DataTable({
            responsive: true,
            serverSide: true,
            destroy: true,
            ordering: false,
            bFilter: false,
            bInfo: false,
            paging: false,
            ajax: {
                url: "{{ route('table_pembayaran') }}",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}"

                }
            },
            columns: [{
                data: 'all'
            }, ],
            pageLength: 10,
            lengthMenu: [
                [10, 20, 50, -1],
                [10, 20, 50, 'All']
            ]
        });

        var table3 = $('#detail_3').DataTable({
            responsive: true,
            serverSide: true,
            destroy: true,
            ordering: false,
            bFilter: false,
            bInfo: false,
            paging: false,
            ajax: {
                url: "{{ route('table_proses') }}",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}"

                }
            },
            columns: [{
                data: 'all'
            }, ],
            pageLength: 10,
            lengthMenu: [
                [10, 20, 50, -1],
                [10, 20, 50, 'All']
            ]
        });

        var table4 = $('#detail_4').DataTable({
            responsive: true,
            serverSide: true,
            destroy: true,
            ordering: false,
            bFilter: false,
            bInfo: false,
            paging: false,
            ajax: {
                url: "{{ route('table_pengiriman') }}",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}"

                }
            },
            columns: [{
                data: 'all'
            }, ],
            pageLength: 10,
            lengthMenu: [
                [10, 20, 50, -1],
                [10, 20, 50, 'All']
            ]
        });

        $('#detail_2').on('click', '.bayar', function () {
            var nota = $(this).data('nota');
            var isi = $('#cnota');
            if (isi.val() != '') {
                $('#cnota').val('');
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

        function appendini() {
            var appendini = '<div class="column-group-item-product mt-3 append-js-animate">' +
                '<div class="row">' +
                '<div class="col-lg-5">' +
                '<div class="text">' +
                '<div class="text-line" style="width:220px;"> </div>' +
                '<div class="text-line"style="position:relative;top:0.7em;width:170px;"></div>' +
                '</div>' +
                '</div>' +
                '<div class="col-lg-2">' +
                '<div class="text">' +
                '<div class="text-line" style="width:120px;"> </div>' +
                '<div class="text-line"style="position:relative;top:0.7em;width:90px;"></div>' +
                '</div>' +
                '</div>' +
                '<div class="col-lg-2">' +
                '<div class="text">' +
                '<div class="text-line" style="width:120px;"> </div>' +
                '<div class="text-line"style="position:relative;top:0.7em;width:90px;"></div>' +
                '</div>' +
                '</div>' +
                '<div class="col-lg-3">' +
                '<div class="text">' +
                '<div class="text-line" style="width:150px;"> </div>' +
                '<div class="text-line"style="position:relative;top:0.7em;width:100px;"></div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="row"style="margin-top:2em;padding-top:2em;border-top:1px solid #efeff4;">' +
                '<div class="col-lg-4">' +
                '<div class="wrapper-cell">' +
                '<div class="image"></div>' +
                '<div class="text" style="margin-left:20px;">' +
                '<div class="text-line" style="width:60px;"> </div>' +
                '<div class="text-line"style="position:relative;top:0.7em;width:120px;"></div>' +
                '<div class="text-line" style="position:relative;top:1.4em;width:170px;"></div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="col-lg-6 d-flex justify-content-center">' +
                '<div class="text">' +
                '<div class="text-line" style="width:200px;"> </div>' +
                '<div class="text-line"style="position:relative;top:0.7em;width:110px;"></div>' +
                '</div>' +
                '</div>' +
                '<div class="col-lg-2">' +
                '<div class="text">' +
                '<div class="text-line" style="width:100px;"> </div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';

            if ($(".append-js-animate").length == 1)
                $('.append-js-animate').replaceWith(appendini);
            else
                $('#itemproduct-group-paymentstatus').append(appendini);
        }
    });
        $('#detail_4').on('click', '#detail_pengiriman[data-detail]', function (e) {
            e.preventDefault();
            var url = $(this).data('detail');
            $.ajax({
                url: url,
                type: 'GET',
                datatype: 'json',
                success: function (response) {
                    jQuery('#ekspedisi').text(response.data.s_expedition);
                    jQuery('#resi').text(response.data.s_resi);
                    $('#biayapengiriman').html('Rp. ' + accounting.formatNumber(response.data
                        .s_payexpedition));
                    if(response.data.s_delivered == 'P'){
                        $('#statuspengiriman').text('Sedang Dikirim')
                    }else if(response.data.s_delivered == 'L'){
                        $('#statuspengiriman').text('Pengiriman Terhambat');
                    }
                    // jQuery('#nama_pegawai').text(data.pegawai.ap_name);
                    // jQuery('#tanggal_awal').text(data.pegawai.ap_startdate);
                    // jQuery('#tanggal_akhir').text(data.pegawai.ap_enddate);
                    jQuery('#modal-pengiriman').modal('show');
                    // var array = data.agenda;
                    // for (let i = 0; i < array.length; i++) {

                    //     console.log(array[i]);
                    // }
                    let datatracking = response.tracking;
                    let trHTML = '';
                            $.each(datatracking, function (i, item) {
                            trHTML += '<tr><td width="30%">' + item.tanggal + '</td><td>' + item.st_position + '</td></tr>';
                        });
                    $('#table_modal_detailtracking tbody').html(trHTML);
                }

            });
        });
</script>

@endsection