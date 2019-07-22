<!-- <?php $notifp = App\Http\Controllers\notifController::pembelian();
      $notifpro = App\Http\Controllers\notifController::proses();
      $notifpem = App\Http\Controllers\notifController::pembayaran();
      $notifpen = App\Http\Controllers\notifController::pengiriman();
 ?>
<nav class="navbar-default navbar-static-side" role="navigation">

    <div class="sidebar-collapse">
        <a class="close-canvas-menu"><i class="fa fa-times"></i></a>
        <ul class="nav metismenu" id="side-menu">
                <?php if(!Auth::check()): ?>
                <?php else: ?>
            <li class="nav-header">
                <div class="dropdown profile-element"> 
                    <span>
                        <img alt="image" class="img-circle" src="/warungislamibogor_shop/storage/image/member/profile/<?php echo e(Auth::user()->cm_path); ?>" width="48px" height="48px">
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo e(Auth::user()->cm_name); ?></strong>
                         </span> <span class="text-muted text-xs block"><?php echo e(Auth::user()->cm_email); ?><b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">  
                        <li><a href="<?php echo e(route('profile')); ?>">Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    WIB
                </div>
            </li>
            <li class="<?php echo e(Request::is('pembelian/semua*') ? 'active nav-active' : '' ||
                    Request::is('pembelian/diproses*') ? 'active nav-active' : '' ||
                    Request::is('pembelian/pembayaran*') ? 'active nav-active' : ''); ?>">
                <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Pembelian</span> 
                    <span class="fa arrow"></span><label class="label label-info pull-right" style="margin-right:.5rem"><?php echo e($notifp); ?></label></a>
                <ul class="nav nav-second-level collapse">
                    <li class="<?php echo e(Request::is('pembelian/semua*') ? 'active' : ''); ?>"><a href="<?php echo e(route('pembelian-semua-frontpage' , ['status' => 1])); ?>">Daftar Pembelian <label class="label label-info pull-right" id="notifp"><?php echo e($notifp); ?></label></a></li>
                    <li class="<?php echo e(Request::is('pembelian/diproses*') ? 'active' : ''); ?>"><a href="<?php echo e(route('pembelian-diproses-frontpage', ['status' => 3])); ?>">Sedang Diproses <label class="label label-info pull-right" id="notifpro"><?php echo e($notifpro); ?></label></a></li>
                    <li class="<?php echo e(Request::is('pembelian/pembayaran*') ? 'active' : ''); ?>"><a href="<?php echo e(route('pembelian-pembayaran-frontpage', ['status' => 2])); ?>">Pembayaran <label class="label label-info pull-right" id="notifpem"><?php echo e($notifpem); ?></label></a></li>
                </ul>
            </li>
            <li class="<?php echo e(Request::is('pembelian/dikirim*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('pembelian-dikirim-frontpage', ['status' => 4])); ?>"><i class="fa fa-truck"></i> <span class="nav-label">Proses Pengiriman</span> <label class="label label-info pull-right"><?php echo e($notifpen); ?></label></a>
            </li>
            <li class="<?php echo e(Request::is('wishlist/*') ? 'active' : '' || Request::is('wishlist') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('wishlist-frontpage')); ?>"><i class="fa fa-star"></i> <span class="nav-label">Wishlist</span></a>
            </li>
                <?php endif; ?>
            <?php if(!Auth::check()): ?>
            <li class="nav-header">
                <div class="dropdown profile-element"> 
                    <span style="display: none;">
                        <img alt="image" class="img-circle" src="" width="48px" height="48px">
                    </span>
                    <a style="display: none;" data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"></strong>
                         </span> <span class="text-muted text-xs block"><b class="caret"></b></span> </span> </a>
                    <ul style="display: none;" class="dropdown-menu animated fadeInRight m-t-xs">  
                        <li><a href="<?php echo e(route('profile')); ?>">Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    WIB
                </div>
            </li>
            <li class="<?php echo e(Request::is('wishlist/*') ? 'active' : '' || Request::is('wishlist') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('login-frontpage')); ?>"><i class="fa fa-star"></i> <span class="nav-label">Login</span></a>
            </li>
            <li class="<?php echo e(Request::is('wishlist/*') ? 'active' : '' || Request::is('wishlist') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('register_frontpage-frontpage')); ?>"><i class="fa fa-star"></i> <span class="nav-label">Register</span></a>
            </li>
            <?php else: ?>
            <?php endif; ?>
            
        </ul>

    </div>
</nav> --><?php /**PATH C:\xampp\htdocs\warungislamibogor_shop\resources\views/frontpage/layouts/_sidebar-frontpage.blade.php ENDPATH**/ ?>