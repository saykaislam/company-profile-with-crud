@extends('frontend.layouts.master')
@section('title','Customer Message')
@section('content')
    <section class="single-post">
        <div class="container">
            <div class="row">
                <div class="sidebar col-xs-12 col-sm-12 col-md-3" >
                    @include('frontend.customer.customer_sidebar')
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9" style="padding: 50px;">
                    <div class="row">
                        <form action="{{route('contact.store')}}" method="post">
                            @csrf
                            <div class="col-md-6">
                                <input type="text" class="form-control mb-30" name="name" id="name" value="{{ Auth::User()->name }}" required/>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control mb-30" name="email" id="email" value="{{ Auth::User()->email }}" required/>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control mb-30" name="contact" id="contact" value="{{ Auth::User()->mobile_number }}" required/>
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
            </div>
        </div>
    </section>
@endsection
