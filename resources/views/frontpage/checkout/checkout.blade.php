@if($count == 0)
<script type="text/javascript">
    window.location.href = "{{route('home')}}";
</script>
@endif
@extends('frontpage.main-frontpage')

@section('extra_style')
<style type="text/css">
    .shoping-cart-table input {
        min-width: 50px;
    }

    .form-checkout label {
        font-weight: normal;
    }

    .form-checkout label:after {
        content: "*";
        color: red;
        font-weight: bold;
        font-size: 12px;
        padding-left: 5px;
    }
</style>
@endsection

@section('content')

@include('frontpage.checkout.modal_gantialamat')
<section style="margin-top:4.5em;">
    <ol class="breadcrumb breadcumb-header">
        <li><a href="#">Home</a></li>
        <li class="active">Checkout</a></li>
    </ol>
    <div class="container-fluid mt-5">
        <div class="loader-wib"></div>
        <div class="row">
            <div class="col-md-12">
                <form id="keranjang_checkout" class="form-checkout">
                    @csrf
                    <div class="row">
                        <div class="col-md-7">
                            <div class="thumbnail">
                                <div class="thumbnail-header">Alamat Pengiriman
                                </div>
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Pilih Provinsi</label>
                                                <select class="form-control fs-12 select2" id="provinsi"
                                                    name="provinsi">
                                                    <option value="">Pilih Provinsi</option>
                                                    @foreach($provinsi as $row)
                                                    <option value="{{$row->p_id}}">{{$row->p_nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Pilih Kabupaten</label>
                                                <select class="form-control fs-12 select2" id="kota" name="kota">
                                                    <option value="">Pilih Kabupaten/Kota</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Pilih Kecamatan</label>
                                                <select class="form-control fs-12 select2" id="kecamatan"
                                                    name="kecamatan">
                                                    <option value="">Pilih Kecamatan</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Kode Pos</label>
                                                <input type="number" value="{{Auth::user()->cm_postalcode}}"
                                                    class="form-control" name="kodepos">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Alamat Lengkap</label>
                                            <textarea class="form-control fs-12" name="alamat"
                                                rows="10">{{Auth::user()->cm_address}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-5">
                            <div class="thumbnail">
                                <div class="thumbnail-header">Bayar Semua Produk
                                </div>
                                <div class="caption" style="padding:0 15px;">
                                    <div class="text-item-full-cart">
                                        -
                                    </div>
                                    <div class="column-full-price-cart">
                                        <h5 class="">Total Belanja</h5><span class="text-price-cart-product"
                                            id="totalview"></span>
                                    </div>
                                        <div class="form-group">
                                            <input type="checkbox" class="checkbox-lamar" name="tunai" id="tunai" value="Y">
                                            <label for="check_1" class="cek">
                                        <span>Bayar Menggunakan Saldo WIB Store<span></span></span></label>
                                                </div>

                                    <div class="m-t-sm">

                                        <a class="btn btn-primary btn-sm btn-checkout-cart bayar_sekarang"
                                            id="btn-confirm">Bayar Semua Barang</a>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <div class="thumbnail">
                                <div class="thumbnail-header">Daftar Barang Checkout
                                </div>
                                <div class="caption" style="padding:0;">
                                    <input type="hidden" id="count" name="count">
                                    @foreach($produk as $row)
                                    <input type="hidden" class="count" value="{{$row->cart_id}}" name="id[]">
                                    <div class="row column-group-cart-item-product">
                                        <div class="col-lg-8 col-md-7 column-left-cart-item-product">
                                            @foreach($gambar as $roww)
                                            @if($row->i_code == $roww->ip_ciproduct)
                                            <div class="">
                                                <img src="{{env('APP_WIB')}}storage/image/master/produk/{{$roww->ip_path}}"
                                                    class="img-item-product-cart">
                                            </div>
                                            @endif
                                            @endforeach
                                            <div class="column-description-cart-product">
                                                <h5 class="title-cart-product-item">{{$row->i_name}}</h5>
                                                <input type="hidden" value="{{$row->i_code}}" name="ciproduct[]">
                                                <input type="hidden" value="{{$row->cart_qty}}" name="qty[]">
                                                <input type="hidden" value="{{$row->cart_location}}" name="gudang[]">
                                                <input type="text" value="{{$row->ipr_sunitprice}}" name="hargabarang[]"
                                                    hidden>
                                                <input type="hidden" value="{{$row->ipr_sunitprice * $row->cart_qty}}"
                                                    name="total[]">
                                                <div class="input-group d-flex">
                                                    <button class="btn btn-default btn-sm btn-count-item border-right-0"
                                                        type="button" disabled><i class="fa fa-minus"></i></button>
                                                    <input type="number" class="form-control text-center"
                                                        value="{{$row->cart_qty}}" aria-describedby="sizing-addon2"
                                                        readonly>
                                                    <button class="btn btn-default btn-sm btn-count-item border-left-0"
                                                        type="button" disabled><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-5 column-right-cart-item-product">
                                            <h5 class="">Rp. {{$row->ipr_sunitprice * $row->cart_qty}}</h5>
                                            <input type="hidden" value="{{$row->ipr_sunitprice * $row->cart_qty}}"
                                                class="total" id="total{{$row->cart_id}}" name="">
                                            <!-- <a data-id="{{$row->cart_id}}" data-ciproduct="{{$row->cart_ciproduct}}" data-qty="{{$row->cart_qty}}"
                                                class="remove"><button class="btn btn-default"><i
                                                        class="fa fa-times"></i></button></a> -->
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>


    </div>
</section>
@endsection

@section('extra_script')
<script type="text/javascript">
    $(document).ready(function () {
        var total = 0;
        $('.total').each(function () {
            total += parseInt(this.value);
        });
        var harga_ppn = (total * 10 / 100);

        var total_produk = $('.column-group-cart-item-product').length;
        $('.text-item-full-cart').html('Total Barang : ' + total_produk + ' <br><br>@foreach($produk as $row)<div class="column-full-price-cart" style="border: 1px #ffffff;"><h5 class="">{{$row->i_name}}</h5><span class="text-price-cart-product">Rp. '+accounting.formatNumber("{{$row->ipr_sunitprice * $row->cart_qty}}")+'</span></div> @endforeach <div class="column-full-price-cart" style="margin-bottom:-30px;opacity:0.8;"><h5 class=""> PPN : 10 %</h5><span class="text-price-cart-product">Rp. '+accounting.formatNumber(harga_ppn)+'</span></div>');

        $('#provinsi').change(function () {
            $.ajax({
                url: '{{route("kota")}}',
                type: 'get',
                data: {
                    '_token': '{{csrf_token()}}',
                    'provinsi': $('#provinsi').val()
                },
                success: function (get) {
                    console.log(get['kota']);
                    var html =
                        '<option value="-" selected="" disabled="">~ Pilih Kabupaten/Kota ~</option>';
                    for (var i = 0; i < get['kota'].length; i++) {
                        html += '<option value="' + get['kota'][i].c_id + '">' + get['kota']
                            [i].c_nama + '</option>';
                    }
                    $('#kota').html(html);
                }
            });
        })

        $('#kota').change(function () {
            $.ajax({
                url: '{{route("desa")}}',
                type: 'get',
                data: {
                    '_token': '{{csrf_token()}}',
                    'kota': $('#kota').val()
                },
                success: function (get) {
                    console.log(get);
                    var htmll =
                        '<option value="-" selected="" disabled="">~ Pilih Kecamatan ~</option>';
                    for (var i = 0; i < get['desa'].length; i++) {
                        htmll += '<option value="' + get['desa'][i].d_id + '">' + get[
                            'desa'][i].d_nama + '</option>';
                    }
                    $('#kecamatan').html(htmll);
                }
            });
        })

        setTimeout(function () {
            $('#provinsi').val('{{Auth::user()->cm_province}}').trigger('change');
            setTimeout(function () {
                $('#kota').val('{{Auth::user()->cm_city}}').trigger('change');
                setTimeout(function () {
                    $('#kecamatan').val('{{Auth::user()->cm_district}}').trigger(
                        'change');
                }, 800)
            }, 800)
        }, 200)

        $('#update-alamat').on('click', function () {
            var provinsi = $('#modalp').val();
            var kota = $('#modalk').val();
            var kecamatan = $('#modalkec').val();
            var alamat = $('#modalalamat').val();
            $('#provinsi').val(provinsi);
            $('#kota').val(kota);
            $('#kecamatan').val(kecamatan);
            $('#alamat').val(alamat);
            $('#prov').html(provinsi);
            $('#kot').html(kota);
            $('#kab').html(kecamatan);
            $('#ala').html(alamat);
            console.log(alamat);
        })


        setInterval(function () {
            $('#itemt').html($('.count').length);
        }, 500);

        var ppn = total + (total * 10 / 100);

        $('#totalview').html('Rp. ' + accounting.formatNumber(ppn));

        $('#ncart').html($('.ncart').length);

        $('#btn-confirm').click(function() {

            swal({
                    title: "Apa anda yakin?",
                    text: "Transaksi akan dibuat!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Ya",
                    cancelButtonText: "Tidak!",
                    closeOnConfirm: false,
                    closeOnCancel: true
                },
                function (isConfirm) {
                    if (isConfirm) {
                        bayar();
                    } else {
                        //
                    }
                });

            function bayar() {
                $('#count').val($('.count').length);
                var form = $('#keranjang_checkout').serialize();
                $.ajax({
                    url: '{{route("sell.checkout")}}',
                    method: 'POST',
                    data: form,
                    success: function (get) {
                        if (get['error'] != null){
                            swal("Informasi!",
                                get['error'],
                                "error");
                        } else{
                            swal("Informasi!",
                                "Transfer ke Rekening WIB dan kirim bukti transfer di menu pembayaran.",
                                "success");
                            setTimeout(function () {
                                window.location.href =
                                    "{{route('pembelian-pembayaran-frontpage', ['status' => 2])}}";
                            }, 500)
                        }
                    },
                    error: function (xhr, textStatus, errorThrowl) {
                        swal({
                                title: "Error",
                                text: "Hubungi Pengembang Software",
                                type: "error",
                                confirmButtonColor: "#DD6B55",
                                closeOnConfirm: true,
                                closeOnCancel: true
                            },
                            function (isConfirm) {
                                if (isConfirm) {} else {

                                }
                            });
                    }
                })
            }
        });

    })
</script>
@endsection