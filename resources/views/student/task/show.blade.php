<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=`">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Task</title>
</head>
<body>
    <h1>{{ $task->title }}</h1>
    <h3>{!! $task->content !!}</h3>

    <form action="{{ route('task.store') }}" method="post">
        @csrf
        <input type="hidden" name="lesson_id" value="{{ $task->id }}">
        <textarea class="form-control content" name="content">{{ $myAnswer->content??old('content') }}</textarea>
        <br>
        @error('content')
        <i>{{ $message }}</i>
        @enderror
        <br>

        <button>Simpan</button>
    </form>



    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('plugins/tinymce/jquery.tinymce.min.js') }}"></script>
    <script src="{{ url('plugins/tinymce/tinymce.min.js') }}"></script>

    <script>
        "use strict";

        //text editor
        tinymce.init({
        selector: '.content',
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



    </div>
</body>
</html>
