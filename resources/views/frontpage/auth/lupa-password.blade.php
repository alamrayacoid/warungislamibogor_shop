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
    
    padding: 10px 5px;
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
                @if($cek == 0 )
                golek opo
                @else
                <div class="col-lg-5">
                    <div class="reset-password-box">
                        <form id="frmlupapassword">
                        <div class="reset-password--header">
                            <h5>Reset Kata Sandi</h5>
                        </div>
                        <div class="reset-password--body">
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input id="email" type="email" readonly="" class="form-control" name="email" value="{{ $email }}" required autofocus placeholder="E-mail">
                            <div class="form-group">
                                <label>Password Baru</label>
                                <input type="password" class="form-control" name="passwordbaru">
                                <!-- <div class="eror-email-reset d-none" id="emailvalid">Format alamat email anda tidak sah</div>
                                <div class="eror-email-reset d-none" id="emailnotfound">Alamat Email belum terdaftar pada akun manapun</div> -->
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password Baru</label>
                                <input type="password" class="form-control" name="confirmpassword">
                            </div>
                        </div>
                        <div class="reset-password--footer">
                            <button class="btn btn-send-reset-password" type="button" id="lupa-password">Konfirmasi</button>
                            <!-- <div class="reset-passwod-footer--opsi">Kembali ke halaman <a href="">login</a> atau <a href="">daftar</a></div> -->
                        </div>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    


    <script src="{{asset('assets/js/jquery-2.1.1.js')}}"></script>
    <script src="{{asset('assets/iziToast/iziToast.min.js')}}"></script>
    
<script>
    $(document).ready(function(){
        $('#lupa-password').click(function(){
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
                url : "{{route('ganti_password_member')}}",
                type : "post",
                dataType: 'json',
                data : $('#frmlupapassword').serialize(),
                success:function(response){
                    if(response.status == 'sukses'){
                        iziToast.success({      
                            title: 'Berhasil!',
                            message: 'Berhasil Request Reset Password',
                        });
                    }
                    else if(response.status == 'tidaksama'){
                        iziToast.error({      
                            title: 'Error!',
                            message: 'Password Baru dan Konfirmasi password baru tidak sama',
                        });
                    }
                    else if(response.status == 'tidakada'){
                        iziToast.error({      
                            title: 'Error!',
                            message: 'Akun dengan email ini tidak ada',
                        });
                    }
                }
            });
        });
    });
    
</script>
</body>

</html>