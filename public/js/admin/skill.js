var table = $('#skills_table').DataTable({
    "serverSide":true,
    "bSort":true,
    "ajax":{
        url:"/admin/get_skills"
    },
    "columns": [
        {data: "checkbox",className:'p-0 pr-1 align-middle'},
        {data: "logo"},
        {data: "name"},
        {data: "action", className:'text-center align-middle'},
    ]
})

$(document).on('click', '.detail', function(){
    let skill_id = $(this).data('id')
    $.ajax({
        url: '/admin/skill/'+skill_id,
        success: function(skill){
            $('#detail-skill-modal').modal('show')
            $('#image-skill').attr('src',skill.logo)
            $('.name').text(skill.name)
            $('#description').text(skill.description)
        }
    })
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
            title: 'Apakah kamu yakin?',
            text: selected.length+" Jurusan akan terhapus!",
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
                    url: 'skill/delete-selected',
                    method: 'POST',
                    data: {id: arraySelected, _token: $('input[name=_token]').val()},
                    success: function(result){
                        table.draw()
                        Toast.fire({
                            icon: 'success',
                            title: `Berhasil terhapus, ${result.count} jurusan terhapus.`
                        })
                    }
                })
            }
        })
    }
})
