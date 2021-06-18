@extends('frontend.layouts.master')
@section('title')
    @if(!empty($equipment->meta_title))
        {{$equipment->meta_title}}
    @else
        {{$equipment->title}}
    @endif
@endsection
@section('meta')
    @if(!empty($equipment->meta_title))
        <meta name="meta_title" content="{{$equipment->meta_title}}"/>
    @endif
    @if(!empty($equipment->meta_description))
        <meta name="meta_description" content="{{ $equipment->meta_description }}"/>
    @endif
@endsection
@section('content')
    <section class=" bg-overlay bg-overlay-gradient pb-0" style="height: 200px;">
        <div class="bg-section" >
            <img src="{{asset('uploads/equipment/banner.jpg')}}" alt="Background"/>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="page-title title-1 text-center" style="margin-top: -155px;">
                        <div class="title-bg">
                            <h2>{{$equipment->title}}</h2>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li>
                                <a href="{{route('equipments')}}">Equipments</a>
                            </li>
                            <li class="active">{{$equipment->title}}</li>
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
    <section class="single-post">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
                    <div class="row">

                        <!-- Entry Article #1 -->
                        <div class="col-xs-12 col-sm-12 col-md-12 entry">

                            <!-- .entry-img end -->
{{--                            <div class="entry-meta clearfix">--}}
{{--                                <ul class="pull-left">--}}
{{--                                    <li class="entry-format">--}}
{{--                                        <i class="fa fa-paint-brush"></i>--}}
{{--                                    </li>--}}
{{--                                    <li class="entry-date">--}}
{{--                                        {{date('j M',strtotime($equipment->created_at))}}--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                                <ul class="pull-right text-right">--}}
{{--                                    <li class="entry-cat"> In:--}}
{{--                                        <span>--}}
{{--									<a href="#">Projecting</a>--}}
{{--									</span>--}}
{{--                                        <span class="entry-author">By:--}}
{{--									<a href="#">Begha</a>--}}
{{--									</span>--}}
{{--                                    </li>--}}
{{--                                    <li class="entry-no-comments"><i class="fa fa-comments"></i> 17</li>--}}
{{--                                    <li class="entry-views"><i class="fa fa-eye"></i> 40</li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
                            <!-- .entry-meta end -->
                            <div class="entry-title">
                                <a href="#">
                                    <h3>{{$equipment->title}}</h3>
                                </a>
                            </div>
                            <!-- .entry-title end -->
                            <div class="entry-content">
                                {!! $equipment->description !!}
                            </div>
                            <!-- .entry-content end -->
                            <div class="entry-img">
                                <a class="img-popup" href="{{asset('uploads/equipment/'.$equipment->image)}}">
                                    <img src="{{asset('uploads/equipment/'.$equipment->image)}}" alt="title" >
                                </a>
                            </div>

{{--                            <div class="entry-share text-right text-center-xs">--}}
{{--                                <span class="share-title">share this article: </span>--}}
{{--                                <a href="#"><i class="fa fa-facebook"></i></a>--}}
{{--                                <a href="#"><i class="fa fa-twitter"></i></a>--}}
{{--                                <a href="#"><i class="fa fa-google-plus"></i></a>--}}
{{--                                <a href="#"><i class="fa fa-pinterest"></i></a>--}}
{{--                            </div>--}}
                            <!-- .entry-share end -->

{{--                            <div class="entry-prev-next clearfix">--}}
{{--                                <div class="entry-prev">--}}
{{--                                    <div class="entry-prev-content">--}}
{{--                                        <img src="{{asset('frontend/assets/images/blog/thumb/1.jpg')}}" alt="title"/>--}}
{{--                                        <div class="entry-desc">--}}
{{--                                            <p>previous post</p>--}}
{{--                                            <a href="#">How to Install, clean and Repair Drywall ?</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="entry-next">--}}
{{--                                    <div class="entry-next-content">--}}
{{--                                        <img src="{{asset('frontend/assets/images/blog/thumb/2.jpg')}}" alt="title"/>--}}
{{--                                        <div class="entry-desc">--}}
{{--                                            <p>next post</p>--}}
{{--                                            <a href="#">Color Theory and How to Use the Color to Your Advantage?</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <!-- .entry-prev-next end -->
{{--                            <div class="entry-widget entry-bio clearfix">--}}
{{--                                <div class="entry-widget-title">--}}
{{--                                    <h4>about author</h4>--}}
{{--                                </div>--}}
{{--                                <div class="entry-widget-content">--}}
{{--                                    <img src="{{asset('frontend/assets/images/team/thumb/1.jpg')}}" alt="Author"/>--}}
{{--                                    <div class="entry-bio-desc">--}}
{{--                                        <p>Yellow Hats is a leading developer of A-grade commercial, industrial and residential projects in USA. Since its foundation the company has doubled its turnover year on year, with its staff numbers swelling accordingly.</p>--}}
{{--                                        <a href="#"><i class="fa fa-facebook"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-twitter"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-vimeo-square"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-linkedin"></i></a>--}}
{{--                                        <a href="#"><i class="fa fa-rss"></i></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <!-- .entry-bio end -->
                            <div class="entry-widget entry-related clearfix" style="padding-top: 50px;">
                                <div class="entry-widget-title">
                                    <h4>Our Projects</h4>
                                </div>
                                <div class="entry-widget-content">
                                    <div class="row">
                                        <!-- Related Post #1 -->
                                        @foreach($projects as $project)
                                        <div class="col-xs-12 col-sm-4 col-md-4 entry">
                                            <img src="{{asset('uploads/project/'.$project->image)}}" alt="title" width="270" height="191"/>
                                            <div class="entry-cat">
                                                In:
                                                <span>
											<a href="#">{{$project->category->name}}</a>
											</span>
                                            </div>
                                            <div class="entry-title">
                                                <a href="{{route('project_details',$project->slug)}}">
                                                    <h5>{{$project->title}}</h5>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                    <!-- .row end -->
                                </div>
                            </div>
                            <!-- .entry-related end -->
{{--                            <div class="entry-widget entry-comments clearfix">--}}
{{--                                <div class="entry-widget-title">--}}
{{--                                    <h4>3 comments</h4>--}}
{{--                                </div>--}}
{{--                                <div class="entry-widget-content">--}}
{{--                                    <ul class="comments-list">--}}
{{--                                        <li class="comment-body">--}}
{{--                                            <div class="avatar">--}}
{{--                                                <img src="{{asset('frontend/assets/images/team/thumb/2.jpg')}}" alt="avatar"/>--}}
{{--                                            </div>--}}
{{--                                            <div class="comment">--}}
{{--                                                <h6>ayman fikry</h6>--}}
{{--                                                <div class="date">--}}
{{--                                                    Jan 28, 2016 - 08:07 pm--}}
{{--                                                </div>--}}
{{--                                                <p>The Ranch style cabin was designed by Stockholm based architecture firm WRB. This unique style of house is made up of timber, glass and steel. The Ranch style Cabin house is situated at Torsa one of popular upper-class inhabited neighborhoods of Sweden.</p>--}}
{{--                                                <a class="reply" href="#">leave a reply</a>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                        <!-- comment end -->--}}

{{--                                        <li class="comment-body">--}}
{{--                                            <div class="avatar">--}}
{{--                                                <img src="{{asset('frontend/assets/images/team/thumb/3.jpg')}}" alt="avatar"/>--}}
{{--                                            </div>--}}
{{--                                            <div class="comment">--}}
{{--                                                <h6>Mohamed Habaza</h6>--}}
{{--                                                <div class="date">--}}
{{--                                                    Jan 28, 2016 - 10:07 pm--}}
{{--                                                </div>--}}
{{--                                                <p>The Ranch style cabin was designed by Stockholm based architecture firm WRB. This unique style of house is made up of timber, glass and steel. The Ranch style Cabin house is situated at Torsa one of popular upper-class inhabited neighborhoods of Sweden.</p>--}}
{{--                                                <a class="reply" href="#">leave a reply</a>--}}
{{--                                            </div>--}}
{{--                                            <ul class="comment-children">--}}
{{--                                                <li class="comment-body">--}}
{{--                                                    <div class="avatar">--}}
{{--                                                        <img src="{{asset('frontend/assets/images/team/thumb/5.jpg')}}" alt="avatar"/>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="comment">--}}
{{--                                                        <h6>Mahmoud Baghagho</h6>--}}
{{--                                                        <div class="date">--}}
{{--                                                            Jan 28, 2016 - 10:07 pm--}}
{{--                                                        </div>--}}
{{--                                                        <p>Scrolling through a foe market, perusing an estate sale, stopping on a whim at a garage sale or hiding in your attic; wherever you a can those gorgeous vintage suitcases, snatch them up! They’re perfect for creating and conjuring up a variety of amazing projects. </p>--}}
{{--                                                        <a class="reply" href="#">leave a reply</a>--}}
{{--                                                    </div>--}}
{{--                                                    <ul class="comment-children">--}}
{{--                                                        <li class="comment-body">--}}
{{--                                                            <div class="avatar">--}}
{{--                                                                <img src="{{asset('frontend/assets/images/team/thumb/2.jpg')}}" alt="avatar"/>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="comment">--}}
{{--                                                                <h6>Ahmed Hassan</h6>--}}
{{--                                                                <div class="date">--}}
{{--                                                                    Jan 28, 2016 - 10:30 pm--}}
{{--                                                                </div>--}}
{{--                                                                <p>There’s a minimalistic, yet traditional, quality in its overall look and it makes for a great palette when styling and decorating with a specific vision in mind. But what happens when you take this home design, first constructed in the 1950’s.</p>--}}
{{--                                                                <a class="reply" href="#">leave a reply</a>--}}
{{--                                                            </div>--}}
{{--                                                        </li>--}}
{{--                                                        <!-- comment end -->--}}
{{--                                                    </ul>--}}
{{--                                                </li>--}}
{{--                                                <!-- comment end -->--}}

{{--                                                <li class="comment-body">--}}
{{--                                                    <div class="avatar">--}}
{{--                                                        <img src="{{asset('frontend/assets/images/team/thumb/2.jpg')}}" alt="avatar"/>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="comment">--}}
{{--                                                        <h6>ayman fikry</h6>--}}
{{--                                                        <div class="date">--}}
{{--                                                            Jan 28, 2016 - 08:07 pm--}}
{{--                                                        </div>--}}
{{--                                                        <p>The Ranch style cabin was designed by Stockholm based architecture firm WRB. This unique style of house is made up of timber, glass and steel. The Ranch style Cabin house is situated at Torsa one of popular upper-class inhabited neighborhoods of Sweden.</p>--}}
{{--                                                        <a class="reply" href="#">leave a reply</a>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                                <!-- comment end -->--}}

{{--                                            </ul>--}}
{{--                                            <!-- .comment-children end -->--}}
{{--                                        </li>--}}
{{--                                        <!-- comment end -->--}}

{{--                                        <li class="comment-body">--}}
{{--                                            <div class="avatar">--}}
{{--                                                <img src="{{asset('frontend/assets/images/team/thumb/2.jpg')}}" alt="avatar"/>--}}
{{--                                            </div>--}}
{{--                                            <div class="comment">--}}
{{--                                                <h6>Ahmed Hassan</h6>--}}
{{--                                                <div class="date">--}}
{{--                                                    Jan 28, 2016 - 10:30 pm--}}
{{--                                                </div>--}}
{{--                                                <p>There’s a minimalistic, yet traditional, quality in its overall look and it makes for a great palette when styling and decorating with a specific vision in mind. But what happens when you take this home design, first constructed in the 1950’s.</p>--}}
{{--                                                <a class="reply" href="#">leave a reply</a>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                        <!-- comment end -->--}}

{{--                                    </ul>--}}
{{--                                    <!-- .comments-list end -->--}}
{{--                                    <div class="entry-widget comments-form">--}}
{{--                                        <div class="entry-widget-title">--}}
{{--                                            <h4>Leave A Reply</h4>--}}
{{--                                        </div>--}}
{{--                                        <div class="entry-widget-content">--}}
{{--                                            <form id="post-comment">--}}
{{--                                                <input type="text" class="form-control" id="name" placeholder="Your Name"/>--}}
{{--                                                <input type="email" class="form-control" id="email" placeholder="Your Email"/>--}}
{{--                                                <textarea class="form-control" id="comment" rows="2" placeholder="Comment"></textarea>--}}
{{--                                                <button type="submit" class="btn btn-primary btn-black btn-block">Post Your Comment</button>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!-- .comments-form end -->--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <!-- .entry-comments end -->
                        </div>
                        <!-- .entry end -->

                    </div>
                    <!-- .row end -->

                </div>
                <!-- entry articles end -->

            </div>
            <!-- .row end -->
        </div>
        <!-- .container end -->
    </section>
@endsection
