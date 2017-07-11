@extends('news.layouts.master')
@section('title')
    Tin tức | {{ $listNew->name }}
@stop
@section('content')
    <h3>
        <span class="btn btn-link" style="color: #fff; background-color: #5cb85c; margin-bottom: 5px;">Danh mục: {{ $listNew->name }}</span>
    </h3>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            @foreach ($listNew->news as $n)
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