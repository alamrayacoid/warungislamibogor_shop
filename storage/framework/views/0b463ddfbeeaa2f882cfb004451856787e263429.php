<?php $__env->startSection('extra_style'); ?>
<style type="text/css">
    
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section style="margin-top:5em;">
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <ol class="breadcrumb breadcumb-header">
        <li><a href="#">Home</a></li>
        <li><a href="#">Produk</a></li>
        <li class="active"><?php echo e($row->i_name); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ol>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="ibox product-detail">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="product-images product-imitations" style="outline:none;border:0;">
                                    <?php $__currentLoopData = $gambar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roww): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($roww->ip_ciproduct): ?>
                                    <div>
                                        <a href="env('APP_WIB')}}storage/image/master/produk/<?php echo e($roww->ip_path); ?>" sty
                                            data-gallery="">

                                            <img
                                                src="env('APP_WIB')}}storage/image/master/produk/<?php echo e($roww->ip_path); ?>">
                                        </a>
                                    </div>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>


                            </div>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-7">
                                <div class="col-lg-12">
                                    <h2 class="title-detail-product"><?php echo e($row->i_name); ?>

                                        <span class="text-info-title-detail-product" id="stocknya"></span>
                                    </h2>
                                    <div class="">
                                        <i class="fa fa-star f-14 c-gold"></i>
                                        <i class="fa fa-star c-gold"></i>
                                        <i class="fa fa-star c-gold"></i>
                                        <i class="fa fa-star c-gold"></i>
                                        <i class="fa fa-star c-grey"></i>
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-lg-12">
                                    <p class=""><i class="fa fa-archive"></i>  Offiicial Store</p>
                                    <p class=""><i class="fa fa-clock-o"></i>  05 Januari 2019</p>
                                    <p class=""><i class="fa fa-map-marker"></i>  Pasuruan</p>

                                    <!-- <span><?php echo e($row->itp_tagtitle); ?></span> -->
                                    <div class="m-t-md">
                                        <h2 class="product-detail-price">Rp. <?php echo e($row->ipr_sunitprice); ?> <small
                                                class="text-info-price">Tidak Termasuk Pajak pengiriman</small> </h2>
                                    </div>
                                </div>

                                <div class="col-md-6 p-detail-product-first">
                                    <select id="cabang" name="" class="form-control select2 c-pointer">
                                        <option value="" selected>pilih cabang</option>
                                        <?php $__currentLoopData = $cabang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cbng): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($cbng->b_code); ?>"><?php echo e($cbng->b_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-6 p-detail-product-last">
                                    <select class="form-control c-pointer select2" id="satuan" name="">
                                        <option value="" selected>pilih Satuan</option>
                                        <?php $__currentLoopData = $satuan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($rowss->iu_code); ?>"><?php echo e($rowss->iu_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-12 mt-2 d-flex">
                                    <button class="btn btn-count-product-stock border-right-0" onclick="minus()"><i
                                            class="fa fa-minus"></i></button>
                                    <input type="number" id="qty" value="1" min="1"
                                        class="form-control border-radius-0 text-center jumlahbelibarang" name="">
                                    <button class="btn btn-count-product-stock border-left-0" onclick="plus()"><i
                                            class="fa fa-plus"></i></button>
                                </div>
                                <div class="col-md-12 column-add-cart mt-2 w-100">
                                    <div class="row">
                                        <?php if(Auth::check()): ?>
                                        <div class="col-md-12">
                                            <button class="btn btn-product-detail-cart" id="addcart"
                                                data-product="<?php echo e($code); ?>"><i class="fa fa-cart-plus"></i>&ensp;Tambahkan
                                                ke
                                                keranjang</button>
                                        </div>
                                        <div class="col-md-6 p-detail-product-first">
                                            <button class="btn btn-product-detail-wishlist"><i
                                                    class="fa fa-star"></i>&ensp;Add to wishlist
                                            </button>
                                        </div>
                                        <div class="col-md-6 p-detail-product-last">
                                            <a href="<?php echo e(url('/')); ?>" style="color:#676a6c;"><button
                                                    class="btn btn-product-detail-wishlist">Lihat Produk Lainnya
                                                </button></a>
                                        </div>
                                        <?php else: ?>
                                        <div class="col-md-12 ">
                                            <a href="<?php echo e(url('/')); ?>"><button class="btn btn-product-detail-cart"><i
                                                        class="fa fa-cart-plus"></i> Tambahkan ke keranjang</button>
                                            </a>
                                        </div>
                                        <div class="col-md-6 p-detail-product-first">
                                            <a href="<?php echo e(url('/')); ?>" style="color:#676a6c;"><button class="btn btn-product-detail-wishlist"><i
                                                        class="fa fa-star"></i> Add to wishlist </button></a>
                                        </div>
                                        <div class="col-md-6 p-detail-product-last">
                                        <a href="<?php echo e(url('/')); ?>" style="color:#676a6c;"><button class="btn btn-product-detail-wishlist">Lihat Produk Lainnya
                                            </button></a>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                            <!-- <hr>
                        <dl class="small m-t-md">
                            <dt>Tag Keyword</dt>
                            <dd><?php echo e($row->itp_tagkeyword); ?></dd>
                            <dt>Category</dt>
                            <dd><?php echo e($row->ity_name); ?></dd>
                        </dl>
                        <hr> -->


                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                </div>
                <!-- <div class="ibox-footer">
                <span class="pull-right">
                    Full stock - <i class="fa fa-clock-o"></i> 14.04.2016 10:04 pm
                </span>
                The generated Lorem Ipsum is therefore always free
            </div> -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox product-description">
                    <div class="ibox-title" style="background:#fafafa;">
                        Detail Keterangan Barang
                    </div>
                    <div class="ibox-content">
                        <div class="small text-muted" style="line-height:2;">
                            <?php echo html_entity_decode($row->itp_description); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if($produksejenis == '[]'): ?>
            <?php else: ?>
            <h3 class="title-product-opsi-same">Pembeli Yang Melihat Barang Ini, Juga Tertarik Dengan</h3>
            <?php $__currentLoopData = $produksejenis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- <?php if($rows->itp_citype == $typeproduk->itp_citype && $rows->i_code != $typeproduk->i_code): ?> -->
            <div class="col-lg-product col-md-3 col-sm-6 ">
                <div class="thumbnail product-box-item">
                    <?php $__currentLoopData = $gambarsejenis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roww): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($rows->i_code == $roww->ip_ciproduct): ?>
                    <div class="image-product-box"
                        style="background:url('env('APP_WIB')}}storage/image/master/produk/<?php echo e($roww->ip_path); ?>')">
                    </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="caption">
                        <div class="title-product-group">
                            <a href="<?php echo e(route('produk-detail-frontpage')); ?>?code=<?php echo e($rows->i_code); ?>"
                                class="title-product-item"><?php echo e($rows->i_name); ?></a>
                        </div>
                        <div class="footer-product-item">
                            <div class="">
                                <i class="fa fa-star f-14 c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-grey"></i>
                            </div>
                            <div class="price-product-item">Rp. <?php echo e($rows->ipr_sunitprice); ?></div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- <?php endif; ?> -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
</section>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra_script'); ?>
<script>
    $(document).ready(function () {
        $('#cabang').on('change', function () {
            setInterval(function () {
                ajax_helper('<?php echo e(route("stock_check")); ?>', 'POST', {
                    '_token': '<?php echo e(csrf_token()); ?>',
                    'cabang': $('#cabang').val(),
                    'produk': '<?php echo e($code); ?>'
                });
            }, 3000);
        })

        function ajax_helper(url, type, data, success, error, modal) {
            $.ajax({
                url: url,
                type: type,
                data: data,
                success: function (get) {
                    if (get['stock'] >= 21) {
                        $('#stocknya').text('stock ' + get['stock']);

                    } else {
                        $('#stocknya').text('Tersisa ' + get['stock']);
                    }
                    $('#stocknya').addClass('selected');
                    // swal("Informasi!", success, "success");
                    modal;
                    success;
                    // table.ajax.reload();
                    // $(':input').val('');
                },
                error: function (xhr, textStatus, errorThrowl) {
                    // swal("Gagal!", error, "error");
                    // $(':input').val('');
                }

            })
        }

        $('#ncart').html($('.ncart').length);


        $('#addcart').on('click', function () {
            var cproduct = $(this).data('product');
            var qty = $('#qty').val();
            var cabang = $('#cabang').val();
            $.ajax({
                url: '<?php echo e(route("addcart")); ?>',
                method: 'POST',
                data: {
                    '_token': '<?php echo e(csrf_token()); ?>',
                    'code': cproduct,
                    'user': 'user',
                    'cart_qty': qty,
                    'satuan': $('#satuan').val(),
                    'cart_location': cabang,
                },
                success: function (get) {
                    console.log(get);
                    console.log(get['error']);
                    if (get['error'] == 'error') {
                        iziToast.error({
                            title: 'Gagal!',
                            message: 'Cabang dan Merk kosong / Barang Sudah Di Keranjang',
                        });
                    } else if (get['done'] == 'done') {
                        iziToast.success({
                            title: 'Berhasil!',
                            message: 'Memasukkan Barang ke Keranjang',
                        });
                        // setTimeout(function () {
                        //     window.location.href = "<?php echo e(route('home')); ?>";
                        // }, 1000);
                    } else if (get['error'] == 'stock') {
                        iziToast.error({
                            title: 'Gagal!',
                            message: 'Stock Gudang Tinggal ' + get['stock'],
                        });
                        iziToast.warning({
                            title: 'Peringatan!',
                            message: 'Cek Merk Yang Dimasukkan',
                        });
                    }
                },
                error: function (xhr, textStatus, errorThrow) {
                    iziToast.error({
                        title: 'Gagal!',
                        message: 'Masukkan Cabang dan Merk Barang',
                    });
                }
            })
        })

        $('.product-images').slick({
            autoplay: true,
            autoplaySpeed: 5000,
            dots: false,
            infinite: true,
        });
    });


    function plus() {
        var countEl = parseInt($("#qty").val());
        count = countEl + 1;
        $('#qty').val(count);
    }

    function minus() {
        var countEl = parseInt($("#qty").val());
        if (count > 1) {
            count = countEl - 1;
            $('#qty').val(count);
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontpage.main-frontpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\warungislamibogor_shop\resources\views/frontpage/produk/produk-detail-frontpage.blade.php ENDPATH**/ ?>