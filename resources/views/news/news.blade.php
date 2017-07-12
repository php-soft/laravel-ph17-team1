                @foreach ($data->take(5) as $news)
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