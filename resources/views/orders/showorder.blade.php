@extends('layouts.app')
@section('content')
<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/colorbox.css">
<link rel="stylesheet" title="style" href="css/style.css">
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" title="style" href="css/showorder.css">
@if (Session::has('success'))
    <div class="alert alert-success">
        {!!Session::get('success')!!}
    </div>
@elseif($qtysp == 0)
    <div class="container">
        <h5 class="text-center">Không có sản phẩm nào trong giỏ hàng,
         vui lòng chọn mua sản phẩm trước khi đặt hàng.</h5>
        <a href="/" class="text-center" style="color: blue">
            <span class="glyphicon glyphicon-chevron-left"></span>Tiếp tục mua hàng
        </a>   
    </div>
@else
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Đặt hàng</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb">
                    <a href="/">Trang chủ</a> / <span>Đặt hàng</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    
    <div class="container">
        <div id="content">
            @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
            @endif
            {!! Form::model($order, ['url' =>  '/don-dat-hang', 'id' => 'form'])!!}
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-6">
                        <h4>Đặt hàng</h4>
                        <div class="space20">&nbsp;</div>

                        <div class="form-block">
                            {!! Form::label('shipping_name', 'Tên người nhận:* ', ['class' => 'text-left'])!!}
                            {!!Form::text('shipping_name',null,['class' => 'form-control', 'placeholder'=> 'Họ và tên'])!!}
                        </div>

                        <div class="form-block">
                            {!! Form::label('shipping_phone','Số điện thoại:* ', ['class' => 'text-left'])!!}
                            {!!Form::text('shipping_phone', null, ['class' => 'form-control', 'placeholder'=> 'Số điện thoại'])!!}
                        </div>

                        <div class="form-block">
                            {!! Form::label('shipping_email', 'Email:* ', ['class' => 'text-left'])!!}
                            {!!Form::email('shipping_email', null, ['class' => 'form-control', 'placeholder'=> 'Email'])!!}
                        </div>
                        

                        <div class="form-block">
                            {!! Form::label('shipping_address', 'Địa chỉ:* ', ['class' => 'text-left'])!!}
                            {!!Form::text('shipping_address', null, ['class' => 'form-control', 'placeholder'=> 'Địa chỉ'])!!}
                        </div>
                        
                        <div class="form-block">
                            {!! Form::label('voucher_code', 'Voucher: ', ['class' => 'text-left'])!!}
                            {!!Form::text('voucher_code', null, ['class' => 'form-control', 'placeholder'=> 'Mã giảm giá'])!!}
                        </div>
                        <div class="form-block">
                            {!!Form::label('store', 'Cửa hàng', ['class' => 'text-left'])!!}
                            {!!Form::select('store', $store, null, ['class' =>'form-control'])!!}
                        </div>
                        <div class="form-block">
                            <label for="">Captcha:*</label>
                            <div class="g-recaptcha" data-sitekey="6Lee2yUTAAAAAAtZXh-Eq7x47l93NN9SJOgAYl7p"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="your-order">
                            <div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
                            <div class="your-order-body" style="padding: 0px 10px">
                                <div class="your-order-item">
                                    <div>
                                        @foreach($content as $product)
                                        <!--  one item   -->
                                            <div class="media">
                                                <img width="20%" src="{{$product->options->image}}" alt="" class="pull-left">
                                                <div class="media-body">
                                                    <p class="font-large">{{ $product->name }}</p>
                                                    <span class="color-gray your-order-info">Màu: {{$product->options->has('color') ? $product->options->color : ''}}</span>
                                                    <span class="color-gray your-order-info">Rom: {{$product->options->has('rom') ? $product->options->rom : ''}} Gbtô</span>
                                                    <span class="color-gray your-order-info">Ram: {{$product->options->has('ram') ? $product->options->ram : ''}} Gb</span>
                                                    <span class="color-gray your-order-info">Số lượng: {{$product->qty}}</span>
                                                    <p>Thành tiền: <span class="pull-right">{{number_format($product->subtotal)}}</span></p>
                                                </div>
                                            </div>
                                        <!-- end one item -->
                                        @endforeach
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="your-order-item">
                                    <div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
                                    <div class="pull-right"><h5 class="color-black">{{$subtotal}} VNĐ</h5></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
                            
                            <div class="your-order-body">
                                <ul class="payment_methods methods">
                                    <li class="payment_method_bacs">
                                        <span class="glyphicon glyphicon-ok"> </span>
                                        <label for="payment_method_bacs"> Thanh toán khi nhận hàng </label>
                                        <div class="payment_box payment_method_bacs" style="display: block;">
                                            Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
                                        </div>                
                                    </li>
                                </ul>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                Đặt hàng <i class="fa fa-chevron-right"></i>
                                </button>
                            </div>
                        </div> <!-- .your-order -->
                    </div>
                </div>
            </form>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endif
    <script src="dist/sweetalert.min.js"></script>
    @include('sweet::alert')
    <script>

    $(function() {
        $('#form').submit(function(event) {
            var verified = grecaptcha.getResponse();
            if (verified.length === 0) {
            event.preventDefault();
            }
        });
    });
    </script>

@endsection
