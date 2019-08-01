<?php $__env->startSection('extra_style'); ?>
<style type="text/css">

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section style="margin-top:5em;">
    <ol class="breadcrumb breadcumb-header">
        <li><a href="#">Home</a></li>
        <li><a href="">Barang Favorit</a></li>
    </ol>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-2" style="padding:0;">
                <div class="thumbnail profile-frame--sidebar">
                    <div class="d-flex align-items-center padding-0-15">
                        <img src="/warungislamibogor_shop/storage/image/member/profile/<?php echo e(Auth::user()->cm_path); ?>"
                            width="50px" height="50px">
                        <h5 class="title-profile-sidebar"><?php echo e(Auth::user()->cm_name); ?></h5>
                    </div>
                    <div class="mt-4 padding-0-15">
                        <div class="">
                            <span class="fs-12 text-black-54">Kelengkapan Profil</span>
                            <span class="fs-11 text-black-7 bold pull-right">60%</span>
                        </div>
                        <div class="profile-progress-bar mt-2">
                            <div class="profile-progress-bar-status" style="width: 60%;"></div>
                        </div>
                        <div class="text-right">
                            <a href="" class="c-primary-wib fs-12 semi-bold">Lengkapi Sekarang&ensp;<i
                                    class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <hr>
                    <div class="">
                        <h5 class="heading-section-profile-frame padding-0-15">Daftar Transaksi</h5>
                        <ul class="list-item-profile-sidebar">
                            <a class="c-primary-wib semi-bold" href="">
                                <li>Daftar Pembelian</li>
                            </a>
                            <a class="c-primary-wib semi-bold" href="">
                                <li class="">Pembayaran</li>
                            </a>
                            <a class="c-primary-wib semi-bold" href="">
                                <li>Sedang diproses</li>
                            </a>
                        </ul>
                    </div>
                    <hr>
                    <div class="">
                        <h5 class="heading-section-profile-frame padding-0-15">Pengiriman</h5>
                        <ul class="list-item-profile-sidebar">
                            <a class="c-primary-wib semi-bold" href="">
                                <li>Proses Pengiriman</li>
                            </a>
                        </ul>
                    </div>
                    <hr>
                    <div class="">
                        <h5 class="heading-section-profile-frame padding-0-15">Profile Saya</h5>
                        <ul class="list-item-profile-sidebar">
                            <a class="c-primary-wib semi-bold" href="">
                                <li>Pengaturan</li>
                            </a>
                            <a class="c-primary-wib semi-bold" href="">
                                <li>Barang Favorit</li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-10" style="padding:0 30px;">
                <div class="tabs-container">
                    <ul class="nav nav-tabs nav-tabs-custom">
                        <li class="active">
                            <a data-toggle="tab" href="#tab-12"><span class="tab-title"><i
                                        class="fa fa-eye"></i>Terakhir Dilihat</span></a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#tab-22"><span class="tab-title"><i
                                        class="fa fa-heart"></i>Barang Favorit</span></a>
                        </li>
                    </ul>
                    <div class="tab-content padding-15-0">
                        <div id="tab-12" class="tab-pane animated fadeIn active">
                            <div class="row mt-5">
                                <div class="col-sm-6 col-md-3">
                                    <div class="thumbnail product-box-item">
                                        <div class="image-product-box"
                                            style="background:url('<?php echo e(asset('assets/img/img-product/product-4.png')); ?>')">
                                        </div>
                                        <div class="caption">
                                            <div class="title-product-group">
                                                <a href="javascript:void(0)" class="title-product-item">Botol Aqua Gelas
                                                    250 mil</a>
                                            </div>
                                            <div class="footer-product-item">
                                                <div class="">
                                                    <i class="fa fa-star f-14 c-gold"></i>
                                                    <i class="fa fa-star c-gold"></i>
                                                    <i class="fa fa-star c-gold"></i>
                                                    <i class="fa fa-star c-gold"></i>
                                                    <i class="fa fa-star c-grey"></i>
                                                </div>
                                                <div class="price-product-item">Rp. 10.000</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="thumbnail product-box-item">
                                        <div class="image-product-box"
                                            style="background:url('<?php echo e(asset('assets/img/img-product/product-3.jpg')); ?>')">
                                        </div>
                                        <div class="caption">
                                            <div class="title-product-group">
                                                <a href="javascript:void(0)" class="title-product-item">Botol Aqua Gelas
                                                    250 mil</a>
                                            </div>
                                            <div class="footer-product-item">
                                                <div class="">
                                                    <i class="fa fa-star f-14 c-gold"></i>
                                                    <i class="fa fa-star c-gold"></i>
                                                    <i class="fa fa-star c-gold"></i>
                                                    <i class="fa fa-star c-gold"></i>
                                                    <i class="fa fa-star c-grey"></i>
                                                </div>
                                                <div class="price-product-item">Rp. 10.000</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <h3 class="title-product-opsi-same">Inspirasi dari minat anda</h3>
                                <div class="col-sm-6 col-md-3">
                                    <div class="thumbnail product-box-item">
                                        <div class="image-product-box"
                                            style="background:url('<?php echo e(asset('assets/img/img-product/product-4.png')); ?>')">
                                        </div>
                                        <div class="caption">
                                            <div class="title-product-group">
                                                <a href="javascript:void(0)" class="title-product-item">Botol Aqua Gelas
                                                    250 mil</a>
                                            </div>
                                            <div class="footer-product-item">
                                                <div class="">
                                                    <i class="fa fa-star f-14 c-gold"></i>
                                                    <i class="fa fa-star c-gold"></i>
                                                    <i class="fa fa-star c-gold"></i>
                                                    <i class="fa fa-star c-gold"></i>
                                                    <i class="fa fa-star c-grey"></i>
                                                </div>
                                                <div class="price-product-item">Rp. 10.000</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="thumbnail product-box-item">
                                        <div class="image-product-box"
                                            style="background:url('<?php echo e(asset('assets/img/img-product/product-3.jpg')); ?>')">
                                        </div>
                                        <div class="caption">
                                            <div class="title-product-group">
                                                <a href="javascript:void(0)" class="title-product-item">Botol Aqua Gelas
                                                    250 mil</a>
                                            </div>
                                            <div class="footer-product-item">
                                                <div class="">
                                                    <i class="fa fa-star f-14 c-gold"></i>
                                                    <i class="fa fa-star c-gold"></i>
                                                    <i class="fa fa-star c-gold"></i>
                                                    <i class="fa fa-star c-gold"></i>
                                                    <i class="fa fa-star c-grey"></i>
                                                </div>
                                                <div class="price-product-item">Rp. 10.000</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="thumbnail product-box-item">
                                        <div class="image-product-box"
                                            style="background:url('<?php echo e(asset('assets/img/img-product/product-4.png')); ?>')">
                                        </div>
                                        <div class="caption">
                                            <div class="title-product-group">
                                                <a href="javascript:void(0)" class="title-product-item">Botol Aqua Gelas
                                                    250 ML</a>
                                            </div>
                                            <div class="footer-product-item">
                                                <div class="">
                                                    <i class="fa fa-star f-14 c-gold"></i>
                                                    <i class="fa fa-star c-gold"></i>
                                                    <i class="fa fa-star c-gold"></i>
                                                    <i class="fa fa-star c-gold"></i>
                                                    <i class="fa fa-star c-grey"></i>
                                                </div>
                                                <div class="price-product-item">Rp. 10.000</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="thumbnail product-box-item">
                                        <div class="image-product-box"
                                            style="background:url('<?php echo e(asset('assets/img/img-product/product-3.jpg')); ?>')">
                                        </div>
                                        <div class="caption">
                                            <div class="title-product-group">
                                                <a href="javascript:void(0)" class="title-product-item">Botol Aqua Gelas
                                                    250 mil</a>
                                            </div>
                                            <div class="footer-product-item">
                                                <div class="">
                                                    <i class="fa fa-star f-14 c-gold"></i>
                                                    <i class="fa fa-star c-gold"></i>
                                                    <i class="fa fa-star c-gold"></i>
                                                    <i class="fa fa-star c-gold"></i>
                                                    <i class="fa fa-star c-grey"></i>
                                                </div>
                                                <div class="price-product-item">Rp. 10.000</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-22" class="tab-pane animated fadeIn">
                            
                            <div class="d-flex">
                                <input placeholder="Cari Barang Favorit Anda" type="text" name="" id="filter-wishlist"
                                    class="form-control input-wishlist-filter">
                                <button class="btn btn-wishlist-filter" type="button"><img
                                        src="http://localhost/warungislamibogor_shop/assets/img/img-product/img-search.svg"></button>
                            </div>
                            <?php if($data != '[]'): ?>
                            <div class="row mt-5">
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-3">
                                    <div class="thumbnail product-box-item">
                                        <div class="product-box">
                                            <?php $__currentLoopData = $gambar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roww): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($row->i_code == $roww->ip_ciproduct): ?>
                                            <div class="image-product-box"
                                                style="background:url('/warungislamibogor/storage/image/master/produk/<?php echo e($roww->ip_path); ?>')">
                                            </div>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <div class="caption">
                                                <?php $__currentLoopData = $wish; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($wis->wl_cmember == Auth::user()->cm_code && $wis->wl_ciproduct ==
                                                $row->i_code): ?>
                                                <div class="product-wishlist onproduk-page onwishlist">
                                                    <button data-ciproduct="<?php echo e($wis->wl_ciproduct); ?>"
                                                        data-member="<?php echo e(Auth::user()->cm_code); ?>"
                                                        class="btn btn-circle btn-lg btn-danger btn-wishlist"
                                                        type="button" title="Tambah ke wishlist"><i
                                                            class="fa-heart fa"></i></button>
                                                </div>
                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($wish == '[]'): ?>
                                                <div class="product-wishlist onproduk-page">
                                                    <button data-ciproduct="<?php echo e($row->i_code); ?>"
                                                        class="btn btn-circle btn-lg btn-wishlist" id="<?php echo e($row->i_code); ?>"
                                                        type="button" title="Tambah ke wishlist"><i
                                                            class="far fa-heart"></i></button>
                                                </div>
                                                <?php endif; ?>
                                                <div class="">
                                                    <div class="title-product-group">
                                                        <a href="<?php echo e(route('produk-detail-frontpage')); ?>?code=<?php echo e($row->i_code); ?>"
                                                            class="title-product-item"><?php echo e($row->i_name); ?></a>
                                                    </div>
                                                    <div class="footer-product-item">
                                                        <div class="">
                                                            <i class="fa fa-star f-14 c-gold"></i>
                                                            <i class="fa fa-star c-gold"></i>
                                                            <i class="fa fa-star c-gold"></i>
                                                            <i class="fa fa-star c-gold"></i>
                                                            <i class="fa fa-star c-grey"></i>
                                                        </div>
                                                        <div class="price-product-item">Rp. Rp. <?php echo e($row->ipr_sunitprice); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <?php else: ?>
                            <div class="column-empty-wishlist mt-4">
                                <div>
                                    <img src="<?php echo e(asset('assets/img/img-product/shopping-bag.png')); ?>" width="150px"
                                        height="150px">
                                </div>
                                <div class="padding-0-15">
                                    <h5>Anda dapat melihat produk di daftar keinginan Anda di sini</h5>
                                    <button class="btn btn-empty-wishlist">Mulai Mencari Produk</button>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row mt-5">

                    </div>
                </div>
            </div>
        </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('extra_script'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('#ncart').html($('.ncart').length);

        $('#btn-hapus').click(function () {
            $('#filter-wishlist').val('');
            $(this).addClass('hidden');
            $('#filter-wishlist').focus();
        })

        $('#filter-wishlist').on('keyup', function () {
            if ($(this).val().length != 0) {
                $('#btn-hapus').removeClass('hidden');
            }
        })

        $('.btn-wishlist').click(function () {
            var code = $(this).data('ciproduct');
            var member = $(this).data('wl_cmember');
            $(this).find('i').toggleClass('fa far');
            $(this).parents('.product-wishlist').toggleClass('onwishlist');
            $.ajax({
                url: '<?php echo e(route("addwishlist")); ?>',
                method: 'POST',
                data: {
                    '_token': '<?php echo e(csrf_token()); ?>',
                    'code': code,
                    'member': member,
                },

            })
        })
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontpage.main-frontpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\warungislamibogor_shop\resources\views/frontpage/wishlist/wishlist-frontpage.blade.php ENDPATH**/ ?>