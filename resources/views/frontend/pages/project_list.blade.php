@extends('frontend.layouts.master')
@section('title','Projects')
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
    {{--                            <h2>Our Projects</h2>--}}
    {{--                        </div>--}}
    {{--                        <ol class="breadcrumb">--}}
    {{--                            <li>--}}
    {{--                                <a href="{{url('/')}}">Home</a>--}}
    {{--                            </li>--}}
    {{--                            <li class="active">Projects</li>--}}
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

    <!-- Projects
    ============================================= -->
    <section id="projects" class="projects-grid projects-3col">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="heading heading-3 mb-0 text-center">
                        <div class="heading-bg">
                            <p class="mb-0"></p>
                            <h2>Our Projects</h2>
                        </div>
                    </div>
                    <!-- .heading end -->
                </div>
                <!-- .col-md-12 end -->
            </div>
            <!-- .row end -->
            <div class="row">

                <!-- Projects Filter
                        ============================================= -->
                <div class="col-xs-12 col-sm-12 col-md-12 projects-filter">
                    <ul class="list-inline">
                        <li>
                            <a class="active-filter" href="#" data-filter="*">All Projects</a>
                        </li>
                        @foreach($projectCat as $cat)
                            <li>
                                <a href="#" data-filter=".{{$cat->id}}">{{$cat->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- .projects-filter end -->
            </div>
            <!-- .row end -->

            <!-- Projects Item
                ============================================= -->
            <div id="projects-all" class="row">

                <!-- Project Item #1 -->
                @foreach($projects as $project)
                    <div class="col-xs-12 col-sm-6 col-md-4 project-item {{$project->category_id}}">
                        <div class="project-img">
                            <img class="" src="{{asset('uploads/project/'.$project->image)}}" alt="interior"/>
                            <div class="project-hover">
                                <div class="project-meta">
                                    <h6>{{ $project->category->name }}</h6>
                                    <h4>
                                        <a href="{{route('project_details',$project->slug)}}">{{ $project->title }}</a>
                                    </h4>
                                </div>
                                <div class="project-zoom">
                                    <a class="img-popup" href="{{asset('uploads/project/thambnails/'.$project->pro_image)}}" title="{{ $project->title }}"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                            <!-- .project-hover end -->
                        </div>
                        <!-- .project-img end -->
                    </div>
                @endforeach
            <!-- .project-item end -->

            </div>
            <!-- .row end -->

        </div>
        <!-- .container end -->

    </section>
@endsection
