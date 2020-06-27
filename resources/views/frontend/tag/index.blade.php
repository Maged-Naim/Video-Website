@extends('layouts.app')

@section('title' , $tag->name)

@section('content')
    <div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h1>{{ $tag->name }}</h1>
            </div>
            @include('frontend.shared.video-row')
        </div>
    </div>
    <script src="/frontend/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="/frontend/js/core/popper.min.js" type="text/javascript"></script>
    <script src="/frontend/js/core/bootstrap.min.js" type="text/javascript"></script>
@endsection
