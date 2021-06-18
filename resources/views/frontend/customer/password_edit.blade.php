@extends('frontend.layouts.master')
@section('title','Edit Password')
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
                                <h3>Update Password</h3>
                            </a>
                        </div>
                        <!-- .entry-title end -->
                        <form action="{{route('customer.password.update')}}" method="post" style="padding-top: 70px;">
                            @csrf
                            <div class="col-md-6">
                                <label>New Password </label>
                                <input type="password" class="form-control mb-30" name="password" placeholder="Enter New Password" required/>
                            </div>
                            <div class="col-md-6">
                                <label>Confirm Password </label>
                                <input type="password" class="form-control mb-30" name="password_confirmation" placeholder="Confirm Your Password" required/>
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
