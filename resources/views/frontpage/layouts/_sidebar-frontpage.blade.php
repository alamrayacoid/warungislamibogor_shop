<nav class="navbar-default navbar-static-side" role="navigation">

    <div class="sidebar-collapse">
        <a class="close-canvas-menu"><i class="fa fa-times"></i></a>
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> 
                    <span>
                        <img alt="image" class="img-circle" src="{{asset('assets/img/profile_small.jpg')}}" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                         </span> <span class="text-muted text-xs block">email@domain.com <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    WIB+
                </div>
            </li>
            <li class="{{Request::is('pembelian/semua*') ? 'active nav-active' : '' ||
                    Request::is('pembelian/diproses*') ? 'active nav-active' : '' ||
                    Request::is('pembelian/pembayaran*') ? 'active nav-active' : ''
        }}">
                <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Pembelian</span> 
                    <span class="fa arrow"></span><label class="label label-info pull-right" style="margin-right:.5rem">0</label></a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{Request::is('pembelian/semua*') ? 'active' : ''}}"><a href="{{route('pembelian-semua-frontpage' , ['status' => 1])}}">Daftar Pembelian <label class="label label-info pull-right">0</label></a></li>
                    <li class="{{Request::is('pembelian/diproses*') ? 'active' : ''}}"><a href="{{route('pembelian-diproses-frontpage', ['status' => 3])}}">Sedang Diproses <label class="label label-info pull-right">0</label></a></li>
                    <li class="{{Request::is('pembelian/pembayaran*') ? 'active' : ''}}"><a href="{{route('pembelian-pembayaran-frontpage', ['status' => 2])}}">Pembayaran <label class="label label-info pull-right">0</label></a></li>
                </ul>
            </li>
            <li class="{{Request::is('pembelian/dikirim*') ? 'active' : ''}}">
                <a href="{{route('pembelian-dikirim-frontpage', ['status' => 4])}}"><i class="fa fa-truck"></i> <span class="nav-label">Proses Pengiriman</span> <label class="label label-info pull-right">0</label></a>
            </li>
            <li class="{{Request::is('wishlist/*') ? 'active' : '' || Request::is('wishlist') ? 'active' : ''}}">
                <a href="{{route('wishlist-frontpage')}}"><i class="fa fa-star"></i> <span class="nav-label">Wishlist</span></a>
            </li>
            
        </ul>

    </div>
</nav>