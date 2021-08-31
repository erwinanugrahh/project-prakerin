@extends('layouts.auth')

@section('title', "Lupa Kata Sandi?")

@section('content')
    <h3 class="mb-4">Lupa Kata Sandi?</h3>
    <form method="POST" action="{{ route('password.email') }}" class="mt-2">
        @csrf
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
            </div>
            <input type="email" name="email" class="form-control mt-0 @error('email') is-invalid @enderror" placeholder="Masukan Email" aria-label="enail" aria-describedby="basic-addon1">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <button class="btn btn-theme btn-block p-2 mb-1">Kirim</button>
        </div>
    </form>
@endsection

@section('another')
    <h3 class="mb-3">Sudah Ingat?</h3>
    <p class="mb-3">Jika kamu sudah ingat kata sandi , silahkan kembali ke halaman Login.</p>
    <p class="text-center"><a href="{{ route('login') }}" class="btn btn-light">Kembali</a></p>
@endsection
