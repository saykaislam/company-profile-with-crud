@extends('backend.layouts.master')
@section("title","Image Create")
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
                    <h1>Image, Video link or File Create</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Image Create</li>
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
                    <div class="card-header p-2">
{{--                        <h3 class="card-title float-left">Image Create</h3>--}}
{{--                        <div class="float-right">--}}
{{--                            <a href="{{route('admin.customer.show',$customer->id)}}">--}}
{{--                                <button class="btn btn-success">--}}
{{--                                    <i class="fa fa-backward"> </i>--}}
{{--                                    Back--}}
{{--                                </button>--}}
{{--                            </a>--}}
{{--                        </div>--}}
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#image" data-toggle="tab">Upload Image</a></li>
                            <li class="nav-item"><a class="nav-link" href="#video_link" data-toggle="tab">Upload Video Link</a></li>
                            <li class="nav-item"><a class="nav-link" href="#pdf" data-toggle="tab">Upload Other files</a></li>
                        </ul>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
{{--                    <form role="form" action="{{route('admin.customer-image.store',$customer->id)}}" method="post" enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="row">--}}
{{--                                <div class="form-group col-md-4">--}}
{{--                                    <label for="image">Customer Image </label>--}}
{{--                                    <input type="file" class="form-control-file" name="image" id="image">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="form-group col-md-4">--}}
{{--                                    <label for="image">Other files<span>(video link / catfile / pdf)</span> </label>--}}
{{--                                    <input type="file" class="form-control-file" name="image" id="image">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="form-group col-md-8">--}}
{{--                                    <label for="url">URL</label>--}}
{{--                                    <input type="text" class="form-control" name="url" placeholder="url" id="image">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <!-- /.card-body -->--}}
{{--                            <div class="card-footer">--}}
{{--                                <button type="submit" class="btn btn-primary">Submit</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="image" >
                                <form role="form" action="{{route('admin.customer-image.store',$customer->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 col-form-label">Image Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Image Title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control-file" name="image" id="image">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Message</label>
                                        <div class="col-sm-6">
                                        <textarea id="message" name="message" rows="5" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="video_link">
                                <form role="form" action="{{route('admin.customer-image.store',$customer->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 col-form-label">Video Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Video Title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="url" class="col-sm-2 col-form-label">Video URL</label>
                                        <div class="col-sm-10">
                                            <input type="url" class="form-control" name="url" id="url" placeholder="Enter Video Link">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Message</label>
                                        <div class="col-sm-6">
                                            <textarea id="message" name="message" rows="5" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="pdf">
                                <form role="form" action="{{route('admin.customer-image.store',$customer->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 col-form-label">File Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter File Title">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="other_files" class="col-sm-2 col-form-label">File</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control-file" name="other_files" id="other_files">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Message</label>
                                        <div class="col-sm-6">
                                            <textarea id="message" name="message" rows="5" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
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
