<!DOCTYPE html>
<html>

@include('frontpage.auth._head-auth')
<style>
.p-absolute{
    position: absolute !important;
}
.reset-password-box{
box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.20);
padding: 30px;
}
.reset-password-wrapper{
    height: 100vh;
    display: flex;
    align-items: center;
}
.reset-password--header h5{
    font-size: 18px;
    text-align: center;
    
}
.reset-password--header p{
    color: rgba(0,0,0,.54);
    font-size: 13px;
    text-align: center;
    line-height: 2;
}
.reset-password--body label{
    color: rgba(0,0,0,.54);
    font-size: 13px;
}
.reset-password--body label::after{
    content: "*";
    color: red;
    font-size: 13px;
    font-weight: bold;
    padding-left: 5px;
}
.reset-password--footer .btn-send-reset-password{
    background-color: #009a51;
    color: #fff;
    width: 100%;
    font-weight: bold;
    font-size: 12px;
    display: flex;
    justify-content: center;
    height: 40px;
    letter-spacing: 1px;
}
.reset-password--body{
    padding: 10px 0 15px 0;
}
.reset-passwod-footer--opsi{
    color: rgba(0,0,0,.54);
    font-size: 13px;
    padding-top: 10px;
    text-align: center;
}
.reset-passwod-footer--opsi a{
    color: #009a51;
    font-weight: bold;
}
.eror-email-reset{
    font-size: 13px;
    color: #d50000;
}
.undifined-email-reset{
    border:1px #d50000 solid;
}
.loader {
  border: 4px solid #f3f3f3; /* Light grey */
  border-top: 4px solid transparent; /* Blue */
  border-radius: 50%;
  width: 25px;
  height: 25px;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

</style>

<body class="">
    <!-- Just an image -->
    <nav class="navbar navbar-login navbar-light bg-light p-absolute">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="{{asset('assets/img/img-product/warungislamibogor-text.png')}}" width="200" height="50"
                    alt="">
            </a>
        </div>
    </nav>
    <section class="reset-password-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="reset-password-box">
                        <form>
                            {{csrf_field()}}
                        <div class="reset-password--header">
                            <h5>Lupa Kata Sandi</h5>
                            <p>Masukkan email yang terdaftar pada akun anda. Kami akan mengirimakan link untuk mereset password ke alamat email anda</p>
                        </div>
                        <div class="reset-password--body">
                            <div class="form-group">
                                <label>Alamat Email</label>
                                <input type="text" class="form-control" id="emailreset" onkeyup="email()">
                                <div class="eror-email-reset d-none" id="emailvalid">Format alamat email anda tidak sah</div>
                                <div class="eror-email-reset d-none" id="emailnotfound">Alamat Email belum terdaftar pada akun manapun</div>
                            </div>
                        </div>
                        <div class="reset-password--footer">
                            <button class="btn btn-send-reset-password" type="button" id="lupa-password" disabled="">Kirim Sekarang</button>
                            <div class="reset-passwod-footer--opsi">Kembali ke halaman <a href="{{route('login-frontpage')}}">login</a> atau <a href="{{route('register_frontpage-frontpage')}}">daftar</a></div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    


    <script src="{{asset('assets/js/jquery-2.1.1.js')}}"></script>
    <script src="{{asset('assets/iziToast/iziToast.min.js')}}"></script>
    
<script>
    $(document).ready(function(){
        $('#lupa-password').click(function(){
            $(this).html('<div class="loader"></div>');
            $(this).attr('disabled',true);
            let email = $('#emailreset').val();
            let token = $('#token').val();
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
                url : "{{route('kirim_request_password')}}",
                type : "post",
                dataType: 'json',
                data : {
                    email : email,
                    "_token": "{{ csrf_token() }}",
                },
                success:function(response){
                    if(response.status == 'success'){
                        iziToast.success({
                            title: 'Berhasil!',
                            message: 'Berhasil request reset password, silahkan cek email anda',
                        });
                        setTimeout(function(){
                             location.reload();
                         }, 4000);
                        $('#lupa-password').html('Kirim Sekarang');
                        $('#lupa-password').attr('disabled',false);

                    }else if(response.status == 'tidakada'){
                        $('#emailreset').addClass('undifined-email-reset');
                        $('#emailnotfound').removeClass('d-none');
                        $('#emailvalid').addClass('d-none');
                        $('#lupa-password').html('Kirim Sekarang');
                        $('#lupa-password').attr('disabled',false);
                    }
                },
                error: function(jqXHR, exception) {
                    if (jqXHR.status == 422) {
                        $('#emailnotfound').addClass('d-none');
                        $('#emailreset').addClass('undifined-email-reset');
                        $('#emailvalid').removeClass('d-none');
                        $('#lupa-password').html('Kirim Sekarang');
                        $('#lupa-password').attr('disabled',false);
                    }else{
                        iziToast.error({
                            title: 'Error!',
                            message: 'Ada Yang Eror',
                        });
                    }
                }
            });
        });
    });
    function email(){
    $('#emailvalid').addClass('d-none');
    $('#emailnotfound').addClass('d-none');
    $('#emailreset').removeClass('undifined-email-reset');
    if($('#emailreset').val() == 0){
        $('#lupa-password').attr('disabled',true);
    }else{
        $('#lupa-password').attr('disabled',false);
    }

    }
</script>
</body>

</html>