@extends('layouts.auth')

@section('title', "Lupa Sandi")

@section('content')
    <h1 class="text-center mb-5"><i class="fa fa-rocket text-primary"></i> Sleekadmin</h1>    
    <div class="row">
        <div class="col-md-6 col-sm-6 col-12 login-box-info">
            <h3 class="mb-3">Can't remember?</h3>
            <p class="mb-3">Anim pariatur cliche reprehenderit, enim eiusmod high life.</p>
            <p class="text-center"><a href="" class="btn btn-light">Previous page</a></p>
        </div>
        <div class="col-md-6 col-sm-6 col-12 login-box-form p-4">
            <h3 class="mb-4">Forgot password</h3>
            <form action="" class="mt-2">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                    </div>
                    <input type="email" class="form-control mt-0" placeholder="Email address" aria-label="enail" aria-describedby="basic-addon1">
                </div>

                <div class="form-group">
                    <button class="btn btn-theme btn-block p-2 mb-1">Send</button>
                </div>
            </form>
        </div>
    </div>
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
