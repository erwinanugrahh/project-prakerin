var table = $('#ppdb_table').DataTable({
    "serverSide":true,
    "bSort":true,
    "ajax":{
        url:"/admin/get_ppdb"
    },
    "columns": [
        {data: "checkbox",className:'p-0 pr-1 align-middle'},
        {data: "name"},
        {data: "nisn"},
        {data: "major"},
        {data: "action", className:'text-center align-middle'},
    ]
})

//select all
$('#orderAll').on('click',function(){
    let checked = $(this).prop('checked');
    $('input[name=selected]').prop('checked',checked);
});

$(document).on('click', '.accepted', function(){
    let id = $(this).data('id')
    send_result([id], 'accepted', [$(this).data('name')])
})
$(document).on('click', '.rejected', function(){
    let id = $(this).data('id')
    send_result([id], 'rejected', [$(this).data('name')])
})

function send_result(ids, action, additional){
    var option = {
        accepted: 'terima',
        rejected: 'tolak'
    }
    let message;
    if(additional != null){
        let siswa;
        siswa = additional[0]
        message = `Calon Siswa ${siswa}  akan di${option[action]}`;
    }else{
        message = `${ids.length} siswa ini akan di${option[action]}`;
    }
    Swal.fire({
        title: 'Apakah Kamu Yakin?',
        text: message,
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: `Ya, ${option[action]}`,
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'ppdb/send_result',
                method: 'POST',
                data: {
                    _token: $('input[name=_token]').val(),
                    ids,
                    action
                },
                success: function(result){
                    table.draw()
                    Toast.fire({
                        icon: 'success',
                        title: result.message
                    })
                }
            })
        }
    })
}

function bulk_send(action) {
    let selected = $('input[name=selected]:checked')
    if(selected.length==0){
        Toast.fire({
            icon: 'error',
            title: 'Silahkan pilih terlebih dahulu'
        })
    }else{
        let arraySelected = [];
        selected.each((i, node)=>{
            arraySelected.push(node.value)
        })
        send_result(arraySelected, action);
    }
}
