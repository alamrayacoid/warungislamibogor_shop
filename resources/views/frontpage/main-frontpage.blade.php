<!DOCTYPE html>
<html>
@include('frontpage.layouts._head-frontpage')
@yield('extra_style')
<body class="canvas-menu top-navigation overflow-hidden">
	{{-- <div id="overlay-loading">
	    <div class="content-loader">
	        <img src="{{asset("assets/img/img-product/Ellipsis-2s-140px.svg")}}">
	    </div>
	</div> --}}

	<div class="mini-navbar-show"></div>
	
	<div id="wrapper" style="background:white;">

		{{-- @if(Cookie::get('tes_frontpage')) --}}

			@include('frontpage.layouts._sidebar-frontpage')

		{{-- @endif --}}

        <div id="page-wrapper" class="white-bg dashbard-1" style="padding:0;">
			
			@include('frontpage.layouts._navbar-frontpage')
		
	        <div class="wrapper_content">
				
					@yield('content')
				
			


			@include('layouts._footer')

		</div>
	</div>
	@include('frontpage.layouts._script-frontpage')
	@yield('extra_script')
</body>
</html>