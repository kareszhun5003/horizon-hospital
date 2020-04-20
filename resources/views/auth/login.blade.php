@extends('layouts.app')

@section('navbar')
<style>
  footer{
    display: none;
  }
  body{
    background: url({{ URL::to('/') }}/img/hospital.jpg);
    background-size: cover;
    background-position: top;
    min-height: 500px;
  }
  .card{
    background: rgba(0, 0, 0, 0.5);
    behavior: url(PIE.htc);
  }
</style>
<title>Login</title>
@stop

@section('content')

  <br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3 class="text-light">{{ __('Login') }}</h3></div>
                <img src="/img/new-logo.png" width="200px" class="logo-form" alt="">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><h5 class="text-light">{{ __('E-Mail Address') }}</h5></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="rounded-pill form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><h5 class="text-light">{{ __('Password') }}</h5></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="rounded-pill form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-light rounded-pill">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        <h6 class="text-light">{{ __('Forgot Your Password?') }}</h6>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
