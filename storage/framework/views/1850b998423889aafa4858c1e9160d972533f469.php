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

    <!-- ChartJS-->
    <!-- <script src="<?php echo e(asset('assets/js/plugins/chartJs/Chart.min.js')); ?>"></script> -->

    <!-- Toastr -->
    <!-- <script src="<?php echo e(asset('assets/js/plugins/toastr/toastr.min.js')); ?>"></script> -->

    <script src="<?php echo e(asset('assets/js/plugins/dataTables/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/accounting-js/accounting.umd.js')); ?>"></script>
    <!-- <script src="<?php echo e(asset('assets/maskmoney/jquery.maskMoney.min.js')); ?>"></script> -->
    <script src="<?php echo e(asset('assets/select2/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/iziToast/iziToast.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/slick/slick.min.js')); ?>"></script>
    <!-- <script src="<?php echo e(asset('assets/js/plugins/easypiechart/jquery.easypiechart.js')); ?>"></script> -->

    <!-- <script src="<?php echo e(asset('assets/js-cookie/js.cookie.js')); ?>"></script> -->
    <script src="<?php echo e(asset('assets/js/plugins/datapicker/bootstrap-datepicker.js')); ?>"></script>

    <!-- Image cropper -->
    <script src="<?php echo e(asset('assets/jquery-cropper/cropper.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/js/plugins/sweetalert/sweetalert.min.js')); ?>"></script>

    <!-- <script src="<?php echo e(asset('assets/js/plugins/blueimp/jquery.blueimp-gallery.min.js')); ?>"></script> -->
    <script src="<?php echo e(asset('assets/infinite-scroll/dist/infinite-scroll.pkgd.js')); ?>"></script>


    <script>
        $(document).ready(function() {

        var availableTags = [
          "Botol Aqua",
          "Botol Air",
          "Botol Cat",
          "Galon",
          "Botol Kosmetik"
        ];
        $( "#top-search" ).autocomplete({
          source: availableTags,
          select: noResiChange
        });

        function noResiChange(event, ui)
        {
            console.log('selected', ui);
            
            window.location.href = '<?php echo e(route('produk-detail-frontpage')); ?>';
        }

            $.extend(true, $.fn.dataTable.defaults, {
                "responsive":true,
                "pageLength": 10,
                "lengthMenu": [[10, 20, 50, - 1], [10, 20, 50, "All"]],
                "language": {
                    "searchPlaceholder": "Cari Data",
                    "emptyTable": "Tidak ada data",
                    "sInfo": "Menampilkan _START_ - _END_ Dari _TOTAL_ Data",
                    "sSearch": '<i class="fa fa-search"></i>',
                    "sLengthMenu": "Menampilkan &nbsp; _MENU_ &nbsp; Data",
                    "infoEmpty": "",
                    "paginate": {
                        "previous": "Sebelumnya",
                        "next": "Selanjutnya",
                    }
                }

            });

            // $('.input-uang').maskMoney();

            $('.select2').select2();

            
            $.fn.select2.defaults.set( 'dropdownAutoWidth', true );
            $.fn.select2.defaults.set( 'width', 'resolve' );

            setTimeout(function(){
              $('.select2-container').css('width','100%');

            },1000);

            $('.select2').on('select2:opening', function(){

              $('.select2-container').css('width','100%');

            });

            $('.data-table').DataTable();

            // toastr.options = {
            //     closeButton: true,
            //     progressBar: true,
            //     showMethod: 'slideDown',
            //     timeOut: 4000
            // };

            iziToast.settings({
                position:'topRight'//Where it will be shown. It can be bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter or center.
            })

            $('#btn-logout').click(function(){
                Cookies.remove('tes_frontpage');
                window.location.reload();
            })

            // var cbpAnimatedHeader = (function() {
            //     var docElem = document.documentElement,
            //             header = document.querySelector( '#navbar-top' ),
            //             didScroll = false,
            //             changeHeaderOn = 200;
            //     function init() {
            //         window.addEventListener( 'scroll', function( event ) {
            //             if( !didScroll ) {
            //                 didScroll = true;
            //                 setTimeout( scrollPage, 250 );
            //             }
            //         }, false );
            //     }
            //     function scrollPage() {
            //         var sy = scrollY();
            //         if ( sy >= changeHeaderOn ) {
            //             $(header).addClass('navbar-scroll')
            //         }
            //         else {
            //             $(header).removeClass('navbar-scroll')
            //         }
            //         didScroll = false;
            //     }
            //     function scrollY() {
            //         return window.pageYOffset || docElem.scrollTop;
            //     }
            //     init();

            // })();

        });
    </script>
    <script type="text/javascript">

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

    });
    $(document).ready(function () {
        $("#dropdown-categories").click(function () {
            $(".Sidenav-backdoor").toggleClass("w-100");
        });
    });
    $(document).ready(function () {
        $(".Sidenav-backdoor").click(function () {
            $(".Sidenav-backdoor").removeClass("w-100");
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
    })
</script><?php /**PATH C:\xampp\htdocs\warungislamibogor_shop\resources\views/frontpage/layouts/_script-frontpage.blade.php ENDPATH**/ ?>