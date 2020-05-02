@extends('layouts.app')

@section('navbar')
  <title>{{ $user->name }}'s Profile</title>
<style>
  footer{
    display: none;
  }
  .parallax{
    min-height: 855px;
    height: inherit;
  }
  .card{
    background: rgba(0, 0, 0, 0.5);
    border-radius: 0;
  }
  .container{
    color: white;
  }

  @media only screen and (min-width:768px) and (max-width: 1024px){
    *{
      max-width: 100%;
    }
  }

  @media only screen and (min-width:320px) and (max-width: 375px){
    *{
      font-size: 10px;
    }
  }
</style>
@stop
@section('content')
  <div class="parallax">
    <div class="quality_area">
      <div class="card">
        <div class="container">
          <div class="row">
            <div class="col-md-10 col-md-offset-1 text-white">
            <br>
            <img class="rounded-circle" src="{{ URL::to('/') }}/img/uploads/avatars/{{ $user->avatar }}" style="width: 150px; height: 150px; float:left; margin-right: 25px;">
            <h2>{{ $user->name }}'s Profile</h2>
            <h6>{{ $user->email }}</h6>
            <p>Registered at: {{ $user->created_at }}</p>
            <form enctype="multipart/form-data" action="/profile" method="POST">
              <label><h4>Update Profile Image</h4></label>
              <br>
              <input style="position:relative; left:30px;" type="file" name="avatar">
              <input type="hidden" id="upload_file" name="_token" value="{{ csrf_token() }}">
              <input type="submit" class="pull-right btn btns btn-outline-light" value="Submit">
            </form>
            <br>
          </div>
        </div>
      </div>

      <br>

      @if(Auth::user()->type == 'doctor')

      @else
      <div class="container">
        <h2>Appointments</h2>
      @foreach($appointments as $appointment)
        <div class="row">
          <div class="doctors col-12">
            @if($appointment->user->id == Auth::User()->id)
              <ul class="list-group list-group-flush" style="background-color: rgba(255, 0, 0, 0);">
                <li style="background-color: rgba(255, 0, 0, 0);" class="list-group-item d-flex justify-content-between align-items-center">
                  <h5>{{ $appointment->date }}</h5>
                  <h3>{{ $appointment->doctor->name }}</h3>
                  <form class="delete_form" action="/appointments" method="POST">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <input type="hidden" name="id" value="{{ $appointment->id }}">
                    <input type="hidden" name="user_name" value="{{ $appointment->user->name }}">
                    <input type="hidden" name="doctor_name" value="{{ $appointment->doctor->name }}">
                    <input type="hidden" name="date" value="{{ $appointment->date }}">


                    <button type="submit" class="btn btn-outline-light">
                       Delete Appointment
                    </button>
                  </form>
                </li>
                <br>
              </ul>
            @endif
          </div>
        </div>
      @endforeach
      </div>
    </div>
  </div>
</div>
@endif

<script>
  var msg = '{{Session::get('alert')}}';

  $(document).ready(function(){
    $('.delete_form').on('submit', function(){
      if(confirm("Are you sure you want to delete it?")){
        Swal.fire({
          icon: 'success',
          title: 'Hurray!',
          text: msg,
        })
        return true;
      } else {
        Swal.fire({
          icon: 'error',
          text: "Appointment hasn't been deleted.",
        })
        return false;
      }
    });
  });
</script>
@endsection
