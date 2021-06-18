@extends('frontend.layouts.master')
@section('title')
    @php
        //echo  $base_url = URL::to('/');;
          $current_url =  URL::current();
          $settings = \App\Setting::first();
    @endphp

    @if(!empty($settings->meta_title))
        {{$settings->meta_title}}
    @else
       UAV Survey Australia
    @endif
@endsection
@section('content')
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            @foreach($sliders as $slider)
            <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
            @endforeach
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            @foreach($sliders as $slider)
            <div class="item {{ $loop->first ? 'active' : '' }}">
                <img src="{{asset('uploads/slider/'.$slider->image)}}" alt="" height="472">
                <div class="carousel-caption">
                    <h2 style="color: #008343; background: #f3f3f380;">{{$slider->title}}</h2>
                </div>
            </div>
            @endforeach
{{--            <div class="item">--}}
{{--                <img src="{{asset('frontend/assets/images/sliders/11.jpg')}}" alt="...">--}}
{{--                <div class="carousel-caption">--}}
{{--                    <h3>This is a f***ing slider</h3>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

{{--        <div id="hero-slider" class="hero-slider">--}}

{{--            <!-- Slide Item #1 -->--}}
{{--            @foreach($sliders as $slider)--}}
{{--            <div class="item">--}}
{{--                <div class="item-bg bg-overlay">--}}
{{--                    <div class="bg-section">--}}
{{--                        <img src="{{asset('uploads/slider/'.$slider->image)}}" alt="Background"/>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="container">--}}
{{--                            <div class="hero-slide">--}}
{{--                                <div class="slide-heading">--}}
{{--                                    <p>The Best Construction Company</p>--}}
{{--                                </div>--}}
{{--                                <div class="slide-title" >--}}
{{--                                    <h2 style="font-size: 28px;">{{$slider->title}}</h2>--}}
{{--                                </div>--}}
{{--                                <div class="slide-action">--}}
{{--                                    <a class="btn btn-primary" href="#">read more</a>--}}
{{--                                    <a class="btn btn-secondary pull-right" href="#">get started</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                    <!-- .row end -->--}}
{{--                </div>--}}
{{--                <!-- .container end -->--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--            <!-- .item end -->--}}
{{--        </div>--}}
{{--        <!-- #hero-slider end -->--}}
    <!-- Call To Action #2
   ============================================= -->
    <section id="cta-2" class="cta pb-0 pt-0">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="cta-2 bg-theme">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-7">
                                <div class="cta-icon">
                                    <i class="lnr lnr-apartment"></i>
                                </div>
                                <div class="cta-devider">
                                </div>
                                <div class="cta-desc">
                                    <p>Have Any Questions !</p>
                                    <h5>Don’t Hesitate To Contact Us ANy Time.</h5>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-5 cta-action text-right pull-right pull-none-xs">
                                <a class="btn btn-primary btn-white mr-sm" href="#" data-toggle="modal" data-target="#model-quote" id="modelquote">rquest a quote</a>
                                <a class="btn btn-secondary" href="{{route('contact-us')}}">contact us</a>
                                <!-- Modal -->
                                <div class="modal fade model-quote" id="model-quote" tabindex="-1" role="dialog" aria-labelledby="modelquote">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <div class="model-icon">
                                                    <i class="lnr lnr-apartment"></i>
                                                </div>
                                                <div class="model-divider">
                                                    <div class="model-title">
                                                        <p>Don’t Hesitate To ask</p>
                                                        <h6>request a quote</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- .model-header end -->
                                            <div class="modal-body">
                                                <form action="{{route('contact.store')}}" method="post">
                                                    @csrf
                                                    <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required/>
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required/>
                                                    <input type="text" class="form-control" name="contact" id="contact" placeholder="Phone" required/>
                                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required/>
                                                    <textarea class="form-control" name="message"  id="message" placeholder="Your Message" rows="2" required></textarea>
                                                    <button type="submit" class="btn btn-primary btn-black btn-block">Submit Inquiry</button>
                                                    <!--Alert Message-->
                                                    {{--                                                <div id="head-quote-result" class="mt-xs">--}}
                                                    {{--                                                </div>--}}
                                                </form>
                                            </div>
                                            <!-- .model-body end -->
                                        </div>
                                    </div>
                                </div>
                                <!-- .model-quote end -->
                            </div>
                        </div>
                    </div>
                    <!-- .cta-1 end -->
                </div>
                <!-- .col-md-12 end -->
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
    <!-- #cta-2 end -->

    <section id="shortcode-5" class="shortcode-5 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                    <div class="heading heading-2 text-center">
                        <div class="heading-bg">
                            <p class="mb-0"></p>
                            <h2>About Us</h2>
                        </div>
                        <p class="mb-0"></p>
                    </div>
                    <!-- .heading end -->
                </div>
            </div>
            <!-- .row end -->
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-5">
                    <div class="panel-group accordion" id="accordion02" role="tablist" aria-multiselectable="true">

                        <!-- Panel 01 -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" role="button" data-toggle="collapse" data-parent="#accordion02" href="#collapse02-1" aria-expanded="true" aria-controls="collapse02-1"> About UAV Survey Australia </a>
                                    <span class="icon"></span>
                                </h4>
                            </div>
                            <div id="collapse02-1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    UAV Survey Australia is one of the pioneer companies in Surveying, Geotechnical, Investigation and Construction field in Australia.
                                </div>
                            </div>
                        </div>

                        <!-- Panel 02 -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion02" href="#collapse02-2" aria-expanded="false" aria-controls="collapse02-2"> Our Mission </a>
                                </h4>
                            </div>
                            <div id="collapse02-2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    We do only what we are great on. If we tackle a project you can be 100% sure that it will be delivered right on time, within the set budget limits and at the top level. We get all our liabilities insured, including third-party liabilities, thus indemnifying our clients against all risks.
                                </div>
                            </div>
                        </div>

                        <!-- Panel 03 -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle collapsed" role="button" data-toggle="collapse" data-parent="#accordion02" href="#collapse02-3" aria-expanded="false" aria-controls="collapse02-3"> Our Goals </a>
                                </h4>
                            </div>
                            <div id="collapse02-3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    UAV Survey Australia is a leading developer of A-grade commercial,its foundation the company has doubled its turnover year on year industrial and residential projects in USA. Since its foundation the company has doubled its turnover year on year, with its staff numbers swelling accordingly.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .Accordion-->
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 hidden-xs">
                    <div class="feature">
                        <img class="img-responsive" src="{{asset('frontend/assets/images/features/drone.png')}}" alt="feature">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="feature">
                        <h4 class="text-uppercase">Reliability</h4>
                        <p>UAV Survey Australia has a cutting edge quality management system which ensures high quality standards at all sites.</p>
                    </div>
                    <div class="feature">
                        <h4 class="text-uppercase">Expertise</h4>
                        <p>We have a team of specialists capable of maximizing the result and delivering the projects of any complexity.</p>
                    </div>
                    <div class="feature last">
                        <h4 class="text-uppercase">Quality</h4>
                        <p>The control mechanism allows secure &amp; integrated monitoring of all stages of the works.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Service Block #1
    ============================================= -->
    <section id="service-1" class="service service-1">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                    <div class="heading heading-2 text-center">
                        <div class="heading-bg">
                            <p class="mb-0"></p>
                            <h2>our services</h2>
                        </div>
{{--                        <p class="mb-0 mt-md">UAV Survey Australia is a leading developer of A-grade commercial, industrial and residential projects in USA. Since its foundation the company has doubled its turnover year on year, with its staff numbers swelling accordingly.</p>--}}
                    </div>
                    <!-- .heading end -->
                </div>
                <!-- .col-md-6 end -->
            </div>
            <!-- .row end -->
            <div class="row">
                <!-- Service Block #1 -->
                @foreach($services as $service)
                <div class="col-xs-12 col-sm-4 col-md-4 service-block">
                    <div class="service-img">
                        <img src="{{asset('uploads/service/thambnails/'.$service->pro_image)}}" alt="service">
                    </div>
                    <div class="service-content">
                        <div class="">
                            <h4><a href="{{route('service_details',$service->slug)}}">{{$service->title}}</a></h4>
                            <p class="text-justify">{!! Str::limit($service->short_description,200) !!}</p>
                            <a class="read-more" href="{{route('service_details',$service->slug)}}"><i class="fa fa-plus"></i>
                                <span>read more</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
                <!-- .col-md-4 end -->

            </div>
            <!-- .row end -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <a class="btn btn-secondary mt-50" href="{{route('services')}}">All Services <i class="fa fa-plus ml-xs"></i></a>
                </div>
                <!-- .col-md-12 end -->
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>

    <!-- Projects Section
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
                                    <a class="img-popup" href="{{asset('uploads/project/thambnails/'.$project->pro_image)}}" title="New Office Room"><i class="fa fa-plus"></i></a>
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

    <!-- Shortcode #5
    ============================================= -->

    <!-- Call To Action #3
    ============================================= -->
{{--    <section id="cta-3" class="cta cta-3 bg-overlay bg-overlay-theme text-center">--}}
{{--        <div class="bg-section" >--}}
{{--            <img src="{{asset('frontend/assets/images/call/2.jpg')}}" alt="Background"/>--}}
{{--        </div>--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">--}}
{{--                    <h2>Quality Comes First</h2>--}}
{{--                    <p>Cutting-edge construction quality management system LATISTA ensures high quality standards at all of the company’s sites. The control mechanism allows integrated monitoring of works at all stages of construction and includes over 100 quality assessment benchmarks.</p>--}}
{{--                    <div class="signiture">--}}
{{--                        <img src="{{asset('frontend/assets/images/call/sign.png')}}" alt="signiture"/>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- .col-md-8 end -->--}}
{{--            </div>--}}
{{--            <!-- .row end -->--}}
{{--        </div>--}}
{{--        <!-- .container end -->--}}
{{--    </section>--}}
    <!-- #cta-3 end -->

    <!-- Shortcode #8
    ============================================= -->
    <section id="shortcode-8" class="shortcode-8 pb-0 pb-60-sm">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="heading heading-2 mb-0 text-center">
                        <div class="heading-bg">
                            <p class="mb-0"></p>
                            <h2>Why US?</h2>
                        </div>
                    </div>
                    <!-- .heading end -->
                </div>
            </div>
            <!-- .row end -->
            <div class="clearfix mb-50">
            </div>
            <div class="row">
                <!-- .col-md-12 end -->
                <div class="col-xs-12 col-sm-6 col-md-4 text-right">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 feature">
                            <div class="feature-icon right">
                                <i class="lnr lnr-calendar-full"></i>
                            </div>
                            <h4 class="text-uppercase">Always Available</h4>
                            <p>all construction sites open for visitors, with 24/7 video surveillance being conducted at all objects</p>
                        </div>
                        <!-- .col-md-12 end -->
                        <div class="col-xs-12 col-sm-12 col-md-12 feature">
                            <div class="feature-icon right">
                                <i class="lnr lnr-database"></i>
                            </div>
                            <h4 class="text-uppercase">Fair Prices</h4>
                            <p>you can be 100% sure that it will be delivered right on time, within the set budget limits</p>
                        </div>
                        <!-- .col-md-12 end -->

                    </div>
                    <!-- .row end -->
                </div>
                <!-- .col-md-4 end -->
                <div class="col-xs-12 col-sm-4 col-md-4 hidden-xs hidden-sm">
                    <div class="feature-img">
                        <img src="{{asset('frontend/assets/images/features/3.png')}}" alt="image"/>
                    </div>
                </div>
                <!-- .col-md-4 end -->
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 feature">
                            <div class="feature-icon">
                                <i class="lnr lnr-briefcase"></i>
                            </div>
                            <h4 class="text-uppercase">Qualified Agents</h4>
                            <p>We have a team of specialists capable of maximizing the result and delivering the projects</p>
                        </div>
                        <!-- .col-md-4 end -->
                        <div class="col-xs-12 col-sm-12 col-md-12 feature">
                            <div class="feature-icon">
                                <i class="lnr lnr-cart"></i>
                            </div>
                            <h4 class="text-uppercase">Best Offers</h4>
                            <p>All aspects of the operations being transparent and clear for clients and partners</p>
                        </div>
                    </div>
                    <!-- .row end -->
                </div>
                <!-- .col-md-4 end-->
            </div>
        </div>
    </section>

    <!-- Testimonials #1
    ============================================= -->
    <section id="testimonials" class="testimonial testimonial-1 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="heading heading-3 text-center">
                        <div class="heading-bg">
                            <p class="mb-0"></p>
                            <h2>testimonials</h2>
                        </div>
                    </div>
                    <!-- .heading end -->
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div id="testimonial-oc" class="testimonial-carousel">

                        <!-- testimonial item #1 -->
                        @foreach($testimonials as $testimonial)
                        <div class="testimonial-item">
                            <div class="testimonial-content">
                                <div class="testimonial-img">
                                    <i class="fa fa-quote-left"></i>
                                    <img src="{{url($testimonial->image)}}" alt="author" width="50" height="50"/>
                                </div>
                                <p class="text-justify">{!! $testimonial->details !!}</p>
                            </div>
                            <div class="testimonial-divider">
                            </div>
{{--                            <div class="testimonial-meta">--}}
{{--                                <strong>Begha</strong>, Art Director--}}
{{--                            </div>--}}
                        </div>
                    @endforeach
                        <!-- .testimonial-item end -->

                    </div>
                </div>
                <!-- .col-md-12 end -->

            </div>
            <!-- .row end -->

        </div>
        <!-- .container end -->

    </section>
    <!-- #testimonials end -->

    <!-- Shortcode #9
    ============================================= -->
    <section id="clients" class="shortcode-9">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="heading heading-2 text-center">
                        <div class="heading-bg">
                            <p class="mb-0">They Always Trust Us</p>
                            <h2>Our Clients</h2>
                        </div>
                    </div>
                    <!-- .heading end -->
                </div>
                <!-- .col-md-12 end -->
            </div>
            <!-- .row end -->
            <div class="row">
                <!-- Client Item -->
                @foreach($clients as $client)
                <div class="col-xs-12 col-sm-4 col-md-2" style="padding-bottom: 20px;">
                    <div class="brand">
                        <img class="img-responsive center-block" src="{{asset('uploads/client/'.$client->image)}}" alt="brand">
                    </div>
                </div>
            @endforeach
                <!-- .col-md-2 end -->
            </div>
            <!-- .row End -->
        </div>
        <!-- .container end -->
    </section>
@endsection
