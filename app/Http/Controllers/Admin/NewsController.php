<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\ListNew;
use App\NewsComment;
use App\News;
use App\Tag;

class NewsController extends Controller
{
    //
    public function index()
    {
        $news = News::all();
        return view('admin.news.index')->with('news', $news);
    }
    
    public function create()
    {
        $listNews = ListNew::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        return view('admin.news.create')->with('listNews', $listNews)->with('tags', $tags);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
                'title'=>'required|unique:News,title|max:255',
                'list_new_id'=>'required',
                'description'=>'required|max:255',
                'content'=>'required',
                'image'=>'required|image|mimes:jpg,png,jpeg',
            ], [
                'title.required'=>'Bạn chưa nhập tiêu đề tin',
                'title.unique'=>'Tiêu đề tin đã tồn tại',
                'title.max'=>'Tiêu đề tiêu đề vượt quá 255 kí tự',
                'list_new_id.required'=>'Bạn chưa chọn danh mục',
                'description.required'=>'Bạn chưa nhập mô tả',
                'description.max'=>'Mô tả vượt quá 255 kí tự',
                'content.required'=>'Bạn chưa nhập nội dung',
                'image.required'=>'Bạn chọn ảnh đại diện cho tin',
                'image.mimes'=>'Ảnh đại diện phải là tệp có đuôi jpg, png.',
                'image.image'=>'Tệp bạn chọn không phải là hình ảnh',
            ]);
        $news = new News;
        $news->title = $request->title;
        $news->slug = str_slug($request->title, "-");
        $news->list_new_id = $request->list_new_id;
        $news->description = $request->description;
        $news->content = $request->content;
        $news->view = 0;
        $session_id = \Auth::user()->id;
        $news->user_id = $session_id;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $image = time()."_".$name;
            $file->move("uploads/news", $image);
            $news->image = $image;
        }
        $news->save();
        $news->tags()->sync($request->tags, false);

        return redirect('admin/news/create')->withSuccess('Thêm tin thành công');
    }

    public function edit($id)
    {
        $news = News::find($id);
        $listNews = ListNew::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        return view('admin.news.edit')->with('news', $news)->with('listNews', $listNews)->with('tags', $tags);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
                'title'=>'required|max:255',
                'list_new_id'=>'required',
                'description'=>'required|max:255',
                'content'=>'required',
                'image'=>'image|mimes:jpg,png,jpeg',
            ], [
                'title.required'=>'Bạn chưa nhập tiêu đề tin',
                'title.max'=>'Tiêu đề vượt quá 255 kí tự',
                'list_new_id.required'=>'Bạn chưa chọn danh mục',
                'description.required'=>'Bạn chưa nhập mô tả',
                'description.max'=>'Mô tả vượt quá 255 kí tự',
                'content.required'=>'Bạn chưa nhập nội dung',
                'image.mimes'=>'Ảnh đại diện phải là tệp có đuôi jpg, png.',
                'image.image'=>'Tệp bạn chọn không phải là hình ảnh',

            ]);
        $news = News::find($id);
        $news->title = $request->title;
        $news->slug = str_slug($request->title, "-");
        $news->list_new_id = $request->list_new_id;
        $news->description = $request->description;
        $news->content = $request->content;
        $session_id = \Auth::user()->id;
        $news->user_id = $session_id;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $image = time()."_".$name;
            $file->move("uploads/news", $image);
            if (file_exists("uploads/news/".$news->image)) {
                //unlink("uploads/news/".$news->image);
            }
            $news->image = $image;
        }
        $news->save();
        if (isset($request->tags)) {
            $news->tags()->sync($request->tags);
        } else {
            $news->tags()->sync(array());
        }
        
        return redirect('admin/news/edit/'.$id)->withSuccess('Cập nhật tin thành công');
    }
    public function destroy($id)
    {
        $news = News::find($id);
        $news->tags()->detach();
        foreach ($news->comments as $comment) {
            foreach ($comment->replies as $reply) {
                $reply->delete();
            }
            $comment->delete();
        }
        $news->delete();
        return redirect('admin/news')->withSuccess("Xóa tin thành công");
    }
}
