function set_label(){
    let checked = $('#blog-mode').prop('checked');
    $('#blog-mode').next().text(checked?'Nonaktifkan Mode Blogger?':'Aktifkan Mode Blogger?')
}
set_label()
$('#blog-mode').on('change', function(e){
    let checked = $(this).prop('checked');
    // $(this).prop('checked', !checked);
    // let title = 'Apakah kamu yakin ingin me'+(!checked?'nonaktifkan':'ngaktifkan')+' mode blog?';
    // Swal.fire({
    //     title,
    //     text: "Apakah ingin mengubahnya sekarang?",
    //     icon: 'warning',
    //     showCancelButton: true,
    //     confirmButtonColor: '#3085d6',
    //     cancelButtonColor: '#d33',
    //     confirmButtonText: 'Ya'
    // }).then(result=>{
    //     if(result.isConfirmed){
            $.ajax({
                url: '/profile/set-blogger',
                data: {is_blogger:checked?1:0},
                headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
                method: 'post',
                success: ()=>{
                    $('.switch-label').text(checked?'Nonaktifkan Mode Blogger?':'Aktifkan Mode Blogger?')
                    window.location.href = '/dashboard'
                }
            })
    //     }
    // })
})
