@extends('frontpage.main-frontpage')

@section('extra_style')
<style type="text/css">
    .shoping-cart-table input {
        min-width: 50px;
    }
</style>
@endsection

@section('content')
<section style="margin-top:9em;">
    <div class="container">
        <div class="row">
            <div class="col-md-9">

                <div class="ibox">
                    <div class="ibox-title">
                        <span class="pull-right">(<strong id="itemt"></strong>) items</span>
                        <h5>Items in your cart</h5>
                    </div>
                    <form id="keranjang_checkout">
                        @csrf
                        <input type="hidden" id="count" name="count">
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
                    <div class="ibox-content">

                        <button class="btn btn-primary pull-right checkouts"><i
                                class="fa fa fa-shopping-cart checkouts"></i> Checkout</button>
                        <button class="btn btn-white" onclick="javascript: window.history.back();"><i
                                class="fa fa-arrow-left"></i> Continue shopping</button>

                    </div>
                </div>

            </div>
            <div class="col-md-3">

                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Total Keranjang</h5>
                    </div>
                    <div class="ibox-content">
                        <span>
                            Total
                        </span>
                        <h2 class="font-bold">
                            <p id="totalview"></p>
                        </h2>

                        <hr>
                        <div class="m-t-sm">
                            <div class="btn-group">
                                <a class="btn btn-primary btn-sm checkouts"><i class="fa fa-shopping-cart"></i>
                                    Checkout</a>
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
                success: function (get) {
                    window.location.reload();
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