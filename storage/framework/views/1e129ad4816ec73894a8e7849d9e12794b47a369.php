<?php $__env->startSection('content'); ?>
<style>
    .pagination {
        float: right;
        margin: 2em 15px 1em 15px;
    }

    
</style>
<section style="margin-top:4.5em">
    <ol class="breadcrumb breadcumb-header" style="margin-bottom: 0 !important;">
        <li><a href="#">Home</a></li>
        <li><a href="#">Pencarian</a></li>
        <li class="active"><?php echo e($namabarang); ?></li>
    </ol>
    <section style="border-bottom: 1px solid #efeff4">
    <div class="container-fluid">
    <div class="row header-search-filter-group">
        <div class="col-md-6">
            <div class="text-header-filter">
                Hasil Pencarian Anda <span>"<?php echo e($namabarang); ?>"</span>
            </div>

        </div>
        <div class="col-md-6 column-opsi-filter-group">
            <form action="<?php echo e(route('filter_produk')); ?>" method="get">
            <span>Urutkan<span>&ensp;

            <input type="text" value="<?php echo e($filternama); ?>" name="nama_produk2" hidden>
            <input type="text" value="<?php echo e($filterjenis); ?>" name="jenis2" hidden>
            <input type="text" value="<?php echo e($filterhargamax); ?>" name="harga_min2" hidden>
            <input type="text" value="<?php echo e($filterhargamin); ?>" name="harga_max2" hidden>
                <Select class="select-opsi-filter"id="status_filter" name="status_filter">
                    <option value="terbaru" <?php echo e(('terbaru' == $statusfilter) ? 'selected' : ''); ?>>Terbaru</option>
                    <option value="termurah" <?php echo e(('termurah' == $statusfilter) ? 'selected' : ''); ?>>Termurah</option>
                    <option value="termahal" <?php echo e(('termahal' == $statusfilter) ? 'selected' : ''); ?>>Termahal</option>
                </select>
                <input type="submit" name="" class="btn-submit-filter-item" id="filter_status--btn" value="Cari Sekarang" hidden>
            </form>
        </div>
    </div>
</div>
</Section>
    <div class="container-fluid">
        <div class="row ">
            <div class="col-sm-4 col-md-3 col-lg-2 sidebar-filter-wrapper">
                <div class="header--filter-sidebar" data-toggle="collapse" data-target="#kategori">
                <h5 class="entry-v-nav__heading pt-5">Cari Lebih Detail</h5>
                <button type="button" class="btn btn-more-filter" style="position: relative;right: 5px;" ><i class="fa fa-plus"></i></button>
                </div>
                <div class="product-filter-field-group collapse" id="kategori">
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
                        <div class="header--filter-sidebar" data-toggle="collapse" data-target="#produk">
                            <h5 class="entry-v-nav__heading pt-5">Nama Produk</h5>
                            <button type="button" class="btn btn-more-filter"><i class="fa fa-plus"></i></button>
                        </div>
                        <div class="collapse" id="produk">
                        <div class="form-group">
                            <input type="text" id="nama_produk" name="nama_produk" value="<?php echo e($filternama); ?>" placeholder="Nama Produk"
                                class="form-control">
                        </div>
                    </div>
                    </div>
                    <div class="product-filter-field-group">
                        <div class="header--filter-sidebar" data-toggle="collapse" data-target="#jenisproduk">
                            <h5 class="entry-v-nav__heading pt-5">Jenis Produk</h5>
                            <button type="button" class="btn btn-more-filter" ><i class="fa fa-plus"></i></button>
                        </div>
                        <div class="collapse" id="jenisproduk">
                        <div class="form-group">
                            <select name="jenis" id="jenis" class="form-control select2">
                                <option value="All" <?php echo e(($filterjenis == 'ALL') ? 'selected' : ''); ?>>Semua</option>
                                <?php $__currentLoopData = $tipe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($row->ity_code); ?>" <?php echo e(($row->ity_code == $filterjenis) ? 'selected' : ''); ?>><?php echo e($row->ity_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="product-filter-field-group">
                        <div class="header--filter-sidebar" data-toggle="collapse" data-target="#hargaprodukfilter">
                            <h5 class="entry-v-nav__heading pt-5">Rentang Harga</h5>
                            <button type="button" class="btn btn-more-filter" ><i class="fa fa-plus"></i></button>
                        </div>
                    <div class="collapse" id="hargaprodukfilter">
                        <div class="form-group">
                            <input type="text" id="harga_min" name="harga_min" value="<?php echo e($filterhargamin); ?>" placeholder="Min"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" id="harga_max" name="harga_max" value="<?php echo e($filterhargamax); ?>" placeholder="Max"
                                class="form-control">
                        </div>
                        <input type="submit" name="" class="btn-submit-filter-item" value="Cari Sekarang">
                    </div>
                </div>
                </form>
            </div>
            <div class="col-sm-8 col-md-9 col-lg-10 column-product-filter">
                <h5 class="header-product-item-filter">Produk Warung Islami Bogor</h5>
                <!-- jangan dihapus -->
                <!-- end -->
                <div class="row">
                    <?php if($cekdata != '[]'): ?>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 column-product-item">
                        <div class="thumbnail product-box-item">
                            <div class="product-box">
                            <?php if(Auth::check()): ?>
                            <?php if($row->wl_ciproduct == null): ?>
                            <button class="btn btn-wishlist-frontpage" type="button" data-ciproduct="<?php echo e($row->i_code); ?>"><i class="fa fa-heart"></i></button>
                            <?php else: ?>
                            <button class="btn btn-wishlist-frontpage" type="button" data-ciproduct="<?php echo e($row->i_code); ?>"><i class="fa fa-heart icon-onwishlist"></i></button>
                            <?php endif; ?>
                            <?php else: ?>
                            <a href="<?php echo e(route('login-frontpage')); ?>"><button class="btn btn-wishlist-frontpage" type="button"><i class="fa fa-heart"></i></button></a>
                            <?php endif; ?>
                                <?php $__currentLoopData = $gambar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roww): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($row->i_code == $roww->ip_ciproduct): ?>
                                <div class="image-product-box"
                                    style="background:url('env('APP_WIB')}}storage/image/master/produk/<?php echo e($roww->ip_path); ?>')">
                                    <!-- <img src="/warungislamibogor/storage/image/master/produk/<?php echo e($roww->ip_path); ?>"> -->
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
                                        <a href="<?php echo e(url('product',$row->i_link)); ?>"
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
                                    <?php if($row->gpp_sellprice == null): ?>
                                    <div class="price-product-item">
                                        Rp. <?php echo e($row->ipr_sunitprice); ?>

                                    </div>
                                    <?php else: ?>
                                    <div class="price-product-item">
                                        Rp. <?php echo e($row->gpp_sellprice); ?>

                                    </div>
                                    <?php endif; ?>
                                    <div class="">
                                        <i class="fa fa-tag" style="color: #009a51;"></i>&ensp;<span style="color: #595959;"><?php echo e($row->ity_name); ?></span>
                                    </div>
                                </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-12" style="margin-bottom: 3em;">
                        <?php echo e($data->appends(request()->input())->Links()); ?>

                    </div>
                    
                    <!--  -->
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

        $('.btn-wishlist-frontpage').click(function () {
            
            var code = $(this).data('ciproduct');
            $(this).find('i').toggleClass('icon-onwishlist');
               var code = $(this).data('ciproduct');
                $.ajax({
                    url: '<?php echo e(route("addwishlist")); ?>',
                    method: 'POST',
                    data: {
                        '_token': '<?php echo e(csrf_token()); ?>',
                        'code': code,
                    },

                })
        });
        $('#status_filter').change(function(){
            $('#filter_status--btn').click();
        });
        $('.header--filter-sidebar').click(function(){
        $(this).find('i').toggleClass('fa-minus');
    });

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontpage.main-frontpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\warungislamibogor_shop\resources\views/frontpage/produk/produk-frontpage.blade.php ENDPATH**/ ?>