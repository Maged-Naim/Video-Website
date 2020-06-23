@extends('backend.layout.app')

@section('content')
 <h1>Edit a Message</h1>
  <div class="row">
      <div class="col-md-8">
        <form action="#" method="POST">
            

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$rows->name}}" placeholder="Name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email"  value="{{$rows->email}}" class="form-control @error('email') is-invalid @enderror" name="email">
              @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
                    @enderror
            </div>
            
            
            <div class="form-group">
              <label for="message">Message</label>
              <textarea name="message" id="" cols="30" rows="10" class="form-control @error('message') is-invalid @enderror">{{$rows->message}}</textarea>            
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