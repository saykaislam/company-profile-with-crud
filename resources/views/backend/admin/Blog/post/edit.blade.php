@extends('backend.layouts.master')
@section("title","Post Edit")
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
                    <h1>Post Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Post Edit</li>
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
                        <h3 class="card-title float-left">Edit Post</h3>
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
                    <form role="form" action="{{route('admin.blog-post.update',$post->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{$post->title}}">
                            </div>
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <select name="category_id" id="category_id" class="form-control select2">
                                    @foreach($categories as $cat)
                                        <option value="{{$cat->id}}" {{$cat->id == $post->category_id ? 'selected': ''}}>{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Post Description</label>
                                <textarea type="text" class="form-control textarea" name="description" id="description" placeholder="Enter Post Title">{!! $post->description !!}</textarea>
                            </div>
                            <div class="text-left">
                                <img class="profile-user-img img-fluid"
                                     src="{{asset('uploads/post/'.$post->image)}}"
                                     alt="User profile picture">
                            </div>
                            <div class="form-group">
                                <label for="image">Post Image</label>
                                <input type="file" class="form-control-file" name="image" id="image">
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
