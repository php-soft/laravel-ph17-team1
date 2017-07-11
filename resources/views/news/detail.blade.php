@extends('news.layouts.master')
@section('title')
    {{ $n->title }}
@stop
@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8">
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
                        <span class="alert-danger">Đăng nhập để bình luận!</span> <a href="{{ route('login') }}">Đăng nhập</a>
                    @else
                        {{ Auth::user()->name }}
                    @endif
                </h5>
                <form action="{{ url('news/comment/'.$n->id) }}" style="margin-bottom: 10px;" id="comment_input" method="POST" enctype="multipart/form-data">
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
                <script type="text/javascript">
                    var sum = document.getElementById('sum_comments').value;
                    var sum_load = document.getElementById('sum_comments_load').value *5;
                    if( sum > sum_load ) 
                        document.write("<buton id='view_more' type='text' class='btn btn-block pull-left label-primary'><strong style='color: #fff; line-height: 18px; font-size: 18px'>Xem thêm <span class='glyphicon glyphicon-chevron-down'></strong></span></buton>");
                </script>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
            <div>
                <div class="category-title-div">
                    <div class="category-title">Tin cùng chuyên mục</div>
                </div>
                @php
                    $i=0;
                @endphp
                @foreach($news as $n)
                    <div class="hot-news">
                        <div>
                            <div class="number">{{$i+1}}</div>
                            <span class="hot-news-title"><a href="{{url('news/'.$n->slug)}}">{{$n->title}}</a></span>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                        <div  style="text-indent: 1em">
                            <span>{{ substr($n->description, 0, 200) }}....</span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </div>
        </div>
        <div class="clearfix"></div>
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
        }); 
/*Comment*/
        $(document).on('submit', '#comment_input', function (e) {
            var news_id = $('#news_id').val();
            var comment_content = $('#comment_content').val();
            var url = "{{ url('news/comment') }}" + "/" + news_id;
            if (comment_content === "") {
                alert("Bạn chưa nhập nội dung bình luận");
            }
            else {
                var string = "<span class='glyphicon glyphicon-repeat'></span> Đang tải..." + $('#comment_box').html();
                $('#comment_box').html(string);
                $.ajax({
                    url: url,
                    type: 'post',
                    data: { 'content': comment_content,
                            'news_id': news_id,},
                    success: function (data){
                        $('#comment_box').html(data);
                    }
                });
            }
            return false;
        });

/*Delete Comment*/
        $(document).on('click', '.delete-comment', function () {
            var news_comment_id = $(this).attr('id');
            var url = "{{ url('news/comment/delete') }}" + "/" + news_comment_id;

            var string = "<span class='glyphicon glyphicon-repeat'></span> Đang tải..." + $('#comment_box').html();
            $('#comment_box').html(string);
            $.ajax({
                url: url,
                type: 'post',
                data: { 'news_comment_id': news_comment_id, },
                success: function (data){
                    $('#comment_box').html(data);
                }
            });
        });

/*reply*/
        $(document).on('submit', '.reply_input', function (e) {
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
                    }
                });
            }
            return false;
        });

/*Delete Comment*/
        $(document).on('click', '.delete-reply', function () {
            var reply_id = $(this).attr('id');
            var news_comment_id = $(this).find('input').val();
            var url = "{{ url('news/reply/delete') }}" + "/" + reply_id;

            var string = "<span class='glyphicon glyphicon-repeat'></span> Đang tải..." + $("#reply_box_"+news_comment_id).html();
            $("#reply_box_"+news_comment_id).html(string);
            $.ajax({
                url: url,
                type: 'post',
                data: { 'reply_id': reply_id, },
                success: function (data){
                    $("#reply_box_"+news_comment_id).html(data);
                }
            });
        });

/*view more*/

        $(document).on('click', '#view_more', function () {
            var sum = $('#sum_comments').val();
            var news_comment_id = $(this).find('input').val();
            var news_id = $('#news_id').val();
            alert(news_id);
/*            var url = "{{ url('news/reply/delete') }}" + "/" + reply_id;

            var string = "<span class='glyphicon glyphicon-repeat'></span> Đang tải..." + $("#reply_box_"+news_comment_id).html();
            $("#reply_box_"+news_comment_id).html(string);
            $.ajax({
                url: url,
                type: 'post',
                data: { 'reply_id': reply_id, },
                success: function (data){
                    $("#reply_box_"+news_comment_id).html(data);
                }
            });*/
        });

/*Like and dislike*/
        $(document).on('click', ".like", function () {
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
                    }
                });
            }
            return false;
        });
    </script>
@stop
