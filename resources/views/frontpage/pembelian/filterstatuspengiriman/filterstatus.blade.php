@if($groupppengstat > 0)
@if($group != '[]')
<div id="itemproduct-group-pengirimanstatus">
    @foreach($group as $row)
    @if($row->sell_status == 'SD')
    <div class="column-group-item-product mt-5">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <span class="fs-14 semi-bold">{{$row->sell_nota}}</span><span
                    class="text-full-payment-transaction">Total
                    Semua
                    Barang : <span class="text-full-price-transaction semi-bold" id="count">Rp.
                        {{$row->totalbayar}}</span></span>
            </div>
            <div class="col-lg-4 col-md-4">
                <a data-target="#modal-detail" data-id="{{$row->sell_nota}}" data-status="{{$row->sell_status}}"
                    data-date="{{$row->sell_date}}" data-customer="{{Auth::user()->cm_name}}"
                    data-alamat="{{Auth::user()->cm_address}},  {{$row->sell_address}}"
                    data-totalb="{{$row->totalbeli}}" data-provinsi="{{$row->p_nama}}" data-kecamatan="{{$row->c_nama}}"
                    data-district="{{$row->d_nama}}" data-metode="{{$row->sell_method}}"
                    data-hargat="Rp. {{$row->sell_total}}" data-toggle="modal" class="detail"><button
                        class="btn btn-view-more-transaction">Lihat
                        Detail
                        Transaksi</button></a>
                <button class="btn btn-delivery-transaction" type="button" data-toggle="modal"
                    data-target="#modal-pengiriman">Lacak
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
                    <img src="/warungislamibogor/storage/image/master/produk/{{$image->ip_path}}" width="100px"
                        height="100px">
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
    <h5>Oops, Transaksi tidak ditemukan.</h5>
    <div class="d-flex justify-content-center">
        <a href="{{url('/')}}"><button>Cari Produk Sekarang</button></a>
    </div>
</div>
@endif
@else
<div class="column-empty-transaction">
    <img src="{{asset('assets/img/img-product/empty-transaction.png')}}">
    <h5>Oops, Daftar Transaksi Status Proses Pengiriman Anda Kosong.</h5>
    <div class="d-flex justify-content-center">
        <a href="{{url('/')}}"><button>Cari Produk Sekarang</button></a>
    </div>
</div>
@endif