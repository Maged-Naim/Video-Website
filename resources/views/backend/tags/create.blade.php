@extends('backend.layout.app')

@section('content')
 <h1>Create Tags</h1>
  <div class="row">
      <div class="col-md-12">
        <form action="{{route('tags.store')}}" method="post">
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
        
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/admin/tags" type="button" class="btn btn-warning " >Back</a>                                

          </form>
      </div>
  </div>
    
@endsection