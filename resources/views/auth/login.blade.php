@extends('frontend.layouts.master')
@section('title','Login')
@push('css')
    {{--toastr js--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <style>
        @media only screen and (max-width: 600px) {
            .login-width {
                margin: 0px;
                width: 100%!important;
            }
        }
    </style>
@endpush
@section('content')
    <section class="contact text-center" style="margin-left: 450px;">
        <div class="container">
            <div class="row">
{{--                <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                    <div class="heading heading-4">--}}
{{--                        <div class="heading-bg heading-right">--}}
{{--                            <p class="mb-0">We Wanna Hear From You !</p>--}}
{{--                            <h2>Login</h2>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- .heading end -->--}}
{{--                </div>--}}
                <!-- .col-md-12 end -->
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="row">

                        <!-- .col-md-4 end -->
                        <div class="col-xs-12 col-sm-12 col-md-8 text-center login-width" style="background: #ffc527; width: 40%;">
                            <div class="row" style="padding: 80px;">
                                <h2>Login</h2>
                                <form action="{{route('login')}}" method="post">
                                    @csrf
                                    <div class="col-md-12 " id="service-one" style="width: 80%">
                                        <input type="email" class="form-control mb-30 @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Your Email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12" style="width: 80%">
                                        <input type="password" placeholder="Password" class="form-control mb-30 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
{{--                                        <input type="text" class="form-control mb-30" name="contact" id="contact" placeholder="Enter Password" required/>--}}
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <button type="submit" id="submit-message" class="btn btn-primary btn-black btn-block" style="margin-bottom: 10px">Login</button>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <button type="submit" id="submit-message" class="btn btn-primary btn-black btn-block"><a href="{{route('register')}}">Register</a></button>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <!-- .col-md-8 end -->
                    </div>
                    <!-- .row end -->
                </div>
                <!-- .col-md-12 end -->
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    <script>
    @if($errors->any())
            @foreach($errors->all() as $error )
                toastr.error('{{$error}}','Error',{
        closeButton:true,
        progressBar:true
    });
    @endforeach
        @endif
    </script>
@endpush
