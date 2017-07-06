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
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                                        <td class="text-center">
                                        <a href="" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-folder-open"></span>
                                        </a>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Chi tiết đơn hàng</button>

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
                                                                        <!-- giữ liệu get json -->
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
                <div class="row">{{$order->links()}}</div>
            @endif
        </div>
    </div>
</div>
@endsection
