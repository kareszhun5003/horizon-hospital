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
  pre{
    color: white;
  }

  @media only screen and (min-width:1024px) and (max-width: 1440px){
    *{
      max-width: 100%;
    }

    label{
      position: relative;
      top: 100px !important;
    }
  }

  @media only screen and (min-width:768px) and (max-width: 1024px){
    *{
      max-width: 100%;
    }

    pre{
      font-size: 10px;
    }
  }

  @media only screen and (min-width:425px) and (max-width: 768px){
    *{
      max-width: 100%;
    }

    .box{
      position: relative;
      left: 16px;
    }

    label{
      position: relative;
      top: 100px !important;
    }
  }

  @media only screen and (min-width:375px) and (max-width: 425px){
    .box{
      max-width: 100%;
    }

    pre{
      font-size: 10px;
    }
  }

  @media only screen and (min-width:320px) and (max-width: 375px){
    .box{
      max-width: 100%;
    }

    pre{
      font-size: 8px;
    }

    label{
      position: relative;
      top: 100px !important;
    }
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
        <img src="{{ URL::to('/') }}/img/uploads/avatars/{{ Auth::user()->avatar }}" class="box-img">
        <h1>{{ Auth::user()->doctor->name }}</h1>
        <hr class="light">
        <h2>{{ Auth::user()->doctor->specialty }}</h2>
        <h5>{{ Auth::user()->doctor->email }}</h5>
        <h4>Languages spoken:</h4>
        <pre>{{ Auth::user()->doctor->languages }}</pre>
        <h4>Education:</h4>
        <pre>{{ Auth::user()->doctor->education_at_uni }}</pre>
        <pre>{{ Auth::user()->doctor->education_at_quali }}</pre>
        <a class="btn btn-light" href="/appointments">My Appointments</a>
      </div>
    </div>
  </div>
</header>

@endsection
