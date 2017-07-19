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
        $products = Product::orderBy('price', 'desc')->get();
        if (count($products) == 0) {
            Session::flash('message', 'Không tìm thấy sản phẩm nào');
        }
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        
        return View('products.index')->with('products', $products)->with('manu_alls', $manu_alls)
        ->with('manu_2s', $manu_2s);
    }
    public function indexByID($slug)
    {
        if (Auth::check() == true) {
            $login = 1;
            $users = \Auth::user()->get();
        } else {
            $login = 0;
            $users = User::all();
        }
        $product_id = Product::where('slug', $slug)->pluck('id');
        $products=Product::find($product_id);
        if (count($products) == 0) {
            Session::flash('message', 'Không tìm thấy sản phẩm nào');
        }

        $cate_id = ProductCategory::where('product_id', $product_id)->pluck('category_id');
        $pros_cate = ProductCategory::where('category_id', $cate_id)->pluck('product_id');
        $product_tt = Product::where('id', '<>', $product_id)->orwhere('id', $pros_cate)
        ->orderBy('price', 'desc')->limit(3)->pluck('id');
        $product_sames = Product::find($product_tt);

        $news = News::orderBy('created_at', 'desc')->limit(3)->get();

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

        return view('products.detail')->with('products', $products)->with('login', $login)
        ->with('news', $news)->with('product_sames', $product_sames)
        ->with('count_vote', $count_vote)->with('avgvote', $avgvote)
        ->with('stores', $stores)->with('promotions', $promotions)
        ->with('votes', $votes)->with('reviews', $reviews)->with('users', $users);
    }

    public function indexByName(Request $request)
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $manu_id = Manufactory::where('name', $request->name)->pluck('id');
        $products = Product::where('manufactory_id', $manu_id)->get();
        if (count($products) == 0) {
            Session::flash('message', 'Không tìm thấy sản phẩm nào');
        }
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByPriceDown1M()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $products = Product::where('price', '<', 1000000)->get();
        if (count($products) == 0) {
            Session::flash('message', 'Không tìm thấy sản phẩm nào');
        }
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByPrice1to3M()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $products = Product::whereBetween('price', [1000000, 3000000])
        ->whereBetween('sale_price', [1000000, 3000000])->get();
        if (count($products) == 0) {
            Session::flash('message', 'Không tìm thấy sản phẩm nào');
        }
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByPrice3to7M()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $products = Product::whereBetween('price', [3000000, 7000000])
        ->orwhereBetween('sale_price', [3000000, 7000000])->get();
        if (count($products) == 0) {
            Session::flash('message', 'Không tìm thấy sản phẩm nào');
        }
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByPrice7to10M()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $products = Product::whereBetween('sale_price', [7000000, 10000000])
        ->orwhereBetween('price', [7000000, 10000000])->get();
        if (count($products) == 0) {
            Session::flash('message', 'Không tìm thấy sản phẩm nào');
        }
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
            ->with('products', $products);
    }

    public function indexByPrice10to15M()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $products = Product::whereBetween('sale_price', [10000000, 15000000])
        ->orWhereBetween('price', [10000000, 15000000])->get();
        if (count($products) == 0) {
            Session::flash('message', 'Không tìm thấy sản phẩm nào');
        }
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByPriceUp15M()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $products = Product::where('price', '>', 15000000)->get();
        if (count($products) == 0) {
            Session::flash('message', 'Không tìm thấy sản phẩm nào');
        }
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexBySmartPhone()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $category_id = Category::where('name', 'smartphone')->pluck('id');
        $product_id=ProductCategory::where('category_id', $category_id)->pluck('product_id');
        $products = Product::find($product_id);
        if (count($products) == 0) {
            Session::flash('message', 'Không tìm thấy sản phẩm nào');
        }
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByClassicPhone()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $category_id = Category::where('name', 'classicphone')->pluck('id');
        $product_id=ProductCategory::where('category_id', $category_id)->pluck('product_id');
        $products = Product::find($product_id);
        if (count($products) == 0) {
            Session::flash('message', 'Không tìm thấy sản phẩm nào');
        }
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByAndroid()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $category_id = Category::where('name', 'android')->pluck('id');
        $product_id=ProductCategory::where('category_id', $category_id)->pluck('product_id');
        $products = Product::find($product_id);
        if (count($products) == 0) {
            Session::flash('message', 'Không tìm thấy sản phẩm nào');
        }
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByIOS()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $category_id = Category::where('name', 'ios')->pluck('id');
        $product_id=ProductCategory::where('category_id', $category_id)->pluck('product_id');
        $products = Product::find($product_id);
        if (count($products) == 0) {
            Session::flash('message', 'Không tìm thấy sản phẩm nào');
        }
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByCameraDown3MP()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $back_camera_id = BackCamera::where('resolution1', '<', 3)->orWhere('resolution2', '<', 3)
        ->pluck('id');
        $products = Product::find($back_camera_id);
        if (count($products) == 0) {
            Session::flash('message', 'Không tìm thấy sản phẩm nào');
        }
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByCamera3to5MP()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $back_camera_id = BackCamera::whereBetween('resolution1', [3, 5])
        ->orWhereBetween('resolution2', [3, 5])->pluck('id');
        $products = Product::find($back_camera_id);
        if (count($products) == 0) {
            Session::flash('message', 'Không tìm thấy sản phẩm nào');
        }
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByCamera5to8MP()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $back_camera_id = BackCamera::whereBetween('resolution1', [5, 8])
        ->orWhereBetween('resolution2', [5, 8])->pluck('id');
        $products = Product::find($back_camera_id);
        if (count($products) == 0) {
            Session::flash('message', 'Không tìm thấy sản phẩm nào');
        }
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByCamera8to12MP()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $back_camera_id = BackCamera::whereBetween('resolution1', [8, 12])
        ->orWhereBetween('resolution2', [8, 12])->pluck('id');
        $products = Product::where('back_camera_id', $back_camera_id)->get();
        if (count($products) == 0) {
            Session::flash('message', 'Không tìm thấy sản phẩm nào');
        }
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByCameraUp12MP()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $products = Product::where('back_camera_id', BackCamera::where('resolution1', '>', 12)
        ->orWhere('resolution2', '>', 12)->pluck('id'))->get();
        if (count($products) == 0) {
            Session::flash('message', 'Không tìm thấy sản phẩm nào');
        }
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
        $results = Design::where('design', 'like', '%' . $nguyenkhoi . '%')
        ->where('material', 'like', '%' . $kimloai . '%')
        ->where('material', 'not like', '%' . $kinh . '%')->pluck('id');
        if (empty($results)) {
            $products = Product::where('design_id', 0)->get();
            if (count($products) == 0) {
                Session::flash('message', 'Không tìm thấy sản phẩm nào');
            }
        } else {
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
        $results = Design::where('material', 'like', '%' . $nhua . '%')
        ->where('material', 'like', '%' . $kimloai . '%')->pluck('id');
        if (empty($results)) {
            $products = null;
            if (count($products) == 0) {
                Session::flash('message', 'Không tìm thấy sản phẩm nào');
            }
        } else {
            $products = Product::find($results);
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
        $results = Design::where('material', 'like', '%' . $kinh . '%')
        ->where('material', 'like', '%' . $kimloai . '%')->pluck('id');
        if (empty($results)) {
            $products = Product::where('design_id', 0)->get();
            if (count($products) == 0) {
                Session::flash('message', 'Không tìm thấy sản phẩm nào');
            }
        } else {
            $products = Product::where('design_id', $results)->get();
        }
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByDesignPlastic()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $nhua = 'nhựa';
        $results = Design::where('material', 'like', '%' . $nhua . '%')->pluck('id');
        if (empty($results)) {
            $products = Product::where('design_id', 0)->get();
            if (count($products) == 0) {
                Session::flash('message', 'Không tìm thấy sản phẩm nào');
            }
        } else {
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
        if (empty($results)) {
            $products = Product::where('utility_id', 0)->get();
            if (count($products) == 0) {
                Session::flash('message', 'Không tìm thấy sản phẩm nào');
            }
        } else {
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
        $results = Utility::where('special_function', 'like', '%' . $chongbui . '%')
        ->where('special_function', 'like', '%' . $chongnuoc . '%')->pluck('id');
        if (empty($results)) {
            $products = Product::where('utility_id', 0)->get();
            if (count($products) == 0) {
                Session::flash('message', 'Không tìm thấy sản phẩm nào');
            }
        } else {
            $products = Product::where('utility_id', $results)->get();
        }
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByDoubleSim()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $sim = '2 sim';
        $results = Connect::where('sim', 'like', '%' . $sim . '%')->pluck('id');
        if (empty($results)) {
            $products = Product::where('connect_id', 0)->get();
            if (count($products) == 0) {
                Session::flash('message', 'Không tìm thấy sản phẩm nào');
            }
        } else {
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
        if (empty($results)) {
            $products = Product::where('utility_id', 0)->get();
            if (count($products) == 0) {
                Session::flash('message', 'Không tìm thấy sản phẩm nào');
            }
        } else {
            $products = Product::where('utility_id', $results)->get();
        }
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function indexByBatteryMax()
    {
        $manu_alls = Manufactory::all();
        $manu_2s = Manufactory::whereIn('id', array(1, 2))->orderBy('name', 'asc')->get();
        $results = Battery::where('capacity', '>', 3000)->pluck('id');
        if (empty($results)) {
            $products = Product::where('battery_id', 0)->get();
            if (count($products) == 0) {
                Session::flash('message', 'Không tìm thấy sản phẩm nào');
            }
        } else {
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
        if (count($products) == 0) {
            Session::flash('message', 'Không tìm thấy sản phẩm nào');
        }
        return View('products.index')->with('manu_alls', $manu_alls)->with('manu_2s', $manu_2s)
        ->with('products', $products);
    }

    public function storeVote(Request $request, $slug)
    {
        

        if (Auth::check() == true) {
            $this->validate($request, [
                'comment' => 'required|min:3',
                'star' => 'required',
            ], [
                'comment.required' => 'Hãy viết một vài lời bình luận về sản phẩm',
                'comment.min' => 'Bình luận tối thiểu 80 ký tự',
                'star.required' => 'Hãy chọn số sao',
                Session::flash('message', 'Có lỗi xảy ra'),
                Session::flash('alert-class', 'alert-error'),
            ]);
            $product_id = Product::where('slug', $slug)->pluck('id');
            $products=Product::where('id', $product_id)->first();
            $vote = Vote::where('product_id', $product_id)->first();
            $user_id = Auth::user()->id;
            $user = User::where('id', $user_id)->first();
            if (empty($vote)) {
                $vote = new Vote;
                $vote->product_id = $request->product_id;
                $vote->customer_id = $user_id;
                $vote->star = $request->star;
                $vote->name = $user->name;
                $vote->email = $user->email;
                $vote->phone = $user->phonenumber;
                $vote->comment = $request->comment;
                $vote->save();
                Session::flash('message', 'Cảm ơn ' .$user->name . ' đã đánh giá sản phẩm chúng tôi');
                Session::flash('alert-class', 'alert-error');
            } else {
                Session::flash('message', 'Bạn đã đánh giá sản phẩm ' .$products->name .' rồi');
                Session::flash('alert-class', 'alert-error');
            }
        } else {
            $product_id = Product::where('slug', $slug)->pluck('id');
            $products=Product::where('id', $product_id)->first();
            $this->validate($request, [
                'name' => 'required',
                'star' => 'required',
                'email' => 'required|email|unique:votes',
                'phone' => 'required|regex:/[0-9]/',
                'comment' => 'required|min:3',
            ], [
                'name.required' => 'Chưa nhập tên',
                'star.required' => 'Hãy chọn số sao',
                'email.required' => 'Chưa nhập email',
                'email.email' => 'Email không hợp lệ',
                'email.unique' => 'Bạn đã đánh giá sản phẩm ' .$products->name .' rồi',
                'phone.required' => 'Chưa nhập số điện thoại',
                'phone.regex' => 'Số điện thoại không hợp lệ',
                'comment.required' => 'Hãy viết một vài lời bình luận về sản phẩm',
                'comment.min' => 'Bình luận tối thiểu 80 ký tự',
                Session::flash('message', 'Có lỗi xảy ra'),
                Session::flash('alert-class', 'alert-error'),
            ]);
            $vote = new Vote;
            $vote->product_id = $request->product_id;
            $vote->star = $request->star;
            $vote->name = $request->name;
            $vote->email = $request->email;
            $vote->phone = $request->phone;
            $vote->comment = $request->comment;
            $vote->save();
            Session::flash('message', 'Cảm ơn ' .$vote->name .' đã đánh giá sản phẩm chúng tôi');
            Session::flash('alert-class', 'alert-success');
        }
        return back();
    }

    public function storeComment(Request $request)
    {
        if (Auth::check() == true) {
            $this->validate($request, [
                'comment' => 'required|min:3',
            ], [
                'comment.required'=> 'Hãy để lại vài dòng bình luận',
                'comment.min'=> 'Comment tối thiểu 10 ký tự',
                Session::flash('message', 'Có lỗi xảy ra'),
                Session::flash('alert-class', 'alert-error'),
            ]);
            $user_id = Auth::user()->id;
            $user = User::where('id', $user_id)->first();
            $review = new Review;
            $review->product_id = $request->product_id;
            $review->name = $user->name;
            $review->email = $user->email;
            $review->phone = $user->phonenumber;
            $review->comment = $request->comment;
            $review->save();
            Session::flash('message', 'Cảm ơn ' .$user->name . ' đã để lại phản hồi');
            Session::flash('alert-class', 'alert-success');
        } else {
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
        }
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
