<!-- Mainly scripts -->
    <script src="{{asset('assets/js/jquery-2.1.1.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('assets/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/moment/moment.js')}}"></script>
    <!-- Flot -->
    <script src="{{asset('assets/js/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('assets/js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/flot/jquery.flot.spline.js')}}"></script>
    <script src="{{asset('assets/js/plugins/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('assets/js/plugins/flot/jquery.flot.pie.js')}}"></script>

    <!-- Peity -->
    <script src="{{asset('assets/js/plugins/peity/jquery.peity.min.js')}}"></script>
    <script src="{{asset('assets/js/demo/peity-demo.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('assets/js/inspinia.js')}}"></script>
    <script src="{{asset('assets/js/plugins/pace/pace.min.js')}}"></script>

    <!-- jQuery UI -->
    <script src="{{asset('assets/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

    <!-- GITTER -->
    <script src="{{asset('assets/js/plugins/gritter/jquery.gritter.min.js')}}"></script>

    <!-- Sparkline -->
    <script src="{{asset('assets/js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Sparkline demo data  -->
    <script src="{{asset('assets/js/demo/sparkline-demo.js')}}"></script>

    <!-- ChartJS-->
    <script src="{{asset('assets/js/plugins/chartJs/Chart.min.js')}}"></script>

    <!-- Toastr -->
    <script src="{{asset('assets/js/plugins/toastr/toastr.min.js')}}"></script>

    <script src="{{asset('assets/js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{asset('assets/accounting-js/accounting.umd.js')}}"></script>
    <script src="{{asset('assets/maskmoney/jquery.maskMoney.min.js')}}"></script>
    {{-- <script src="{{asset('assets/select2/js/select2.min.js')}}"></script> --}}
    <script src="{{asset('assets/select2-new/select2.min.js')}}"></script>
    <script src="{{asset('assets/iziToast/iziToast.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/slick/slick.min.js')}}"></script>

    <script src="{{asset('assets/js-cookie/js.cookie.js')}}"></script>
    {{-- Text editor --}}
    <script src="{{asset('assets/summernote/dist/summernote.min.js')}}"></script>

    <script src="{{asset('assets/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('assets/js/plugins/clockpicker/clockpicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/xlsx.full.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/slick/slick.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/jquerycountdown/jquery.countdown.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/lodash.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/staps/jquery.steps.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('assets/js/plugins/iCheck/icheck.min.js')}}"></script>

    <script>
        $(document).ready(function() {

            $('.navbar-minimalize.minimalize-styl-2').click(function(){
                ($('body').hasClass('mini-navbar')) ? localStorage.setItem('_minisidebar', 'mini-navbar') : localStorage.removeItem('_minisidebar');
            })

            var check_minisidebar = localStorage.getItem('_minisidebar');

            (check_minisidebar) ? $('body').addClass(check_minisidebar) : '';

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

            $('.datepicker').datepicker({
                format:'dd-mm-yyyy'
            });

            $('.input-uang').maskMoney();

            $('.select2').select2();

            $('.clockpicker').clockpicker({
                default:'now',
                donetext: 'Selesai'
            });
            
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

            // $.fn.modal.Constructor.prototype.enforceFocus = function() {};
        });
    </script>