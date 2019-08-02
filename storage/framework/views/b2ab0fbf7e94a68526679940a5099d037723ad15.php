<?php $__env->startSection('content'); ?>
<style>

</style>
<section style="margin-top:5em">
    <ol class="breadcrumb breadcumb-header">
        <li><a href="#">Home</a></li>
        <li><a href="#">Kategori Produk</a></li>
        <li class="active"><?php echo e($namakategori->ity_name); ?></a></li>
    </ol>
    <div class="row header-search-filter-group">
        <div class="col-md-6">

            <div class="text-header-filter">
                Kategori Produk <?php echo e($namakategori->ity_name); ?>

            </div>

        </div>
        <div class="col-md-6 column-opsi-filter-group">
            <button class="btn-filter-opsi"><i class="fa fa-th" aria-hidden="true"></i></button>
            <button class="btn-filter-opsi"><i class="fa fa-list-ul" aria-hidden="true"></i></button>
            <span>Urutkan<span>
                    <Select class="select-opsi-filter">
                        <option>Terbaru</option>
                        <option>Termurah</option>
                        <option>Termahal</option>
                        <option>Paling Banyak Dibeli</option>
                    </select>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row ">
            <div class="col-sm-4 col-md-3 col-lg-2">
                <h5 class="entry-v-nav__heading pt-5">Cari Lebih Detail</h5>
                <div class="product-filter-field-group">
                    <h5 class="entry-v-nav__heading">Kategori</h5>
                    <ul>
                        <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(route('kategori-produk',['id'=> $row->ity_name ])); ?>"
                                style="color:#009a51 !important;"><?php echo e($row->ity_name); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <form action="<?php echo e(route('produk-frontpage')); ?>" method="get">
                    <div class="product-filter-field-group">
                        <h5 class="entry-v-nav__heading">Nama Produk</h5>
                        <div class="form-group">
                            <input type="text" id="nama_produk" name="nama_produk" value="" placeholder="Nama Produk"
                                class="form-control">
                        </div>
                    </div>
                    <div class="product-filter-field-group">
                        <h5 class="entry-v-nav__heading">Jenis Produk</h5>
                        <div class="form-group">
                            <select name="jenis" id="jenis" class="form-control select2">
                                <option value="All">Semua</option>
                                <?php $__currentLoopData = $tipe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($row->ity_code); ?>"><?php echo e($row->ity_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="product-filter-field-group">
                        <h5 class="entry-v-nav__heading">Rentang Harga</h5>
                        <div class="form-group">
                            <input type="text" id="harga_min" name="harga_min" value="" placeholder="Min"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" id="harga_max" name="harga_max" value="" placeholder="Max"
                                class="form-control">
                        </div>
                        <input type="submit" name="" class="btn-submit-filter-item" value="Cari Sekarang">
                    </div>
                </form>
            </div>
            <div class="col-sm-8 col-md-9 col-lg-10 column-product-filter">
                <h5 class="header-product-item-filter">Produk Warung Islami Bogor</h5>
                <div class="row">
                    <?php if($test != '[]'): ?>
                    <?php $__currentLoopData = $test; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 column-product-item">
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
                                    style="background:url('/warungislamibogor/storage/image/master/produk/<?php echo e($roww->ip_path); ?>')">
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
                                        <div class="price-product-item">Rp. <?php echo e($row->ipr_sunitprice); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                <div class="column-empty-transaction">
                        <img src="<?php echo e(asset('assets/img/img-product/empty-transaction.png')); ?>">
                        <h5>Oops, Produk Yang Anda Cari Tidak Ada.</h5>
                    <div class="d-flex justify-content-center">
                    <a href="<?php echo e(url('/')); ?>"><button>Cari Produk Sekarang</button></a>
                    </div>
                </div>
                                        <?php endif; ?>
                </div>
            </div>
        </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('extra_script'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('#ncart').html($('.ncart').length);

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

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontpage.main-frontpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\warungislamibogor_shop\resources\views/frontpage/produk/produk-kategori-frontpage.blade.php ENDPATH**/ ?>