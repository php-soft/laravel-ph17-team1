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
use App\Manufactory;
use App\Category;
use App\ProductCategory;
use App\BackCamera;
use App\FrontCamera;
use App\Design;
use App\Utility;
use App\Connect;
use App\Battery;
use Auth;
use Session;
use DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        // $a = Manufactory::where(function($where){
        //     $where->where('name', '=', 'samsung');
        //     $where->where('name','=','iphone');
        //     })->get();
        // dd($manu_2s);
        
        return View('products.index')->with('products', $products)->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s);
    }
    public function indexByID($slug)
    {
        $product_id = Product::where('slug', $slug)->pluck('id');
        $products=Product::find($product_id);

        $product_tt=Product::where('id', '<>', $product_id)->orderBy('sale_price', 'asc')->limit(5)
        ->pluck('id');
        $product_sames=Product::find($product_tt);

        $news = News::all();

        $product_g=Product::where('id', '<>', $product_id)->pluck('id');
        $product_sss=Product::find($product_g);

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

    public function indexByName(Request $request)
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $manu_id = Manufactory::where('name', $request->name)->pluck('id');
        $products = Product::where('manufactory_id', $manu_id)->get();
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByPriceDown1M()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $products = Product::where('price', '<', 1000000)->get();
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByPrice1to3M()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $products = Product::whereBetween('price', [1000000, 3000000])->get();
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByPrice3to7M()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $products = Product::whereBetween('price', [3000000, 7000000])->get();
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByPrice7to10M()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $products = Product::whereBetween('sale_price', [7000000, 10000000])->get();
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
            ->with('products', $products);
    }

    public function indexByPrice10to15M()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $products = Product::whereBetween('sale_price', [10000000, 15000000])->get();
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByPriceUp15M()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $products = Product::where('price', '>', 15000000)->get();
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexBySmartPhone(){
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $category_id = Category::where('name', 'smartphone')->pluck('id');
        $product_id=ProductCategory::where('category_id', $category_id)->pluck('product_id');
        //dd($product_id);
        $products = Product::find($product_id);
        //dd($products);
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByClassicPhone(){
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $category_id = Category::where('name', 'classicphone')->pluck('id');
        $product_id=ProductCategory::where('category_id', $category_id)->pluck('product_id');
        //dd($product_id);
        $products = Product::find($product_id);
        //dd($products);
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByAndroid(){
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $category_id = Category::where('name', 'android')->pluck('id');
        $product_id=ProductCategory::where('category_id', $category_id)->pluck('product_id');
        //dd($product_id);
        $products = Product::find($product_id);
        //dd($products);
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByIOS(){
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $category_id = Category::where('name', 'ios')->pluck('id');
        $product_id=ProductCategory::where('category_id', $category_id)->pluck('product_id');
        //dd($product_id);
        $products = Product::find($product_id);
        //dd($products);
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByCameraDown3MP()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $back_camera_id = BackCamera::where('resolution1', '<', 3)->orWhere('resolution2', '<', 3)->pluck('id');
        $products = Product::find($back_camera_id);
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByCamera3to5MP()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $back_camera_id = BackCamera::whereBetween('resolution1', [3, 5])->orWhereBetween('resolution2', [3, 5])->pluck('id');
        $products = Product::find($back_camera_id);
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByCamera5to8MP()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $back_camera_id = BackCamera::whereBetween('resolution1', [5, 8])->orWhereBetween('resolution2', [5, 8])->pluck('id');
        $products = Product::find($back_camera_id);
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByCamera8to12MP()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $back_camera_id = BackCamera::whereBetween('resolution1', [8, 12])
        ->orWhereBetween('resolution2', [8, 12])->pluck('id');
        //dd($back_camera_id);
        $products = Product::where('back_camera_id', $back_camera_id)->get();
        //dd($products);
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByCameraUp12MP()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $products = Product::where('back_camera_id', BackCamera::where('resolution1', '>', 12)->orWhere('resolution2', '>', 12)->pluck('id'))->get();
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByDesignUnibodyMetal()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $nguyenkhoi = 'nguyên khối';
        $kimloai = 'kim';
        $kinh = 'kính';
        $results = Design::where('design', 'like', '%' . $nguyenkhoi . '%')->where('material', 'like', '%' . $kimloai . '%')->where('material', 'not like', '%' . $kinh . '%')->pluck('id');
        if(empty($results)){
            $products = Product::where('design_id', 0)->get();
        }else{
            $products = Product::where('design_id', $results)->get();
        }
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByDesignPlasticMetal()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $nhua = 'nhựa';
        $kimloai = 'kim';
        $results = Design::where('material', 'like', '%' . $nhua . '%')->where('material', 'like', '%' . $kimloai . '%')->pluck('id');
        if(empty($results)){
            $products = Product::where('design_id', 0)->get();
        }else{
            $products = Product::where('design_id', $results)->get();
        }
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByDesignMetalGlass()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $kinh = 'kính';
        $kimloai = 'kim';
        $results = Design::where('material', 'like', '%' . $kinh . '%')->where('material', 'like', '%' . $kimloai . '%')->pluck('id');
        if(empty($results)){
            $products = Product::where('design_id', 0)->get();
        }else{
            $products = Product::where('design_id', $results)->get();
        }
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByDesignPlastic()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $plastics = Design::all();
        $nhua = 'nhựa';
        $results = Design::where('material', 'like', '%' . $nhua . '%')->pluck('id');
        if(empty($results)){
            $products = Product::where('design_id', 0)->get();
        }else{
            $products = Product::where('design_id', $results)->get();
        }
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexBySecurityFinger()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $vantay = 'vân tay';
        $results = Utility::where('advanced_security', 'like', '%' . $vantay . '%')->pluck('id');
        if(empty($results)){
            $products = Product::where('utility_id', 0)->get();
        }else{
            $products = Product::where('utility_id', $results)->get();
        }
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByWaterDustProof()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $chongbui = 'bụi';
        $chongnuoc = 'nước';
        $results = Utility::where('special_function', 'like', '%' . $chongbui . '%')->where('special_function', 'like', '%' . $chongnuoc . '%')->pluck('id');
        if(empty($results)){
            $products = Product::where('utility_id', 0)->get();
        }else{
            $products = Product::where('utility_id', $results)->get();
        }
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function DoubleSim()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $sim = '2 sim';
        $results = Connect::where('sim', 'like', '%' . $sim . '%')->pluck('id');
        if(empty($results)){
            $products = Product::where('connect_id', 0)->get();
        }else{
            $products = Product::where('connect_id', $results)->get();
        }
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexBy3DTouch()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $touch = '3D Touch';
        $results = Utility::where('special_function', 'like', '%' . $touch . '%')->pluck('id');
        if(empty($results)){
            $products = Product::where('utility_id', 0)->get();
        }else{
            $products = Product::where('utility_id', $results)->get();
        }
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByBatteryMax()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $results = Battery::where('battery_capacity', '>', 3000)->pluck('id');
        if(empty($results)){
            $products = Product::where('battery_id', 0)->get();
        }else{
            $products = Product::where('battery_id', $results)->get();
        }
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function search(Request $request)
    {   
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $products = Product::where('name', 'like', '%' . $request->search . '%')->get();    
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
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

        $count_vote_same=Vote::where('product_id', $product_tt)->count();
        $vote_same=Vote::where('product_id', $product_tt)->sum('star');
        if ($count_vote_same==0) {
            $avgvote_same=0;
        } else {
            $avgvote_same=(float)round($vote_same/$count_vote_same);
        }

        return View('products.compare')->with('products', $products)->with('product_sames', $product_sames)
        ->with('promotions', $promotions)->with('promotion_sames', $promotion_sames)
        ->with('count_vote', $count_vote)->with('avgvote', $avgvote)
        ->with('count_vote_same', $count_vote_same)->with('avgvote_same', $avgvote_same);
    }
}
