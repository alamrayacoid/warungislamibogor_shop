@extends('frontpage.main-frontpage')

@section('extra_style')
<style type="text/css">
    .shoping-cart-table input {
        min-width: 50px;
    }
</style>
@endsection

@section('content')
<section style="margin-top:5em;">
    <ol class="breadcrumb breadcumb-header">
        <li><a href="#">Home</a></li>
        <li><a href="">Keranjang Belanja</a></li>
    </ol>
    <div class="container-fluid">
        @if($produk != '[]')
        <div class="row mt-5 mb-5">
            <div class="col-md-7">
                <div class="thumbnail">
                    <div class="thumbnail-header">Keranjang Belanja Anda
                    </div>
                    <div class="caption" style="padding:0;">
                        
                        <form id="keranjang_checkout">
                            @csrf
                            <input type="hidden" id="count" name="count">
                            @foreach($produk as $row)
                            <input type="hidden" class="count" value="{{$row->cart_id}}" name="id[]">
                            <div class="row column-group-cart-item-product">
                                <div class="col-lg-8 col-md-7 column-left-cart-item-product">
                                    @foreach($gambar as $roww)
                                    @if($row->i_code == $roww->ip_ciproduct)
                                    <div class="">
                                        <img src="alamraya.site/warungislamibogor/storage/image/master/produk/{{$roww->ip_path}}"
                                            class="img-item-product-cart">
                                    </div>
                                    @endif
                                    @endforeach
                                    <div class="column-description-cart-product">
                                        <h5 class="title-cart-product-item">{{$row->i_name}}</h5>
                                        <input type="hidden" value="{{$row->i_code}}" name="ciproduct[]">
                                        
                                        <input type="hidden" value="{{$row->cart_qty}}" name="qty[]">
                                        <input type="hidden" value="{{$row->ipr_sunitprice * $row->cart_qty}}"
                                            name="total[]">
                                        <div class="input-group d-flex">
                                            <button class="btn btn-default btn-sm btn-count-item border-right-0" type="button" disabled><i
                                                    class="fa fa-minus"></i></button>
                                            <input type="number" class="form-control text-center" value="{{$row->cart_qty}}"
                                                aria-describedby="sizing-addon2">
                                            <button class="btn btn-default btn-sm btn-count-item border-left-0" type="button" disabled><i
                                                    class="fa fa-plus" ></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-5 column-right-cart-item-product">
                                    <h5 class="">Rp. {{$row->ipr_sunitprice * $row->cart_qty}}</h5>
                                    <input type="hidden" value="{{$row->ipr_sunitprice * $row->cart_qty}}" class="total"
                                        id="total{{$row->cart_id}}" name="">
                                    <a data-id="{{$row->cart_id}}" data-ciproduct="{{$row->cart_ciproduct}}" data-qty="{{$row->cart_qty}}"
                                        class="remove"><button class="btn btn-default"><i
                                                class="fa fa-times"></i></button></a>
                                </div>
                            </div>
                            @endforeach
                        </form>
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
                            <h5 class="">Total Belanja</h5><span class="text-price-cart-product" id="totalview"></span>
                        </div>
                        <div class="m-t-sm">

                            <a class="btn btn-primary btn-sm btn-checkout-cart checkouts">Bayar Sekaligus</a>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @else
    <div class="col-lg-12 column-empty-cart">
        <img src="{{asset('assets/img/img-product/empty-cart.png')}}">
        <h5 class="">Belum Ada Barang di Keranjang Belanja Anda</h5>
        <p class="">Nikmati kemudahan berbelanja Di Online Shop Warung Islami Bogor</p>
        <a href="{{url('/')}}"><button class="">Ayo Belanja Sekarang </button></a>
        <div>
        </div>
    </div>

    @endif
</section>
@endsection
@section('extra_script')
<script type="text/javascript">
    $(document).ready(function () {

        setInterval(function () {
            $('#itemt').html($('.count').length);
        }, 500);
        var totall = $('.total').length;
        $('#count').val(totall);
        console.log(totall);
        var total = 0;
        $('.total').each(function () {
            total += parseInt(this.value);
        });

        $('#totalview').html('Rp. ' + total);

        $('.remove').on('click', function () {
            var id = $(this).data('id');
            var code = $(this).data('ciproduct');
            var label = $(this).data('label');
            var jumlah = $(this).data('qty');
            $.ajax({
                url: '{{route("remove.keranjang")}}',
                method: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'id': id,
                    'code': code,
                    'label': label,
                    'jumlah': jumlah,
                },
                success: function (data) {
                    location.reload();
                }
            })

        })

        $(document).on('click', '.checkouts', function () {
            ;
            var form = $('#keranjang_checkout').serialize();
            $.ajax({
                url: '{{route("check.keranjang")}}',
                method: 'POST',
                data: form,
                success: function (get) {
                    window.location.href = '{{route("checkout")}}';
                }
            })
        })



        $('#ncart').html($('.ncart').length);
    })
</script>
@endsection