@extends('layouts.app')

@section('navbar')
<title>Symptoms</title>
@stop

@section('content')
<div class="container" style="min-height: 600px;">
    <div class="col-md-12">
            <div class="container-fluid padding">
            <div class="row welcome text-center">
                <div class="col-12">
                    <h1 class="display-4">Symptoms</h1>
                </div>
                <hr />
                <div class="col-12">
                  <p class="lead"></p>
                </div>
            </div>
          </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <a style="margin-bottom: 5px;" href="{{ route('symptoms.create') }}" class="btn btn-warning float-right">Add new</a>

        <h3>Don't use ' or " in the name of Symptoms!</h3>

        @if(count($symptoms) > 0)

          <?php $i = 1; ?>

            <table class="table table-bordered">
                <tr>
                    <td>Name</td>
                    <td>Actions</td>
                </tr>
                @foreach($symptoms as $symptom)
                    <tr>
                        <td> <?php echo $i ?>. {{ $symptom->name }}</td>
                        <td>
                            <div class="row pl-1">
                                <a href="{{ url('symptoms/' . $symptom->id . '/edit') }}"><button class="btn btn-primary" >Update</button></a>
                                <form action="{{ route('symptoms.destroy',$symptom->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{method_field('DELETE')}}
                                    <button onclick="return confirm('Are you sure you want to delete this symptom: {{ $symptom->name}} ?');" type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php $i++ ?>
                @endforeach
            </table>

            @if(count($symptoms) > 0)
                <div class="pagination">
                    <?php echo $symptoms->render();  ?>
                </div>
            @endif

        @else
            <i>No Symptoms found</i>

        @endif
    </div>
</div>

@endsection
