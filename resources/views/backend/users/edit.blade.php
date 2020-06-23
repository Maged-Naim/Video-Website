@extends('backend.layout.app')

@section('content')
 <h1>Edit an User</h1>
  <div class="row">
      <div class="col-md-8">
        <form action="{{route('users.update', $rows->id)}}" method="post" enctype="multipart/form-data">
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
              <label for="email">Email</label>
              <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{$rows->email}}" placeholder="Email" >
              @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
                   @enderror
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" value="{{$rows->password}}" placeholder="Password">
              @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            @php $input = "group"; @endphp            
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">group</label>
                <select name="{{$input}}" class="form-control @error($input) is-invalid @enderror">
                    <option value="admin" {{ isset($row) && $row->{$input} == 1 ? 'selected'  :'' }}>admin</option>
                    <option value="user" {{ isset($row) && $row->{$input} == 0 ? 'selected'  :'' }}>user</option>
                </select>
                @error($input)
                <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                 </span>
                @enderror
            </div>
            @php $input = "image"; @endphp 
            <div class="form-group row">
                <label for="image" class="col-md-8">Profile Picture</label>
                <div class="col-md-12">
                    <input id="image" type="file" value="{{$rows->image}}" placeholder="Profile Picture" class="form-control @error($input) is-invalid @enderror"  name={{$input}} required >                              
                </div>
                @error($input)
                <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                 </span>
                @enderror
            </div>
        
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/admin/users" class="btn btn-warning">Back</a>
          </form>
      </div>
  </div>
    
@endsection