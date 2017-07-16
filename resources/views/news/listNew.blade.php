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
            @php
                $data = $listNew->news;
            @endphp            
            <input type="hidden" name="list_new_id" id="list_new_id" value="{{ $listNew->id }}">
            <input type="hidden" name="sum" id="sum" value="{{ count($data) }}">
            <input type="hidden" name="sum_load" id="sum_load" value="1">
            <input type="hidden" name="onload" id="onload" value="0">
            <div id="news_box">
                @include('news.news')
            </div>
            @if (count($data) > 5)
                <button id="view_more" class="btn btn-block btn-default" style="color: #288ad6">Hiển thị thêm</button>
            @endif
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
                    var list_new_id = $('#list_new_id').val();
                    var sum = $('#sum').val();
                    var sum_load = $('#sum_load').val();
                    if (sum > sum_load * 5) {
                        var url = "{{ url('news/listnew/load') }}";
                        var ht = $('#news_box').html();
                        $('#view_more').html("<span class='glyphicon glyphicon-refresh' style='color: #288ad6'></span> Đang tải");
                        $.ajax({
                            url: url,
                            type: 'post',

                            data: { 'sum': sum,
                                    'sum_load': sum_load,
                                    'list_new_id': list_new_id,
                            },
                            dataType: 'JSON',
                            success: function (data){
                                console.log(data);
                                $('#view_more').html("Hiển thị thêm");
                                if (data.sum_load * 5 >= sum) {
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
            });
        }); 
    </script>
@stop
