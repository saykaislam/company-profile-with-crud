<style>
    button.btn:hover {
        background-color: #ffc527;
        border-color: #ffc527;
    }
</style>
<div class="widget widget-categories">
    <div class="entry-widget entry-bio clearfix">
        <div class="entry-widget-content">
{{--            @if(!empty(Auth::user()->image))--}}
                <img src="{{url(Auth::user()->image)}}" alt="" class="rounded-circle" width="60" height="60"/>
{{--            @else--}}
{{--                <img src="{{asset('uploads/default.jpg')}}" alt="" class="rounded-circle" width="60" height="60"/>--}}
{{--            @endif--}}
            <div class="entry-bio-desc" style="padding-left: 70px;">
                <a href="#">{{Auth::user()->name}}</a>
            </div>
            <div class="entry-bio-desc" style="padding-left: 70px;">
                <a href="#">{{Auth::user()->email}}</a>
            </div>
        </div>
    </div>
    <div class="widget-content">
        <ul class="list-unstyled">
            <li class="{{Request::is('customer/dashboard*') ? 'active' :''}}">
                <a href="{{route('customer.dashboard')}}">Images</a>
            </li>
            <li class="{{Request::is('customer/video_link*') ? 'active' :''}}">
                <a href="{{route('customer.video_link')}}">Video link</a>
            </li>
            <li class="{{Request::is('customer/other_files*') ? 'active' :''}}">
                <a href="{{route('customer.other_files')}}">Cad file / PDF</a>
            </li>
            <li class="{{Request::is('customer/profile*') ? 'active' :''}}">
                <a href="{{route('customer.profile_edit')}}">Edit Profile</a>
            </li>
            <li class="{{Request::is('customer/password*') ? 'active' :''}}">
                <a href="{{route('customer.password_edit')}}">Edit Password</a>
            </li>
            <li class="{{Request::is('customer/message*') ? 'active' :''}}">
                <a href="{{route('customer.message')}}">Give a Message</a>
            </li>
            <li style="padding: 0px;">
                <form action="{{route('logout')}}" method="POST" style="padding: 0px;">
                    @csrf
                    <button type="submit" class="btn btn-sm pt-0" style="padding:15px 103px; font-size: 16px; color: #000!important;"><i class="icon-power-switch"></i><strong>Logout</strong></button>
                </form>
{{--                <a href="{{url('/logout')}}">Logout</a>--}}
            </li>
{{--            <li>--}}
{{--                <a href="{{route('project')}}">Our Projects</a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#">Gallery</a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="{{route('contact-us')}}">Contact Us</a>--}}
{{--            </li>--}}
        </ul>
    </div>
</div>
