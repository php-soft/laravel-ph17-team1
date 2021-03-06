<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Snowfire\Beautymail\BeautymailServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use App\Product;
use App\Store;
use App\StoreProduct;
use App\Order;
use App\OrderDetail;
use App\Color;
use App\Memory;
use App\Voucher;
use Cart;
use Alert;
use Session;

class OrderController extends Controller
{
    public $qtysp = 0;
    public function showOrder()
    {
        $qtysp = Cart::content()->count();
        if ($qtysp == 0) {
            return view('orders.showorder', compact('qtysp'));
        } else {
            $order = Order::pluck(
                'id',
                'shipping_name',
                'shipping_address',
                'shipping_phone',
                'shipping_email',
                'voucher_code'
            );
            if (!empty(auth()->user()->id)) {
                $order->shipping_name = auth()->user()->name;
                $order->shipping_phone = auth()->user()->phonenumber;
                $order->shipping_address = auth()->user()->address;
                $order->shipping_email = auth()->user()->email;
            }
            $store = Store::all()->pluck('name', 'id');
            $products = Product::all();
            $content = Cart::content();
            $total = Cart::total();
            $qty = Cart::count();
            $qtysp = Cart::content()->count();
            $subtotal = Cart::subtotal();
            return view('orders.showorder', compact('qtysp'), compact('subtotal'))
            ->with('products', $products)->with('content', $content)->with('total', $total)
            ->with('qty', $qty)->with('order', $order)->with('store', $store);
        }
    }
    public function storeOrder(Request $request)
    {
        $this->validate($request, [
            'shipping_name' => 'required|max:50',
            'shipping_email' => 'required|max:255',
            'shipping_address' => 'required|max:255',
            'shipping_phone' => 'required|max:12'
        ], [
            'shipping_name.required' => 'Vui lòng nhập tên người nhận.',
            'shipping_name.max' => 'Vui lòng nhập tên không quá 50 kí tự.',
            'shipping_email.required' => 'Vui lòng nhập email người nhận.',
            'shipping_email.max' => 'Vui lòng nhập số điện thoại không quá 255 kí tự.',
            'shipping_address.required' => 'Vui lòng nhập đia chỉ người nhận.',
            'shipping_address.max' => 'Vui lòng nhập email không quá 255 kí tự.',
            'shipping_phone.required' => 'Vui lòng nhập số điện thoại người nhận.',
            'shipping_phone.max' => 'Vui lòng nhập số điện thoại không quá 12 kí tự.'
        ]);
        //create new order
        $content = Cart::content();
        $store_id = $request->store;
        $store = Store::find($store_id);
        $store_name = $store->name;
        $error = "";
        if (!empty($content)) {
            foreach ($content as $data) {
                $qty_store = StoreProduct::where('store_id', $store_id)->where('product_id', $data->id)
                ->pluck('quantity')->first();
                if ($qty_store < $data->qty) {
                    if (empty($qty_store)) {
                        $error = "Cửa hàng $store_name, $data->name không còn sản phẩm,
                                 vui lòng chọn cửa hàng khác!";
                    } else {
                        $error = "Cửa hàng $store_name, $data->name chỉ còn $qty_store sản phẩm,
                                 vui lòng chọn cửa hàng khác!";
                    }
                } else {
                    if (!empty($request->voucher_code)) {
                        $voucher = Voucher::where('code', $request->voucher_code)->first();
                        if (!empty($voucher)) {
                            $fromtime = date('Y/m/d', strtotime($voucher->start_date));
                            $totime = date('Y/m/d', strtotime($voucher->end_date));
                            $toDate = date('Y/m/d', time());
                            // echo $fromtime . "<br>" . $totime . "<br>". $toDate;exit ;
                            // so sánh ngày để biết voucher còn hạn không và số lượng >0
                            if (strtotime($fromtime) >= strtotime($toDate)) {
                                $error = "mã voucher: $request->voucher_code chưa tới ngày cho phép,
                                 vui nhập mã giảm giá khác!";
                            } elseif (strtotime($toDate) >= strtotime($totime)) {
                                $error = "mã voucher: $request->voucher_code quá thời gian cho phép,
                                 vui nhập mã giảm giá khác!";
                            } elseif ($voucher->quantity == 0) {
                                $error = "mã voucher: $request->voucher_code đã hết số lượng,
                                 vui nhập mã giảm giá khác!";
                            } else {
                                $total = Cart::subtotal(0, '', '');
                                $value = $voucher->percent * $total /100;
                                // echo $value . "<br>".$total ."<br>".$voucher->max;exit;
                                if ($value <= $voucher->max) {
                                    $total = $total-$value;
                                } else {
                                    $total = $total - $voucher->max;
                                }
                            }
                        } else {
                            $error = "mã voucher: $request->voucher_code không tồn tại,
                             vui nhập mã giảm giá khác!";
                        }
                    } else {
                        $total = Cart::subtotal(0, '', '');
                    }
                }
            }
        }
        if (empty($error)) {
            $order = new Order;
            if (!empty(auth()->user()->id)) {
                $order->customer_id = auth()->user()->id;
            }
            //gán biến mới tạo id tự động
            $order_lastid = Order::pluck('id')->last();
            $order_lastid = $order_lastid+1;
            if ($order_lastid<1000000) {
                $order_lastid =  sprintf('%06d', $order_lastid);
            }
            if ($store_id<1000) {
                $store_id =  sprintf('%03d', $store_id);
            }
            //Lấy ngày giờ hiện tại tạo mã đơn hàng
            $now = new \DateTime('now');
            $date = $now->format('d');
            $month = $now->format('m');
            $year = substr($now->format('Y'), 2);
            $order->status_id = 1;
            $order->total = $total;
            $order->created_at = date('Y-m-d');
            $order->madh = $date. $month. $year. $store_id. $order_lastid;
            $order->shipping_name = $request->shipping_name;
            $order->shipping_phone = $request->shipping_phone;
            $order->shipping_address = $request->shipping_address;
            $order->shipping_email = $request->shipping_email;
            $order->store_id = $request->store;
            if (!empty($request->voucher_code)) {
                $order->voucher_id = Voucher::where('code', $request->voucher_code)
                ->pluck('id')->first();
            }
            $order->save();
            //send mail
            Mail::to($request->shipping_email)->send(new OrderShipped($order));
            if (!empty($voucher)) {
                $voucher->quantity =$voucher->quantity-1;
                // dd($voucher->quantity);
                $voucher->save();
            }
            //Create new order Detail
            foreach ($content as $data) {
                $order_detail = new OrderDetail;
                $order_detail->product_id = $data->id;
                $order_detail->order_id = $order->id;
                $order_detail->color_memory = "Màu: ". $data->options->color .", rom: "
                . $data->options->rom ."Gb, Ram: ". $data->options->ram . " Gb";
                $order_detail->price = $data->price;
                $order_detail->quantity = $data->qty;
                $order_detail->total = $data->subtotal(0, '', '');
                $order_detail->created_at = date('Y-m-d');
                $order_detail->save();
                $store_qty = StoreProduct::where('store_id', $request->store)
                ->where('product_id', $data->id)->pluck('quantity')->first();
                $store1= StoreProduct::where('store_id', $request->store)
                ->where('product_id', $data->id)->first();
                $store1->quantity = $store_qty - $data->qty;
                $store1->save();
                $product = Product::find($data->id);
                $product->tophot = $product->tophot + $data->qty;
                $product->save();
            }
            Cart::destroy();
            return redirect()->back()->withSuccess('<h3 style="color: red">Đặt hàng thành công! </h3>
                <p>Mã đơn hàng của bạn là: <span style="color:red">'.$order->madh.'</span></p>
                <p>Xin vui lòng check <a href="https://mail.google.com/mail">'.$order->shipping_email.'</a>
                 để xác nhận hoàn tất hóa đơn</p>
                <p>Xin cảm ơn</p>');
        } else {
            Alert::error($error, 'Lỗi!')->autoclose(3500);
            return redirect()->back();
        }
    }
    public function showSearchOrder()
    {
        return view('orders.showsearch');
    }
    public function searchOrder(Request $request)
    {
        $error = "";
        if (empty($request->madh) || empty($request->email)) {
            $error = "Bạn phải nhập đầy đủ thông tin";
        } else {
            $order = Order::where('madh', $request->madh)->where('shipping_email', $request->email)->first();
            if (empty($order)) {
                $error = "Không tìm thấy hóa đơn, vui lòng kiểm tra lại";
            } else {
                $order_detail = OrderDetail::where('order_id', $order->id)->get();
                return view('orders.showsearch')->with('order', $order)->with('order_detail', $order_detail);
            }
        }
        return view('orders.showsearch')->with('error', $error);
    }
    public function orderByCustomerId()
    {
        if (empty(auth()->user()->id)) {
            $error = "Bạn phải đăng nhập mới quản lý được đơn hàng";
            return view('orders.orderByCustomerId')->with('error', $error);
        } else {
            $user = auth()->user()->id;
            $order = Order::where('customer_id', $user)->orderBy('created_at', 'desc')->get();
            return view('orders.orderByCustomerId')->with('order', $order);
        }
    }
    // public function viewDetailOrder($id)
    // {
    //     // dd($id);
    //     // $order_detail = OrderDetail::where('order_id', $id)->get();
    //     // return view('orders.orderByCustomerId')->with('order_detail', $order_detail);
    // }
    public function submitOrder($id)
    {
        $error = "";
        $order = Order::find($id);
        if ($order->status_id == 1) {
            $order->status_id = 2;
            $order->save();
        } else {
            $error = "Quý khách đã xác nhận đơn hàng, không cần xác nhận lại, Cảm ơn!";
        }
        return view('orders.submit')->with('error', $error);
    }
    public function getDetail($id)
    {
        $order_detail = OrderDetail::where('order_id', $id)->get();
        foreach ($order_detail as $data) {
            echo "<tr>
            <td>". $data->product->name. "</td>
            <td>". $data->color_memory. "</td>
            <td>". $data->price. "</td>
            <td>". $data->quantity. "</td>
            <td>". number_format($data->total). "</td>
            <td>". date('d/m/Y', strtotime($data->created_at)). "</td>
            </tr>";
        }
    }
}
