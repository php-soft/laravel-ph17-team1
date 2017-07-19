<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreBlogPostRequest;
use Session;
use Auth;
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
use App\Color;
use App\OperaSystem;
use App\Screen;
use App\Memory;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        $colors_add = Color::pluck('name', 'id');
        $manus_add = Manufactory::pluck('name', 'id');
        $cates_add = Category::pluck('name', 'id');
        $fronts_add = FrontCamera::pluck('resolution', 'id');
        $backs_add = BackCamera::pluck('resolution1', 'id');
        $batteries_add = Battery::pluck('capacity', 'id');
        $connects_add = Connect::pluck('network', 'id');
        $memories_add = Memory::pluck('ram', 'id');
        $designs_add = Design::pluck('design', 'id');
        $operas_add = OperaSystem::pluck('opera_system', 'id');
        $screens_add = Screen::pluck('width', 'id');
        $utilities_add = Utility::pluck('security', 'id');

        return View('admin.products.index')->with('products', $products)
        ->with('colors_add', $colors_add)
        ->with('manus_add', $manus_add)->with('cates_add', $cates_add)->with('fronts_add', $fronts_add)
        ->with('backs_add', $backs_add)->with('batteries_add', $batteries_add)
        ->with('connects_add', $connects_add)->with('memories_add', $memories_add)
        ->with('designs_add', $designs_add)->with('operas_add', $operas_add)
        ->with('screens_add', $screens_add)->with('utilities_add', $utilities_add);
    }

    public function indexAfterUpdate()
    {
        $products = Product::orderBy('updated_at', 'desc')->get();
        $colors_add = Color::pluck('name', 'id');
        $manus_add = Manufactory::pluck('name', 'id');
        $cates_add = Category::pluck('name', 'id');
        $fronts_add = FrontCamera::pluck('resolution', 'id');
        $backs_add = BackCamera::pluck('resolution1', 'id');
        $batteries_add = Battery::pluck('capacity', 'id');
        $connects_add = Connect::pluck('network', 'id');
        $memories_add = Memory::pluck('ram', 'id');
        $designs_add = Design::pluck('design', 'id');
        $operas_add = OperaSystem::pluck('opera_system', 'id');
        $screens_add = Screen::pluck('width', 'id');
        $utilities_add = Utility::pluck('security', 'id');

        return View('admin.products.index')->with('products', $products)
        ->with('colors_add', $colors_add)
        ->with('manus_add', $manus_add)->with('cates_add', $cates_add)->with('fronts_add', $fronts_add)
        ->with('backs_add', $backs_add)->with('batteries_add', $batteries_add)
        ->with('connects_add', $connects_add)->with('memories_add', $memories_add)
        ->with('designs_add', $designs_add)->with('operas_add', $operas_add)
        ->with('screens_add', $screens_add)->with('utilities_add', $utilities_add);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
                'name'=>'required',
                'color' => 'required',
                'manufactory' => 'required',
                'editor1' => 'required|min:3',
                'accessory' => 'required',
                'status' => 'required',
                'warranty_moth' => 'required',
                'backcamera' => 'required',
                'battery'=>'required',
                'connect'=>'required',
                'memory'=>'required',
                'design'=>'required',
                'operasystem'=>'required',
                'screen'=>'required',
                'utility'=>'required',
                'image'=>'required',
            ], [
                'name.required'=>'Tên trống',
                'color.required' => 'Màu trống',
                'price.required' => 'Giá trống',
                'price.regex' => 'Giá phải là số',
                'price.max' => 'Giá tối đa là 30 triệu đồng',
                'manufactory.required' => 'Hãng sản xuất trống',
                'editor1.required' => 'Mô tả trống',
                'editor1.min' => 'Mô tả tối thiểu 50 ký tự',
                'accessory.required' => 'Phụ kiện trống',
                'status.required' => 'Tình trạng trống',
                'warranty_moth.required' => 'Thời gian bảo hành trống',
                'backcamera.required' => 'Camera sau trống',
                'battery.required'=>'Pin trống',
                'connect.required'=>'Kết nối trống',
                'memory.required'=>'Bộ nhớ trống',
                'design.required'=>'Thiết kế trống',
                'operasystem.required'=>'HDH trống',
                'screen.required'=>'Màn hình trống',
                'utility.required'=>'Chức năng đặc biệt trống',
                'image.required'=>'Image trống',
                Session::flash('message', 'Có lỗi xảy ra'),
                Session::flash('alert-class', 'alert-error'),
            ]);
        $product = new Product;
        $product->name = $request->name;
        $product->color_id = $request->color;
        $product->slug =str_slug($request->name, "-");
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->manufactory_id = $request->manufactory;
        $product->description = $request->editor1;
        $product->accessory = $request->accessory;
        $product->status = $request->status;
        $product->warranty_moth = $request->warranty_moth;
        $product->back_camera_id = $request->backcamera;
        $product->front_camera_id = $request->frontcamera;
        $product->battery_id = $request->battery;
        $product->connect_id = $request->connect;
        $product->memory_id = $request->memory;
        $product->design_id = $request->design;
        $product->opera_system_id = $request->operasystem;
        $product->screen_id = $request->screen;
        $product->utility_id = $request->utility;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $image = '/assets/products/'.$name;
            $file->move("assets/products", $image);
            $product->image = $image;
        }
        if ($product->sale_price > $product->price or $product->sale_price == $product->price) {
            Session::flash('message', 'Giá khuyến mãi phải nhỏ hơn giá gốc! Thêm sản phẩm thất bại');
            Session::flash('alert-class', 'alert-error');
        } elseif ($request->category1 == true and $request->category2 == true and
            $request->category3 ==true and $request->category4 == true) {
            Session::flash('message', 'Danh mục không hợp lệ');
        } elseif ($request->category1 == true and $request->category2 == true) {
            Session::flash('message', 'Danh mục không hợp lệ');
        } elseif ($request->category1 == true and $request->category3 == true and
            $request->category4 == true) {
            Session::flash('message', 'Danh mục không hợp lệ');
        } elseif ($request->category2 == true and $request->category3 == true and
            $request->category4 == true) {
            Session::flash('message', 'Danh mục không hợp lệ');
        } elseif ($request->category1 == true and $request->category2 == true and
            $request->category3 == true) {
            Session::flash('message', 'Danh mục không hợp lệ');
        } elseif ($request->category1 == true and $request->category2 == true and
            $request->category4 == true) {
            Session::flash('message', 'Danh mục không hợp lệ');
        } elseif ($request->category2 == true and $request->category3 == true) {
            Session::flash('message', 'Danh mục không hợp lệ');
        } elseif ($request->category2 == true and $request->category4 == true) {
            Session::flash('message', 'Danh mục không hợp lệ');
        } elseif ($request->category3 == true and $request->category4 == true) {
            Session::flash('message', 'Danh mục không hợp lệ');
        } else {
            $product->save();
            if ($request->category1 == true and $request->category3 == true) {
                $product_category1 = new ProductCategory;
                $product_category1->category_id = $request->category1;
                $product_category1->product_id = $product->id;
                $product_category1->save();
                $product_category3 = new ProductCategory;
                $product_category3->category_id = $request->category3;
                $product_category3->product_id = $product->id;
                $product_category3->save();
            } elseif ($request->category1 == true and $request->category4 == true) {
                $product_category1 = new ProductCategory;
                $product_category1->category_id = $request->category1;
                $product_category1->product_id = $product->id;
                $product_category1->save();
                $product_category4 = new ProductCategory;
                $product_category4->category_id = $request->category4;
                $product_category4->product_id = $product->id;
                $product_category4->save();
            } elseif ($request->category1 == true) {
                $product_category1 = new ProductCategory;
                $product_category1->category_id = $request->category1;
                $product_category1->product_id = $product->id;
                $product_category1->save();
            } elseif ($request->category2 == true) {
                $product_category2 = new ProductCategory;
                $product_category2->category_id = $request->category2;
                $product_category2->product_id = $product->id;
                $product_category2->save();
            } elseif ($request->category3 == true) {
                $product_category3 = new ProductCategory;
                $product_category3->category_id = $request->category3;
                $product_category3->product_id = $product->id;
                $product_category3->save();
            } else {
                $product_category4 = new ProductCategory;
                $product_category4->category_id = $request->category4;
                $product_category4->product_id = $product->id;
                $product_category4->save();
            }
            Session::flash('message', 'Đã thêm sản phẩm ' .$product->name. ' thành công');
            Session::flash('alert-class', 'alert-success');
        }
        return back();
    }

    public function indexByID($slug)
    {
        $login = Auth::check();
        if ($login==true) {
            $alow = 1;
        } else {
            $alow = 0;
        }
        $product_id = Product::where('slug', $slug)->pluck('id');
        $products=Product::find($product_id);
        if (count($products) == 0) {
            Session::flash('message', 'Không tìm thấy sản phẩm nào');
        }

        $cate_id = ProductCategory::where('product_id', $product_id)->pluck('category_id');
        $pros_cate = ProductCategory::where('category_id', $cate_id)->pluck('product_id');
        $product_tt = Product::where('id', '<>', $product_id)->orwhere('id', $pros_cate)->pluck('id');
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

        return view('admin.products.detail')->with('products', $products)->with('alow', $alow)
        ->with('news', $news)->with('product_sames', $product_sames)
        ->with('count_vote', $count_vote)
        ->with('avgvote', $avgvote)->with('stores', $stores)->with('promotions', $promotions)
        ->with('votes', $votes)->with('reviews', $reviews);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $colors = Color::pluck('name', 'id');
        $manus = Manufactory::pluck('name', 'id');
        $cates = Category::pluck('name', 'id');
        $fronts = FrontCamera::pluck('resolution', 'id');
        $backs = BackCamera::pluck('resolution1', 'id');
        $batteries = Battery::pluck('capacity', 'id');
        $connects = Connect::pluck('network', 'id');
        $memories = Memory::pluck('ram', 'id');
        $designs = Design::pluck('design', 'id');
        $operas = OperaSystem::pluck('opera_system', 'id');
        $screens = Screen::pluck('width', 'id');
        $utilities = Utility::pluck('security', 'id');
        return View('admin.products.edit')->with('product', $product)->with('colors', $colors)
        ->with('manus', $manus)->with('cates', $cates)->with('fronts', $fronts)
        ->with('backs', $backs)->with('batteries', $batteries)->with('connects', $connects)
        ->with('memories', $memories)->with('designs', $designs)->with('operas', $operas)
        ->with('screens', $screens)->with('utilities', $utilities);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
                  'name'=>'required',
                  'color' => 'required',
                  'manufactory' => 'required',
                  'editor1' => 'required|min:3',
                  'accessory' => 'required',
                  'status' => 'required',
                  'warranty_moth' => 'required',
                  'backcamera' => 'required',
                  'battery'=>'required',
                  'connect'=>'required',
                  'memory'=>'required',
                  'design'=>'required',
                  'operasystem'=>'required',
                  'screen'=>'required',
                  'utility'=>'required',
            ], [
                  'name.required'=>'Tên trống',
                  'color.required' => 'Màu trống',
                  'price.required' => 'Giá trống',
                  'price.regex' => 'Giá phải là số',
                  'price.max' => 'Giá tối đa là 30 triệu đồng',
                  'manufactory.required' => 'Hãng sản xuất trống',
                  'editor1.required' => 'Mô tả trống',
                  'editor1.min' => 'Mô tả tối thiểu 50 ký tự',
                  'accessory.required' => 'Phụ kiện trống',
                  'status.required' => 'Tình trạng trống',
                  'warranty_moth.required' => 'Thời gian bảo hành trống',
                  'backcamera.required' => 'Camera sau trống',
                  'battery.required'=>'Pin trống',
                  'connect.required'=>'Kết nối trống',
                  'memory.required'=>'Bộ nhớ trống',
                  'design.required'=>'Thiết kế trống',
                  'operasystem.required'=>'HDH trống',
                  'screen.required'=>'Màn hình trống',
                  'utility.required'=>'Chức năng đặc biệt trống',
                  Session::flash('message', 'Có lỗi xảy ra'),
                  Session::flash('alert-class', 'alert-error'),
            ]);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->color_id = $request->color;
        $product->slug =str_slug($request->name, "-");
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->manufactory_id = $request->manufactory;
        $product->description = $request->editor1;
        $product->accessory = $request->accessory;
        $product->status = $request->status;
        $product->warranty_moth = $request->warranty_moth;
        $product->back_camera_id = $request->backcamera;
        $product->front_camera_id = $request->frontcamera;
        $product->battery_id = $request->battery;
        $product->connect_id = $request->connect;
        $product->memory_id = $request->memory;
        $product->design_id = $request->design;
        $product->opera_system_id = $request->operasystem;
        $product->screen_id = $request->screen;
        $product->utility_id = $request->utility;
        if ($request->hasFile('image')) {
              $file = $request->file('image');
              $name = $file->getClientOriginalName();
              $image = '/assets/products/'.$name;
              $file->move("assets/products", $image);
              $product->image = $image;
        } elseif (empty($request->hasFile('image'))) {
              $file = $request->img;
              $image = $file;
              $product->image = $image;
        }
        if ($product->sale_price > $product->price or $product->sale_price == $product->price) {
            Session::flash('message', 'Giá khuyến mãi phải nhỏ hơn giá gốc! Cập nhật sản phẩm thất bại');
            return redirect('admin/products');
        }
        if ($request->category1 == true and $request->category2 == true and
            $request->category3 == true and $request->category4 == true) {
            Session::flash('message', 'Danh mục không hợp lệ! Cập nhật thất bại');
            return redirect('admin/products');
        } elseif ($request->category1 == true and $request->category2 == true) {
            Session::flash('message', 'Danh mục không hợp lệ! Cập nhật thất bại');
            return redirect('admin/products');
        } elseif ($request->category1 == true and $request->category3 == true and
              $request->category4 == true) {
            Session::flash('message', 'Danh mục không hợp lệ! Cập nhật thất bại');
            return redirect('admin/products');
        } elseif ($request->category2 == true and $request->category3 == true and
              $request->category4 == true) {
            Session::flash('message', 'Danh mục không hợp lệ! Cập nhật thất bại');
            return redirect('admin/products');
        } elseif ($request->category1 == true and $request->category2 == true and
              $request->category3 == true) {
            Session::flash('message', 'Danh mục không hợp lệ! Cập nhật thất bại');
            return redirect('admin/products');
        } elseif ($request->category1 == true and $request->category2 == true and
              $request->category4 == true) {
            Session::flash('message', 'Danh mục không hợp lệ! Cập nhật thất bại');
            return redirect('admin/products');
        } elseif ($request->category2 == true and $request->category3 == true) {
            Session::flash('message', 'Danh mục không hợp lệ! Cập nhật thất bại');
            return redirect('admin/products');
        } elseif ($request->category2 == true and $request->category4 == true) {
            Session::flash('message', 'Danh mục không hợp lệ! Cập nhật thất bại');
            return redirect('admin/products');
        } elseif ($request->category3 == true and $request->category4 == true) {
            Session::flash('message', 'Danh mục không hợp lệ! Cập nhật thất bại');
            return redirect('admin/products');
        }
        if ($request->category1 == true and $request->category3 == true) {
            $cate_pros = ProductCategory::where('product_id', $product->id)->pluck('id');
            foreach ($cate_pros as $cate_pro) {
                ProductCategory::find($cate_pro)->delete();
            }
            $product_category1 = new ProductCategory;
            $product_category1->category_id = $request->category1;
            $product_category1->product_id = $product->id;
            $product_category1->save();
            $product_category3 = new ProductCategory;
            $product_category3->category_id = $request->category3;
            $product_category3->product_id = $product->id;
            $product_category3->save();
        } elseif ($request->category1 == true and $request->category4 == true) {
            $cate_pros = ProductCategory::where('product_id', $product->id)->pluck('id');
            foreach ($cate_pros as $cate_pro) {
                  ProductCategory::find($cate_pro)->delete();
            }
            $product_category1 = new ProductCategory;
            $product_category1->category_id = $request->category1;
            $product_category1->product_id = $product->id;
            $product_category1->save();
            $product_category4 = new ProductCategory;
            $product_category4->category_id = $request->category4;
            $product_category4->product_id = $product->id;
            $product_category4->save();
        } elseif ($request->category1 == true) {
            $cate_pros = ProductCategory::where('product_id', $product->id)->pluck('id');
            foreach ($cate_pros as $cate_pro) {
                  ProductCategory::find($cate_pro)->delete();
            }
            $product_category1 = new ProductCategory;
            $product_category1->category_id = $request->category1;
            $product_category1->product_id = $product->id;
            $product_category1->save();
        } elseif ($request->category2 == true) {
            $cate_pros = ProductCategory::where('product_id', $product->id)->pluck('id');
            foreach ($cate_pros as $cate_pro) {
                  ProductCategory::find($cate_pro)->delete();
            }
            $product_category2 = new ProductCategory;
            $product_category2->category_id = $request->category2;
            $product_category2->product_id = $product->id;
            $product_category2->save();
        } elseif ($request->category3 == true) {
            $cate_pros = ProductCategory::where('product_id', $product->id)->pluck('id');
            foreach ($cate_pros as $cate_pro) {
                  ProductCategory::find($cate_pro)->delete();
            }
            $product_category3 = new ProductCategory;
            $product_category3->category_id = $request->category3;
            $product_category3->product_id = $product->id;
            $product_category3->save();
        } elseif ($request->category4 == true) {
            $cate_pros = ProductCategory::where('product_id', $product->id)->pluck('id');
            foreach ($cate_pros as $cate_pro) {
                  ProductCategory::find($cate_pro)->delete();
            }
            $product_category4 = new ProductCategory;
            $product_category4->category_id = $request->category4;
            $product_category4->product_id = $product->id;
            $product_category4->save();
        } else {
            $product->save();
            Session::flash('message', 'Đã cập nhật sản phẩm ' .$product->name. ' thành công');
            Session::flash('alert-class', 'alert-success');
            return redirect('admin/products/afterupdate');
        }
        $product->save();
        Session::flash('message', 'Đã cập nhật sản phẩm ' .$product->name. ' thành công');
        Session::flash('alert-class', 'alert-success');
        return redirect('admin/products/afterupdate');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        Session::flash('message', 'Đã xóa thành công');
        Session::flash('alert-class', 'alert-success');
        return redirect('admin/products');
    }
}
