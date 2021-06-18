@extends('frontend.layouts.master')
@section('title','Team')
@section('content')
    <section class="bg-overlay bg-overlay-gradient pb-0">
        <div class="bg-section" >
            <img src="{{asset('frontend/assets/images/page-title/6.jpg')}}" alt="Background"/>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="page-title title-1 text-center">
                        <div class="title-bg">
                            <h2>Our team</h2>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li>
                                <a href="#">about us</a>
                            </li>
                            <li class="active">team</li>
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
    <section id="team" class="team pb-0">
        <div class="container">
            <div class="row">

                <!-- Member #1 -->
                @foreach($teams as $team)
                <div class="col-xs-12 col-sm-6 col-md-3 member">
                    <div class="member-img">
                        <img src="{{asset('uploads/staff/'.$team->image)}}" alt="member"/>
                        <div class="member-bg">
                        </div>
{{--                        <div class="member-overlay">--}}
{{--                            <a href="#"><i class="fa fa-facebook"></i></a>--}}
{{--                            <a href="#"><i class="fa fa-twitter"></i></a>--}}
{{--                            <a href="#"><i class="fa fa-linkedin"></i></a>--}}
{{--                        </div>--}}
                    </div>
                    <!-- .member-img end -->
                    <div class="member-bio">
                        <h3>{{$team->name}}</h3>
                        <p>{{$team->designation_title}}</p>
                    </div>
                    <!-- .member-bio end -->
                </div>
            @endforeach
                <!-- .member end -->
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
@endsection
