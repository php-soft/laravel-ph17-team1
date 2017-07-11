<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
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
      return redirect('admin/reviews');
    }
}
