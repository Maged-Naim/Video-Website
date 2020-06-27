@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="/frontend/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/frontend/css/paper-kit.css?v=2.2.0" rel="stylesheet" />
</head>
<body>
    <div class="section section-buttons" class="min:height: 850px;">
        <div class="container">
            <div class="title"> 
                <h2>
                    <i class="nc-icon nc-headphones"></i>
                    More Videos
                </h2>
                @if(request()->has('search') && request()->get('search') != '')
                    <p>
                        you search about<b> {{ request()->get('search') }}</b> | 
                        <a  role="button" href="{{route('home')}}">Back</a>
                        
                    </p>                  
                @endif
    
            </div>
            <div class="row">
                @foreach ($videos as $video)   
                <div class="col-lg-4">
                    @include('frontend.shared.video-card')
                </div>
                @endforeach
           </div>
           <div class="row">
               <div class="col-md-12">
                   {{ $videos->links() }}
               </div>
           </div>
        </div>
            
       
      
        
    </div>
</body>
    <script src="/frontend/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="/frontend/js/core/popper.min.js" type="text/javascript"></script>
    <script src="/frontend/js/core/bootstrap.min.js" type="text/javascript"></script>
</html>

@endsection
