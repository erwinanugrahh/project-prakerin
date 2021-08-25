<input type="hidden" value="role" name="role">
<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
    </div>
    <input type="text" name="name" value="{{ $blogger->name??old('name') }}" class="form-control mt-0 @error('name') is-invalid @enderror" placeholder="Nama Pengguna" aria-label="Username" aria-describedby="basic-addon1">
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
    </div>
    <input type="email" name="email" value="{{ $blogger->email??old('email') }}" class="form-control mt-0 @error('email') is-invalid @enderror" placeholder="Masukan Email" aria-label="email" aria-describedby="basic-addon1">
    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
     @enderror
</div>

<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
    </div>
    <input type="password" name="password" class="form-control mt-0 @error('password') is-invalid @enderror" placeholder="Kata Sandi" aria-label="phone" aria-describedby="basic-addon1">
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="fa fa-check-circle"></i></span>
    </div>
    <input type="password_confirm" name="password_confirmation" class="form-control mt-0 @error('password') is-invalid @enderror" placeholder="Konfirmasi Kata Sandi" aria-label="Password" aria-describedby="basic-addon1">
    @error('password_confirmation')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
