@extends('layouts.app')

@section('navbar')
  <title>Doctors</title>
  <style>
    @media only screen and (min-width:768px) and (max-width: 1024px){
      *{
        max-width: 100%;
      }
    }

    @media only screen and (min-width:375px) and (max-width: 768px){
      .doctors-c{
        width: 166.25px !important;
      }
      h4{
        font-size: 21px;
      }
    }

    @media only screen and (min-width:320px) and (max-width: 375px){
      .doctors-c{
        width: 135px !important;
      }

      .pic{
        width: 100px !important;
      }

      h4{
        font-size: 17px;
      }
    }

  </style>
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
    <div class="row">
      <div class="doctors col-12">

        <div class="dropdown">
          <h4 style="display: inline;">Search by Specialties: </h4>
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Doctors
          </button>
          <hr>
          <div class="dropdown-menu scrollable-menu" role="menu">
            <a class="dropdown-item" href="#">Allergologist</a>
            <a class="dropdown-item" href="#allergologist">Anaesthesiologist</a>
            <a class="dropdown-item" href="#anaesthesiologist">Anaesthesiologist and Intensive Therapist</a>
            <a class="dropdown-item" href="#anaesthesiologist_and_intensive_therapist">Andrologist</a>
            <a class="dropdown-item" href="#andrologist">Andrologist and Urologist</a>
            <a class="dropdown-item" href="#andrologist_and_urologist">Audiologist</a>
            <a class="dropdown-item" href="#audiologist">Bronchologist</a>
            <a class="dropdown-item" href="#bronchologist">Cardiologist</a>
            <a class="dropdown-item" href="#cardiologist">Clinical Oncologist</a>
            <a class="dropdown-item" href="#clinical_oncologist">Consultant</a>
            <a class="dropdown-item" href="#consultant">Dermatologist</a>
            <a class="dropdown-item" href="#dermatologist">Diabetologist</a>
            <a class="dropdown-item" href="#diabetologist">ENT Specialist</a>
            <a class="dropdown-item" href="#ent_specialist">Endocrinologist</a>
            <a class="dropdown-item" href="#endocrinologist">Otolaryngologist</a>
            <a class="dropdown-item" href="#otolaryngologist">Gastroenterologist</a>
            <a class="dropdown-item" href="#gastroenterologist">General Practitioner</a>
            <a class="dropdown-item" href="#general_practitioner">Gynaecologist</a>
            <a class="dropdown-item" href="#gynaecologist">Haematologist</a>
            <a class="dropdown-item" href="#haematologist">Immunologist</a>
            <a class="dropdown-item" href="#immunologist">Infantologist and Paediatrician</a>
            <a class="dropdown-item" href="#infantologist_and_paediatrician">Infectologist</a>
            <a class="dropdown-item" href="#infectologist">Internist</a>
            <a class="dropdown-item" href="#internist">Laboratorist</a>
            <a class="dropdown-item" href="#laboratorist">Lipidologist</a>
            <a class="dropdown-item" href="#lipidologist">Neonatologist</a>
            <a class="dropdown-item" href="#neonatologist">Neurologist</a>
            <a class="dropdown-item" href="#neurologist">Neuropsychologist</a>
            <a class="dropdown-item" href="#neuropsychologist">Neurosurgeon</a>
            <a class="dropdown-item" href="#neurosurgeon">Nutritionist</a>
            <a class="dropdown-item" href="#nutritionist">Obesitologist</a>
            <a class="dropdown-item" href="#obesitologist">Oncologist</a>
            <a class="dropdown-item" href="#oncologist">Ophthalmologist</a>
            <a class="dropdown-item" href="#ophthalmologist">Orthopaedist</a>
            <a class="dropdown-item" href="#orthopaedist">Paediatric Cardiologist</a>
            <a class="dropdown-item" href="#paediatric_cardiologist">Paediatric ENT Specialist</a>
            <a class="dropdown-item" href="#paediatric_ent_specialist">Paediatric Gastroenterologist</a>
            <a class="dropdown-item" href="#paediatric_gastroenterologist">Paediatric Orthopaedist</a>
            <a class="dropdown-item" href="#paediatric_orthopaedist">Paediatric Pulmonologist</a>
            <a class="dropdown-item" href="#paediatric_pulmonologist">Paediatric Radiologist</a>
            <a class="dropdown-item" href="#paediatric_radiologist">Paediatric Surgeon</a>
            <a class="dropdown-item" href="#paediatric_surgeon">Pathologist</a>
            <a class="dropdown-item" href="#pathologist">Plastic Surgeon</a>
            <a class="dropdown-item" href="#plastic_surgeon">Psychologist</a>
            <a class="dropdown-item" href="#psychologist">Psychiatrist</a>
            <a class="dropdown-item" href="#psychiatrist">Pulmonologist</a>
            <a class="dropdown-item" href="#pulmonologist">Radiologist</a>
            <a class="dropdown-item" href="#radiologist">Rheumatologist</a>
            <a class="dropdown-item" href="#rheumatologist">Surgeon</a>
            <a class="dropdown-item" href="#surgeon">Toxicologist</a>
            <a class="dropdown-item" href="#toxicologist">Traumatologist</a>
            <a class="dropdown-item" href="#traumatologist">Urologist</a>
          </div>
        </div>

        <h2 class="doc-title" id="allergologist">Allergologist</h2>
          @foreach($doctors as $doctor)
            @if($doctor->specialty == 'Allergologist')
              <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
            @endif
          @endforeach

        <h2 class="doc-title" id="anaesthesiologist">Anaesthesiologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Anaesthesiologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="anaesthesiologist_and_intensive_therapist">Anaesthesiologist and Intensive Therapist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Anaesthesiologist and Intensive Therapist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="andrologist">Andrologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Andrologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="andrologist_and_urologist">Andrologist and Urologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Andrologist and Urologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="audiologist">Audiologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Audiologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="bronchologist">Bronchologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Bronchologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="cardiologist">Cardiologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Cardiologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="clinical_oncologist">Clinical Oncologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Clinical Oncologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="consultant">Consultant</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Consultant')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="dermatologist">Dermatologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Dermatologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="diabetologist">Diabetologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Diabetologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="ent_specialist">ENT Specialist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'ENT Specialist')
            <a href="/doctors/{{ $doctor->slug }}" class=" doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="endocrinologist">Endocrinologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Endocrinologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="otolaryngologist">Otolaryngologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Otolaryngologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="gastroenterologist">Gastroenterologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Gastroenterologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="general_practitioner">General Practitioner</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'General Practitioner')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="gynaecologist">Gynaecologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Gynaecologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="haematologist">Haematologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Haematologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="immunologist">Immunologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Immunologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="infantologist_and_paediatrician">Infantologist and Paediatrician</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Infantologist and Paediatrician')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 id="infectologist">Infectologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Infectologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="internist">Internist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Internist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="laboratorist">Laboratorist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Laboratorist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="lipidologist">Lipidologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Lipidologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="neonatologist">Neonatologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Neonatologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="neurologist">Neurologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Neurologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="neuropsychologist">Neuropsychologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Neuropsychologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="neurosurgeon">Neurosurgeon</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Neurosurgeon')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="nutritionist">Nutritionist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Nutritionist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="obesitologist">Obesitologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Obesitologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="oncologist">Oncologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Oncologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="ophthalmologist">Ophthalmologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Ophthalmologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="orthopaedist">Orthopaedist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Orthopaedist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="paediatric_cardiologist">Paediatric Cardiologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Paediatric Cardiologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="paediatric_ent_specialist">Paediatric ENT Specialist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Paediatric ENT Specialist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="paediatric_gastroenterologist">Paediatric Gastroenterologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Paediatric Gastroenterologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="paediatric_orthopaedist">Paediatric Orthopaedist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Paediatric Orthopaedist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="paediatric_pulmonologist">Paediatric Pulmonologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Paediatric Pulmonologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="paediatric_radiologist">Paediatric Radiologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Paediatric Radiologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="paediatric_surgeon">Paediatric Surgeon</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Paediatric Surgeon')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="pathologist">Pathologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Pathologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="plastic_surgeon">Plastic Surgeon</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Plastic Surgeon')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="psychologist">Psychologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Psychologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="psychiatrist">Psychiatrist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Psychiatrist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="pulmonologist">Pulmonologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Pulmonologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="radiologist">Radiologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Radiologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="rheumatologist">Rheumatologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Rheumatologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="surgeon">Surgeon</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Surgeon')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="toxicologist">Toxicologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Toxicologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="traumatologist">Traumatologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Traumatologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

        <h2 class="doc-title" id="urologist">Urologist</h2>
        @foreach($doctors as $doctor)
          @if($doctor->specialty == 'Urologist')
            <a href="/doctors/{{ $doctor->slug }}" class="doctors-c btn btn-outline-dark"><img src="/img/doctors/{{ $doctor->img }}" style="width: 125px; height: auto;" class="rounded-circle pic" /> <h4>{{ $doctor->name }}</h5></a>
          @endif
        @endforeach

      </div>
    </div>
  </div>
  <br>
@endsection
