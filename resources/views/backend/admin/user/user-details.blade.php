@extends('backend.layouts.master')
@section("title","User List")
@push('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables/dataTables.bootstrap4.css')}}">
@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Users List</li>
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
                        <h3 class="card-title float-left">User Lists</h3>
                        <div class="float-right">

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#Id</th>
                                <th>Name</th>
                                <th>Email</th>
{{--                                <th>Image</th>--}}
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
{{--        @if(Auth::user()->role_id == 3)--}}
                            @foreach($user as $key => $user)

                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>

{{--                                    <td>--}}
{{--                                        <img src="{{asset('uploads/propic/'.$user->image)}}" width="90" height="50" alt="">--}}
{{--                                    </td>--}}
                                    <td>
                                        <a class="btn btn-info waves-effect" href="{{route('admin.userDetails.show',$user->id)}}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a class="btn btn-info waves-effect" href="{{route('admin.userDetails.edit',$user->id)}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button class="btn btn-danger waves-effect" type="button"
                                                onclick="deletePost({{$user->id}})">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <form id="delete-form-{{$user->id}}" action="{{route('admin.userDetails.destroy',$user->id)}}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
{{--@endif--}}
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#Id</th>
                                <th>Name</th>
                                <th>Email</th>
{{--                                <th>Image</th>--}}
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
