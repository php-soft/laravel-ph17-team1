<div id="logo">
    <div class="row">
        <div class="col-xs-4"><img height="100" width="auto" src="{{url('images/news/pages/logo.jpg')}}" alt=""></div>
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
                <a class="navbar-brand" href="{{ url('news') }}"><span class="fa fa-home"></span></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('news') }}">Tin mới</a></li>
                    <li><a href="#">Sản phẩm</a></li>
                    <li><a href="#">Công nghệ</a></li>
                    <li><a href="#">Mẹo hay</a></li>
                    <li><a href="#">Đánh giá</a></li>
                    <li><a href="#">Game</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Login</a></li>
                </ul>
                </ul>
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Bạn muốn tìm gì?">
                    </div>
                    <button type="submit" class="btn btn-default">Tìm</button>
                </form>            
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
</div>
