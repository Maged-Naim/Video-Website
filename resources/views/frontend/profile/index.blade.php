@extends('layouts.app')

@section('title' , $user->name)

@section('content')


  <!DOCTYPE html>
  <html lang="en">    
    <head>
      <title>MEGOTUPE</title>   
      <link href="/frontend/css/bootstrap.min.css" rel="stylesheet" />
      <link href="/frontend/css/paper-kit.css?v=2.2.0" rel="stylesheet" />
      <script src="frontend/js/core/jquery.min.js" type="text/javascript"></script>
      <script src="frontend/js/core/popper.min.js" type="text/javascript"></script>
      <script src="frontend/js/core/bootstrap.min.js" type="text/javascript"></script>
      <script src="frontend/js/paper-kit.js?v=2.2.0" type="text/javascript"></script>
    </head>  
    <body class="profile-page sidebar-collapse">
        <div class="page-header page-header-xs" data-parallax="true" style="background-image: url('/frontend/img/fabio-mangione.jpg');">
          <div class="filter"></div>
        </div>
        <div class="section profile-content">
            <div class="container">
                  <div class="owner">
                      <div class="avatar">              
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

                <div class="section section-buttons" class="min:height: 850px;">
                      <div class="container">
                          <div class="title"> 
                              <h2>
                                  <i class="nc-icon nc-headphones"></i>
                                  {{$user->name}} Videos
                              </h2>
                          </div>

                          <div class="row">
                            @foreach($videos as $video)
                                <div class="col-lg-4">
                                  <div class="card" style="width: 20rem; margin:40px;">
                                    <a href="{{ route('frontend.video' , ['id' => $video->id]) }}" title="{{ $video->name }}">
                                        <img class="card-img-top" src="{{ url('uploads/'.$video->image) }}" alt="{{ $video->name }}" style="max-height: 160px">
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text">
                                            <a href="{{ route('frontend.video' , ['id' => $video->id]) }}" title="{{ $video->name }}">
                                                {{ $video->name }}
                                            </a>
                                        </p>
                                        <small>{{ $video->created_at }}</small>
                                    </div>
                                </div>
                                </div>
                            @endforeach
                          </div>
                      </div>
                </div>
          </div>
        </div>
    </body>
  
   </html>



@endsection
