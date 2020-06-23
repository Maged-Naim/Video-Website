@extends('layouts.app')

@section('content')
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
            {{-- @else
                Sorry there is no any reasults about <h3>{{ request()->get('search') }}</h3>
                <a class="btn btn-info" role="button" href="{{route('home')}}">Back</a> --}}
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
@endsection
