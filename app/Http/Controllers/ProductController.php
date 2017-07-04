<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreBlogPostRequest;
use App\User;
use App\Product;
use App\PromotionProduct;
use App\Promotion;
use App\Store;
use App\StoreProduct;
use App\Vote;
use App\Review;
use Auth;

class ProductController extends Controller
{
    public function indexByID($slug)
    {
        $product_id = Product::where('slug', $slug)->pluck('id');
        $products=Product::find($product_id);

        $count_vote=Vote::where('product_id', $product_id)->count();
        $vote=Vote::where('product_id', $product_id)->sum('star');
        if ($count_vote==0) {
            $avgvote=0;
        } else {
            $avgvote=(float)round($vote/$count_vote);
        }

        $promotion_id=PromotionProduct::where('product_id', $product_id)->pluck('promotion_id');
        $promotions=Promotion::find($promotion_id);

        $store_id=StoreProduct::where('product_id', $product_id)->pluck('store_id');
        $stores=Store::find($store_id);
        
        $votes = Vote::where('product_id', $product_id)->paginate(4);

        $reviews = Review::where('product_id', $product_id)->orderBy('created_at','desc')->paginate(5);

        return view('products.detail')->with('products', $products)->with('count_vote', $count_vote)
        ->with('avgvote', $avgvote)->with('stores', $stores)->with('promotions', $promotions)
        ->with('votes', $votes)->with('reviews', $reviews);
    }

    public function storeVote(Request $request)
    {
        if(Auth::check() == true) {
            $user_id = Auth::user()->id;
            $user = new User;
            $users_id = User::where('id', $user_id)->first();
            $users_id->name = $request->name;
            $users_id->email = $request->email;
            $users_id->phonenumber = $request->phone;
            $users_id->save();
            $vote = new Vote;
            $vote->product_id = $request->product_id;
            $vote->customer_id = $user_id;
            $vote->name = $request->name;
            $vote->email = $request->email;
            $vote->phone = $request->phone;
            $vote->comment = $request->comment;
            $vote->save();
            return back()->withSuccess('Cảm ơn ' .$users_id->name .' đã đánh giá sản phẩm của chúng tôi');
        }else {
            $vote = new Vote;
            $vote->product_id = $request->product_id;
            $vote->name = $request->name;
            $vote->email = $request->email;
            $vote->phone = $request->phone;
            $vote->comment = $request->comment;
            $vote->save();
            return back()->withSuccess('Cảm ơn ' .$vote->name .' đã đánh giá sản phẩm của chúng tôi');
        }
    }

    public function storeComment(Request $request)
    {
        $review = new Review;
        $review->product_id = $request->product_id;
        $review->name = $request->name;
        $review->email = $request->email;
        $review->phone = $request->phone;
        $review->comment = $request->comment;
        $review->save();
        return back()->withSuccess('Cảm ơn ' .$review->name . ' đã để lại phản hồi');
    }
}
