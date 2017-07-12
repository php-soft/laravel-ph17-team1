@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            @if (!empty($error))
                <div class="alert alert-danger">
                    <ul>
                        <li>{!! $error !!}</li>
                    </ul>    
                </div>
            @endif
            @if (!empty($order))
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Danh sách đơn hàng
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="table">
                            <thead>
                                <tr>
                                    <td>STT</td>
                                    <td>Họ và tên</td>
                                    <td>Email</td>
                                    <td>Số điện thoại</td>
                                    <td>Địa chỉ</td>
                                    <td>Tổng tiền</td>
                                    <td>Ngày đặt hàng</td>
                                    <td class="text-center">Trạng thái</td>
                                    <td>Giao thành công</td>
                                    <td class="text-center">Xem chi tiết</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1 ?>
                                @foreach($order as $data)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$data->shipping_name}}</td>
                                        <td>{{$data->shipping_email}}</td>
                                        <td>{{$data->shipping_phone}}</td>
                                        <td>{{$data->shipping_address}}</td>
                                        <td>{{number_format($data->total)}} VNĐ</td>
                                        <td>{{date('d/m/Y',strtotime($data->created_at))}}</td>
                                        <td class="text-center">{{$data->status->name}}</td>
                                        <td class="text-danger text-center">{!!empty($data->complete_at) ? '<i class="fa fa-times fa-2x" aria-hidden="true"></i>' : date('d/m/Y', strtotime($data->complete_at)) !!}</td>
                                        <td class="text-center">
                                        <button type="button" class="btn btn-info btn-sm btn-view" data-toggle="modal" data-target="#myModal" value="{{$data->id}}"> <span class="glyphicon glyphicon-folder-open"> </span></span> Chi tiết</button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal" role="dialog">
                                            <div class="modal-dialog">
                                        
                                              <!-- Modal content-->
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="submit" class="close" data-dismiss="modal">&times;</button>
                                                          <h4 class="modal-title">Chi tiết đơn hàng</h4>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="panel panel-default">
                                                                <!-- /.panel-heading -->
                                                                <div class="panel-body">
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
                                                                        <tbody id="order-detail">

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                          
                                            </div>
                                        </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
    <script>
    $(document).ready(function() {
    $('#table').DataTable({
        lengthMenu: [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
        pageLength: 5,
    });
} );
  </script>
  <script>
        $(document).on('click', '.btn-view', function(e) {
            var id = $(this).val();
            $.get("/quan-ly-don-hang/chi-tiet/"+id, function(data){
                $("#order-detail").html(data);
            })
        });
    </script>
@endsection
