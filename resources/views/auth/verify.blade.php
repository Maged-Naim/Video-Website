@extends('layouts.app')

@section('content')
    <link href="/frontend/css/paper-kit.css?v=2.2.0" rel="stylesheet" />
    <div class="page-header" style="background-image: url('/frontend/img/login-image.jpg'); margin-top:70px;">
        <div class="container"style="margin: 60px;">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card" style="background-color: rgb(219, 147, 117)">
                        <div class="card-header"><h3>{{ __('Verify Your Email Address') }}</h3></div>

                        <div class="card-body">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif

                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }},
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" style="color: green" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>



    



@endsection
