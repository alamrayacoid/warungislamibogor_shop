<?php $__env->startSection('extra_style'); ?>
<style type="text/css">
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section style="margin-top:4.5em;">
    <ol class="breadcrumb breadcumb-header">
        <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
        <li class="active">Barang Favorit</li>
    </ol>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-2" style="padding:0;">
                <div class="thumbnail profile-frame--sidebar">
                    <div class="d-flex align-items-center padding-0-15">
                        <img src="alamraya.site/warungislamibogor_shop/storage/image/member/profile/<?php echo e(Auth::user()->cm_path); ?>"
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
                            <a href="<?php echo e(route('profile')); ?>" class="c-primary-wib fs-12 semi-bold">Lengkapi
                                Sekarang&ensp;<i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <hr>
                    <div class="">
                        <h5 class="heading-section-profile-frame padding-0-15">Daftar Transaksi</h5>
                        <ul class="list-item-profile-sidebar">
                            <a class="c-primary-wib semi-bold"
                                href="<?php echo e(route('pembelian-semua-frontpage' , ['status' => 1])); ?>">
                                <li>Daftar Pembelian</li>
                            </a>
                            <a class="c-primary-wib semi-bold"
                                href="<?php echo e(route('pembelian-pembayaran-frontpage', ['status' => 2])); ?>">
                                <li class="">Pembayaran</li>
                            </a>
                            <a class="c-primary-wib semi-bold"
                                href="<?php echo e(route('pembelian-diproses-frontpage', ['status' => 3])); ?>">
                                <li>Sedang diproses</li>
                            </a>
                        </ul>
                    </div>
                    <hr>
                    <div class="">
                        <h5 class="heading-section-profile-frame padding-0-15">Pengiriman</h5>
                        <ul class="list-item-profile-sidebar">
                            <a class="c-primary-wib semi-bold"
                                href="<?php echo e(route('pembelian-dikirim-frontpage', ['status' => 4])); ?>">
                                <li>Proses Pengiriman</li>
                            </a>
                        </ul>
                    </div>
                    <hr>
                    <div class="">
                        <h5 class="heading-section-profile-frame padding-0-15">Profile Saya</h5>
                        <ul class="list-item-profile-sidebar">
                            <a class="c-primary-wib semi-bold" href="<?php echo e(route('profile')); ?>">
                                <li>Pengaturan</li>
                            </a>
                            <a class="c-primary-wib semi-bold" href="<?php echo e(route('wishlist-frontpage')); ?>">
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
                                        class="fa fa-eye"></i>&ensp;Terakhir Dilihat</span></a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#tab-22"><span class="tab-title"><i
                                        class="fa fa-heart"></i>&ensp;Barang Favorit</span></a>
                        </li>
                    </ul>
                    <div class="tab-content padding-15-0">
                        <div id="tab-12" class="tab-pane animated fadeIn active">
                            <div class="row mt-5">
                                <?php $__currentLoopData = $lastseen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-6 col-md-3">
                                    <div class="thumbnail product-box-item">
                                        <?php $__currentLoopData = $gambar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roww): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($row->i_code == $roww->ip_ciproduct): ?>
                                        <div class="image-product-box"
                                            style="background:url('env('APP_WIB')}}storage/image/master/produk/<?php echo e($roww->ip_path); ?>')">
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
                                            <div class="footer-product-item">
                                                <div class="price-product-item">Rp. <?php echo e($row->ipr_sunitprice); ?></div>
                                                <div class="">
                                                    <i class="fas fa-tags" style="color: #009a51;"></i>&ensp;<span style="color: #595959;"> <?php echo e($row->ity_name); ?></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <!-- end -->
                            <div class="row mt-5">
                                <?php if($produkseen == '[]'): ?>
                                <?php else: ?>
                                <h3 class="title-product-opsi-same">Inspirasi dari minat anda</h3>
                                <?php $__currentLoopData = $produkseen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-6 col-md-3">
                                    <div class="thumbnail product-box-item">
                                        <?php $__currentLoopData = $gambar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roww): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($rows->i_code == $roww->ip_ciproduct): ?>
                                        <div class="image-product-box"
                                            style="background:url('env('APP_WIB')}}storage/image/master/produk/<?php echo e($roww->ip_path); ?>')">
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
                                                <a href="<?php echo e(url('product',$rows->i_link)); ?>"
                                                    class="title-product-item"><?php echo e($rows->i_name); ?></a>
                                            </div>
                                            <div class="footer-product-item">
                                                <div class="price-product-item">Rp. <?php echo e($row->ipr_sunitprice); ?></div>
                                                <div class="">
                                                    <i class="fas fa-tags" style="color: #009a51;"></i>&ensp;<span style="color: #595959;"> <?php echo e($row->ity_name); ?></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div id="tab-22" class="tab-pane animated fadeIn">

                            <div class="d-flex">
                                <input placeholder="Cari Barang Favorit Anda" type="text" name=""
                                    class="form-control input-wishlist-filter searchwishlist">
                                <button class="btn btn-wishlist-filter" type="button"><img src="<?php echo e(asset('assets/img/img-product/img-search.svg')); ?>"></button>

                            </div>
                            <?php if($data != '[]'): ?>
                            <div class="row" style="margin-top: 1em;">
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-3 wishlist-content">
                                    <div class="thumbnail product-box-item">
                                        <div class="product-box">
                                <?php if($row->ip_path == null): ?>
                                <div class="image-product-box"
                                      style="background:url('<?php echo e(asset('assets/img/noimage.jpg')); ?>')"
                                    alt="Sorry! Image not available at this time">
                                </div>
                                <?php endif; ?>
                                            <?php $__currentLoopData = $gambar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roww): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($row->i_code == $roww->ip_ciproduct): ?>
                                            <div class="image-product-box"
                                                style="background:url('env('APP_WIB')}}storage/image/master/produk/<?php echo e($roww->ip_path); ?>')">
                                            </div>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <div class="caption">
                            <?php $__currentLoopData = $wish; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(Auth::check()): ?>
                            <?php if($wis->wl_cmember == Auth::user()->cm_code && $wis->wl_ciproduct == $row->i_code): ?>

                            <button class="btn btn-wishlist-frontpage second-right-wishlist" type="button" data-ciproduct="<?php echo e($row->i_code); ?>"><i class="fa fa-heart"></i></button>
                            <?php break; ?>
                            <?php else: ?>
                            <button class="btn btn-wishlist-frontpage second-right-wishlist" type="button" data-ciproduct="<?php echo e($row->i_code); ?>"><i class="fa fa-heart icon-onwishlist"></i></button>
                            <?php break; ?>
                            <?php endif; ?>
                            <?php else: ?>
                            
                                <a href="<?php echo e(route('login-frontpage')); ?>"><button class="btn btn-wishlist-frontpage second-right-wishlist" type="button" data-ciproduct="<?php echo e($row->i_code); ?>"><i class="fa fa-heart"></i></button></a>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($wish == '[]'): ?>
                            <button class="btn btn-wishlist-frontpage second-right-wishlist" type="button" data-ciproduct="<?php echo e($row->i_code); ?>"><i class="fa fa-heart"></i></button>
                            <?php endif; ?>
                                                <div class="">
                                                    <div class="title-product-group">
                                                        <a href="<?php echo e(url('product',$row->i_link)); ?>"
                                                            class="title-product-item"><?php echo e($row->i_name); ?></a>
                                                    </div>
                                                    <div class="footer-product-item">
                                                        <div class="price-product-item">Rp.
                                                            <?php echo e($row->ipr_sunitprice); ?>

                                                        </div>
                                                        <div class="">
                                                            <i class="fas fa-tags" style="color: #009a51;"></i>&ensp;<span style="color: #595959;"> <?php echo e($row->ity_name); ?></span>
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
                                    <a href="<?php echo e(url('/')); ?>"><button class="btn btn-empty-wishlist">Mulai Mencari
                                            Produk</button></a>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
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

        $('.btn-wishlist-frontpage').click(function(){
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
    });
    $(document).ready(function () {
        $('.searchwishlist').keyup(function () {

            // Search text
            var text = $(this).val().toLowerCase();

            // Hide all content class element
            $('.wishlist-content').hide();

            // Search 
            $('.wishlist-content .title-product-item').each(function () {
                if ($(this).text().toLowerCase().indexOf("" + text + "") != -1) {
                    $(this).closest('.wishlist-content').fadeIn('slow');
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontpage.main-frontpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\warungislamibogor_shop\resources\views/frontpage/wishlist/wishlist-frontpage.blade.php ENDPATH**/ ?>