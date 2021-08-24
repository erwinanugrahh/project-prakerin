<div class="form-group floating-label">
    <input class="form-control @error('nisn') is-invalid @enderror" type="number" name="nisn" value="{{ $student->nisn??old('nisn') }}" required>
    <label for="">NISN</label>
    @if ($errors->has('nisn'))
        <div class="invalid-tooltip">
            {{ $errors->get('nisn')[0] }}
        </div>
    @else
        <div class="invalid-tooltip">
            NISN Harus diisi
        </div>
    @endif
</div>

<div class="form-group floating-label">
    <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{ $student->name??old('name') }}" required>
    <label for="">Nama</label>
    @if ($errors->has('name'))
        <div class="invalid-tooltip">
            {{ $errors->get('name')[0] }}
        </div>
    @else
        <div class="invalid-tooltip">
            Nama Harus diisi
        </div>
    @endif
</div>

<div class="form-group floating-label">
    <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{ $student->email??old('email') }}" required>
    <label for="">Email</label>
    @if ($errors->has('email'))
        <div class="invalid-tooltip">
            {{ $errors->get('email')[0] }}
        </div>
    @else
        <div class="invalid-tooltip">
            Email Harus diisi
        </div>
    @endif
</div>

<div class="form-group floating-label">
    <input class="form-control @error('phone') is-invalid @enderror" type="number" id="phone" name="phone" value="{{ $student->phone??old('phone') }}" required>
    <label for="">Nomor Telepon</label>
    @if ($errors->has('phone'))
        <div class="invalid-tooltip">
            {{ $errors->get('phone')[0] }}
        </div>
    @else
        <div class="invalid-tooltip">
            Nomor Telepon Harus diisi
        </div>
    @endif
</div>

<div class="form-group floating-label">
    <select class="custom-select @error('major_id') is-invalid @enderror" name="major_id" id="major_id" required>
        <option value=""></option>
        @foreach ($majorities as $major)
            <option value="{{ $major->id }}" {{ old('major_id')==$major->id?'selected':'' }}>{{ $major->name }}</option>
        @endforeach
    </select>
    <label for="">Jurusan</label>
    <div class="invalid-tooltip">
        Silahkan Pilih Jurusan Terlebih Dahulu
    </div>
</div>

<div class="form-group floating-label">
    <input class="form-control @error('name') is-invalid @enderror" type="text" id="address" name="address" value="{{ $student->address??old('address') }}" required>
    <label for="">Alamat</label>
    <div class="invalid-tooltip" style="text-align: left;">
        Alamat Harus diisi
    </div>
</div>

@push('js')
    <script src="{{ url('admin/') }}/js/form-validator/jquery.form-validator.min.js"></script>
@endpush
