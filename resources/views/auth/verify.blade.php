@extends('layouts.app')

@section('navbar')
<style>
  footer{
    display: none;
  }
  body{
    background: url(../img/hospital.jpg);
    background-size: cover;
    background-position: top;
    min-height: 500px;
  }
  .card{
    background: rgba(0, 0, 0, 0.5);
    behavior: url(PIE.htc);
  }
</style>
<title>Verify</title>
@stop

@section('content')
  <br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3 class="text-light">{{ __('Verify Your Email Address') }}</h3></div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="rounded-pill btn btn-light p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
