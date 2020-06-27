@extends('layouts.app')

@section('title' , $pages->name)
@section('meta_keywords' , $pages->meta_keywords)
@section('meta_des' , $pages->meta_des)

@section('content')
<!DOCTYPE html>
    <html lang="en">
        <head>
            <link href="/frontend/css/bootstrap.min.css" rel="stylesheet" />
            <link href="/frontend/css/paper-kit.css?v=2.2.0" rel="stylesheet" />
            
        </head>
        <body>
            <div class="wrapper" style="margin-top: 105px">
                    <div class="section section-header">
                                <div class="points">
                                    <div class="point point-floating-1"></div> 
                                    <div class="point point-floating-2"></div> 
                                    <div class="point point-floating-3"></div> 
                                    <div class="point point-floating-4"></div> 
                                    <div class="point point-floating-5"></div>
                                    <div class="point point-floating-6"></div>
                                    <div class="point point-floating-7"></div>
                                    <div class="point point-floating-8"></div>
                                    <div class="point point-floating-9"></div> 
                                </div> 
                                <div class="container"> <div class="row">
                                    <div class="col-md-6 text-left col-z-index">
                                        <h1 class="title">{{ $pages->name }}</h1> 
                                        <h4 class="desc">{{$pages->des}}</h4>
                                    </div>
                                    <div class="col-md-6"> 
                                        <img src="https://s3.amazonaws.com/creativetim_bucket/tim_static_images/presentation-page/illustration.jpg" class="illustration" style="width: 670px; height: 480px;"> 
                                    </div>    
                                </div>
                    </div>
            </div>
        </body>
        <script src="frontend/js/core/jquery.min.js" type="text/javascript"></script>
        <script src="frontend/js/core/popper.min.js" type="text/javascript"></script>
        <script src="frontend/js/core/bootstrap.min.js" type="text/javascript"></script>
        <script src="frontend/js/paper-kit.js?v=2.2.0" type="text/javascript"></script>
    </html>
   
@endsection
