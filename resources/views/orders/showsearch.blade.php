@extends('layouts.app')
@section('content')
    <div class="container">
    <h2>TÌM KIẾM HÓA ĐƠN</h2>
    @if(!empty($error))
    <div class="alert alert-danger">
        <ul>
            <li>{!! $error !!}</li>
        </ul>    
    </div>
    @endif
    {!! Form::model(['url' =>  '/tim-kiem-hoa-don'])!!}
            <div class="form-group">
                {!! Form::label('madh', 'Mã đơn hàng: ', ['class' => 'col-md-3 text-right'])!!}
                <div class="form-controls col-md-6">
                    {!!Form::text('madh', null, ['class' => 'form-control','placeholder'=> 'Mã đơn hàng'])!!}
                </div><br><br>
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email: ', ['class' => 'col-md-3 text-right'])!!}
                <div class="form-controls col-md-6">
                    {!!Form::text('email', null, ['class' => 'form-control', 'placeholder'=> 'Email'])!!}
                </div><br><br>
            </div>
            <div>
                <div class="col-md-3"></div>
                <div class="col-md-6">
                {!!Form::submit('Tìm', ['class' => 'btn btn-primary'])!!}
                {!!Form::reset('Refresh', ['class' => 'btn btn-primary'])!!}
                </div>
                <div class="col-md-3"></div>
            </div>
            
        {!! Form::close()!!}
        <div class="clearfix"></div><br>
        @if(!empty($order))
            <div class="row">
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
                                        <td>Họ và tên</td>
                                        <td>Email</td>
                                        <td>Số điện thoại</td>
                                        <td>Địa chỉ</td>
                                        <td>Tổng tiền</td>
                                        <td>Trạng thái</td>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>{{$order->shipping_name}}</td>
                                    <td>{{$order->shipping_email}}</td>
                                    <td>{{$order->shipping_phone}}</td>
                                    <td>{{$order->shipping_address}}</td>
                                    <td>{{number_format($order->total)}} VNĐ</td>
                                    <td>{{$order->status->name}}</td>
                                </tr>
                        </table>
                        
                        <a href="" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">
                                                <span class="glyphicon glyphicon-folder-open"></span>
                        Chi tiết đơn hàng
                        </a>
                          <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
                            
                                <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Chi tiết đơn hàng</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="panel panel-default">
                                                    <!-- /.panel-heading -->
                                                    <div class="panel-body">
                                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                                                            @foreach($order_detail as $data)
                                                            <tr>
                                                                <td>{{$data->product->name}}</td>
                                                                <td>{{$data->color_memory}}</td>
                                                                <td>{{$data->price}}</td>
                                                                <td>{{$data->quantity}}</td>
                                                                <td>{{$data->total}}</td>
                                                                <td>{{date('d/m/Y',strtotime($data->created_at))}}</td>
                                                            </tr>
                                                            @endforeach
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
                        </div>

                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
