<header id="navbar-spy" class="full-header">
    <div id="top-bar" class="top-bar" style="background: #008343;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 hidden-xs">
                    <ul class="list-inline top-contact">
                        <li>
                            <p>Phone:
                                <span>+ 61480285195</span>
                            </p>
                        </li>
                        <li>
                            <p>Email:
                                <span>info@uavsurveyaustralia.com</span>
                            </p>
                        </li>
                    </ul>
                </div>
                <!-- .col-md-6 end -->
                <div class="col-xs-12 col-sm-6 col-md-6 text-right">
                    <ul class="list-inline top-widget">
                        <li class="top-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                        <li>
                            <a class="button-quote" href="#" data-toggle="modal" data-target="#hmodel-quote" id="hmodelquote">Get A Quote</a>
                            <!-- Modal -->
                            <div class="modal fade model-quote" id="hmodel-quote" tabindex="-1" role="dialog" aria-labelledby="hmodelquote">
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
                                                    <h6>rquest a quote</h6>
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
                        </li>
                    </ul>
                </div>
                <!-- .col-md-6 end -->
            </div>
        </div>
    </div>
    <nav id="primary-menu" class="navbar navbar-fixed-top style-1">
        <div class="row">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="logo" href="{{url('/')}}">
{{--                        <h3 style="line-height:  94px; color: #ffc527;">UAV</h3>--}}
                        <img src="{{asset('frontend/assets/images/UAV-Logo-2021.png')}}" alt="UAV">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="has-dropdown {{Request::is('/') ? 'active' :''}}">
                            <a href="{{url('/')}}" class="dropdown-toggle">Home</a>
                        </li>
                        <!-- li end -->
                        <li class="has-dropdown {{Request::is('our-company*') ? 'active' :''}}">
                            <a href="{{route('about-us')}}"  class="dropdown-toggle">Our Company</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="https://grihayanbd.com" class="dropdown-toggle">Bangladeshi Partner</a>
                                </li>
                            </ul>
                        </li>
                        <!-- li end -->
                        <li class="has-dropdown {{Request::is('services*') ? 'active' :''}}">
                            <a href="{{ route('services') }}" class="dropdown-toggle">Our Services</a>
{{--                            @php--}}
{{--                            $services = \App\Service::all();--}}
{{--                            @endphp--}}
{{--                            <ul class="dropdown-menu">--}}
{{--                                @foreach($services as $service)--}}
{{--                                <li class="dropdown-submenu">--}}
{{--                                    <a href="{{route('service_details', $service->slug)}}" class="dropdown-toggle">{{$service->title}}</a>--}}
{{--                                </li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
                        </li>
                        <!-- li end -->
                        <li class="has-dropdown {{Request::is('equipments*') ? 'active' :''}}">
                            <a href="{{route('equipments')}}" class="dropdown-toggle">Our Equipment</a>
                        </li>

                        <li class="has-dropdown {{Request::is('our-projects*') ? 'active' :''}}">
                            <a href="{{route('projects')}}" class="dropdown-toggle">Our Projects</a>
                        </li>
                        <!-- li end -->

                        <li class="has-dropdown {{Request::is('gallery*') ? 'active' :''}}">
                            <a href="{{route('gallery')}}" class="dropdown-toggle">Gallery</a>
                        </li>

                        <li class="has-dropdown {{Request::is('contact-us*') ? 'active' :''}} ">
                            <a href="{{route('contact-us')}}" class="dropdown-toggle">Contact Us</a>
                        </li>
                        @if(Auth::guest())
                            <li class="has-dropdown {{Request::is('login*') ? 'active' :''}} ">
                                <a href="{{route('login')}}" class="dropdown-toggle">Login</a>
                            </li>
                        @else
                            <li class="has-dropdown {{Request::is('login*') ? 'active' :''}} ">
                                @if (Auth::user() && Auth::user()->role_id == 1)
                                <a href="{{route('admin.dashboard')}}" class="dropdown-toggle" data-toggle="tooltip">{!! Str::limit(Auth::user()->name,13) !!}</a>
                                @else
                                    <a href="{{route('customer.dashboard')}}" class="dropdown-toggle" data-toggle="tooltip">{!! Str::limit(Auth::user()->name,13) !!}</a>
                                @endif
                                <ul class="dropdown-menu" style="padding: 0;">
                                    <li class="dropdown-submenu" style="padding-right: 0px; ">
                                        <form action="{{route('logout')}}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-lg btn-bold p-0" style="background:transparent; border-color: transparent; padding-left: 10px;">Logout</button>
{{--                                        <a href="{{route('logout')}}" class="dropdown-toggle">Logout</a>--}}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
{{--                        <li class="has-dropdown {{Request::is('register*') ? 'active' :''}} ">--}}
{{--                            <a href="{{route('register')}}" class="dropdown-toggle">Register</a>--}}
{{--                        </li>--}}
                        <!-- li end -->
                    </ul>

                    <!-- Mod-->
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </nav>
</header>
