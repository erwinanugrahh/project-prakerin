<label for="title">Judul Materi</label>
<input type="text" name="title" id="title" value="{{ $lesson->title??old('title') }}">
<br>
@error('title')
    <i>{{ $message }}</i>
@enderror
<br>

<label for="major_id">Untuk kelas</label>
<select name="major_id" id="major_id">
    <option value=""></option>
    @foreach ($majorities as $major)
        <option value="{{ $major->id }}" {{ (isset($lesson)&&$lesson->major_id==$major->id)||old('major_id')==$major->id?'selected':'' }}>{{ $major->name }}</option>
    @endforeach
</select>
<br>
@error('major_id')
    <i>{{ $message }}</i>
@enderror
<br>
<br><br><br>

<textarea class="form-control content" name="content">{{ $lesson->content??old('content') }}</textarea>
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
