<!DOCTYPE html>
<html>
<?php echo $__env->make('frontpage.layouts._head-frontpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('extra_style'); ?>
<body class="canvas-menu top-navigation">
	

	<div class="mini-navbar-show"></div>
	
	<div id="wrapper" style="background:white;">


		

			<?php echo $__env->make('frontpage.layouts._sidebar-frontpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		

        <div id="page-wrapper" class="white-bg dashbard-1" style="padding:0;">
            <div class="loader-new-wrapper">
<div class="loader-new-wib">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>
</div>
			
			<?php echo $__env->make('frontpage.layouts._navbar-frontpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		
	        <div class="wrapper_content">
				
					<?php echo $__env->yieldContent('content'); ?>
				
			


			<?php echo $__env->make('layouts._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            

		</div>
	</div>
	<?php echo $__env->make('frontpage.layouts._script-frontpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->yieldContent('extra_script'); ?>
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
</div>
<div id="mdl-prosespenjualan" class="modal fade" role="dialog" aria-hidden="true">
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
</html><?php /**PATH C:\xampp\htdocs\warungislamibogor_shop\resources\views/frontpage/main-frontpage.blade.php ENDPATH**/ ?>