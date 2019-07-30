<!DOCTYPE html>
<html>

<?php echo $__env->make('frontpage.auth._head-auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">WIB</h1>

            </div>
            <h3>Daftar akun</h3>
            <p>Buat akun agar dapat berbelanja di Warung Bogor Islami.</p>
            <form id="register"  method="POST" class="m-t" role="form" action="<?php echo e(route('register')); ?>">
                <?php echo csrf_field(); ?> 
                <div class="form-group">
                    <input type="hidden" class="form-control" name="code" id="code" placeholder="Code" value="" hidden>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Name" required="">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <div class="form-group" >
                        <div class="checkbox i-checks" id="syarat_group"><label> <input class="syarat" name="persyaratan"  type="checkbox"><i></i> Setujui persyaratan dan kebijakan. </label></div>
                </div>
                
                <button id="input_register" type="submit" class="btn btn-primary block full-width m-b">Daftar</button>
                <input type="submit" id="trigger_register" hidden></a>
                <p class="text-muted text-center"><small>Sudah punya Akun?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="<?php echo e(route('login-frontpage')); ?>">Login</a>
            </form>
            <p class="m-t"> Created by <strong>Alamraya Sebar Barokah</strong> <br>
             <small>Warung Islami Bogor &copy; 2019</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo e(asset('assets/js/jquery-2.1.1.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo e(asset('assets/js/plugins/iCheck/icheck.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/iziToast/iziToast.min.js')); ?>"></script>
    <script>
        $(document).ready(function(){
            console.log()
            <?php if(Session::get('registerc') != ''): ?>
                iziToast.success({
                        title: 'Berhasil!',
                        message: 'Menambah',
                });
            <?php endif; ?>
            <?php if(Session::get('registere') != ''): ?>
            iziToast.error({
                        title: 'Gagal!',
                        message: '<?php echo e(Session::get("registere")); ?>',
                });
            <?php endif; ?>
            $('#input_register').on('click',function(){ 
                    var trigger = $('.icheckbox_square-green').addClass('checked');
                    if (trigger) {
                        var check = 'true';
                    }else{
                        var check ='false';
                    }
                console.log(trigger_register);
                if (check === 'true') {
                    $('#trigger_register').click();
                }else{
                    iziToast.error({
                                
                                title: 'Gagal!',
                                message: 'Ada yang kosong',
                            });
                        }
            })

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\warungislamibogor_shop\resources\views/frontpage/auth/register-frontpage.blade.php ENDPATH**/ ?>