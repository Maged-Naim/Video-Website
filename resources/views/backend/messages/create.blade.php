@extends('backend.layout.app')

@section('content')
 <h1>Create Message</h1>
  <div class="row">
      <div class="col-md-12">
        <form action="{{route('messages.store')}}" method="POST">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">
              @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
                    @enderror
            </div>
            
            
            <div class="form-group">
              <label for="message">Message</label>
              <textarea name="message" id="" cols="30" rows="10" class="form-control @error('message') is-invalid @enderror"></textarea>            
              @error('message')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
                   @enderror
            </div>
        
            <button type="submit" class="btn btn-primary">Add</button>
            <a href="/messages" type="button" class="btn btn-warning " >Back</a>                                

          </form>
      </div>
  </div>
    
@endsection