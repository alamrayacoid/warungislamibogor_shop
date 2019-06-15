<!DOCTYPE html>
<html>

@include('frontpage.auth._head-auth')

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">WIB</h1>

            </div>
            <h3>Daftar akun</h3>
            <p>Buat akun agar dapat berbelanja di Warung Bogor Islami.</p>
            <form id="register"  method="POST" class="m-t" role="form" action="$">
                @csrf 
                <div class="form-group">
                    <input type="hidden" class="form-control" name="code" id="code" placeholder="Code" value="us{{$code}}" hidden>
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
                <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="confirm password" required="">
                </div> 
                <div class="form-group" >
                        <div class="checkbox i-checks" id="syarat_group"><label> <input class="syarat" name="persyaratan"  type="checkbox"><i></i> Setujui persyaratan dan kebijakan. </label></div>
                </div>
                <div class="form-group">
                        <div class="checkbox i-checks"><label><i>Menu Akses Management User</i></label><br><br><input name="menu_access_management_user" type="radio" value="true"> Yes &nbsp;<input name="menu_access_management_user" type="radio" value="false" checked> No </div>
                </div>
                <div class="form-group">
                        <div class="checkbox i-checks"><label><i>Menu Akses Master Data</i></label><br><br><input name="menu_access_master" type="radio" value="true"> Yes &nbsp;<input name="menu_access_master" type="radio" value="false" checked> No </div>
                </div>
                <div class="form-group">
                        <div class="checkbox i-checks"><label><i>Menu Akses marketing</i></label><br><br><input name="menu_access_marketing" type="radio" value="true"> Yes &nbsp;<input name="menu_access_marketing" type="radio" value="false" checked> No </div>
                </div>
                <div class="form-group">
                        <div class="checkbox i-checks"><label><i>Menu Akses gudang</i></label><br><br><input name="menu_access_gudang" type="radio" value="true"> Yes &nbsp;<input name="menu_access_gudang" type="radio" value="false" checked> No </div>
                </div>
                <div class="form-group">
                        <div class="checkbox i-checks"><label><i>Menu Akses SDM</i></label><br><br><input name="menu_access_sdm" type="radio" value="true"> Yes &nbsp;<input name="menu_access_sdm" type="radio" value="false" checked> No </div>
                </div>
                <div class="form-group">
                        <div class="checkbox i-checks"><label><i>Menu Akses budgeting</i></label><br><br><input name="menu_access_budgeting" type="radio" value="true"> Yes &nbsp;<input name="menu_access_budgeting" type="radio" value="false" checked> No </div>
                </div>
                <div class="form-group">
                        <div class="checkbox i-checks"><label><i>Menu Akses keuangan</i></label><br><br><input name="menu_access_keuangan" type="radio" value="true"> Yes &nbsp;<input name="menu_access_keuangan" type="radio" value="false" checked> No </div>
                </div>
                <div class="form-group">
                        <div class="checkbox i-checks"><label><i>Menu Akses manajement aset</i></label><br><br><input name="menu_access_management" type="radio" value="true"> Yes &nbsp;<input name="menu_access_management" type="radio" value="false" checked> No </div>
                </div>
                <button id="input_register" type="submit" class="btn btn-primary block full-width m-b">Daftar</button>
                <input type="submit" id="trigger_register" hidden></a>
                <p class="text-muted text-center"><small>Sudah punya Akun?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{route('login')}}">Login</a>
            </form>
            <p class="m-t"> Copyright By <strong>Alamraya Sebar Barokah</strong> <br>
             <small>Warung Islami Bogor &copy; 2019</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{asset('assets/js/jquery-2.1.1.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('assets/js/plugins/iCheck/icheck.min.js')}}"></script>
    <script src="{{asset('assets/iziToast/iziToast.min.js')}}"></script>
    <script>
            $(document).on('click','#input_register',function(){ 
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
                    iziToast.show({
                                color: '#DC143C',
                                titleColor: '#ffffff',
                                messageColor: '#ffffff',
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
