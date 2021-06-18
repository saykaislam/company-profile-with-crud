@extends('backend.layouts.master')
@section("title","Equipment Edit")
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
                    <h1>Equipment Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Equipment Edit</li>
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
                        <h3 class="card-title float-left">Edit Equipment</h3>
                        <div class="float-right">
                            <a href="{{route('admin.equipments.index')}}">
                                <button class="btn btn-success">
                                    <i class="fa fa-backward"> </i>
                                    Back
                                </button>
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.equipments.update',$equipment->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group  col-md-6">
                                    <label for="title">Equipment Title</label>
                                    <input type="text" class="form-control" name="title" value="{{$equipment->title}}" id="title">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="slug">Slug (SEO Url) <small class="text-danger">Change slug
                                            <a href="#" data-toggle="modal" data-target="#exampleModal">Click Here</a></small>
                                    </label>
                                    <input type="text" id="slug" name="" class="form-control" value="{{$equipment->slug}}" readonly>
                                </div>
{{--                                <div class="form-group  col-md-6">--}}
{{--                                    <label for="title">Service Category Title</label>--}}
{{--                                    <select name="category_id" id="category_id" class="form-control select2">--}}
{{--                                        @foreach($categories as $cat)--}}
{{--                                            <option value="{{$cat->id}}" {{$cat->id == $service->category_id ? 'selected' : ''}}>{{$cat->name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
                            </div><br>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <img src="{{asset('uploads/equipment/'.$equipment->image)}}" alt="" width="100px;">
                                    <label for="image">Equipment Image Details <small class="text-danger">(Size: 870 X 576)</small></label>
                                    <input type="file" class="form-control-file" name="image" value="{{$equipment->image}}" id="image">
                                </div>
                                <div class="form-group col-md-4">
                                    <img src="{{asset('uploads/equipment/thambnails/'.$equipment->pro_image)}}" alt="" width="100px;">
                                    <label for="image">Equipment Image <small class="text-danger">(Size: 370 X 276)</small> </label>
                                    <input type="file" class="form-control-file" name="pro_image" value="{{$equipment->pro_image}}" id="image">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="image_alt">Image Alt</label>
                                    <input type="text" id="image_alt" name="image_alt" class="form-control" value="{{$equipment->image_alt}}">
                                </div>
                            </div>
                            <br>
                            <div class="form-group ">
                                <label for="description">Equipment Description</label>
                                <textarea type="text" class="form-control textarea" name="description" id="description">{!! $equipment->description !!}</textarea>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" id="meta_title" name="meta_title" class="form-control" value="{{$equipment->meta_title}}" placeholder="Enter Meta Title">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea id="meta_description" rows="3" name="meta_description" class="form-control">{!! $equipment->meta_description !!}</textarea>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">SEO URL</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Please Change it very carefully.</p>
                    <form action="{{route('admin.equipments.slug-change')}}" method="post">
                        @csrf
                        <input type="hidden" name="equipment_id" value="{{$equipment->id}}">
                        <div class="form-gorup">
                            <label for="slug">Slug Eidt</label>
                            <input type="text" name="slug" class="form-control" value="{{$equipment->slug}}">
                        </div>
                        <br>
                        <button class="btn btn-success" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@stop
@push('js')
    <script src="{{asset('backend/plugins/select2/select2.full.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script>
        //Initialize Select2 Elements
        $('.select2').select2();
        CKEDITOR.replace( 'description' );
    </script>

@endpush
