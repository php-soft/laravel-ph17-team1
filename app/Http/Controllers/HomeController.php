<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Promotion;
use App\PromotionProduct;
use App\Vote;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $product_id = Product::all()->pluck('id');
        $promotion_id=PromotionProduct::where('product_id', $product_id)->pluck('promotion_id');
        $promotions=Promotion::find($promotion_id);
        foreach($product_id as $product_ids) {
                $count_vote=Vote::where('product_id', $product_ids)->count();
                $vote=Vote::where('product_id', $product_ids)->sum('star');
                if ($count_vote==0) {
                    $avgvote=0;
                } else {
                    $avgvote=(float)round($vote/$count_vote);
                }
            }
        
        return view('home')->with('products', $products)->with('promotions', $promotions)->with('avgvote', $avgvote);
    }
}
