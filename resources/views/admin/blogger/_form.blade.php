<input required type="hidden" value="role" name="role">
<div class="form-group floating-label">
    <input required type="text" name="name" id="name" value="{{ $blogger->name??old('name') }}" class="form-control mt-0 @error('name') is-invalid @enderror">
    <label for="">Nama Blogger</label>
    @error('name')
        <span class="invalid-tooltip" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @else
        <span class="invalid-tooltip" role="alert">
            <strong>Nama Blogger harus diisi</strong>
        </span>
    @enderror
</div>

<div class="form-group floating-label">
    <input required type="email" name="email" id="email" value="{{ $blogger->email??old('email') }}" class="form-control mt-0 @error('email') is-invalid @enderror">
    <label for="">Email Blogger</label>
    @error('email')
        <span class="invalid-tooltip" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @else
        <span class="invalid-tooltip" role="alert">
            <strong>Email Blogger harus diisi</strong>
        </span>
     @enderror
</div>

<div class="form-group floating-label">
    <input required type="password" name="password" id="password" class="form-control mt-0 @error('password') is-invalid @enderror">
    <label for="">Kata Sandi</label>
    @error('password')
        <span class="invalid-tooltip" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @else
        <span class="invalid-tooltip" role="alert">
            <strong>Kata Sandi Blogger harus diisi</strong>
        </span>
    @enderror
</div>

<div class="form-group floating-label">
    <input required type="password" name="password_confirmation" id="password_confirmation" class="form-control mt-0 @error('password_confirmation') is-invalid @enderror">
    <label for="">Konfirmasi Kata Sandi</label>
    @error('password_confirmation')
        <span class="invalid-tooltip" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @else
        <span class="invalid-tooltip" role="alert">
            <strong>Konfirmasi Kata Sandi Blogger harus diisi</strong>
        </span>
    @enderror
</div>
