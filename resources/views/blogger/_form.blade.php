<div class="row">
    <div class="col-12 col-md-6">
        <img src="{{ $imageUrl }}" class="mb-2 w-100" alt="" id="image" srcset="">
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label for="">Kategori</label>
            <select name="category_id" id="" class="select2 @error('category_id') is-invalid @enderror">
                <option value="">&nbsp;</option>
                @foreach (App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}" {{ isset($blog)&&$blog->category_id==$category->id?'selected':'' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-sm text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Banner</label>
            <div class="custom-file">
                <input accept="image/*" type="file" class="custom-file-input @error('banner') is-invalid @enderror" name="banner" wire:model='banner' id="banner">
                <label class="custom-file-label" for="banner">Pilih Banner</label>
                @error('banner')
                    <i class="text-sm text-danger">{{ $message }}</i>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="">Judul</label>
            <textarea type="text" name="title" class="form-control @error('title') is-invalid @enderror" style="height: 115px">{{ old('title', $blog->title??'') }}</textarea>
            @error('title')
                <i class="text-sm text-danger">{{ $message }}</i>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <label for="">Konten</label>
    <textarea name="content" id="content">{{ old('content', $blog->content??'') }}</textarea>
    @error('content')
        <i class="text-sm text-danger">{{ $message }}</i>
    @enderror
</div>

<div class="form-group">
    <label for="tags">Tags</label>
    <input type="text" name="tags" id="tags" value="{{ old('tags', $blog->tags??'') }}" class="form-control @error('tags') is-invalid @enderror">
    @error('tags')
        <div class="text-sm text-danger">{{ $message }}</div>
    @enderror
</div>

@push('css')
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap-tagsinput.css') }}">
@endpush

@push('js')
    <script src="{{ url('plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ url('js/blogger/blog.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap-tagsinput.min.js') }}"></script>
    <script>
        $('#tags').tagsinput()
        $('#banner').on('change', function(event){
            var output = document.getElementById('image');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        })
    </script>
@endpush
