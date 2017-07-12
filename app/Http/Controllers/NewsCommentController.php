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
            $comments = $n->comments()->skip(0)->take(5)->get();
            return view('news.comment')->with('n', $n)->with('comments', $comments);
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
            $comments = $n->comments()->skip(0)->take(5)->get();
            return view('news.comment')->with('n', $n)->with('comments', $comments);
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

    public function load(Request $request)
    {
        if ($request->ajax()) {
            $this->validate($request, [
                            'news_id'=>'required',
                            'sum'=>'required',
                            'sum_load'=>'required',
                        ], [
                            'news_id.required'=>'Chưa có tin',
                            'sum.required'=>'Chưa có tổng số tin',
                            'sum_load.required'=>'Chưa có số tin',
                        ]);
            $n = News::find($request->news_id);
            if ($request->sum > $request->sum_load * 5) {
                $comments = $n->comments()->skip($request->sum_load * 5)->take(5)->get();
                $view = html_entity_decode(view('news.comment')->with('n', $n)->with('comments', $comments));
                $sum_load = $request->sum_load + 1;
                $arr = array('view' => $view, 'sum_load' => $sum_load);
                echo json_encode($arr);
            } else {
                $arr = array('view' => "", 'sum_load' => $request->sum_load);
                echo json_encode($arr);
            }
        }
    }
}
