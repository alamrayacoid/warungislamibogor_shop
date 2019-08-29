<?php $__env->startSection('extra_style'); ?>
<style type="text/css">
    .testproduk {
        display: flex;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="dashboard-frontpage" style="padding:0;">
    
<section class="header_wrapper" style="margin-top:8em;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7">
                <div class="your-class">
                    <?php $__currentLoopData = $imgslider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div><img src="<?php echo e(env('APP_WIB')); ?>storage/image/master/banner/<?php echo e($row->b_image); ?>"></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="col-md-5 img-header-column" style="padding-left:0;">
                <?php $__currentLoopData = $imgbasic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="img-header-second">
                    <img src="<?php echo e(env('APP_WIB')); ?>storage/image/master/banner/<?php echo e($row->b_image); ?>" style="width:100%;">
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
</section>

<section class="">
    <div class="container-fluid">
    <?php if($popularnull == '[]'): ?>
    <?php else: ?>
        <div class="row">
            <div class="product-opsi-group">
                <h3 class="title-product-opsi">Rekomendasi Produk buat anda</h3>
            </div>
            <div class="slick">
                <?php $__currentLoopData = $rekomendasiproduk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="thumbnail product-box-item-slider">
                    <?php $__currentLoopData = $gambar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roww): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($row->i_code == $roww->ip_ciproduct): ?>
                    <div class="image-product-box"
                        style="background:url('<?php echo e(env('APP_WIB')); ?>storage/image/master/produk/<?php echo e($roww->ip_path); ?>')">
                    </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="caption">
                        <div class="title-product-group">
                            <a href="<?php echo e(route('produk-detail-frontpage')); ?>?code=<?php echo e($row->i_code); ?>" class="title-product-item"><?php echo e($row->i_name); ?></a>
                        </div>
                        <div class="footer-product-item">
                            <div class="">
                                <i class="fa fa-star f-14 c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-grey"></i>
                            </div>
                            <div class="price-product-item">Rp. <?php echo e($row->ipr_sunitprice); ?></div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>

        <?php if($popularnull == '[]'): ?>
        <?php else: ?>
        <div class="row">
            <div class="product-opsi-group">
                <h3 class="title-product-opsi">Produk Paling Banyak Dicari</h3>
            </div>
            <div class="slick">
                <?php $__currentLoopData = $popular; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($rows->i_code == $row->wl_ciproduct): ?>
                <div class="thumbnail product-box-item-slider">
                    <?php $__currentLoopData = $gambar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roww): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($rows->i_code == $roww->ip_ciproduct): ?>
                    <div class="image-product-box"
                        style="background:url('<?php echo e(env('APP_WIB')); ?>storage/image/master/produk/<?php echo e($roww->ip_path); ?>')">
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
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="product-opsi-group">
                <h3 class="title-product-opsi">Semua Produk</h3>
            </div>
        </div>
        <div class="row testingbox">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-product col-md-4 testing">
                <div class="thumbnail product-box-item">
                    <div class="product-box">
                        <?php $__currentLoopData = $wish; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(Auth::check()): ?>
                        <?php if($wis->wl_cmember == Auth::user()->cm_code && $wis->wl_ciproduct == $row->i_code): ?>
                        <div class="product-wishlist onproduk-page onwishlist">
                            <button class="btn btn-circle btn-lg btn-wishlist" data-ciproduct="<?php echo e($row->i_code); ?>"
                                type="button" title="Tambah ke wishlist"><i class="fa-heart fa"></i></button>
                        </div>
                        <?php else: ?>
                        <div class="product-wishlist onproduk-page">
                            <button class="btn btn-circle btn-lg btn-wishlist" data-ciproduct="<?php echo e($row->i_code); ?>"
                                id="<?php echo e($row->i_code); ?>" type="button" title="Tambah ke wishlist"><i
                                    class="far fa-heart"></i></button>
                        </div>
                        <?php endif; ?>
                        <?php else: ?>
                        <div class="product-wishlist onproduk-page">
                            <button class="btn btn-circle btn-lg btn-wishlist" data-ciproduct="<?php echo e($row->i_code); ?>"
                                id="<?php echo e($row->i_code); ?>" type="button" title="Tambah ke wishlist"><i
                                    class="far fa-heart"></i></button>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if($wish == '[]'): ?>
                        <div class="product-wishlist onproduk-page">
                            <button class="btn btn-circle btn-lg btn-wishlist" data-ciproduct="<?php echo e($row->i_code); ?>"
                                id="<?php echo e($row->i_code); ?>" type="button" title="Tambah ke wishlist"><i
                                    class="far fa-heart"></i></button>
                        </div>
                        <?php endif; ?>
                        <?php $__currentLoopData = $gambar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roww): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($row->i_code == $roww->ip_ciproduct): ?>
                        <div class="image-product-box"
                            style="background:url('<?php echo e(env('APP_WIB')); ?>storage/image/master/produk/<?php echo e($roww->ip_path); ?>')">
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="caption">
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
                                <div class="price-product-item">Rp. <?php echo e($row->ipr_sunitprice); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!-- <div class="row">
            <div class="product-opsi-group">
                <h3 class="title-product-opsi">Semua Produk</h3>
                <button class="btn view-more-product">Lihat Semua</button>
            </div>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-6 col-md-3 col-lg-2">
                <div class="thumbnail product-box-item">
                    <div class="image-product-box">
                        <?php $__currentLoopData = $gambar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roww): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($row->i_code == $roww->ip_ciproduct): ?>
                        <img src="/warungislamibogor/storage/image/master/produk/<?php echo e($roww->ip_path); ?>">
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="caption">
                        <a href="<?php echo e(route('produk-detail-frontpage')); ?>?code=<?php echo e($row->i_code); ?>"
                            class="title-product-item"><?php echo e($row->i_name); ?></a>
                        <div class="footer-product-item">
                            <div class="">
                                <i class="fa fa-star f-14 c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-gold"></i>
                                <i class="fa fa-star c-grey"></i>
                            </div>
                            <div class="price-product-item">Rp. <?php echo e($row->ipr_sunitprice); ?></div>
                        </div>
                    </div>
                </div>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div> -->

</section>




<?php $__env->stopSection(); ?>
<?php $__env->startSection('extra_script'); ?>
<script>
    $(document).ready(function () {
        $('#ncart').html($('.ncart').length);

        $(".variable").slick({
            autoplay: true,
            autoplaySpeed: 5000,
            dots: true,
            centerMode: true,
            infinite: true,
            variableWidth: true
        });
        $('.btn-wishlist').click(function () {
            var code = $(this).data('ciproduct');
            $(this).find('i').toggleClass('fa far');
            $(this).parents('.product-wishlist').toggleClass('onwishlist');
            $.ajax({
                url: '<?php echo e(route("addwishlist")); ?>',
                method: 'POST',
                data: {
                    '_token': '<?php echo e(csrf_token()); ?>',
                    'code': code,
                },

            })
        })
        $('.your-class').slick({
            slidesToShow: 1,
            arrows: false,
            autoplay: true,
        });
        $('.slick').slick({
            slidesToShow: 5,
            cssEase: "ease",
            prevArrow: '<button class=" slick-prev-product" aria-label="Previous" type="button"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>',
            nextArrow: '<button class=" slick-next-product" aria-label="Next" type="button"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>',
            autoplay: true,
            responsive: [{
                    breakpoint: 992,
                    settings: {

                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 820,
                    settings: {
                        arrows: false,
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        slidesToShow: 1,
                    }
                },
                {
                    breakpoint: 300,
                    settings: {
                        arrows: false,
                        centerMode: false,
                        slidesToShow: 1,
                    }
                }
            ]
        });

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontpage.main-frontpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\warungislamibogor_shop\resources\views/frontpage/dashboard.blade.php ENDPATH**/ ?>