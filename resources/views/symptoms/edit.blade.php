@extends('layouts.app')
 
@section('content')
<div class="container" style="min-height: 600px;">
    <div class="col-md-12">
        <div class="container-fluid padding">
        <div class="row welcome text-center">
            <div class="col-12">
                <h1 class="display-4">Update Symptom #{{$symptom->id}}</h1>
            </div>
            <hr />
            <div class="col-12">
              <p class="lead"></p>
            </div>
        </div>
      </div>

        @if(session('error')!='')
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (count($errors) > 0)

            <div class="alert alert-danger">

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form method="post" action="{{ route('symptoms.update', $symptom->id) }}">
            {{ csrf_field() }}
            {{ method_field("PUT") }}

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">

                        <strong>Name:</strong>

                        <input type="text" name="name" value="{{ $symptom->name }}" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary" id="btn-save">Update</button>

            </div>

        </form>
    </div>
</div> 
@endsection