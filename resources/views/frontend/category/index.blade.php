@extends('layouts.app')

@section('title' , $cat->name)

@section('meta_keywords' , $cat->meta_keywords)

@section('meta_des' , $cat->meta_des)

@section('content')

        <!DOCTYPE html>
        <html lang="en">
            <head>
                <link href="/frontend/css/bootstrap.min.css" rel="stylesheet" />
                <link href="/frontend/css/paper-kit.css?v=2.2.0" rel="stylesheet" />
                
            </head>
            <body>
                <div class="section section-buttons" style="margin-top: 20px;">
                    <div class="container">
                        <div class="title">
                            <h1>{{ $cat->name }}</h1>
                        </div>
                        @include('frontend.shared.video-row')
                    </div>
                </div>
            </body>
            <script src="frontend/js/core/jquery.min.js" type="text/javascript"></script>
            <script src="frontend/js/core/popper.min.js" type="text/javascript"></script>
            <script src="frontend/js/core/bootstrap.min.js" type="text/javascript"></script>
            <script src="frontend/js/paper-kit.js?v=2.2.0" type="text/javascript"></script>
        </html>
@endsection
