<div class="card text-left" id="profileCard" style="margin-bottom: 70px;display: none">
    <div class="card-header">
       <h4 style="margin-top: 10px;margin-bottom: 5px">Update Profile</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
               
                @php $input = "name"; @endphp
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Username</label>
                        <input type="text" name="{{ $input }}" value="{{ isset($user) ? $user->{$input} : '' }}"
                               class="form-control @error($input) is-invalid @enderror">
                        @error($input)
                        <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                </div>
                @php $input = "email"; @endphp
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Email address</label>
                        <input type="email" name="{{$input}}" value="{{ isset($user) ? $user->{$input} : '' }}"
                               class="form-control @error($input) is-invalid @enderror">
                        @error($input)
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                 </span>
                        @enderror
                    </div>
                </div>
                @php $input = "password"; @endphp
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Password</label>
                        <input type="password" name="{{ $input }}"
                               class="form-control @error($input) is-invalid @enderror">
                        @error($input)
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                 </span>
                        @enderror
                    </div>
                </div>
                @php $input = "image"; @endphp 
                <div class="form-group row">
                    <label for="image" class="col-md-8">Profile Picture</label>
                    <div class="col-md-12">
                        <input id="image" type="file" value="{{$user->image}}" class="form-control @error($input) is-invalid @enderror"  name={{$input}} >                              
                    </div>
                    @error($input)
                    <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                     </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <button type="submit" style="margin-top: 30px" class="btn btn-info  btn-round center">Update profile</button>

                </div>
                
            </div>
        </form>
    </div>
</div>
