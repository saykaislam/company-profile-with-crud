@extends('frontend.layouts.master')
@section('title','Customer Dashboard')
@push('css')
    <!-- Add fancyBox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" type="text/css" media="screen" />
    <style>
        .gallery {
            display: inline-block;
            text-align: center;
            margin: 10px auto;
            clear: both;
            padding: 0;
            padding: 10px;
            background-color: #fff;
            border-radius: 5px;
        }

        .gallery img { /* thumbnails */
            width: 350px;
            height: 300px;
        }

        .block {
            display: inline-block;
            background-color: #ccc;
            border-radius: 5px;
            padding: 8px;
        }

        pre {
            background-color: #eee;
            border-radius: 5px;
            padding: 8px;
            clear: both;
        }

        .highlight {
            color: red;
        }

    </style>


@endpush
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
                                <h3>Images </h3>
                            </a>
                        </div>
                        <!-- .entry-title end -->
                        <div id="projects-all" class="row">

                            <!-- Project Item #1 -->
                            @forelse($customer_images as $customer)
                            <div class="col-xs-12 col-sm-6 col-md-4 project-item interior">
{{--                                <div class="project-img">--}}
{{--                                    <img class="" src="{{url($customer->image)}}" alt="interior" data-ngThumb="{{url($customer->image)}}" width="263" height="263"/>--}}
{{--                                    <div class="project-hover">--}}
{{--                                        <div class="project-zoom">--}}
{{--                                            <a class="img-popup" href="{{url($customer->image)}}" data-ngThumb="{{url($customer->image)}}"><i class="fa fa-plus"></i></a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--    --}}

{{--                                    <!-- .project-hover end -->--}}
{{--                                </div>--}}
                                    <div class="gallery">
                                        <a href="{{url($customer->image)}}"><img src="{{url($customer->image)}}" alt="" width="350" height="300" data-caption="{{$customer->title}}"></a>
                                    </div>
                                <div class="service-content">
                                    <div class="">
                                        <h4 class="text-center">{{$customer->title}}</h4>
                                        <p class="text-justify">{!! Str::limit($customer->message,150) !!}</p>
                                    </div>
                                </div>
                                <!-- .project-img end -->
                            </div>
                        @empty
                                <div class="entry-title text-center">
                                    <a href="#">
                                        <p>No Photo Added Yet!!!</p>
                                    </a>
                                </div>

                        @endforelse
                            <!-- .project-item end -->
                        </div>
                    </div>
                    <!-- .entry end -->
                </div>
                <!-- .row end -->

            </div>
            <!-- entry articles end -->

        </div>
        <!-- .row end -->
        <!-- .container end -->
    </section>
@endsection
@push('js')
    <!-- Below we include the jQuery Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            // add all to same gallery
            $(".gallery a").attr("data-fancybox","mygallery");
            // assign captions and title from alt-attributes of images:
            $(".gallery a").each(function(){
                $(this).attr("data-caption", $(this).find("img").attr("alt"));
                $(this).attr("title", $(this).find("img").attr("alt"));
            });
            // start fancybox:
            $(".gallery a").fancybox();
        });
    </script>
@endpush
