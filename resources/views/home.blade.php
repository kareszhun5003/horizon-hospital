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
@stop

@section('content')

  <div class="container-fluid padding">
    <br>
    <br>
      <div class="row text-center padding">
          <div class="col-xs-12 col-sm-6 col-md-6">
              <a style="color: inherit; text-decoration: none;"href="/sympton-checker"><img class="robby" src="/img/bot-gif.gif" width="400px" alt="">
              <img class="robby-text" src="/img/text-bubble.png" width="200px" alt=""></a>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 robot">
              <i class="fas fa-robot robby-icon"></i>
              <h3 class="display-4">Meet Robby!</h3>
              <p>Feel free to try him! All you have to do is just give him your symptons and let him do the rest.</p>
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
          <h3>Appointments!</h3>
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
