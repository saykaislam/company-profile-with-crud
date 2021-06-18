@extends('frontend.layouts.master')
@section('title','Customer Profile')
@section('content')
    <section class="single-post">
        <div class="container">
            <div class="row">
                <div class="sidebar col-xs-12 col-sm-12 col-md-3">
                    @include('frontend.customer.customer_sidebar')
                </div>
                <!-- sidebar end -->

                <div class="col-xs-12 col-sm-12 col-md-9">
                    <div class="row">
                        <!-- .entry-meta end -->
                        <div class="entry-title text-center">
                            <a href="#">
                                <h3>Profile</h3>
                            </a>
                        </div>
                        <!-- .entry-title end -->
                        <form action="{{route('customer.profile.update')}}" method="post" enctype="multipart/form-data" style="padding-top: 70px;">
                            @csrf
                            <div class="col-md-6">
                                <label>Name </label>
                                <input type="text" class="form-control mb-30" name="name" id="name" placeholder="Your Name" value="{{Auth::user()->name}}" required/>
                            </div>
                            <div class="col-md-6">
                                <label>Email </label>
                                <input type="email" class="form-control mb-30" name="email" id="email" placeholder="Your Email" value="{{Auth::user()->email}}" required/>
                            </div>
                            <div class="col-md-6">
                                <label>Phone </label>
                                <input type="text" class="form-control mb-30" name="mobile_number" id="mobile_number" placeholder="Telephone" value="{{Auth::user()->mobile_number}}" required/>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Profile Image </label>
                                    <input type="file"  name="image" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" id="submit-message" class="btn btn-primary btn-black btn-block">Update</button>
                            </div>
{{--                            <div class="col-xs-12 col-sm-12 col-md-12 mt-xs">--}}
{{--                                <!--Alert Message-->--}}
{{--                                <div id="contact-result">--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </form>
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
