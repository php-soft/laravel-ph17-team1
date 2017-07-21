<!DOCTYPE html>
<html>
<head>
    <title>Giới thiệu công ty</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="/public/css/container.css">
</head>
<body>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Logo</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Danh Mục <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Iphone</a></li>
                <li><a href="#">SamSung</a></li>
                <li><a href="#">HTC</a></li>
              </ul>
            </li>
            <li><a href="#">Điện thoại</a></li>
            <li><a href="#">Tin Công Nghệ</a></li>
          </ul>
          <ul class="nav navbar-nav">
            <li><a href="#">Hỏi đáp</a></li>
            <li><a href="#">Review</a></li>
            <li><a href="#">Khuyến mãi</a></li>
             <li><a href="#">Tra bảo hành</a></li>
             <li><a href="#">Mua trả góp</a></li>
             <li><a href="#">Giới thiệu</a></li>
          </ul>
          <form class="navbar-form navbar-left">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Tìm</button>
          </form>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-3"'>
                <a href="">Trang chủ</a> <span class="glyphicon glyphicon-chevron-right"></span> <a href=""> Giới thiệu </a>
                <ul class="list-group"  style='padding-top: 40px'; >
                    <li class="list-group-item"><a href="{{url('introduce')}}">Giới thiệu</a><span class="glyphicon glyphicon-chevron-right pull-right"></li>
                    <li class="list-group-item"><a href="{{url('warranty')}}">Tra bảo hành</a><span class="glyphicon glyphicon-chevron-right pull-right"></li>
                    <li class="list-group-item"><a href="{{url('installment')}}">Thông tin trả góp</a><span class="glyphicon glyphicon-chevron-right pull-right"></li>
                    <li class="list-group-item"><a href="{{url('regulation')}}">Quy chế hoạt động</a><span class="glyphicon glyphicon-chevron-right pull-right"></li>
                    <li class="list-group-item"><a href="">Nội quy công ty</a><span class="glyphicon glyphicon-chevron-right pull-right"></li>
                </ul>
            </div>
            <div class="col-md-9">
            @yield('content')
            </div>
        </div>
    </div>
    <!--footer-->
    
</body>
</html> 