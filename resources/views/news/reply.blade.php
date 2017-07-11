                                @foreach ($comment->replies as $r)
                                    <div class="comment">
                                        <div>
                                            <strong class="color-777">{{ $r->user->name }}</strong> <span style="margin-left: 10px; font-size: 12px" class="glyphicon glyphicon-time color-777"></span> <span class="color-777" style="font-size: 12px">{{ $r->created_at->diffForHumans() }} </span>
                                            <div class="pull-right">
                                                <button class="btn-link glyphicon glyphicon-trash delete-reply" id="{{$r->id}}"><input type="hidden" value="{{ $comment->id }}"></button>
                                            </div>
                                        </div>
                                        <div class="comment-content">
                                            <span>{{ $r->content }}</span>
                                        </div>
                                    </div>
                                @endforeach