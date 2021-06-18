@extends('frontend.layouts.master')
@section('title','Grihayon Limited')
@section('content')
    <section class="bg-overlay bg-overlay-gradient pb-0">
        <div class="bg-section" >
            <img src="{{asset('uploads/grihayon.jpg')}}" alt="Background"/>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="page-title title-1 text-center">
                        <div class="title-bg">
                            <h2>Grihayan Limited</h2>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li class="active">Grihayan Limited</li>
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
                                    <a href="{{route('about-us')}}">About Us</a>
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
                                <h3 style="color:#F00;">About Grihayan Limited</h3>
                            </a>
                        </div>
                        <!-- .entry-title end -->
                        <div class="entry-content text-justify">
                            <p>Grihayan limited is one of the pioneers in Digital Topography Survey, Geotechnical Investigation work (Soil Test), Consultancy & Construction in Bangladesh. Prof. Engr. Mrinal Kanti Barua founded this company. The company started its journey in 1990 on a small platform with dedicated efforts & excellence. Later it has expanded to its business with Digital Topography Survey, Geotechnical Investigation work (Soil Test), construction & consultancy. During these 24 years of service, GRIHAYAN Ltd has steadily consolidated its expertise and has completed more than 50 big projects in Bangladesh. The Team at GRIHAYAN comprises of over 30 professionals and engineers that were chosen on the basis of their excellent technical and management skill. The dedication, hard work, and experience of the Grihayan team are what make it one of the renowned firms in Digital Topography Survey, Geotechnical Investigation work (Soil Test), design & construction of Bangladesh. In this constant Grihayan limited a renowned company in Bangladesh will be the right choice who could provide all services in Digital Topography Survey, Geotechnical Investigation work (soil Test), Consultancy & Construction in Bangladesh. For your kind information Grihayan limited achieved international award ISLQ-2014(international star for leadership in quality) gold category, Paris, France for outstanding performance of innovative business establishing Bangladesh in the field of Engineering service provide on so many development projects in Bangladesh, especially digital land survey and soil investigation works</p>
                        </div>
                        <!-- .entry-content end -->
                        <!-- .entry-comments end -->
                        <div class="" style="background: #f4f4f4; padding:20px 40px; ">
                            <div class="row">
                                <div class="col-sm-12 col-md-4" >
                                    <div class="widget" style="color: #ffc527">
                                        <div class="widget-contact-icon pull-left">
                                            <i class="lnr lnr-map"></i>
                                        </div>
                                        <div class="widget-contact-info" >
                                            <p class="text-capitalize" style="color: #ffc527"> Address</p>
                                            <p class="text-capitalize font-heading" style="color: black">The Institute of Engineers Bangladesh(IEB), Auditorium,1st Floor,S.S.khaled Road Lalkhan Bazar, Chittagong, Bangladesh</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- .widget end -->
                                <div class="col-sm-12 col-md-4" >
                                    <div class="widget" style="color: #ffc527">
                                        <div class="widget-contact-icon pull-left">
                                            <i class="lnr lnr-envelope"></i>
                                        </div>
                                        <div class="widget-contact-info">
                                            <p class="text-capitalize" style="color: #ffc527">email</p>
                                            <p class="text-capitalize font-heading" style="color: black">pulak@grihayanbd.com</p>
                                            <p class="text-capitalize font-heading" style="color: black">grihayan@grihayanbd.com</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- .widget end -->
                                {{--                        <div class="clearfix">--}}
                                {{--                        </div>--}}
                                <div class="col-sm-12 col-md-4" >
                                    <div class="widget" style="color: #ffc527">
                                        <div class="widget-contact-icon pull-left">
                                            <i class="lnr lnr-phone"></i>
                                        </div>
                                        <div class="widget-contact-info">
                                            <p class="text-capitalize" style="color: #ffc527">Phone</p>
                                            <p class="text-capitalize font-heading" style="color: black">+88031-613011</p>
                                            <p class="text-capitalize font-heading" style="color: black">+8801755608365</p>
                                            <p class="text-capitalize font-heading" style="color: black">+8801856413378</p>
                                            <p class="text-capitalize font-heading" style="color: black">+8801996965866</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4" >
                                    <div class="widget" style="color: #ffc527">
                                        <div class="widget-contact-icon pull-left">
                                            <i class="lnr lnr-earth"></i>
                                        </div>
                                        <div class="widget-contact-info">
                                            <p class="text-capitalize" style="color: #ffc527"> Website </p>
                                            <p class="text-capitalize font-heading" ><a href="https://grihayanbd.com" style="color: black">grihayanbd.com</a></p>

                                        </div>
                                    </div>
                                </div>
                            </div>
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
