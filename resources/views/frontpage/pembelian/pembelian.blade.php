@extends('frontpage.main-frontpage')

@section('extra_style')
<style type="text/css">
    .ibox-produk{
        padding:0px;
        position: relative;
    }
    .ibox-produk img{
        
        height: 160px;
        width: 100%;
        /*max-width: 240px;*/
        object-fit: cover;
    }
    @media(max-width: 768px){
        .ibox-produk img{
        
            height: auto;
            width: 100%;
            
            object-fit: cover;
        }
    }
    .d-block{
        display: block;
    }
    .ibox-produk-title{
        padding-left: 30px;
        border-width: 1px 0 0;
    }
    .mb-4{
        margin-bottom: 1.5rem;
    }
    .ibox-custom{
        border-radius: 5px;
        border:1px solid transparent;
        box-shadow: 0 0 3px 1px lightgray;
    }
    .ibox-custom .ibox-title{
        border-top: none;
    }
    .shoping-cart-table tbody > tr {
        border-bottom: 1px solid #e9e7e7;
    }
    .input-group.input-daterange{
        width: 100%;
    }
    table.shoping-cart-table tr td:last-child {
        width: unset;
    }
    .tabs-container .nav-tabs li > a {
        margin-right: 0;
    }
</style>
@endsection

@section('content')
    
@include('frontpage.pembelian.modal-detailpembelian')
@include('frontpage.pembelian.modal-detailpengiriman')
@include('frontpage.pembelian.modal-pembayaran')

        <div class="ibox">
            <div class="ibox-content m-b-sm border-bottom">
                <div class="row">
                    <form id="">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nama_produk">Nama Produk</label>
                                <input type="text" id="nama_produk" name="nama_produk" value="" placeholder="Nama Produk" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-8 ">
                            
                                <div class="form-group">
                                    <label for="tanggal_transaksi_awal">Tanggal Transaksi Awal</label>
                                    <div class="input-group input-daterange">
                                        <input type="text" name="tanggal_transaksi_awal" value="" placeholder="Tanggal Awal" class="form-control datepicker">
                                        <span class="input-group-addon">
                                            <i class="fa fa-minus"></i>
                                        </span>
                                        <input type="text" name="tanggal_transaksi_akhir" value="" placeholder="Tanggal Akhir" class="form-control datepicker">
                                    </div>
                                </div>
                            
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="quantity">Urutan Berdasarkan</label>
                                <select name="orderby" id="orderby" class="form-control">
                                    <option value="1" selected="">Terbaru</option>
                                    <option value="2">Total Belanja</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    {{-- <div class="col-sm-2">
                        <div class="form-group">
                            <label for="status" class="text-primary">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" selected="">Semua</option>
                                <option value="2">Pembayaran</option>
                                <option value="3">Sedang Diproses</option>
                                <option value="4">Proses Pengiriman</option>
                            </select>
                        </div>
                    </div> --}}

                </div>

            </div>
        </div>
        <div class="tabs-container">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#tab-1"><span class="tab-title">Semua Status</span></a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#tab-2"><span class="tab-title">Pembayaran</span></a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#tab-3"><span class="tab-title">Sedang diproses</span></a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#tab-4"><span class="tab-title">Proses Pengiriman</span></a>
                    </li>
                </ul>
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Daftar Transaksi</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="tab-content">

                            <div id="tab-1" class="tab-pane animated fadeIn active">
                                    @foreach($group as $row)
                                    @if($row->sell_ccustomer == Auth::user()->cm_code)
                                    <div class="ibox ibox-custom">
                                        <div class="ibox-title ibox-produk-title">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="d-block">{{$row->sell_nota}}</label>
                                                    <span>{{\Carbon\Carbon::parse($row->sell_date)->formatLocalized('%d %B %Y')}}</span>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="d-block">Status</label>
                                                    <span class="label label-primary">{{$row->sell_status}}</span>
                                                </div>
                                                <div class="col-sm-4 text-right">
                                                    <label>Total Belanja</label>
                                                    <span class="text-warning" id="count">Rp. {{$row->totalbayar}}</span>
                                                    <br>
                                                    <a data-target="#modal-detail" data-id="{{$row->sell_nota}}" data-status="{{$row->sell_status}}" data-date="{{$row->sell_date}}" data-customer="{{Auth::user()->cm_name}}" data-alamat="{{Auth::user()->cm_address}},  {{$row->sell_address}}" data-totalb="{{$row->totalbeli}}" data-hargat="Rp. {{$row->sell_total}}" data-toggle="modal" class="btn btn-success btn-sm detail">Lihat Detail Transaksi</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ibox-content mb-4">
                                            <div class="table-responsive">
                                                @foreach($allstatus as $roww)
                                                @if($roww->sell_nota == $row->sell_nota)
                                                <table class="table shoping-cart-table">

                                                    <tbody>
                                                            <tr>
                                                                @foreach($gambar as $image)
                                                                @if($image->sell_nota == $row->sell_nota)
                                                                <td width="90">
                                                                    <img src="/warungislamibogor/storage/image/master/produk/{{$image->ip_path}}" width="100px">
                                                                </td>
                                                                @endif
                                                                @endforeach
                                                                <td class="desc" style="width: 50%">
                                                                    <h3>
                                                                        <a href="#" class="text-navy">
                                                                            {{$roww->i_name}}
                                                                        </a>
                                                                    </h3>
                                                                    <p class="small">
                                                                        {{$roww->itp_tagdesc}}
                                                                    </p>
                                                                    <dl class="small m-b-none">
                                                                        {!! html_entity_decode($roww->itp_description) !!}
                                                                    </dl>

                                                                    <div class="m-t-sm">
                                                                        <span class="text-warning">Rp. {{$roww->ipr_sunitprice}}</span>
                                                                        |
                                                                        <span class="text-muted">{{$roww->sell_quantity}} Produk</span>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <label class="d-block">Total Harga Produk</label>
                                                                    <span class="text-info">Rp. {{$roww->sell_total}}</span>
                                                                </td>
                                                                <td width="65">
                                                                    <button class="btn btn-warning" type="button">Belanja Lagi</button>
                                                                </td>

                                                            </tr>
                                                    </tbody>
                                                </table>
                                                @endif
                                        @endforeach                             
                                            </div>

                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                            </div>
                            
                            <div id="tab-2" class="tab-pane animated fadeIn">
                                    @foreach($groupp as $row)
                                    @if($row->sell_ccustomer == Auth::user()->cm_code)

                                    <div class="ibox ibox-custom">
                                        <div class="ibox-title ibox-produk-title">
                                            <div class="row">

                                                <div class="col-sm-4">
                                                    <label class="d-block">{{$row->sell_nota}}</label>
                                                    <span>{{\Carbon\Carbon::parse($row->sell_date)->formatLocalized('%d %B %Y')}}</span>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="d-block">Status</label>
                                                    <span class="label label-primary">{{$row->sell_status}}</span>
                                                </div>
                                                <div class="col-sm-4 text-right">
                                                    <label>Total Belanja</label>
                                                    <span class="text-warning">Rp. {{$row->totalbayar}}</span>
                                                    <br>
                                                    <button class="btn btn-warning btn-sm bayar"  data-nota="{{$row->sell_nota}}" type="button" data-toggle="modal" data-target="#modal-bayar">Bayar</button>
                                                    <a data-target="#modal-detail" data-id="{{$row->sell_nota}}" data-status="{{$row->sell_status}}" data-date="{{$row->sell_date}}" data-customer="{{Auth::user()->cm_name}}" data-alamat="{{Auth::user()->cm_address}},  {{$row->sell_address}}" data-totalb="{{$row->totalbeli}}" data-hargat="Rp. {{$row->sell_total}}" data-toggle="modal" class="btn btn-success btn-sm detail">Lihat Detail Transaksi</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ibox-content mb-4">
                                            <div class="table-responsive">
                                                @foreach($pembayaran as $roww)
                                                @if($roww->sell_nota == $row->sell_nota)
                                                <table class="table shoping-cart-table">

                                                    <tbody>
                                                            <tr>
                                                                @foreach($gambar as $image)
                                                                @if($image->sell_nota == $row->sell_nota)
                                                                <td width="90">
                                                                    <img src="/warungislamibogor/storage/image/master/produk/{{$image->ip_path}}" width="100px">
                                                                </td>
                                                                @endif
                                                                @endforeach
                                                                <td class="desc" style="width: 50%">
                                                                    <h3>
                                                                        <a href="#" class="text-navy">
                                                                            {{$roww->i_name}}
                                                                        </a>
                                                                    </h3>
                                                                    <p class="small">
                                                                        {{$roww->itp_tagdesc}}
                                                                    </p>
                                                                    <dl class="small m-b-none">
                                                                        {!! html_entity_decode($roww->itp_description) !!}
                                                                    </dl>

                                                                    <div class="m-t-sm">
                                                                        <span class="text-warning">Rp. {{$roww->ipr_sunitprice}}</span>
                                                                        |
                                                                        <span class="text-muted">{{$roww->sell_quantity}} Produk</span>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <label class="d-block">Total Harga Produk</label>
                                                                    <span class="text-info">Rp. {{$roww->sell_total}}</span>
                                                                </td>

                                                            </tr>
                                                    </tbody>
                                                </table>
                                                @endif
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                
                            </div>

                            <div id="tab-3" class="tab-pane animated fadeIn">
                                @foreach($group as $row)
                                @if($row->sell_status == 'Sedang Proses' && $row->sell_ccustomer == Auth::user()->cm_code)

                                    <div class="ibox ibox-custom">
                                        <div class="ibox-title ibox-produk-title">
                                            <div class="row">

                                                <div class="col-sm-4">
                                                    <label class="d-block">{{$row->sell_nota}}</label>
                                                    <span>{{\Carbon\Carbon::parse($row->sell_date)->formatLocalized('%d %B %Y')}}</span>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="d-block">Status</label>
                                                    <span class="label label-warning">{{$row->sell_status}}</span>
                                                </div>
                                                <div class="col-sm-4 text-right">
                                                    <label>Total Belanja</label>
                                                    <span class="text-warning">Rp. {{$row->totalbayar}}</span>
                                                    <br>
                                                    <button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#modal-bayar">Bayar</button>
                                                    <a data-target="#modal-detail" data-id="{{$row->sell_nota}}" data-status="{{$row->sell_status}}" data-date="{{$row->sell_date}}" data-customer="{{Auth::user()->cm_name}}" data-alamat="{{Auth::user()->cm_address}},  {{$row->sell_address}}" data-totalb="{{$row->totalbeli}}" data-hargat="Rp. {{$row->sell_total}}" data-toggle="modal" class="btn btn-success btn-sm detail">Lihat Detail Transaksi</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ibox-content mb-4">
                                            <div class="table-responsive">
                                                @foreach($proses as $roww)
                                                @if($roww->sell_nota == $row->sell_nota)
                                                <table class="table shoping-cart-table">

                                                    <tbody>
                                                            <tr>
                                                                @foreach($gambar as $image)
                                                                @if($image->sell_nota == $row->sell_nota)
                                                                <td width="90">
                                                                    <img src="/warungislamibogor/storage/image/master/produk/{{$image->ip_path}}" width="100px">
                                                                </td>
                                                                @endif
                                                                @endforeach
                                                                <td class="desc" style="width: 50%">
                                                                    <h3>
                                                                        <a href="#" class="text-navy">
                                                                            {{$roww->i_name}}
                                                                        </a>
                                                                    </h3>
                                                                    <p class="small">
                                                                        {{$roww->itp_tagdesc}}
                                                                    </p>
                                                                    <dl class="small m-b-none">
                                                                        {!! html_entity_decode($roww->itp_description) !!}
                                                                    </dl>

                                                                    <div class="m-t-sm">
                                                                        <span class="text-warning">Rp. {{$roww->ipr_sunitprice}}</span>
                                                                        |
                                                                        <span class="text-muted">{{$roww->sell_quantity}} Produk</span>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <label class="d-block">Total Harga Produk</label>
                                                                    <span class="text-info">Rp. {{$roww->sell_total}}</span>
                                                                </td>

                                                            </tr>
                                                    </tbody>
                                                </table>
                                                @endif
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>

                                    @endif
                                @endforeach
                            </div>                            

                            <div id="tab-4" class="tab-pane animated fadeIn"> 
                                @foreach($group as $row)
                                @if($row->sell_status == 'Sedang Dikirim' && $row->sell_ccustomer == Auth::user()->cm_code)
                                    <div class="ibox ibox-custom">
                                        <div class="ibox-title ibox-produk-title">
                                            <div class="row">

                                                <div class="col-sm-4">
                                                    <label class="d-block">{{$row->sell_nota}}</label>
                                                    <span>{{\Carbon\Carbon::parse($row->sell_date)->formatLocalized('%d %B %Y')}}</span>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="d-block">Status</label>
                                                    <span class="label label-primary">{{$row->sell_status}}</span>
                                                </div>
                                                <div class="col-sm-4 text-right">
                                                    <label>Total Belanja</label>
                                                    <span class="text-warning">Rp. {{$row->totalbayar}}</span>
                                                    <br>
                                                    <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modal-pengiriman">Lacak</button>
                                                    <a data-target="#modal-detail" data-id="{{$row->sell_nota}}" data-status="{{$row->sell_status}}" data-date="{{$row->sell_date}}" data-customer="{{Auth::user()->cm_name}}" data-alamat="{{Auth::user()->cm_address}},  {{$row->sell_address}}" data-totalb="{{$row->totalbeli}}" data-hargat="Rp. {{$row->sell_total}}" data-toggle="modal" class="btn btn-success btn-sm detail">Lihat Detail Transaksi</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ibox-content mb-4">
                                            <div class="table-responsive">
                                                @foreach($pengiriman as $roww)
                                                @if($roww->sell_nota == $row->sell_nota)
                                                <table class="table shoping-cart-table">

                                                    <tbody>
                                                            <tr>
                                                                @foreach($gambar as $image)
                                                                @if($image->sell_nota == $row->sell_nota)
                                                                <td width="90">
                                                                    <img src="/warungislamibogor/storage/image/master/produk/{{$image->ip_path}}" width="100px">
                                                                </td>
                                                                @endif
                                                                @endforeach
                                                                <td class="desc" style="width: 50%">
                                                                    <h3>
                                                                        <a href="#" class="text-navy">
                                                                            {{$roww->i_name}}
                                                                        </a>
                                                                    </h3>
                                                                    <p class="small">
                                                                        {{$roww->itp_tagdesc}}
                                                                    </p>
                                                                    <dl class="small m-b-none">
                                                                        {!! html_entity_decode($roww->itp_description) !!}
                                                                    </dl>

                                                                    <div class="m-t-sm">
                                                                        <span class="text-warning">Rp. {{$roww->ipr_sunitprice}}</span>
                                                                        |
                                                                        <span class="text-muted">{{$roww->sell_quantity}} Produk</span>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <label class="d-block">Total Harga Produk</label>
                                                                    <span class="text-info">Rp. {{$roww->sell_total}}</span>
                                                                </td>

                                                            </tr>
                                                    </tbody>
                                                </table>
                                                @endif
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>

                        </div>
                    </div>
                    
                </div>



            </div>   
        

            
@endsection
@section('extra_script')
<script type="text/javascript">
    $(document).ready(function(){

        var totall = $('.total').length;

        $(document).on('click','.detail',function(){
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
            if ( stat == 'Pembayaran') {
                $('#status').html('<span class="label label-warning">Pembayaran</span>');
            }else if(stat == 'Sedang Dikirim'){
                $('#status').html('<span class="label label-info">Sedang Dikirim</span>');
            }else if (stat == 'Sedang Proses') {
                $('#status').html('<span class="label label-primary">Sedang Diproses</span>');
            }else if(stat == 'Transaksi Selesai'){
                $('#status').html('<span class="label label-success">Transaksi Selesai</span>');
            }else{
                 $('#status').html('<span class="label label-success">Transaksi Selesai</span>');
            }
            var table2 = $('#table_detail').DataTable({
                responsive: true,
                serverSide: true,
                destroy : true,
                paging:false,
                filter:false,
                ajax: {
                    url: "{{ route('detail.pembayaran') }}",
                    type: "post",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'nota' : nota,
                    }
                },
                columns: [
                    {data: 'daftar', name: 'daftar'},
                    {data: 'harga', name: 'harga'},
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
    

        $('.bayar').on('click',function(){
            var nota = $(this).data('nota');
            var isi = $('#cnota');
            if (isi.val() != '') {
                $('#cnota').val('#');
                $('#cnota').val(nota);
            }else{
                $('#cnota').val(nota);
            }
        })

        $('#ncart').html($('.ncart').length);

        var url_string = window.location.href;
        var url = new URL(url_string);
        var status = url.searchParams.get("status");

        if (status) {
            $('.tabs-container').find('[href="#tab-'+status+'"]').tab('show');
        }
        console.log(status);

        $('.input-daterange').datepicker();

        $('[name="foto"]').change(function(){
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