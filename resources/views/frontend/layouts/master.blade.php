<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Document Meta
    ============================================= -->
    @php
        //echo  $base_url = URL::to('/');;
          $current_url =  URL::current();
          $settings = \App\Setting::first();

    @endphp
    <meta charset="utf-8">
    <title> @yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--IE Compatibility Meta-->
    <meta name="author" content="wplly" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
{{--    <link href="{{asset('frontend/assets/images/favicon/favicon.ico')}}" rel="icon">--}}

    @if(Request::is('/') == $current_url)
        <meta name="description" content="{{$settings->meta_description}}"/>
        <meta name="title" content="{{$settings->meta_title}}"/>
        <meta name="google-site-verification" content="plm2CnscBNht2EEkgCvkN-TUPSAL60K6SLR1MGBeOiw" />
    @else
        @yield('meta')
    @endif
{{--    <meta name="google-site-verification" content="5vY_vdcnZXNIDMviZsLlNhewgdKZN9wZ_40lPMoOjFg" />--}}

    <!-- Fonts
    ============================================= -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CRaleway:100,200,300,400,500,600,700,800%7CDroid+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

    <!-- Stylesheets
    ============================================= -->
    <link href="{{asset('frontend/assets/css/external.css')}}" rel="stylesheet">
    <!-- Extrnal CSS -->
    <link href="{{asset('frontend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Boostrap Core CSS -->
    <link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet">
    <!-- Style CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="{{asset('frontend/assets/js/html5shiv.js')}}"></script>
    <script src="{{asset('frontend/assets/js/respond.min.js')}}"></script>
    <![endif]-->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TTBM7EWPPP"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-TTBM7EWPPP');
    </script>

    @stack('css')
</head>
<body>
<div class="preloader">
    <div class="spinner">
        <div class="bounce1">
        </div>
        <div class="bounce2">
        </div>
        <div class="bounce3">
        </div>
    </div>
</div>
@include('frontend.includes.header')

@yield('content')

<!-- Hero #2
============================================= -->

<!-- #clients end-->

@include('frontend.includes.footer')

<!-- Footer Scripts
============================================= -->
<script src="{{asset('frontend/assets/js/jquery-2.1.1.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/pluginse209.js?v=1.0.0')}}"></script>
<script src="{{asset('frontend/assets/js/functions5438.js?v=1.2.0')}}"></script>
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
@stack('js')
</body>

</html>
