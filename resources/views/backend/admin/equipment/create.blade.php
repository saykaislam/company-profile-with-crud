@extends('backend.layouts.master')
@section("title","Equipment Create")
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
                    <h1>Equipment Create</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Equipment Create</li>
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
                        <h3 class="card-title float-left">Create Equipment</h3>
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
                    <form role="form" action="{{route('admin.equipments.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group  col-md-6">
                                    <label for="title">Equipment Title</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Equipment Title">
                                </div>
{{--                                <div class="form-group  col-md-6">--}}
{{--                                    <label for="title">Service Category Title</label>--}}
{{--                                    <select name="category_id" id="category_id" class="form-control select2">--}}
{{--                                        @foreach($servCats as $cat)--}}
{{--                                            <option value="{{$cat->id}}">{{$cat->name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
                            </div><br>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="image">Equipment Image Details <small class="text-danger">(Size: 870 X 576 )</small></label>
                                    <input type="file" class="form-control-file" name="image" id="image">
                                </div>
                                <div class="form-group col-md-4">

                                    <label for="image">Equipment Image <small class="text-danger">(Size: 370 X 276)</small></label>
                                    <input type="file" class="form-control-file" name="pro_image"  id="image">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="image_alt">Image Alt</label>
                                    <input type="text" id="image_alt" name="image_alt" class="form-control">
                                </div>

                                {{--                                <div class="form-group col-md-4">--}}
                                {{--                                    <label for="image">Service Gallery Image <small class="text-danger">(Size: 1920 X 1080 )</small></label>--}}
                                {{--                                    <input type="file" class="form-control-file"  name="gallery_image[]" id="image" multiple>--}}
                                {{--                                </div>--}}

                            </div>
                            <br>
                            <div class="form-group">
                                <label for="description">Equipment Description</label>
                                {{--                            <textarea type="text" class="form-control textarea" name="description" id="description" placeholder="Enter Post Title"></textarea>--}}
                                <textarea id="description" name="description" class="form-control"></textarea>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" id="meta_title" name="meta_title" class="form-control" placeholder="Enter Meta Title">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea id="meta_description" rows="3" name="meta_description" class="form-control"></textarea>
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
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

    <script>
        $('.select2').select2();
        CKEDITOR.replace( 'description' );
    </script>

@endpush
