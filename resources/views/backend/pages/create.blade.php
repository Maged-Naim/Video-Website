@extends('backend.layout.app')

@section('content')
 <h1>Create Pages</h1>
  <div class="row">
      <div class="col-md-12">
        <form action="{{route('pages.store')}}" method="POST">
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
                <label for="meta_des">Meta Description</label>
                <input type="text" class="form-control @error('meta_des') is-invalid @enderror" name="meta_des">
                @error('meta_des')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                      @enderror
            </div>

            
            <div class="form-group">
              <label for="des">Description</label>
              <textarea name="des" id="" cols="30" rows="10" class="form-control @error('des') is-invalid @enderror"></textarea>            
              @error('des')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
                   @enderror
            </div>
        
            <button type="submit" class="btn btn-primary">Add</button>
            <a href="/admin/pages" type="button" class="btn btn-warning " >Back</a>                                

          </form>
      </div>
  </div>
    
@endsection