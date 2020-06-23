@extends('backend.layout.app')

@section('content')
 <h1>Edit a tag</h1>
  <div class="row">
      <div class="col-md-8">
        <form action="{{route('tags.update', $rows->id)}}" method="post">
            @method('PATCH')     
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{$rows->name}}" placeholder="Name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

        
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/admin/tags" class="btn btn-warning">Back</a>
          </form>
      </div>
  </div>
    
@endsection