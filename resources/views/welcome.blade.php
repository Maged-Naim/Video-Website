@extends('layouts.app')
@section('title', 'Main')

@section('content')
   {{-- Slide Image --}}
      <!DOCTYPE html>
      <html lang="en">
      <head>

        <title>Welcome</title>
        <script src="/frontend/js/core/jquery.min.js" type="text/javascript"></script>
        <script src="/frontend/js/core/popper.min.js" type="text/javascript"></script>
        <script src="/frontend/js/core/bootstrap.min.js" type="text/javascript"></script>
        <link href="/frontend/css/bootstrap.min.css" rel="stylesheet" />
        <link href="/frontend/css/paper-kit.css?v=2.2.0" rel="stylesheet" />
      </head>
      <body>
        

      
        <div class="page-header section-dark" style="background-image: url('frontend/img/antoine-barres.jpg')">
          <div class="filter"></div>
          <div class="content-center">
            <div class="container">
              <div class="title-brand">
                <h1 class="presentation-title">MEGOTUPE </h1>
                
              </div>
              <h2 class="presentation-subtitle text-center">Enjoy your Time with MEGOTUPE! </h2>
            </div>
          </div>
          <div class="moving-clouds" style="background-image: url('frontend/img/clouds.png'); "></div>
            </a>
          </h6>
        </div> 
        
        {{-- latest videeos section --}}
      
        <div class="section text-center">
          <div class="container">
            <div class="row">
              <div class="col-md-8 ml-auto mr-auto">
                <h2 class="title">Latest Videos</h2>
                <h5 class="description">Here you will  Find Latest Videos in All Fields.</h5>
              </div>
            </div>
            <br>
              @include('frontend.shared.video-row')
            <br>
            <a href="{{route('home')}}" class="btn btn-danger btn-round">See More</a>
          </div>
        </div>
          

        {{-- Statistics --}}

        <div class="section section-dark text-center" style="height: 350px;">
          <div class="container">
            <h1 class="title" style="font-size: 65px; margin-top:0px;">Our Numbers</h1>
            <div class="row">
              <div class="col-md-4">
                <div class="card card-plain" style="margin-bottom: 70px;">
                  <div class="card-body">
                      <div class="author">
                        <h1 class="card-title" style="font-size: 60px;">{{$videos_count}}</h1>
                        <h3 class="card-category">Videos</h3>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card card-plain">
                  <div class="card-body">
                      <div class="author">
                        <h1 class="card-title" style="font-size: 60px;">{{$cat_count}}</h1>
                        <h3 class="card-category">Category</h3>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card  card-plain">
                  <div class="card-body">
                      <div class="author">
                        <h1 class="card-title" style="font-size: 60px;">{{$skills_count}}</h1>
                        <h3 class="card-category">Skills</h3>
                      </div>              
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        








        {{-- Contact us section  --}}
        
        <br><br>

        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="text-center">Keep in touch?</h2>
            <form class="contact-form" action="{{ route('contact.store') }}">
          
              <div class="row">
                <div class="col-md-6">
                  <label>Name</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="nc-icon nc-single-02"></i>
                      </span>
                    </div>
                    @php $input = 'name' @endphp
                    <input type="text" name="{{$input}}" class="form-control @error($input) is-invalid @enderror" placeholder="Name" required>
                    @error($input)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <label>Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="nc-icon nc-email-85"></i>
                      </span>
                    </div>
                  @php $input = 'email' @endphp
                    <input type="email" name="{{$input}}" class="form-control @error($input) is-invalid @enderror" placeholder="Email" required>
                    @error($input)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
              </div>
              <label>Message</label>
              @php $input = 'message' @endphp
              <textarea  name="{{$input}}" class="form-control @error($input) is-invalid @enderror" rows="4" placeholder="Tell us your thoughts and feelings..." required></textarea>
              @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              <div class="row">
                <div class="col-md-4 ml-auto mr-auto">
                  <button class="btn btn-danger btn-lg btn-fill">Send Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
     

      </body>
    </html>
@endsection
