@extends('layouts.app')

@section('navbar')
  <link rel="icon" href="../img/new-logo.png">
  <style>
  .languages{
    word-spacing: 99999px;
  }

  .back{
    left: 32vw;
  }
  </style>
  <title>{{ Auth::user()->doctor->name }}</title>
@stop

@section('content')
  <header class="doc-prof">
    <div class="container">
      <div class="row">
      <div class="box col-sm-12 col-md-6 ">
        <h1>My Profile</h1>
        <img src="/img/doctors/{{ Auth::user()->doctor->img }}" alt="" class="box-img">
        <h1>{{ Auth::user()->doctor->name }}</h1>
        <hr class="light">
        <h2>{{ Auth::user()->doctor->specialty }}</h2>
        <h5>{{ Auth::user()->doctor->email }}</h5>
        <h4>Languages spoken:</h4>
        <p class="languages prof">{{ Auth::user()->doctor->languages }}</p>
        <h4>Education:</h4>
        <p class="prof">{{ Auth::user()->doctor->education_at_uni }}</p>
        <p class="prof">{{ Auth::user()->doctor->education_at_quali }}</p>
        <a class="btn btn-light" href="/appointments">My Appointments</a>
      </div>
    </div>
  </div>
</header>

@endsection
