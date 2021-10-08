@extends('layouts.auth')

@section('title', 'Form Login')

@section('content')
    <h3 class="mb-2">Login</h3>
    <small class="text-muted bc-description">Masuk dengan akun anda</small>
    <form action="{{ route('login') }}" method="POST" class="mt-2">
        @csrf
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
            </div>
            <input type="text"  class="form-control mt-0 @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" placeholder="Masukan Email/NIP/NISN" aria-label="Username" aria-describedby="basic-addon1">
            @error('code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
            </div>
            <input type="password" class="form-control mt-0 @error('password') is-invalid @enderror" name="password" placeholder="Kata Sandi" aria-label="Password" aria-describedby="basic-addon1">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <button class="btn btn-theme btn-block p-2 mb-1" type="submit">Masuk</button>
            <a href="{{ route('password.request') }}">
                <small class="text-theme"><strong>Lupa kata sandi?</strong></small>
            </a>
        </div>
    </form>
@endsection

@section('another')
<div class="row">
    <div class="row justify-content-center">
        <h3 class="mb-4">Welcome back</h3>
        <p class="mb-4 p-4">Kembali ke halaman sebelumnya gak nich?</p>
        <p class="text-center"><a href="{{ '/' }}" class="btn btn-light">Kembali</a></p>
    </div>
</div>
@endsection
