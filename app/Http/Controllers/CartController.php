<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Color;
use App\Memory;
use Input;
use Cart;

class CartController extends Controller
{
    public $qtysp = 0;
    public function index()
    {
        $products = Product::all();
        $content = Cart::content();
        $total = Cart::total();
        $qty = Cart::count();
        $qtysp = Cart::content()->count();
        $subtotal = Cart::subtotal();
        return view('pages.cart', compact('qtysp'), compact('subtotal'))->with('products', $products)
            ->with('content', $content)->with('total', $total)->with('qty', $qty);
    }

    public function getAddtoCart($id)
    {
        $product = Product::find($id);
        $color = Color::find($product->color_id);
        $memory = Memory::find($product->memory_id);
        $insert = Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => 1,
         'price' => $product->price, 'options' => ['color' => $color->name, 'image' => $product->image,
          'ram' => $memory->ram, 'rom' => $memory->rom]]);
        return redirect()->route('home');
    }

    public function getCheckout()
    {
        $products = Product::all();
        $content = Cart::content();
        $total = Cart::total();
        $qty = Cart::count();
        $qtysp = Cart::content()->count();
        $subtotal = Cart::subtotal();
        return view('home', compact('content'), compact('products'), compact('qtysp'), compact('subtotal'))
        ->with('total', $total)->with('qty', $qty);
    }

    public function getUpdateQtyCart($id)
    {
        $rowid = Cart::content()->where('id', $id)->pluck('rowId')->first();
        $qty = Cart::content()->where('id', $id)->pluck('qty')->first();
        Cart::update($rowid, $qty+1);
        // $total=Cart::total();
        return redirect()->back();
    }

    public function getDeleteQtyCart($id)
    {
        $rowid = Cart::content()->where('id', $id)->pluck('rowId')->first();
        $qty = Cart::content()->where('id', $id)->pluck('qty')->first();
        Cart::update($rowid, $qty-1);
        return redirect()->back();
    }

    public function getDeleteProductCart($id)
    {
        $rowid = Cart::content()->where('id', $id)->pluck('rowId')->first();
        Cart::remove($rowid);
        return redirect()->back();
    }

    public function getDeleteCart()
    {
        $content = Cart::content()->pluck('rowId');
        foreach ($content as $item) {
            Cart::remove($item);
        }
        return redirect()->back();
    }

    public function getUpdateCart($id, Request $request)
    {
        echo "đang hoàn thiện";
    }
}
