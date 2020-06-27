@extends('layouts.app')

@section('title' , $video->name)

@section('meta_keywords' , $video->meta_keywords)

@section('meta_des' , $video->meta_des)

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/frontend/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/frontend/css/paper-kit.css?v=2.2.0" rel="stylesheet" />
     
</head> 
<body>

    <div class="section section-buttons" >
        <div class="container">
            <div class="title">
                <h1>{{ $video->name}}</h1>
            </div>
 
            <div class="row">
                <div class="col-md-12">
                        {{-- @php $url = getYoutubeId($video->youtube) @endphp
                        @if($url)
                            <iframe class="embed-responsive-item" width="100%" height="500" src="https://www.youtube.com/embed/{{ $url }}"
                                    style="margin-bottom: 20px" frameborder="0" allowfullscreen></iframe>
                        @endif --}}


                        <video width="90%" height="500" controls >
                            <source src="{{'/uploads/videos/'.$video->video}}" type="video/mp4"/>               
                        </video>
                
                        <div class="row">
                
                            <form method="POST"   target="frame" action="{{ route('front.like' , ['id' => $video->id]) }}"> 
                                @csrf       
                                <div class="interaction"> 
                                    
                                        <button id="thumbupbtn" type="submit" style="background-color: white; border: none;" onclick="submitButtonStyleUp(this)" class="btn btn-default" id="like">  
                                            @if ($video->likes == 1)
                                                <i id="thumbup" class="fa fa-thumbs-up" style="font-size: 30px; color: blue;"></i>                                                                           
                                            @else
                                                <i id="thumbup" class="fa fa-thumbs-up" style="font-size: 30px; color: black;"></i>                                                               
                                            @endif  
                                        </button>
                                    <yt-formatted-string id="text" class="style-scope ytd-toggle-button-renderer style-text" aria-label="likes">{{$video->likes()->where(['liked' => '1'])->count()}} </yt-formatted-string>                                   
                                </div>      
                            </form>
                        
                            <form method="POST" target="frame" action="{{ route('front.dislike' , ['id' => $video->id]) }}" >
                                @csrf
                                @method('DELETE')
                                <div class="flex items-center mr-4">     
                                    <button id="thumbdownbtn" type="submit" style="background-color: white; border: none;"  onclick="submitButtonStyleDown(this)" class="btn btn-default" id="button" >
                                        @if ($video->likes === 0)
                                            <i id="thumbdown" class="fa fa-thumbs-down" style="font-size:30px; color: blue;"></i>                                
                                        @else
                                            <i id="thumbdown" class="fa fa-thumbs-down" style="font-size:30px; color: black;"></i>              
                                        @endif
                                    </button>
                                    <yt-formatted-string id="text" class="style-scope ytd-toggle-button-renderer style-text" aria-label="likes">{{$video->likes()->where(['liked' => '0'])->count()}} </yt-formatted-string>
                                             

                                </div>      
                            
                            </form>
                        
                        </div>
    
                </div>
   
           
            
        
       
            <div class="row" style="margin-left: 10px;">
                <div class="col-md-6">
                    <p>
                        <span style="margin-right: 20px">
                            <i class="fas fa-user-alt"></i> : {{ $video->user->name }}
                        </span><br>
                        <span style="margin-right: 20px">
                            <i class="nc-icon nc-calendar-60"></i> :  {{ $video->created_at->format('Y.m.d') }}
                        </span><br>
                        <span style="margin-right: 20px">
                            <i class="far fa-folder"></i> :    <a
                                    href="{{ route('front.category' , ['id' => $video->cat->id ]) }}">
                            {{ $video->cat->name }}
                        </a>
                        </span>
                    </p><br>
                 
                    <span style="margin-right: 10px"><h4>
                            <i class="fas fa-pen"></i>
                            <i class="fas fa-quote-left"></i>                       
                            {{ $video->des }}
                            <i class="fas fa-quote-right"></i>
                        </h4></span>
                    
                </div>
                <div class="col-md-3">
                    <h6>Tags</h6>
                    <p>
                        @foreach($video->tags as $tag)
                            <a href="{{ route('front.tags' , ['id' => $tag->id]) }}">
                                <span class="badge badge-pill badge-primary">{{ $tag->name }}</span>
                            </a>
                        @endforeach
                    </p>
                </div>
                <div class="col-md-3">
                    <h6>Skills</h6>
                    <p>
                        @foreach($video->skills as $skill)
                            <a href="{{ route('front.skill' , ['id' => $skill->id]) }}">
                                <span class="badge badge-pill badge-info">{{ $skill->name }}</span>
                            </a>
                        @endforeach
                    </p>
                </div>
            </div>

            
            
       
            
        </div>
        
            @include('frontend.video.comments')
            @include('frontend.video.create-comment') 
    </div>
     
<script>
  function submitButtonStyleUp(_this) {

       document.getElementById("thumbupbtn").innerHTML = '<i  class="fa fa-thumbs-up" style="font-size:28px; color: blue;"></i>'
       document.getElementById("thumbdownbtn").innerHTML = '<i  class="fa fa-thumbs-down" style="font-size:28px; color: black;"></i>'
        
    }
   function submitButtonStyleDown(_this) {

      document.getElementById("thumbdownbtn").innerHTML = '<i  class="fa fa-thumbs-down" style="font-size:28px; color: blue;"></i>'
      document.getElementById("thumbupbtn").innerHTML = '<i  class="fa fa-thumbs-up" style="font-size:28px; color: black;"></i>'

    }

</script> 
<iframe name="frame" style="display: none;"></iframe>

<script src="frontend/js/core/jquery.min.js" type="text/javascript"></script>
<script src="frontend/js/core/popper.min.js" type="text/javascript"></script>
<script src="frontend/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="frontend/js/paper-kit.js?v=2.2.0" type="text/javascript"></script>
</body>
</html>  

@endsection

