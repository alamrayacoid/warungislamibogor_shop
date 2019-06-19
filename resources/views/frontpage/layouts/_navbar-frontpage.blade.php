<div class="row border-bottom white-bg" id="navbar-top">    
    <nav class="navbar navbar-static-top" role="navigation">
        <div class="navbar-header">
            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                <i class="fa fa-caret-down"></i>
            </button>
            <a href="{{url('/')}}" class="navbar-brand">
                <span>
                    <img src="{{asset('assets/img/logo-wib-cilik-maning.png')}}" width="60px" height="50px"
                    alt="Warung Islami Bogor"
                    > 
                </span>
            </a>
            {{-- @if(Cookie::get('tes_frontpage')) --}}
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#">
                    <i class="fa fa-bars"></i>
                    <span class="label label-info">0</span>
                </a>
            {{-- @endif --}}
            <form role="search" class="navbar-form-cust">
                <div class="form-group">
                    <input type="text" placeholder="Cari Produk..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>

        <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Produk </a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="{{route('produk-frontpage')}}">Semua</a></li>
                        <li><a href="{{route('produk-frontpage')}}">Botol </a></li>
                    </ul>
                </li>

            </ul>
            <ul class="nav navbar-top-links navbar-right">
                {{-- @if(Cookie::get('tes_frontpage')) --}}
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Selamat datang di Warung Islami Bogor.</span>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-shopping-cart"></i>  <span class="label label-warning">5</span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            @for($i = 1; $i <= 5; $i++)
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a href="{{route('keranjang-frontpage')}}">
                                            <div class="pull-left dropdown-img">
                                                <img alt="image" class="img-circle" src="{{asset('assets/img/gallery/'.$i.'s.jpg')}}">
                                            </div>
                                            <div class="media-body">
                                                <div class="row">
                                                    <div class="col-xs-7">
                                                        <strong>Nama Produk</strong>
                                                    </div>
                                                    <div class="col-xs-5">
                                                        <small class="pull-right text-warning">Rp. 10.000</small>
                                                        <br>
                                                        <small class="pull-right text-muted">1 buah</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                <li class="divider"></li>
                            @endfor
                            <li>
                                <div class="text-center link-block">
                                    <a href="{{route('keranjang-frontpage')}}">
                                        <i class="fa fa-shopping-cart"></i> <strong>Buka Keranjang</strong>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="dropdown-toggle count-info" href="{{route('wishlist-frontpage')}}">
                            <i class="fa fa-star"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('profile')}}" >
                            <img src="{{asset('assets/img/a3.jpg')}}" height="24px" width="24px" class="rounded">
                            <small>Nama Customer</small>
                        </a>
                        
                    </li>
                    @if(Auth::check())
                    <li>
                        <a href="{{route('logoutt')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                        <form id="logout-form" action="{{ route('logoutt') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    @endif
                {{-- @else --}}
                    @if(!Auth::check())
                    <li>
                        <a href="{{route('login-frontpage')}}">Login </a>
                    </li>
                    @endif
                    @if(!Auth::check())
                    <li>
                        <a href="{{route('register-frontpage')}}">Register </a>
                    </li>
                    @endif
                {{-- @endif --}}

</ul>
        </div>
    </nav>
</div>

@section('extra_script')
<script type="text/javascript">
    $(document).ready(function(){
        
        $('[data-target="#navbar"]').click(function(){

            ($('#navbar').hasClass('in')) ? $(this).find('i').removeClass('fa-caret-up').addClass('fa-caret-down') : $(this).find('i').removeClass('fa-caret-down').addClass('fa-caret-up')

        });
    })

</script>
@endsection