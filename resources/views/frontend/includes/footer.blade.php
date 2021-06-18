<footer id="footer" class="footer-1">
    <!-- Contact Bar
    ============================================= -->
    <div class="container footer-widgtes">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="widgets-contact">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-3 widget">
                            <div class="widget-contact-icon pull-left">
                                <i class="lnr lnr-map"></i>
                            </div>
                            <div class="widget-contact-info">
                                <p class="text-capitalize text-white">visit us</p>
                                <p class="text-capitalize font-heading">13/12-26 Willcox st <span style="padding-left: 105px">Adelside SA5000</span></p>
                            </div>
                        </div>
                        <!-- .widget end -->
                        <div class="col-xs-12 col-sm-12 col-md-5 widget">
                            <div class="widget-contact-icon pull-left">
                                <i class="lnr lnr-envelope"></i>
                            </div>
                            <div class="widget-contact-info">
                                <p class="text-capitalize text-white">email us</p>
                                <p class=" font-heading">info@uavsurveyaustralia.com</p>
                            </div>
                        </div>
                        <!-- .widget end -->
                        <div class="col-xs-12 col-sm-12 col-md-4 widget">
                            <div class="widget-contact-icon pull-left">
                                <i class="lnr lnr-phone"></i>
                            </div>
                            <div class="widget-contact-info">
                                <p class="text-capitalize text-white">call us</p>
                                <p class="text-capitalize font-heading">+61480285195 <span>(Australia)</span></p>
                                <p class="text-capitalize font-heading" style="padding-left: 107px; font-size: 14px;">+8801755608365 (Bangladesh)</p>
                            </div>
                        </div>
                        <!-- .widget end -->
                    </div>
                    <!-- .row end -->
                </div>
                <!-- .widget-contact end -->
            </div>
            <!-- .col-md-12 end -->
        </div>
        <!-- .row end -->
    </div>
    <!-- .container end -->

    <!-- Widget Section
    ============================================= -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 widgets-links">
                <div class="col-xs-12 col-sm-12 col-md-3 widget-about text-center-xs mb-30-xs">
                    <div class="widget-about-logo pull-left pull-none-xs">
{{--                        <img src="{{asset('frontend/assets/images/footer-logo.png')}}" alt="logo"/>--}}
                    </div>
                    <div class="widget-about-info">
                        <h5 class="text-capitalize text-white">UAV Survey Australia</h5>
                        <p class="mb-0">UAV Survey Australia is a Concern of GROUP THREE AUSTRALIA PTY.LTD.  </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 widget-navigation text-center-xs mb-30-xs">
                    <h5 class="text-capitalize text-white">navigation</h5>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <ul class="list-unstyled text-capitalize">
                                <li>
                                    <a href="{{route('about-us')}}"> about us</a>
                                </li>
                                <li>
                                    <a href="{{route('team')}}"> team</a>
                                </li>
                                <li>
                                    <a href="{{route('projects')}}"> projects</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <ul class="list-unstyled text-capitalize">
                                <li>
                                    <a href="{{route('contact-us')}}"> Contact Us</a>
                                </li>
                                <li>
                                    <a href="{{route('gallery')}}"> Gallery</a>
                                </li>
{{--                                <li>--}}
{{--                                    <a href="#"> FAQs</a>--}}
{{--                                </li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
                @php
                $services = \App\Service::latest()->take(3)->get();
                @endphp
                <div class="col-xs-12 col-sm-6 col-md-3 widget-services text-center-xs">
                    <h5 class="text-capitalize text-white">services</h5>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <ul class="list-unstyled text-capitalize">
                                @foreach($services as $service)
                                <li>
                                    <a href="{{route('service_details',$service->slug)}}"> {{ $service->title }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @php
                $equipments = \App\Equipment::latest()->take(3)->get();
                @endphp

                <div class="col-xs-4 col-sm-3 col-md-3 text-center-xs">
                    <h5 class="text-capitalize text-white">Equipments</h5>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <ul class="list-unstyled text-capitalize">
                                @foreach($equipments as $equipment)
                                    <li>
                                        <a href="{{route('equipment_details',$equipment->slug)}}"> {{ $equipment->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Social bar
    ============================================= -->
{{--    <div class="widget-social">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xs-12 col-sm-12 col-md-6 mb-30-xs mb-30-sm">--}}
{{--                    <div class="widget-social-info pull-left text-capitalize pull-none-xs mb-15-xs">--}}
{{--                        <p class="mb-0">follow us<br>--}}
{{--                            on social networks</p>--}}
{{--                    </div>--}}
{{--                    <div class="widget-social-icon pull-right text-right pull-none-xs">--}}
{{--                        <a href="#">--}}
{{--                            <i class="fa fa-facebook"></i><i class="fa fa-facebook"></i>--}}
{{--                        </a>--}}
{{--                        <a href="#">--}}
{{--                            <i class="fa fa-google-plus"></i><i class="fa fa-google-plus"></i>--}}
{{--                        </a>--}}
{{--                        <a href="#" >--}}
{{--                            <i class="fa fa-twitter"></i><i class="fa fa-twitter"></i>--}}
{{--                        </a>--}}
{{--                        <a href="#">--}}
{{--                            <i class="fa fa-linkedin"></i><i class="fa fa-linkedin"></i>--}}
{{--                        </a>--}}
{{--                        <a href="#">--}}
{{--                            <i class="fa fa-vimeo-square"></i><i class="fa fa-vimeo-square"></i>--}}
{{--                        </a>--}}
{{--                        <a href="#">--}}
{{--                            <i class="fa fa-pinterest"></i><i class="fa fa-pinterest"></i>--}}
{{--                        </a>--}}
{{--                        <a href="#">--}}
{{--                            <i class="fa fa-flickr"></i><i class="fa fa-flickr"></i>--}}
{{--                        </a>--}}
{{--                        <a href="#">--}}
{{--                            <i class="fa fa-rss"></i><i class="fa fa-rss"></i>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xs-12 col-sm-12 col-md-6">--}}
{{--                    <div class="widget-newsletter-info pull-left text-capitalize pull-none-xs mb-15-xs">--}}
{{--                        <p class="mb-0">subsribe<br>--}}
{{--                            on our newsletter</p>--}}
{{--                    </div>--}}
{{--                    <div class="widget-newsletter-form pull-right text-right">--}}

{{--                        <!-- Mailchimp Form--}}
{{--                        =============================================-->--}}
{{--                        <form class="mailchimp">--}}
{{--                            <div class="subscribe-alert">--}}
{{--                            </div>--}}
{{--                            <div class="input-group">--}}
{{--                                <input type="text" class="form-control" placeholder="Type Your Email Account">--}}
{{--                                <span class="input-group-btn">--}}
{{--								<button class="btn text-capitalize" type="button">join</button>--}}
{{--								</span>--}}
{{--                            </div>--}}
{{--                            <!-- /input-group -->--}}
{{--                        </form>--}}
{{--                        <!--Mailchimp Form End-->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- Copyrights
    ============================================= -->
    <div class="container">
{{--        <div class="row">--}}
{{--            <div class="col-xs-12 col-sm-12 col-md-12 copyrights text-center">--}}
{{--                <p class="text-capitalize">© 2016 - 2017 yellow hats. all rights reserved</p>--}}
{{--                <p class="text-capitalize">With Love by--}}
{{--                    <a href="http://themeforest.net/user/7oroof/portfolio?ref=7oroof">7oroof.com</a>--}}
{{--                </p>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</footer>
