<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SAP</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.4.0/css/fixedHeader.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  {{-- Select2 --}}
  <link href="{{asset('plugins\select2\css\select2.min.css')}}" rel="stylesheet" />  
  <link href="{{asset('plugins\select2-bootstrap4-theme\select2-bootstrap4.min.css')}}" rel="stylesheet" />
  {{-- x-editable --}}
  <link href="{{asset('css/bootstrap-editable.css')}}" rel="stylesheet"/>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('layouts.header')
  <!-- /.navbar -->
  @include('layouts.sidebar')
  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <!-- /.control-sidebar -->
  @include('layouts.footer')
  <!-- Main Footer -->
  
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.js')}}"></script>
<!-- X-editable -->
<script src="{{asset('js/bootstrap-editable.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('plugins\select2\js\select2.min.js')}}"></script>
<script src="https://cdn.datatables.net/fixedheader/3.4.0/js/dataTables.fixedHeader.min.js"></script>
<script src={{(asset('plugins/chart.js/Chart.min.js'))}}></script>
@yield('scripts')
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>


<!-- Page specific script -->
<script>
  $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            });
            $.fn.editable.defaults.mode = 'popup';
            $('.xedit').editable({
                url: '{{url("detail_po_gr/update")}}',
                title: 'Update',
                success: function (response, newValue) {
                    console.log('Updated', response)
                }
            });
            $('.detail_prod_g2').editable({
                url: '{{url("detailprodg2/update")}}',
                title: 'Update',
                success: function (response, newValue) {
                    console.log('Updated', response)
                }
            });
            $('.detail_prod_g1').editable({
                url: '{{url("detailprodg1/update")}}',
                title: 'Update',
                success: function (response, newValue) {
                    console.log('Updated', response)
                }
            });

    })
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      scrollX: true,
      fixedHeader: true,
      buttons: [
        "copy",
        "csv",
        {
          extend: "excelHtml5",
          exportOptions: {
                    columns: [ 0, 1, 3, 4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21 ]
                },
          title: "Report PO Supplier", // Add your desired title here
        },
        {
          extend: "pdfHtml5",
          exportOptions: {
                    columns: [ 0, 1, 3, 4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21 ]
                },
          orientation: "landscape",
          pageSize: "A3",
          title: "Report PO Supplier"
        },
        {
          extend: "print",
          autoPrint: true,
          title: "Print PO Supplier",
          customize: function(win) {
            // Set a specific page size for the print preview
            $(win.document.body).css({
              'width': '297mm', // A4 paper width
              'height': '210mm' // A4 paper height
            });
            $(win.document.body).find('table').css({
              'width': '100%',
              'max-width': '100%',
              'font-size': '10pt' // Adjust font size if needed
            });
          }
        }
      ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
<script>
  $(function () {
    $("#data").DataTable({
      dom: 'Bfrtip',
      buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],    
    });
    });
</script>

<script>
  $(document).ready(function() {
    $('#select2').select2({
      width: 'resolve',
      theme: 'bootstrap4'
    });
    $('#select3').select2({
      width: 'resolve',
      theme: 'bootstrap4'
    });
    $('.select2').select2({
      width: 'resolve',
      theme: 'bootstrap4'
    });
  });
</script>


@section('js')
@show
</body>
</html>
