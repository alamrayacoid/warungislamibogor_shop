<?php $cek = App\Http\Controllers\cartController::cart();
      $img = App\Http\Controllers\cartController::img();
      $notifp = App\Http\Controllers\notifController::pembelian();
      $menu = App\Http\Controllers\menuController::menu();
?>

<?php $notifp = App\Http\Controllers\notifController::pembelian();
      $notifpro = App\Http\Controllers\notifController::proses();
      $notifpem = App\Http\Controllers\notifController::pembayaran();
      $notifpen = App\Http\Controllers\notifController::pengiriman();
      $saldo = App\Http\Controllers\notifController::saldo();
      $category = App\Http\Controllers\menuController::category();
 ?>

<?php if(!Auth::check()): ?>

<nav class="navbar navbar_custom not-login">
    <div class="container-fluid navbar-group-mobile">
        <div class="navbar-header d-flex">
            <button type="button" class="navbar-toggle" style="padding-right:0;" id="js-sidebar-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                WIB | Online Shop
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="navbar-collapse-custom" id="js-sidebar" style="margin-left:-300px;">
            <ul class="nav navbar-nav">
                <li class="dropdown dropdown-categories-navbar nav-link">
                    <a href="javascript:void(0)" class="dropdown-toggle c-white" id="dropdown-categories"
                        data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i
                            class="fa fa-list-ul" aria-hidden="true"></i>&ensp;Kategori</a>
                    <ul class="dropdown-menu dropdown-categories-menu">
                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(route('kategori-produk',['id'=> $row->ity_name ])); ?>"><?php echo e($row->ity_name); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>

            </ul>

            <form class="navbar-form navbar-left form-header-login" action="<?php echo e(route('produk-frontpage')); ?>" method="get"
                style="width:40%;">
                <div class="form-group w-100" style="position:relative;">
                    <input type="text" name="search" class="form-control input-search-header searchbarang"
                        placeholder="Cari barang keperluan anda">
                    <button class="btn btn-search-header" type="submit" id="tombolcaribarang"><i
                            class="fa fa-search"></i></button>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right btn-group-header">
                <li class="nav-link border-0"><a href="<?php echo e(route('login-frontpage')); ?>"><button
                            class="btn btn-login-header mr-3">Masuk</button></a>
                </li>
                <li class="nav-link border-0"><a href="<?php echo e(route('register_frontpage-frontpage')); ?>"><button
                            class="btn btn-register-header">Daftar</button></a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
        <ul class="opsi-nav-mobile">
            <li><button id="js-search-mobile"><i class="fa fa-search"></i></button></li>
        </ul>
    </div><!-- /.container-fluid -->
</nav>
<div class="Sidenav-backdoor" id="mySidenav-backdoor"></div>
<div class="form-group-nav--mobile d-none">
    <form class="w-100" action="<?php echo e(route('produk-frontpage')); ?>" method="get">
    <input type="text" name="search" class="form-control input-search--mobile" placeholder="Cari Produk Warung Islami Bogor">
    <button type="submit" class="btn btn-search--mobile" id="js-search--mobile"><i class="fa fa-search"></i></button>
    </form>
</div>
<div class="Sidenav-backdoor-categories"></div>
<?php endif; ?>

<?php if(!Auth::check()): ?>
<?php else: ?>
<nav class="navbar navbar_custom navbar-expand-md">
    <div class="container-fluid navbar-group-mobile">
        <div class="navbar-header d-flex">
            <button type="button" class="navbar-toggle" style="padding-right:0;" id="js-sidebar-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                WIB | Online Shop
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="navbar-collapse-custom" id="js-sidebar">
            <ul class="nav navbar-nav">
                <li class="dropdown dropdown-categories-navbar">
                    <a href="#" class="dropdown-toggle nav-categories" id="dropdown-categories"
                        data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i
                            class="fa fa-list-ul" aria-hidden="true"></i>&ensp;Kategori</a>
                    <ul class="dropdown-menu dropdown-categories-menu">
                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(url('category',$row->ity_link)); ?>"><?php echo e($row->ity_name); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>

            </ul>
            <form class="navbar-form form-header-login navbar-left" action="<?php echo e(route('produk-frontpage')); ?>" method="get"
                style="width:40%">
                <div class="form-group w-100" style="position:relative;">
                    <input type="text" name="search" class="form-control input-search-header searchbarang"
                        placeholder="Cari barang keperluan anda">
                    <button class="btn btn-search-header" type="submit" id="tombolcaribarang"><i
                            class="fa fa-search"></i></button>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right navbar-right-user" style="margin-right:0;">
                <li class="dropdown nav-link nav-transaction-item">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false"><i class="fa fa-exchange"></i>Lihat Status Transaksi&ensp;<span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-user" style="width:250px;">
                        <li class="d-flex justify-content-between"><a
                                href="<?php echo e(route('pembelian-semua-frontpage' , ['status' => 1])); ?>">Daftar Pembelian
                            </a><span class="label label-primary bg-primary-wib" id="notif-payment-transaksi" style="float:right;"><?php echo e($notifp); ?></span></li>
                        <li class="d-flex justify-content-between"><a
                                href="<?php echo e(route('pembelian-diproses-frontpage', ['status' => 3])); ?>">Sedang diproses
                            </a><span class="label label-primary bg-primary-wib" id="notif-proses-transaksi" style="float:right"><?php echo e($notifpro); ?></span></li>
                        <li class="d-flex justify-content-between"><a
                                href="<?php echo e(route('pembelian-pembayaran-frontpage', ['status' => 2])); ?>">Pembayaran</a> <span
                                class="label label-primary bg-primary-wib" style="float:right"><?php echo e($notifpem); ?></span></li>
                        <li class="d-flex justify-content-between border-0">
                            <a href="<?php echo e(route('pembelian-dikirim-frontpage', ['status' => 4])); ?>">Status Pengiriman </a><span
                                    class="label label-primary bg-primary-wib" style="float: right;" id="notif-pengiriman-transaksi"><?php echo e($notifpen); ?></span></li>
                    </ul>
                </li>
                <li class="nav-link nav-link-shopping-cart"><a a href="#" class="dropdown-toggle" data-toggle="dropdown"
                        role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-cart"></i>
                        <?php if($keranjang == 0): ?>
                        <span class="rounded-cart-nav d-none" id="js-cart-nav"><?php echo e($keranjang); ?></span>
                        <?php endif; ?>
                        <?php if($keranjang > 0): ?>
                        <span class="rounded-cart-nav" id="js-cart-nav"><?php echo e($keranjang); ?></span>
                        <?php endif; ?>
                    </a>
                    <input type="hidden" value="<?php echo e(Auth::user()->cm_id); ?>" id="idcustomernav">
                    <ul class="dropdown-menu dropdown-cart" id="js-dropdown-cart">
                        <div class="header-dropdown-cart">Total : <span id="qty-cart-nav"><?php echo e($keranjang); ?></span> Barang
                        </div>
                        <div class="content-dropdown-cart">
                                <table class="w-100 cart-refresh" id="cart-navbar">
                                    </table>
                            <?php if($keranjang == 0): ?>
                            <div class="cart-nav-empty w-100">
                                    <img src="<?php echo e(asset('assets/img/img-product/empty-cart.png')); ?>" width="50" height="50">
                                    <h5 class="">Belum Ada Barang di Keranjang Belanja Anda</h5>
                            </div>
                            <?php endif; ?>
                            <?php if($keranjang > 0): ?>
                            <div class="cart-nav-empty w-100 d-none">
                                    <img src="<?php echo e(asset('assets/img/img-product/empty-cart.png')); ?>" width="50" height="50">
                                    <h5 class="">Belum Ada Barang di Keranjang Belanja Anda</h5>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="footer-dropdown-cart"><a href="<?php echo e(route('keranjang-frontpage')); ?>"
                                style="padding:0 !important;"><button class="btn btn-view-cart-nav">Lihat Keranjang</button></a></div>
                    </ul>
                </li>
                <li class="dropdown nav-link nav-profile-item">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false"><i class="fa fa-user"></i>&ensp;<span
                            class="text-name-header"><?php echo e(Auth::user()->cm_name); ?></span><span class="caret"
                            style="position:relative;top:-0.1em;"></span></a>
                    <ul class="dropdown-menu dropdown-menu-user navbar-profile-menu">
                        <div class="navbar-account-profile">
                            <img src="<?php echo e(asset('assets/img/a4.jpg')); ?>" class="img-navbar-profile">
                            <div class="text-name-navbar-profile">
                                <span><?php echo e(Auth::user()->cm_name); ?></span>
                            </div>
                        </div>
                        <div class="navbar-account-content">
                            <div class="navbar-account-content-left">
                                <ul class="list-account-content-profile">
                                    <li class="d-flex justify-content-between" style="margin: 0 20px !important;border-right:0 !important;border-left:0 !important;">
                                        <div>Saldo Anda : </div>
                                        <span class="balance-profile-navbar">Rp. <?php echo e($saldo); ?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="navbar-account-content-right">
                                <ul class="list-account-content-profile">
                                    <li style="border-left:0 !important;"><a href="<?php echo e(route('wishlist-frontpage')); ?>">Barang Favorit</a></li>
                                    <li style="border-left:0 !important;"><a href="<?php echo e(route('profile')); ?>">Pengaturan</a></li>
                                    <li style="border-left:0 !important;"><a href="<?php echo e(route('antrian_layanan')); ?>">Antrian Layanan</a></li>
                                    <li class="mt-5 border-0" style="margin-top: 2em;"><a href="<?php echo e(route('logout')); ?>"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>&ensp;Logout</a></li>
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                </ul>
                            </div>
                        </div>
                        
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
        <ul class="opsi-nav-mobile">
            <li><button id="js-search-mobile"><i class="fa fa-search"></i></button></li>
            <li><a href="<?php echo e(route('keranjang-frontpage')); ?>"><button><i class="fa fa-shopping-cart"></i><span class="amount-cart-nav--mobile" id="js-amount-cart--mobile"><?php echo e($keranjang); ?></span></button></a></li>
        </ul>
    </div><!-- /.container-fluid -->
</nav>
<div class="Sidenav-backdoor" id="mySidenav-backdoor"></div>
<div class="form-group-nav--mobile d-none">
    <form class="w-100" action="<?php echo e(route('produk-frontpage')); ?>" method="get">
    <input type="text" name="search" class="form-control input-search--mobile" placeholder="Cari Produk Warung Islami Bogor">
    <button type="submit" class="btn btn-search--mobile" id="js-search--mobile"><i class="fa fa-search"></i></button>
    </form>
</div>
<div class="Sidenav-backdoor-categories"></div>
<?php endif; ?>

<?php /**PATH C:\xampp\htdocs\warungislamibogor_shop\resources\views/frontpage/layouts/_navbar-frontpage.blade.php ENDPATH**/ ?>