$('#task').addClass('active')
set_pagination('', '');
function set_pagination(url, search = '') {
    $.ajax({
        url,
        data: {search},
        success: function(result){
            let data = result.data

            //for initialization data
            $('.lessons').empty()
            for(let i in result.data){
                $('.lessons').append(`
                <div class="col-12 col-md-6">
                    <div class="mt-2 mb-2 p-2 bg-white border shadow lh-sm">
                        <div class="row no-gutters">
                            <div class="col-2">
                                <div class="card shadow radius-5 bg-info text-center" style="height: 100%;">
                                    <i class="fas fa-lg fa-book text-white my-auto"></i>
                                </div>
                            </div>
                            <div class="col-10 pl-2">
                                <p class="font-weight-bold">${ data[i].title }</p>
                                <p>${ data[i].teacher }</p>
                                <p>Batas Upload Tugas: ${ data[i].end_at }</p>
                                <p>Nilai Tugas: ${ data[i].value }</p>
                                <a class="btn btn-sm py-0 text-white btn-primary font-weight-bold" href="${data[i].href}">MASUK PEMBELAJARAN</a>
                            </div>
                        </div>
                    </div>
                </div>
                `)
            }

            //for initialization links
            $('.pagination').empty()
            result.links.forEach((link, index) => {
                $('.pagination').append(`
                    <li class="page-item${link.active?' active font-weight-bold':''}${link.url==null?' disabled':''}">
                        <button class="page-link" onclick="set_pagination('${ link.url }')">${ link.label }</button>
                    </li>
                `)
            });
        }
    })
}

$('input[name=search]').on('keyup', function(){
    set_pagination('', $(this).val())
})
