$('#absen').addClass('active').parent().parent().addClass('active')
$('.nice-select').niceSelect()

var table = $('#absens_table').DataTable({
    "columnDefs": [
        { "orderable": true, "targets": [0, 1] },
        { "orderable": false, "targets": [2] }
    ]
});

$('#filter-absen').on('change', function(event) {
    table
        .column(2)
        .search($(this).val())
        .draw()
})
