<h3>Mã đơn hàng: {{ $order->madh }}</h3>
<p>Tên khách hàng: {{ $order->shipping_name }}</p>
<p>Số điện thoại: {{ $order->shipping_phone }}</p>
<p>Địa chỉ: {{ $order->shipping_address }}</p>
<p>Email: {{ $order->shipping_email }}</p>
<p>Tổng cộng: {{ number_format($order->total) }}VNĐ</p>
<p>Trạng thái: {{ $order->status->name }}</p>
<table width="100%" class="table table-striped table-bordered table-hover">
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
    <tbody>
    @foreach ($order_detail as $data)
        <tr>
        <td>{{ $data->product->name }}</td>
        <td>{{ $data->color_memory }}</td>
        <td>{{ $data->price }}</td>
        <td>{{ $data->quantity }}</td>
        <td>{{ number_format($data->total) }}</td>
        <td>{{ date('d/m/Y', strtotime($data->created_at)) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>