<!DOCTYPE html>
<html>

<?php echo $__env->make('frontpage.auth._head-auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>


</style>

<body class="">
    <!-- Just an image -->
    <nav class="navbar navbar-login navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
                <img src="<?php echo e(asset('assets/img/img-product/warungislamibogor-text.png')); ?>" width="200" height="50"
                    alt="">
            </a>
        </div>
    </nav>
    <section class="header_login_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 d-flex align-items-center">
                    <img src="<?php echo e(asset('assets/img/img-product/bg-login.jpg')); ?>" class="img-header">
                    <!-- <h2 class="font-bold">Selamat Datang di Warung Islami Bogor</h2>
                <p>
                    Lebih puas belanja langsung ke Toko kami, anda bisa melihat semua varian yang ada sebelum anda
                    mengambil pilihan terbaik, pelayanan yang ramah dan lokasi yang mudah dijangkau.
                </p> -->
                </div>
                <div class="col-lg-5 d-flex align-items-center">
                    <div class="">
                        <h5 class="title-login-page">Welcome Back :)</h5>
                        <p class="desc-login-page">To Keep connected with us please login with your personal information
                            by email address and password</p>
                        <form action="<?php echo e(route('login')); ?>" method="POST" class="m-t" role="form">
                            <?php echo csrf_field(); ?>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default"><i
                                            class="fa fa-user"></i></span>
                                </div>
                                <input type="username" class="form-control" name="username" placeholder="Username">
                            </div>
                            <div class="input-group mb-3" style="positon:relative;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default"><i
                                            class="fa fa-lock"></i></span>
                                </div>
                                <input type="password" name="password" id="pass_log_id" class="form-control"
                                    placeholder="Password">
                                <button type="button" class="btn-see-password toggle-password"><i class="fa fa-eye"></i>
                            </div>
                            <div class="d-flex justify-content-between" style="position:relative;top:-0.5em;">
                                <div class="form-group" style="position:relative;top:-0.6em;">
                                    <input type="checkbox" class="checkbox-lamar" id="check_1">
                                    <label for="check_1" class="cek">
                                        <span style="position: relative;top: -0.4em;left:-0.5em;">Remember
                                            me<span></span></span></label>
                                </div>

                                <div>
                                    <a href="#">
                                        <small>Lupa password?</small>
                                    </a>
                                </div>
                            </div>
                            <div class="">
                                <button type="submit" id="btn-login" class="btn btn-login-page">Masuk</button>
                            </div>
                            <div class="text-opsi-login"><span>Belum memiliki akun ? </span></div>
                            <a class="" href="<?php echo e(route('register_frontpage-frontpage')); ?>"><button type="button"
                                    class="btn btn-register-opsi">Daftar Akun Sekarang</button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="<?php echo e(asset('assets/js/jquery-2.1.1.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js-cookie/js.cookie.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/iziToast/iziToast.min.js')); ?>"></script>
    <?php if(Session::get('gagal') !=""): ?>
    <script type="text/javascript">
        $(document).ready(function () {
            iziToast.show({
                color: '#DC143C',
                titleColor: '#ffffff',
                messageColor: '#ffffff',
                title: 'Gagal!',
                message: 'Anda Belum Terdaftar',
            });
        });
    </script>
    <?php endif; ?>
    <?php if(Session::get('success') != ''): ?>
    <script type="text/javascript">
        $(document).ready(function () {
            iziToast.show({
                color: '#228B22',
                titleColor: '#ffffff',
                messageColor: '#ffffff',
                title: 'Berhasil!',
                message: 'Silahkan Login',
            });
        })
    </script>
    <?php endif; ?>
    <script type="text/javascript">
        <?php if(Session::get('registerc') != ''): ?>
        iziToast.success({
            title: 'Berhasil!',
            message: 'Register',
        });
        <?php endif; ?>
        // $('#btn-login').click(function(){

        //     Cookies.set('tes_frontpage', 'Y', { expires : 365})
        //     window.location.href = "<?php echo e(url('/')); ?>";
        // });
    </script>
    <script>
    $(document).ready(function(){

    
        $("body").on('click', '.toggle-password', function () {
            var input = $("#pass_log_id");
            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }

        });
    });
    </script>


</body>

</html><?php /**PATH C:\xampp\htdocs\warungislamibogor_shop\resources\views/frontpage/auth/login-frontpage.blade.php ENDPATH**/ ?>