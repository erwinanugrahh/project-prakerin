$('#blog').addClass('active')

CKEDITOR.replace('content', {
    filebrowserImageBrowseUrl: '/filemanager?type=Images',
    filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token='+$('input[name=_token]').val(),
    filebrowserBrowseUrl: '/filemanager?type=Files',
    filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='+$('input[name=_token]').val()
});

var table = $('#blogs_table').DataTable({
    "serverSide": true,
    "bSort" : true,
    "ajax": {
        url: '',
        data: function(data){
            data.filter_status=$('#filter_status').val()
        }
    },
    // orderCellsTop: true,
    fixedHeader: true,
    "columns": [
        {data:"checkbox",searchable:false,orderable:false,sortable:false,className:'p-0 pr-1 align-middle'},
        {data:"banner",searchable:false,orderable:false,sorttable:false,className:'align-middle'},
        {data:"title",className:'align-middle'},
        {data:"status",className:'align-middle'},
        {data:"action",searchable:false,orderable:false,sortable:false,className:'align-middle text-center'}//action
    ],
})

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
                    url: 'blog/delete-selected',
                    method: 'POST',
                    data: {id: arraySelected, _token: $('input[name=_token]').val()},
                    success: function(result){
                        table.draw()
                        Toast.fire({
                            icon: 'success',
                            title: `Berhasil terhapus, ${result.count} blog terhapus.`
                        })
                    }
                })
            }
        })
    }
})

$('#filter_status').on('change', function(){
    table.draw()
})
