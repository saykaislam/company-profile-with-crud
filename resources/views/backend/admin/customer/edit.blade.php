@extends('backend.layouts.master')
@section("title","Customer Edit")
@push('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/select2/select2.min.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Customer Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Customer Edit</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <!-- general form elements -->
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title float-left">Edit Customer</h3>
                        <div class="float-right">
                            <a href="{{route('admin.customer.index')}}">
                                <button class="btn btn-success">
                                    <i class="fa fa-backward"> </i>
                                    Back
                                </button>
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.customer.update',$customer->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{$customer->name}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{$customer->email}}" id="email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label for="mobile_number">Phone</label>
                                    <input type="text" class="form-control" name="mobile_number" value="{{$customer->mobile_number}}" id="mobile_number">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Customer Password" id="password">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <img src="{{url($customer->image)}}" width="80" height="40" alt="">
                                    <label for="image">Client Image </label>
                                    <input type="file" class="form-control-file" name="image" id="image" value="{{$customer->image}}">
                                </div>
                            </div>
                        {{--                            <div class="row">--}}
                        {{--                                <div class="form-group col-md-8">--}}
                        {{--                                    <label for="url">URL</label>--}}
                        {{--                                    <input type="text" class="form-control" name="url" placeholder="url" id="image">--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}


                        <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@stop
@push('js')
    <script src="{{asset('backend/plugins/select2/select2.full.min.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <script>
        //Initialize Select2 Elements
        $('.select2').select2();
        $('.textarea').wysihtml5({
            toolbar: { fa: true }
        })
    </script>
@endpush
