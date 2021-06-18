@extends('backend.layouts.master')
@section("title","Team Create")
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
                    <h1>Team Create</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Team Create</li>
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
                    <h3 class="card-title float-left">Team Create</h3>
                    <div class="float-right">
                        <a href="{{route('admin.staff.index')}}">
                            <button class="btn btn-success">
                                <i class="fa fa-backward"> </i>
                                Back
                            </button>
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{route('admin.staff.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group  col-md-6">
                                <label for="title">Team Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Team Name">
                            </div>
                            <div class="form-group  col-md-6">
                                <label for="title">Team  Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Enter Team Email">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="image">Team Image</label>
                                <input type="file" class="form-control-file" name="image" id="image">
                            </div>
{{--                            <div class="form-group col-md-4">--}}
{{--                                <label for="description"> Designation group</label>--}}
{{--                                <select name="designation" id="designation" class="form-control select2">--}}
{{--                                    <option value="Architecture" >Architecture</option>--}}
{{--                                    <option value="Engineering">Engineering</option>--}}
{{--                                    <option value="Administration">Administration</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
                            <div class="form-group  col-md-5">
                                <label for="title">Designation Title</label>
                                <input type="text" class="form-control" name="designation_title" id="designation_title" placeholder="Enter Team designation">
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
