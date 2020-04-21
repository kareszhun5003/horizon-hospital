@extends('layouts.app')

@section('navbar')
  <title>Appointments</title>

@stop

@section('content')

  <header class="doc-header"></header>
  <div class="container-fluid padding">
    <div class="row welcome text-center">
        <div class="col-12">
            <h1 class="display-4">My Appointments</h1>
        </div>
        <hr />
        <div class="col-12">
          <p class="lead"></p>
        </div>
    </div>
  </div>

  <div class="container">
  @foreach($appointments as $appointment)
    <div class="row">
      <div class="doctors col-12">
        @if($appointment->doctor->id == Auth::User()->doctor->id)
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <h3>{{ $appointment->user->name }}</h3>
              <h5>{{ $appointment->date }}</h5>
              <form class="delete_form" action="/appointments" method="POST">
                {{csrf_field()}}
                {{ method_field('DELETE') }}
                <input type="hidden" name="id" value="{{ $appointment->id }}">
                <input type="hidden" name="user_name" value="{{ $appointment->user->name }}">
                <input type="hidden" name="doctor_name" value="{{ $appointment->doctor->name }}">
                <input type="hidden" name="date" value="{{ $appointment->date }}">


                <button type="submit" class="btn btn-outline-dark">
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
  <br>

<script>
  $(document).ready(function(){
    $('.delete_form').on('submit', function(){
      if(confirm("Are you sure you want to delete it?")){
        return true;
      } else {
        return false;
      }
    });
  });
</script>

@endsection
