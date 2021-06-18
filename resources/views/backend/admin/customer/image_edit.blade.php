@extends('backend.layouts.master')
@section("title","Image Edit")
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
                    <h1>Image, Video link or File Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Image Edit</li>
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
                @if($customer_image->type == 'image')
                <div class="card card-info card-outline">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link">Edit Image</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane">
                                <form role="form" action="{{route('admin.customer-image.update',$customer_image->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 col-form-label">Image Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Image Title" value="{{$customer_image->title}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <label for="inputName2" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <img src="{{url($customer_image->image)}}" width="80" height="80">
                                            <input type="file" class="form-control-file" name="image" id="image">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Message</label>
                                        <div class="col-sm-6">
                                            <textarea id="message" name="message" rows="5" class="form-control">{!! $customer_image->message !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                @elseif($customer_image->type == 'url')
                    <div class="card card-info card-outline">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link">Edit Video</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane">
                                    <form role="form" action="{{route('admin.customer-image.update',$customer_image->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="title" class="col-sm-2 col-form-label">Video Title</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Image Title" value="{{$customer_image->title}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="url" class="col-sm-2 col-form-label">Video URL</label>
                                            <div class="col-sm-10">
                                                <input type="url" class="form-control" name="url" id="url" placeholder="Enter Video Link" value="{{$customer_image->url}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Message</label>
                                            <div class="col-sm-6">
                                                <textarea id="message" name="message" rows="5" class="form-control">{!! $customer_image->message !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                @else
                    <div class="card card-info card-outline">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link">Edit Other files</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane">
                                    <form role="form" action="{{route('admin.customer-image.update',$customer_image->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="title" class="col-sm-2 col-form-label">File Title</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Image Title" value="{{$customer_image->title}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Other File</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control-file" name="image" id="image" value="{{$customer_image->other_files}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Message</label>
                                            <div class="col-sm-6">
                                                <textarea id="message" name="message" rows="5" class="form-control">{!! $customer_image->message !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                @endif
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
