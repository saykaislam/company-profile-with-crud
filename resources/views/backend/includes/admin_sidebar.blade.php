       @if (Auth::check() && (Auth::user()->role_id == 1 ))
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: url({{asset('backend/images/sidebar2.png')}})">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="{{asset('frontend/assets/images/UAV-Logo.png')}}" alt="AdminLTE Logo" width="180" height="50" style="background: #f3f3f3b3">
{{--            <span class="brand-text font-weight-light">UAV</span>--}}
        </a>
        <!-- Sidebar -->
        <div class="sidebar" >
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{strtoupper(Auth::user()->role->name)}}</a>

                </div>
            </div>

            @if (Auth::check() )
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{route('admin.dashboard')}}" class="nav-link">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview {{(Request::is('admin/service*')) ? 'menu-open' : ''}}" style="background: rgba(0, 0, 0, 0.4);">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa fa-server"></i>
                            <p>
                                Service Management
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('admin.service-categories.index')}}" class="nav-link {{Request::is('admin/service-categories*') ? 'active' :''}}">--}}
{{--                                    <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                    <p>Categories</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
                            <li class="nav-item">
                                <a href="{{route('admin.services.index')}}" class="nav-link {{Request::is('admin/services/list*') ? 'active' :''}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Service</p>
                                </a>
                            </li>
                        </ul>

                    </li>

                    <li class="nav-item has-treeview {{(Request::is('admin/equipments*')) ? 'menu-open' : ''}}" style="background: rgba(0, 0, 0, 0.4);">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa fa-rss-square"></i>
                            <p>
                                Equipments
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.equipments.index')}}" class="nav-link {{Request::is('admin/equipments*') ? 'active' :''}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>List</p>
                                </a>
                            </li>
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('admin.services.index')}}" class="nav-link {{Request::is('admin/services/list*') ? 'active' :''}}">--}}
{{--                                    <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                    <p>Service</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
                        </ul>

                    </li>

                    @if (Auth::user()->role_id == 1)
{{--                    <li class="nav-item has-treeview {{(Request::is('admin/blog*')) ? 'menu-open' : ''}}" style="background: rgba(0, 0, 0, 0.4);">--}}
{{--                        <a href="#" class="nav-link">--}}
{{--                            <i class="nav-icon fa fa fa-rss-square"></i>--}}
{{--                            <p>--}}
{{--                                Blog Management--}}
{{--                                <i class="right fa fa-angle-left"></i>--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                        <ul class="nav nav-treeview">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('admin.blog-category.index')}}" class="nav-link {{Request::is('admin/blog-category*') ? 'active' :''}}">--}}
{{--                                    <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                    <p>Categories</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('admin.blog-post.index')}}" class="nav-link {{Request::is('admin/blog-post*') ? 'active' :''}}">--}}
{{--                                    <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                    <p>Post</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                        <li class="nav-item has-treeview {{(Request::is('admin/project*')) || (Request::is('admin/project/category*')) ? 'menu-open' : ''  }}" style="background: rgba(0, 0, 0, 0.4);">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-product-hunt"></i>
                                <p>
                                    Project Management
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item {{Request::is('admin/project/category*') ? 'active' :''}}">
                                    <a href="{{route('admin.category.index')}}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Category</p>
                                    </a>
                                </li>
                                <li class="nav-item {{Request::is('admin/project*') ? 'active' :''}}">
                                    <a href="{{route('admin.project.index')}}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Project</p>
                                    </a>
                                </li>
{{--                                <li class="nav-item {{Request::is('admin/real-state-project*') ? 'active' :''}}">--}}
{{--                                    <a href="{{route('admin.real-estate-project.index')}}" class="nav-link">--}}
{{--                                        <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                        <p>Real estate Project</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
                            </ul>
                        </li>

                    <li class="nav-item has-treeview {{(Request::is('admin/slider*')) ? 'menu-open' : ''}}" style="background: rgba(0, 0, 0, 0.4);">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa  fa-building-o"></i>
                            <p>
                                Sliders
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.slider.index')}}" class="nav-link {{Request::is('admin/slider') ? 'active' :''}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.slider.create')}}" class="nav-link {{Request::is('admin/slider/create*') ? 'active' :''}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>Create</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                        <li class="nav-item has-treeview {{(Request::is('admin/gallery*')) ? 'menu-open' : ''}}" style="background: rgba(0, 0, 0, 0.4);">
                            <a href="{{route('admin.gallery.index')}}" class="nav-link">
                            <i class="nav-icon fa fa  fa-image"></i>
                            <p>
                                Gallery
                            </p>
                        </a>
                        </li>
                        <li class="nav-item has-treeview {{(Request::is('admin/testimonials*')) ? 'menu-open' : ''}}" style="background: rgba(0, 0, 0, 0.4);">
                            <a href="{{route('admin.testimonials.index')}}" class="nav-link">
                                <i class="nav-icon fa fa  fa-quote-left"></i>
                                <p>
                                    Testimonial
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview {{(Request::is('admin/settings*')) ? 'menu-open' : ''}}" style="background: rgba(0, 0, 0, 0.4);">
                            <a href="{{route('admin.settings.index')}}" class="nav-link">
                                <i class="nav-icon fa fa fa-cog"></i>
                                <p>
                                    Settings
                                </p>
                            </a>
                        </li>

{{--                        <li class="nav-item has-treeview {{(Request::is('admin/gallery*')) ? 'menu-open' : ''}}" style="background: rgba(0, 0, 0, 0.4);">--}}
{{--                            <a href="{{route('admin.gallery.index')}}" class="nav-link">--}}
{{--                                <i class="nav-icon fa fa  fa-user-secret"></i>--}}
{{--                                <p>--}}
{{--                                    Team--}}
{{--                                </p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    @endif
                    <li class="nav-item has-treeview {{(Request::is('admin/staff*')) ? 'menu-open' : ''}}" style="background: rgba(0, 0, 0, 0.4);">
                        <a href="{{route('admin.staff.index')}}" class="nav-link">
                            <i class="nav-icon fa fa-user-secret" aria-hidden="true"></i>
                            <p>
                                Team
                                <i class="right fas fa-blog"></i>
                            </p>
                        </a>
                    </li>

                    @if (Auth::user()->role_id == 1)
                    <li class="nav-item has-treeview {{(Request::is('admin/client*')) ? 'menu-open' : ''}}" style="background: rgba(0, 0, 0, 0.4);">
                        <a href="{{route('admin.client.index')}}" class="nav-link">
                            <i class="nav-icon fa fa-newspaper-o" aria-hidden="true"></i>
                            <p>
                             Client Logo
                                <i class="right fas fa-blog"></i>
                            </p>
                        </a>
                    </li>
                        <li class="nav-item has-treeview {{(Request::is('admin/customer*')) ? 'menu-open' : ''}}" style="background: rgba(0, 0, 0, 0.4);">
                            <a href="{{route('admin.customer.index')}}" class="nav-link">
                                <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                                <p>
                                    Customer List
                                    <i class="right fas fa-blog"></i>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview {{(Request::is('admin/profile*')) ? 'menu-open' : ''}}" style="background: rgba(0, 0, 0, 0.4);">
                            <a href="{{route('admin.profile.index')}}" class="nav-link">
                                <i class="nav-icon fa fa-user-circle-o" aria-hidden="true"></i>
                                <p>
                                     Profile Update
                                    <i class="right fas fa-blog"></i>
                                </p>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
            @endif
        </div>
        <!-- /.sidebar -->
    </aside>
    @else
    <h2 class="text-danger text-center m-5">Your don't have permission to access here.</h2>
@endif

