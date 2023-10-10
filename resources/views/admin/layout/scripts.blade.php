
    <!-- latest js -->
    <script src="{{asset('admin/assets/js/jquery-3.6.0.min.js')}}"></script>

    <!-- Bootstrap js -->
    <script src="{{asset('admin/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>

    <!-- feather icon js -->
    <script src="{{asset('admin/assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/icons/feather-icon/feather-icon.js')}}"></script>

    <!-- scrollbar simplebar js -->
    <script src="{{asset('admin/assets/js/scrollbar/simplebar.js')}}"></script>
    <script src="{{asset('admin/assets/js/scrollbar/custom.js')}}"></script>

    <!-- Sidebar jquery -->
    <script src="{{asset('admin/assets/js/config.js')}}"></script>

    <!-- tooltip init js -->
    <script src="{{asset('admin/assets/js/tooltip-init.js')}}"></script>

    <!-- Plugins JS -->
    <script src="{{asset('admin/assets/js/sidebar-menu.js')}}"></script>
    <script src="{{asset('admin/assets/js/notify/bootstrap-notify.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/notify/index.js')}}"></script>

    <!-- Apexchar js -->
    <script src="{{asset('admin/assets/js/chart/apex-chart/apex-chart1.js')}}"></script>
    <script src="{{asset('admin/assets/js/chart/apex-chart/moment.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/chart/apex-chart/apex-chart.js')}}"></script>
    <script src="{{asset('admin/assets/js/chart/apex-chart/stock-prices.js')}}"></script>
    <script src="{{asset('admin/assets/js/chart/apex-chart/chart-custom1.js')}}"></script>


    <!-- slick slider js -->
    <script src="{{asset('admin/assets/js/slick.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/custom-slick.js')}}"></script>

    <!-- customizer js -->
    <script src="{{asset('admin/assets/js/customizer.js')}}"></script>

    <!-- ratio js -->
    <script src="{{asset('admin/assets/js/ratio.js')}}"></script>

    <!-- sidebar effect -->
    <script src="{{asset('admin/assets/js/sidebareffect.js')}}"></script>

    <!-- Theme js -->
    <script src="{{asset('admin/assets/js/script.js')}}"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
    </script>
