@extends('layouts.app')

@section('title' , $cat->name)

@section('meta_keywords' , $cat->meta_keywords)

@section('meta_des' , $cat->meta_des)

@section('content')
    <div class="section section-buttons" style="margin-top: 80px;">
        <div class="container">
            <div class="title">
                <h1>{{ $cat->name }}</h1>
            </div>
            @include('frontend.shared.video-row')
        </div>
    </div>
@endsection
