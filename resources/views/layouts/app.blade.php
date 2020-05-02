<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"> </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  @yield('css')
  <link rel="icon" href="{{ URL::to('/') }}/img/new-logo.png">
  <link rel="stylesheet" href="/css/main.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script><script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
  <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><img src="{{ URL::to('/') }}/img/new-logo.png" width="120px" height=120px; /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="/"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/symptom-checker"><i class="fas fa-stethoscope"></i> Symptom Checker</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/doctors"><i class="fas fa-user-md"></i> Doctors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/forums"><i class="fas fa-comments"></i> Forums</a>
                </li>
            </ul>
            <hr />
            <ul class="navbar-nav mr-auto">
         @guest
         <li class="nav-item">
           <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
         </li>
           @if (Route::has('register'))
           <li class="nav-item">
             <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
           </li>
           @endif
          @else
             <li class="nav-item dropdown">
               <a style="position: relative; padding-left:50px;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                 <img class="rounded-circle" src="{{ URL::to('/') }}/img/uploads/avatars/{{ Auth::user()->avatar }}" style="width: 40px; height: 40px;"/>
                 {{ Auth::user()->name }} <span class="caret"></span>
               </a>

               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                 @if(Auth::user()->type == 'doctor')
                   <a class="dropdown-item" href="/doctorProfile"><i class="fas fa-user-md"></i>
                    Doctor Profile</a>
                 @elseif(Auth::user()->type == 'admin')
                    <a class="dropdown-item" href="/diseases">
                      Diseases
                    </a>
                    <a class="dropdown-item" href="/symptoms">
                      Symptoms
                    </a>
                 @endif()
                 <a class="dropdown-item" href="/profile"><i class="fas fa-user"></i>
                   Profile</a>
                 <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                 <i class="fas fa-sign-out-alt"></i>
                 {{ __('Logout') }}
                 </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                   @csrf
                 </form>
               </div>
             </li>
           @endguest
         </ul>
        </div>
    </div>
</nav>
      @yield('navbar')

      @yield('content')
</div>
  <footer>
    <div class="container-fluid padding">
        <div class="row text-center">
            <div class="col-md-6">
                <h4>Horizon Hospital</h4>
                <hr class="light" />
                <p>21 Medical Street</p>
                <p>Őrvár, Unknown, 1234</p>
                <p>+36/12-345-6789</p>
                <p>horizonhospital00@gmail.com</p>
            </div>
            <div class="col-md-6">
                <h4>Our hours</h4>
                <hr class="light" />
                <p style="font-weight: bold">Consulting hours</p>
                <p>Monday - Friday: 8am - 3pm</p>
                <p style="font-weight: bold">Visiting hours</p>
                <p>Every day: 2pm - 5pm</p>
            </div>

            <div class="col-12">
                <hr class="light-100" />
                <h5>&copy; Horizon Hospital 2020</h5>
            </div>
        </div>
    </div>
</footer>
    @yield('js')
    <script>
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    })
    </script>
</body>
</html>
