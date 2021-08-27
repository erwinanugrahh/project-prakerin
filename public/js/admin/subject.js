//active
$('#data-subject').addClass('active').parent().parent().addClass('active');
/*===========JsGrid field Validation ================================*/

var data = [];
var reload = ()=>{
    $.ajax({
        url: '',
        async: false,
        success: function(result){
            data = []
            result.data.forEach(element => {
                var subject = {id: element.id, 'Nama Mata Pelajaran':element.name}
                data.push(subject)
            });
        }
    })
}

reload()

var grid = $("#subjects_table").jsGrid({
    height: "463px",
    width: "100%",
    // filtering: true,
    editing: true,
    inserting: true,
    sorting: true,
    paging: true,
    autoload: true,
    pageSize: 8,
    pageButtonCount: 5,
    confirmDeleting: false,

    //controller: db,
    data: data,

    fields: [
        // { name: "id", width: 0},
        { name: "Nama Mata Pelajaran", as:"Nama Mata Pelajaran",type: "text", width: 150, validate: "required" },
        { type: "control", width: 15 }
    ],
    onItemInserting: function(args) {
        $.ajax({
            url: 'subject/',
            method: 'POST',
            data: {
                name: args.item["Nama Mata Pelajaran"],
                _token: $('input[name=_token]').val()
            },
            success: function({id}){
                let last_index = args.grid.data.length -1;
                args.grid.data[last_index].id = id
                Toast.fire({
                    icon: 'success',
                    title: 'Mata Pelajaran berhasil ditambahkan'
                })
            }
        })
    },
    onItemUpdated: function(args) {
        $.ajax({
            url: 'subject/'+args.item.id,
            method: 'PUT',
            data: {
                name: args.item['Nama Mata Pelajaran'],
                _token: $('input[name=_token]').val()
            },
            success: function(){
                Toast.fire({
                    icon: 'success',
                    title: 'Mata Pelajaran berhasil diedit'
                })
            }
        })
    },
    onItemDeleting: function(args) {
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
                    $('#subjects_table').jsGrid('deleteItem', args.item);
                    $.ajax({
                        url: 'subject/'+args.item.id,
                        method: 'DELETE',
                        data: {
                            name: args.item.name,
                            _token: $('input[name=_token]').val()
                        },
                        success: function(){
                            Toast.fire({
                                icon: 'success',
                                title: 'Mata Pelajaran berhasil dihapus'
                            })
                        }
                    })
                }
            })
        }
    },
});


/*===========JsGrid field Validation ================================*/
