<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Review;
use App\Product;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        $product_id = Review::all()->pluck('product_id');
        $products = Product::find($product_id);
        return View('admin.reviews.index', ['reviews' => $reviews, 'products' => $products]);
    }

    public function destroy($id)
    {
        Review::find($id)->delete();
        Session::flash('message', 'Đã xóa thành công');
        Session::flash('alert-class', 'alert-success');
        return redirect('admin/reviews');
    }
}
