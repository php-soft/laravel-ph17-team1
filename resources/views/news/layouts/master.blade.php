<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- css news -->
    <link href="{{url('css/index_news.css')}}" rel="stylesheet">
</head>

<body>
    @include('news.layouts.header')
    <div class="container">
        <div class="clearfix"></div>
        @yield('header')
        <div class="clearfix"></div>
        @yield('content')
    </div>
    @include('news.layouts.footer')
    <!-- /#wrapper -->
    
    <!-- jQuery -->
    <script src="{{url('js/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{url('js/bootstrap.min.js')}}"></script>

    @yield('js')

</body>

</html>
