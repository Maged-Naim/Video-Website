@extends('layouts.app')

@section('title' , $user->name)

@section('content')


    <!DOCTYPE html>
    <html lang="en">
    
    <head>
      <meta charset="utf-8" />
      <link rel="apple-touch-icon" sizes="76x76" href="/frontend/img//apple-icon.png">
      <link rel="icon" type="image/png" href="/frontend/img//favicon.png">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <title>
        MEGOTUPE
      </title>
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
      <!--     Fonts and icons     -->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
      <!-- CSS Files -->
      <link href="/frontend/css/bootstrap.min.css" rel="stylesheet" />
      <link href="/frontend/css/paper-kit.css?v=2.2.0" rel="stylesheet" />
      <!-- CSS Just for demo purpose, don't include it in your project -->
      <link href="/frontend/demo/demo.css" rel="stylesheet" />
    </head>
     
    <body class="profile-page sidebar-collapse">
      <div class="page-header page-header-xs" data-parallax="true" style="background-image: url('/frontend/img/fabio-mangione.jpg');">
        <div class="filter"></div>
      </div>
      <div class="section profile-content">
        <div class="container">
          <div class="owner">
            <div class="avatar">
              {{-- <img src="/frontend/img/faces/joe-gardner-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive"> --}}
              
                <img src="{{'/uploads/images/'.$user->image}}"  class="img-circle img-no-padding img-responsive">
                
               
               
            </div>
            <div class="name">
                <div class="name">
                    <h4 class="title">{{ $user->name }}
                        <br>
                    </h4>
                    <h6 class="description">
                        {{ $user->email }}
                    </h6>
                </div>
            </div>
            @if(auth()->user() && $user->id == auth()->user()->id)
                <br>
                <div class="row" style="margin-bottom: 130px;">
                    <div class="col-md-6 ml-auto mr-auto text-center" >
                        <button onclick="$('#profileCard').slideToggle(1000)" class="btn btn-outline-info btn-round"><i class="fa fa-cog"></i> Update Profile</button>
                        <button onclick="$('#uploadvideo').slideToggle(1000)" class="btn btn-outline-info btn-round"><i class="fa fa-cog"></i> Upload Video</button>

                    </div>
                </div>
                @include('frontend.profile.edit')
                @include('frontend.profile.add-video')
                
            @endif
            
        </div>
      </div>
    
      <!--   Core JS Files   -->
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



@endsection
