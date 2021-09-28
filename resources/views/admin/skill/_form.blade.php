<div class="row">
    <div class="col-md-5 col-12">
        <img src="{{ $logo }}" id="preview" style="height: 100%" class="img-thumbnail w-100" alt="" srcset="">
    </div>
    <div class="col-md-7 col-12 mb-3">
        <div class="form-group">
            <label for="">Logo Jurusan</label>
            <div class="custom-file">
                <input accept="image/*" type="file" class="custom-file-input @error('logo') is-invalid @enderror" name="logo" id="logo">
                <label class="custom-file-label" for="logo">Pilih Logo Jurusan</label>
                @error('logo')
                    <i class="invalid-tooltip">{{ $message }}</i>
                @enderror
            </div>
        </div>
        <div class="form-group floating-label">
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name',$skill->name??'') }}" required>
            <label for="">Nama Jurusan</label>
            <div class="invalid-tooltip">
                @error('name')
                    {{ $message }}
                @else
                    Nama Jurusan harus diisi
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="">Deskripsi</label>
            <textarea class="form-control @error('description') is-invalid @enderror" rows="8" type="text" name="description" required>{{ old('description',$skill->description??'') }}</textarea>
            <div class="invalid-tooltip">
                @error('description')
                    {{ $message }}
                @else
                    Deskripsi harus diisi
                @endif
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        $('#logo').on('change', function(event){
            var output = document.getElementById('preview');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        })
    </script>
@endpush
