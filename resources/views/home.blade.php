@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($products as $product)
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <a href="{{url('products/' .$product->slug)}}">
                    <div class="thumbnail">
                        <img class="img-responsive" src="{!!$product->image!!}" alt="">
                        <div class="caption">
                            <h3>{!! $product->name !!}</h3>
                            <tr>
                                <td><p>HDH: {!! $product->operaSystem->opera_system !!}</p></td>
                                <td><p>CPU: {!! $product->operaSystem->chipset !!}</p></td>
                                <td><p>RAM: {!! $product->memory->ram !!} GB, ROM: {!! $product->memory->rom !!} GB</p></td>
                                <td><p>Camera: {!! $product->backCamera->resolution !!}, Selfie: {!! $product->frontCamera->resolution !!}</p></td>
                                <td><p>PIN: {!! $product->battery->battery_capacity !!}, SIM: {!! $product->connect->sim !!}</p></td>
                            </tr>
                            @if($product->sale_price === null)
                                <h3>{!! $product->price !!} đ</h3>
                            @else 
                                <h3>{!! $product->sale_price !!} đ</h3>
                                <h4><del>{!! $product->price !!} đ</del>&nbsp;&nbsp; -{!! number_format((($product->price-$product->sale_price)/$product->price)*100, 2) !!} %</h4>
                            @endif
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endforeach
</div>
@endsection
