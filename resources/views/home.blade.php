@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($products as $product)
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
                                 @if(!empty($product->backCamera->resolution2) and !empty($product->frontCamera->resolution2))
                                    <p> Camera kép: {{$product->backCamera->resolution1}} MP, Selfie: Camera kép {{$product->frontCamera->resolution1}} MP</p>
                                @elseif(!empty($product->backCamera->resolution2))
                                    <p>Camera kép: {{$product->backCamera->resolution1}} MP, Selfie: {{$product->frontCamera->resolution1}} MP</p>
                                @elseif(!empty($product->frontCamera->resolution2))
                                    <p>Camera: {{$product->backCamera->resolution1}} MP, Selfie: Camera kép {{$product->frontCamera->resolution1}} MP</p>
                                @else
                                    <p>Camera: {{$product->backCamera->resolution1}} MP, Selfie: {{$product->frontCamera->resolution1}} MP</p>
                                @endif
                                <p>PIN: {!! $product->battery->battery_capacity !!}, SIM: {!! $product->connect->sim !!}</p>
                            </div>
                        </div>
                        @if($product->sale_price === null)
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
                            @if($product->sale_price === null)
                                <span class="price-num"><h4 style="margin-top: -17px; margin-right: -5px;">{!! number_format($product->price) !!} đ</h4></span>
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
                                <a href="#" class="btn buy expand">MUA NGAY</a>
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
