<input type="number" id="nip" name="nip" value="{{ $teacher->nip??old('nip') }}">
<label for="nip">NIP</label>
<br>
@error('nip')
    {{ $message }}
@enderror
<br>

<input type="text" id="name" name="name" value="{{ $teacher->name??old('name') }}">
<label for="name">NAMA</label>
<br>
@error('name')
    {{ $message }}
@enderror

<br>
<input type="email" id="email" name="email" value="{{ $teacher->email??old('email') }}">
<label for="email">EMAIL</label>
<br>
@error('email')
    {{ $message }}
@enderror

<select name="subject_id" id="subject_id">
    <option value=""></option>
    @foreach ($subjects as $subject)
        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
    @endforeach
</select>
<br>
@error('name')
    {{ $message }}
@enderror

<br>
<select name="major_id" id="major_id">
    <option value=""></option>
    @foreach ($majorities as $major)
        <option value="{{ $major->id }}">{{ $major->name }}</option>
    @endforeach
</select>
<br>
@error('major_id')
    {{ $message }}
@enderror
