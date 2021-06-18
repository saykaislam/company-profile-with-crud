@extends('backend.layouts.master')
@section("title","Dashboard")
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1 class="m-0" style="color: #28a745">Welcome to UAV Survey Australia Admin Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-4">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fa fa-book"></i></span>

                        <div class="info-box-content">
                            <a href="{{route('admin.project.index')}}"><span class="info-box-text">Total Project</span></a>
                            <a href="{{route('admin.project.index')}}"><span class="info-box-number">{{$project}} </span></a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-users"></i></span>

                        <div class="info-box-content">
                            <a href="{{route('admin.services.index')}}"><span class="info-box-text">Total Service</span></a>
                            <a href="{{route('admin.services.index')}}"> <span class="info-box-number"> {{$service}}</span></a>

                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-primary  elevation-1"><i class="fa fa-users"></i></span>

                        <div class="info-box-content">
                            <a href="{{route('admin.equipments.index')}}"><span class="info-box-text">Total Equipment</span></a>
                            <a href="{{route('admin.equipments.index')}}"> <span class="info-box-number"> {{$equipment}}</span></a>

                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i
                                    class="fa fa-shopping-cart"></i></span>

                        <div class="info-box-content">
                            <a href="{{route('admin.slider.index')}}">   <span class="info-box-text">Total Slider</span></a>
                            <a href="{{route('admin.slider.index')}}">  <span class="info-box-number">{{ $slider}}</span></a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>

                        <div class="info-box-content">
                            <a href="{{route('admin.customer.index')}}"> <span class="info-box-text">Total Customer</span></a>
                            <a href="{{route('admin.customer.index')}}"><span class="info-box-number">{{$customer}}</span></a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->


        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
@stop
