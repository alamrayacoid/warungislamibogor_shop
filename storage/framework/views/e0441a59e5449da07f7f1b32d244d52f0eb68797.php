<!DOCTYPE html>
<html>
<?php echo $__env->make('frontpage.layouts._head-frontpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('extra_style'); ?>
<body class="canvas-menu top-navigation overflow-hidden">
	<div id="overlay-loading">
	    <div class="content-loader">
	        <img src="<?php echo e(asset("assets/img/img-product/Ellipsis-2s-140px.svg")); ?>">
	    </div>
	</div>

	<div class="mini-navbar-show"></div>
	
	<div id="wrapper" style="background:white;">

		

			<?php echo $__env->make('frontpage.layouts._sidebar-frontpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		

        <div id="page-wrapper" class="white-bg dashbard-1" style="padding:0;">
			
			<?php echo $__env->make('frontpage.layouts._navbar-frontpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		
	        <div class="wrapper_content">
				
					<?php echo $__env->yieldContent('content'); ?>
				
			


			<?php echo $__env->make('layouts._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

			<!-- <div id="blueimp-gallery" class="blueimp-gallery">
			    <div class="slides"></div>
			    <h3 class="title"></h3>
			    <a class="prev">‹</a>
			    <a class="next">›</a>
			    <a class="close">×</a>
			    <a class="play-pause"></a>
			    <ol class="indicator"></ol>
			</div> -->


		</div>
	</div>
	<?php echo $__env->make('frontpage.layouts._script-frontpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->yieldContent('extra_script'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\warungislamibogor_shop\resources\views/frontpage/main-frontpage.blade.php ENDPATH**/ ?>