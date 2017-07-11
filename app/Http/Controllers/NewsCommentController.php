<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsComment;
use App\News;

class NewsCommentController extends Controller
{
    //
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $this->validate($request, [
                            'content'=>'required',
                            'news_id'=>'required',
                        ], [
                            'content.required'=>'Bạn chưa nhập nội dung',
                            'news_id.required'=>'Chưa có tin tức',
                        ]);
            $comment = new NewsComment;
            $comment->content = $request->content;
            $comment->news_id = $request->news_id;
            $comment->like = 0;
            $session_id = \Auth::user()->id;
            $comment->user_id = $session_id;
            $comment->save();
        $n = News::find($request->news_id);
        return view('news.comment')->with('n', $n);
        }
    }

    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $this->validate($request, [
                            'news_comment_id'=>'required',
                        ], [
                            'news_comment_id.required'=>'Chưa có bình luận',
                        ]);
            $comment = NewsComment::find($request->news_comment_id);
            $news_id = $comment->news_id;
            $comment->replies()->delete();
            $comment->delete();
        $n = News::find($news_id);
        return view('news.comment')->with('n', $n);
        }
    }

    public function like(Request $request)
    {
        if ($request->ajax()) {
            $this->validate($request, [
                            'news_comment_id'=>'required',
                        ], [
                            'news_comment_id.required'=>'Chưa có bình luận',
                        ]);
            $comment = NewsComment::find($request->news_comment_id);
            $comment->like = $comment->like + 1;
            $comment->save();

            return $comment->like;
        }
    }

    public function dislike(Request $request)
    {
        if ($request->ajax()) {
            $this->validate($request, [
                            'news_comment_id'=>'required',
                        ], [
                            'news_comment_id.required'=>'Chưa có bình luận',
                        ]);
            $comment = NewsComment::find($request->news_comment_id);
            if ($comment->like >= 1) {
                $comment->like = $comment->like - 1;
            }
            $comment->save();

            return $comment->like;
        }
    }
}
