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
        $newproducts = Product::orderBy('created_at', 'desc')->limit(3)->get();
        $hotproducts = Product::orderBy('tophot', 'desc')->limit(3)->get();
        return view('home')->with('newproducts', $newproducts)->with('hotproducts', $hotproducts);
    }
}
