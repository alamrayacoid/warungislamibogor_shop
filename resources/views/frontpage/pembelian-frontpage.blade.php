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
    


        <div class="ibox">
            <div class="ibox-content m-b-sm border-bottom">
                <div class="row">
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
                                @for($i=1; $i<=6 ;$i++)
                                    <div class="ibox ibox-custom">
                                        <div class="ibox-title ibox-produk-title">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="d-block">NOTA/20190509/{{$i}}</label>
                                                    <span>9 Mei 2019</span>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="d-block">Status</label>
                                                    <span class="label label-primary">Transaksi Selesai</span>
                                                </div>
                                                <div class="col-sm-4 text-right">
                                                    <label>Total Belanja</label>
                                                    <span class="text-warning">Rp. 30.000</span>
                                                    <br>
                                                    <a href="#modal-detail" data-toggle="modal" class="btn btn-success btn-sm">Lihat Detail Transaksi</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ibox-content mb-4">
                                            <div class="table-responsive">
                                                <table class="table shoping-cart-table">

                                                    <tbody>
                                                        @for($j=0;$j<2;$j++)
                                                            <tr>
                                                                <td width="90">
                                                                    <img src="{{asset('assets/img/gallery/'.($i + $j).'s.jpg')}}" width="100px">
                                                                </td>
                                                                <td class="desc">
                                                                    <h3>
                                                                        <a href="#" class="text-navy">
                                                                            Text editor
                                                                        </a>
                                                                    </h3>
                                                                    <p class="small">
                                                                        There are many variations of passages of Lorem Ipsum available
                                                                    </p>
                                                                    <dl class="small m-b-none">
                                                                        <dt>Description lists</dt>
                                                                        <dd>List is perfect for defining terms.</dd>
                                                                    </dl>

                                                                    <div class="m-t-sm">
                                                                        <span class="text-warning">Rp. 10.000</span>
                                                                        |
                                                                        <span class="text-muted">3 Produk</span>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <label class="d-block">Total Harga Produk</label>
                                                                    <span class="text-info">Rp. 30.000</span>
                                                                </td>
                                                                <td width="65">
                                                                    <button class="btn btn-warning" type="button">Belanja Lagi</button>
                                                                </td>

                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                @endfor                                
                            </div>
                            
                            <div id="tab-2" class="tab-pane animated fadeIn">
                                @for($i=1; $i<=6 ;$i++)
                                    <div class="ibox ibox-custom">
                                        <div class="ibox-title ibox-produk-title">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="d-block">NOTA/20190509/{{$i}}</label>
                                                    <span>9 Mei 2019</span>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="d-block">Status</label>
                                                    <span class="label label-warning">Pembayaran</span>
                                                </div>
                                                <div class="col-sm-4 text-right">
                                                    <label>Total Belanja</label>
                                                    <span class="text-warning">Rp. 30.000</span>
                                                    <br>
                                                    <a href="#modal-detail" data-toggle="modal" class="btn btn-success btn-sm">Lihat Detail Transaksi</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ibox-content mb-4">
                                            <div class="table-responsive">
                                                <table class="table shoping-cart-table">

                                                    <tbody>
                                                        @for($j=0;$j<2;$j++)
                                                            <tr>
                                                                <td width="90">
                                                                    <img src="{{asset('assets/img/gallery/'.($i + $j).'s.jpg')}}" width="100px">
                                                                </td>
                                                                <td class="desc">
                                                                    <h3>
                                                                        <a href="#" class="text-navy">
                                                                            Text editor
                                                                        </a>
                                                                    </h3>
                                                                    <p class="small">
                                                                        There are many variations of passages of Lorem Ipsum available
                                                                    </p>
                                                                    <dl class="small m-b-none">
                                                                        <dt>Description lists</dt>
                                                                        <dd>List is perfect for defining terms.</dd>
                                                                    </dl>

                                                                    <div class="m-t-sm">
                                                                        <span class="text-warning">Rp. 10.000</span>
                                                                        |
                                                                        <span class="text-muted">3 Produk</span>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <label class="d-block">Total Harga Produk</label>
                                                                    <span class="text-info">Rp. 30.000</span>
                                                                </td>

                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                @endfor
                            </div>

                            <div id="tab-3" class="tab-pane animated fadeIn">
                                @for($i=1; $i<=6 ;$i++)
                                    <div class="ibox ibox-custom">
                                        <div class="ibox-title ibox-produk-title">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="d-block">NOTA/20190509/{{$i}}</label>
                                                    <span>9 Mei 2019</span>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="d-block">Status</label>
                                                    <span class="label label-success">Sedang Diproses</span>
                                                </div>
                                                <div class="col-sm-4 text-right">
                                                    <label>Total Belanja</label>
                                                    <span class="text-warning">Rp. 30.000</span>
                                                    <br>
                                                    <a href="#modal-detail" data-toggle="modal" class="btn btn-success btn-sm">Lihat Detail Transaksi</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ibox-content mb-4">
                                            <div class="table-responsive">
                                                <table class="table shoping-cart-table">

                                                    <tbody>
                                                        @for($j=0;$j<2;$j++)
                                                            <tr>
                                                                <td width="90">
                                                                    <img src="{{asset('assets/img/gallery/'.($i + $j).'s.jpg')}}" width="100px">
                                                                </td>
                                                                <td class="desc">
                                                                    <h3>
                                                                        <a href="#" class="text-navy">
                                                                            Text editor
                                                                        </a>
                                                                    </h3>
                                                                    <p class="small">
                                                                        There are many variations of passages of Lorem Ipsum available
                                                                    </p>
                                                                    <dl class="small m-b-none">
                                                                        <dt>Description lists</dt>
                                                                        <dd>List is perfect for defining terms.</dd>
                                                                    </dl>

                                                                    <div class="m-t-sm">
                                                                        <span class="text-warning">Rp. 10.000</span>
                                                                        |
                                                                        <span class="text-muted">3 Produk</span>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <label class="d-block">Total Harga Produk</label>
                                                                    <span class="text-info">Rp. 30.000</span>
                                                                </td>

                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                @endfor
                            </div>                            

                            <div id="tab-4" class="tab-pane animated fadeIn">                            
                                @for($i=1; $i<=6 ;$i++)
                                    <div class="ibox ibox-custom">
                                        <div class="ibox-title ibox-produk-title">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="d-block">NOTA/20190509/{{$i}}</label>
                                                    <span>9 Mei 2019</span>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="d-block">Status</label>
                                                    <span class="label label-info">Sedang dikirim</span>
                                                </div>
                                                <div class="col-sm-4 text-right">
                                                    <label>Total Belanja</label>
                                                    <span class="text-warning">Rp. 30.000</span>
                                                    <br>
                                                    <a href="#modal-detail" data-toggle="modal" class="btn btn-success btn-sm">Lihat Detail Transaksi</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ibox-content mb-4">
                                            <div class="table-responsive">
                                                <table class="table shoping-cart-table">

                                                    <tbody>
                                                        @for($j=0;$j<2;$j++)
                                                            <tr>
                                                                <td width="90">
                                                                    <img src="{{asset('assets/img/gallery/'.($i + $j).'s.jpg')}}" width="100px">
                                                                </td>
                                                                <td class="desc">
                                                                    <h3>
                                                                        <a href="#" class="text-navy">
                                                                            Text editor
                                                                        </a>
                                                                    </h3>
                                                                    <p class="small">
                                                                        There are many variations of passages of Lorem Ipsum available
                                                                    </p>
                                                                    <dl class="small m-b-none">
                                                                        <dt>Description lists</dt>
                                                                        <dd>List is perfect for defining terms.</dd>
                                                                    </dl>

                                                                    <div class="m-t-sm">
                                                                        <span class="text-warning">Rp. 10.000</span>
                                                                        |
                                                                        <span class="text-muted">3 Produk</span>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <label class="d-block">Total Harga Produk</label>
                                                                    <span class="text-info">Rp. 30.000</span>
                                                                </td>

                                                            </tr>
                                                        @endfor
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                @endfor
                            </div>

                        </div>
                    </div>
                    
                </div>



            </div>   
        

    {{-- Modal --}}
    <div class="modal" id="modal-detail" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    
                    <h4 class="modal-title text-center">Detail Transaksi</h4>
                    
                </div>
                <div class="modal-body">
                    <div class="row">
                       <div class="col-sm-8">
                            <div class="form-group">
                                <label class="d-block">Nomor Nota</label>
                                <span>NOTA/20190509/XX</span>
                            </div>  

                            <div class="form-group">
                                <label class="d-block">Status Transaksi</label>
                                <span class="label label-info">Sedang Dikirim</span>
                                <span class="label label-warning">Pembayaran</span>
                                <span class="label label-success">Sedang Diproses</span>
                                <span class="label label-primary">Transaksi Selesai</span>
                            </div>  

                            <div class="form-group">
                                <label class="d-block">Tanggal Pembelian</label>
                                <span>9 Mei 2019</span>
                            </div>  

                       </div>
                       <div  class="col-sm-4 text-right">
                            <button type="button" class="btn btn-primary btn-outline">Salin Transaksi ke Nota Baru</button>
                       </div>
                   </div>

                   <div class="table-responsive mb-4">
                        <table class="table shoping-cart-table">
                            <thead>
                                <tr>
                                    <th colspan="2">Daftar Produk</th>
                                    <th colspan="2">Harga Produk</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($j=1;$j<=2;$j++)
                                    <tr>
                                        <td width="90">
                                            <img src="{{asset('assets/img/gallery/'.$j.'s.jpg')}}" width="100px">
                                        </td>
                                        <td class="desc">
                                            <h3>
                                                <a href="#" class="text-navy">
                                                    Text editor
                                                </a>
                                            </h3>
                                            <div class="m-t-sm">
                                                <span class="text-warning">Rp. 10.000</span>
                                                |
                                                <span class="text-muted">3 Produk</span>
                                            </div>
                                        </td>

                                        <td class="desc">
                                            <label class="d-block">Total Harga Produk</label>
                                            <span class="text-info">Rp. 30.000</span>
                                        </td>
                                        <td width="65">
                                            <button class="btn btn-warning" type="button">Belanja Lagi</button>
                                        </td>

                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive mb-4">
                        <table class="table shoping-cart-table">
                            <thead>
                                <tr>
                                    <th>Pengiriman</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="desc">
                                        Dikirim kepada <strong>Nama Customer</strong>
                                        <br>
                                        Jl. Alamat Customer
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive mb-4">
                        <table class="table shoping-cart-table">
                            <thead>
                                <tr>
                                    <th colspan="2">Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="desc">Jumlah Barang</td>
                                    <td class="desc">6 Barang</td>
                                </tr>
                                <tr>
                                    <td class="desc">Total Belanja</td>
                                    <td class="desc">Rp. 60.000</td>
                                </tr>
                                <tr>
                                    <td class="desc">Metode Pembayaran</td>
                                    <td class="desc">Cash</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal --}}
            
@endsection
@section('extra_script')
<script type="text/javascript">
    $(document).ready(function(){


        var url_string = window.location.href;
        var url = new URL(url_string);
        var status = url.searchParams.get("status");

        if (status) {
            $('.tabs-container').find('[href="#tab-'+status+'"]').tab('show');
        }
        console.log(status);

        $('.input-daterange').datepicker();

    });
</script>
@endsection