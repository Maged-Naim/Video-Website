@extends('layouts.app')
@section('title', 'register')

@section('content')
<link href="/frontend/css/paper-kit.css?v=2.2.0" rel="stylesheet" />
{{-- <div class="page-header" style="background-image: url('/frontend/img/login-image.jpg'); margin-top:50px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Register') }}</div>

                        <div class="card-body" >
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-12">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-12">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-12 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div> --}}


 
   




  <div class="page-header" style="background-image: url('/frontend/img/login-image.jpg'); margin-top:70px;">
    
    <div class="container">
      <div class="row">
        <div class="col-lg-4 ml-auto mr-auto">
          <div class="card card-register">
            <h3 class="title mx-auto">Register</h3>
            <div class="card-body" >
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row" style="margin-top: 1px;">
                        <label for="name" class="col-md-8">Name</label>

                        <div class="col-md-12">
                            <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-8">Email</label>

                        <div class="col-md-12">
                            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-8">Password</label>
                        <div class="col-md-12">
                            <input id="password" placeholder="Password" type="password" class="form-control" name="password" required autocomplete="new-password"> 
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-8">Confirm Password</label>
                        <div class="col-md-12">
                            <input id="password-confirm" placeholder="retype password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div> 

                    @php $input = "image"; @endphp 
                    <div class="form-group row">
                        <label for="image" class="col-md-8">Profile Picture</label>
                        <div class="col-md-12">
                            <input id="image" type="file"  placeholder="Profile Picture" class="form-control @error($input) is-invalid @enderror"  name={{$input}} required >                              
                        </div>
                        @error($input)
                        <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                         </span>
                        @enderror
                    </div>

                    
                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-danger btn-block btn-round">
                                Register
                            </button>
                        </div>
                        <div class="forgot">
                            <a href="password/reset " class="btn btn-link btn-danger">Forgot password?</a>
                          </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
