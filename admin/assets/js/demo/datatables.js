// Call the dataTables jQuery plugin
$(document).ready(function() {
    // $('#dataTable').DataTable();
    var table = $('#dataTable').DataTable( {
      dom: 'Bfrtip',
      buttons: [
        {
          extend: 'colvis',
          collectionLayout: 'two-column',
          text: 'Filter'
        },
        // 'pageLength',
        {
            extend:    'excelHtml5',
            text:      '<i class="fa fa-file-excel-o"></i>',
            titleAttr: 'Export Excel'
        },
        {
            extend:    'pdfHtml5',
            text:      '<i class="fa fa-file-pdf-o"></i>',
            titleAttr: 'Export PDF'
        },
          {
              extend: 'print',
              text: '<i class="fa fa-print"></i>',
              titleAttr: 'Print All',
              exportOptions: {
                  modifier: {
                      selected: null
                  }
              }
          }
      ],
      lengthMenu: [
        [ 5,],
        [ '']
      ],
      // select: true,
      stateSave: true,
  } );
  table.buttons().container().appendTo( '#example_wrapper .small-6.columns:eq(0)' );
});
  