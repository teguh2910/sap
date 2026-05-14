$(document).ready(function() {
    // CSRF Token setup for AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // X-editable defaults
    $.fn.editable.defaults.mode = 'popup';

    // DataTables - standard table
    if ($('#data').length) {
        $('#data').DataTable({
            dom: 'Bfrtip',
            scrollX: true,
            responsive: true,
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    }

    // DataTables - report table with custom export
    if ($('#example1').length) {
        $('#example1').DataTable({
            scrollX: true,
            fixedHeader: true,
            buttons: [
                'copy',
                'csv',
                {
                    extend: 'excelHtml5',
                    title: document.title
                },
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'A3',
                    title: document.title
                },
                {
                    extend: 'print',
                    autoPrint: true,
                    title: document.title
                }
            ]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    }

    // Select2 initialization
    $('#select2, #select3, .select2').select2({
        width: 'resolve',
        theme: 'bootstrap4'
    });

    // X-editable bindings
    $('.xedit').editable({
        url: window.xeditUrls && window.xeditUrls.detail_po_gr || '/detail_po_gr/update',
        title: 'Update',
        success: function(response, newValue) {
            console.log('Updated', response);
        }
    });
    $('.detail_prod_g2').editable({
        url: window.xeditUrls && window.xeditUrls.detail_prod_g2 || '/detailprodg2/update',
        title: 'Update',
        success: function(response, newValue) {
            console.log('Updated', response);
        }
    });
    $('.detail_prod_g1').editable({
        url: window.xeditUrls && window.xeditUrls.detail_prod_g1 || '/detailprodg1/update',
        title: 'Update',
        success: function(response, newValue) {
            console.log('Updated', response);
        }
    });
});
