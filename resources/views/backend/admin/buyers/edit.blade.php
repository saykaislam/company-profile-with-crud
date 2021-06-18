@extends('backend.layouts.master')
@section("title","Buyers Edit")
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
                    <h1>Buyers Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Buyers Edit</li>
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
                        <h3 class="card-title float-left">Edit Buyers</h3>
                        <div class="float-right">
                            <a href="{{route('admin.buyers.index')}}">
                                <button class="btn btn-success">
                                    <i class="fa fa-backward"> </i>
                                    Back
                                </button>
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.buyers.update',$buyers->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group  col-md-4">
                                    <label for="title">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$buyers->name}}" id="name" placeholder="Enter Post Title">
                                </div>
                                <div class="form-group  col-md-4">
                                    <label for="title">email</label>
                                    <input type="text" class="form-control" name="email" value="{{$buyers->email}}" id="email" placeholder="Enter Post Title">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="title"> profession </label>
                                    <input type="text" class="form-control" name="profession" value="{{$buyers->profession}}" id="profession" placeholder="Enter Post Title">
                                </div>
                            </div>
                            <br>
                            <div class="row">

                                <div class="form-group col-md-3">
                                    <label for="image">Address</label>
                                    <input type="text" class="form-control-file" name="address" value="{{$buyers->address}}" id="address">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="image">Contact Number</label>
                                    <input type="text" class="form-control-file" name="mobile_number" value="{{$buyers->mobile_number}}" id="mobile_number">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="image">Preferred Location</label>
                                    <input type="text" class="form-control-file" name="preferred_location" value="{{$buyers->preferred_location}}" id="preferred_location">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="image">Preferred Size</label>
                                    <input type="text" class="form-control-file" name="preferred_size" value="{{$buyers->preferred_size}}" id="preferred_size">
                                </div>

                            </div>
                            <br>

                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label for="image">Car Parking</label>
                                    <input type="text" class="form-control-file" name="car_parking" value="{{$buyers->car_parking}}" id="car_parking">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="image">Expected Handover Date</label>
                                    <input type="text" class="form-control-file" name="expected_handover_date" value="{{$buyers->expected_handover_date}}" id="expected_handover_date">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="image">Facing Apertment</label>
                                    <input type="text" class="form-control-file" name="facing_apartment" value="{{$buyers->facing_apartment}}" id="facing_apartment">
                                </div>

                            </div>
                            <br>
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label for="image">Preferred Floor</label>
                                    <input type="text" class="form-control-file" name="preferred_floor" value="{{$buyers->preferred_floor}}" id="preferred_floor">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="image">Bed Room</label>
                                    <input type="text" class="form-control-file" name="bedroom" value="{{$buyers->bedroom}}" id="bedroom">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="image">Bath Room</label>
                                    <input type="text" class="form-control-file" name="bathroom" value="{{$buyers->bathroom}}" id="bathroom">
                                </div>

                            </div>
                            <br>

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
