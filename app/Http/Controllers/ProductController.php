<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
use App\News;
use Auth;
use Session;

class ProductController extends Controller
{
    public function indexByID($slug)
    {
        $product_id = Product::where('slug', $slug)->pluck('id');
        $products=Product::find($product_id);

        $product_tt=Product::where('id', '<>', $product_id)->orderBy('sale_price', 'asc')->limit(5)
        ->pluck('id');
        $product_sames=Product::find($product_tt);

        $news = News::all();
        //dd($news);

        $product_g=Product::where('id', '<>', $product_id)->pluck('id');
        $product_sss=Product::find($product_g);
        //dd($product_ss);

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
        
        $votes = Vote::where('product_id', $product_id)->orderBy('created_at', 'desc')->paginate(4);

        $reviews = Review::where('product_id', $product_id)->orderBy('created_at', 'desc')
        ->paginate(5);

        return view('products.detail')->with('products', $products)->with('news', $news)
        ->with('product_sames', $product_sames)
        ->with('product_sss', $product_sss)
        ->with('count_vote', $count_vote)
        ->with('avgvote', $avgvote)->with('stores', $stores)->with('promotions', $promotions)
        ->with('votes', $votes)->with('reviews', $reviews);
    }
    public function storeVote(Request $request)
    {
        $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:votes,email',
                'phone' => 'required|regex:/[0-9]/',
                'comment' => 'required|min:3',
            ], [
                'name.required' => 'Chưa nhập tên',
                'email.required' => 'Chưa nhập email',
                'email.email' => 'Email không hợp lệ',
                'email.unique' => 'Email đã tồn tại',
                'phone.required' => 'Chưa nhập số điện thoại',
                'phone.regex' => 'Số điện thoại không hợp lệ',
                'comment.required' => 'Hãy viết một vài lời bình luận về sản phẩm',
                'comment.min' => 'Bình luận tối thiểu 80 ký tự',
                Session::flash('message', 'Có lỗi xảy ra'),
                Session::flash('alert-class', 'alert-error'),
            ]);

        if (Auth::check() == true) {
            $user_id = Auth::user()->id;
            $users_id = User::where('id', $user_id)->first();
            $users_id->name = $request->name;
            $users_id->email = $request->email;
            $users_id->phonenumber = $request->phone;
            $users_id->save();
            $vote = new Vote;
            $vote->product_id = $request->product_id;
            $vote->customer_id = $user_id;
            $vote->star = $request->star;
            $vote->name = $request->name;
            $vote->email = $request->email;
            $vote->phone = $request->phone;
            $vote->comment = $request->comment;
            $vote->save();
            Session::flash('message', 'Cảm ơn ' .$users_id->name . ' đã đánh giá sản phẩm chúng tôi');
            Session::flash('alert-class', 'alert-error');
            return back();
        } else {
            $vote = new Vote;
            $users_id = User::all();
            $users_id->name = $request->name;
            $vote->product_id = $request->product_id;
            $vote->star = $request->star;
            $vote->name = $request->name;
            $vote->email = $request->email;
            $vote->phone = $request->phone;
            $vote->comment = $request->comment;
            $vote->save();
            Session::flash('message', 'Cảm ơn ' .$users_id->name . ' đã đánh giá sản phẩm chúng tôi');
            Session::flash('alert-class', 'alert-success');
            return back();
        }
    }
    public function storeComment(Request $request)
    {
        $this->validate($request, [
                'name' => 'required',
                'comment' => 'required|min:3',
            ], [
                'name.required'=> 'Chưa nhập tên',
                'comment.required'=> 'Hãy để lại vài dòng bình luận',
                'comment.min'=> 'Comment tối thiểu 10 ký tự',
                Session::flash('message', 'Có lỗi xảy ra'),
                Session::flash('alert-class', 'alert-error'),
            ]);

        $review = new Review;
        $review->product_id = $request->product_id;
        $review->name = $request->name;
        $review->email = $request->email;
        $review->phone = $request->phone;
        $review->comment = $request->comment;
        $review->save();
        Session::flash('message', 'Cảm ơn ' .$review->name . ' đã để lại phản hồi');
        Session::flash('alert-class', 'alert-success');
        return back();
    }

    public function compare($slug, $slugsame)
    {
        $product_id = Product::where('slug', $slug)->pluck('id');
        $products=Product::find($product_id);
        //dd($product_id);
        $promotion_id=PromotionProduct::where('product_id', $product_id)->pluck('promotion_id');
        $promotions=Promotion::find($promotion_id);

        $count_vote=Vote::where('product_id', $product_id)->count();
        $vote=Vote::where('product_id', $product_id)->sum('star');
        if ($count_vote==0) {
            $avgvote=0;
        } else {
            $avgvote=(float)round($vote/$count_vote);
        }

        $product_tt=Product::where('slug', $slugsame)->pluck('id');
        $product_sames=Product::find($product_tt);

        $promotion_tt=PromotionProduct::where('product_id', $product_tt)->pluck('promotion_id');
        $promotion_sames=Promotion::find($promotion_tt);
        //dd($product_sames);

        $count_vote_same=Vote::where('product_id', $product_tt)->count();
        $vote_same=Vote::where('product_id', $product_tt)->sum('star');
        if ($count_vote_same==0) {
            $avgvote_same=0;
        } else {
            $avgvote_same=(float)round($vote_same/$count_vote_same);
        }

        //dd($product_sames);
        return View('products.compare')->with('products', $products)->with('product_sames', $product_sames)
        ->with('promotions', $promotions)->with('promotion_sames', $promotion_sames)
        ->with('count_vote', $count_vote)->with('avgvote', $avgvote)
        ->with('count_vote_same', $count_vote_same)->with('avgvote_same', $avgvote_same);
    }
}
