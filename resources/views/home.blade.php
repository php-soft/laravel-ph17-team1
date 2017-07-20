@extends ('layouts.app')

@section ('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/product.css') }}">
@stop

@section ('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div id="carousel-id" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @php
                        $stt = 0;
                    @endphp
                    @foreach ($news->take(3) as $n)
                        <li data-target="#carousel-id" data-slide-to="{{ $stt }}" @if ($stt == 2) class="active" @endif></li>
                        @php
                            $stt++;
                        @endphp
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @php
                        $stt = 0;
                    @endphp
                    @foreach ($news->take(3) as $n)
                        @php
                            if ($stt == 0)
                                $x = "First";
                            else if ($stt == 1)
                                $x = "Second";
                                else
                                    $x = "Third";
                        @endphp

                        <div style="height: 370px" @if ($stt == 2) class="item active" @else class="item" @endif>
                            <img data-src="holder.js/900x500/auto/#555:#5a5a5a/text:{{ $x }} slide" alt="Third slide" src="{{url('uploads/news/'.$n->image)}}" alt="{{$n->image}}">
                            <div class="container">
                                <div class="carousel-caption">
                                    <h3><a style="color: blue" href="{{url('news/'.$n->slug)}}">{{$n->title}}</a></h3>
                                </div>
                            </div>
                        </div>
                        @php
                            $stt++;
                        @endphp
                    @endforeach
                </div>
                <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>

        <div class="col-md-4" style="background-color: #fff; padding: 3px; ">
            <div style="display: block; overflow: hidden; border-bottom: 4px solid #f3565d; margin-bottom: 10px">
                <h4 style="color: #fff; background-color: #f3565d; margin: 0; padding: 12px 10px 8px; float: left;">
                    <a style="color: #fff; font-weight: 100;" href="{{ url('news') }}">TIN TỨC</a>
                </h4>
                <b style="float: left; width: 0; height: 0; border-left: 0 solid transparent;  border-right: 20px solid transparent;  border-bottom: 39px solid #ccc;"></b>
            </div>
            
            @foreach($news as $n)
                <div class="product-news">
                    <div class="product-image pull-right">
                        <img src="{{url('uploads/news/'.$n->image)}}" alt="{{$n->image}}" height="auto" width="100%">
                    </div>
                    <div class="product-content">
                        <span class="product-title"><a href="{{url('news/'.$n->slug)}}">{{$n->title}}</a></span>
                    </div>
                </div>
                <div class="clearfix"></div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <h2>SẢN PHẨM HOT</h2>    
        </div>
    </div>
    <div class="row">
        @foreach ($hotproducts as $product)
            <div class="col-sm-6 col-md-4">
                <div class="item">
                    <a href="{{url('products/' .$product->slug)}}">
                        <div class="item-overlay">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{!!$product->image!!}">
                                </div>
                                <div class="col-md-8 info">
                                    <p>HDH: {!! $product->operaSystem->opera_system !!}</p>
                                    <p>CPU: {!! $product->operaSystem->chipset !!}</p>
                                    <p>RAM: {!! $product->memory->ram !!} GB, ROM: {!! $product->memory->rom !!} GB</p>
                                    @if (!empty($product->backCamera->resolution2) and $product->backCamera->resolution1 == $product->backCamera->resolution2)
                                        <p> Camera kép: {{ $product->backCamera->resolution1 }} MP, Selfie: {{ $product->frontCamera->resolution }} MP</p>
                                    @elseif (!empty($product->backCamera->resolution2))
                                        <p>2 Camera: {{ $product->backCamera->resolution1 }} MP và {{ $product->backCamera->resolution2 }} MP, Selfie: {{ $product->frontCamera->resolution1 }} MP</p>
                                    @else
                                        <p>Camera: {{ $product->backCamera->resolution1 }} MP, Selfie: {{ $product->frontCamera->resolution }} MP</p>
                                    @endif
                                    <p>PIN: {!! $product->battery->battery_capacity !!}, SIM: {!! $product->connect->sim !!}</p>
                                </div>
                            </div>
                            @if ($product->sale_price === null)
                                <div class="sale-tag"><span></span></div>
                            @else
                                <div class="sale-tag"><span>SALE</span></div>
                            @endif
                        </div>
                    </a>
                    <div class="item-content">
                        <div class="item-top-content">
                            <div class="item-top-content-inner">
                                <div class="item-product">
                                    <div class="item-top-title">
                                        <h2>{!! $product->name !!}</h2>
                                    </div>
                                </div>
                                <div class="item-product-price">
                                    @if ($product->sale_price === null)
                                        <span class="price-num"><h4 style="margin-top: -17px; margin-right: -10px;">{!! number_format($product->price) !!} đ</h4></span>
                                    @else
                                    <span class="price-num">{!! number_format($product->sale_price) !!} đ</span>
                                    <p class="subdescription"><del>{!! number_format($product->price) !!} đ</del></p>
                                    @endif
                                </div>
                            </div>  
                        </div>
                        <div class="item-add-content">
                            <div class="item-add-content-inner">
                                <div class="section">
                                    <a href="{{ url('them-gio-hang/' .$product->id) }}" class="btn buy expand">MUA NGAY</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <h2>SẢN PHẨM MỚI</h2>    
        </div>
    </div>
    <div class="row">
        @foreach ($newproducts as $product)
            <div class="col-sm-6 col-md-4">
                <div class="item">
                    <a href="{{url('products/' .$product->slug)}}">
                        <div class="item-overlay">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{!!$product->image!!}">
                                </div>
                                <div class="col-md-8 info">
                                    <p>HDH: {!! $product->operaSystem->opera_system !!}</p>
                                    <p>CPU: {!! $product->operaSystem->chipset !!}</p>
                                    <p>RAM: {!! $product->memory->ram !!} GB, ROM: {!! $product->memory->rom !!} GB</p>
                                    @if (!empty($product->backCamera->resolution2) and $product->backCamera->resolution1 == $product->backCamera->resolution2)
                                        <p> Camera kép: {{ $product->backCamera->resolution1 }} MP, Selfie: {{ $product->frontCamera->resolution }} MP</p>
                                    @elseif (!empty($product->backCamera->resolution2))
                                        <p>2 Camera: {{ $product->backCamera->resolution1 }} MP và {{ $product->backCamera->resolution2 }} MP, Selfie: {{ $product->frontCamera->resolution1 }} MP</p>
                                    @else
                                        <p>Camera: {{ $product->backCamera->resolution1 }} MP, Selfie: {{ $product->frontCamera->resolution }} MP</p>
                                    @endif
                                    <p>PIN: {!! $product->battery->battery_capacity !!}, SIM: {!! $product->connect->sim !!}</p>
                                </div>
                            </div>
                            @if ($product->sale_price === null)
                                <div class="sale-tag"><span></span></div>
                            @else
                                <div class="sale-tag"><span>SALE</span></div>
                            @endif
                        </div>
                    </a>
                    <div class="item-content">
                        <div class="item-top-content">
                            <div class="item-top-content-inner">
                                <div class="item-product">
                                    <div class="item-top-title">
                                        <h2>{!! $product->name !!}</h2>
                                    </div>
                                </div>
                                <div class="item-product-price">
                                @if ($product->sale_price === null)
                                    <span class="price-num"><h4 style="margin-top: -17px; margin-right: -10px;">{!! number_format($product->price) !!} đ</h4></span>
                                @else
                                <span class="price-num">{!! number_format($product->sale_price) !!} đ</span>
                                <p class="subdescription"><del>{!! number_format($product->price) !!} đ</del></p>
                                @endif
                                </div>
                            </div>  
                        </div>
                        <div class="item-add-content">
                            <div class="item-add-content-inner">
                                <div class="section">
                                    <a href="{{ url('them-gio-hang/' .$product->id) }}" class="btn buy expand">MUA NGAY</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
