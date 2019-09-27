<!-- Mainly scripts -->
<script src="<?php echo e(asset('assets/js/jquery-2.1.1.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>

<!-- jQuery UI -->
<script src="<?php echo e(asset('assets/js/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>


<script src="<?php echo e(asset('assets/js/plugins/dataTables/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/accounting-js/accounting.umd.js')); ?>"></script>
<script src="<?php echo e(asset('assets/select2/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/iziToast/iziToast.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/slick/slick.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/plugins/datapicker/bootstrap-datepicker.js')); ?>"></script>

<!-- Image cropper -->
<script src="<?php echo e(asset('assets/jquery-cropper/cropper.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/plugins/sweetalert/sweetalert.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/infinite-scroll/dist/infinite-scroll.pkgd.js')); ?>"></script>
<script src="<?php echo e(asset('assets/jscroll-master/dist/jquery.jscroll.min.js')); ?>"></script>
<script src="https://js.pusher.com/5.0/pusher.min.js"></script>

<script type="text/javascript">

    function check_text(variable,text_data)
    {
        var text = /[.*+?^${}();:'/"|[\]\\]/g;

        if(text.test(text_data))
        {
            variable.val(text_data.replace(/[.*+?^${}();:'//"|[\]\\]/g, ''));
        }
        else
        {
            variable.val(text_data.replace(/[.*+?^${}();:'//"|[\]\\]/g, ''));
        }
    }

    function check_number(variable,text_data)
    {
        if(variable.val() != ''){
            var text = /[a-zA-Z.*?^${}();://'"|[\]\\]/g;
            var number = /^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[\s\./0-9]*$/g;

            if(number.test(text_data))
            {
                variable.val(text_data.replace(text, ''));
            }
            else
            {
                variable.val(text_data.replace(text, ''));
            }
        }
    }

    function validateEmail(variable,email) {
        var text = /[.*+?^${}();:'//"|[\]\\]/g;
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if(re.test(String(email).toLowerCase()))
        {
            return true;
        }
        else
        {
            iziToast.warning({
                title:'Peringatan!',
                message:'Email Tidak Valid!'
            });
            variable.val(email.replace(/[*+?^${}();:'"/|[\]\\]/g, ''));
            return false;
        }

    }

    $('.text_limit').on('change',function(){
        check_text($(this),$(this).val());
    })

    $('.email_limit').on('change',function(){
        validateEmail($(this),$(this).val());
    })

    $('.number_limit').on('change',function(){
        check_number($(this),$(this).val());
    })

    $('.number_readonly').mouseenter(function(){
        $(this).prop("disabled", true);
    })

    $('.number_readonly').focus(function(){
        $(this).prop("disabled", true);
    })

    $(document).on('mouseleave , blur','.number_readonly',function(){
        $(this).prop("disabled", false);
    })

    $(window).on('load', function () {
        setTimeout(removeLoaderweb, 1000);
    });

    function removeLoaderweb() {
        $(".loader-wib").fadeOut(500, function () {
            $(".loader-wib").remove();
            $('body').removeClass('overflow-hidden');
            $('.content-wib').removeClass('d-none');
        });
    }
    $(document).ready(function () {
        $('html, body').scrollTop(0);
        $(window).on('beforeunload', function () {
            $('html, body').scrollTop(0);
        });
    });

    $(document).ready(function () {
        $(".searchbarang").autocomplete({
            source: "<?php echo e(route('cari-barang')); ?>",
            minLength: 1,
            select: function (event, data) {
                console.log(data);
                setTimeout(function () {
                    $("#tombolcaribarang").click();
                }, 200);
            },
        });

        $(".input-search--mobile").autocomplete({
            source: "<?php echo e(route('cari-barang')); ?>",
            minLength: 1,
            select: function (event, data) {
                console.log(data);
                setTimeout(function () {
                    $("#js-search--mobile").click();
                }, 200);
            },
        });

    });
    $(document).ready(function () {
        $("#dropdown-categories").click(function () {
            $(".Sidenav-backdoor-categories").toggleClass("w-100");
        });
        $('#js-search-mobile').click(function(){
            $('#js-sidebar-collapse').find('i').removeClass('fa-times');
            $('#js-sidebar-collapse').find('i').addClass('fa-bars');
            $('.navbar-collapse-custom').removeClass('active');
            $(".Sidenav-backdoor").removeClass("w-100");
            setTimeout(function(){
                $('.form-group-nav--mobile').toggleClass('d-none');
                }, 500);
            
            if($('.form-group-nav--mobile').hasClass('d-none')){
            $('#js-search-mobile').find('i').removeClass('fa-search');
            $('#js-search-mobile').find('i').addClass('fa-times');
            }else{
                $('#js-search-mobile').find('i').removeClass('fa-times');
                $('#js-search-mobile').find('i').addClass('fa-search');
            }
        })
    });
    $(document).ready(function () {
        $(".Sidenav-backdoor").click(function () {
            $(".Sidenav-backdoor-categories").removeClass("w-100");
        });
    });
    $(document).ready(function () {
        $('.select2').select2();
    });
    var ls = document.getElementById('ls');
    var bttn = document.getElementById('smallchat-button');



    function toggleSwitchLang() {
        ls.classList.toggle('active-chat')
    }
    $(document).ready(function () {

        $("#smallchat-show").click(function () {
            $("#smallchat-show").slideUp();
            setTimeout(function () {
                $(".smallchat-box").slideDown("slow");
            }, 300);
        });
        $(".hidechat-widget").click(function () {
            $(".smallchat-box").slideUp("slow");
            setTimeout(function () {
                $("#smallchat-show").slideDown("slow");
            }, 300);
        });
        $('#cart-navbar').on('click', '.remove', function () {
            var id = $(this).data('id');
            var code = $(this).data('ciproduct');
            var label = $(this).data('label');
            var jumlah = $(this).data('qty');
            $('.content-dropdown-cart').append(
                '<div class="loader-cart-nav-wib-group"><div class="loader-cart-nav--element"></div></div>'
                    );
            $('#cart-navbar').hide();
            $.ajax({
                url: '<?php echo e(route("remove.keranjang")); ?>',
                method: 'POST',
                data: {
                    '_token': '<?php echo e(csrf_token()); ?>',
                    'id': id,
                    'code': code,
                    'label': label,
                    'jumlah': jumlah,
                },
                success: function (data) {
                    tablecart.ajax.reload();
                    $.ajax({
                        url: "<?php echo e(route('getnow_qty-cart')); ?>",
                        data: {
                            'idcustomer': $('#idcustomer').val(),
                        },
                        success: function (data) {
                            if(data == '0'){
                                document.getElementById('qty-cart-nav').innerHTML = '0';    
                                $('.cart-refresh').addClass('d-none');
                                $('.rounded-cart-nav').addClass('d-none');
                                console.log('success');
                                $('.loader-cart-nav-wib-group').fadeOut();
                                    setTimeout(function () {
                                        $('.cart-nav-empty').removeClass('d-none');
                                }, 300);
                            }else{
                            document.getElementById('qty-cart-nav').innerHTML = data;
                            document.getElementById('js-cart-nav').innerHTML = data;
                            $('.loader-cart-nav-wib-group').fadeOut();
                                    setTimeout(function () {
                                        $('#cart-navbar').fadeIn();
                            }, 500);
                        }
                        
                        }
                    });
                }
            });
        });

        var tablecart = $('#cart-navbar').DataTable({
            responsive: true,
            serverSide: true,
            destroy: true,
            ordering: false,
            bFilter: false,
            bInfo: false,
            paging: false,
            ajax: {
                url: "<?php echo e(route('detail.keranjang.nav')); ?>",
                type: "post",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>"
                }
            },
            columns: [{
                data: 'detail'
            }, ],
            pageLength: 10,
            lengthMenu: [
                [10, 20, 50, -1],
                [10, 20, 50, 'All']
            ]
        });
    });
    $(document).ready(function(){
        
        $('.select2').select2();

        $.fn.select2.defaults.set('dropdownAutoWidth', true);
        $.fn.select2.defaults.set('width', 'resolve');

        setTimeout(function () {
            $('.select2-container').css('width', '100%');

        }, 1000);

        $('.select2').on('select2:opening', function () {

            $('.select2-container').css('width', '100%');

        });

        $('.data-table').DataTable();

        iziToast.settings({
            position: 'topRight' //Where it will be shown. It can be bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter or center.
        });
        $('.dropdown-menu').on('click', function(e) {
            e.stopPropagation();
        });

        <?php if(!Auth::check()): ?>
        <?php else: ?>
        Pusher.logToConsole = true;
        var pusher = new Pusher("<?php echo e(env('PUSHER_APP_KEY')); ?>", {
          cluster: "<?php echo e(env('PUSHER_APP_CLUSTER')); ?>",
          forceTLS: true
        });
        var penjualandelivered = pusher.subscribe('penjualan-channel');
        penjualandelivered.bind('penjualan-delivered', function(data) {
            if(data.message.customer.s_member == $('#idcustomernav').val()){
                let jumlahpembelian  = data.message.jumlahpenjualan;
                let penjualan = data.message.item;
                let nota = data.message.nota;
                $('#notif-pengiriman-transaksi').text(jumlahpembelian);
                var trHTML = '';
                    $.each(penjualan, function (i, item) {
                            trHTML += `<div class="group-notif-delivery  bold" style="font-size:12px;">
                        <div class="row">
                        <div class="col-lg-3 d-flex justify-content-center">
                            <img src="<?php echo e(asset('assets/img/img-product/product-4.png')); ?>" width="80px" height="80px" class="mt-2">
                        </div>
                        <div class="col-lg-9">
                            <div class="">`+item.i_name+`</div>
                            <div class="pt-4">`+item.s_nota+`</div>
                            <div style="color:rgba(0,0,0,.54);" class="pt-4">Total Harga : <span class="c-primary-wib">Rp. `+item.sd_price+`</span> | <span>`+item.sd_qty+`</span> Qty
                        </div>
                    </div>
                </div>
                </div>`;
                });
                $('body').append(`<button class="btn btn-primary d-none" id="get-notif-delivery" data-toggle="modal" data-target="#mdl-penjualan" hidden></button>`);
                $('.content-delivery-warning').append(trHTML);
                setTimeout(function(){
                    $('#get-notif-delivery').click();
                }, 1000);
            }else{
                console.log('Ops');
            }
        });


    var penjualanproses = pusher.subscribe('penjualan-channel');
        penjualanproses.bind('penjualan-proses', function(data) {
            console.log('kok gakenek');
            if(data.message.customer.s_member == $('#idcustomernav').val()){
                let jumlahproses  = data.message.jumlahproses;
                let itemproses = data.message.item;
                $('#notif-proses-transaksi').text(jumlahproses);
                var trHTML3 = '';
                    $.each(itemproses, function (i, item) {
                            trHTML3 += `<div class="group-notif-delivery  bold" style="font-size:12px;">
                        <div class="row">
                        <div class="col-lg-3 d-flex justify-content-center">
                            <img src="<?php echo e(asset('assets/img/img-product/product-4.png')); ?>" width="80px" height="80px" class="mt-2">
                        </div>
                        <div class="col-lg-9">
                            <div class="">`+item.i_name+`</div>
                            <div class="pt-4">`+item.s_nota+`</div>
                            <div style="color:rgba(0,0,0,.54);" class="pt-4">Total Harga : <span class="c-primary-wib">Rp. `+item.sd_price+`</span> | <span>`+item.sd_qty+`</span> Qty
                        </div>
                    </div>
                </div>
                </div>`;
                });
                $('body').append(`<button type="button" class="btn btn-info d-none" id="get-notif-proses" data-toggle="modal" data-target="#mdl-prosespenjualan">Open Modal</button>`);
                $('.content-proses-warning').append(trHTML3);
                setTimeout(function(){
                    $('#get-notif-proses').click();
                }, 1000);
            }else{
                console.log('Ops');
            }
        });

        // var penjualanpayment = pusher.subscribe('penjualan-channel');
        // penjualanpayment.bind('penjualan-payment', function(data) {
        //     if(data.message.customer.s_member == $('#idcustomernav').val()){
        //         let jumlahpembayaran  = data.message.jumlahpembayaran;
        //         let itempembayaran = data.message.item;
        //         $('#notif-payment-transaksi').text(jumlahpembayaran);
        //         var trHTML2 = '';
        //             $.each(itemproses, function (i, item) {
        //                     trHTML2 += `<div class="group-notif-delivery  bold" style="font-size:12px;">
        //                 <div class="row">
        //                 <div class="col-lg-3 d-flex justify-content-center">
        //                     <img src="<?php echo e(asset('assets/img/img-product/product-4.png')); ?>" width="80px" height="80px" class="mt-2">
        //                 </div>
        //                 <div class="col-lg-9">
        //                     <div class="">`+item.i_name+`</div>
        //                     <div class="pt-4">`+item.s_nota+`</div>
        //                     <div style="color:rgba(0,0,0,.54);" class="pt-4">Total Harga : <span class="c-primary-wib">Rp. `+item.sd_price+`</span> | <span>`+item.sd_qty+`</span> Qty
        //                 </div>
        //             </div>
        //         </div>
        //         </div>`;
        //         });
        //         $('body').append(`<button class="btn btn-primary d-none" id="get-notif-payment" data-toggle="modal" data-target="#mdl-payment" hidden></button>`);
        //         $('.content-payment-warning').append(trHTML2);
        //         setTimeout(function(){
        //             $('#get-notif-payment').click();
        //         }, 1000);
        //     }else{
        //         console.log('Ops');
        //     }
        // });
    <?php endif; ?>

    $('#js-sidebar-collapse').on('click', function () {
        // open or close navbar
        $('.navbar-collapse-custom').toggleClass('active');
        // close dropdowns
        $('.collapse.in').toggleClass('in');
        if($('.navbar-collapse-custom').hasClass('active')){
            $('#js-sidebar-collapse').find('i').removeClass('fa-bars');
            $('#js-sidebar-collapse').find('i').addClass('fa-times');
            $(".Sidenav-backdoor").addClass("w-100");
        }else{
            $('#js-sidebar-collapse').find('i').removeClass('fa-times');
            $('#js-sidebar-collapse').find('i').addClass('fa-bars');
            $(".Sidenav-backdoor").removeClass("w-100");
        }
        // and also adjust aria-expanded attributes we use for the open/closed arrows
        // in our CSS
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });


    
    });

</script><?php /**PATH C:\xampp\htdocs\warungislamibogor_shop\resources\views/frontpage/layouts/_script-frontpage.blade.php ENDPATH**/ ?>