<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\ListNew;
use App\NewsComment;
use App\News;
use App\Tag;
use App\Http\Controllers\Controller;
use Session;

class TagController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index')->with('tags', $tags);
    }
    public function create()
    {
        return view('admin.tags.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
                'name'=>'required|unique:Tags,name',
            ], [
                'name.required'=>'Bạn chưa nhập tên tag',
                'name.unique'=>'Tên tag đã tồn tại',
            ]);
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();
        return redirect('admin/tags')->withSuccess('Thêm tag thành công');
    }
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin.tags.edit')->with('tag', $tag);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
                'name'=>'required|unique:Tags,name',
            ], [
                'name.required'=>'Bạn chưa nhập tiêu đề tin',
                'name.unique'=>'Tiêu đề tin đã tồn tại',
            ]);
        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->save();
        return redirect('admin/tags')->withSuccess('Cập nhật tag thành công');
    }
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->news()->detach();
        $tag->delete();
        return redirect('admin/tags')->withSuccess("Xóa tag thành công");
    }
}
