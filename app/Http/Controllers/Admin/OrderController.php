<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Order;
use App\OrderDetail;
use App\Status;
use App\StoreProduct;
use App\User;
use App\Product;
use Input;
use Alert;
use DB;
use Charts;

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
        return view('admin.orders.order_detail', compact('order', 'order_detail'));
    }

    public function getGroupOrder($id_status)
    {
        $order = Order::where('status_id', $id_status)->get();
        if ($id_status == "all") {
            $order = Order::withTrashed()->get();
        }
        return view('admin.orders.groupOrder', compact('order'));
    }

    public function getStatisticDate()
    {
        return view('admin.statistic.date');
    }

    public function getStatisticDateDetail(Request $request)
    {
        $date1 = date('Y/m/d', strtotime($request->fromdate));
        $date2 = date('Y/m/d', strtotime($request->todate));
        $result = Order::where('status_id', 5)
        ->whereBetween('created_at', [$date1, $date2])->get();
        $total = $result->sum('total');
        if ($total == 0) {
            Alert::info('Không tìm bất kỳ hóa đơn nào tạo ra trong 
                khoảng thời gian trên', 'Thông tin')->autoclose(3000);
            return view('admin.statistic.update', compact('total', 'result'));
        } else {
            return view('admin.statistic.update', compact('total', 'result'));
        }
    }

    public function getStatisticMonth()
    {
        $now = new \DateTime('now');
        $year = $now->format('Y');
        $data = Order::select('orders.created_at', DB::raw('sum(orders.total) as aggregate'))
        ->where('orders.status_id', '=', 5)
            ->groupBy(DB::raw('orders.created_at'))->get(); //must alias the aggregate column as aggregate
        $chart = Charts::database($data, 'bar', 'highcharts')
        ->title('Thống kê theo tháng năm'. $year)
        ->elementLabel($year)
        ->colors(['#47C6B2', '#00ff00'])
        ->preaggregated(true)->groupByDay('01', $year, true);
        return view('admin.statistic.month', compact('chart'));
    }

    public function getStatisticMonthDetail($month)
    {
        if ($month<10) {
            $month =  sprintf('%02d', $month);
        }
        // $month = strval($month);
        $now = new \DateTime('now');
        $year = $now->format('Y');
        $data = Order::select('orders.created_at', DB::raw('sum(orders.total) as aggregate'))
        ->where('orders.status_id', '=', 5)
        ->groupBy(DB::raw('orders.created_at'))->get();
        $chart = Charts::database($data, 'bar', 'highcharts')
        ->title('Thống kê theo tháng năm'. $year)
        ->elementLabel($year)
        ->colors(['#47C6B2', '#00ff00'])
        ->preaggregated(true)->groupByDay($month, $year, true);
        $date1 = date('Y/m/d', strtotime($year. '/'. $month. '/01'));
        $date2 = date('Y/m/d', strtotime($year. '/'. $month. '/31'));
        $result = Order::where('status_id', 5)
        ->whereBetween('created_at', [$date1, $date2])->get();
        $total = $result->sum('total');
        if ($total == 0) {
            Alert::info('Không tìm bất kỳ hóa đơn nào tạo ra trong 
                khoảng thời gian trên', 'Thông tin')->autoclose(3000);
            return view('admin.statistic.upmonth', compact('chart', 'total', 'result'));
        } else {
            return view('admin.statistic.upmonth', compact('chart', 'total', 'result'));
        }
    }
    public function getStatisticYear()
    {
        $now = new \DateTime('now');
        $year = $now->format('Y');
        $data = Order::select('orders.created_at', DB::raw('sum(orders.total) as aggregate'))
        ->where('orders.status_id', '=', 5)
        ->groupBy(DB::raw('orders.created_at'))->get();
        $chart = Charts::database($data, 'bar', 'highcharts')
        ->title('Thống kê năm'. $year)
        ->elementLabel($year)
        ->colors(['#47C6B2', '#00ff00'])
        ->preaggregated(true)->groupByMonth($year, true);
        $date1 = date('Y/m/d', strtotime($year. '/01/01'));
        $date2 = date('Y/m/d', strtotime($year. '/12/31'));
        $result = Order::where('status_id', 5)
        ->whereBetween('created_at', [$date1, $date2])->get();
        $total = $result->sum('total');
        return view('admin.statistic.year', compact('chart', 'total', 'result'));
    }

    public function getGroupYear()
    {
        $data = Order::select('orders.created_at', DB::raw('sum(orders.total) as aggregate'))
        ->where('orders.status_id', '=', 5)
            ->groupBy(DB::raw('orders.created_at'))->get();
        $chart = Charts::database($data, 'bar', 'highcharts')
        ->title('Số liệu thống kê các năm')
        ->elementLabel('3 năm')
        ->colors(['#47C6B2', '#00ff00'])
        ->preaggregated(true)->lastByYear(3);
       
        return view('admin.statistic.groupyear', compact('chart'));
    }

    public function getGroupYearUpdate($quantity)
    {
        $data = Order::select('orders.created_at', DB::raw('sum(orders.total) as aggregate'))
        ->where('orders.status_id', '=', 5)
        ->groupBy(DB::raw('orders.created_at'))->get();
        $chart = Charts::database($data, 'bar', 'highcharts')
        ->title('Số liệu thống kê các năm')
        ->elementLabel($quantity. ' năm')
        ->colors(['#47C6B2', '#00ff00'])
        ->preaggregated(true)->lastByYear($quantity);
       
        return view('admin.statistic.upgroupyear', compact('chart'));
    }
    
    public function chart()
    {
        //được
        // $data = OrderDetail::groupBy('product_id')->sum('total');
        // $chart = Charts::database(OrderDetail::all(), 'bar', 'highcharts')
        //           ->title('User types')
        //           ->dimensions(1000, 500)
        //           ->responsive(false)
        //           ->groupBy('product_id', null, [1 => 'Samsung', 2 => 'Iphone']);
        //group by month
        // $data= Order::
  //        $chart = Charts::database(Order::all(), 'bar', 'highcharts')
  //     ->elementLabel("Total")
  //     ->dimensions(1000, 500)
  //     ->responsive(false)
  //     ->groupByMonth();

  // // to display a specific year, pass the parameter.
        // For example to display the months of 2016 and display a fancy output label:
  // $chart = Charts::database(Order::all(), 'bar', 'highcharts')
  //     ->elementLabel("Total")
  //     ->dimensions(1000, 500)
  //     ->responsive(false)
  //     ->groupByMonth('2017', true)
  //     $chart->aggregateColumn('total', 'sum');
//   $data = Order::all();
// $chart = Charts::create('bar', 'highcharts')
//              ->title('My nice chart')
//              ->elementLabel('My nice label')
//              ->labels($data->pluck('id'))
//              ->values($data->pluck('total'))
//              ->responsive(true);
  //         $chart = new Database(Order::all(), 'bar', 'highcharts');
  // $chart->aggregateColumn('amount', 'sum');
    //     $chart=Charts::multiDatabase('line', 'material')
    // ->dataset('Element 1', Order::all())
    // ->dataset('Element 2', OrderDetail::all())
    // ->groupByMonth(2017, true);
        // $data = Order::all()->sum('total');
        // // dd($data);
        // $chart = Charts::multi('bar', 'material')
        //     // Setup the chart settings
        //     ->title("My Cool Chart")
        //     // A dimension of 0 means it will take 100% of the space
        //     ->dimensions(0, 400) // Width x Height
        //     // This defines a preset of colors already done:)
        //     ->template("material")
        //     // You could always set them manually
        //     // ->colors(['#2196F3', '#F44336', '#FFC107'])
        //     // Setup the diferent datasets (this is a multi chart)
        //     ->dataset('Element 1', [5,20,100])
        //     ->dataset('Element 2', [15,30,80])
        //     ->dataset('Element 3', [25,10,40])
        //     // Setup what the values mean
        //     ->labels(['One', 'Two', 'Three']);
        // return view('admin.orders.chart', compact('chart'));
    }
}
