<?php $__env->startSection('extra_style'); ?>
<style type="text/css">
    .testproduk {
        display: flex;
    }

    @keyframes  placeHolderShimmer {
        0% {
            background-position: -468px 0;
        }

        100% {
            background-position: 468px 0;
        }
    }

    .title-product-load {
        background: #f7c703 !important;
        opacity: 0.5;
    }

    .desc-product-load {
        background: #ff5722 !important;
        opacity: 0.5;
    }

    .animated-background,
    .image,
    .text-line,
    .image-product {
        animation-duration: 1.25s;
        animation-fill-mode: forwards;
        animation-iteration-count: infinite;
        animation-name: placeHolderShimmer;
        animation-timing-function: linear;
        background: #f6f6f6;
        background: linear-gradient(to right, #e6e6e6 8%, #f0f0f0 18%, #e6e6e6 33%);
        background-size: 800px 104px;
        height: 96px;
        /* position: relative; */
    }

    .image-product {
        height: 150px;
        width: 100%;

    }

    .image {
        height: 70px;
        width: 70px;
        border-radius: 10px;
    }

    .wrapper-cell {
        display: flex;
        margin-bottom: 30px;
    }

    .text {
        /* margin-left: 20px; */
    }

    .text-line {
        height: 9px;
        border-radius: 5px;

        margin: 4px 0;
    }
    .jscroll-added{
        padding: 0 15px;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="dashboard-frontpage" style="padding:0;">
    <section class="header_wrapper" style="margin-top:6em;">
        <div class="loader-wib" style="margin-bottom:2em;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="text">
                            <div class="text-line" style="width:100%;height:250px"> </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="text">
                            <div class="text-line" style="width:100%;height:120px"> </div>
                            <div style="margin-top:10px;">
                                <div class="text-line" style="width:100%;height:120px"> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5" id="">
                    <div class="col-lg-product col-md-4">
                        <div class="thumbnail product-box-item">
                            <div class="image-product"></div>
                            <div class="caption">
                                <div class="text">
                                    <div class="text-line" style="width:100px;height:13px;border-radius:0;">
                                    </div>
                                    <div class="mt-3">
                                        <div class="text-line title-product-load"
                                            style="width:60px;height:10px;border-radius:0;">
                                        </div>
                                        <div class="mt-3">
                                            <div class="text-line desc-product-load"
                                                style="width:60px;height:10px;border-radius:0;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-product col-md-4">
                        <div class="thumbnail product-box-item">
                            <div class="image-product"></div>
                            <div class="caption">
                                <div class="text">
                                    <div class="text-line" style="width:100px;height:13px;border-radius:0;">
                                    </div>
                                    <div class="mt-3">
                                        <div class="text-line title-product-load"
                                            style="width:60px;height:10px;border-radius:0;">
                                        </div>
                                        <div class="mt-3">
                                            <div class="text-line desc-product-load"
                                                style="width:60px;height:10px;border-radius:0;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-product col-md-4">
                        <div class="thumbnail product-box-item">
                            <div class="image-product"></div>
                            <div class="caption">
                                <div class="text">
                                    <div class="text-line" style="width:100px;height:13px;border-radius:0;">
                                    </div>
                                    <div class="mt-3">
                                        <div class="text-line title-product-load"
                                            style="width:60px;height:10px;border-radius:0;">
                                        </div>
                                        <div class="mt-3">
                                            <div class="text-line desc-product-load"
                                                style="width:60px;height:10px;border-radius:0;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-product col-md-4">
                        <div class="thumbnail product-box-item">
                            <div class="image-product"></div>
                            <div class="caption">
                                <div class="text">
                                    <div class="text-line" style="width:100px;height:13px;border-radius:0;">
                                    </div>
                                    <div class="mt-3">
                                        <div class="text-line title-product-load"
                                            style="width:60px;height:10px;border-radius:0;">
                                        </div>
                                        <div class="mt-3">
                                            <div class="text-line desc-product-load"
                                                style="width:60px;height:10px;border-radius:0;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-product col-md-4">
                        <div class="thumbnail product-box-item">
                            <div class="image-product"></div>
                            <div class="caption">
                                <div class="text">
                                    <div class="text-line" style="width:100px;height:13px;border-radius:0;">
                                    </div>
                                    <div class="mt-3">
                                        <div class="text-line title-product-load"
                                            style="width:60px;height:10px;border-radius:0;">
                                        </div>
                                        <div class="mt-3">
                                            <div class="text-line desc-product-load"
                                                style="width:60px;height:10px;border-radius:0;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-wib d-none">
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
                            <img src="<?php echo e(env('APP_WIB')); ?>storage/image/master/banner/<?php echo e($row->b_image); ?>"
                                style="width:100%;">
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-5">
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
                        <?php if($row->ip_path == null): ?>
                            <div class="image-product-box"
                                  style="background:url('<?php echo e(asset('assets/img/noimage.jpg')); ?>')"
                            alt="Sorry! Image not available at this time">
                            </div>
                            <?php endif; ?>
                        <div class="caption">
                            <div class="title-product-group">
                                <a href="<?php echo e(route('produk-detail-frontpage')); ?>?code=<?php echo e($row->i_code); ?>"
                                    class="title-product-item"><?php echo e($row->i_name); ?></a>
                            </div>
                            <?php if($row->gpp_sellprice == null): ?>
                                    <div class="discount-product-item">
                                        
                                    </div>
                                    <?php else: ?>
                                    <div class="discount-product-item">
                                        <span class="discount-value"><?php echo e(number_format(($row->ipr_sunitprice - $row->gpp_sellprice) / ($row->ipr_sunitprice / 100))); ?>%</span><span class="discount-price"> Rp. <?php echo e($row->ipr_sunitprice); ?></span>
                                    </div>
                                    <?php endif; ?>
                                <div class="footer-product-item">
                                    <div class="">
                                        <i class="fa fa-star f-14 c-gold"></i>
                                        <i class="fa fa-star c-gold"></i>
                                        <i class="fa fa-star c-gold"></i>
                                        <i class="fa fa-star c-gold"></i>
                                        <i class="fa fa-star c-grey"></i>
                                    </div>
                                    <?php if($row->gpp_sellprice == null): ?>
                                    <div class="price-product-item">
                                        Rp. <?php echo e($row->ipr_sunitprice); ?>

                                    </div>
                                    <?php else: ?>
                                    <div class="price-product-item">
                                        Rp. <?php echo e($row->gpp_sellprice); ?>

                                    </div>
                                    <?php endif; ?>
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
                        <?php if($rows->ip_path == null): ?>
                            <div class="image-product-box"
                                  style="background:url('<?php echo e(asset('assets/img/noimage.jpg')); ?>')"
                            alt="Sorry! Image not available at this time">
                            </div>
                            <?php endif; ?>
                        <div class="caption">
                            <div class="title-product-group">
                                <a href="<?php echo e(route('produk-detail-frontpage')); ?>?code=<?php echo e($rows->i_code); ?>"
                                    class="title-product-item"><?php echo e($rows->i_name); ?></a>
                            </div>
                            <?php if($row->gpp_sellprice == null): ?>
                                    <div class="discount-product-item">
                                        
                                    </div>
                                    <?php else: ?>
                                    <div class="discount-product-item">
                                        <span class="discount-value"><?php echo e(number_format(($row->ipr_sunitprice - $row->gpp_sellprice) / ($row->ipr_sunitprice / 100))); ?>%</span><span class="discount-price"> Rp. <?php echo e($row->ipr_sunitprice); ?></span>
                                    </div>
                                    <?php endif; ?>
                                <div class="footer-product-item">
                                    <div class="">
                                        <i class="fa fa-star f-14 c-gold"></i>
                                        <i class="fa fa-star c-gold"></i>
                                        <i class="fa fa-star c-gold"></i>
                                        <i class="fa fa-star c-gold"></i>
                                        <i class="fa fa-star c-grey"></i>
                                    </div>
                                    <?php if($row->gpp_sellprice == null): ?>
                                    <div class="price-product-item">
                                        Rp. <?php echo e($row->ipr_sunitprice); ?>

                                    </div>
                                    <?php else: ?>
                                    <div class="price-product-item">
                                        Rp. <?php echo e($row->gpp_sellprice); ?>

                                    </div>
                                    <?php endif; ?>
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
            <div class="infinite-scroll row">
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-product col-md-4">
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
                                style="background:url('<?php echo e(env('APP_WIB')); ?>storage/image/master/produk/<?php echo e($roww->ip_path); ?>')"
                                alt="Sorry! Image not available at this time">
                            </div>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($row->ip_path == null): ?>
                            <div class="image-product-box"
                                  style="background:url('<?php echo e(asset('assets/img/noimage.jpg')); ?>')"
                            alt="Sorry! Image not available at this time">
                            </div>
                            <?php endif; ?>
                            <div class="caption">
                                <div class="title-product-group">
                                    <a href="<?php echo e(route('produk-detail-frontpage')); ?>?code=<?php echo e($row->i_code); ?>"
                                        class="title-product-item"><?php echo e($row->i_name); ?></a>
                                </div>
                                <?php if($row->gpp_sellprice == null): ?>
                                    <div class="discount-product-item">
                                        
                                    </div>
                                    <?php else: ?>
                                    <div class="discount-product-item">
                                        <span class="discount-value"><?php echo e(number_format(($row->ipr_sunitprice - $row->gpp_sellprice) / ($row->ipr_sunitprice / 100))); ?>%</span><span class="discount-price"> Rp. <?php echo e($row->ipr_sunitprice); ?></span>
                                    </div>
                                    <?php endif; ?>
                                <div class="footer-product-item">
                                    <div class="">
                                        <i class="fa fa-star f-14 c-gold"></i>
                                        <i class="fa fa-star c-gold"></i>
                                        <i class="fa fa-star c-gold"></i>
                                        <i class="fa fa-star c-gold"></i>
                                        <i class="fa fa-star c-grey"></i>
                                    </div>
                                    <?php if($row->gpp_sellprice == null): ?>
                                    <div class="price-product-item">
                                        Rp. <?php echo e($row->ipr_sunitprice); ?>

                                    </div>
                                    <?php else: ?>
                                    <div class="price-product-item">
                                        Rp. <?php echo e($row->gpp_sellprice); ?>

                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($data->links()); ?>

            </div>
    </section>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('extra_script'); ?>
    <script>
        $(document).ready(function () {
            $('ul.pagination').hide();
            var appendload = `<div class="row mt-5" id="">
                    <div class="col-lg-product col-md-4">
                        <div class="thumbnail product-box-item">
                            <div class="image-product"></div>
                            <div class="caption">
                                <div class="text">
                                    <div class="text-line" style="width:100px;height:13px;border-radius:0;">
                                    </div>
                                    <div class="mt-3">
                                        <div class="text-line title-product-load"
                                            style="width:60px;height:10px;border-radius:0;">
                                        </div>
                                        <div class="mt-3">
                                            <div class="text-line desc-product-load"
                                                style="width:60px;height:10px;border-radius:0;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-product col-md-4">
                        <div class="thumbnail product-box-item">
                            <div class="image-product"></div>
                            <div class="caption">
                                <div class="text">
                                    <div class="text-line" style="width:100px;height:13px;border-radius:0;">
                                    </div>
                                    <div class="mt-3">
                                        <div class="text-line title-product-load"
                                            style="width:60px;height:10px;border-radius:0;">
                                        </div>
                                        <div class="mt-3">
                                            <div class="text-line desc-product-load"
                                                style="width:60px;height:10px;border-radius:0;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-product col-md-4">
                        <div class="thumbnail product-box-item">
                            <div class="image-product"></div>
                            <div class="caption">
                                <div class="text">
                                    <div class="text-line" style="width:100px;height:13px;border-radius:0;">
                                    </div>
                                    <div class="mt-3">
                                        <div class="text-line title-product-load"
                                            style="width:60px;height:10px;border-radius:0;">
                                        </div>
                                        <div class="mt-3">
                                            <div class="text-line desc-product-load"
                                                style="width:60px;height:10px;border-radius:0;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-product col-md-4">
                        <div class="thumbnail product-box-item">
                            <div class="image-product"></div>
                            <div class="caption">
                                <div class="text">
                                    <div class="text-line" style="width:100px;height:13px;border-radius:0;">
                                    </div>
                                    <div class="mt-3">
                                        <div class="text-line title-product-load"
                                            style="width:60px;height:10px;border-radius:0;">
                                        </div>
                                        <div class="mt-3">
                                            <div class="text-line desc-product-load"
                                                style="width:60px;height:10px;border-radius:0;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-product col-md-4">
                        <div class="thumbnail product-box-item">
                            <div class="image-product"></div>
                            <div class="caption">
                                <div class="text">
                                    <div class="text-line" style="width:100px;height:13px;border-radius:0;">
                                    </div>
                                    <div class="mt-3">
                                        <div class="text-line title-product-load"
                                            style="width:60px;height:10px;border-radius:0;">
                                        </div>
                                        <div class="mt-3">
                                            <div class="text-line desc-product-load"
                                                style="width:60px;height:10px;border-radius:0;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;
            $(function() {
            $('.infinite-scroll').jscroll({
                autoTrigger: true,
                loadingHtml: appendload,
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinite-scroll',
                callback: function() {
                $('ul.pagination').remove();
            }
        });
    });
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