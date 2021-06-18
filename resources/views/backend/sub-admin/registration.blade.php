@extends('backend.layouts.master')
@section("title","Sub Admin Registration")
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
                    <h1>Sub Admin Create</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Sub Admin Create</li>
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
                        <h3 class="card-title float-left">Create Sub Admin</h3>
                        <div class="float-right">
                            <a href="{{route('admin.blog-post.index')}}">
                                <button class="btn btn-success">
                                    <i class="fa fa-backward"> </i>
                                    Back
                                </button>
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.sub-admin.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="title">Sub-Admin Name</label>
                                    <input type="text" class="form-control" name="name" id="title" placeholder="Enter name">
                                </div>
                                <div class="form-group col-6">
                                    <label class="control-label">Email Address</label>
                                    <input type="email" name="email" class="form-control c-square c-theme" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-4">
                                    <label class="control-label">Mobile Number</label>
                                    <input type="tel" name="mobile_number" class="form-control c-square c-theme" placeholder="Phone">

                                </div>
                                <div class="form-group col-4">
                                    <label class="control-label">Password</label>
                                    <input type="password" name="password" class="form-control c-square c-theme" >

                                </div>
                                <div class="form-group col-4">
                                    <label class="control-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control c-square c-theme" >

                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
