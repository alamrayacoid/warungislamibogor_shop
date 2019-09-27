<!DOCTYPE html>
<html>

@include('frontpage.auth._head-auth')
<style>

</style>

<body class="gray-bg">
    <nav class="navbar navbar-login navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="{{asset('assets/img/img-product/warungislamibogor-text.png')}}" width="200" height="50">
            </a>
        </div>
    </nav>
    <section class="header_login_section">

        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <img src="{{asset('assets/img/img-product/bg-login.jpg')}}" class="img-header">
                </div>
                <div class="col-lg-5">
                    <h5 class="title-login-page">Welcome Back :)</h5>
                    <p class="desc-login-page">To Keep connected with us please login with your personal information
                        by email address and password</p>
                    <form id="register" method="POST" class="m-t" role="form" action="{{route('register')}}">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="code" id="code" placeholder="Code" value=""
                                hidden>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"><i
                                        class="fa fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control text_limit" name="name" placeholder="Nama Lengkap" required="">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"><i
                                        class="fa fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control text_limit" name="username" placeholder="Username" required="">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"><i
                                        class="fa fa-envelope"></i></span>
                            </div>
                            <input type="email" class="form-control email_limit" name="email" placeholder="Email" required="">
                        </div>
                        <div class="input-group mb-3" style="position:relative;">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"><i
                                        class="fa fa-lock"></i></span>
                            </div>
                            <input type="password" name="password" id="pass_log_id" class="form-control"
                                placeholder="Password" required="">
                            <button type="button" class=" btn-see-password toggle-password"><i class="fa fa-eye"></i></button>
                        </div>
                        <div class="form-group" style="position:relative;top:-1em;">
                            <input type="checkbox" class="checkbox-lamar" id="check_1">
                            <label for="check_1" class="cek">
                                <span style="position: relative;top: -0.4em;left:-0.5em;">Saya setuju persyaratan dan
                                    kebijakan<span></span></span></label>
                        </div>

                        <button id="input_register" type="submit" class="btn btn-login-page">Daftar</button>
                        <input type="submit" id="trigger_register" hidden></a>
                        <div class="text-opsi-login"><span>Sudah memiliki akun ? </span></div>
                        <a href="{{route('login-frontpage')}}">
                            <button type="button" class="btn btn-register-opsi">Masuk</button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @include('frontpage.layouts._script-frontpage')
    <!-- Mainly scripts -->
    <script src="{{asset('assets/js/jquery-2.1.1.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('assets/js/plugins/iCheck/icheck.min.js')}}"></script>
    <script src="{{asset('assets/iziToast/iziToast.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            console.log()
            @if(Session::get('registerc') != '')
            iziToast.success({
                title: 'Berhasil!',
                message: 'Menambah',
            });
            @endif
            @if(Session::get('registere') != '')
            iziToast.error({
                title: 'Gagal!',
                message: '{{Session::get("registere")}}',
            });
            @endif
            $('#input_register').on('click', function () {
                var trigger = $('.icheckbox_square-green').addClass('checked');
                if (trigger) {
                    var check = 'true';
                } else {
                    var check = 'false';
                }
                console.log(trigger_register);
                if (check === 'true') {
                    $('#trigger_register').click();
                } else {
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

</html>