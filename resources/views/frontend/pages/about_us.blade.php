@extends('frontend.layouts.master')
@section('title','Our Company')
@section('content')
    <section class="bg-overlay bg-overlay-gradient pb-0" style="height: 200px;">
        <div class="bg-section" >
            <img src="{{asset('frontend/assets/images/page-title/8.jpg')}}" alt="Background"/>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="page-title title-1 text-center" style="margin-top: -155px;">
                        <div class="title-bg">
                            <h2>Our Company</h2>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li class="active">company</li>
                        </ol>
                    </div>
                    <!-- .page-title end -->
                </div>
                <!-- .col-md-12 end -->
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
    <section class="single-post">
        <div class="container">
            <div class="row">
                <div class="sidebar col-xs-12 col-sm-12 col-md-3">
                    <!-- Search
    ============================================= -->
{{--                    <div class="widget widget-search">--}}
{{--                        <div class="widget-content">--}}
{{--                            <form class="form-search">--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" class="form-control" placeholder="Type Your Search Words">--}}
{{--                                    <span class="input-group-btn">--}}
{{--								<button class="btn" type="button"><i class="fa fa-search"></i></button>--}}
{{--								</span>--}}
{{--                                </div>--}}
{{--                                <!-- /input-group -->--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <!-- Categories
    ============================================= -->
                    <div class="widget widget-categories">
                        <div class="widget-title">
                            <h3>Navigation</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="{{url('/')}}">Home</a>
                                </li>
                                <li>
                                    <a href="https://grihayanbd.com">Bangladeshi Partner</a>
                                </li>

                                <li>
                                    <a href="{{route('team')}}">Team</a>
                                </li>
                                <li>
                                    <a href="{{route('gallery')}}">Gallery</a>
                                </li>
                                <li>
                                    <a href="{{route('contact-us')}}">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- sidebar end -->

                <div class="col-xs-12 col-sm-12 col-md-9">
                    <div class="row">

{{--                        <!-- Entry Article #1 -->--}}
{{--                        <div class="col-xs-12 col-sm-12 col-md-12 entry">--}}
{{--                            <div class="entry-img">--}}
{{--                                <a class="img-popup" href="assets/images/blog/1.jpg">--}}
{{--                                    <img src="assets/images/blog/standard/1.jpg" alt="title"/>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <!-- .entry-img end -->--}}
{{--                            <div class="entry-meta clearfix">--}}
{{--                                <ul class="pull-left">--}}
{{--                                    <li class="entry-format">--}}
{{--                                        <i class="fa fa-paint-brush"></i>--}}
{{--                                    </li>--}}
{{--                                    <li class="entry-date">--}}
{{--                                        <span>JAN</span>--}}
{{--                                        25 </li>--}}
{{--                                </ul>--}}
{{--                                <ul class="pull-right text-right">--}}
{{--                                    <li class="entry-cat"> In:--}}
{{--                                        <span>--}}
{{--									<a href="#">Projecting</a>--}}
{{--									</span>--}}
{{--                                        <span class="entry-author">By:--}}
{{--									<a href="#">Begha</a>--}}
{{--									</span>--}}
{{--                                    </li>--}}
{{--                                    <li class="entry-no-comments"><i class="fa fa-comments"></i> 17</li>--}}
{{--                                    <li class="entry-views"><i class="fa fa-eye"></i> 40</li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
                            <!-- .entry-meta end -->
                            <div class="entry-title text-center">
                                <a href="#">
                                    <h3>About Us</h3>
                                </a>
                            </div>
                            <!-- .entry-title end -->
                            <div class="entry-content text-justify">
                                <p>UAV Survey Australia limited is one of the pioneers in Digital Topography Survey, Geotechnical Investigation work (Soil Test), Consultancy & Construction in Australia. Engr. Rajib Barua is a Chief Drone Pilot in this company. The company started its journey in 1990 on a small platform with dedicated efforts & excellence. Later it has expanded to its business with Digital Topography Survey, Geotechnical Investigation work (Soil Test), construction & consultancy. During these 24 years of service, UAV Survey Australia Ltd has steadily consolidated its expertise and has completed more than 50 big projects in Australia. The Team at UAV Survey Australia comprises of over 30 professionals and engineers that were chosen on the basis of their excellent technical and management skill. The dedication, hard work, and experience of the UAV Survey Australia team are what make it one of the renowned firms in Digital Topography Survey, Geotechnical Investigation work (Soil Test), design & construction of Australia. In this constant UAV Survey Australia limited a renowned company in Australia will be the right choice who could provide all services in Digital Topography Survey, Geotechnical Investigation work (soil Test), Consultancy & Construction in Australia. For your kind information UAV Survey Australia limited achieved international award ISLQ-2014(international star for leadership in quality) gold category, Paris, France for outstanding performance of innovative business establishing Australia in the field of Engineering service provide on so many development projects in Australia, especially digital land survey and soil investigation works</p>
                            </div>
                            <!-- .entry-content end -->
                            <!-- .entry-comments end -->
                        </div>
                        <!-- .entry end -->

                    </div>
                    <!-- .row end -->

                </div>
                <!-- entry articles end -->

            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
@endsection
