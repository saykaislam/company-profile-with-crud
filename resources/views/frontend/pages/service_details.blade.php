@extends('frontend.layouts.master')
@section('title')
    @if(!empty($service->meta_title))
        {{$service->meta_title}}
    @else
        {{$service->title}}
    @endif
@endsection

@push('css')
@endpush

@section('meta')
    @if(!empty($service->meta_title))
        <meta name="meta_title" content="{{$service->meta_title}}"/>
    @endif
    @if(!empty($service->meta_description))
        <meta name="meta_description" content="{{ $service->meta_description }}"/>
    @endif
@endsection

@section('content')
    <section class="bg-overlay bg-overlay-gradient pb-0">
        <div class="bg-section" >
            <img src="{{asset('uploads/service/'.$service->image)}}" alt="Background"/>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="page-title title-1 text-center">
                        <div class="title-bg">
                            <h2>{{ $service->title }}</h2>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li>
                                <a href="#">services</a>
                            </li>
                            <li class="active">{{ $service->title }}</li>
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

    <!-- Services
    ============================================= -->
    <section class="single-service">
        <div class="container">
            <div class="row">
                <div class="sidebar sidebar-services col-xs-12 col-sm-12 col-md-3">

                    <!-- Categories
                    ============================================= -->
                    <div class="widget widget-categories">
                        <div class="widget-content">
                            <ul class="list-unstyled">
                                <li class="active">
                                    <a href="#">Our services</a>
                                </li>
                                @foreach($services as $serv)
                                <li>
                                    <a href="{{route('service_details',$serv->slug)}}">{{ $serv->title }}</a>
                                </li>
                                @endforeach
                                <li>
                                    <a href="{{route('services')}}">More</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                        <!-- Equipments
                        ============================================= -->
                        <div class="widget widget-categories">
                            <div class="widget-content">
                                <ul class="list-unstyled">
                                    <li class="active">
                                        <a href="#">Our Equipments</a>
                                    </li>
                                    @foreach($equipments as $equipment)
                                        <li>
                                            <a href="{{route('equipment_details',$equipment->slug)}}">{{ $equipment->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    <!-- Projects
                        ============================================= -->
                    <div class="widget widget-categories">
                        <div class="widget-content">
                            <ul class="list-unstyled">
                                <li class="active">
                                    <a href="#">Our Projects</a>
                                </li>
                                @foreach($projects as $project)
                                    <li>
                                        <a href="{{route('project_details',$project->slug)}}">{!! Str::limit($project->title, 25) !!}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Download
                    ============================================= -->
{{--                    <div class="widget widget-download">--}}
{{--                        <div class="widget-title">--}}
{{--                            <h3>Download Brochures</h3>--}}
{{--                        </div>--}}
{{--                        <div class="widget-content">--}}
{{--                            <div class="download download-pdf">--}}
{{--                                <a href="#">--}}
{{--                                    <div class="download-desc">--}}
{{--                                        <div class="download-desc-icon">--}}
{{--                                            <img src="{{asset('frontend/assets/images/sidebar/1.png')}}" alt="icon"/>--}}
{{--                                        </div>--}}
{{--                                        <h4>Download.pdf</h4>--}}
{{--                                    </div>--}}
{{--                                    <div class="download-icon">--}}
{{--                                        <i class="fa fa-download"></i>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <!-- .download-pdf end -->--}}

{{--                            <div class="download download-doc">--}}
{{--                                <a href="#">--}}
{{--                                    <div class="download-desc">--}}
{{--                                        <div class="download-desc-icon">--}}
{{--                                            <img src="{{asset('frontend/assets/images/sidebar/2.png')}}" alt="icon"/>--}}
{{--                                        </div>--}}
{{--                                        <h4>Download.doc</h4>--}}
{{--                                    </div>--}}
{{--                                    <div class="download-icon">--}}
{{--                                        <i class="fa fa-download"></i>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <!-- .download-pdf end -->--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <!-- .sidebar end -->
                <div class="col-xs-12 col-sm-12 col-md-9">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
{{--                            <div class="service-img">--}}
{{--                                <img src="{{asset('uploads/service/thambnails/'.$service->pro_image)}}" alt="service"/>--}}
{{--                            </div>--}}
                            <div class="service-title">
                                <h3>{{ $service->title }}</h3>
                            </div>
                            <div class="service-content">
                                <div class="text-justify">
                                   <p>{!! $service->description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .row end -->
                </div>
                <!-- .col-md-9 end -->
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
@endsection
