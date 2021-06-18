@extends('frontend.layouts.master')
@section('title','Video Links')
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
                                <h3>Video Links</h3>
                            </a>
                        </div>
                        <!-- .entry-title end -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr class="cart-product">
                                    <th class="cart-product-item">#</th>
                                    <th class="cart-product-price">Title</th>
                                    <th class="cart-product-quantity">Message</th>
                                    <th class="cart-product-quantity">Video Links</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($video_links as $key => $video_link)
                                    <tr class="cart-product">
                                        <td>{{$key + 1}}</td>
                                        <td class="cart-product-price"><a href="{{url($video_link->url)}}">{{$video_link->title}}</a></td>
                                        <td class="cart-product-total">
                                            {!! $video_link->message !!}
                                        </td>
                                        <td class="cart-product-total">
                                            <a class="btn btn-info waves-effect" href="{{url($video_link->url)}}"><i class="fa fa-video-camera"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- .entry-content end -->
                        <!-- .entry-comments end -->
                    </div>
                    <!-- .entry end -->

                </div>
                <!-- .row end -->
                <!-- entry articles end -->

            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
@endsection
