<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo e(asset('assets/img/logo-wib-cilik-maning.png')); ?>">

    <title>Warung Islami Bogor</title>

    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/fontawesome-new/css/all.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
    

    <link href="<?php echo e(asset('assets/css/plugins/jQueryUI/jquery-ui.css')); ?>" rel="stylesheet">

    <!-- Toastr style -->
    <link href="<?php echo e(asset('assets/css/plugins/toastr/toastr.min.css')); ?>" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?php echo e(asset('assets/js/plugins/gritter/jquery.gritter.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('assets/css/animate.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/plugins/dataTables/datatables.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/select2/css/select2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/iziToast/iziToast.min.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('assets/css/plugins/slick/slick.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/plugins/slick/slick-theme.css')); ?>" rel="stylesheet">
    
    <link href="<?php echo e(asset('assets/css/plugins/datapicker/datepicker3.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/jquery-cropper/cropper.min.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('assets/css/plugins/sweetalert/sweetalert.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('assets/css/plugins/blueimp/css/blueimp-gallery.min.css')); ?>" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/alamraya-customer-style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom-customer.css')); ?>">

</head>
<style>
    #overlay-loading {
    position: fixed;
    /*display: none;*/
    width: 100%;
    height: 100vh !important;
    overflow:hidden;
    top: 0;
    left: 0;
    display:flex;
    justify-content:center;
    align-items:center;
    right: 0;
    z-index: 999999;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.6);
}
.tooltip-custom::after {
    background-color: #333;
    color: #fff;
    padding: 10px 15px;
    position: absolute;
    text-align: center;
    display:none;
    z-index: 999;
    width: 160px !important;
}
.tooltip-custom::before {
    background-color: #333;
    content: ' ';
    display:none;
    position: absolute;
    width: 15px;
    height: 15px;
    z-index: 999;
}
.ui-autocomplete{
    z-index:9999999;
}
.ui-menu .ui-menu-item a{
    font-size:12px !important;
    padding: 10px 5px;
    border:0;
    background: white;
}
.ui-menu .ui-menu-item a:hover{
    background: #f2f2f2;
    border:0;
}
.tooltip-custom:hover::after {
    display: block;
}

.tooltip-custom:hover::before {
    display: block;
}
.tooltip-custom.bottom::after {
    content:""attr(value)"";
    bottom: 0;
    left: 50%;
    transform: translate(-50%, calc(100% + 10px));
}
.tooltip-custom.bottom::before {
    bottom: 0;
    left: 50%;
    transform: translate(-50%, calc(100% + 5px)) rotate(45deg);
}      
    </style><?php /**PATH C:\xampp\htdocs\warungislamibogor_shop\resources\views/frontpage/layouts/_head-frontpage.blade.php ENDPATH**/ ?>