<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="/frontend/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/frontend/css/paper-kit.css?v=2.2.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="/frontend/demo/demo.css" rel="stylesheet" />
</head>
<body>
  
  <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="{{route('frontend.landing')}}" rel="tooltip" title="Megotube" data-placement="bottom" >
            MEGOTUPE
        </a>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="nav navbar-nav navbar-top">

          <li class="nav-item active">
            <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
          </li>
         <li class="nav-item dropdown">
          <div class="dropdown show">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" href="#pk" role="button" aria-haspopup="true" aria-expanded="true">Categories</a>
            <ul  class="dropdown-menu dropdown-menu-right dropdown-info show" aria-labelledby="dropdownMenuButton">
              <li class="nav-item dropdown">
                @foreach($categories as $category)
                <a class="dropdown-item" href="{{ route('front.category' , ['id' => $category->id ]) }}">{{ $category->name }}</a>
                @endforeach
              </li>            
            </ul>
          </div>
        </li> 
        
        <li class="nav-item dropdown">
          <div class="nav-item dropdown show">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" href="#pk" role="button" aria-haspopup="true" aria-expanded="true">Skills</a>
            <ul class="dropdown-menu dropdown-info show" aria-labelledby="dropdownMenuButton">
              <li class="nav-item dropdown">
                @foreach($skills as $skill)
                <a class="dropdown-item" href="{{ route('front.skill' , ['id' => $skill->id ]) }}">{{ $skill->name }}</a>
                @endforeach
              </li>              
            </ul>
          </div>
        </li>
      @guest
          <li class="nav-item">
              <a href="{{ url('/login') }}" class="nav-link">login</a>
          </li>

          <li class="nav-item">
              <a href="{{ url('/register') }}" class="nav-link">register</a>
          </li>

          <li class="nav-item">
            <a href="{{ url('/home') }}" class="nav-link">Home</a>
          </li>

      @else
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                </a>
                        
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{ route('front.profile' , ['id' => auth()->user()->id]) }}" >Profile</a>

                  <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
              </div>
          </li>
      

      @endguest
              <li>
                    <form class="form-inline ml-auto" style="margin-top:15px" action="{{ route('home') }}">
                        <div class="form-group has-white">
                            <input type="text" name="search" class="form-control" placeholder="Search">
                        </div>
                    </form>
                </li>
              
            </ul> 
    </div>
  </div>
  </nav>

  <script src="/frontend/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="/frontend/js/core/popper.min.js" type="text/javascript"></script>
  <script src="/frontend/js/core/bootstrap.min.js" type="text/javascript"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="/frontend/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="/frontend/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="/frontend/js/plugins/moment.min.js"></script>
  <script src="/frontend/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
  <!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
  <script src="/frontend/js/paper-kit.js?v=2.2.0" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
</body>
</html>