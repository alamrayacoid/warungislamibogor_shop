<?php $__env->startSection('extra_style'); ?>
<style type="text/css">


</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    
            <div class="row">
                <div class="col-lg-12">

                    <div class="ibox product-detail">
                        <div class="ibox-content">

                            <div class="row">
                                <div class="col-md-5">


                                    <div class="product-images product-imitations" >
                                        
                                        <?php $__currentLoopData = $gambar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roww): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($roww->ip_ciproduct): ?>
                                                <div>
                                                    <a href="/warungislamibogor/storage/image/master/produk/<?php echo e($roww->ip_path); ?>" sty data-gallery="">
                                                        
                                                        <img src="/warungislamibogor/storage/image/master/produk/<?php echo e($roww->ip_path); ?>">
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>

                                </div>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-7">

                                    <h2 class="font-bold m-b-xs">
                                        <?php echo e($row->i_name); ?>

                                    </h2>
                                    <small><?php echo e($row->itp_tagtitle); ?></small>
                                    <div class="m-t-md">
                                        <h2 class="product-main-price">Rp. <?php echo e($row->ipr_sunitprice); ?> <small class="text-muted">Termasuk Pajak</small> </h2>
                                    </div>

                                        <div class="product-qty">
                                            <label>Qty</label>
                                            <div class="group-product-qty">
                                                <input type="number" id="qty" value="1" min="1" class="form-control" name="">
                                            </div>
                                            <select class="form-control" id="cabang" name="">
                                                    <option value="" selected>~ pilih cabang ~</option>
                                                    <?php $__currentLoopData = $cabang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cbng): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($cbng->b_code); ?>"><?php echo e($cbng->c_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <select class="form-control" id="label" name="">
                                                    <option value="" selected>~ pilih Merk ~</option>
                                                    <?php $__currentLoopData = $label; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($rows->s_code); ?>"><?php echo e($rows->s_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                        </div>
                                    <hr>

                                    <div class="small text-muted">
                                        <?php echo html_entity_decode($row->itp_description); ?>

                                    </div>
                                    <dl class="small m-t-md">
                                        <dt>Tag Keyword</dt>
                                        <dd><?php echo e($row->itp_tagkeyword); ?></dd>
                                        <dt>Category</dt>
                                        <dd><?php echo e($row->ity_name); ?></dd>
                                    </dl>
                                    <hr>

                                    <div>
                                        <div class="btn-group">
                                            <?php if(Auth::check()): ?>
                                            <button class="btn btn-primary btn-sm" id="addcart" data-product="<?php echo e($code); ?>"><i class="fa fa-cart-plus"></i> Add to cart</button>
                                            <button class="btn btn-white btn-sm"><i class="fa fa-star"></i> Add to wishlist </button>
                                            <?php else: ?>
                                            <button class="btn btn-primary btn-sm" onclick="window.location.href='http://localhost/warungislamibogor_shop/signin'"><i class="fa fa-cart-plus"></i> Add to cart</button>
                                            <button class="btn btn-white btn-sm" onclick="window.location.href='http://localhost/warungislamibogor_shop/signin'"><i class="fa fa-star"></i> Add to wishlist </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                        </div>
                        <div class="ibox-footer">
                            <span class="pull-right">
                                Full stock - <i class="fa fa-clock-o"></i> 14.04.2016 10:04 pm
                            </span>
                            The generated Lorem Ipsum is therefore always free
                        </div>
                    </div>

                </div>
            </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra_script'); ?>
<script>
    $(document).ready(function(){
        $('#ncart').html($('.ncart').length);


        $('#addcart').on('click',function(){
            var cproduct = $(this).data('product');
            var label = $('#label').val();
            var qty = $('#qty').val();
            var cabang = $('#cabang').val();
            $.ajax({
                url : '<?php echo e(route("addcart")); ?>',
                method : 'POST',
                data : {
                    '_token' : '<?php echo e(csrf_token()); ?>',
                    'code' : cproduct,
                    'user' : 'user',
                    'cart_label' : label,
                    'cart_qty' : qty,
                    'cart_location' : cabang,
                },
                success : function(get){
                    console.log(get);
                    console.log(get['error']);  
                    if (get['error'] == 'error') {
                            iziToast.error({
                                        title: 'Gagal!',
                                        message: 'Cabang dan Merk kosong / Barang Sudah Di Keranjang',
                                    });
                        }else if(get['done'] == 'done'){
                            iziToast.success({
                                        title: 'Berhasil!',
                                        message: 'Memasukkan Barang ke Keranjang',
                                    });
                            setTimeout(function(){
                                 window.location.href="<?php echo e(route('home')); ?>";
                             },1000);
                        }else if(get['error'] == 'stock'){
                            iziToast.error({
                                        title: 'Gagal!',
                                        message: 'Stock Gudang Tinggal '+get['stock'],
                                    });
                            iziToast.warning({
                                        title: 'Peringatan!',
                                        message: 'Cek Merk Yang Dimasukkan',
                                    });
                        }
                },
                error:function(xhr,textStatus,errorThrow){
                                iziToast.error({
                                title: 'Gagal!',
                                message: 'Masukkan Cabang dan Merk Barang',
                            });
                        }
            })
        })

        $('.product-images').slick({
            autoplay:true,
            autoplaySpeed:5000,
            dots: true,
            centerMode: true,
            infinite: true,
        });

    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontpage.main-frontpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\warungislamibogor_shop\resources\views/frontpage/produk/produk-detail-frontpage.blade.php ENDPATH**/ ?>