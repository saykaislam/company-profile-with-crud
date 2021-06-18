@extends('backend.layouts.master')
@section("title","Land Owner Create")
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
                    <h1>Land Owner Create</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Land Owner Create</li>
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
                    <h3 class="card-title float-left">Create Land Owner</h3>
                    <div class="float-right">
                        <a href="{{route('admin.land_owner.index')}}">
                            <button class="btn btn-success">
                                <i class="fa fa-backward"> </i>
                                Back
                            </button>
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{route('admin.land_owner.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group  col-md-4">
                                <label for="title">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Post Title">
                            </div>
                            <div class="form-group  col-md-4">
                                <label for="title">email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Enter Post Title">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="title">Contact Person</label>
                                <input type="text" class="form-control" name="contact_person" id="contact_person" placeholder="Enter Post Title">
                            </div>
                        </div>
                    <br>
                        <div class="row">

                        <div class="form-group col-md-4">
                            <label for="image">Contact Number</label>
                            <input type="text" class="form-control-file" name="mobile_number" id="mobile_number">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="image">Locality</label>
                            <input type="text" class="form-control-file" name="locality" id="locality">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="image">Address</label>
                            <input type="text" class="form-control-file" name="address" id="address">
                        </div>

                    </div>
                    <br>

                        <div class="row">

                        <div class="form-group col-md-4">
                            <label for="image">Size of land</label>
                            <input type="text" class="form-control-file" name="size_of_land" id="size_of_land">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="image">Width Of Road Front</label>
                            <input type="text" class="form-control-file" name="width_of_road_front" id="width_of_road_front">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="image">Category Of Land</label>
                            <input type="text" class="form-control-file" name="category_of_land" id="category_of_land">
                        </div>

                    </div>
                        <br>
                        <div class="row">

                        <div class="form-group col-md-4">
                            <label for="image">Facing</label>
                            <input type="text" class="form-control-file" name="facing" id="facing">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="image">Attractive Features</label>
                            <input type="text" class="form-control-file" name="attractive_features" id="attractive_features">
                        </div>


                    </div>
                    <br>


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
