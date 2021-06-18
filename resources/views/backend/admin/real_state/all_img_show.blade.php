@extends('backend.layouts.master')
@section("title","Real State Project Image Edit")
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
                    <h1>Real State Project Image Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Real State Project Image Edit</li>
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
                        <h3 class="card-title float-left">Real State Project Image Edit</h3>
                        <div class="float-right">
                            <a href="{{route('admin.real-estate-project.index')}}">
                                <button class="btn btn-success">
                                    <i class="fa fa-backward"> </i>
                                    Back
                                </button>
                            </a>
                            <button class="btn btn-info" data-toggle="modal" data-target="#addModal">
                                <i class="fa fa-plus-circle"></i>
                                Add More Image
                            </button>

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                        <div class="card-body ">
                            <div class="row">
                                @foreach($galleries as $gallery)
                                    <div class="card col-md-2 m-1">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-{{$gallery->id}}">
                                                    <i class="fa fa-edit"></i>
                                                </button>

                                                <button class="btn btn-danger waves-effect" type="button"
                                                        onclick="deletePost({{$gallery->id}})">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <form id="delete-form-{{$gallery->id}}" action="{{route('admin.real-estate-project-gallery.delete',$gallery->id)}}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card-body" >
                                            <img class="img-thumbnail" src="{{asset('uploads/real_state/gallery/'.$gallery->image)}}" style="height: 80px" alt="">
                                        </div>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal-{{$gallery->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Image</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" action="{{route('admin.real-estate-project-gallery.update',$gallery->id)}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="image">Project Gallery Image <small class="text-danger">(Size: 1920 X 1080)</small></label>
                                                            <input type="file" class="form-control-file" name="gallery_image" id="image">
                                                        </div>

                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                @endforeach


                            </div>


                        </div>
                        <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" action="{{route('real-estate-project.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="project_id" value="{{$projects->id}}">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group ">
                                    <label for="image">Real Estate Project Gallery Image <small class="text-danger">(Size: 1920 X 1080)</small></label>
                                    <input type="file" class="form-control-file"  name="gallery_image[]" id="image" multiple>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')

    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script>

        //sweet alert
        function deletePost(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your Data is save :)',
                        'error'
                    )
                }
            })
        }
    </script>

@endpush
