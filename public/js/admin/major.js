//active
$('#data-major').addClass('active').parent().parent().addClass('active');
/*===========JsGrid field Validation ================================*/

$.ajax({
    url: '/admin/major',
}).done((result)=>{
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
            },
            // deleteItem: function(item) {
            //     item._token = $('input[name=_token]').val()
            //     $.ajax({
            //         url: 'major/'+item.id,
            //         method: 'DELETE',
            //         data: item,
            //         success: function(){
            //             Toast.fire({
            //                 icon: 'success',
            //                 title: 'Kelas / Jurusan berhasil dihapus'
            //             })
            //         }
            //     });
            // }
        },
        fields: [
            { name: "level", title: "Tingkat", type: "select", width: 50 , items: result.level, valueField: "Id", textField: "Name" },
            { name: "skill_id", title: "Jurusan", type: "select", width: 150, items: result.skills, valueField: "id", textField: "name" },
            { name: "name", title: "Kelas", type: "text", width: 200 },
            { type: "control" }
        ],
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
                }).then((result) => {
                    if (result.isConfirmed) {
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


// var grid = $("#majorities_table").jsGrid({
//     height: "400px",
//     width: "100%",
//     // filtering: true,
//     editing: true,
//     inserting: true,
//     sorting: true,
//     paging: true,
//     autoload: true,
//     pageSize: 15,
//     pageButtonCount: 5,
//     confirmDeleting: false,

//     //controller: db,
//     data,
//     fields,
//     onItemInserting: function(args) {
//         $.ajax({
//             url: '/api/major/',
//             method: 'POST',
//             data: {
//                 name: args.item.Kelas,
//                 skill_id: args.item.Jurusan,
//                 level: args.item.Tingkat,
//                 _token: $('input[name=_token]').val()
//             },
//             success: function({id}){
//                 let last_index = args.grid.data.length -1;
//                 args.grid.data[last_index].id = id
//                 Toast.fire({
//                     icon: 'success',
//                     title: 'Kelas / Jurusan berhasil ditambahkan'
//                 })
//             },
//             error: function(e){
//                 console.log(e);
//             }
//         })
//         $('#majorities_table').jsGrid("render");
//     },
//     onItemUpdated: function(args) {
//         $.ajax({
//             url: '/api/major/'+args.item.id,
//             method: 'PUT',
//             data: {
//                 name: args.item.Kelas,
//                 skill_id: args.item.Jurusan,
//                 level: args.item.Tingkat,
//                 _token: $('input[name=_token]').val()
//             },
//             success: function(){
//                 Toast.fire({
//                     icon: 'success',
//                     title: 'Kelas / Jurusan berhasil diedit'
//                 })
//             }
//         })
//     },
//     onItemDeleting: function(args) {
//         if (!args.item.deleteConfirmed) { // custom property for confirmation
//             args.cancel = true; // cancel deleting
//             Swal.fire({
//                 title: 'Are you sure?',
//                 text: "You won't be able to revert this!",
//                 icon: 'warning',
//                 showCancelButton: true,
//                 confirmButtonColor: '#3085d6',
//                 cancelButtonColor: '#d33',
//                 confirmButtonText: 'Yes, delete it!'
//             }).then((result) => {
//                 if (result.isConfirmed) {
//                     args.item.deleteConfirmed = true;
//                     $('#majorities_table').jsGrid('deleteItem', args.item);
//                     $.ajax({
//                         url: '/api/major/'+args.item.id,
//                         method: 'DELETE',
//                         data: {
//                             name: args.item.Kelas,
//                             skill_id: args.item.Jurusan,
//                             level: args.item.Tingkat,
//                             _token: $('input[name=_token]').val()
//                         },
//                         success: function(){
//                             Toast.fire({
//                                 icon: 'success',
//                                 title: 'Kelas / Jurusan berhasil dihapus'
//                             })
//                         }
//                     })
//                 }
//             })
//         }
//     },
// });


/*===========JsGrid field Validation ================================*/
