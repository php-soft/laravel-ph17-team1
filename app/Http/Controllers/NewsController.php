<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\News;

class NewsController extends Controller
{
    //
    public function index()
    {
        $news = News::all();
        return view('news.index')->with('news', $news)->with('data', $news)->with('mostView', $news)->with('review', $news);
    }

    public function indexByTag($id)
    {
        $tag = Tag::find($id);
        $news = News::all();
        return view('news.tag')->with('tag', $tag)->with('mostView', $news)->with('review', $news);
    }

    public function detail($slug)
    {
        $news = News::all();
        $n = News::where('slug', '=', $slug)->get()->first();
        $n->view = $n->view + 1;
        $n->save();
        return view('news.detail')->with('n', $n)->with('news', $news);
    }
}
