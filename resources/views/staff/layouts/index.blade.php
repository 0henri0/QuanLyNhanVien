<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Data Tables</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>




    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

@include('staff.layouts.header')
@include('staff.layouts.left-menu')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err) {{$err}}
                <br> @endforeach()
            </div>
        @endif @if(session('notify'))
            <div class="alert alert-success">
                {{session('notify')}}
            </div>
        @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            @endif
        @yield('content')
    </div>
    <!-- /.content-wrapper -->
@include('staff.layouts.footer')

<!-- Control Sidebar -->
    @include('staff.layouts.control-sidebar')
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<script src="{{ asset('/js/app.js') }}" charset="utf-8"></script>
<!-- page script -->
@yield('script')
@yield('css')
</body>
</html>
