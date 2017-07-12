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
    <footer class="footer1">
    <div class="container-fluid">
    <div class="row"><!-- row -->
        <div class="col-lg-3 col-md-3"><!-- widgets column left -->
        <ul class="list-unstyled clear-margins"><!-- widgets -->
            <li class="widget-container widget_nav_menu"><!-- widgets list -->
                <h1 class="title-widget">Bạn cần</h1>
                    <ul>
                        <li><a  href="#"><i class="fa fa-angle-double-right"></i> Về trang chủ</a></li>
                        <li><a  href="#"><i class="fa fa-angle-double-right"></i> Liên hệ với chúng tôi </a></li>
                        <li><a  href="{{url('installment')}}"><i class="fa fa-angle-double-right"></i> Trả góp</a></li>
                        <li><a  href="{{url('introduce')}}"><i class="fa fa-angle-double-right"></i> Giới thiệu</a></li>
                    </ul>
            </li>
        </ul>
        </div><!-- widgets column left end -->
        <div class="col-lg-3 col-md-3"><!-- widgets column left -->
        <ul class="list-unstyled clear-margins"><!-- widgets -->
            <li class="widget-container widget_nav_menu"><!-- widgets list -->
                <h1 class="title-widget">Liên quan</h1>
                    <ul>
                        <li><a  href="#"><i class="fa fa-angle-double-right"></i>  Sản phẩm mới</a></li>
                        <li><a  href="#"><i class="fa fa-angle-double-right"></i>  Top sản phẩm bán chạy</a></li>
                        <li><a  href="#"><i class="fa fa-angle-double-right"></i>  Top sản phẩm hot</a></li>
                        <li><a  href="#"><i class="fa fa-angle-double-right"></i>  Top sản phẩm hot</a></li>
                    </ul>
            </li>
        </ul>
        </div><!-- widgets column left end -->
        <div class="col-lg-3 col-md-3"><!-- widgets column left -->
        <ul class="list-unstyled clear-margins"><!-- widgets -->
            <li class="widget-container widget_nav_menu"><!-- widgets list -->
                <h1 class="title-widget">Tin công nghệ</h1>
                    <ul>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> Mẹo hay cho bạn</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> Tin mới</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> Hỏi đáp</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i> Review</a></li>
                     </ul>
            </li>
        </ul>
        </div><!-- widgets column left end -->
        <div class="col-lg-3 col-md-3"><!-- widgets column center -->
        <ul class="list-unstyled clear-margins"><!-- widgets -->
            <li class="widget-container widget_recent_news"><!-- widgets list -->
                <h1 class="title-widget">Kết nối </h1>
                    <div class="footerp"> 
                        <h2 class="title-median">Di dộng</h2>
                            <p><b>Email:</b> <a href="mailto:info@didong.com">info@didong.com</a></p>
                            <p><b>Giúp đỡ </b>
                            <b style="color:#ffc106;">(8AM to 10PM):</b>  678903485048  </p>
                            <p><b>Phone Numbers : </b>345678909, </p>
                            <p> 0963211037</p>
                    </div>
                    <div class="social-icons">
                        <ul class="nomargin">
                            <a href="#"><i class="fa fa-facebook-square fa-3x social-fb" id="social"></i></a>
                            <a href="#"><i class="fa fa-twitter-square fa-3x social-tw" id="social"></i></a>
                            <a href="#"><i class="fa fa-google-plus-square fa-3x social-gp" id="social"></i></a>
                            <a href="#"><i class="fa fa-envelope-square fa-3x social-em" id="social"></i></a>
                         </ul>
                     </div>
             </li>
        </ul>
        </div>
        </div>
    </div>
    </footer>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="copyright">
                        © 2017, Team1, All rights reserved
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="design">
                         <a href="#">Việt Nam </a> |  <a target="_blank" href="#"> Team 1 PHP 17</a>
                    </div>
                </div>
            </div>
        </div>
</body>
</html> 