@extends('admin.layouts.master')
@section('content')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thông tin đơn hàng
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <td>Tên sản phẩm</td>
                            <td>Màu & bộ nhớ</td>
                            <td>Số lượng</td>
                            <td>Đơn giá</td>
                            <td>Thành tiền</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order_detail as $data)
                            <tr>
                                <td>{{$data->product->name}}</td>
                                <td>{{ $data->color_memory}}</td>
                                <td>{{$data->quantity}}</td>
                                <td>{{$data->price}}</td>
                                <td>{{$data->total}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
  $(document).ready(function() {
    $('#dataTables-example').DataTable();
} );
  </script>
@endsection
