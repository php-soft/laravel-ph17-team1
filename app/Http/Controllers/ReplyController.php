<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsComment;
use App\Reply;

class ReplyController extends Controller
{
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $this->validate($request, [
                            'content'=>'required',
                            'news_comment_id'=>'required',
                        ], [
                            'content.required'=>'Bạn chưa nhập nội dung',
                            'news_comemnt_id.required'=>'Chưa có bình luận',
                        ]);
            $rely = new Reply;
            $rely->content = $request->content;
            $rely->news_comment_id = $request->news_comment_id;
            $session_id = \Auth::user()->id;
            $rely->user_id = $session_id;
            $rely->save();
            $comment = NewsComment::find($request->news_comment_id);
            return view('news.reply')->with('comment', $comment);
        }
    }

    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $this->validate($request, [
                            'reply_id'=>'required',
                        ], [
                            'reply_id.required'=>'Chưa có trả lời',
                        ]);
            $reply = Reply::find($request->reply_id);
            $news_comment_id = $reply->news_comment_id;
            $reply->delete();
            $comment = NewsComment::find($news_comment_id);
            return view('news.reply')->with('comment', $comment);
        }
    }
}
