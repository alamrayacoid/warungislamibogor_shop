<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                    <img alt="image" class="img-circle" src="{{asset('assets/img/profile_small.jpg')}}" />
                     </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> 
                        <span class="block m-t-xs"> 
                            <strong class="font-bold">
                                {{-- {{Auth::user()->name}} --}}
                                Administrator
                            </strong>
                        </span> 
                        <span class="text-muted text-xs block">
                            {{-- {{Auth::user()->email}}  --}}
                            admin@admin.com
                            <b class="caret"></b>
                        </span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="javascript:void(0);">Profile</a></li>
                        <li><a href="javascript:void(0);">Contacts</a></li>
                        <li><a href="javascript:void(0);">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    A2000
                </div>
            </li>

            <li class="{{Request::is('/') ? 'active nav-active' : '' || Request::is('home') ? 'active nav-active' : ''}}">
                <a href="{{route('home')}}"><i class="fa fa-home"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            <li class="{{Request::is('master/*') ? 'active nav-active' : ''}}">
                <a href="javascript:void(0);"><i class="fa fa-crown"></i> <span class="nav-label">Master</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="{{Request::is('master/sales/*') ? 'active' : ''}}">
                        <a href="{{route('sales')}}"> Data Sales Account</a>
                    </li>
                    <li class="{{Request::is('master/kendaraan/*') ? 'active' : ''}}">
                        <a href="{{route('kendaraan')}}"> Data Kendaraan</a>
                    </li>
                    <li class="{{Request::is('master/alasan/*') ? 'active' : ''}}">
                        <a href="{{route('alasan')}}"> Data Alasan Tidak Lanjut</a>
                    </li>
                </ul>
            </li>
            <li class="{{Request::is('kinerja_sales/*') ? 'active nav-active' : ''}}">
                <a href="javascript:void(0);"><i class="fa fa-tasks"></i> <span class="nav-label">Manajemen Data & Penugasan</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="{{Request::is('kinerja_sales/import_excel/*') ? 'active' : ''}}">
                        <a href="{{route('import_excel')}}"> Manajemen Import Data</a>
                    </li>
                    <li  class="{{Request::is('kinerja_sales/kelola_penugasan/*') ? 'active' : ''}}">
                        <a href="{{route('kelola_penugasan')}}">Kelola Penugasan</a>
                    </li>
                </ul>
            </li>
            <li class="{{Request::is('monitoring_kinerja/*') ? 'active nav-active' : ''}}">
                <a href="{{route('monitoring')}}"><i class="fa fa-desktop"></i> <span class="nav-label">Monitoring Tindakan Service Advisor</span></a>
            </li>
            <li class="{{Request::is('data_sales/*') ? 'active nav-active' : ''}}">
                <a href="javascript:void(0);"><i class="fa fa-user"></i> <span class="nav-label">Manajemen Service Advisor</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="{{Request::is('data_sales/data_suspect/*') ? 'active' : ''}}">
                        <a href="{{route('data_suspect')}}">Data Suspect</a>
                    </li>
                    <li class="{{Request::is('data_sales/rencana_followup/*') ? 'active' : ''}}">
                        <a href="{{route('rencana_followup')}}">Rencana Follow Up</a>
                    </li>
                    {{-- <li class="{{Request::is('data_sales/tindakan_sales/*') ? 'active' : ''}}">
                        <a href="{{route('tindakan_sales')}}"> Tindakan</a>
                    </li> --}}
                    <li class="{{Request::is('data_sales/summary_tindakan/*') ? 'active' : ''}}">
                        <a href="{{route('summary_tindakan')}}">Hasil Tindakan</a>
                    </li>
                </ul>
            </li>
            <li class="{{Request::is('pengguna/*') ? 'active nav-active' : ''}}">
                <a href="{{route('pengguna')}}"><i class="fa fa-users"></i> <span class="nav-label">Manajemen Pengguna</span></a>
            </li>
        </ul>

    </div>
</nav>