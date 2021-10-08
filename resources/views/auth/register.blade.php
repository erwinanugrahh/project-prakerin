@extends('layouts.auth')

@section('title','Daftar')

@section('content')
<h3 class="mb-2">Daftar</h3>
<small class="text-muted bc-description">Buat Akun Baru</small>
<form method="POST" action="{{ route('register') }}" class="mt-2">
    @csrf
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
        </div>
        <input type="text" name="name" class="form-control mt-0 @error('name') is-invalid @enderror" placeholder="Nama Pengguna" aria-label="Username" aria-describedby="basic-addon1">
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
        <input type="email" name="email" class="form-control mt-0 @error('email') is-invalid @enderror" placeholder="Masukan Email" aria-label="email" aria-describedby="basic-addon1">
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
        <input type="password" name="password_confirmation" class="form-control mt-0 @error('password') is-invalid @enderror" placeholder="Konfirmasi Kata Sandi" aria-label="Password" aria-describedby="basic-addon1">
        @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <button class="btn btn-theme btn-block p-2 mb-1" type="submit" href="{{ route('login') }}">Daftar</button>
    </div>
</form>
@endsection
@section('another')
    <h3 class="mb-4">Sudah Punya Akun?</h3>
    <p class="mb-4">Jika anda sudah mempunyai akun , Silahkan kembali ke halaman sebelumnya dan Login menggunakan akun yang telah anda datftarkan.</p>
    <p class="text-center"><a href="{{ route('login') }}" class="btn btn-light">Kembali</a></p>
@endsection
