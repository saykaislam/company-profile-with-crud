 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title') |UAV </title>
    <link rel="shortcut icon" href="">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('backend/plugins/font-awesome/css/font-awesome.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    {{--toastr js--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    @stack('css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
        @include('backend.includes.header')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->

    @if(Auth::check() && Auth::user()->role_id == 1)
    @include('backend.includes.admin_sidebar')
    @endif

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
       @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    @include('backend.includes.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('backend/dist/js/demo.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="{{asset('backend/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jVectorMap -->
<script src="{{asset('backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{asset('backend/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS 1.0.2 -->
<script src="{{asset('backend/plugins/chartjs-old/Chart.min.js')}}"></script>

<!-- PAGE SCRIPTS -->
<script src="{{asset('backend/dist/js/pages/dashboard2.js')}}"></script>
<script src="{{asset('backend/plugins/form.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
<script>
    @if($errors->any())
    @foreach($errors->all() as $error )
    toastr.error('{{$error}}','Error',{
        closeButton:true,
        progressBar:true
    });
    @endforeach
    @endif
</script>
@stack('js')
</body>
</html>
