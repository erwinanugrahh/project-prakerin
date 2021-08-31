@extends('layouts.admin', ['noCard'=>true])

@section('title') Daftar Materi @endsection
@section('page') Siswa @endsection
@section('action') Materi @endsection

@push('css')
    <style>
        .card-header .fa {
        transition: .3s transform ease-in-out;
        }
        .card-header .collapsed .fa {
        transform: rotate(90deg);
        }
    </style>
    <link rel="stylesheet" href="{{ url('css/custom-icon.css') }}">
@endpush

@section('content')
    <div class="card my-3">
        <h5 class="card-header bg-white">
            <a class="d-block" data-toggle="collapse" href="#collapse-collapsed" aria-expanded="false" aria-controls="collapse-collapsed" id="heading-collapsed">
                <i class="fa fa-chevron-down pull-right"></i>
                {{ $task->title }}
            </a>
        </h5>
        <div id="collapse-collapsed" class="collapse show" aria-labelledby="heading-collapsed">
            <div class="card-body">
                {!! $task->content !!}
            </div>
        </div>
    </div>

    @if (!is_null($task->attachment))
    <div class="card my-3">
        <h5 class="card-header bg-white">
            <a class="d-block" data-toggle="collapse" href="#file-attachment" aria-expanded="false" aria-controls="file-attachment" id="heading-collapsed">
                <i class="fa fa-chevron-down pull-right"></i>
                File Tambahan
            </a>
        </h5>
        <div id="file-attachment" class="collapse show" aria-labelledby="heading-collapsed">
            <div class="card-body">
                <a class="attachment" download="{{ $task->attachment }}" href="{{ url('images/attachments/'.$task->attachment) }}">{{ $task->attachment }}</a>
            </div>
        </div>
    </div>
    @endif

    <div class="card my-3">
        <h5 class="card-header bg-white">
            <a class="d-block" data-toggle="collapse" href="#form-task" aria-expanded="false" aria-controls="form-task" id="heading-collapsed">
                <i class="fa fa-chevron-down pull-right"></i>
                Penugasan
            </a>
        </h5>
        <div id="form-task" class="collapse show" aria-labelledby="heading-collapsed">
            <div class="card-body">
                <form enctype="multipart/form-data" action="{{ route('task.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="lesson_id" value="{{ $task->id }}">
                    <label for="">Deskripsi</label>
                    <textarea class="form-control editor" name="content">{{ $myAnswer->content??old('content') }}</textarea>
                    @error('content')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror

                    <div class="form-group mt-3">
                        <label for="">Upload Tugas</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="attachment" id="attachment">
                            <label class="custom-file-label" for="banner">Pilih Lampiran</label>
                            <small class="form-text text-muted">
                                (Opsional) seperti dokumen, pdf, excel, presentasi, dll. (Maks upload 3mb)
                            </small>
                        </div>
                    </div>

                    <button class="btn btn-theme">Simpan</button>
                </form>

                @if (!is_null($myAnswer)&&!is_null($myAnswer->attachment))
                    <a class="attachment" download="{{ $myAnswer->attachment }}" href="{{ url('images/attachments/'.$myAnswer->attachment) }}">{{ $myAnswer->attachment }}</a>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ url('plugins/tinymce/tinymce.min.js') }}"></script>

    <script>
        $('#task').addClass('active')

        "use strict";

        //text editor
        tinymce.init({
        selector: '.editor',
        setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });},
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
    </script>
@endpush
