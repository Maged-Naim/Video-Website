<!DOCTYPE html>
<html lang="en">
<head>

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
              <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" href="#category" role="button" aria-haspopup="true" aria-expanded="true">Categories</a>
                <ul class="dropdown-menu dropdown-info " aria-labelledby="dropdownMenuButton">
                  <li class="nav-item dropdown">
                      @foreach($categories as $category)
                          <a class="dropdown-item" href="{{ route('front.category' , ['id' => $category->id ]) }}">{{ $category->name }}</a>
                      @endforeach
                  </li>            
                </ul>
              </div>
            </li> 
          
            <li class="nav-item dropdown">
              <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" href="#pk" role="button" aria-haspopup="true" aria-expanded="true">Skills</a>
                <ul class="dropdown-menu dropdown-info " aria-labelledby="dropdownMenuButton">
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
                          
                <div class="dropdown-menu dropdown-info" aria-labelledby="navbarDropdownMenuLink">
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
</body>
</html>