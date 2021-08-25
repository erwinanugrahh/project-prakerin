<input type="file" name="banner" id="banner">
<br>
@error('banner')
    {{ $message }} <br>
@enderror

<br>
<label for="title">Judul Blog</label><br>
<input type="text" name="title" id="title" value="{{ $blog->title??old('title') }}">
<br>
@error('title')
    <i>{{ $message }}</i>
@enderror
<br>

<textarea class="form-control content" name="content">{{ $blog->content??old('content') }}</textarea>
<br>
@error('content')
    <i>{{ $message }}</i>
@enderror
<br>


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
    height: 700,
    theme: 'silver',
    plugins: [
        'advlist autolink lists link image charmap hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help','directionality',
    ],
    toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent |ltr rtl',
    toolbar2: 'link media image | forecolor backcolor emoticons | fontsizeselect | codesample help',
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
