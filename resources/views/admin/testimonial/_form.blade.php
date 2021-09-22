<div class="row">
    <div class="col-md-5 col-12">
        <img src="{{ asset(isset($testimonial)?('storage/testimonials/'.$testimonial->photo):'admin/img/default-avatar.png') }}" id="preview" style="height: 100%" class="img-thumbnail w-100" alt="" srcset="">
    </div>
    <div class="col-md-7 col-12 mb-3">
        <div class="form-group">
            <label for="">Foto</label>
            <div class="custom-file">
                <input accept="image/*" type="file" class="custom-file-input @error('photo') is-invalid @enderror" name="photo" id="photo">
                <label class="custom-file-label" for="photo">Pilih Foto</label>
                @error('photo')
                    <i class="text-sm text-danger">{{ $message }}</i>
                @enderror
            </div>
        </div>
        <div class="form-group floating-label">
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name',$testimonial->name??'') }}" required>
            <label for="">Nama</label>
            <div class="invalid-tooltip">
                @error('name')
                    {{ $message }}
                @else
                    Nama harus diisi
                @endif
            </div>
        </div>
        <div class="form-group floating-label form-row">
            <div class="col-6">
                <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ old('title',$testimonial->title??'') }}" required>
                <label for="">Gelar</label>
                <div class="invalid-tooltip">
                    @error('title')
                        {{ $message }}
                    @else
                        Gelar harus diisi
                    @endif
                </div>
            </div>
            <div class="col-6">
                <input class="form-control @error('company') is-invalid @enderror" type="text" name="company" value="{{ old('company',$testimonial->company??'') }}" required>
                <label for="">Perusahaan</label>
                <div class="invalid-tooltip">
                    @error('company')
                        {{ $message }}
                    @else
                        Perusahaan harus diisi
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="">Kata-kata</label>
            <textarea class="form-control @error('quote') is-invalid @enderror" type="text" name="quote" required>{{ old('quote',$testimonial->quote??'') }}</textarea>
            <div class="invalid-tooltip">
                @error('quote')
                    {{ $message }}
                @else
                    Kata-kata harus diisi
                @endif
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        $('#photo').on('change', function(event){
            var output = document.getElementById('preview');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        })
    </script>
@endpush
