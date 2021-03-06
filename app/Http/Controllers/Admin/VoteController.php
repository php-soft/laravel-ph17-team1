<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Vote;
use App\Product;

class VoteController extends Controller
{
    public function index()
    {
        $votes = Vote::all();
        $product_id = Vote::all()->pluck('product_id');
        $products = Product::find($product_id);
        return View('admin.votes.index', ['votes' => $votes, 'products' => $products]);
    }

    public function destroy($id)
    {
        Vote::find($id)->delete();
        Session::flash('message', 'Đã xóa thành công');
        Session::flash('alert-class', 'alert-success');
        return redirect('admin/votes');
    }
}
