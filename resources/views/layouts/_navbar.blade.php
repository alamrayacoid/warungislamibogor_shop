
<div class="row border-bottom white-bg">
    <nav class="navbar navbar-static-top" role="navigation">
        <div class="navbar-header">
            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                <i class="fa fa-list"></i>
            </button>
            <a href="{{url('/')}}" class="navbar-brand">WIB Rekruitment</a>
        </div>
        <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li class="{{Request::is('/') ? 'active' : '' || Request::is('home') ? 'active' : ''}}">
                   <a href="{{route('home')}}">Home</a> 
                </li>
                <li class="{{Request::is('ujian/*') ? 'active' : ''}}">
                    <a aria-expanded="false" role="button" href="{{route('ujian')}}"> Ujian Online</a>
                </li>

            </ul>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="{{route('login')}}">
                        <i class="fa fa-sign-in-alt"></i>
                        Login
                    </a>
                </li>

                <li class="{{Request::is('lamar/*') ? 'active' : ''}}">
                    <a href="{{route('lamar')}}">
                        
                        Lamar Lowongan
                    </a>
                </li>
                <li>
                    <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out-alt"></i> Log out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</div>