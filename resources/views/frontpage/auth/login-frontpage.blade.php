<!DOCTYPE html>
<html>

@include('frontpage.auth._head-auth')

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Selamat Datang di Warung Islami Bogor</h2>

                <p>
                    Lebih puas belanja langsung ke Toko kami, anda bisa melihat semua varian yang ada sebelum anda mengambil pilihan terbaik, pelayanan yang ramah dan lokasi yang mudah dijangkau.
                </p>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <form action="{{route('login')}}" method="POST" class="m-t" role="form" >
                        @csrf
                        <div class="form-group">
                            <input type="username" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" id="btn-login" class="btn btn-primary block full-width m-b">Login</button>

                        <a href="#">
                            <small>Lupa password?</small>
                        </a>

                        <p class="text-muted text-center">
                            <small>Tidak punya akun?</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="{{route('register_frontpage-frontpage')}}">Buat akun sekarang</a>
                    </form>
                    <p class="m-t">
                        <small>Warung Islami Bogor &copy; 2019</small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Created by <strong>Alamraya Sebar Barokah</strong>
            </div>
            <div class="col-md-6 text-right">
               <small>© 2019</small>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/js/jquery-2.1.1.js')}}"></script>
    <script src="{{asset('assets/js-cookie/js.cookie.js')}}"></script>
    <script src="{{asset('assets/iziToast/iziToast.min.js')}}"></script>
     @if (Session::get('gagal') !="")            
    <script type="text/javascript">
         $(document).ready(function(){
            iziToast.show({
                color: '#DC143C',
                titleColor: '#ffffff',
                messageColor: '#ffffff',
                title: 'Gagal!',
                message: 'Anda Tidak Boleh Mengakses',
            });
        });
    </script>
    @endif
    @if (Session::get('success') != '')            
    <script type="text/javascript">
        $(document).ready(function(){
            iziToast.show({
                color: '#228B22',
                titleColor: '#ffffff',
                messageColor: '#ffffff',
                title: 'Berhasil!',
                message: 'Silahkan Login',
           });
        })
    </script>
    @endif
    <script type="text/javascript">
        @if(Session::get('registerc') != '')
            iziToast.success({
                    title: 'Berhasil!',
                    message: 'Register',
            });
        @endif
        // $('#btn-login').click(function(){

        //     Cookies.set('tes_frontpage', 'Y', { expires : 365})
        //     window.location.href = "{{url('/')}}";
        // });
    </script>


</body>

</html>
