@extends('frontend.layouts.master')
@section('title','Other Files')
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
                                <h3>Other Files</h3>
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
                                    <th class="cart-product-quantity">File</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($other_files as $key => $other_file)
                                <tr class="cart-product">
                                    <td>{{$key + 1}}</td>
                                    <td class="cart-product-price"><a href="{{url($other_file->other_files)}}">{{$other_file->title}}</a></td>
{{--                                    <td class="cart-product-quantity"><div class="product-quantity">--}}
{{--                                            <a href="#"><i class="fa fa-minus"></i></a>--}}
{{--                                            <input type="text" value="1" name="pro-qunt" readonly>--}}
{{--                                            <a href="#"><i class="fa fa-plus"></i></a>--}}
{{--                                        </div></td>--}}
                                    <td class="cart-product-total">
                                        {!! $other_file->message !!}
                                    </td>
                                    <td class="cart-product-total">
                                        <a class="btn btn-success waves-effect" href="{{url($other_file->other_files)}}"><i class="fa fa-file-pdf-o"></i></a>
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
