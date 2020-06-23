@extends('layouts.app')

@section('title' , $pages->name)
@section('meta_keywords' , $pages->meta_keywords)
@section('meta_des' , $pages->meta_des)

@section('content')
    {{-- <div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h1>{{ $page->name }}</h1>
            </div>
            {{$page->des}}
        </div>
    </div> --}}
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



@endsection
