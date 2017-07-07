<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

</head>
<body>
    <div class="container">
        @include('admin.layouts.menu')
        <div class="clearfix"></div>
        @yield('content')
    </div>
    <!-- jQuery -->
    <script src="{{url('js/jquery.min.js')}}"></script>
    <script src="{{url('js/datatable.js')}}"></script>
    <script scr="{{ url('//code.jquery.com/jquery-1.12.4.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{url('js/bootstrap.min.js')}}"></script>

    @yield('js')
</body>
</html>
