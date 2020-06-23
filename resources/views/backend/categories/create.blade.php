@extends('backend.layout.app')

@section('content')
 <h1>Create Category</h1>
  <div class="row">
      <div class="col-md-12">
        <form action="{{route('categories.store')}}" method="POST">
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
              <label for="keywords">Keywords</label>
              <input type="text" class="form-control @error('keywords') is-invalid @enderror" name="keywords">
              @error('keywords')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
                    @enderror
            </div>
            <div class="form-group">
              <label for="desc">Description</label>
              <textarea name="desc" id="" cols="30" rows="10" class="form-control @error('desc') is-invalid @enderror"></textarea>            
              @error('desc')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
                   @enderror
            </div>
        
            <button type="submit" class="btn btn-primary">Add</button>
            <a href="/admin/users" type="button" class="btn btn-warning " >Back</a>                                

          </form>
      </div>
  </div>
    
@endsection