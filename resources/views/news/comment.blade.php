                    @php
                        $stt = 1;
                    @endphp
                    @foreach ($n->comments->take(5) as $comment)
                        <div class="clearfix"></div>
                        <div class="comment">
                            <div>
                                <strong class="color-777">{{ $comment->user->name }}</strong>
                                <div class="pull-right">
                                    <button class="btn-link glyphicon glyphicon-trash delete-comment" id="{{$comment->id}}"></button>
                                </div>
                            </div>
                            <div class="comment-content">
                                <span>{{ $comment->content }}</span>
                            </div>
                            <button id="{{ $comment->id }}" class="like btn btn-lin btn-xs label-default" style="color: #fff">Like</button> 
                             <span id="sum_like_{{ $comment->id }}" class="badge">{{ $comment->like }}</span> 
                            <span style="margin-left: 20px" class="glyphicon glyphicon-comment"></span> 
                            <a href="#r_{{ $stt }}"> {{ count($comment->reply) }} trả lời</a> 
                            <span style="margin-left: 20px; font-size: 12px" class="glyphicon glyphicon-time color-777"></span> 
                            <span class="color-777" style="font-size: 12px">{{ $comment->created_at->diffForHumans() }}</span> 
                            <div class="clearfix"></div>
                            <div id="reply_box_{{ $comment->id }}" class="reply">
                                @include('news/reply')
                            </div>
                            <div id="r_{{ $stt }}" class="reply-form">
                                <form class="reply_input" action="{{url('news/reply/'.$n->id)}}" method="POST" enctype="multipart/form-data">
                                    <div class="input-group">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" class="news_comment_id" name="news_comment_id" value="{{ $comment->id }}">
                                        <input name="content" type="text" class="content form-control input-sm" placeholder="Nhập nội dung trả lời bình luận tại đây" value="">
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
