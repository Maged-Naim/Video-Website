<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

    <link href="/frontend/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/frontend/css/paper-kit.css?v=2.2.0" rel="stylesheet" />


    <script src="frontend/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="frontend/js/core/popper.min.js" type="text/javascript"></script>
    <script src="frontend/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="frontend/js/paper-kit.js?v=2.2.0" type="text/javascript"></script>

    <script src="{{ asset('js/app.js')  }}" ></script>
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
                      <img src="{{'/uploads/images/'.Auth::user()->image}}" style="height: 70px; width: 70px;" class="profile-image img-circle" style=" padding-top: 10px; padding-bottom: 10px;"> 
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
                    </ul> 
              </div>
          </div>
    </nav>


    

            <div class="container-fluid" style="margin-top: 50px; max-height:160px;">
              <div class="row">                
                  <nav id="sidebarMenu" style="position: fixed;" class="col-md-6 col-lg-4 d-md-block   ">
                    <div class="sidebar-wrapper">
                      <ul class="nav flex-column">
                        <li class="nav-item active">
                          
                          <a class="nav-link" href="{{ route('admin.home') }}">
                            <i class="material-icons">dashboard</i>
                              <p>Dashboard</p>
                          </a>
                      </li> 
                        <li class="nav-item" {{is_active('users')}}>
                          <a class="nav-link active" href="{{ route('users.index') }}">
                            <i class="material-icons">person</i>
                            <p>Users</p>
                          </a>
                        </li>
                        <li class="nav-item" {{is_active('categories')}}>
                          <a class="nav-link" href="/admin/categories">
                            <i class="material-icons">bubble_chart</i>
                            <p>Categories</p>
                          </a>
                        </li>
                        <li class="nav-item" {{is_active('videos')}}>
                          <a class="nav-link" href="/admin/videos">
                            <i class="material-icons">video_call</i>
                            <p>Videos</p> 
                          </a>
                        </li>
                        <li class="nav-item" {{is_active('skills')}}>
                          <a class="nav-link" href="/admin/skills">
                            <i class="material-icons">offline_bolt</i>
                            <p>Skills</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="/admin/tags">
                            <i class="material-icons">turned_in_not</i>
                            <p>Tags</p>
                          </a>
                        </li>
                        <li class="nav-item" {{ is_active('messages') }}>
                          <a class="nav-link" href="/admin/messages">
                            <i class="material-icons">cloud<p>Messages</p></i>
                            
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="/admin/pages">
                            <i class="material-icons">content_paste</i>
                            <p>Pages</p>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </nav>
                  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" style="margin-top: 50px;">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                      <h1 class="h2">Admin Panel</h1>
                    </div>
                    @include('inc.messages')
                    @yield('content')
                    
                    
                   @include('backend.layout.footer')
                  </main>
              </div>
            </div>
            <script src="frontend/js/core/jquery.min.js" type="text/javascript"></script>
            <script src="frontend/js/core/popper.min.js" type="text/javascript"></script>
            <script src="frontend/js/core/bootstrap.min.js" type="text/javascript"></script>
            <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
            <script src="frontend/js/plugins/bootstrap-switch.js"></script>
            <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
            <script src="frontend/js/plugins/nouislider.min.js" type="text/javascript"></script>
            <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
            <script src="frontend/js/plugins/moment.min.js"></script>
            <script src="frontend/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
            <!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
            <script src="frontend/js/paper-kit.js?v=2.2.0" type="text/javascript"></script> 
  </body>

</html>


