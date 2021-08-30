$('#lesson').addClass('active')
var table=$('#tasks_table').DataTable({
    // "processing": true,
    "serverSide": true,
    "bSort" : true,
    "ajax": {
        url: $('#url').val(),
        data: function(data){
            data.filter_status=$('#filter_status').val()
            data.filter_major=$('#filter_major').val()
        }
    },
    // orderCellsTop: true,
    fixedHeader: true,
    "columns": [
        {data:"DT_RowIndex",searchable:false,orderable:false,sortable:false,className:'text-center align-middle'},
        {data:"name",className:'align-middle'},
        {data:"major"},
        {data:"value"},
        {data:"done",className:'align-middle',orderable:false,sortable:false},
        {data:"action",searchable:false,orderable:false,sortable:false,className:'align-middle text-center'}//action
    ],
    "language": {
        "sEmptyTable":     "No data available in table",
        "sInfo":           "Showing"+" _START_ "+"to"+" _END_ "+"of"+" _TOTAL_ "+"records",
        "sInfoEmpty":      "Showing"+" 0 "+"to"+" 0 "+"of"+" 0 "+"records",
        "sInfoFiltered":   "("+"filtered"+" "+"from"+" _MAX_ "+"total"+" "+"records"+"",
        "sInfoPostFix":    "",
        "sInfoThousands":  ",",
        "sLengthMenu":     "Show"+" _MENU_ "+"records",
        "sLoadingRecords": "Loading...",
        "sProcessing":     "Processing...",
        "sSearch":         "Search"+":",
        "sZeroRecords":    "No matching records found",
        "oPaginate": {
            "sFirst":    "First",
            "sLast":     "Last",
            "sNext":     "Next",
            "sPrevious": "Previous"
        },
    }
});

$('#filter_status, #filter_major').on('change', function(){
    table.draw()
})
$('.filter_select').niceSelect()
