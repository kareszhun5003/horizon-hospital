@extends('layouts.app')

@section('navbar')
  <title>Symptom Checker</title>
  <style>
  .btn2{
    border: 1px solid #3498db;
    background: none;
    padding: 10px 20px;
    font-size: 20px;
    cursor: pointer;
    margin: 10px;
    transition: 0.8s;
    position: relative;
    }

    .dropdown-item{
      cursor: pointer;
    }

    @media only screen and (min-width:375px) and (max-width: 858px){
      h4{
        font-size: 12px;
      }
      span{
        font-size: 14px;
      }
      .symp-list{
        position: relative;
        right: 40px !important;
        font-size: 12px;
      }
    }

    @media only screen and (min-width:320px) and (max-width: 858px){
      h4{
        font-size: 12px;
      }
      span{
        font-size: 14px;
      }
      .symp-list{
        position: relative;
        right: 40px !important;
        font-size: 12px;
      }
    }

  </style>
@stop

@section('content')

<header class="symptom-header"></header>
  <div class="container-fluid padding">
    <div class="row welcome text-center">
        <div class="col-12">
            <h1 class="display-4">Symptom Checker</h1>
        </div>
        <hr />
        <div class="col-12">
          <p class="lead"></p>
        </div>
    </div>

    <div class="container">
    	<div class="row">
    		<div class="col-5">
    			<div class="col-12 text-center">
    				<h4>
    					Picked Symptoms: <span id="symptom-counter">0</span>
              <hr>
    				</h4>
    			</div>
    			<div class="col-12 symp-list" style="min-height: 100px;">
    				<ul id="symptom-list">

            </ul>
    			</div>
    			<div class="d-flex col-12 justify-content-center" >
					<button id="search-button" type="button" class="btn btn-sm btn-outline-dark col-12" onclick="startRequestDiseases()">Search</button>
    			</div>
    			<div class="col-12 text-center">
    				<button type="button" id="modalButton" style="display: none;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"></button>
    				<h5 class="text-danger" id="error-tag" style="display: none;"></h5>
    			</div>
    		</div>
    		<div class="col-7">
    			<div class="row">

            <div class="dropdown">
              <h4 style="display: inline">Choose your Symptoms: </h4>
              <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Here
              </button>
              <p style="font-size: 14px">Please choose as much Symptoms as possible for the most accurate results!</p>
              <hr>
              <div class="dropdown-menu scrollable-menu" role="menu">
                @foreach($symptoms as $symptom)
                  <a class="dropdown-item" id="symptom-{{$symptom->id}}" onclick="setSymptom('{{$symptom->id}}', '{{$symptom->name}}')">{{ $symptom->name }}</a>
                @endforeach

              </div>
            </div>

    			</div>
    		</div>
    	</div>
    </div>

  </div>

<div class="parallax"></div>

<div class="container-fluid padding">
	<div class="row welcome text-center">
	    <div class="col-12">
	        <h1 class="display-4">COVID-19</h1>
	    </div>
	    <hr/>
	    <div class="col-12">
	      <p class="lead"></p>
	    </div>
	</div>
	<div class="container">


			<nav class="col-12">
	            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
	                <a class="nav-item nav-link active" id="nav-1-tab" data-toggle="tab" href="#nav-1" role="tab" aria-controls="nav-alap" aria-selected="true">Hungary</a>
	                <a class="nav-item nav-link" id="nav-2-tab" data-toggle="tab" href="#nav-2" role="tab" aria-controls="nav-alap" aria-selected="true">Global</a>
	            </div>
	        </nav>


	        <section class="col-12">
	        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
	            <div class="container tab-pane  show active mr-3 ml-3" id="nav-1" role="tabpanel" aria-labelledby="nav-1-tab">
	                <div class="row">

                    <div class="grid">

                			<figure class="effect-ruby">
                				<img src="/img/hungary.jpg"/>
                				<figcaption>
                					<span>Cases</span>
                					<p>{{ $hungarianData['total_cases'] }}</p>
                				</figcaption>
                			</figure>
                      <figure class="effect-ruby">
                        <img src="/img/recovered.jpg"/>
                        <figcaption>
                          <span>Recovered</span>
                          <p>{{ $hungarianData['total_recovered'] }}</p>
                        </figcaption>
                      </figure>
                      <figure class="effect-ruby" >
                				<img src="/img/deaths.jpg"/>
                				<figcaption>
                					<span>Deaths</span>
                					<p>{{ $hungarianData['total_deaths'] }}</p>
                				</figcaption>
                			</figure>
                      <figure class="effect-ruby" >
                				<img src="/img/mask.jpg">
                				<figcaption>
                					<span>New Cases</span>
                					<p>{{ $hungarianData['total_new_cases_today'] }}</p>
                				</figcaption>
                			</figure>
                      <figure class="effect-ruby" >
                				<img src="/img/new_deaths.jpg"/>
                				<figcaption>
                					<span>New Deaths</span>
                					<p>{{ $hungarianData['total_new_deaths_today'] }}</p>
                				</figcaption>
                			</figure>
                      <figure class="effect-ruby">
                				<img src="/img/covid.jpg"/>
                				<figcaption>
                					<span>Active</span>
                					<p>{{ $hungarianData['total_active_cases'] }}</p>
                				</figcaption>
                			</figure>
                		</div>

	                </div>
	            </div>
	            <div class="container tab-pane mr-3 ml-3" id="nav-2" role="tabpanel" aria-labelledby="nav-2-tab">
	                <div class="row">
                    <div class="grid">

                			<figure class="effect-ruby">
                				<img src="/img/world.jpg"/>
                				<figcaption>
                					<span>Cases</span>
                					<p>{{ $globalData['total_cases'] }}</p>
                				</figcaption>
                			</figure>
                      <figure class="effect-ruby">
                        <img src="/img/recovered-global.jpg"/>
                        <figcaption>
                          <span>Recovered</span>
                          <p>{{ $globalData['total_recovered'] }}</p>
                        </figcaption>
                      </figure>
                      <figure class="effect-ruby">
                				<img src="/img/global_deaths.jpg"/>
                				<figcaption>
                					<span>Deaths</span>
                					<p>{{ $globalData['total_deaths'] }}</p>
                				</figcaption>
                			</figure>
                      <figure class="effect-ruby">
                				<img src="/img/masked.jpg"/>
                				<figcaption>
                				  <span>New Cases</span>
                					<p>{{ $globalData['total_new_cases_today'] }}</p>
                				</figcaption>
                			</figure>
                      <figure class="effect-ruby">
                				<img src="/img/death-global.jpg"/>
                				<figcaption>
                					<span>New Deaths</span>
                					<p>{{ $globalData['total_new_deaths_today'] }}</p>
                				</figcaption>
                			</figure>
                      <figure class="effect-ruby">
                				<img src="/img/covid.jpg"/>
                				<figcaption>
                					<span>Active</span>
                					<p>{{ $globalData['total_active_cases'] }}</p>
                				</figcaption>
                			</figure>
                		</div>
	                </div>
	            </div>
	        </div>
            <p style="font-size: 14px">*If you see NO DATA, please wait some minutes and try again.</p>
	        </section>
	</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Diseases</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="row modal-body justify-content-center" id="modal-body">
      		<div class="col-12">
      			<div class="col-12 text-center">
      				<h3>Exact symptom match</h3>
      				<ul class="list-group">
					  <li class="list-group-item">Rák</li>
					</ul>
      			</div>
      		</div>
      		<div class="col-12">
      			<div class="col-12 text-center">
      				<h3>Partial symptom match</h3>
      				 <li class="list-group-item">Rák</li>
      			</div>
      		</div>
      </div>
    </div>
  </div>
</div>


</div>

<script>

var symptoms = []
var URL = "{{ url("/") }}"

function startRequestDiseases(){
    if (!isValid()) {
        return;
    }

    document.getElementById("search-button").disabled = true;
    openModal();
    getDiseasesBySymptoms(symptoms)
}

function openModal(){
	$("#modalButton").click()
	$('#modal-body').html('<div id="loader"></div>');

}

function isValid(){
    if (symptoms.length < 2) {
        document.getElementById('error-tag').innerHTML = 'You need to select atleast 2 symptom';
        document.getElementById('error-tag').style.display = 'inline';
        return false;
    }

    document.getElementById('error-tag').style.display = 'none';

    return true;
}

function endRequestSuccess(response){
    addResultDiseases(response)
    document.getElementById('loader').style.display = 'none';
    document.getElementById("search-button").disabled = false;

}

function endRequestError(request, status, error){
    document.getElementById("search-button").disabled = false;
    document.getElementById('loader').style.display = 'none';
    console.log(status)
    console.log(request.responseText);
}

 function getDiseasesBySymptoms(symptoms) {
    $.ajaxSetup({
        headers: {
            'X-XSRF-TOKEN': "{{ csrf_token() }}"
        }
    });

    $.ajax({
        url: "{{ url('/api/diseases_by_symptoms') }}",
        data: {symptoms: symptoms, _token: "{{ csrf_token() }}", _method: "post"},
        method: "post",
        dataType: "json",
        success: function (response) {
            endRequestSuccess(response);
        },
        error: function (request, status, error) {
            endRequestError(request, status, error)
        }
    });

}

function addResultDiseases(response){
	exactDiseases = response.exact
	partialDiseases = response.partial

	var mainDiv = document.createElement("div");
    mainDiv.setAttribute('class', 'col-12');

	if (exactDiseases.length> 0) {
		var exactDiv = document.createElement("div");
	    exactDiv.setAttribute('class', 'col-12 text-center');
	    var exactTitle = document.createElement("h3");
	    var t = document.createTextNode("Full symptom match: ");

	    exactTitle.appendChild(t)

	    exactDiv.appendChild(exactTitle)

	    var list = document.createElement("ul");
	    list.setAttribute('class', 'list-group col-12');

	    for (let i = 0; i < exactDiseases.length; i++) {
	        var item = document.createElement("li");
	        item.setAttribute('class', 'list-group-item');
	        item.innerHTML = exactDiseases[i]['name'];
	        list.appendChild(item)
	    }

	    exactDiv.appendChild(list)

	    mainDiv.appendChild(exactDiv)
	}


	if (partialDiseases.length > 0) {
		var partialDiv = document.createElement("div");
	    partialDiv.setAttribute('class', 'col-12 text-center');
	    var partialTitle = document.createElement("h3");
	    var t = document.createTextNode("Partial symptom match: ");

	    partialTitle.appendChild(t)

	    partialDiv.appendChild(partialTitle)

	    var list = document.createElement("ul");
	    list.setAttribute('class', 'list-group col-12');

	    for (let i = 0; i < partialDiseases.length; i++) {
	        var item = document.createElement("li");
	        item.setAttribute('class', 'list-group-item');

	        var percentage = Math.round(((partialDiseases[i]['diseaseConcord']*100) + Number.EPSILON) * 100) / 100


	        item.innerHTML = partialDiseases[i]['name'] + " (";
	        item.innerHTML = item.innerHTML + percentage + "%";
	        item.innerHTML = item.innerHTML + ")";


	        list.appendChild(item)
	    }

	    partialDiv.appendChild(list)
	    mainDiv.appendChild(partialDiv)
	}

	if (partialDiseases.length < 1 && exactDiseases.length < 1) {
		var zeroTitle = document.createElement("h3");
	    var t = document.createTextNode("Partial symptom match: ");
	    zeroTitle.appendChild(t)
	    mainDiv.appendChild(zeroTitle)
	}

	$('#modal-body').append(mainDiv);

}



function setSymptom(symptomId, symptomName) {
    $("#symptom-"+ symptomId).toggleClass('border-info');
    $("#symptom-"+ symptomId).toggleClass('border-danger');

    if(symptoms.includes(symptomId)){

        const index = symptoms.indexOf(symptomId);
        if (index > -1) {
            symptoms.splice(index, 1);
        }

        var li = $('#active-symptom-' + symptomId);
        li.remove();

    }else {
        symptoms.push(symptomId);

        var ul = document.getElementById("symptom-list");
        var li = document.createElement("li");

        specificId = 'active-symptom-' + symptomId;
        li.setAttribute('id', specificId)

        li.appendChild(document.createTextNode(symptomName));
        ul.appendChild(li);

    }

    document.getElementById("symptom-counter").innerHTML = symptoms.length;
    }

</script>

@endsection
