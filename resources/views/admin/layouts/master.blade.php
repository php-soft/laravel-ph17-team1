<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
    <div class="container">
        @include('admin.layouts.menu')
        <div class="clearfix"></div>
        @yield('content')
    </div>
    <!-- jQuery -->
    <script src="{{url('js/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{url('js/bootstrap.min.js')}}"></script>

    @yield('js')
</body>
</html>
