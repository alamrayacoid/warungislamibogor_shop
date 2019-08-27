<!-- Mainly scripts -->
    <script src="<?php echo e(asset('assets/js/jquery-2.1.1.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/metisMenu/jquery.metisMenu.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/slimscroll/jquery.slimscroll.min.js')); ?>"></script>

    <!-- Flot -->
    <script src="<?php echo e(asset('assets/js/plugins/flot/jquery.flot.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/flot/jquery.flot.tooltip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/flot/jquery.flot.spline.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/flot/jquery.flot.resize.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/flot/jquery.flot.pie.js')); ?>"></script>

    <!-- Peity -->
    <script src="<?php echo e(asset('assets/js/plugins/peity/jquery.peity.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/demo/peity-demo.js')); ?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo e(asset('assets/js/inspinia.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/pace/pace.min.js')); ?>"></script>

    <!-- jQuery UI -->
    <script src="<?php echo e(asset('assets/js/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>

    <!-- GITTER -->
    <script src="<?php echo e(asset('assets/js/plugins/gritter/jquery.gritter.min.js')); ?>"></script>

    <!-- Sparkline -->
    <script src="<?php echo e(asset('assets/js/plugins/sparkline/jquery.sparkline.min.js')); ?>"></script>

    <!-- Sparkline demo data  -->
    <script src="<?php echo e(asset('assets/js/demo/sparkline-demo.js')); ?>"></script>

    <!-- ChartJS-->
    <script src="<?php echo e(asset('assets/js/plugins/chartJs/Chart.min.js')); ?>"></script>

    <!-- Toastr -->
    <script src="<?php echo e(asset('assets/js/plugins/toastr/toastr.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/js/plugins/dataTables/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/accounting-js/accounting.umd.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/maskmoney/jquery.maskMoney.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/select2/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/iziToast/iziToast.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/slick/slick.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/easypiechart/jquery.easypiechart.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/js-cookie/js.cookie.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/datapicker/bootstrap-datepicker.js')); ?>"></script>

    <!-- Image cropper -->
    <script src="<?php echo e(asset('assets/jquery-cropper/cropper.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/js/plugins/sweetalert/sweetalert.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/js/plugins/blueimp/jquery.blueimp-gallery.min.js')); ?>"></script>


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

            $('.input-uang').maskMoney();

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

            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000
            };

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
    let appendloader = '<div id="overlay-loading">' +
    '<div class="content-loader">' +
        '<img src="<?php echo e(asset("assets/img/img-product/Ellipsis-2s-140px.svg")); ?>">' +
    '</div>' +
    '</div>';
    $("body").prepend(appendloader).addClass('overflow-hidden');
    $(window).on('load', function () {
    setTimeout(removeLoaderweb, 1000); //wait for page load PLUS two seconds.
    });
    function removeLoaderweb() {
     $("#overlay-loading").fadeOut(500, function () {
        $("#overlay-loading").remove();
        $('body').removeClass('overflow-hidden');
    });
    }
        $(document).ready(function(){
            
            $('[data-target="#navbar"]').click(function(){

                ($('#navbar').hasClass('in')) ? $(this).find('i').removeClass('fa-caret-up').addClass('fa-caret-down') : $(this).find('i').removeClass('fa-caret-down').addClass('fa-caret-up')

            });
            $('.tooltip-demo').tooltip({
                selector: "[data-toggle=tooltip]",
                container: "body"
            });         
        });
        $(function () {
        $(".btn-scrollTop").hide();
            $(window).scroll(function () {
                var scroll = $(window).scrollTop();
            if (scroll > 150) {
                $(".btn-scrollTop").slideDown();
            } else {
                $(".btn-scrollTop").slideUp();
            }
        });

        });
        $(document).ready(function (){
            $(".btn-scrollTop").click(function (){
                $('html, body').animate({
                    scrollTop: $("#bodytop").offset().top
                }, 2000);
            });
        });
        $(document).ready(function(){
            $(".searchbarang").autocomplete({
            source: "<?php echo e(route('cari-barang')); ?>",
            minLength: 1,
            select: function (event, data) {
                console.log(data);
                setTimeout(function(){
                    $("#tombolcaribarang").click();
                     }, 200);
            },
        });

        });
        $(document).ready(function(){
            $("#dropdown-categories").click(function(){
                $(".Sidenav-backdoor").toggleClass("w-100");
            });
        });
        $(document).ready(function(){
            $(".Sidenav-backdoor").click(function(){
                $(".Sidenav-backdoor").removeClass("w-100");
            });
        });
        $(document).ready(function(){
            $('.select2').select2();
        });
        var ls = document.getElementById('ls');
var bttn = document.getElementById('smallchat-button');



function toggleSwitchLang(){
  ls.classList.toggle('active-chat')
}
$(document).ready(function(){
    
    $("#smallchat-show").click(function(){
    $("#smallchat-show").slideUp();
    setTimeout(function(){
        $(".smallchat-box").slideDown("slow");
        }, 300);
  });
  $(".hidechat-widget").click(function(){
    $(".smallchat-box").slideUp("slow");
    setTimeout(function(){
        $("#smallchat-show").slideDown("slow");
        }, 300);
  });
});

    </script><?php /**PATH C:\xampp\htdocs\warungislamibogor_shop\resources\views/frontpage/layouts/_script-frontpage.blade.php ENDPATH**/ ?>