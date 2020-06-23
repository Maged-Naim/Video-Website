@extends('backend.layout.app')

@section('content')
 <h1>Edit a Category</h1>
  <div class="row">
      <div class="col-md-8">
        <form action="{{route('categories.update', $rows->id)}}" method="post">
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
            <div class="form-group">
              <label for="keywords">Keywords</label>
              <input type="text" class="form-control @error('keywords') is-invalid @enderror" name="keywords" value="{{$rows->meta_keywords}}">
              @error('keywords')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="desc">Description</label>
              <textarea name="desc" cols="30" rows="10" class="form-control @error('desc') is-invalid @enderror" value="">{{$rows->meta_des}}</textarea>            
              @error('desc')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>     
                  </span>
              @enderror     
            </div>
        
            <button type="submit" class="btn btn-primary">Edit</button>
            <a href="/admin/categories" class="btn btn-warning">Back</a>
          </form>
      </div>
  </div>
    
@endsection