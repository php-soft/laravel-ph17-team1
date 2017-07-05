@extends('news.layouts.master')
@section('title')
    {{ $n->title }}
@stop
@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8">
            <h4>
                <a href="{{ url('news') }}">Trang chủ</a> <span class="glyphicon glyphicon-chevron-right color-777"></span> <a href="">{{$n->listNew->name}}</a>
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
                <strong>Tags:</strong>
                @foreach ($n->tags as $tag)
                    <span class="label label-default"><a style="color: #fff" href="{{url('news/tag/'.$tag->id)}}">{{ $tag->name }}</a></span>
                @endforeach
            </h4>

            <div style="margin-bottom: 50px">
                <div id="comment" style="line-height: 40px; padding: 4px;padding-left: 0; font-weight: bold; font-size: 25px; margin-top: 50px">Bình luận
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
                <h4><strong>{{ count($n->comments) }} bình luận</strong></h4>
                <form action="{{url('news/comment/'.$n->id)}}" method="POST" enctype="multipart/form-data">
                    <div class="input-group">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="news_id" value="{{ $n->id }}">
                        <input name="content" type="text" class="form-control input-sm" placeholder="Nhập nội dung bình luận tại đây">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary btn-sm">Bình luận</button>
                        </span>
                    </div>
                </form>
                @php
                    $stt = 1;
                @endphp
                @foreach ($n->comments as $comment)
                    <div class="clearfix"></div>
                    <div class="comment">
                        <h5>
                            <span class="glyphicon glyphicon-user color-blue"></span> <strong class="color-blue">{{ $comment->user->name }}</strong> <span style="margin-left: 20px" class="glyphicon glyphicon-time color-777"></span> <span class="color-777">{{ $comment->created_at->diffForHumans() }}</span> <span style="margin-left: 20px" class="glyphicon glyphicon-comment"></span><a href="#r_{{ $stt }}"> {{ count($comment->reply) }} trả lời</a>
                            <div class="pull-right">
                                <span class="glyphicon glyphicon-edit"></span>
                                <span class="glyphicon glyphicon-remove"></span>
                            </div>
                        </h5>
                        <div class="comment-content">
                        <span>{{ $comment->content }}</span>
                        </div>
                        <div class="clearfix"></div>
                        <div class="reply">
                            @foreach ($comment->reply as $r)
                                <div class="comment">
                                    <h5>
                                        <span class="glyphicon glyphicon-user color-blue"></span> <strong class="color-blue">{{ $r->user->name }}</strong> <span style="margin-left: 20px" class="glyphicon glyphicon-time color-777"></span> <span class="color-777">{{ $r->created_at->diffForHumans() }} </span>
                                        <div class="pull-right"><span class="glyphicon glyphicon-edit"></span> <span class="glyphicon glyphicon-remove"></span></div>
                                    </h5>
                                    <div class="comment-content">
                                    <span>{{ $r->content }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div id="r_{{ $stt }}" class="reply-form">
                            <form action="{{url('news/reply/'.$n->id)}}" method="POST" enctype="multipart/form-data">
                                <div class="input-group">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="news_comment_id" value="{{ $comment->id }}">
                                    <input name="content" type="text" class="form-control input-sm" placeholder="Nhập nội dung trả lời bình luận tại đây">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-warning btn-sm">Trả lời</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    @php
                        $stt++;
                    @endphp
                @endforeach
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
