@extends('news.layouts.master')
@section('title')
    Tin tức | {{ $tag->name }}
@stop
@section('content')
    <h2>
        Tag: {{ $tag->name }}
    </h2>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            @foreach ($tag->news as $n)
                <div class="small-news">
                    <div class="small-news-image">
                        <img src="{{url('uploads/news/'.$n->image)}}" alt="{{$n->image}}" height="auto" width="100%">
                    </div>
                    <div class="small-news-content">
                        <span class="small-news-title"><a href="{{url('news/'.$n->slug)}}">{{$n->title}}</a></span>
                        
                        <div class="small-news-desciption"><span>{{$n->description}}</span></div>
                    </div>
                </div>
            <div class="clearfix"></div>
            @endforeach

            <button class="btn btn-info pull-left" style="margin-left: 50%">Xem thêm <span class="glyphicon glyphicon-arrow-down"></span></button>
            <div class="clearfix"></div>

        </div>
        <div class="col-xs-12 col-sm-7 col-md-4 col-lg-4">
            <div>
                <div class="category-title-div">
                    <div class="category-title">Tin xem nhiều</div>
                </div>
                @php
                    $i=0;
                @endphp
                @foreach($mostView as $n)
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
            <div class="clearfix"></div>
            <div>
                <div class="category-title-div">
                    <div class="category-title">Đánh giá sản phẩm</div>
                </div>
                @php
                    $i=0;
                @endphp
                @foreach($review as $n)
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
    </div>
@stop