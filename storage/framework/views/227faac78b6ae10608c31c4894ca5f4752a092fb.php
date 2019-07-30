<?php $cek = App\Http\Controllers\cartController::cart();
      $img = App\Http\Controllers\cartController::img();
      $notifp = App\Http\Controllers\notifController::pembelian();
      $menu = App\Http\Controllers\menuController::menu();
?>
<div class="row border-bottom white-bg" id="navbar-top">    
    <nav class="navbar navbar-static-top" role="navigation">
        <div class="navbar-header">
            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                <i class="fa fa-caret-down"></i>
            </button>
            <a href="<?php echo e(url('/')); ?>" class="navbar-brand">
                <span>
                    <img src="<?php echo e(asset('assets/img/logo-wib-cilik-maning.png')); ?>" width="60px" height="50px"
                    alt="Warung Islami Bogor"
                    > 
                </span>
            </a>
            
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#">
                    <i class="fa fa-bars"></i>
                    <span class="label label-info"><?php echo e($notifp); ?></span>
                </a>
            
            <form role="search" action="<?php echo e(route('produk-frontpage')); ?>" method="get" class="navbar-form-cust">
                <div class="form-group">
                    <input type="text" placeholder="Cari Produk..." class="form-control" name="search" id="top-search">
                </div>
            </form>
        </div>

        <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Produk </a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="<?php echo e(route('produk-frontpage')); ?>">Semua</a></li>
                        <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="#"><?php echo e($row->ity_name); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>

            </ul>
            <ul class="nav navbar-top-links navbar-right">
               
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Selamat datang di Warung Islami Bogor.</span>
                    </li>
                    <?php if(!Auth::check()): ?>
                    <?php else: ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-shopping-cart"></i>  <span class="label label-warning" id="ncart"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <?php $__currentLoopData = $cek; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($row->cart_cmember == Auth::user()->cm_code): ?>
                                <li class="ncart">
                                    <div class="dropdown-messages-box">
                                            <a href="<?php echo e(route('produk-detail-frontpage')); ?>?code=<?php echo e($row->i_code); ?>">
                                                <?php $__currentLoopData = $img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gambar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="pull-left dropdown-img">
                                                    <img alt="image" class="img-circle" src="/warungislamibogor/storage/image/master/produk/<?php echo e($gambar->ip_path); ?>">
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <div class="media-body">
                                                    <div class="row">
                                                        <div class="col-xs-7">
                                                            <strong><?php echo e($row->i_name); ?></strong>
                                                        </div>
                                                        <div class="col-xs-5">
                                                            <small class="pull-right text-warning">Rp. <?php echo e($row->ipr_sunitprice); ?></small>
                                                            <br>
                                                            <small class="pull-right text-muted"><?php echo e($row->cart_qty); ?></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                    </div>
                                </li>
                                <li class="divider"></li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <div class="text-center link-block">
                                    <a href="<?php echo e(route('keranjang-frontpage')); ?>">
                                        <i class="fa fa-shopping-cart"></i> <strong>Buka Keranjang</strong>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="dropdown-toggle count-info" href="<?php echo e(route('wishlist-frontpage')); ?>">
                            <i class="fa fa-star"></i>
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if(!Auth::check()): ?>
                    <?php else: ?>
                    <li>
                        <a href="<?php echo e(route('profile')); ?>" >
                            <img src="/warungislamibogor_shop/storage/image/member/profile/<?php echo e(Auth::user()->cm_path); ?>" height="24px" width="24px" class="rounded">
                            <small><?php echo e(Auth::user()->cm_name); ?></small>
                        </a>
                        
                    </li>
                    <?php endif; ?>
                    <?php if(Auth::check() == NULL): ?>
                    <?php else: ?>
                    <li>
                        <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field()); ?>

                        </form>
                    </li>
                    <?php endif; ?>
                    <?php if(!Auth::check()): ?>
                    <li>
                        <a href="<?php echo e(route('login-frontpage')); ?>">Login </a>
                    </li>
                    <?php endif; ?>
                    <?php if(!Auth::check()): ?>
                    <li>
                        <a href="<?php echo e(route('register_frontpage-frontpage')); ?>">Register </a>
                    </li>
                    <?php endif; ?>

</ul>
        </div>
    </nav>
</div>

<?php $__env->startSection('extra_script'); ?>
<script type="text/javascript">

    $(document).ready(function(){
        
        $('[data-target="#navbar"]').click(function(){

            ($('#navbar').hasClass('in')) ? $(this).find('i').removeClass('fa-caret-up').addClass('fa-caret-down') : $(this).find('i').removeClass('fa-caret-down').addClass('fa-caret-up')

        });
    })

</script>
<?php $__env->stopSection(); ?><?php /**PATH C:\xampp\htdocs\warungislamibogor_shop\resources\views/frontpage/layouts/_navbar-frontpage.blade.php ENDPATH**/ ?>