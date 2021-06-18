@extends('backend.layouts.master')
@section("title","Land Owner Show")
@push('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables/dataTables.bootstrap4.css')}}">
@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Land Owner Show</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Land Owner Show</li>
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
                        <h3 class="card-title float-left"></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">

                            <tbody class="col-6">

                                @if(!empty($landOwner))
                                <tr >
                                    <th>Locality</th>
                                    <td>{{$landOwner['locality']}}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{$landOwner['address']}}</td>
                                </tr>
                                <tr>
                                    <th>Size of land</th>
                                    <td>{{$landOwner['size_of_land']}}</td>
                                </tr>
                                <tr>
                                    <th>Width Of Road Front</th>
                                    <td>{{$landOwner['width_of_road_front']}}</td>
                                </tr>
                                <tr>
                                    <th>Category Of Land</th>
                                    <td>{{$landOwner['category_of_land']}}</td>
                                </tr>
                                <tr>
                                    <th>Facing</th>
                                    <td>{{$landOwner['facing']}}</td>
                                </tr>
                                <tr>
                                    <th>Attractive Features</th>
                                    <td>{{$landOwner['attractive_features']}}</td>
                                </tr>
                                <tr>
                                    <th>Name Of Land Owner</th>
                                    <td>{{$landOwner['name']}}</td>
                                </tr>
                                <tr>
                                    <th>Contact Person</th>
                                    <td>{{$landOwner['contact_person']}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{$landOwner['email']}}</td>
                                </tr>
                                <tr>
                                    <th> Contact Number</th>
                                    <td>{{$landOwner['mobile_number']}}</td>
                                </tr>

                                @endif


                            </tbody>

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
