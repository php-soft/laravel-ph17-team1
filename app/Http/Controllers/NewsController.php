<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\News;
use App\ListNew;

class NewsController extends Controller
{
    //
    public function index()
    {
        $news = News::All();
        $topnews = News::orderBy('id', 'desc')->skip(0)->take(5)->get();
        $reviews = News::where('list_new_id', '=', 5)->skip(0)->take(5)->get();
        $mostViews = News::orderBy('view', 'desc')->skip(0)->take(5)->get();
        $offset = News::count() - 5;
        $data = News::orderBy('id', 'desc')->skip(5)->take($offset)->get();
        $tags = Tag::all();
        return view('news.index')->with('news', $topnews)
            ->with('data', $data)
            ->with('mostViews', $mostViews)
            ->with('reviews', $reviews)
            ->with('tags', $tags);
    }

    public function load(Request $request)
    {
        if ($request->ajax()) {
            $this->validate($request, [
                            'sum_load'=>'required',
                            'sum'=>'required',
                        ], [
                            'sum.required'=>'Chưa có tổng số tin',
                            'sum_load.required'=>'Chưa có số tin',
                        ]);
            
            if ($request->sum > $request->sum_load * 5) {
                $offset = News::count() - ($request->sum_load * 5 + 5);
                $data = News::orderBy('id', 'desc')->skip($request->sum_load * 5 + 5)->take($offset)->get();
                $view = html_entity_decode(view('news.news')->with('data', $data));
                $sum_load = $request->sum_load + 1;
                $arr = array('view' => $view, 'sum_load' => $sum_load);
                echo json_encode($arr);
            } else {
                $arr = array('view' => "", 'sum_load' => $request->sum_load);
                echo json_encode($arr);
            }
        }
    }

    public function indexByTag($id)
    {
        $tag = Tag::find($id);
        $news = News::all();
        return view('news.tag')->with('tag', $tag)->with('mostView', $news)->with('review', $news);
    }
    public function indexByListNew($slug)
    {
        $listNew = ListNew::Where('slug', '=', $slug)->get()->first();
        $news = News::all();
        return view('news.listNew')->with('listNew', $listNew)->with('mostView', $news)->with('review', $news);
    }

    public function detail($slug)
    {
        $n = News::where('slug', '=', $slug)->get()->first();
        $n->view = $n->view + 1;
        $n->save();
        $news = News::where('list_new_id', '=', $n->list_new_id)->take(10)->get();
        $comments = $n->comments()->skip(0)->take(5)->get();
        return view('news.detail')->with('n', $n)->with('news', $news)->with('comments', $comments);
    }
}
