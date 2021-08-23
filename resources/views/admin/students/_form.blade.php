<input type="number" id="nisn" name="nisn" value="{{ $student->nisn??old('nisn') }}">
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
<br>
