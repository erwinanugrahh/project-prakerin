<div class="form-group">
    <label for="">Banner</label>
    <div class="custom-file">
        <input type="file" class="custom-file-input @error('banner') is-invalid @enderror" name="banner" id="banner">
        <label class="custom-file-label" for="banner">Pilih Banner</label>
        @error('banner')
            <i class="text-sm text-danger">{{ $message }}</i>
        @enderror
    </div>
</div>

<div class="form-group">
    <label for="">Judul</label>
    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $blog->title??old('titile') }}">
    @error('title')
        <i class="text-sm text-danger">{{ $message }}</i>
    @enderror
</div>
<div class="form-group">
    <label for="">Konten</label>
    <textarea name="content" id="content">{{ $blog->content??old('content') }}</textarea>
    @error('content')
        <i class="text-sm text-danger">{{ $message }}</i>
    @enderror
</div>

@push('js')
    <script src="{{ url('plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ url('js/blogger/blog.js') }}"></script>
@endpush
