<div class="card text-left" id="uploadvideo" style="margin-bottom: 70px;display: none">
    <h1>Upload Video</h1>

    <div class="row">
        <div class="col-md-12">
            <form action="{{route('profile.video')}}" method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}
                
                <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
    

        



                <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                    <label for="keywords">Keywords</label>
                    <input type="text" class="form-control @error('keywords') is-invalid @enderror" name="keywords">
                    @error('keywords')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                            @enderror
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                        <label for="image">Video Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                    </div>
                </div>
                
                @php $input = "video"; @endphp
                <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                        <label for="{{$input}}">Video </label>
                        <input type="file" class="form-control @error($input) is-invalid @enderror" name={{$input}}>
                        @error($input)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                    </div>
                </div>
                

      

                @php $input = "published"; @endphp
                <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Video Status</label>
                        <select name="{{$input}}" class="form-control @error($input) is-invalid @enderror">
                            <option value="1" {{ isset($row) && $row->{$input} == 1 ? 'selected'  :'' }}>published</option>
                            <option value="0" {{ isset($row) && $row->{$input} == 0 ? 'selected'  :'' }}>hidden</option>
                        </select>
                        @error($input)
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            

                @php $input = "cat_id"; @endphp
                <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Video Category</label>
                        <select name="{{$input}}" class="form-control @error($input) is-invalid @enderror">
                            @foreach($categories  as $category)
                                <option value="{{ $category->id }}" {{ isset($row) && $row->{$input} == $category->id ? 'selected'  :'' }}>{{ $category->name }}</option>
                                
                            @endforeach
                        </select>
                        @error($input)
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                
                @php $input = "skills[]"; @endphp
                <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Skills</label>
                        <select name="{{$input}}" class="form-control @error($input) is-invalid @enderror" multiple style="height: 100px">
                            @foreach($skills  as $skill)
                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                            @endforeach
                        </select>
                        @error($input)
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                @php $input = "tags[]"; @endphp
                <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Tags</label>
                        <select name="{{$input}}" class="form-control @error($input) is-invalid @enderror" multiple style="height: 100px">
                           
                            @foreach($tags  as $tag)
                                <option value="{{ $tag->id }}"  >{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error($input)
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


  
                

                <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                
                        <label for="des">Description</label>
                        <textarea name="des" id="" cols="30" rows="10" class="form-control @error('des') is-invalid @enderror"></textarea>            
                        @error('des')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                    </div>
                </div>
            
                <button type="submit" class="btn btn-primary">Add</button>
                                                

            </form>
        </div>
    </div>

</div>
    
