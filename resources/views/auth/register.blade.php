@extends('frontend.layouts.master')
@section('title','Register')
@push('css')
    {{--toastr js--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <style>
        @media only screen and (max-width: 600px) {
            .register-width {
                margin: 0px;
                width: 100%!important;
            }
        }
    </style>
@endpush
@section('content')
    <section class="contact text-center" style="margin-left: 450px;">
        <div class="container">
                        <!-- .col-md-4 end -->
                        <div class="text-center register-width" style="background: #ffc527; width: 40%;">
                            <div class="row" style="padding: 80px;">
                                <h2>Register</h2>
                                <form action="{{route('customer.register')}}" method="post">
                                    @csrf
                                    <div class="col-md-12" style="width: 80%">
{{--                                        <input type="text" class="form-control mb-30" name="name" id="name" placeholder="Your Name" required/>--}}
                                        <input id="name" type="text" class="form-control mb-30 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="Your Name" autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12" style="width: 80%">
{{--                                        <input type="email" class="form-control mb-30" name="email" id="email" placeholder="Your Email" required/>--}}
                                        <input id="email" type="email" class="form-control mb-30 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Your Email" autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12" style="width: 80%">
{{--                                        <input type="text" class="form-control mb-30" name="mobile_number" id="mobile_number" placeholder="Your Phone Number" required/>--}}
                                        <input id="mobile_number" type="text" class="form-control mb-30 @error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{ old('mobile_number') }}" required placeholder="Your Phone" autocomplete="mobile_number" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12" style="width: 80%">
{{--                                        <input type="password" placeholder="Password" class="form-control mb-30 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}
                                        <input id="password" type="password" class="form-control mb-30 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
{{--                                       <input type="password" class="form-control mb-30" name="password" id="password" placeholder="Enter Password" required/>--}}
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <button type="submit" id="submit-message" class="btn btn-primary btn-black btn-block">Submit</button>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 mt-xs">
                                        <!--Alert Message-->
                                        <div id="contact-result">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- .col-md-8 end -->
                    </div>
                    <!-- .row end -->
                <!-- .col-md-12 end -->
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
