<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreBlogPostRequest;
use Session;
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
        $product_gets = Product::all();
        $colors = Color::all();
        $manus = Manufactory::all();
        $product_id = Product::where('id', 1)->pluck('id');
        $cate_id = ProductCategory::where('product_id', $product_id)->pluck('category_id');
        $cates = Category::find($cate_id)->pluck('name');
        $fronts = FrontCamera::all();
        $backs = BackCamera::all();
        $batteries = Battery::all();
        $connects = Connect::all();
        $memories = Memory::all();
        $designs = Design::all();
        $operas = OperaSystem::all();
        $screens = Screen::all();
        $utilities = Utility::all();

        $colors_add = Color::pluck('name', 'id');
        $manus_add = Manufactory::pluck('name', 'id');
        $cates_add = Category::pluck('name', 'id');
        $fronts_add = FrontCamera::pluck('resolution1', 'id');
        $backs_add = BackCamera::pluck('resolution1', 'id');
        $batteries_add = Battery::pluck('battery_capacity', 'id');
        $connects_add = Connect::pluck('network_mobile', 'id');
        $memories_add = Memory::pluck('ram', 'id');
        $designs_add = Design::pluck('design', 'id');
        $operas_add = OperaSystem::pluck('opera_system', 'id');
        $screens_add = Screen::pluck('resolution', 'id');
        $utilities_add = Utility::pluck('advanced_security', 'id');

        return View('admin.products.index')->with('products', $products)
        ->with('product_gets', $product_gets)->with('colors', $colors)
        ->with('manus', $manus)->with('cates', $cates)->with('fronts', $fronts)
        ->with('backs', $backs)->with('batteries', $batteries)->with('connects', $connects)
        ->with('memories', $memories)->with('designs', $designs)->with('operas', $operas)
        ->with('screens', $screens)->with('utilities', $utilities)->with('colors_add', $colors_add)
        ->with('manus_add', $manus_add)->with('cates_add', $cates_add)->with('fronts_add', $fronts_add)
        ->with('backs_add', $backs_add)->with('batteries_add', $batteries_add)
        ->with('connects_add', $connects_add)->with('memories_add', $memories_add)
        ->with('designs_add', $designs_add)->with('operas_add', $operas_add)
        ->with('screens_add', $screens_add)->with('utilities_add', $utilities_add);
    }

    public function new(Request $request)
    {
        $this->validate($request, [
          'name'=>'required',
          'color' => 'required',
          'manufactory' => 'required',
          'description' => 'required',
          'accessory' => 'required',
          'warranty_moth' => 'required',
          'category' => 'required',
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
          'description.required' => 'Mô tả trống',
          'accessory.required' => 'Phụ kiện trống',
          'warranty_moth.required' => 'Thời gian bảo hành trống',
          'category.required' => 'Danh mục trống',
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
        $product->description = $request->description;
        $product->accessory = $request->accessory;
        $product->warranty_moth = $request->warranty_moth;
        $product->category_id = $request->category;
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
        if ($product->sale_price > $product->price) {
            Session::flash('message', 'Giá khuyến mãi phải nhỏ hơn giá gốc! Thêm sản phẩm thất bại');
            Session::flash('alert-class', 'alert-error');
        } else {
            $product->save();
            Session::flash('message', 'Đã thêm sản phẩm ' .$product->name. ' thành công');
            Session::flash('alert-class', 'alert-success');  
        }
        return back();
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $colors = Color::pluck('name', 'id');
        $manus = Manufactory::pluck('name', 'id');
        $cates = Category::pluck('name', 'id');
        $fronts = FrontCamera::pluck('resolution1', 'id');
        $backs = BackCamera::pluck('resolution1', 'id');
        $batteries = Battery::pluck('battery_capacity', 'id');
        $connects = Connect::pluck('network_mobile', 'id');
        $memories = Memory::pluck('ram', 'id');
        $designs = Design::pluck('design', 'id');
        $operas = OperaSystem::pluck('opera_system', 'id');
        $screens = Screen::pluck('resolution', 'id');
        $utilities = Utility::pluck('advanced_security', 'id');
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
            'price' => 'required|regex:/[0-9]/|max:30000000',
            'manufactory' => 'required',
            'description' => 'required',
            'accessory' => 'required',
            'warranty_moth' => 'required',
            'category' => 'required',
            'backcamera' => 'required',
            'frontcamera' => 'required',
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
            'description.required' => 'Mô tả trống',
            'accessory.required' => 'Phụ kiện trống',
            'warranty_moth.required' => 'Thời gian bảo hành trống',
            'category.required' => 'Danh mục trống',
            'backcamera.required' => 'Camera sau trống',
            'frontcamera.required' => 'Camera trướt trống',
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
        $product = Product::find($id);
        $product->name = $request->name;
        $product->color_id = $request->color;
        $product->slug =str_slug($request->name, "-");
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $product->manufactory_id = $request->manufactory;
        $product->description = $request->description;
        $product->accessory = $request->accessory;
        $product->warranty_moth = $request->warranty_moth;
        $product->category_id = $request->category;
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
        if($product->sale_price > $product->price){
          Session::flash('message', 'Giá khuyến mãi phải nhỏ hơn giá gốc! Cập nhật thất bại');
          Session::flash('alert-class', 'alert-error');
        }else{
          $product->save();
          Session::flash('message', 'Đã cập sản phẩm ' .$product->name. ' thành công');
          Session::flash('alert-class', 'alert-success');
        }
        return redirect('admin/products');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        Session::flash('message', 'Đã xóa thành công');
        Session::flash('alert-class', 'alert-success');
        return redirect('admin/products');
    }
}
