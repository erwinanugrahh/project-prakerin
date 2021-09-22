//teachers datatable
var table=$('#testimonials_table').DataTable({
    // "processing": true,
    "serverSide": true,
    "bSort" : true,
    "ajax": {
        url: '/api/get_testimonials'
    },
    // orderCellsTop: true,
    fixedHeader: true,
    "columns": [
        {data:"checkbox",searchable:false,orderable:false,sortable:false,className:'p-0 pr-1 align-middle'},
        {data:"photo",className:'align-middle',orderable:true,sortable:true},
        {data:"name",className:'align-middle'},
        {data:"desc",className:'align-middle'},
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

//select all
$('#orderAll').on('click',function(){
    let checked = $(this).prop('checked');
    $('input[name=selected]').prop('checked',checked);
});

$('#delete-selected').on('click', function(){
    let selected = $("input[name=selected]:checked");
    if(selected.length==0){
        Toast.fire({
            icon: 'error',
            title: 'Pilih terlebih dahulu'
        })
    }else{
        Swal.fire({
            title: 'Apakah kamu yakin?',
            text: "Testimoni akan terhapus selamanya!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                let arraySelected = [];
                selected.each((i, n)=>{
                    arraySelected.push(n.value);
                })
                $.ajax({
                    url: '/api/testimonial/delete-selected',
                    method: 'POST',
                    data: {id: arraySelected},
                    success: function(result){
                        table.draw()
                        Toast.fire({
                            icon: 'success',
                            title: `Berhasil terhapus, ${result.count} testimoni terhapus.`
                        })
                    }
                })
            }
        })
    }
})
