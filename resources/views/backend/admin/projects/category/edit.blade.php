@extends('backend.layouts.master')
@section("title","Project Category Edit")
@push('css')

@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Project Category Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Project Category Edit</li>
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
                    <h3 class="card-title float-left">Edit Project Category</h3>
                    <div class="float-right">
                        <a href="{{route('admin.category.index')}}">
                            <button class="btn btn-success">
                                <i class="fa fa-backward"> </i>
                                Back
                            </button>
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{route('admin.category.update',$categories->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Project Category Name</label>
                                <input type="name" class="form-control" name="name" id="name" value="{{$categories->name}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="slug">Slug (SEO Url) <small class="text-danger">Change slug
                                        <a href="#" data-toggle="modal" data-target="#exampleModal">Click Here</a></small>
                                </label>
                                <input type="text" id="slug" name="" class="form-control" value="{{$categories->slug}}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" id="meta_title" name="meta_title" class="form-control" value="{{$categories->meta_title}}" placeholder="Enter Meta Title">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="meta_description">Meta Description</label>
                                <textarea id="meta_description" rows="3" name="meta_description" class="form-control">{!! $categories->meta_description !!}</textarea>
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
                    <form action="{{route('admin.category.slug-change')}}" method="post">
                        @csrf
                        <input type="hidden" name="category_id" value="{{$categories->id}}">
                        <div class="form-gorup">
                            <label for="slug">Slug Eidt</label>
                            <input type="text" name="slug" class="form-control" value="{{$categories->slug}}">
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

@endpush
