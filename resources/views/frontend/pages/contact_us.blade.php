@extends('frontend.layouts.master')
@section('title','Contact Us')
@section('content')
    <section class=" bg-overlay bg-overlay-gradient pb-0" style="height: 200px;">
        <div class="bg-section" >
            <img src="{{asset('frontend/assets/images/page-title/9.jpg')}}" alt="Background"/>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="page-title title-1 text-center" style="margin-top: -155px;">
                        <div class="title-bg">
                            <h2>contact us</h2>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li class="active">contact</li>
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
    <!-- Contact #2
    ============================================= -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="heading heading-4">
                        <div class="heading-bg heading-right">
                            <p class="mb-0">We Wanna Hear From You !</p>
                            <h2>Contact Us</h2>
                        </div>
                    </div>
                    <!-- .heading end -->
                </div>
                <!-- .col-md-12 end -->
                <div class="col-xs-12 col-sm-12 col-md-12" >
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4 widgets-contact mb-60-xs" style="background: #b3a7a938; padding: 20px;">
                            <div class="widget">
                                <div class="widget-contact-icon pull-left">
                                    <i class="lnr lnr-map"></i>
                                </div>
                                <div class="widget-contact-info">
                                    <p class="text-capitalize">visit us</p>
                                    <p class="text-capitalize font-heading">13/12-26 Willcox st Adelside SA5000</p>
                                </div>
                            </div>
                            <!-- .widget end -->
                            <div class="clearfix">
                            </div>
                            <div class="widget">
                                <div class="widget-contact-icon pull-left">
                                    <i class="lnr lnr-envelope"></i>
                                </div>
                                <div class="widget-contact-info">
                                    <p class="text-capitalize ">email us</p>
                                    <p class="text-capitalize font-heading">info@uavsurveyaustralia.com</p>
                                </div>
                            </div>
                            <!-- .widget end -->
                            <div class="clearfix">
                            </div>
                            <div class="widget">
                                <div class="widget-contact-icon pull-left">
                                    <i class="lnr lnr-phone"></i>
                                </div>
                                <div class="widget-contact-info">
                                    <p class="text-capitalize">call us</p>
                                    <p class="text-capitalize font-heading">+61480285195 (Australia)</p>
                                    <p class="text-capitalize font-heading" style="padding-left: 87px; font-size: 14px;">+8801755608365 (Bangladesh)</p>
                                </div>
                            </div>
                            <!-- .widget end -->
                        </div>
                        <!-- .col-md-4 end -->
                        <div class="col-xs-12 col-sm-12 col-md-8" style="padding-left: 100px;">
                            <div class="row">
                                <form action="{{route('contact.store')}}" method="post">
                                    @csrf
                                    <div class="col-md-6">
                                        <input type="text" class="form-control mb-30" name="name" id="name" placeholder="Your Name" required/>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control mb-30" name="email" id="email" placeholder="Your Email" required/>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control mb-30" name="contact" id="contact" placeholder="Your Phone" required/>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control mb-30" name="subject" id="subject" placeholder="Subject" required/>
                                    </div>
                                    <div class="col-md-12">
                                        <textarea class="form-control mb-30" name="message" id="message" rows="2" placeholder="Message Details" required></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" id="submit-message" class="btn btn-primary btn-black btn-block">Send Message</button>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 mt-xs">
                                        <!--Alert Message-->
                                        <div id="contact-result">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- .col-md-8 end -->
                    </div>
                    <!-- .row end -->
                </div>
                <!-- .col-md-12 end -->
            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
    <!-- Google Maps
============================================= -->
    <section class="google-maps pb-0 pt-0">
        {{--        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14604.557245622878!2d90.360452!3d23.778053!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x14c0ec04f1828c03!2saccounting%20software%20in%20bangladesh%20-%20Staritltd!5e0!3m2!1sen!2sbd!4v1610604502101!5m2!1sen!2sbd" width="100%" height="413px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>--}}
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3279.6361340341587!2d138.6713773149515!3d-34.71435647086701!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ab0ad9bfbbd9831%3A0x8feb9eb4ff921e1d!2sUnit%205%2F515A%20Main%20N%20Rd%2C%20Elizabeth%20SA%205112%2C%20Australia!5e0!3m2!1sen!2sbd!4v1610948549294!5m2!1sen!2sbd" width="100%" height="413px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        <div class="container-fluid">
            {{--            <div class="row">--}}
            {{--                <div class="col-xs-12 col-sm-12 col-md-12 pr-0 pl-0">--}}

            {{--                    <div id="googleMap" style="width:100%;height:413px;">--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
    </section>
    <!-- .google-maps end -->
@endsection
@push('js')
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="{{asset('frontend/assets/js/jquery.gmap.min.js')}}"></script>
    <script type="text/javascript">
	$('#googleMap').gMap({
		address: "121 King St,Melbourne, Australia",
		zoom: 15,
		markers:[
			{
				address: "Melbourne, Australia",
				maptype:'ROADMAP',
			}
		]
	});
</script>

@endpush
