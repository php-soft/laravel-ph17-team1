@extends('news.layouts.master')
@section('title')
    Tin tức công nghệ | Thông tin sản phẩm mới nhất
@stop
@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8" style="background-color: #fff; padding-bottom: 20px">
            <div class="row" style="margin-bottom: 20px; margin-top: 10px">
                <div class="col-md-12" style="padding: 4px;">

                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">

                            @php
                                $stt = 0;
                            @endphp
                            @foreach ($news as $n)

                                <div @if ($stt == 0) class="item active" @else class="item" @endif>
                                  <img src="{{ url('uploads/news/'.$n->image) }}">
                                   <div class="carousel-caption">
                                    <h4><a href="{{ url('news/'.$n->slug) }}">{{ $n->title }}</a></h4>
                                    <p> {{ $n->description }} <a class="label label-primary" href="{{ url('news/'.$n->slug) }}">Xem thêm</a></p>
                                  </div>
                                </div><!-- End Item -->

                                @php
                                    $stt++;
                                @endphp
                            @endforeach

                        </div><!-- End Carousel Inner -->

                    <ul class="list-group col-sm-4" id="list-link">
                        @php
                            $stt = 0;
                        @endphp
                        @foreach ($news as $n)
                            <li data-target="#myCarousel" data-slide-to="{{ $stt }}" @if ($stt == 0) class="list-group-item active" @else class="list-group-item" @endif><span>{{ $n->title }}</span></li>
                            @php
                                $stt++;
                            @endphp
                        @endforeach
                    </ul>

                      <!-- Controls -->
                      <div class="carousel-controls">
                          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                          </a>
                          <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                          </a>
                      </div>

                    </div><!-- End Carousel -->

                </div>
            </div>

            <input type="hidden" name="sum" id="sum" value="{{ count($data) }}">
            <input type="hidden" name="sum_load" id="sum_load" value="1">
            <input type="hidden" name="onload" id="onload" value="0">
            <div id="news_box">
                @include('news.news')
            </div>
        </div>
        <div class="col-xs-12 col-sm-7 col-md-4 col-lg-4" style="background-color: #fff;">
            <div>
                <div class="category-title-div">
                    <div class="category-title">Tin xem nhiều nhất</div>
                </div>
                @php
                    $i=0;
                @endphp
                @foreach($mostViews as $n)
                    <div class="product-news">
                        <div class="product-image">
                            <img src="{{url('uploads/news/'.$n->image)}}" alt="{{$n->image}}" height="auto" width="100%">
                        </div>
                        <div class="product-content">
                            <span class="product-title"><a href="{{url('news/'.$n->slug)}}">{{$n->title}}</a></span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                @endforeach
            </div>
            <div class="clearfix"></div>
            <div>
                <div class="category-title-div">
                    <div class="category-title"><span class="glyphicon glyphicon-tags"></span> Tags</div>
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
                @foreach($reviews->take(5) as $n)
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
@section('js')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        /*view more*/
        $(window).scroll(function() {
           if($(window).scrollTop() + $(window).height() > $(document).height() - 150) {
                var onload = $('#onload').val();
                if (onload == 0) {
                    $('#onload').val('1');
                    var sum = $('#sum').val();
                    var sum_load = $('#sum_load').val();
                    if (sum > sum_load * 5) {
                        var url = "{{ url('news/load') }}";
                        var ht = $('#news_box').html();
                        var string = ht + "<button class='btn btn-block'><span class='glyphicon glyphicon-refresh'></span> Đang tải</button>";
                        $('#news_box').html(string);
                        $.ajax({
                            url: url,
                            type: 'post',

                            data: { 'sum': sum,
                                    'sum_load': sum_load,
                            },
                            dataType: 'JSON',
                            success: function (data){
                                if (data.view == "") {
                                    $('#view_more').attr('class', 'hidden');
                                }
                                $('#sum_load').val(data.sum_load);
                                $('#news_box').html(ht + data.view);
                                $('#onload').val('0');
                            },
                            error: function (error) {
                                $('#onload').val('0');
                                alert('Lỗi; ' + eval(error));
                            }
                        });
                    }
                }
           }
        });
        }); 
    </script>
    <script>
        $(document).ready(function(){
            var clickEvent = false;
            $('#myCarousel').carousel({
                interval:   4000    
            }).on('click', '.list-group li', function() {
                    clickEvent = true;
                    $('.list-group li').removeClass('active');
                    $(this).addClass('active');     
            }).on('slid.bs.carousel', function(e) {
                if(!clickEvent) {
                    var count = $('.list-group').children().length -1;
                    var current = $('.list-group li.active');
                    current.removeClass('active').next().addClass('active');
                    var id = parseInt(current.data('slide-to'));
                    if(count == id) {
                        $('.list-group li').first().addClass('active'); 
                    }
                }
                clickEvent = false;
            });
        });
        $(window).on('load', function() {
            var boxheight = $('#myCarousel .carousel-inner').innerHeight();
            var itemlength = $('#myCarousel .item').length;
            var triggerheight = Math.round(boxheight/itemlength+1);
            $('#myCarousel .list-group-item').outerHeight(triggerheight);
        });
    </script>

@stop
