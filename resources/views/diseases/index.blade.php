@extends('layouts.app')

@section('navbar')
<title>Diseases</title>
@stop

@section('content')
<div class="container" style="min-height: 600px;">
    <div class="col-md-12">
            <div class="container-fluid padding">
            <div class="row welcome text-center">
                <div class="col-12">
                    <h1 class="display-4">Diseases</h1>
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

        <a style="margin-bottom: 5px;" href="{{ route('diseases.create') }}" class="btn btn-warning float-right">Add new</a>

        <h3>Don't use ' or " in the name of Diseases!</h3>

        @if(count($diseases) > 0)

          <?php $i = 1; ?>

            <table class="table table-bordered">
                <tr>
                    <td>Name</td>
                    <td>Actions</td>
                </tr>
                @foreach($diseases as $disease)
                    <tr>
                        <td> <?php echo $i ?>. {{ $disease->name }}</td>
                        <td>
                            <div class="row pl-1">
                                <a href="{{ url('diseases/' . $disease->id . '/edit') }}"><button class="btn btn-primary" >Update</button></a>
                                <form action="{{ route('diseases.destroy',$disease->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{method_field('DELETE')}}
                                    <button onclick="return confirm('Are you sure you want to delete this disease: {{ $disease->name}} ?');" type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#diseases-modal" onclick="loadModalData('{{$disease->id}}', '{{$disease->name}}')">
                                  Symptoms
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php $i++ ?>
                @endforeach
            </table>

            @if(count($diseases) > 0)
                <div class="pagination">
                    <?php echo $diseases->render();  ?>
                </div>
            @endif

        @else
            <i>No Diseases found</i>

        @endif
    </div>
</div>
<div class="modal fade" id="diseases-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="d-flex modal-body justify-content-center" id="modal-body">

      </div>
      <div class="modal-footer">
        <h6 class="text-danger" id="error-tag" style="display: none;"></h6> <br>
        <select id="symptom-selector" class="pizza_category3" data-original-category="">
            <option value="0" selected>NO SYMPTOM YET</option>
            @foreach($symptoms as $symptom)
                <option value="{{$symptom->id}}">{{$symptom->name}}</option>
            @endforeach
        </select>
        <button type="button" class="btn btn-info btn-sm" id="button-save" onclick="saveConnection()" style="">Save changes</button>

      </div>
    </div>
  </div>
</div>

<script>
function loadModalData(diseaseId,diseaseName){
    $('#exampleModalLabel').text(diseaseName);
    $('#exampleModalLabel').data('id', diseaseId);
    $('#exampleModalLabel').data('name', diseaseName);

    loaderShowToModal();
    getSymptomsByDiseaseId(diseaseId)

}

function reloadData(diseaseId){
  loaderShowToModal()
  getSymptomsByDiseaseId(diseaseId)
}

function loaderShowToModal(){
    $('#modal-body').html('<div id="loader"></div>');
}

function getSymptomsByDiseaseId(diseaseId){
        $.ajax({
              url: "{{ url('api/symptoms') }}/" + diseaseId,
              data: {  _token: "{{ csrf_token() }}"},
              method: "get",
              dataType: "json",
              success: function (response) {
                  setDataToModal(response.symptoms)

            },
              error: function (request, status, error) {
                 alert(request.responseText);
            }
           });
}

function setDataToModal(symptoms){
    var list = document.createElement("ul");
    list.setAttribute('class', 'list-group col-12');

    for (let i = 0; i < symptoms.length; i++) {
        var item = document.createElement("li");
        item.setAttribute('class', 'list-group-item');
        item.innerHTML = `<div class='d-flex justify-content-between'>
                            <p>${symptoms[i]['name']}</p>
                            <button type='button' class='btn btn-danger delete-button' onclick='deleteConnection(${symptoms[i]['id']})' >X</button>
                          </div>`;
        list.appendChild(item)
    }

    $('#modal-body').html('');
    $('#modal-body').append(list);
}

$('.btn-apply2').click(function () {

  $.ajaxSetup({
    headers: {
        'X-XSRF-TOKEN': "{{ csrf_token() }}"
    }
  });

  $.ajax({
    url: "{{ url('dashboard/pizzas/set-pizza-category2') }}",
    data: {pizza_id: pizzaId, category_id2: category_id2, _token: "{{ csrf_token() }}", _method: "patch"},
    method: "post",
    dataType: "json",
    success: function (response) {
        $.notify(response.msg, {animate: {enter: 'animated fadeInRight',exit: 'animated fadeOutRight'}});
        btn.hide();
    },
        error: function (request, status, error) {
        alert(request.responseText);
    }
    });
});

function saveConnection(){
  document.getElementById("button-save").disabled = true;
  var symptom_id = $('#symptom-selector').val();
  var disease_id = $('#exampleModalLabel').data('id');

  if (symptom_id == 0) {
    document.getElementById("button-save").disabled = false;
    return
  }
  sendSaveConnectionRequest(symptom_id, disease_id)
}

function deleteConnection(sympId){
  var isSure = confirm("Are you sure you want to delete this symptom from the disease?")

  if (isSure == false) {
    return
  }
  document.getElementsByClassName("delete-button").disabled = true;
  var symptom_id = sympId;
  var disease_id = $('#exampleModalLabel').data('id');
  sendDeleteConnectionRequest(symptom_id, disease_id);
}

function sendSaveConnectionRequest(sympId, disId){
   $.ajaxSetup({
    headers: {
      'X-XSRF-TOKEN': "{{ csrf_token() }}"
    }
  });

  $.ajax({
      url: "{{ url('api/save/symptons_for_disease') }}",
      data: {symptom_id: sympId, disease_id: disId, _token: "{{ csrf_token() }}", _method: "patch"},
      method: "post",
      dataType: "json",
      success: function (response) {
        setError(200);
        var disease_id = $('#exampleModalLabel').data('id');
        reloadData(disease_id)
        document.getElementById("button-save").disabled = false;
      },
          error: function (request, status, error) {
            switch (request.status) {
              case 400:
                alert(request.responseText)
                break;
              case 409:
                setError(409)
                break;
          }
          document.getElementById("button-save").disabled = false;
      }
    });
}

function sendDeleteConnectionRequest(sympId, disId){
   $.ajaxSetup({
    headers: {
      'X-XSRF-TOKEN': "{{ csrf_token() }}"
    }
  });

  $.ajax({
      url: "{{ url('api/delete/symptons_for_disease') }}",
      data: {symptom_id: sympId, disease_id: disId, _token: "{{ csrf_token() }}", _method: "delete"},
      method: "post",
      dataType: "json",
      success: function (response) {
        setError(200);
        var disease_id = $('#exampleModalLabel').data('id');
        reloadData(disease_id)
      },
          error: function (request, status, error) {
                console.log(alert(request.responseText));
      }
    });
}

function setError(errorId){
    switch (errorId) {
      case 200:
        document.getElementById('error-tag').style.display = 'none';
        break;
      case 409:
        document.getElementById('error-tag').innerHTML = 'Error: Duplicate data';
        document.getElementById('error-tag').style.display = 'inline';
        break;
    }
}





</script>

@endsection
