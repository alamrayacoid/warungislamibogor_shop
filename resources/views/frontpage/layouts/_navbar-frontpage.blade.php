<?php $cek = App\Http\Controllers\cartController::cart();
      $img = App\Http\Controllers\cartController::img();
      $notifp = App\Http\Controllers\notifController::pembelian();
      $menu = App\Http\Controllers\menuController::menu();
?>
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
                    <span class="label label-info">{{$notifp}}</span>
                </a>
            {{-- @endif --}}
            <form role="search" action="{{route('produk-frontpage')}}" method="get" class="navbar-form-cust">
                <div class="form-group">
                    <input type="text" placeholder="Cari Produk..." class="form-control" name="search" id="top-search">
                </div>
            </form>
        </div>

        <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Produk </a>
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
                        <span class="m-r-sm text-muted welcome-message">Selamat datang di Warung Islami Bogor.</span>
                    </li>
                    @if(!Auth::check())
                    @else
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-shopping-cart"></i>  <span class="label label-warning" id="ncart"></span>
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
                    @endif
                    @if(!Auth::check())
                    @else
                    <li>
                        <a href="{{route('profile')}}" >
                            <img src="/warungislamibogor_shop/storage/image/member/profile/{{Auth::user()->cm_path}}" height="24px" width="24px" class="rounded">
                            <small>{{Auth::user()->cm_name}}</small>
                        </a>
                        
                    </li>
                    @endif
                    @if(Auth::check() == NULL)
                    @else
                    <li>
                        <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
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