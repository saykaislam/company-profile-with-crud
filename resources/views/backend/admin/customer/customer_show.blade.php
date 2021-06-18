@extends('backend.layouts.master')
@section("title","Customer Image/Video link/Otherss List")
@push('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables/dataTables.bootstrap4.css')}}">
@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Customer Image/Video link/Others List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Customer Image/Video link/Others List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title float-left">Image/Video link/Others List</h3>
                        <div class="float-right">
                            <a href="{{route('admin.customer-image.create',$customer->id)}}">
                                <button class="btn btn-success">
                                    <i class="fa fa-plus-circle"></i>
                                    Add
                                </button>
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#Id</th>
                                <th>Title</th>
                                <th>Image/Video link/Others</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customer_images as $key => $customer_image)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$customer_image->title}}</td>
                                    <td>
                                        @if($customer_image->type == 'image')
                                        <img src="{{url($customer_image->image)}}" width="80" height="40" alt="">
                                        @elseif($customer_image->type == 'url')
                                            <a href="{{$customer_image->url}}" class="btn btn-info waves-effect"><i class="fa fa-video-camera"></i></a>
                                        @else
                                            <a href="{{url($customer_image->other_files)}}" class="btn btn-success waves-effect"><i class="fa fa-file-pdf-o"></i></a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.customer-image.edit',$customer_image->id)}}" class="btn btn-info waves-effect"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-danger waves-effect" type="button"
                                                onclick="deletePost({{$customer_image->id}})">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <form id="delete-form-{{$customer_image->id}}" action="{{route('admin.customer-image.destroy',$customer_image->id)}}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#Id</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>

@stop
@push('js')
    <script src="{{asset('backend/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('backend/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });

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
