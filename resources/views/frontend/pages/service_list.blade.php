@extends('frontend.layouts.master')
@section('title','Services')
@section('content')
{{--    <section class="bg-overlay bg-overlay-gradient pb-0">--}}
{{--        <div class="bg-section" >--}}
{{--            <img src="{{asset('frontend/assets/images/page-title/2.jpg')}}" alt="Background"/>--}}
{{--        </div>--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                    <div class="page-title title-1 text-center">--}}
{{--                        <div class="title-bg">--}}
{{--                            <h2>our services</h2>--}}
{{--                        </div>--}}
{{--                        <ol class="breadcrumb">--}}
{{--                            <li>--}}
{{--                                <a href="index.html">Home</a>--}}
{{--                            </li>--}}
{{--                            <li class="active">services</li>--}}
{{--                        </ol>--}}
{{--                    </div>--}}
{{--                    <!-- .page-title end -->--}}
{{--                </div>--}}
{{--                <!-- .col-md-12 end -->--}}
{{--            </div>--}}
{{--            <!-- .row end -->--}}
{{--        </div>--}}
{{--        <!-- .container end -->--}}
{{--    </section>--}}

    <!-- Service Block #4
    ============================================= -->
    <section class="service service-4">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                    <div class="heading heading-2 text-center">
                        <div class="heading-bg">
                            <p class="mb-0"></p>
                            <h2>our services</h2>
                        </div>
                    </div>
                    <!-- .heading end -->
                </div>
                <!-- .col-md-6 end -->

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="row">
                        <!-- Service Block #1 -->
                        @foreach($services as $service)
                            <div class="col-xs-12 col-sm-4 col-md-4 service-block">
                                <div class="service-img">
                                    <img src="{{asset('uploads/service/thambnails/'.$service->pro_image)}}" alt="service">
                                </div>
                                <div class="service-content">
                                    {{--                        <img src="{{asset('frontend/assets/images/services/icons/i32/1.png')}}" alt="icons"/>--}}
                                    <div class="">
                                        <h4><a href="{{route('service_details',$service->slug)}}">{{$service->title}}</a></h4>
                                        <p class="text-justify">{!! Str::limit($service->short_description,200) !!}</p>
                                        <a class="read-more" href="{{route('service_details',$service->slug)}}"><i class="fa fa-plus"></i>
                                            <span>read more</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    <!-- .col-md-4 end -->
                    </div>
                </div>
                <!-- .col-md-12 end -->

            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>

{{--    <!-- Call To Action #1--}}
{{--    ============================================= -->--}}
{{--    <section id="cta-1" class="cta pb-0">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                    <div class="cta-1 bg-theme">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-xs-12 col-sm-12 col-md-1 hidden-xs">--}}
{{--                                <div class="cta-img">--}}
{{--                                    <img src="{{asset('frontend/assets/images/call/cta-1.png')}}" alt="cta">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- .col-md-2 end -->--}}
{{--                            <div class="col-xs-12 col-sm-12 col-md-7 cta-devider text-center-xs">--}}
{{--                                <div class="cta-desc">--}}
{{--                                    <p>Have Any Questions !</p>--}}
{{--                                    <h5>Don’t Hesitate To Contact Us ANy Time.</h5>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- .col-md-7 end -->--}}
{{--                            <div class="col-xs-12 col-sm-12 col-md-2 pull-right pull-none-xs">--}}
{{--                                <div class="cta-action">--}}
{{--                                    <a class="btn btn-secondary" href="contact-1.html">contact us</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- .col-md-2 end -->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- .cta-1 end -->--}}
{{--                </div>--}}
{{--                <!-- .col-md-12 end -->--}}
{{--            </div>--}}
{{--            <!-- .row end -->--}}
{{--        </div>--}}
{{--        <!-- .container end -->--}}
{{--    </section>--}}
@endsection
