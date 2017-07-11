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
        $news = News::all();
        $tags = Tag::all();
        return view('news.index')->with('news', $news)
            ->with('data', $news)
            ->with('mostView', $news)
            ->with('review', $news)
            ->with('tags', $tags);
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
        return view('news.detail')->with('n', $n)->with('news', $news);
    }
}
