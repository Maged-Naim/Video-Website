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
    {{-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script type="text/javascript" src="jquery.form.js"></script> --}}
     
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
                                <div class="flex items-center mr-2"> 
                                    
                                            <button id="thumbupbtn" type="submit" style="background-color: white; border: none;" onclick="submitButtonStyleUp(this)" class="btn btn-default" id="like">  
                                                @if ($video->likes == 1)
                                                    <i id="thumbup" class="fa fa-thumbs-up" style="font-size: 30px; color: blue;"></i>                                                                           
                                                @else
                                                    <i id="thumbup" class="fa fa-thumbs-up" style="font-size: 30px; color: black;"></i>                                                               
                                                @endif  
                                            </button> 
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
            {{-- <br><br>
            <div class="p-4 mb-3 bg-info text-white" style="margin-bottom: 1rem" id="comments">
               
                    <div class="card text-left">
                        <div class="card-header card-header-rose">
                            @php $comments = $video->comments  @endphp
                            <h2><span  class="badge badge-info">Comments({{count($comments)}})</span></h2>
                        </div>
                        <div class="card-body">
                            @foreach ($comments as $comment)
                               <div class="row">
            
                                <div class="col-md-12">
                                    <h3>
                                        <a href="{{ route('front.profile' , ['id' => $comment->user->id , 'slug' => slug($comment->user->name)]) }}">
                                            {{ $comment->user->name }}
                                        </a>
                                 </h3>
                                </div>
                                    
                                   <div class="col-md-4 text-right">
                                       <span>
                                        <i class="nc-icon nc-calendar-60"></i> : 
                                           {{ $comment->created_at }}
                                       </span>
                                      
                                   </div>
                               </div>
                                  <h6> <span class="badge badge-pill badge-light">{{ $comment->comment}}</span></h6>
                                  @if (auth()->user())
                                  @if (auth()->user()->group == 'admin' || auth()->user()->id == $comment->user->id)
                                  @endif
                                  <a id="edit" href="" onclick="$(this).next('div').slideToggle(1000);  return false;">edit</a>  
                                  <div style="display: none;">
                                      <form action="{{route('front.commentUpdate', ['id' => $comment->id])}}" method="POST">
                                        {{csrf_field()}}
                                         <div class="form-group">
                                             <textarea name="comment" class="form-control" rows="1">{{$comment->comment}}</textarea>
                                         </div>
                                          <button type="submit" class="btn btn-dark">Edit</button>
                                      </form>
                                  </div> 
                                 @endif
                                  @if (!$loop->last)
                                      <hr>
                                  @endif
                            @endforeach
                        </div>
                    </div>
                
            </div>
            <br><br>
            @if (auth()->user())

            <form  action="{{route('front.commentStore', ['id' => $video->id])}}" method="POST">
               {{csrf_field()}}
                <div class="form-group">
                    <h2><span class="badge badge-info">ADD Comment</span></h2>
                    <textarea name="comment" class="form-control" rows="3" cols="100"></textarea>
                </div>
                 <button type="submit" class="btn btn-success" >Add Comment</button>
             </form>
             @endif --}}
            
            
       
            
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
</body>
</html>  

@endsection

