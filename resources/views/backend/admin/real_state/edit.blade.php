@extends('backend.layouts.master')
@section("title","Real State Project Edit")
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
                    <h1>Real State Project Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Real State Project Edit</li>
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
                        <h3 class="card-title float-left">Real State Project Edit</h3>
                        <div class="float-right">
                            <a href="{{route('admin.real-estate-project.index')}}">
                                <button class="btn btn-success">
                                    <i class="fa fa-backward"> </i>
                                    Back
                                </button>
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.real-estate-project.update',$projects->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group  col-md-6">
                                    <label for="title">Real State Project Title</label>
                                    <input type="text" class="form-control" name="title" value="{{$projects->title}}" id="title" placeholder="Enter Post Title">
                                </div>
                                <div class="form-group  col-md-6">
                                    <label for="title">Project Category Type</label>
                                    <select name="status" id="status" class="form-control select2">
                                        <option value="Completed" {{$projects->status =='Completed' ? 'selected' : ''}}>Completed</option>
                                        <option value="Ongoing" {{$projects->status =='Ongoing' ? 'selected' : ''}}>Ongoing</option>
                                    </select>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <img src="{{asset('uploads/real_state/'.$projects->image)}}" alt="" width="100px;">
                                    <br>
                                    <label for="image">Real Estate Project Landscape Image <small class="text-danger">(Size: 210 X 350)</small></label>
                                    <input type="file" class="form-control-file" name="image" value="{{$projects->image}}" id="image">
                                </div>
                                <div class="form-group col-md-4">
                                    <img src="{{asset('uploads/real_state/thambnails/'.$projects->pro_image)}}" alt="{{$projects->tile}}" width="100px;">
                                    <br>
                                    <label for="image">Real Estate Single Page Image <small class="text-danger">(Size: 1920 X 1080)</small></label>
                                    <input type="file" class="form-control-file" name="pro_image" value="{{$projects->pro_image}}" id="image">

                                </div>

                            </div>
                            <br>
                            <div class="form-group">
                                <label for="description">Project Description</label>
                                <textarea type="text" class="form-control textarea" name="description" id="description" placeholder="Enter Post Title">{{$projects->description}}</textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="description">Project Map</label>
                                <textarea type="text" class="form-control" name="map" id="map" placeholder="Enter Post Title" rows="4">{{$projects->map}}</textarea>
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
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

    <script>
        $('.select2').select2();
        CKEDITOR.replace( 'description' );
    </script>
@endpush
