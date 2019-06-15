<!DOCTYPE html>
<html>
@include('layouts._head')
@yield('extra_style')
<body class="top-navigation">
	<div id="wrapper">

		{{-- @include('layouts._sidebar') --}}

        <div id="page-wrapper" class="gray-bg dashbard-1">
			
			@include('layouts._navbar')

			<div class="wrapper wrapper-content">
				<div class="container">
					@yield('content')
				</div>
			</div>

			@include('layouts._footer')

			{{-- @include('layouts._smallchat') --}}

			{{-- @include('layouts._rightsidebar') --}}
		</div>
	</div>
	@include('layouts._script')
	@yield('extra_script')
</body>
</html>