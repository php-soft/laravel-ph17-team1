@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
    <div class="beta-select text-center">
        <i class="fa fa-shopping-cart fa-2x"> Giỏ hàng</i>       
            @if($qtysp == 0)
                <h2>trống</h2>     
            @else
                <h2>có {{$qtysp}} mặt hàng,tổng cộng {{$qty}} sản phẩm</h2>
            @endif
        <i class="fa fa-chevron-down"></i>
        </div>
    <div class="beta-dropdown cart-body">
   @if($qtysp == 0)
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2 style="text-align: center">No Items in Cart!</h2>
            </div>
        </div>
        <a href="/" class="text-center"><span class="glyphicon glyphicon-chevron-left"></span>Tiếp tục mua hàng</a>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <table class="table table-hover">
                    <caption>Giỏ hàng</caption>
                    <thead>
                        <div class="row">    
                        <tr>
                            <th></th>
                            <th class="text-center">ảnh</th>
                            <th class="text-center">Tên sản phẩm</th>
                            <th class="text-center">Màu</th>
                            <th class="text-center">Giá</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-center">Thành tiền</th>
                            <th class="text-center">Cập nhật</th>
                            <th class="text-center">Xoá</th>
                        </tr>
                        </div>
                    </thead>
                    <tbody>
                        @foreach($content as $product)
                        <tr>
                            <td><input type="hidden" name="{{$product->rowId}}" value="{{$product->rowId}}"></td>
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
                                <div class="row">
                                
                                @if($product->qty < 5 && $product->qty > 1 )
                                    <a href="/gio-hang/xoa-cap-nhat/{{$product->id}}" style="float: left; margin-right: 10px;"><span class="glyphicon glyphicon-minus-sign"></span></a>
                                    <input type="text" id="qty" name="qty" value="{{ $product->qty}}" class="form-control" style="width: 35px;height: 30px; float: left;">
                                    <a href="/gio-hang/cap-nhat/{{$product->id}}"><span class="glyphicon glyphicon-plus-sign"></span></a>
                                @elseif($product->qty >= 5)
                                    <a href="/gio-hang/xoa-cap-nhat/{{$product->id}}" style="float: left; margin-right: 10px;"><span class="glyphicon glyphicon-minus-sign"></span></a>
                                    <input type="text" id="qty" name="qty" value="{{ $product->qty}}" class="form-control text-center" style="width: 35px; height: 30px; float: left; " disabled="disabled">
                                    <a href=""><span class="glyphicon glyphicon-plus-sign"></span></a>
                                @elseif($product->qty <= 1)
                                    <a href="" style="float: left; margin-right: 10px;" ><span class="glyphicon glyphicon-minus-sign"></span></a>
                                    <input type="text" id="qty" name="qty" value="{{ $product->qty}}" class="form-control" style="width: 35px;height: 30px; float: left;" disabled="disabled">
                                    <a href="/gio-hang/cap-nhat/{{$product->id}}"><span class="glyphicon glyphicon-plus-sign"></span></a>
                                @endif
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="badge pull-right">{{number_format($product->subtotal)}}</span>
                            </td>
                            <td class="text-center">
                                <a href="/gio-hang/cap-nhat-sp/{{$product->id}}" >
                                    <span class="glyphicon glyphicon-refresh"></span>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="/gio-hang/xoa-san-pham/{{$product->id}}" >
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
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
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <a href="/gio-hang/xoa-gio-hang" class="btn btn-success"><span class="glyphicon glyphicon-trash"></span>Xoá giỏ hàng</a>
                <a href="/dat-hang" class="btn btn-success">Đặt hàng</a>
                <a href="/" class="btn btn-success">Tiếp tục mua hàng</a>
            </div>
        </div>
        @endif
    </div>
    <hr>
</div>
</div>
@endsection