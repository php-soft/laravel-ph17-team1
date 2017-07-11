@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        @if (Session::has('success'))
        <div class="alert alert-success">
            {!!Session::get('success')!!}
        </div>
        @elseif($qtysp == 0)
            <h3 class="text-center">Không có sản phẩm nào trong giỏ hàng, vui lòng chọn mua sản phẩm trước khi đặt hàng.</h3>
            <a href="/" class="text-center"><span class="glyphicon glyphicon-chevron-left"></span>Tiếp tục mua hàng</a>
        @else
            <h1>thông tin giỏ hàng:</h1>
            <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <table class="table table-striped table-bordered table-hover">
                    <caption>Giỏ hàng</caption>
                    <thead>
                        <div class="row">    
                        <tr>
                            <th class="text-center">ảnh</th>
                            <th class="text-center">Tên sản phẩm</th>
                            <th class="text-center">Màu</th>
                            <th class="text-center">Giá</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-center">Thành tiền</th>
                        </tr>
                        </div>
                    </thead>
                    <tbody>
                        @foreach($content as $product)
                        <tr>
                            <td><a class="pull-left" href="#">
                                    <img src="{{$product->options->image}}" alt="" style="width: 30px;height: 30px">
                                </a></td>
                            <td class="text-center">
                                <strong>{{ $product->name }}</strong>
                            </td>
                            <td><p>{{$product->options->has('color') ? $product->options->color : ''}}</p></td>
                            <td class="text-center">
                                <span class="label label-success">{{ number_format($product->price,0) }}</span>
                            </td>
                            <td class="text-center">
                                <label for="" class="label label-warning">{{$product->qty}}</label><br>
                            </td>

                            <td class="text-center">
                                <span class="badge pull-right">{{number_format($product->subtotal)}}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Tổng cộng: {{$subtotal}}  đồng</strong>
            </div>
        </div>
        <hr>
            <h1>Thông tin người nhận:</h1>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Create Post Form -->
            {!! Form::model($order, ['url' =>  '/don-dat-hang'])!!}
            {{ csrf_field() }}
            <div class="form-group">
                {!! Form::label('shipping_name', 'Tên người nhận: ', ['class' => 'col-md-3 text-right'])!!}
                <div class="form-controls col-md-6">
                    {!!Form::text('shipping_name',null,['class' => 'form-control', 'placeholder'=> 'Họ và tên', 'width' => '100px'])!!}
                </div><br>
            </div>
            <div class="form-group">
                {!! Form::label('shipping_phone','Số điện thoại: ', ['class' => 'col-md-3 text-right'])!!}
                <div class="form-controls col-md-6">
                    {!!Form::number('shipping_phone', null, ['class' => 'form-control', 'placeholder'=> 'Số điện thoại'])!!}
                </div><br>
            </div>
            <div class="form-group">
                {!! Form::label('shipping_email', 'Email: ', ['class' => 'col-md-3 text-right'])!!}
                <div class="form-controls col-md-6">
                    {!!Form::email('shipping_email', null, ['class' => 'form-control', 'placeholder'=> 'Email'])!!}
                </div><br>
            </div>
            <div class="form-group">
                {!! Form::label('shipping_address', 'Địa chỉ: ', ['class' => 'col-md-3 text-right'])!!}
                <div class="form-controls col-md-6">
                    {!!Form::text('shipping_address', null, ['class' => 'form-control', 'placeholder'=> 'Địa chỉ'])!!}
                </div><br>
            </div>
            <div class="form-group">
                {!! Form::label('voucher_code', 'Voucher: ', ['class' => 'col-md-3 text-right'])!!}
                <div class="form-controls col-md-6">
                    {!!Form::text('voucher_code', null, ['class' => 'form-control', 'placeholder'=> 'Mã giảm giá'])!!}
                </div><br>
            </div>
            
            <div class="form-group">
                {!!Form::label('store', 'Cửa hàng', ['class' => 'col-md-3 text-right'])!!}
                <div class="form-controls col-md-6">
                    {!!Form::select('store', $store, null, ['class' =>'form-control'])!!}
                </div><br>
            </div>
            <h3>Phương thức thanh toán: Thanh toán khi nhận hàng</h3><br><br>
            <div class="container">
                <div class="col-md-4">    
                </div>
                <div class="col-md-4">
                    {!!Form::submit('Lưu', ['class' => 'btn btn-primary'])!!}
                    {!!Form::reset('Refresh', ['class' => 'btn btn-primary'])!!}
                </div>
                <div class="col-md-4">        
                </div>
            </div>
        {!! Form::close()!!}
        @endif
    </div>
    <script src="dist/sweetalert.min.js"></script>
    @include('sweet::alert')
</div>
@endsection
