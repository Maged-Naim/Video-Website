@extends('backend.layout.app')

@section('content')
 <h1>Edit a video</h1>
 
        <div class="float-sm-right">
            {{-- @php $url = getYoutubeId($rows->youtube) @endphp
            @if($url)
            <iframe width="250"  src="https://www.youtube.com/embed/{{$url}}" frameborder="0"  allowfullscreen></iframe>       
            @endif --}}
            <video width="250"  controls>
                <source src="{{'/uploads/videos/'.$rows->video}}" type="video/mp4">
                      Your browser does not support the video tag.
            </video>
        </div>

        <div class="row">
            <div class="col-md-12">
                
                <div class="float-sm-right">
                    <img src="{{url('uploads/'.$rows->image)}}" width="200">
                </div>

                <form action="{{route('videos.update', $rows->id)}}" method="post" enctype="multipart/form-data">
                    @method('PATCH')     
                    @csrf

                    <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"  value="{{$rows->name}}" name="name" placeholder="Name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    

                    @php $input = "meta_keywords"; @endphp
                    <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Meta keywords</label>
                            <input type="text" name="{{$input}}" 
                                class="form-control @error($input) is-invalid @enderror"  value="{{$rows->meta_keywords}}">
                            @error($input)
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
                    

                    <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label for="keywords">Youtube</label>
                                <input type="url" class="form-control @error('keywords') is-invalid @enderror" name="youtube" value="{{$rows->youtube}}">
                                @error('youtube')
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
                                    <option value="{{ $skill->id }}" {{ in_array( $skill->id, $selectedSkills) ? 'selected' : '' }}>{{ $skill->name }}</option>
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
                                    <option value="{{ $tag->id }}"  {{ in_array( $tag->id, $selectedTags) ? 'selected' : '' }}>{{ $tag->name }}</option>
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
                        
                                <label for="meta_des">Meta Description</label>
                                <input type="text" class="form-control @error('meta_des') is-invalid @enderror" value="{{$rows->meta_des}}" name="meta_des">
                                @error('meta_des')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                            </div>
                    </div>
                    

                    <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                    
                            <label for="des">Description</label>
                            <textarea name="des" id="" cols="30" rows="10"  class="form-control @error('des') is-invalid @enderror">{{$rows->des}}</textarea>            
                            @error('des')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                        </div>
                    </div>
                
                
                
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <a href="/admin/videos" class="btn btn-warning">Back</a>
                </form>
                 
            </div>
        </div>
  
  @include('backend.comments.create')     
  @include('backend.comments.index')
    
@endsection