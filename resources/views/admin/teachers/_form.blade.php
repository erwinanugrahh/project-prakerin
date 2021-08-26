<div class="form-group floating-label">
    <input class="form-control @error('nip') is-invalid @enderror" type="number" name="nip" value="{{ $teacher->nip??old('nip') }}" required>
    <label for="">NIP</label>
    @if ($errors->has('nip'))
        <div class="invalid-tooltip">
            {{ $errors->get('nip')[0] }}
        </div>
    @else
        <div class="invalid-tooltip">
            NIP Harus diisi
        </div>
    @endif
</div>

<div class="form-group floating-label">
    <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{ $teacher->name??old('name') }}" required>
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
    <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{ $teacher->email??old('email') }}" required>
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
    <select class="custom-select @error('subject_id') is-invalid @enderror" name="subject_id" id="subject_id" required>
        <option value=""></option>
        @foreach ($subjects as $subject)
            <option value="{{ $subject->id }}" {{ (isset($teacher)&&$teacher->subject_id)||old('subject_id')==$subject->id?'selected':'' }}>{{ $subject->name }}</option>
        @endforeach
    </select>
    <label for="">Mata Pelajaran</label>
    <div class="invalid-tooltip">
        Silahkan Pilih Mata Pelajaran Terlebih Dahulu
    </div>
</div>

<div class="form-group floating-label">
    <select class="custom-select @error('major_id') is-invalid @enderror" name="major_id" id="major_id" required>
        <option value=""></option>
        @foreach ($majorities as $major)
            <option value="{{ $major->id }}" {{ (isset($teacher)&&$teacher->major_id)||old('major_id')==$major->id?'selected':'' }}>{{ $major->name }}</option>
        @endforeach
    </select>
    <label for="">Kelas / Jurusan</label>
    <div class="invalid-tooltip">
        Silahkan Pilih Kelas / Jurusan Terlebih Dahulu
    </div>
</div>

{{-- @push('js')
    <script src="{{ url('admin/') }}/js/form-validator/jquery.form-validator.min.js"></script>
@endpush --}}
