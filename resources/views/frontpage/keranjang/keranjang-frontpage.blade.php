@extends('frontpage.main-frontpage')

@section('extra_style')
<style type="text/css">
    .shoping-cart-table input {
        min-width: 50px;
    }
    .dataTable{
        margin-top:0 !important;
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
                    <form id="keranjang_checkout">
                        @csrf
                        <table class="w-100" id="detail_keranjang">
                            <thead>
                                <tr>
                                    <th class="thumbnail-header">Keranjang Belanja Anda</th>
                                </tr>
                            </thead>
                        </table>
                    </form>
                    <div class="caption" style="padding:0;">
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

        $('#detail_keranjang').on('click','.tambah',function(){
            ajax_helper('{{route("updatecart.keranjang")}}', 'POST', {
                    '_token': '{{csrf_token()}}',
                    'produk': $(this).parents('tr').find('.id_produk').val(),
                    'tambah': 'T'
                });
        })

        $('#detail_keranjang').on('click','.kurang',function(){
            ajax_helper('{{route("updatecart.keranjang")}}', 'POST', {
                    '_token': '{{csrf_token()}}',
                    'produk': $(this).parents('tr').find('.id_produk').val(),
                    'kurang': 'T'
                });
        })

        $('#cart').on('change',function(){
            stocknya = $(this).val();

        })

        function ajax_helper(url, type, data) {
            $.ajax({
                url: url,
                type: type,
                data: data,
                success: function (get) {
                    // swal("Informasi!", success, "success");
                    table.ajax.reload();
                    // $(':input').val('');
                },
                error: function (xhr, textStatus, errorThrowl) {
                    // swal("Gagal!", error, "error");
                    // $(':input').val('');
                }

            })
        }

        setInterval(function () {
            $('#itemt').html($('.count').length);
        }, 500);

            var totall = $('.total_harga').length;
            $('#count').val(totall);
            console.log(totall);
            var total = 0;
            console.log($('.total_harga').length);
            $('.total_harga').each(function() {
                var ini = $(this).val();
                total += parseFloat(ini);
            });

        $('#totalview').html('Rp. ' + total);

        $('#detail_keranjang').on('click','.remove',function () {
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
                    table.ajax.reload();
                }
            })

        })

        var table = $('#detail_keranjang').DataTable({
            responsive: true,
            serverSide: true,
            destroy : true,
            ordering: false,
            bFilter: false, 
            bInfo: false,
            paging : false,
            ajax: {
                url: "{{ route('detail.keranjang') }}",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}"
                }
            },
            columns: [
                {data: 'detail'},
            ],
            pageLength: 10,
            lengthMenu: [[10, 20, 50, -1], [10, 20, 50, 'All']]
        });

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