ajax_url=''
//active
$('#data-teacher').addClass('active').parent().parent().addClass('active');

//teachers datatable
var table=$('#teachers_table').DataTable({
    // "processing": true,
    "serverSide": true,
    "bSort" : true,
    "ajax": {
        url: ajax_url
    },
    // orderCellsTop: true,
    fixedHeader: true,
    "columns": [
        {data:"checkbox",searchable:false,orderable:false,sortable:false,className:'p-0 pr-1 align-middle'},
        {data:"nip",className:'align-middle',orderable:true,sortable:true},
        {data:"name",className:'align-middle'},
        {data:"major_name",className:'align-middle'},
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
                    url: 'teacher/delete-selected',
                    method: 'POST',
                    data: {id: arraySelected, _token: $('input[name=_token]').val()},
                    success: function(result){
                        table.draw()
                        Toast.fire({
                            icon: 'success',
                            title: `Berhasil terhapus, ${result.count} guru terhapus.`
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
        url: '/api/teacher/import',
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
                    {data:0,className:'align-middle',orderable:true,sortable:true},
                    {data:1,className:'align-middle'},
                    {data:2,className:'align-middle'},
                    {data:3,className:'align-middle'},
                    {data:4,className:'align-middle'},
                    {data:5,className:'align-middle'},
                    {data:6,className:'align-middle'},
                    {data:7,className:'align-middle'},
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
    $('.ids:checked').each(function(i, e){
        $formData.append('selected[]', e.value)
    })
    $.ajax({
        url: '/admin/teacher/import',
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


$(document).on('click', '.detail',function(){
    let teacher_id = $(this).data('id');
    $.ajax({
        url: '/api/teacher/'+teacher_id,
        method: 'post',
        success: function(data){
            $('#name').text(data.name);
            $('#nip').text(data.nip);
            $('#nama-lengkap').text(data.fullName);
            $('#email').text(data.email);
            $('#phone').text(data.phone);
            $('#address').text(data.address);
            $('#subject-name').text(data.subject.name);
            $('#major-name').text(data.major_name);
            $('#is-blogger').html(data.is_blogger==1?'<span class="badge badge-success">Ya</span>':'<span class="badge badge-warning">Bukan</span>');
            $('#detail-guru-modal').modal('show')
        }
    })
})
