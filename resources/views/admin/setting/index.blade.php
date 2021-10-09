@extends('layouts.admin', ['noCard'=>true])

@section('title') Halaman Darhboard @endsection
@section('page') Dashboard @endsection
@section('action') Admin @endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('admin/css/switchery.min.css') }}">
@endpush

@section('content')
<div class="accordion mt-3" id="accordionExample">
    @include('admin.setting.setting_web')

    @include('admin.setting.about_us')

    <div class="card shadow">
        <div class="card-header accordion-header p-1" id="headingTwo">
            <h5 class="mb-0 panel-title">
                <button class="btn btn-link accordion-btn collapsed" type="button" data-toggle="collapse" data-target="#social_media" aria-expanded="false" aria-controls="social_media">
                Sosial Media
                </button>
            </h5>
        </div>
        <div id="social_media" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            @livewire('social-media-form', compact('social_media'))
        </div>
    </div>

    @include('admin.setting.ppdb')
</div>
@endsection

@push('js')
    <script src="{{ asset('admin/js/switchery.min.js') }}"></script>
    <script src="{{ url('plugins/tinymce/jquery.tinymce.min.js') }}"></script>
    <script src="{{ url('plugins/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '.editor',
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });
            },
            height: 500,
            theme: 'silver',
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help','directionality',
            ],
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image |ltr rtl',
            toolbar2: 'print preview media | forecolor backcolor emoticons | fontsizeselect | codesample help',
            image_advtab: true,
            templates: [
                { title: 'Test template 1', content: 'Test 1' },
                { title: 'Test template 2', content: 'Test 2' }
            ],
            fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt 50pt',
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            ]
        });

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        window.addEventListener('show-toast', function(){
            Toast.fire({
                icon: 'success',
                title: 'Pengaturan berhasil diperbaharui'
            })
        })

        $('#image').change(function(){

            let reader = new FileReader();

            reader.onload = (e) => {

              $('#preview-image-before-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });
        function countChar(val) {
            var len = val.value.length;
            if (len >= 300) {
                val.value = val.value.substring(0, 300);
            } else {
                $('#max-length-element').text(300 - len);
            }
        };

        var elem = document.querySelector('#open-ppdb');
        var switchery = new Switchery(elem);
        new Switchery(document.querySelector('#open-pengumuman'))
        new Switchery(document.querySelector('#kenaikan-kelas'))

        function set_switchery(){
            if($('#open-pengumuman').is(':checked'))
                switchery.enable();
            else{
                if ($(elem).is(':checked')){
                    $(elem).parent().find('.switchery').trigger('click');
                }
                switchery.disable();
            }
        }
        set_switchery()
        $('.switchery').prev().on('change', function(){
            if(this.id == 'open-pengumuman'){
                set_switchery();
            }
            let kenaikan_kelas = $('#kenaikan-kelas').is(':checked')
            let open_pengumuman = $('#open-pengumuman').is(':checked')
            let open_ppdb = $('#open-ppdb').is(':checked')
            $.ajax({
                url: '/api/set-ppdb',
                method: 'post',
                data: {
                    key: 'setting_ppdb',
                    open_pengumuman, open_ppdb, kenaikan_kelas
                },
                success: function(result){
                    console.log(result);
                }
            })
        })
    </script>
@endpush
