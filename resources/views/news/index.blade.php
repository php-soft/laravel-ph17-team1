@extends('news.layouts.master')
@section('title')
    Tin tức công nghệ | Thông tin sản phẩm mới nhất
@stop
@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div id="first-news">
                        <div id="first-news-image">
                            <img src="{{url('uploads/news/'.$news['0']->image)}}" alt="{{$news['0']->image}}" width="100%" height="auto">
                        </div>
                        <div id="first-news-title"><a href="{{url('news/'.$news['0']->slug)}}">{{$news['0']->title}}</a></div>
                        <div id="first-news-description">{{$news['0']->description}}</div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="row">
                        <div class="list-news">
                            <div class="list-news-image">
                            <img src="{{url('uploads/news/'.$news['1']->image)}}" alt="{{$news['1']->image}}" width="100%" height="auto">
                            </div>
                            <div class="list-news-content">
                                <span class="list-news-title">                            <a href="{{url('news/'.$news['1']->slug)}}">{{$news['1']->title}}</a></span>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="list-news">
                            <div class="list-news-image">
                            <img src="{{url('uploads/news/'.$news['2']->image)}}" alt="{{$news['1']->image}}" width="100%" height="auto">
                            </div>
                            <div class="list-news-content">
                                <span class="list-news-title">                            <a href="{{url('news/'.$news['1']->slug)}}">{{$news['2']->title}}</a></span>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="list-news">
                            <div class="list-news-image">
                            <img src="{{url('uploads/news/'.$news['3']->image)}}" alt="{{$news['1']->image}}" width="100%" height="auto">
                            </div>
                            <div class="list-news-content">
                                <span class="list-news-title">                            <a href="{{url('news/'.$news['1']->slug)}}">{{$news['3']->title}}</a></span>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="list-news">
                            <div class="list-news-image">
                            <img src="{{url('uploads/news/'.$news['4']->image)}}" alt="{{$news['1']->image}}" width="100%" height="auto">
                            </div>
                            <div class="list-news-content">
                                <span class="list-news-title">                            <a href="{{url('news/'.$news['1']->slug)}}">{{$news['4']->title}}</a></span>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            @foreach ($data as $news)
                <div class="row">
                    <div class="small-news">
                        <div class="small-news-image">
                            <img src="{{url('uploads/news/'.$news->image)}}" alt="{{$news->image}}" height="auto" width="100%">
                        </div>
                        <div class="small-news-content">
                            <span class="small-news-title"><a href="{{url('news/'.$news->slug)}}">{{$news->title}}</a></span>
                            
                            <div class="small-news-desciption"><span>{{$news->description}}</span></div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            @endforeach

        </div>
        <div class="col-xs-12 col-sm-7 col-md-4 col-lg-4">
            <div>
                <div class="category-title-div">
                    <div class="category-title">Sản phẩm mới</div>
                </div>
                @php
                    $i=0;
                @endphp
                @foreach($mostView as $n)
                    <div class="product-news">
                        <div class="product-image">
                            <img src="{{url('uploads/news/'.$news->image)}}" alt="{{$news->image}}" height="auto" width="100%">
                        </div>
                        <div class="product-content">
                            <span class="product-title"><a href="{{url('news/'.$news->slug)}}">{{$news->title}}</a></span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                @endforeach
            </div>
            <div class="clearfix"></div>
            <div>
                <div class="category-title-div">
                    <div class="category-title"><span class="glyphicon glyphicon-tags"></span> Tags:</div>
                </div>
                    <div>
                        @foreach($tags as $tag)
                            <span class="btn btn-link" style="background-color: #5cb85c; margin-bottom: 5px;"><a style="color: #fff" href="{{ url('news/tag/'.$tag->id) }}">{{ $tag->name }}</a></span>
                        @endforeach
                    </div>
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
