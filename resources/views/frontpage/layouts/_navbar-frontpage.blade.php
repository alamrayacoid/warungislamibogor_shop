<?php $cek = App\Http\Controllers\cartController::cart();
      $img = App\Http\Controllers\cartController::img();
      $notifp = App\Http\Controllers\notifController::pembelian();
      $menu = App\Http\Controllers\menuController::menu();
?>

<?php $notifp = App\Http\Controllers\notifController::pembelian();
      $notifpro = App\Http\Controllers\notifController::proses();
      $notifpem = App\Http\Controllers\notifController::pembayaran();
      $notifpen = App\Http\Controllers\notifController::pengiriman();
 ?>

@if(!Auth::check())

<nav class="navbar navbar_custom not-login">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false" style="padding-right:0;">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">
               WIB | Online Shop
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="padding-right:0;">
            <ul class="nav navbar-nav">
                <li class="dropdown dropdown-categories-navbar nav-link">
                    <a href="javascript:void(0)" class="dropdown-toggle c-white" id="dropdown-categories" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false"><i class="fa fa-list-ul" aria-hidden="true"></i>Kategori</a>
                    <ul class="dropdown-menu dropdown-categories-menu">
                        @foreach($kategori as $row)
                        <li><a href="{{route('kategori-produk',['id'=> $row->ity_name ])}}">{{$row->ity_name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                
            </ul>
            
            <form class="navbar-form navbar-left form-header-login" action="{{route('produk-frontpage')}}"
                method="get" style="width:40%;">
                <div class="form-group w-100" style="position:relative;">
                    <input type="text" name="search" class="form-control input-search-header searchbarang"
                        placeholder="Cari barang keperluan anda">
                    <button class="btn btn-search-header" type="submit" id="tombolcaribarang"><i
                            class="fa fa-search"></i></button>
                </div>
                <!-- <div class="opsi-categories-navbar">

                    @foreach($kategori as $row)
                    <div>
                        <a href="">{{$row->ity_name}}</a>
                    </div>
                    @endforeach
                </div> -->
            </form>
            <ul class="nav navbar-nav navbar-right btn-group-header">
                <li class="nav-link border-0"><a href="{{route('login-frontpage')}}"><button class="btn btn-login-header mr-3">Masuk</button></a>
                </li>
                <li class="nav-link border-0"><a href="{{route('register_frontpage-frontpage')}}"><button
                            class="btn btn-register-header">Daftar</button></a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    
</nav>
<div class="Sidenav-backdoor" id="mySidenav-backdoor"></div>
@endif

@if(!Auth::check())
@else
<nav class="navbar navbar_custom navbar-expand-md">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false" style="padding-right:0;">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">
               WIB | Online Shop
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
                <li class="dropdown dropdown-categories-navbar">
                    <a href="javascript:void(0)" class="dropdown-toggle c-white" id="dropdown-categories" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false"><i class="fa fa-list-ul" aria-hidden="true"></i>Kategori</a>
                    <ul class="dropdown-menu dropdown-categories-menu">
                    @foreach($kategori as $row)
                        <li><a href="{{route('kategori-produk',['id'=> $row->ity_name ])}}">{{$row->ity_name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                
            </ul>
            <form class="navbar-form form-header-login navbar-left" action="{{route('produk-frontpage')}}" method="get"
                style="width:40%">
                <div class="form-group w-100" style="position:relative;">
                    <input type="text" name="search" class="form-control input-search-header searchbarang"
                        placeholder="Cari barang keperluan anda">
                    <button class="btn btn-search-header" type="submit" id="tombolcaribarang"><i
                            class="fa fa-search"></i></button>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right navbar-right-user" style="margin-right:0;">
                <li class="dropdown nav-link">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">Lihat Status Transaksi <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-user">
                        <li class="d-flex justify-content-between"><a href="{{route('pembelian-semua-frontpage' , ['status' => 1])}}">Daftar Pembelian </a><span
                                    class="label label-primary" style="float:right;">{{$notifp}}</span></li>
                        <li class="d-flex justify-content-between"><a href="{{route('pembelian-diproses-frontpage', ['status' => 3])}}">Sedang diproses </a><span
                                    class="label label-primary" style="float:right">{{$notifpro}}</span></li>
                        <li class="d-flex justify-content-between"><a href="{{route('pembelian-pembayaran-frontpage', ['status' => 2])}}">Pembayaran</a> <span
                                    class="label label-primary" style="float:right">{{$notifpem}}</span></li>
                    </ul>
                </li>
                <li class="nav-link nav-link-shopping-cart"><a href="{{route('keranjang-frontpage')}}"><i
                            class="fa fa-shopping-cart"></i></a></li>
                <li class="dropdown nav-link">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false"><i class="fa fa-user"></i><span
                            class="text-name-header">{{Auth::user()->cm_name}}</span><span class="caret" style="position:relative;top:-0.1em;"></span></a>
                    <ul class="dropdown-menu dropdown-menu-user">
                        <h5 class="text-hello">Halo,</h5>
                        <p class="text-person">{{Auth::user()->cm_name}}</p>
                        <div role="separator" class="divider"></div>
                        <li><a href="{{route('profile')}}">Profile</a></li>
                        <li><a href="{{route('pembelian-dikirim-frontpage', ['status' => 4])}}">Status Pengiriman <span
                                    class="label label-primary ml-4">{{$notifpen}}</span> </a></li>
                        <li><a href="{{route('wishlist-frontpage')}}">Barang Favorit<span
                                    class="label label-primary ml-4">Baru</span></a></li>
                        <li>
                            <a href="{{route('logout')}}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Keluar
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="Sidenav-backdoor" id="mySidenav-backdoor"></div>
@endif

<!-- <div class=" row border-bottom white-bg" id="navbar-top">
    <nav class="navbar navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse"
                    class="navbar-toggle collapsed" type="button">
                    <i class="fa fa-caret-down"></i>
                </button>
                <a href="{{url('/')}}" class="navbar-brand">
                    <span>
                        <img src="{{asset('assets/img/logo-wib-cilik-maning.png')}}" width="60px" height="50px"
                            alt="Warung Islami Bogor">
                    </span>
                </a>
                {{-- @if(Cookie::get('tes_frontpage')) --}}
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#">
                    <i class="fa fa-bars"></i>
                    <span class="label label-info">{{$notifp}}</span>
                </a>
                {{-- @endif --}}
                <form role="search" action="{{route('produk-frontpage')}}" method="get" class="navbar-form-cust">
                    <div class="form-group">
                        <input type="text" placeholder="Cari Produk..." class="form-control" name="search"
                            id="top-search">
                    </div>
                </form>
            </div>

            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Produk </a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="{{route('produk-frontpage')}}">Semua</a></li>
                            @foreach($menu as $row)
                            <li><a href="#">{{$row->ity_name}}</a></li>
                            @endforeach
                        </ul>
                    </li>

                </ul>
                <ul class="nav navbar-top-links navbar-right">

                    <li>
                        <span class="m-r-sm text-muted welcome-message">Selamat datang di
                            Warung Islami Bogor.</span>
                    </li>
                    @if(!Auth::check())
                    @else
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-shopping-cart"></i> <span class="label label-warning" id="ncart"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            @foreach($cek as $row)
                            @if($row->cart_cmember == Auth::user()->cm_code)
                            
                                <li class="ncart">
                                    <div class="dropdown-messages-box">
                                            <a href="{{route('produk-detail-frontpage')}}?code={{$row->i_code}}">
                                                @foreach($img as $gambar)
                                                <div class="pull-left dropdown-img">
                                                    <img alt="image" class="img-circle" src="/warungislamibogor/storage/image/master/produk/{{$gambar->ip_path}}">
                                                </div>
                                                @endforeach
                                                <div class="media-body">
                                                    <div class="row">
                                                        <div class="col-xs-7">
                                                            <strong>{{$row->i_name}}</strong>
                                                        </div>
                                                        <div class="col-xs-5">
                                                            <small class="pull-right text-warning">Rp. {{$row->ipr_sunitprice}}</small>
                                                            <br>
                                                            <small class="pull-right text-muted">{{$row->cart_qty}}</small>
                                                        </div>
                                                    </div>
                            <li class="ncart">
                                <div class="dropdown-messages-box">
                                    <a href="{{route('produk-detail-frontpage')}}?code={{$row->i_code}}">
                                        <div class="pull-left dropdown-img">
                                            <img alt="image" class="img-circle"
                                                src="{{asset('assets/img/gallery/s.jpg')}}">
                                        </div>
                                        <div class="media-body">
                                            <div class="row">
                                                <div class="col-xs-7">
                                                    <strong>{{$row->i_name}}</strong>
                                                </div>
                                                <div class="col-xs-5">
                                                    <small class="pull-right text-warning">Rp.
                                                        {{$row->ipr_sunitprice}}</small>
                                                    <br>
                                                    <small class="pull-right text-muted">{{$row->cart_qty}}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li class="divider"></li>
                            @endif
                            @endforeach
                            <li>
                                <div class="text-center link-block">
                                    <a href="{{route('keranjang-frontpage')}}">
                                        <i class="fa fa-shopping-cart"></i> <strong>Buka
                                            Keranjang</strong>
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
                    @endif
                    @if(!Auth::check())
                    @else
                    <li>
                        <a href="{{route('profile')}}">
                            <img src="/warungislamibogor_shop/storage/image/member/profile/{{Auth::user()->cm_path}}"
                                height="24px" width="24px" class="rounded">
                            <small>{{Auth::user()->cm_name}}</small>
                        </a>

                    </li>
                    @endif
                    @if(Auth::check() == NULL)
                    @else
                    <li>
                        <a href="{{route('logout')}}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    @endif
                    @if(!Auth::check())
                    <li>
                        <a href="{{route('login-frontpage')}}">Login </a>
                    </li>
                    @endif
                    @if(!Auth::check())
                    <li>
                        <a href="{{route('register_frontpage-frontpage')}}">Register </a>
                    </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>
</div> -->


@section('extra_script')
<script type="text/javascript">
    $(document).ready(function () {

        $('[data-target="#navbar"]').click(function () {

            ($('#navbar').hasClass('in')) ? $(this).find('i').removeClass('fa-caret-up')
                .addClass(
                    'fa-caret-down'): $(this).find('i').removeClass('fa-caret-down').addClass(
                    'fa-caret-up')

        });
    })
</script>
@endsection