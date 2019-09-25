<!DOCTYPE html>
<html>
@include('frontpage.layouts._head-frontpage')
@yield('extra_style')
<body class="canvas-menu top-navigation overflow-hidden">
	

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
<div class="modal fade" id="mdl-penjualan" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background: #009a51;color: #fff;font-weight: 600;letter-spacing: 1px;">
            	Peringatan barang sedang dikirim!
                <button type="button" class="close btn-close-mdl-custom" data-dismiss="modal" style="color: #fff;">&times;</button>
            </div>
            <div class="modal-body content-delivery-warning">
                	
        	</div>
        <div class="modal-footer">
            	<button type="button" class="btn btn-notif-delivery" data-dismiss="modal">OK , Saya Paham !!</button>
          </div>
    </div>
</div>
<div class="modal fade" id="mdl-proses" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background: #009a51;color: #fff;font-weight: 600;letter-spacing: 1px;">
            	Peringatan transaksi sedang diproses!
                <button type="button" class="close btn-close-mdl-custom" data-dismiss="modal" style="color: #fff;">&times;</button>
            </div>
            <div class="modal-body content-proses-warning">
                	
        	</div>
        <div class="modal-footer">
            	<button type="button" class="btn btn-notif-delivery" data-dismiss="modal">OK , Saya Paham !!</button>
          </div>
    </div>
</div>
<div class="modal fade" id="mdl-paymentpenjualan" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background: #009a51;color: #fff;font-weight: 600;letter-spacing: 1px;">
                Peringatan barang yang sudah dibayar!
                <button type="button" class="close btn-close-mdl-custom" data-dismiss="modal" style="color: #fff;">&times;</button>
            </div>
            <div class="modal-body content-payment-warning">
                    
            </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-notif-delivery" data-dismiss="modal">OK , Saya Paham !!</button>
          </div>
    </div>
</div>
</body>
</html>