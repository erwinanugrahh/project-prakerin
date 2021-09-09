ajax_url=''
//active
$('#data-student').addClass('active').parent().parent().addClass('active');

//students datatable
var table=$('#students_table').DataTable({
    // "processing": true,
    "serverSide": true,
    "bSort" : true,
    "ajax": {
        url: ajax_url,
        data: function(data){
            data.filter_major=$('#filter_major').val()
        }
    },
    // orderCellsTop: true,
    fixedHeader: true,
    "columns": [
        {data:"checkbox",searchable:false,orderable:false,sortable:false,className:'p-0 pr-1 align-middle'},
        {data:"nisn",className:'align-middle',orderable:true,sortable:true},
        {data:"name",className:'align-middle'},
        {data:"major_name",className:'align-middle',sortable:false},
        {data:"address",className:'align-middle'},
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

$('#filter_major').on('change', function(){
    table.draw();
});

//select all
$('#orderAll').on('click',function(){
    let checked = $(this).prop('checked');
    $('input[name=selected]').prop('checked',checked);
});

//select all
$('#orderAllField').on('click',function(){
    let checked = $(this).prop('checked');
    $('.ids').prop('checked',checked);
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
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let arraySelected = [];
                selected.each((i, n)=>{
                    arraySelected.push(n.value);
                })
                $.ajax({
                    url: 'student/delete-selected',
                    method: 'POST',
                    data: {id: arraySelected, _token: $('input[name=_token]').val()},
                    success: function(result){
                        table.draw()
                        Toast.fire({
                            icon: 'success',
                            title: `Berhasil terhapus, ${result.count} siswa terhapus.`
                        })
                    }
                })
            }
        })
    }
})

$('#import-data').on('change', function(){
    var $formData = new FormData();
    $formData.append('excel', $(this)[0].files[0])
    $.ajax({
        url: '/api/student/import',
        method: 'post',
        data: $formData,
        headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function(result){
            $('#preview_table').DataTable({
                "bSort" : true,
                data: result.data,
                destroy: true,
                "columns": [
                    {data:"checkbox",searchable:false,orderable:false,sortable:false,className:'p-0 pr-1 align-middle'},
                    {data:"nisn",className:'align-middle',orderable:true,sortable:true},
                    {data:"name",className:'align-middle'},
                    {data:"email",className:'align-middle',sortable:false},
                    {data:"address",className:'align-middle'},
                ],
            })
            $('#import').removeClass('disabled').attr('disabled',false)
        },
        error: function({responseJSON}){
            $('#import').addClass('disabled').attr('disabled',true)
            $('#preview_table').DataTable({
                destroy:true,
                data: []
            })
            Toast.fire({
                icon: 'error',
                title: responseJSON.errors.excel[0]
            })
        }
    })
})


$('#formImport').on('submit', function(e){
    e.preventDefault()
    var $formData = new FormData();
    $formData.append('excel', $('#import-data')[0].files[0])
    $formData.append('major_id', $('#major_id').val())
    $('.ids:checked').each(function(i, e){
        $formData.append('selected[]', e.value)
    })
    $.ajax({
        url: '/admin/student/import',
        method: 'post',
        data: $formData,
        headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function(result){
            Toast.fire({
                icon: 'success',
                title: result.message
            })
            $('#importData').modal('hide')
            table.draw()
        },
        error: function({responseJSON}){
            let html = '<ul>';
            for(let i in responseJSON.errors){
                responseJSON.errors[i].forEach(err=>{
                    html += `<li><b>${err}</b></li>`
                })
            }
            html += '</ul>'
            Swal.fire({
                title: 'Gagal diimport',
                html,
                icon: 'error',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Oke'
            })
        }
    })
})
