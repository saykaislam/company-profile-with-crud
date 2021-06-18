@extends('frontend.layouts.master')
@section('title','Gallery')
@push('css')
    <!-- Add fancyBox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" type="text/css" media="screen" />
    <style>
        .gallery {
            display: inline-block;
            text-align: center;
            margin: 10px auto;
            clear: both;
            padding: 10px;
            /*background-color: #ccc;*/
            border-radius: 5px;
        }

        .gallery img { /* thumbnails */
            width: 400px;
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
    <section class="bg-overlay bg-overlay-gradient pb-0" style="height: 200px;">
        <div class="bg-section" >
            <img src="{{asset('frontend/assets/images/page-title/2.jpg')}}" alt="Background"/>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="page-title title-1 text-center" style="margin-top: -150px;">
                        <div class="title-bg">
                            <h2>Gallery</h2>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li class="active">Gallery</li>
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
    <section id="projects" class="projects-fullwidth projects-4col" style="padding-top: 20px;">
        <div class="container-fluid">
            <div class="row">
                <!-- Projects Filter
                ============================================= -->
                <div class="col-xs-12 col-sm-12 col-md-12 projects-filter">
                    <ul class="list-inline">
                        <li>
                            <a class="active-filter" href="#" data-filter="*">All Photo</a>
                        </li>
                    </ul>
                </div>
                <!-- .projects-filter end -->
            </div>
            <!-- .row end -->

            <!-- Projects Item
            ============================================= -->
            <div id="projects-all" class="row">

                <!-- Project Item #1 -->
                @foreach($galleries as $gallery)
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="gallery">
{{--                        <h5 style="color: #008343">{{$gallery->title}}</h5>--}}
                        <a href="{{url($gallery->image)}}"><img src="{{url($gallery->image)}}" alt="" width="400" height="300"></a>
                        <h5 style="color: #008343; padding-top: 5px;">{{$gallery->title}}</h5>
                    </div>

                </div>
            @endforeach
                <!-- .project-item end -->
            </div>
            <!-- .row end -->
        </div>
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

