$('#request_blog').addClass('active').parent().parent().addClass('active');
var table = $('#blogs_table').DataTable({
    // "processing": true,
    dom: "Bfrtip",
    "serverSide": true,
    "bSort" : true,
    "ajax": {
        url: '',
        data: function(data){
            data.filter_major=$('#filter_major').val()
        }
    },
    // orderCellsTop: true,
    fixedHeader: true,
    "columns": [
        {data:"checkbox",searchable:false,orderable:false,sortable:false,className:'p-0 pr-1 align-middle'},
        {data:"blogger.name",className:'align-middle',orderable:true,sortable:true},
        {data:"title",className:'align-middle'},
        {data:"content",name:'content',className:'align-middle'},
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
})

//select all
$('#orderAll').on('click',function(){
    let checked = $(this).prop('checked');
    $('input[name=selected]').prop('checked',checked);
});

function send_result(ids, action, additional){
    var option = {
        accepted: 'terima',
        rejected: 'tolak'
    }
    let message;
    if(additional != null){
        let blogger, title;
        blogger = additional[0]
        title = additional[1]
        message = `Blog ${blogger} yang berjudul ${title} akan di${option[action]}`;
    }else{
        message = `${ids.length} blog ini akan di${option[action]}`;
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
                url: 'request_blog/send_result',
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
