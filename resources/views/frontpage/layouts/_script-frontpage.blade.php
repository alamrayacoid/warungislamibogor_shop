<!-- Mainly scripts -->
<script src="{{asset('assets/js/jquery-2.1.1.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

<!-- jQuery UI -->
<script src="{{asset('assets/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>


<script src="{{asset('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
<script src="{{asset('assets/accounting-js/accounting.umd.js')}}"></script>
<script src="{{asset('assets/select2/js/select2.min.js')}}"></script>
<script src="{{asset('assets/iziToast/iziToast.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/slick/slick.min.js')}}"></script>

<script src="{{asset('assets/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>

<!-- Image cropper -->
<script src="{{asset('assets/jquery-cropper/cropper.min.js')}}"></script>

<script src="{{asset('assets/js/plugins/sweetalert/sweetalert.min.js')}}"></script>

<script src="{{asset('assets/infinite-scroll/dist/infinite-scroll.pkgd.js')}}"></script>


<script>
    $(document).ready(function () {
        $.extend(true, $.fn.dataTable.defaults, {
            "responsive": true,
            "pageLength": 10,
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "All"]
            ],
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
        })

        $('#btn-logout').click(function () {
            Cookies.remove('tes_frontpage');
            window.location.reload();
        })
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

        $('[data-target="#navbar"]').click(function () {

            ($('#navbar').hasClass('in')) ? $(this).find('i').removeClass('fa-caret-up').addClass(
                'fa-caret-down'): $(this).find('i').removeClass('fa-caret-down').addClass(
                'fa-caret-up')

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
    $(document).ready(function () {
        $(".btn-scrollTop").click(function () {
            $('html, body').animate({
                scrollTop: $("#bodytop").offset().top
            }, 2000);
        });
    });
    $(document).ready(function () {
        $(".searchbarang").autocomplete({
            source: "{{route('cari-barang')}}",
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
            $.ajax({
                url: '{{route("remove.keranjang")}}',
                method: 'POST',
                data: {
                    '_token': '{{csrf_token()}}',
                    'id': id,
                    'code': code,
                    'label': label,
                    'jumlah': jumlah,
                },
                success: function (data) {
                    tablecart.ajax.reload();
                    $.ajax({
                        url: "{{route('getnow_qty-cart')}}",
                        data: {
                            'idcustomer': $('#idcustomer').val(),
                        },
                        success: function (data) {
                            if(data == '0'){
                                document.getElementById('qty-cart-nav').innerHTML = '0';    
                                $('.cart-refresh').addClass('d-none');
                                $('.rounded-cart-nav').addClass('d-none');
                                $('.cart-nav-empty').removeClass('d-none');
                                console.log('success');
                            }else{
                            document.getElementById('qty-cart-nav').innerHTML = data;
                            document.getElementById('js-cart-nav').innerHTML = data;
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
                url: "{{ route('detail.keranjang.nav') }}",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}"
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
    (function($){
        $(document).ready(function() {
            $('.dropdown-toggle[href="#"]').dropdown();
        });
    })(jQuery);
</script>