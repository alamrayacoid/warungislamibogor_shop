<?php $__env->startSection('extra_style'); ?>
<style type="text/css">

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    
    <div class="row dashboard-frontpage">
        
        <div class="col-lg-12 col-md-12 col-sm-12" id="dashboard-content">
            

                    <section class="variable slider">

                        <div>
                            <img alt="image"  class="img-responsive" src="<?php echo e(asset('assets/img/p_big1.jpg')); ?>">

                        </div>
                        <div>
                            <img alt="image"  class="img-responsive" src="<?php echo e(asset('assets/img/p_big3.jpg')); ?>">

                        </div>
                        <div>
                            <img alt="image"  class="img-responsive" src="<?php echo e(asset('assets/img/p_big2.jpg')); ?>">

                        </div>
                        
                    </section>
                    
                    <div class="row mt-5">
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3">
                            <div class="ibox">
                                <div class="ibox-content product-box">
                                    <?php $__currentLoopData = $wish; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(Auth::check()): ?>
                                        <?php if($wis->wl_cmember == Auth::user()->cm_code && $wis->wl_ciproduct == $row->i_code): ?>
                                        <div class="product-wishlist onproduk-page onwishlist">
                                            <button class="btn btn-circle btn-lg btn-wishlist" data-ciproduct="<?php echo e($row->i_code); ?>" type="button" title="Tambah ke wishlist"><i class="fa-heart fa"></i></button>
                                        </div>
                                        <?php else: ?>
                                        <div class="product-wishlist onproduk-page">
                                            <button class="btn btn-circle btn-lg btn-wishlist" data-ciproduct="<?php echo e($row->i_code); ?>" id="<?php echo e($row->i_code); ?>" type="button" title="Tambah ke wishlist"><i class="far fa-heart"></i></button>
                                        </div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                    <div class="product-wishlist onproduk-page">
                                        <button class="btn btn-circle btn-lg btn-wishlist" data-ciproduct="<?php echo e($row->i_code); ?>" id="<?php echo e($row->i_code); ?>" type="button" title="Tambah ke wishlist"><i class="far fa-heart"></i></button>
                                    </div>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($wish == '[]'): ?>
                                    <div class="product-wishlist onproduk-page">
                                        <button class="btn btn-circle btn-lg btn-wishlist" data-ciproduct="<?php echo e($row->i_code); ?>" id="<?php echo e($row->i_code); ?>" type="button" title="Tambah ke wishlist"><i class="far fa-heart"></i></button>
                                    </div>
                                    <?php endif; ?>
                                        <?php $__currentLoopData = $gambar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roww): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($row->i_code == $roww->ip_ciproduct): ?>
                                    <div class="product-imitations">
                                        <img src="/warungislamibogor/storage/image/master/produk/<?php echo e($roww->ip_path); ?>">
                                    </div>
                                    <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div class="product-desc">
                                        <span class="product-price">
                                            Rp. <?php echo e($row->ipr_sunitprice); ?>

                                        </span>
                                        <small class="text-muted"><?php echo e($row->ity_name); ?></small>
                                        <a href="#" class="product-name"> <?php echo e($row->i_name); ?></a>



                                        <div class="small m-t-xs">
                                            <?php echo e($row->itp_tagdesc); ?>

                                        </div>
                                        <div class="m-t text-right">
                                            <form action="<?php echo e(route('produk-detail-frontpage')); ?>" method="GET">
                                                <input type="hidden" name="code" value="<?php echo e($row->i_code); ?>">
                                            <button  class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    

                
        </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('extra_script'); ?>
<script>
    $(document).ready(function(){

        $('#ncart').html($('.ncart').length);

         $(".variable").slick({
            autoplay:true,
            autoplaySpeed:5000,
            dots: true,
            centerMode: true,
            infinite: true,
            variableWidth: true
        });

        $('.btn-wishlist').click(function(){
            var code = $(this).data('ciproduct');
            $(this).find('i').toggleClass('fa far');
            $(this).parents('.product-wishlist').toggleClass('onwishlist');
            $.ajax({
                url : '<?php echo e(route("addwishlist")); ?>',
                method : 'POST',
                data : {
                    '_token' : '<?php echo e(csrf_token()); ?>',
                    'code' : code,
                },

            })
        })
    });    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontpage.main-frontpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\warungislamibogor_shop\resources\views/frontpage/dashboard.blade.php ENDPATH**/ ?>