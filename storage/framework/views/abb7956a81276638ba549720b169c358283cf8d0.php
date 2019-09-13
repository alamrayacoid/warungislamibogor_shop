<?php $__env->startSection('extra_style'); ?>
<style type="text/css">
    .shoping-cart-table input {
        min-width: 50px;
    }

    .dataTable {
        margin-top: 0 !important;
    }

    table.dataTable {
        margin-top: 0 !important;
        margin-bottom: 0 !important;
    }

    #table-cart {
        width: 100% !important;
    }

    .border-top-0 {
        border-top: 0 !important;
    }

    .dataTables_wrapper {
        padding-bottom: 0 !important;
    }
    .loader-wrapper-element {
        border: 3px solid #f3f3f3;
        border-radius: 50%;
        border-top: 3px solid #009a51;
        width: 25px;
        height: 25px;
        -webkit-animation: spin 2s linear infinite;
        /* Safari */
        animation: spin 1s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes  spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .loader-element-wib-group {
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section style="margin-top:4.5em;min-height:100vh;">
    <ol class="breadcrumb breadcumb-header">
        <li><a href="#">Home</a></li>
        <li class="active">Keranjang Belanja</li>
    </ol>
    <div class="loader-wib"></div>
    <div class="container-fluid">
        <?php if($produk != '[]'): ?>
        <div class="row mt-5 mb-5">
            <div class="col-md-7">
                <div class="thumbnail">
                    <form id="keranjang_checkout">
                        <?php echo csrf_field(); ?>
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
                            <table id="table-cart">
                                <thead>
                                    <tr>
                                        <th> </th>
                                    </tr>
                                </thead>
                            </table>
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
            <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input type="text" value="<?php echo e($row->ipr_sunitprice * $row->cart_qty); ?>" class="subtotal" hidden>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <input type="text" value="<?php echo e(Auth::user()->cm_id); ?>" id="idcustomer" hidden>
            <div id="cart-subtotal-group">

            </div>
        </div>
    </div>
    <?php else: ?>
    <div class="col-lg-12 column-empty-cart">
        <img src="<?php echo e(asset('assets/img/img-product/empty-cart.png')); ?>">
        <h5 class="">Belum Ada Barang di Keranjang Belanja Anda</h5>
        <p class="">Nikmati kemudahan berbelanja Di Online Shop Warung Islami Bogor</p>
        <a href="<?php echo e(url('/')); ?>"><button class="">Ayo Belanja Sekarang </button></a>
        <div>
        </div>
    </div>

    <?php endif; ?>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('extra_script'); ?>
<script type="text/javascript">
    $(document).ready(function () {

        $('#detail_keranjang').on('click', '.tambah', function () {
            $('#detail_keranjang button').attr('disabled',true);
            ajax_helper('<?php echo e(route("updatecart.keranjang")); ?>', 'POST', {
                '_token': '<?php echo e(csrf_token()); ?>',
                'produk': $(this).parents('tr').find('.id_produk').val(),
                'tambah': 'T'
            });
        })

        $('#detail_keranjang').on('click', '.kurang', function () {
            $('#detail_keranjang button').attr('disabled',true);
            ajax_helper('<?php echo e(route("updatecart.keranjang")); ?>', 'POST', {
                '_token': '<?php echo e(csrf_token()); ?>',
                'produk': $(this).parents('tr').find('.id_produk').val(),
                'kurang': 'T'
            });
        })

        $('#cart').on('change', function () {
            stocknya = $(this).val();

        })

        function ajax_helper(url, type, data) {
            $('.column-right-cart-item-product').append(
                    '<div class="loader-element-wib-group" id="cart-loading-nav"><div class="loader-wrapper-element"></div></div>'
                    );
            $('.column-full-price-cart').append(
                    '<div class="loader-element-wib-group" id="cart-loading-nav"><div class="loader-wrapper-element"></div></div>'
                    );
            $('.text-price-cart-item').addClass('d-none');
            $('.column-right-cart-item-product button').addClass('d-none');
            $('.text-price-cart-product').addClass('d-none');
            $.ajax({
                url: url,
                type: type,
                data: data,
                success: function (get) {
                    // swal("Informasi!", success, "success");
                    table.ajax.reload();
                    tableid.ajax.reload();
                    $.ajax({
                        url: "<?php echo e(route('getnow_price-cart')); ?>",
                        data: {
                            'idcustomer': $('#idcustomer').val(),
                        },
                    success: function (data) {
                        document.getElementById('cart-subtotal-group').innerHTML = data;
                        var totalnow = 0
                        $('.subtotalnow').each(function () {
                        var ini = $(this).val();
                        totalnow += parseFloat(ini);
                    }); 
                    $('#totalview').html('Rp. ' + accounting.formatNumber(totalnow));
                    $('.cart-refresh').DataTable().ajax.reload()
                    $('.loader-element-wib-group').hide();
                    $('.text-price-cart-product').removeClass('d-none');
                }
            });
                },
                error: function (xhr, textStatus, errorThrowl) {
                }

            })
        }

        setInterval(function () {
            $('#itemt').html($('.count').length);
        }, 500);
        var total = 0;
        console.log($('.total_harga').length);
        $('.subtotal').each(function () {
            var ini = $(this).val();
            total += parseFloat(ini);
        });

        $('#totalview').html('Rp. ' + accounting.formatNumber(total));

        $('#detail_keranjang').on('click', '.remove', function () {
            var id = $(this).data('id');
            var code = $(this).data('ciproduct');
            var label = $(this).data('label');
            var jumlah = $(this).data('qty');
            $.ajax({
                url: '<?php echo e(route("remove.keranjang")); ?>',
                method: 'POST',
                data: {
                    '_token': '<?php echo e(csrf_token()); ?>',
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
            destroy: true,
            ordering: false,
            bFilter: false,
            bInfo: false,
            paging: false,
            ajax: {
                url: "<?php echo e(route('detail.keranjang')); ?>",
                type: "post",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>"
                }
            },
            columns: [{
                data: 'detail'
            }, ],
            pageLength: 10,
            lengthMenu: [
                [10, 20, 50, -1],
                [10, 20, 50, 'All']
            ]
        });
        var tableid = $('#table-cart').DataTable({
            responsive: true,
            serverSide: true,
            destroy: true,
            ordering: false,
            bFilter: false,
            bInfo: false,
            paging: false,
            ajax: {
                url: "<?php echo e(route('table_keranjang')); ?>",
                type: "post",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>"
                }
            },
            columns: [{
                data: 'aksi'
            }, ],
            pageLength: 10,
            lengthMenu: [
                [10, 20, 50, -1],
                [10, 20, 50, 'All']
            ]
        })

        $(document).on('click', '.checkouts', function () {
            ;
            var form = $('#keranjang_checkout').serialize();
            $.ajax({
                url: '<?php echo e(route("check.keranjang")); ?>',
                method: 'POST',
                data: form,
                success: function (get) {
                    window.location.href = '<?php echo e(route("checkout")); ?>';
                }
            })
        });
        $('#ncart').html($('.ncart').length);

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontpage.main-frontpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\warungislamibogor_shop\resources\views/frontpage/keranjang/keranjang-frontpage.blade.php ENDPATH**/ ?>