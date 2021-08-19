@extends('layouts.auth')

@section('title', "Lupa Kata Sandi?")

@section('content')
    <h3 class="mb-4">Lupa Kata Sandi?</h3>
    <form method="POST" action="{{ route('register') }}" class="mt-2">
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
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
{{-- @endsection --}}
