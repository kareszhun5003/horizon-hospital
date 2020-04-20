@extends('layouts.app')

@section('navbar')
  <title>Doctors</title>
@stop

@section('content')

  <header class="doc-header"></header>
  <div class="container-fluid padding">
    <div class="row welcome text-center">
        <div class="col-12">
            <h1 class="display-4">Our Doctors</h1>
        </div>
        <hr />
        <div class="col-12">
          <p class="lead"></p>
        </div>
    </div>
  </div>

  <div class="container">
  @foreach($doctors as $doctor)
    <div class="row">
      <div class="doctors col-12">
        <h2>{{ $doctor->specialty }}</h2>
        <a href="/doctors/{{ $doctor->slug }}" class="btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle" /> <h4>{{ $doctor->name }}</h5></a>
      </div>
    </div>
  @endforeach
  </div>
  <br>
@endsection
