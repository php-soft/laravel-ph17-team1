<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dist/sweetalert.css') }}">
    @yield('css')
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    
</head>
<body>
    <div class="container">
        @include('admin.layouts.menu')
        <div class="clearfix"></div>
        @yield('content')
        <footer style="background-color: #ccc; color: #fff; height: 50px; text-align: right; padding: 1em">
            TEAM 1
        </footer>
    </div>
    <!-- jQuery -->
    <script src="{{url('js/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    @yield('js')
    <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <script src="//code.jquery.com/jquery-1.12.3.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

</body>
</html>
