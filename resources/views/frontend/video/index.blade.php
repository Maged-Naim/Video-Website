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
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script type="text/javascript" src="jquery.form.js"></script>
     
</head>
<body>

    <div class="section " style="margin-top: 100px;">
        <div class="container">
            <div class="title">
                <h1>{{ $video->name}}</h1>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @php $url = getYoutubeId($video->youtube) @endphp
                    @if($url)
                        <iframe class="embed-responsive-item" width="100%" height="500" src="https://www.youtube.com/embed/{{ $url }}"
                                style="margin-bottom: 20px" frameborder="0" allowfullscreen></iframe>
                    @endif
                </div>
   
            {{-- ///////////////////////////////////////////////////////////////// --}}
            
            <div class="row">
                <form method="POST"   target="frame" action="{{ route('front.like' , ['id' => $video->id]) }}"> 
                    @csrf       
                    <div class="flex items-center mr-2">                    
                                <button type="submit" onclick="submitButtonStyle(this)" class="btn btn-default" id="like">    
                                            <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="true" style="{{ $video->isLikedBy($video->user) ? 'background-color:blue' : 'background-color:gray'}}; width: 40px; height: 40px;" class="style-scope yt-icon">
                                                <g class="fill-current">
                                                    <path d="M1 21h4V9H1v12zm22-11c0-1.1-.9-2-2-2h-6.31l.95-4.57.03-.32c0-.41-.17-.79-.44-1.06L14.17 1 7.59 7.59C7.22 7.95 7 8.45 7 9v10c0 1.1.9 2 2 2h9c.83 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73v-1.91l-.01-.01L23 10z" class="style-scope yt-icon"></path>
                                                </g>
                                            </svg>
                                </button> 
                    </div>      
                </form>
            
                <form method="POST" target="frame" action="{{ route('front.dislike' , ['id' => $video->id]) }}" >
                    @csrf
                    @method('DELETE')
                    <div class="flex items-center mr-4">     
                        <button type="submit"  onclick="submitButtonStyle(this)" class="btn btn-default" id="button" >
                           <svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" style="{{ $video->isDislikedBy($video->user) ? 'background-color:blue' : 'background-color:gray'}}; width: 40px; height: 40px;" class="style-scope yt-icon">
                              <g class="fill-current">
                                <path d="M15 3H6c-.83 0-1.54.5-1.84 1.22l-3.02 7.05c-.09.23-.14.47-.14.73v1.91l.01.01L1 14c0 1.1.9 2 2 2h6.31l-.95 4.57-.03.32c0 .41.17.79.44 1.06L9.83 23l6.59-6.59c.36-.36.58-.86.58-1.41V5c0-1.1-.9-2-2-2zm4 0v12h4V3h-4z" class="style-scope yt-icon"></path>
                              </g>
                           </svg>                       
                        </button>
                    </div>      
                 
                </form>
            </div>



        {{-- //////////////////////////////////////////////////////////////////// --}}
        
            <div class="row">
                <div class="col-md-6">
                    <p>
                        <span style="margin-right: 20px">
                            <i class='fas fa-user' style='font-size:24px'></i> : {{ $video->user->name }}
                        </span>
                        <span style="margin-right: 20px">
                            <i class='fas fa-calendar-alt' style='font-size:24px'></i>:  {{ $video->created_at }}
                        </span>
                        <span style="margin-right: 20px">
                            <i class='fas fa-folder' style='font-size:24px'></i>
                              <a href="{{ route('front.category' , ['id' => $video->cat->id ]) }}">
                                {{ $video->cat->name }}
                              </a>
                        </span>
                    </p>
                    <i class='fas fa-info-circle' style='font-size:24px'></i>
                    <b><i>Description</i></b>
                    <p>
                        {{ $video->des }}
                    </p>
                </div>
                <div class="col-md-3">
                    <h3>Tags</h3>
                    <p>
                        @foreach($video->tags as $tag)
                            <a href="{{ route('front.tags' , ['id' => $tag->id]) }}">
                                <h4><span class="badge badge-pill badge-primary">{{ $tag->name }}</span></h4>
                            </a>
                        @endforeach
                    </p>
                </div>
                <div class="col-md-3">
                    <h3>Skills</h3>
                    <p>
                        @foreach($video->skills as $skill)
                            <a href="{{ route('front.skill' , ['id' => $skill->id]) }}">
                                <h4><span class="badge badge-pill badge-info">{{ $skill->name }}</span></h4>
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
            
            
       
      
           @include('frontend.video.comments')
            @include('frontend.video.create-comment') 
        </div>
    </div>
     
<script>
  function submitButtonStyle(_this) {
  _this.style.backgroundColor = "blue";
}
</script> 
<iframe name="frame" style="display: none;"></iframe>
</body>
</html>  

@endsection

