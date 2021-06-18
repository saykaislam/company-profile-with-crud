@extends('backend.layouts.master')
@section("title","Buyers Show")
@push('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/datatables/dataTables.bootstrap4.css')}}">
@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Buyers Show</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Buyers Show</li>
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

                                @if(!empty($buyers))
                                <tr >
                                    <th>Preferred Location</th>
                                    <td>{{$buyers['preferred_location']}}</td>
                                </tr>
                                <tr>
                                    <th>Preferred Size</th>
                                    <td>{{$buyers['preferred_size']}}</td>
                                </tr>
                                <tr>
                                    <th>Car Parking Requied</th>
                                    <td>{{$buyers['car_parking']}}</td>
                                </tr>
                                <tr>
                                    <th>Expected Handover Date</th>
                                    <td>{{$buyers['expected_handover_date']}}</td>
                                </tr>
                                <tr>
                                    <th>Facing of the Unit</th>
                                    <td>{{$buyers['facing_apartment']}}</td>
                                </tr>
                                <tr>
                                    <th>Preferred Floor</th>
                                    <td>{{$buyers['preferred_floor']}}</td>
                                </tr>
                                <tr>
                                    <th>Minimum Number Of Bed Room</th>
                                    <td>{{$buyers['bedroom']}}</td>
                                </tr>
                                <tr>
                                    <th>Minimum Number Of Bath Room</th>
                                    <td>{{$buyers['bathroom']}}</td>
                                </tr>
                                <tr>
                                    <th>Full Name</th>
                                    <td>{{$buyers['name']}}</td>
                                </tr>
                                <tr>
                                    <th>profession</th>
                                    <td>{{$buyers['profession']}}</td>
                                </tr>
                                <tr>
                                    <th> Contact Number</th>
                                    <td>{{$buyers['mobile_number']}}</td>
                                </tr>
                                <tr>
                                    <th> Email ID</th>
                                    <td>{{$buyers['email']}}</td>
                                </tr>
                                <tr>
                                    <th> Mailing Address</th>
                                    <td>{{$buyers['address']}}</td>
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
