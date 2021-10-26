//active
$('#data-major').addClass('active').parent().parent().addClass('active');
/*===========JsGrid field Validation ================================*/

$.ajax({
    url: '/admin/major',
}).done(fields=>{
    $("#majorities_table").jsGrid({
        height: "400px",
        width: "100%",
        inserting: true,
        editing: true,
        sorting: true,
        paging: true,
        autoload: true,
        pageSize: 10,
        pageButtonCount: 5,
        deleteConfirm: 'Apakah kamu yakin?',
        confirmDeleting: false,
        controller: {
            loadData: function() {
                var d =  $.Deferred();
                $.ajax({
                    type: "GET",
                    url: "/api/major/",
                }).done(function(res){
                    d.resolve(res)
                });
                return d.promise()
            },
            insertItem: function(item) {
                item._token = $('input[name=_token]').val()
                $.ajax({
                    type: "POST",
                    url: "major/",
                    data: item,
                    async: false,
                    success: function(id){
                        Toast.fire({
                            icon: 'success',
                            title: 'Kelas / Jurusan berhasil ditambahkan'
                        })
                        item.id = id
                    }
                });
                return item;
            },
            updateItem: function(item) {
                item._token = $('input[name=_token]').val()
                $.ajax({
                    type: "PUT",
                    url: "major/"+item.id,
                    data: item,
                    success: function(){
                        Toast.fire({
                            icon: 'success',
                            title: 'Kelas / Jurusan berhasil diubah'
                        })
                    }
                });
                return item;
            }
        },
        fields,
        onItemDeleting: function (args) {
            if (!args.item.deleteConfirmed) { // custom property for confirmation
                args.cancel = true; // cancel deleting
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then(confirm => {
                    if (confirm.isConfirmed) {
                        args.item.deleteConfirmed = true;
                        $('#majorities_table').jsGrid('deleteItem', args.item);
                        $.ajax({
                            url: 'major/' + args.item.id,
                            method: 'DELETE',
                            data: {
                                name: args.item.Kelas,
                                skill_id: args.item.Jurusan,
                                level: args.item.Tingkat,
                                _token: $('input[name=_token]').val()
                            },
                            success: function () {
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Kelas / Jurusan berhasil dihapus'
                                })
                            }
                        })
                    }
                })
            }
        },
    });
})
