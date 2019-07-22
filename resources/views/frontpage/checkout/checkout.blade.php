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
    .modal{
        z-index:9999999;
    }
</style>
@endsection

@section('content')

@include('frontpage.checkout.modal_gantialamat')
<section style="margin-top:10em;">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Alamat</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-cart">
                                <tbody>
                                    <tr>
                                        <td width="30%"><b>Provinsi</b></td>
                                        <td id="prov">{{Auth::user()->cm_province}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Kabupaten/Kota</b></td>
                                        <td id="kot">{{Auth::user()->cm_city}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Kecamatan</b></td>
                                        <td id="kab">{{Auth::user()->cm_district}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Alamat</b></td>
                                        <td id="ala">{{Auth::user()->cm_address}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="ibox-footer text-right">
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-gantialamat"
                            type="button"><i class="fa fa-pencil-alt"></i> Ubah Alamat</button>
                    </div>
                </div>
                <div class="ibox">
                    <div class="ibox-title">
                        <span class="pull-right">(<strong id="itemt"></strong>) items</span>
                        <h5>Items in your cart</h5>
                    </div>
                    <form id="keranjang_checkout">
                        @csrf
                        <input type="hidden" id="count" name="count">
                        <input type="hidden" id="provinsi" name="provinsi">
                        <input type="hidden" id="kota" name="kota">
                        <input type="hidden" id="kecamatan" name="kecamatan">
                        <input type="hidden" id="alamat" name="alamat">
                        @foreach($produk as $row)
                        <input type="hidden" class="count" value="{{$row->cart_id}}" name="id[]">
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table shoping-cart-table">

                                    <tbody>
                                        <tr>
                                            @foreach($gambar as $roww)
                                            @if($row->i_code == $roww->ip_ciproduct)
                                            <td width="90">
                                                <img src="/warungislamibogor/storage/image/master/produk/{{$roww->ip_path}}"
                                                    width="100px">
                                            </td>
                                            @endif
                                            @endforeach
                                            <td class="desc">
                                                <h3>
                                                    <a href="#" class="text-navy">
                                                        {{$row->i_name}}
                                                        <input type="hidden" value="{{$row->i_code}}"
                                                            name="ciproduct[]">
                                                        <input type="hidden" value="{{$row->cart_label}}"
                                                            name="label[]">
                                                        <input type="hidden" value="{{$row->cart_qty}}" name="qty[]">
                                                        <input type="hidden"
                                                            value="{{$row->ipr_sunitprice * $row->cart_qty}}"
                                                            name="total[]">
                                                    </a>
                                                </h3>
                                                <p class="small">
                                                    {!! html_entity_decode($row->itp_description) !!}
                                                </p>
                                                <dl class="small m-b-none">
                                                    <dt>Description lists</dt>
                                                    <dd>{{$row->itp_tagdesc}}</dd>
                                                </dl>

                                                <div class="m-t-sm">
                                                    <a data-id="{{$row->cart_id}}"
                                                        data-ciproduct="{{$row->cart_ciproduct}}"
                                                        data-label="{{$row->cart_label}}" data-qty="{{$row->cart_qty}}"
                                                        class="text-danger remove"><i class="fa fa-trash"></i> Remove
                                                        item</a>
                                                </div>
                                            </td>

                                            <td>
                                                Rp. {{$row->ipr_sunitprice}}

                                            </td>
                                            <td width="65">
                                                <input type="number" readonly="" value="{{$row->cart_qty}}"
                                                    class="form-control" placeholder="1">
                                                <select class="form-control" name="">

                                                </select>
                                            </td>
                                            <td>
                                                <h4>
                                                    Rp. {{$row->ipr_sunitprice * $row->cart_qty}}
                                                    <input type="hidden"
                                                        value="{{$row->ipr_sunitprice * $row->cart_qty}}" class="total"
                                                        id="total{{$row->cart_id}}" name="">
                                                </h4>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endforeach
                    </form>
                    <div class="ibox-content text-right">

                        <button class="btn btn-warning btn-sm bayar_sekarang"><i class="fa fa fa-money-bill-alt"></i>
                            Bayar</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">

                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Cart Summary</h5>
                    </div>
                    <div class="ibox-content">
                        <span>
                            Total
                        </span>
                        <h2 class="font-bold">
                            <p id="totalview"></p>
                        </h2>

                        <hr />
                        <div class="m-t-sm">
                            <div class="btn-group">
                                <a href="#" class="btn btn-warning btn-sm bayar_sekarang" id="btn-confirm"><i
                                        class="fa fa-money-bill-alt"></i> Bayar</a>
                                <a href="#" class="btn btn-white btn-sm"> Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Support</h5>
                    </div>
                    <div class="ibox-content text-center">
                        <h3><i class="fa fa-phone"></i> +43 100 783 001</h3>
                        <span class="small">
                            Please contact with us if you have any questions. We are avalible 24h.
                        </span>
                    </div>
                </div>
                <div class="ibox">
                    <div class="ibox-content">
                        <p class="font-bold">
                            Other products you may be interested
                        </p>
                        <hr />
                        <div>
                            <a href="#" class="product-name"> Product 1</a>
                            <div class="small m-t-xs">
                                Many desktop publishing packages and web page editors now.
                            </div>
                            <div class="m-t text-righ">
                                <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i
                                        class="fa fa-long-arrow-right"></i> </a>
                            </div>
                        </div>
                        <hr />
                        <div>
                            <a href="#" class="product-name"> Product 2</a>
                            <div class="small m-t-xs">
                                Many desktop publishing packages and web page editors now.
                            </div>
                            <div class="m-t text-righ">

                                <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i
                                        class="fa fa-long-arrow-right"></i> </a>
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

        var total = 0;
        $('.total').each(function () {
            total += parseInt(this.value);
        });

        $('#totalview').html('Rp. ' + total);

        $('#ncart').html($('.ncart').length);

        $('#btn-confirm').click(function () {

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
                        swal("Informasi!",
                            "Transfer ke Rekening WIB dan kirim bukti transfer di menu pembayaran.",
                            "success");
                        setTimeout(function () {
                            window.location.href = '{{route("checkout")}}';
                        }, 500)
                    },
                    error: function (xhr, textStatus, errorThrowl) {
                        swal({
                                title: "Error",
                                text: "Coba Cek Barang Anda, atau stock kosong",
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