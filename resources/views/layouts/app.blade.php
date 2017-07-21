<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/seemore.css') }}" rel="stylesheet"><!-- css seemore -->
    <link href="{{ asset('css/vote-input.css') }}" rel="stylesheet"><!-- css voteinput -->
    <link href="{{ asset('css/rating5star.css') }}" rel="stylesheet"><!-- css rating5star -->
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
    <link href="{{ asset('css/product.css') }}" rel="stylesheet">
    <link href="{{ asset('css/detail-product.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{url('css/index_news.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('dist/sweetalert.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <li><a href="{{ url('products') }}">Điện thoại</a></li>
                        <li><a href="{{ url('news') }}">Tin tức</a></li>
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Đơn hàng
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/tim-kiem-hoa-don"><span class="glyphicon glyphicon-search"></span> Tìm kiếm đơn hàng</a>
                                    </li>
                                    <li>
                                        <a href="/quan-ly-don-hang"><span class="glyphicon glyphicon-th-list"></span> Quản lý đơn hàng</a>
                                    </li>
                                </ul>
                            </li> 
                            <li>
                                <a href="/gio-hang"><span class="glyphicon glyphicon-shopping-cart"> </span> Giỏ hàng</a>
                            </li>
                        @else
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Đơn hàng
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/tim-kiem-hoa-don"><span class="glyphicon glyphicon-search"></span> Tìm kiếm đơn hàng</a>
                                    </li>
                                    <li>
                                        <a href="/quan-ly-don-hang"><span class="glyphicon glyphicon-th-list"></span> Quản lý đơn hàng</a>
                                    </li>
                                </ul>
                            </li> 
                            <li>
                                <a href="/gio-hang"><span class="glyphicon glyphicon-shopping-cart"> </span> Giỏ hàng</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>

    <footer class="footer1">
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
                <ul class="list-unstyled clear-margins" style="width: 265px;"><!-- widgets -->
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
                    <div class="design" style="float: right;">
                         <a href="#">Việt Nam </a> |  <a target="_blank" href="#"> Team 1 PHP 17</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
    <script src="//code.jquery.com/jquery-1.12.3.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <!-- script toastr alert -->
    <script src="{{asset('js/toastr.min.js')}}"></script>
    <!-- datatable thien -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script>
        @if(Session::has('message'))
            toastr.success("{{Session::get('message')}}")
        @endif
    </script>
</body>
</html>