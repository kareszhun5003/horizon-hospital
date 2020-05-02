@extends('layouts.app')

@section('navbar')
  <link rel="icon" href="../img/new-logo.png">
  <style>
  pre{
    color: white;
  }
  .back{
    left: 32vw;
  }
  .modal-header, .modal-body {
    color: black;
  }
  #picker1, #picker2{
    color: black;
    cursor: default;
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

  <title>{{ $doctor->name }}</title>

  <script src="/js/jquery.datetimepicker.full.min.js"></script>
  <link rel="stylesheet" href="/js/jquery.datetimepicker.min.css" />
@stop

@section('content')
  <header class="doc-prof">
    <div class="container">
      <div class="row">
      <div class="box col-sm-12 col-md-6 ">
        <img src="/img/doctors/{{ $doctor->img }}" alt="" class="box-img">
        <h1>{{ $doctor->name }}</h1>
        <hr class="light">
        <h2>{{ $doctor->specialty }}</h2>
        <h5>{{ $doctor->email }}</h5>
        <h4>Languages spoken:</h4>
        <pre class="languages prof">{{ $doctor->languages }}</pre>
        <h4>Education:</h4>
        <pre class="prof">{{ $doctor->education_at_uni }}</pre>
        <pre class="prof">{{ $doctor->education_at_quali }}</pre>
        <div class="buttons-show inline-block">
        <a class="btn btn-light" href="/doctors">Back to all Doctors</a>

      @if(Auth::guest())
        <a class="btn btn-light app-but" href="/login">Book an Appointment</a>
      @elseif(Auth::user()->type == "doctor")

      @elseif(Auth::user() && Auth::user()->type != "doctor")
          <button type="button" class="btn btn-light app-but" data-toggle="modal" data-target="#app-modal">
              Book an Appointment
          </button>

        <div class="modal fade" id="app-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">

              <form action="/appointments" id="form2" method="POST">
                @csrf
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">{{ $doctor->name }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <br>
                  <h3>Book an Appointment here!</h3>

                  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                  <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                  <label class="label-picker" for="picker2"><h5>Date</h5></label>
                  <input type="text" name="picker2" id="picker2" class="form-control readonly" required/>
                  <label class="label-picker" for="picker1"><h5>Time</h5></label>
                  <input type="text" name="picker1" id="picker1" class="form-control readonly" required/>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      @endif
      </div>
    </div>
  </div>
</header>

<script>
  var consult = {!! $doctor->consults !!};
  $('#picker1').datetimepicker({
    timepicker: true,
    datepicker: false,
    allowTimes: consult,
    format: 'H:i'
  });
  $('#picker2').datetimepicker({
    timepicker: false,
    datepicker: true,
    disabledWeekDays: [0, 6],
    minDate: 0,
    minTime: 0,
    dayOfWeekStart: 1,
    yearStart: new Date().getFullYear(),
    monthStart: new Date().getMonth(),
    yearEnd: new Date().getFullYear() + 2,
    format: 'Y.m.d.'
  })
  var msg_succ = '{{Session::get('alert-success')}}';
  var msg_error = '{{Session::get('alert-error')}}';
  var exist = '{{Session::has('alert')}}';
  if('{{Session::has('alert-error')}}'){
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: msg_error,
    })
  } if('{{Session::has('alert-success')}}'){
  Swal.fire({
icon: 'success',
title: 'Hurray!',
text: msg_succ,
})
}

  $('#form2 input[type=text]').on('change invalid', function() {
    var textfield = $(this).get(0);

    textfield.setCustomValidity('');

    if (!textfield.validity.valid) {
      textfield.setCustomValidity('Please fill out this field.');
    }
});

    $(".readonly").keydown(function(e){
        e.preventDefault();
    });
</script>

@endsection
