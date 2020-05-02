@extends('layouts.app')

@section('navbar')
  <title>Horizon Hospital</title>
  <div id="slides" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#slides" data-slide-to="0" class="active"></li>
        <li data-target="#slides" data-slide-to="1"></li>
        <li data-target="#slides" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/hospital.jpg" />
            <div class="carousel-caption">
                <h1 class="display-2 ">Horizon Hospital</h1>
                <h3>Health is our third name.</h3>
            </div>
        </div>
        <div class="carousel-item">
            <img src="img/background3.jpg" />
        </div>
        <div class="carousel-item">
            <img src="img/hospital-2.jpg" />
        </div>
    </div>
    <a class="carousel-control-prev" href="#slides" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#slides" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>
  </header>
  <style>
    span{
      font-weight: bold;
      font-size: 18px;
    }
  </style>
@stop

@section('content')

  <div class="container-fluid padding">
      <div class="row">
          <div class="col-md-12 col-lg-7">
            <br>
              <h1>Symptom Checker</h1>
              <hr>
              <p>You can find a Symptom Checker on our <span>Symptom Checker</span> tab.</p>
              <p>This Application can show you the possible <span>Diseases</span> from your Symptoms. All you have to do is just pick your <span>Symptoms</span>, and let it do the rest.</p>
              <h3 style="font-weight: bold">Note: <u style="font-size:16px">Our Symptom Checker doesn't replace visiting a doctor! Also, it doesn't handle the type of cancers to avoid unnecessary panic. </u></h3>
              <br />
              <h1>COVID-19 Informations</h1>
              <hr>
              <p>Under the <span>Symptom Checker</span> tab, if you scroll down, you can see a <span>COVID-19</span> part, where you can check the statistics of COVID-19 Virus.</p>
              <p>It displays <span>Hungarian</span>, and <span>Global</span> data from the whole Earth.</p>
          </div>
          <div class="col-lg-5">
              <img src="img/sympton-header.jpg" height="400px" class="img-fluid" />
          </div>
      </div>
  </div>

<div class="parallax"></div>
<div class="quality_area">
  <div class="container">
    <div class="row welcome text-center">
      <div class="col-12">
        <h1 class="display-4">Health is our third name.</h1>
      </div>
      <hr />
      <div class="col-12 text-center">
        <p class="lead">At the Horizon Hospital we have a large variety of methods in order to keep you healthy.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="single_quality">
          <div class="icon">
            <i class="fas fa-user-md"></i>
          </div>
          <h3>Search Doctors</h3>
          <p>Under the Doctors tab, you can see all of our Doctors, group by of their specalties.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="single_quality">
          <div class="icon">
            <i class="far fa-calendar"></i>
          </div>
          <h3>Appointments</h3>
          <p>After a quick registration, you can book an appointment with any of our doctors, by 1 click.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="single_quality">
          <div class="icon">
            <i class="fas fa-comments"></i>
          </div>
          <h3>The Forums</h3>
          <p>Under the Forums tab, you can read, or write comments about our hospital, or doctors.</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
