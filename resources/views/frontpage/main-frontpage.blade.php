<!DOCTYPE html>
<html>
@include('frontpage.layouts._head-frontpage')
@yield('extra_style')
<body class="canvas-menu top-navigation">

	<div class="mini-navbar-show"></div>
	
	<div id="wrapper">

		{{-- @if(Cookie::get('tes_frontpage')) --}}

			@include('frontpage.layouts._sidebar-frontpage')

		{{-- @endif --}}

        <div id="page-wrapper" class="gray-bg dashbard-1">
			
			@include('frontpage.layouts._navbar-frontpage')

	        <div class="wrapper wrapper-content">
				<div class="container">
					@yield('content')
				</div>
			</div>


			@include('layouts._footer')

		</div>
	</div>
	@include('frontpage.layouts._script-frontpage')
	@yield('extra_script')
</body>
</html>