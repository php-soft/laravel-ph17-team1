<div style="background-color: #fff">
    <div id="logo">
        <div class="row">
            <div class="col-xs-4"><img height="100" width="auto" src="{{url('images/news/pages/logo.jpg')}}" alt=""></div>
        </div>
    </div>
</div>
<div id="header">
    <nav id="header-container" class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('news') }}"><span class="glyphicon glyphicon-home"></span></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a class="btn btn-link label-warning" href="{{ url('news/listnew/tin-tuc') }}">Tin tức</a></li>
                    <li><a class="btn btn-link label-success" href="{{ url('news/listnew/san-pham') }}">Sản phẩm</a></li>
                    <li><a class="btn btn-link label-primary" href="{{ url('news/listnew/meo-hay') }}">Mẹo hay</a></li>
                    <li><a class="btn btn-link label-danger" href="{{ url('news/listnew/danh-gia') }}">Đánh giá</a></li>
                    <li><a class="btn btn-link label-success" href="{{ url('news/listnew/game-app') }}">Game</a></li>
                    <li><a class="btn btn-link label-warning" href="{{ url('products') }}">Mua điện thoại</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                            <li><a href="{{ route('register') }}">Đăng ký</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu" style="background: #3B5998">
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
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
</div>
