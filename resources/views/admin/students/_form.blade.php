<div class="form-group floating-label">
    <input class="form-control" type="number" name="nisn" value="{{ $student->nisn??old('nisn') }}" required>
    <label for="">NISN</label>
    @error('nisn')
        <i class="text-danger"><small>{{ $message }}</small></i>
    @enderror
</div>

<div class="form-group floating-label">
    <input class="form-control" type="text" id="name" name="name" value="{{ $student->name??old('name') }}" required>
    <label for="">Nama</label>
    @error('name')
        <i class="text-danger"><small>{{ $message }}</small></i>
    @enderror
</div>

<div class="form-group floating-label">
    <input class="form-control" type="email" id="email" name="email" value="{{ $student->email??old('email') }}" required>
    <label for="">Email</label>
    @error('email')
        <i class="text-danger"><small>{{ $message }}</small></i>
    @enderror
</div>

<div class="form-group floating-label">
    <input class="form-control" type="number" id="phone" name="phone" value="{{ $student->phone??old('phone') }}" required>
    <label for="">Nomor Telepon</label>
    @error('phone')
        <i class="text-danger"><small>{{ $message }}</small></i>
    @enderror
</div>

<div class="form-group floating-label">
    <select class="custom-select" name="major_id" id="major_id" required>
        <option value=""></option>
        <option value="1">Desain Pemodelan Informasi Bangunan</option>
        <option value="2">Multimedia</option>
        <option value="3">Rekayasa Perangkat Lunak</option>
        <option value="4">Teknik Bisnis Sepeda Motor</option>
        <option value="5">Teknik Elektronik Industri</option>
        <option value="6">Teknik Kendaraan Ringan Otomotif</option>
        <option value="7">Teknik Komputer dan Jaringan</option>
    </select>
    <label for="">Jurusan</label>
    @error('major_id')
        <i class="text-danger"><small>{{ $message }}</small></i>
    @enderror
</div>

<div class="form-group floating-label">
    <input class="form-control" type="text" id="address" name="address"value="{{ $student->address??old('address') }}" required>
    <label for="">Alamat</label>
    @error('address')
        <i class="text-danger"><small>{{ $message }}</small></i>
    @enderror
</div>

{{-- <input type="number" id="nisn" name="nisn" value="{{ $student->nisn??old('nisn') }}">
<label for="nisn">NISN</label>
<br>
@error('nisn')
    {{ $message }}
@enderror
<br>

<input type="text" id="name" name="name" value="{{ $student->name??old('name') }}">
<label for="name">NAMA</label>
<br>
@error('name')
    {{ $message }}
@enderror

<br>
<input type="email" id="email" name="email" value="{{ $student->email??old('email') }}">
<label for="email">EMAIL</label>
<br>
@error('email')
    {{ $message }}
@enderror

<br>
<input type="number" id="phone" name="phone" value="{{ $student->phone??old('phone') }}">
<label for="phone">NO TELEPON</label>
<br>
@error('phone')
    {{ $message }}
@enderror

<br>
<select name="class_id" id="class_id">
    <option value=""></option>
    <option value="1">RPL</option>
    <option value="2">TKJ</option>
    <option value="3">MM</option>
</select>
<br>
@error('class_id')
    {{ $message }}
@enderror
<br>
<textarea type="text" id="address" name="address">{{ $student->address??old('address') }}</textarea>
<label for="address">ALAMAT</label>
<br>
@error('address')
    {{ $message }}
@enderror
<br> --}}
