//active
$('#data-major').addClass('active').parent().parent().addClass('active');
/*===========JsGrid field Validation ================================*/

var data = [];
$.ajax({
    url: '',
    async: false,
    success: function(result){
        result.data.forEach(el => {
            let major = {
                id: el.id,
                Tingkat: el.level,
                Kelas: el.name
            }
            data.push(major)
        });
    }
})

var level = [
    {Name: "", Id: 0},
    {Name: "X", Id: 1},
    {Name: "XI", Id: 2},
    {Name: "XII", Id: 3},
]

var grid = $("#majorities_table").jsGrid({
    height: "400px",
    width: "100%",
    // filtering: true,
    editing: true,
    inserting: true,
    sorting: true,
    paging: true,
    autoload: true,
    pageSize: 15,
    pageButtonCount: 5,
    confirmDeleting: false,

    //controller: db,
    data: data,
    fields: [
        { name: "Tingkat", width: 20, type: "select", items: level, valueField: "Id", textField: "Name"},
        { name: "Kelas", type: "text", width: 150, validate: "required" },
        { type: "control", width: 30 }
    ],
    onItemInserting: function(args) {
        $.ajax({
            url: 'major/',
            method: 'POST',
            data: {
                name: args.item.Kelas,
                level: args.item.Tingkat,
                _token: $('input[name=_token]').val()
            },
            success: function({id}){
                let last_index = args.grid.data.length -1;
                args.grid.data[last_index].id = id
                Toast.fire({
                    icon: 'success',
                    title: 'Kelas / Jurusan berhasil ditambahkan'
                })
            }
        })
        $('#majorities_table').jsGrid("render");
    },
    onItemUpdated: function(args) {
        $.ajax({
            url: 'major/'+args.item.id,
            method: 'PUT',
            data: {
                name: args.item.Kelas,
                level: args.item.Tingkat,
                _token: $('input[name=_token]').val()
            },
            success: function(){
                Toast.fire({
                    icon: 'success',
                    title: 'Kelas / Jurusan berhasil diedit'
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
                    $('#majorities_table').jsGrid('deleteItem', args.item);
                    $.ajax({
                        url: 'major/'+args.item.id,
                        method: 'DELETE',
                        data: {
                            name: args.item.Kelas,
                            level: args.item.Tingkat,
                            _token: $('input[name=_token]').val()
                        },
                        success: function(){
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


/*===========JsGrid field Validation ================================*/