@extends('layouts.app')

@section('title' , $skill->name)

@section('content')
   <!DOCTYPE html>
   <html lang="en">
    <head>
        <title>MEGOTUPE</title>   
        <link href="/frontend/css/bootstrap.min.css" rel="stylesheet" />
        <link href="/frontend/css/paper-kit.css?v=2.2.0" rel="stylesheet" />
        <script src="/frontend/js/core/jquery.min.js" type="text/javascript"></script>
        <script src="/frontend/js/core/popper.min.js" type="text/javascript"></script>
        <script src="/frontend/js/core/bootstrap.min.js" type="text/javascript"></script>
      </head> 
   <body>
        <div class="section section-buttons">
            <div class="container">
                <div class="title">
                    <h1>{{ $skill->name }}</h1>
                </div>
                @include('frontend.shared.video-row')
            </div>
        </div>
   </body>

   </html>
   
@endsection
