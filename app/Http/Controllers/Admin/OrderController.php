<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Order;
use App\OrderDetail;
use App\Status;
use App\StoreProduct;
use Input;
use Alert;
use DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status_id', 1)->get();
        $status = Status::all();
        return view('admin.orders.index')->with('orders', $orders)->with('status', $status);
    }

    public function getDatatable()
    {
        $query = DB::table('orders')
            ->select(['id', 'shipping_name', 'shipping_phone', 'shipping_email', 'shipping_address', 'status_id'])
            ->where(function ($query) {
                $query->where('status_id', '=', 6);
            });
        return Datatables::of($query)->make(true);
    }

    public function edit($order_id)
    {
        $order = Order::find($order_id);
        if (empty($order)) {
            Alert::info('Hóa đơn đã bị xóa, vui lòng khôi phục trước khi chỉnh sửa!', 'Thông tin')->autoclose(3000);
            return redirect()->back();
        } else {
            $statuses = Status::pluck('name', 'id');
            return view('admin.orders.edit')->with('order', $order)->with('statuses', $statuses);
        }
    }

    public function update($order_id, Request $request)
    {
        $order = Order::find($order_id);
        // echo $order->status_id . "s" .$request->status_id;exit;
        if ($request->status_id > $order->status_id) {
            if ($order->status->name =="Giao thành công") {
                Alert::info('Hóa đơn đã giao, không được thay đổi!', 'Thông tin')->autoclose(3000);
                return redirect('admin/orders/edit/'.$order_id);
            } elseif ($request->status_id == "5") {
                $order->status_id = $request->status_id;
                $order->complete_at = date('Y-m-d');
                $order->save();
                Alert::success('Cập nhật thành công', 'Thành công')->autoclose(3000);
                return redirect('admin/orders/edit/'.$order_id);
            } elseif ($request->status_id == 6 && $order->status_id != 5) {
                $order_detail = OrderDetail::where('order_id', $order_id)->get();
                foreach ($order_detail as $data) {
                    $store_product = StoreProduct::where('product_id', $data->product_id)
                    ->where('store_id', $order->store_id)->first();
                    $store_product->quantity = $store_product->quantity + $data->quantity;
                    $store_product->save();
                }
                $order->status_id = $request->status_id;
                $order->save();
                Alert::success('Cập nhật thành công', 'Thành công')->autoclose(3000);
                return redirect('admin/orders/edit/'.$order_id);
            } else {
                $order->status_id = $request->status_id;
                $order->save();
                Alert::success('Cập nhật thành công', 'Thành công')->autoclose(3000);
                return redirect('admin/orders/edit/'.$order_id);
            }
        } else {
            Alert::error('Tác vụ không chính xác vui lòng kiểm tra lại!', 'Lỗi!')->autoclose(3000);
            return redirect('admin/orders/edit/'.$order_id);
        }
    }

    // public function updateindex(Request $request)
    // {
    //     //dd($request->shipping_name);
    //     echo "oke";
    //     exit;
    //     return view('admin.orders.index');
    // }

    public function deleteRecord($id, Request $request)
    {
        // print_r('I am here');die();
        if ($request->ajax()) {
            $order = Order::find($id);
            if ($order->status->name=="Hủy" ||$order->status->name=="Chờ xác nhận" ||
                $order->status->name == "Đã xác nhận") {
                if ($order->status_id != 6) {
                    $order_detail = OrderDetail::where('order_id', $id)->get();
                    foreach ($order_detail as $data) {
                        $store_product = StoreProduct::where('product_id', $data->product_id)
                        ->where('store_id', $order->store_id)->first();
                        $store_product->quantity = $store_product->quantity + $data->quantity;
                        $store_product->save();
                    }
                }
                $order->delete();
                return response()->json();
            } else {
                return response()->json(['Bảng ghi đã được xử lý, không thể xóa!']);
            }
        }
    }

    public function restoreRecord($id, Request $request)
    {
        if ($request->ajax()) {
            $order = Order::withTrashed()->find($id);
            $order->deleted_at = null;
            $order->save();
            if ($order->status_id != 6) {
                $order_detail = OrderDetail::where('order_id', $id)->get();
                foreach ($order_detail as $data) {
                    $store_product = StoreProduct::where('product_id', $data->product_id)
                    ->where('store_id', $order->store_id)->first();
                    $store_product->quantity = $store_product->quantity - $data->quantity;
                    $store_product->save();
                }
            }
            return response()->json();
        }
    }
    public function getOrderDetail($id)
    {
        $order = Order::withTrashed()->find($id);
        $order_detail = OrderDetail::where('order_id', $id)->get();
        echo  "<h3>Mã đơn hàng: ". $order->madh."</h3>
        <p>Tên khách hàng: ". $order->shipping_name."</p>
        <p>Số điện thoại: ". $order->shipping_phone. "</p>
        <p>Địa chỉ: ". $order->shipping_address. "</p>
        <p>Email: ". $order->shipping_email. "</p>
        <p>Tổng cộng: ". number_format($order->total). "VNĐ</p>
        <p>Trạng thái: ". $order->status->name. "</p>
        <table width='100%' class='table table-striped table-bordered table-hover'>
        <thead>
        <tr>
        <td>Tên sản phẩm</td>
        <td>Màu và bộ nhớ</td>
        <td>Giá</td>
        <td>Số lượng</td>
        <td>Thành tiền</td>
        <td>Ngày tạo đơn hàng</td>
        </tr>
        </thead>
        <tbody>";
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
        echo "</tbody>
        </table>";
    }

    // public function getDetailOfOrder($id)
    // {
    //     $order = Order::find($id);
    //     $status_id = $order->status_id;
    //     $status = Status::all();
    //     // echo "<div class='modal-body'><form class= 'form-horizontal'
    //     // action='/admin/orders/edit/$order->id' method='put'>
    //     // <div class='form-group col-sm-12'>
    //     // <label class='control-label col-sm-4'>Tên khách hàng: </label>
    //     // <div class='col-sm-8'>
    //     // <input type='text' class='form-control' style='width:100%' name='shipping_name' value='".
    //     // $order->shipping_name."' disabled='disabled'>
    //     // </div>
    //     // </div>
    //     // <div class='form-group col-sm-12'>
    //     // <label class='control-label col-sm-4'>Số điện thoại: </label>
    //     // <div class='col-sm-8'>
    //     // <input type='number' class='form-control' style='width:100%' name='shipping_phone' value='".
    //     // $order->shipping_phone."' disabled='disabled'>
    //     // </div>
    //     // </div>
    //     // <div class='form-group col-sm-12'>
    //     // <label class='control-label col-sm-4'>Địa chỉ: </label>
    //     // <div class='col-sm-8'>
    //     // <input type='text' class='form-control' style='width:100%' name='shipping_address' value='".
    //     // $order->shipping_address."' disabled='disabled'>
    //     // </div>
    //     // </div>
    //     // <div class='form-group col-sm-12'>
    //     // <label class='control-label col-sm-4'>Email: </label>
    //     // <div class='col-sm-8'>
    //     // <input type='email' class='form-control' style='width:100%' name='shipping_email' value='".
    //     // $order->shipping_email."' disabled='disabled'>
    //     // </div>
    //     // </div>
    //     // <div>
    //     //     <select name='".$status_id."' id='".$status_id."'>";
    //     //     foreach($status as $data) {
    //     //         echo "<option value='".$data->id."'>".$data->name."</option>";
    //     //     }
    //     // echo "</select>
    //     // </div>
    //     // <input type='submit' value='Lưu'>
    //     // </form>
    //     // </div>";
    // }

    public function getGroupOrder($id_status)
    {
        $order = Order::where('status_id', $id_status)->get();
        $i = 1;
        if ($id_status == "all") {
            $order = Order::withTrashed()->get();
        }
        echo "
        <table width='100%' class='table table-striped table-bordered table-hover' id='table'>
        <thead>
        <tr>
        <th class='text-center'>STT</th>
        <th class='text-center'>Mã đơn hàng</th>
        <th class='text-center'>Tên khách hàng</th>
        <th class='text-center'>Địa chỉ</th>
        <th class='text-center'>Email</th>
        <th class='text-center'>Tổng cộng</th>
        <th class='text-center'>Trạng thái</th>
        <th class='text-center'>Ngày tạo</th>
        <th class='text-center'>chức năng</th>
        <th class='text-center'>Chi tiết</th>
        </tr>
        </thead>";
        foreach ($order as $data) {
            echo "
            <tr>
            <td class='text-center'>". $i++ ."</td>
            <td class='text-center'>". $data->madh." </td>
            <td class='text-center'>". $data->shipping_name. "</td>
            <td class='text-center'> ". $data->shipping_address. "</td>
            <td class='text-center'> ". $data->shipping_email. "</td>
            <td class='text-center'> ". number_format($data->total). "VNĐ</td>
            <td class='text-center'> ". $data->status->name. "</td>
            <td class='text-center'> ". date('d/m/Y', strtotime($data->created_at)). "</td>
            <td class='text-center'>
            <a href='/admin/orders/edit/".$data->id."' class='btn btn-info'>
            <span class='glyphicon glyphicon-edit'></span>
            </a>";
            if (empty($data->deleted_at)) {
                echo "<button class='btn btn-danger btn-del' value='". $data->id."'>
                <span class='glyphicon glyphicon-trash'></span></button>";
            } else {
                echo "<button class='btn btn-success btn-restore' value='". $data->id."'>
                <span class='glyphicon glyphicon-refresh'></span></button>";
            }
            echo "</td>
            <td>    
            <button type='button' class='btn btn-info btn-sm adm-btn-view'
             data-toggle='modal' data-target='#myModal' value='".$data->id."'>
            <span class='glyphicon glyphicon-folder-open'>
            </span></span> Chi tiết</button>
            </td>                                   
            </tr>";
        }
        echo "</table>
        <script>
        $(document).ready(function() {
        $('#table').DataTable({
        processing: true,
        lengthMenu: [[5,10, 25, 50, -1], [5,10, 25, 50, 'All']],
        pageLength: 5,
        });
        });
        </script>";
    }

    public function getStatistic()
    {
        return view('admin.orders.statistic');
    }
    public function getStatisticDetail(Request $request)
    {
        $date1 = date('Y/m/d', strtotime($request->fromdate));
        $date2 = date('Y/m/d', strtotime($request->todate));
        $result = Order::where('status_id', 5)
        ->whereBetween('created_at', [$date1, $date2])->get();
        $total = $result->sum('total');
        if ($total == 0) {
            Alert::info('Không tìm bất kỳ hóa đơn nào tạo ra trong khoảng thời gian trên',
                'Thông tin')->autoclose(3000);
            return view('admin.orders.up', compact('total', 'result'));
        } else {
            return view('admin.orders.up', compact('total', 'result'));
        }
    }
}
