@extends('news.layouts.master')
@section('title')
    {{ $n->title }}
@stop
@section('css')
    <link href="{{url('css/news-detail.css')}}" rel="stylesheet">
@stop
@section('content')
    <div class="row">
        <div class="col-md-offset-2 col-xs-12 col-sm-12 col-md-7 col-lg-8">
            <h4>
                <a class="btn btn-link label-primary" style="color: #FFF" href="{{ url('news') }}">Trang chủ</a></span> <a class="btn btn-link label-warning" style="color: #FFF" href="{{ url('news/listnew/'.$n->listNew->slug) }}">{{$n->listNew->name}}</a>
            </h4>
                <h1 class="titledetail" >{{ $n->title }}</h1>
            <div class="pull-right">
                @if (isset($n->created_at))
                    <span class="glyphicon glyphicon-time color-777"></span> <span class="color-777">{{ $n->created_at->diffForHumans() }}</span>
                @endif
                <span style="margin-left: 20px;" class="glyphicon glyphicon-sunglasses color-777"></span><span class="color-777"> {{ $n->view }} lượt xem</span>    
            </div>
            <div class="clearfix" style="border-bottom: 1px dotted #d9d9d9; margin-bottom: 20px"></div>
            <div class="content">{!! $n->content !!}</div>
            <div class="clearfix"></div>
            <hr>
            <h4>
                <span class="glyphicon glyphicon-tags"> </span> <strong>Tags:</strong>
                @foreach ($n->tags as $tag)
                    <a class="btn btn-link label-success" style="color: #fff" href="{{url('news/tag/'.$tag->id)}}">{{ $tag->name }}</a>
                @endforeach
            </h4>

            <div style="margin-bottom: 30px">
                <div class="color-777" id="comment" style="line-height: 25px; padding: 4px;padding-left: 0; font-weight: bold; font-size: 20px; margin-top: 50px">Bình luận <span id="sum-comments">({{ count($n->comments) }})</span>
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h5>
                    @if (Auth::guest())
                        <label class="label-warning label label-xs">Đăng nhập để bình luận</label> <button class="btn btn-danger btn-xs" id="login">Đăng nhập</button>
                    @else
                        {{ Auth::user()->name }}
                    @endif
                </h5>
                <input type="hidden" name="onload" id="onload" value="0">
                <form action="{{ url('news/comment/'.$n->id) }}" style="margin-bottom: 10px;" class="comment_input" id="comment_input" method="POST" enctype="multipart/form-data">
                    <div class="input-group">
                        <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" id="news_id" name="news_id" value="{{ $n->id }}">
                        <input name="comment_content" id="comment_content" type="text" class="form-control input-sm" placeholder="Nhập nội dung bình luận tại đây">
                        <span class="input-group-btn">
                            <button @if (Auth::guest()) disabled=disable @endif type="submit" class="btn btn-primary btn-sm">Bình luận</button>
                        </span>
                    </div>
                </form>
                <input type="hidden" name="sum_comments" id="sum_comments" value="{{ count($n->comments) }}">
                <input type="hidden" name="sum_comments_load" id="sum_comments_load" value="1">
                <div id="comment_box">
                 @include('news.comment')
                </div>

                <buton id='view_more' type='text' class='btn btn-block btn-default pull-left <?php if (count($n->comments) < 6) echo "hidden"; ?>'>Xem thêm</buton>
                <div class="clearfix"></div>
                <br>
                <div class="tabbable-panel">
                    <div class="tabbable-line">
                        <ul class="nav nav-tabs ">
                            <li class="active">
                                <a href="#tab_default_1" data-toggle="tab">
                                Tin cùng chuyên mục </a>
                            </li>
                            <li>
                                <a href="#tab_default_2" data-toggle="tab">
                                Tin tức khác </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_default_1">

                                <div id="myCarouselWrapper" class="container-fluid" style="padding: 0">

                                    <div id="myCarousel" class="carousel slide" style="padding: 0">

                                            <div class="carousel-inner" role="listbox">

                                                @php
                                                    $i=0;
                                                @endphp
                                                @foreach($news as $n)
                                                    <div @if ($i == 0) class="item active" @else class="item"  @endif style="margin-left: 3px">
                                                        <div class="item-item col-md-3 col-sm-4">
                                                            <a href="{{url('news/'.$n->slug)}}"><img src="{{url('uploads/news/'.$n->image)}}" class="img-responsive"></a>
                                                            <h4><a style="color: #777" href="{{url('news/'.$n->slug)}}">{{ $n->title }}</a></h4>
                                                        </div>
                                                    </div>
                                                    @php
                                                        $i++;
                                                    @endphp
                                                @endforeach

                                            </div>

                                            <!-- Controls -->
                                            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                    </div>

                                </div>

                            </div>
                            <div class="tab-pane" id="tab_default_2">
                                <div id="myCarouselWrapper2" class="container-fluid" style="padding: 0">

                                    <div id="myCarousel2" class="carousel slide" style="padding: 0">

                                            <div class="carousel-inner" role="listbox">

                                                @php
                                                    $i=0;
                                                @endphp
                                                @foreach($otherNews as $n)
                                                    <div @if ($i == 0) class="item active" @else class="item"  @endif style="margin-left: 3px">
                                                        <div class="item-item col-md-3 col-sm-4">
                                                            <a href="{{url('news/'.$n->slug)}}"><img src="{{url('uploads/news/'.$n->image)}}" class="img-responsive"></a>
                                                            <h4><a style="color: #777" href="{{url('news/'.$n->slug)}}">{{ $n->title }}</a></h4>
                                                        </div>
                                                    </div>
                                                    @php
                                                        $i++;
                                                    @endphp
                                                @endforeach

                                            </div>

                                            <!-- Controls -->
                                            <a class="left carousel-control" href="#myCarousel2" role="button" data-slide="prev">
                                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="right carousel-control" href="#myCarousel2" role="button" data-slide="next">
                                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="clearfix"></div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">ĐĂNG NHẬP</h4>
                    </div>
                    <div class="modal-body">

                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Login
                                        </button>

                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        /*view more*/
            $('#view_more').on('click', function () {
                var onload = $('#onload').val();
                if (onload == 0) {
                    $('#onload').val('1');
                    var sum = $('#sum_comments').val();
                    var sum_load = $('#sum_comments_load').val();
                    var news_id = $('#news_id').val();
                    var url = "{{ url('news/comment/load') }}" + "/" + news_id;
                    var ht = $('#comment_box').html();
                    $('#view_more').html("<span class='glyphicon glyphicon-repeat'></span> Đang tải...");
                    $.ajax({
                        url: url,
                        type: 'post',

                        data: { 'sum': sum,
                                'sum_load': sum_load,
                                'news_id': news_id,
                        },
                        dataType: 'JSON',
                        success: function (data){
                            if (sum <= data.sum_load * 5) {
                                $('#view_more').attr('class', 'hidden');
                            }
                            $('#sum_comments_load').val(data.sum_load);
                            $('#comment_box').html(ht + data.view);
                            $('#view_more').html("Xem thêm");
                            $('#onload').val('0');
                        },
                        error: function (error) {
                            $('#onload').val('0');
                            alert('Lỗi; ' + eval(error));
                        }
                    });
                }
            });
        }); 
/*Comment*/
        $(document).on('submit', '#comment_input', function (e) {
            var onload = $('#onload').val();
            if (onload == 0) {
                $('#onload').val('1');
                var sum = $('#sum_comments').val();
                var news_id = $('#news_id').val();
                var comment_content = $('#comment_content').val();
                var url = "{{ url('news/comment') }}" + "/" + news_id;
                if (comment_content === "") {
                    alert("Bạn chưa nhập nội dung bình luận");
                }
                else {
                    var string = "<button class='btn btn-block btn-default'><span class='glyphicon glyphicon-repeat'></span> Đang tải...</button>" + $('#comment_box').html();
                    $('#comment_box').html(string);
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: { 'content': comment_content,
                                'sum': sum,
                                'news_id': news_id,},
                        dataType: 'JSON',
                        success: function (data){
                            $('#comment_box').html(data.view);
                            $('#sum_comments').val(data.sum);
                            $('#sum-comments').html("(" + data.sum + ")");
                            $('#sum_comments_load').val("1");
                            if ( data.sum > 5 ) {
                                $('#view_more').attr('class', 'btn btn-block btn-default pull-left');
                            }
                            $('#onload').val('0');
                        },
                        error: function (error) {
                            $('#onload').val('0');
                            alert('Lỗi; ' + eval(error));
                        }
                    });
                }
            }
            return false;
        });

/*Delete Comment*/
        $(document).on('click', '.delete-comment', function () {
            var onload = $('#onload').val();
            if (onload == 0) {
                $('#onload').val('1');
                var sum = $('#sum_comments').val();
                var news_comment_id = $(this).attr('id');
                var url = "{{ url('news/comment/delete') }}" + "/" + news_comment_id;

                var string = "<button class='btn btn-block btn-default'><span class='glyphicon glyphicon-repeat'></span> Đang tải...</button>" + $('#comment_box').html();
                $('#comment_box').html(string);
                $.ajax({
                    url: url,
                    type: 'post',
                    data: { 'news_comment_id': news_comment_id,
                            'sum': sum, },
                    dataType: 'JSON',
                    success: function (data){
                        $('#comment_box').html(data.view);
                        $('#sum_comments').val(data.sum);
                        $('#sum-comments').html("(" + data.sum + ")");
                        $('#sum_comments_load').val("1");
                        if ( data.sum < 6 ) {
                            $('#view_more').attr('class', 'btn btn-block btn-default pull-left hidden');
                        }
                        else {
                            $('#view_more').attr('class', 'btn btn-block btn-default pull-left');
                        }
                        $('#onload').val('0');
                    },
                    error: function (error) {
                        $('#onload').val('0');
                        alert('Lỗi; ' + eval(error));
                    }
                });
            }
        });

/*reply*/
        $(document).on('submit', '.reply_input', function (e) {
            var onload = $('#onload').val();
            if (onload == 0) {
                $('#onload').val('1');
                var news_comment_id = $(this).find('.news_comment_id').val();
                var reply_content = $(this).find('.content').val();
                var url = "{{ url('news/reply') }}" + "/" + news_comment_id;
                if (reply_content === "") {
                    alert("Bạn chưa nhập nội dung trả lời");
                }
                else {
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: { 'content': reply_content,
                                'news_comment_id': news_comment_id, },
                        success: function (data){
                            $("#reply_box_"+news_comment_id).html(data);
                            $('#onload').val('0');
                        },
                        error: function (error) {
                            $('#onload').val('0');
                            alert('Lỗi; ' + eval(error));
                        }
                    });
                }
            }
            return false;
        });

/*Delete Comment*/
        $(document).on('click', '.delete-reply', function () {
            var onload = $('#onload').val();
            if (onload == 0) {
                $('#onload').val('1');
                var reply_id = $(this).attr('id');
                var news_comment_id = $(this).find('input').val();
                var url = "{{ url('news/reply/delete') }}" + "/" + reply_id;

                var string = "<button class='btn btn-block btn-default'><span class='glyphicon glyphicon-repeat'></span> Đang tải...</button>" + $("#reply_box_"+news_comment_id).html();
                $("#reply_box_"+news_comment_id).html(string);
                $.ajax({
                    url: url,
                    type: 'post',
                    data: { 'reply_id': reply_id, },
                    success: function (data){
                        $("#reply_box_"+news_comment_id).html(data);
                        $('#onload').val('0');
                    },
                    error: function (error) {
                        $('#onload').val('0');
                        alert('Lỗi; ' + eval(error));
                    }
                });
            }
        });

/*Like and dislike*/
        $(document).on('click', ".like", function () {
            var onload = $('#onload').val();
            if (onload == 0) {
                $('#onload').val('1');
                var id = $(this).attr('id');
                if ($(this).html() == 'Like') {
                    $(this).html('Liked');
                    $(this).attr('class', 'like btn btn-lin btn-xs label-warning');
                    var url = "{{ url('news/like') }}" + "/" + id;
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: { 'news_comment_id': id, },
                        success: function (data){
                            $("#sum_like_"+id).html(data);
                            $('#onload').val('0');
                        },
                        error: function (error) {
                            $('#onload').val('0');
                            alert('Lỗi; ' + eval(error));
                        }
                    });
                } else {
                    $(this).html('Like');
                    $(this).attr('class', 'like btn btn-lin btn-xs label-default');
                    var url = "{{ url('news/dislike') }}" + "/" + id;
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: { 'news_comment_id': id, },
                        success: function (data){
                            $("#sum_like_"+id).html(data);
                            $('#onload').val('0');
                        },
                        error: function (error) {
                            $('#onload').val('0');
                            alert('Lỗi; ' + eval(error));
                        }
                    });
                }
            }
            return false;
        });
    </script>

    <!-- slide -->
    <script>
        $('#myCarousel').carousel({
          interval: 4000
        });

        $('.carousel .item').each(function(){
          var next = $(this).next();
          if (!next.length) {
            next = $(this).siblings(':first');
          }
          next.children(':first-child').clone().appendTo($(this));

          for (var i=0;i<2;i++) {
            next=next.next();
            if (!next.length) {
              next = $(this).siblings(':first');
            }

            next.children(':first-child').clone().appendTo($(this));
          }
        });
    </script>

    <!-- model -->
    <script>
        $(document).ready(function($) {
            $('#login').on('click', function (){
                $('#myModal').modal('show');
            });
        $('.comment_input').on('click', function (){
                $('#myModal').modal('show');
            });
        });
        $(document).on('click', function () {
            $('.reply_input').on('click', function (){
                $('#myModal').modal('show');
            });
        })
    </script>
@stop
