@extends ('layouts.app')

@section ('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rating5star.css') }}">
@stop

@section ('content')
<div class="container">
@foreach ($products as $product)
@foreach ($product_sames as $product_same)
    <div class="row">
        <div class="col-md-12">
            <h3>So sánh điện thoại {{ $product->name }} và {{ $product_same->name }}</h3>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-2">
        
        </div>
        <div class="col-md-4" style="border-right: ridge 1px; border-left: ridge 1px;">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{url('products/' .$product->slug)}}">
                        <img class="img-responsive" src="{!! $product->image !!}">
                    </a>
                </div>
                <div class="col-md-12">
                    <h3>{!! $product->name !!}</h3>
                </div>
                <div class="col-md-12">
                    @if ($product->sale_price === null)
                        <h4 style="color: red">{!! number_format($product->price) !!} đ</h4>
                    @else 
                        <h4 style="color: red">{!! number_format($product->sale_price) !!} đ</h4>
                    @endif
                </div>
                <div class="col-md-12">
                    <div class="promotion-list">
                        @foreach ($promotions as $promotion)
                            <tr>
                                <td>
                                    <li>
                                        <span class="glyphicon glyphicon-hand-right"></span> {!! $promotion->name !!}
                                    </li>
                                </td>
                            </tr>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-12">
                    <p style="color: orange">
                        @for ($i=1; $i <= 5 ; $i++)
                            <span class="glyphicon glyphicon-star{{ ($i <= $avgvote) ? '' : '-empty'}}"></span>
                        @endfor
                        <label>{{ $count_vote }} đánh giá</label>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4" style="border-right: ridge 1px;">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{url('products/' .$product_same->slug)}}">
                        <img class="img-responsive" src="{!!$product_same->image!!}">
                    </a>
                </div>
                <div class="col-md-12">
                    <h3>{!! $product_same->name !!}</h3>
                </div>
                <div class="col-md-12">
                    @if ($product_same->sale_price === null)
                        <h4 style="color: red">{!! number_format($product_same->price) !!} đ</h4>
                    @else 
                        <h4 style="color: red">{!! number_format($product_same->sale_price) !!} đ</h4>
                    @endif
                </div>
                <div class="col-md-12">
                    <div class="promotion-list">
                        @foreach ($promotion_sames as $promotion_same)
                            <tr>
                                <td>
                                    <li>
                                        <span class="glyphicon glyphicon-hand-right"></span> {!! $promotion_same->name !!}
                                    </li>
                                </td>
                            </tr>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-12">
                    <p style="color: orange">
                        @for ($i=1; $i <= 5 ; $i++)
                            <span class="glyphicon glyphicon-star{{ ($i <= $avgvote_same) ? '' : '-empty'}}"></span>
                        @endfor
                        <label>{{ $count_vote_same }} đánh giá</label>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-2">
        
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-2">
            <h4>Màu sản phẩm</h4>
        </div>
        <div class="col-md-4" style="border-right: ridge 1px; border-left: ridge 1px;">
            <img class="img-responsive" src="{!! $product->image !!}" style=" width: 75px; height: 75px;">
            <p style="margin-left: 26px;">{{ $product->color->name }}</p>
        </div>
        <div class="col-md-4" style="border-right: ridge 1px;">
            <img class="img-responsive" src="{!! $product_same->image !!}" style=" width: 75px; height:75px;">
            <p style="margin-left: 26px;">{{ $product_same->color->name }}</p>
        </div>
        <div class="col-md-2">
            
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <h4 style="text-align: center;"><strong>CHI TIẾT THÔNG SỐ KỸ THUẬT</strong></h4>
        </div>
    </div>

    <div class="row">
        <div class="detail">
            <div class="product-details">
                <ul class="list-group">
                    <li class="col-md-12 list-group-item disabled">Màn hình</li>
                    <li class="col-md-2 list-group-item">Công nghệ màn hình</li>
                    <li class="col-md-4 list-group-item">{!! $product->screen->technology !!}</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->screen->technology !!}</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>
                    <li class="col-md-2 list-group-item">Độ phân giải</li>
                    <li class="col-md-4 list-group-item">{!! $product->screen->resolution !!}</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->screen->resolution !!}</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>
                    <li class="col-md-2 list-group-item">Màn hình rộng</li>
                    <li class="col-md-4 list-group-item">{!! $product->screen->width !!}</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->screen->width !!}</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>
                    <li class="col-md-2 list-group-item">Mặt kính cảm ứng</li>
                    <li class="col-md-4 list-group-item">{!! $product->screen->touch !!}</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->screen->touch !!}</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>
                    <li class="col-md-12 list-group-item disabled">Camera sau</li>
                    <li class="col-md-2 list-group-item">Độ phân giải</li>
                    @if (!empty($product->backCamera->resolution2))
                        @if ($product->backCamera->resolution2 == $product->backCamera->resolution1)
                            <li class="col-md-4 list-group-item">Camera kép {{ $product->backCamera->resolution1 }} MP</li>
                        @else
                            <li class="col-md-4 list-group-item">2 camera {{ $product->backCamera->resolution1 }} MP và {{ $product->backCamera->resolution2 }} MP</li>
                        @endif    
                    @else
                        <li class="col-md-4 list-group-item">{{ $product->backCamera->resolution1 }} MP</li>
                    @endif
                    @if (!empty($product_same->backCamera->resolution2))
                        @if($product_same->backCamera->resolution2 == $product_same->backCamera->resolution1)
                            <li class="col-md-4 list-group-item">Camera kép {{ $product_same->backCamera->resolution1 }} MP</li>
                        @else
                            <li class="col-md-4 list-group-item">2 camera {{ $product_same->backCamera->resolution1 }} MP và {{ $product_same->backCamera->resolution2 }} MP</li>
                        @endif    
                    @else
                        <li class="col-md-4 list-group-item">{{ $product_same->backCamera->resolution1 }} MP</li>
                    @endif
                    <li class="col-md-2 list-group-item">&nbsp;</li>
                    <li class="col-md-2 list-group-item">Quay phim</li>
                    <li class="col-md-4 list-group-item">{!! $product->backCamera->film !!}</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->backCamera->film !!}</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>
                    <li class="col-md-2 list-group-item">Đèn flash</li>
                    <li class="col-md-4 list-group-item">{!! $product->backCamera->flash !!}</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->backCamera->flash !!}</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>
                    <li class="col-md-2 list-group-item" style="height: 102px;">Chụp ảnh nâng cao</li>
                    <li class="col-md-4 list-group-item" style="height: 102px;">{!! $product->backCamera->advanced !!}</li>
                    <li class="col-md-4 list-group-item" style="height: 102px;">{!! $product_same->backCamera->advanced !!}</li>
                    <li class="col-md-2 list-group-item" style="height: 102px;">&nbsp;</li>
                    <li class="col-md-12 list-group-item disabled">Camera trướt</li>
                    <li class="col-md-2 list-group-item">Độ phân giải</li>
                    <li class="col-md-4 list-group-item">{{ $product->frontCamera->resolution }} MP</li>
                    <li class="col-md-4 list-group-item">{{ $product_same->frontCamera->resolution }} MP</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>
                    <li class="col-md-2 list-group-item">Video call</li>
                    @if ($product->frontCamera->videocall == 1)
                        <li class="col-md-4 list-group-item">Có</li>
                    @else
                        <li class="col-md-4 list-group-item">Không</li>
                    @endif
                    @if ($product_same->frontCamera->videocall == 1)
                        <li class="col-md-4 list-group-item">Có</li>
                    @else
                        <li class="col-md-4 list-group-item">Không</li>
                    @endif
                    <li class="col-md-2 list-group-item">&nbsp;</li>
                    <li class="col-md-2 list-group-item" style="height: 62px;">Thông tin khác</li>
                    <li class="col-md-4 list-group-item" style="height: 62px;">{!! $product->frontCamera->other_info !!}</li>
                    <li class="col-md-4 list-group-item" style="height: 62px;">{!! $product_same->frontCamera->other_info !!}</li>
                    <li class="col-md-2 list-group-item" style="height: 62px;">&nbsp;</li>
                    <li class="col-md-12 list-group-item disabled">Hệ điều hành - CPU</li>
                    <li class="col-md-2 list-group-item">Hệ điều hành</li>
                    <li class="col-md-4 list-group-item">{!! $product->operaSystem->opera_system !!}</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->operaSystem->opera_system !!}</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>
                    <li class="col-md-2 list-group-item">Chipset</li>
                    <li class="col-md-4 list-group-item">{!! $product->operaSystem->chipset !!}</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->operaSystem->chipset !!}</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>
                    <li class="col-md-2 list-group-item">Tốc độ CPU</li>
                    <li class="col-md-4 list-group-item">{!! $product->operaSystem->cpu_speed !!}</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->operaSystem->cpu_speed !!}</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>
                    <li class="col-md-2 list-group-item">Chip đồ họa (GPU)</li>
                    <li class="col-md-4 list-group-item">{!! $product->operaSystem->cpu !!}</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->operaSystem->cpu !!}</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>

                    <li class="col-md-12 list-group-item disabled">Bộ nhớ - Lưu trữ</li>
                    <li class="col-md-2 list-group-item">RAM</li>
                    <li class="col-md-4 list-group-item">{!! $product->memory->ram !!} GB</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->memory->ram !!} GB</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>
                    <li class="col-md-2 list-group-item">Bộ nhớ trong</li>
                    <li class="col-md-4 list-group-item">{!! $product->memory->rom !!} GB</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->memory->rom !!} GB</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>
                    <li class="col-md-2 list-group-item">Bộ nhớ khả dụng</li>
                    <li class="col-md-4 list-group-item">{!! $product->memory->available_memory !!} GB</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->memory->available_memory !!} GB</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>
                    <li class="col-md-2 list-group-item">Thẻ nhớ ngoài</li>
                    <li class="col-md-4 list-group-item">{!! $product->memory->external_memory_card !!}</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->memory->external_memory_card !!}</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>

                    <li class="col-md-12 list-group-item disabled">Kết nối</li>
                    <li class="col-md-2 list-group-item">Mạng di động</li>
                    <li class="col-md-4 list-group-item">{!! $product->connect->network !!}</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->connect->network !!}</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>
                    <li class="col-md-2 list-group-item">SIM</li>
                    <li class="col-md-4 list-group-item">{!! $product->connect->sim !!}</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->connect->sim !!}</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>
                    <li class="col-md-2 list-group-item" style="height: 62px;">Wifi</li>
                    <li class="col-md-4 list-group-item" style="height: 62px;">{!! $product->connect->wifi !!}</li>
                    <li class="col-md-4 list-group-item" style="height: 62px;">{!! $product_same->connect->wifi !!}</li>
                    <li class="col-md-2 list-group-item" style="height: 62px;">&nbsp;</li>
                    <li class="col-md-2 list-group-item">GPS</li>
                    <li class="col-md-4 list-group-item">{!! $product->connect->gps !!}</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->connect->gps !!}</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>
                    <li class="col-md-2 list-group-item">Bluetooth</li>
                    <li class="col-md-4 list-group-item">{!! $product->connect->bluetooth !!}</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->connect->bluetooth !!}</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>
                    <li class="col-md-2 list-group-item">Cổng kết nối/sạc</li>
                    <li class="col-md-4 list-group-item">{!! $product->connect->port !!}</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->connect->port !!}</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>
                    <li class="col-md-2 list-group-item">Jack tai nghe</li>
                    <li class="col-md-4 list-group-item">{!! $product->connect->jack !!}</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->connect->jack !!}</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>
                    <li class="col-md-2 list-group-item">Kết nối khác</li>
                    <li class="col-md-4 list-group-item">{!! $product->connect->other !!}</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->connect->other !!}</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>

                    <li class="col-md-12 list-group-item disabled">Thiết kế - Trọng lượng</li>
                    <li class="col-md-2 list-group-item">Thiết kế</li>
                    <li class="col-md-4 list-group-item">{!! $product->design->design !!}</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->design->design !!}</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>
                    <li class="col-md-2 list-group-item">Chất liệu</li>
                    <li class="col-md-4 list-group-item">{!! $product->design->material !!}</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->design->material !!}</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>
                    <li class="col-md-2 list-group-item">Kích thước</li>
                    <li class="col-md-4 list-group-item">{!! $product->design->size !!}</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->design->size !!}</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>
                    <li class="col-md-2 list-group-item">Trọng lượng</li>
                    <li class="col-md-4 list-group-item">{!! $product->design->weigth !!}</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->design->weigth !!}</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>

                    <li class="col-md-12 list-group-item disabled">Thông tin pin - Sạc</li>
                    <li class="col-md-2 list-group-item">Dung lượng pin</li>
                    <li class="col-md-4 list-group-item">{!! $product->battery->capacity !!} mAh</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->battery->capacity !!} mAh</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>
                    <li class="col-md-2 list-group-item">Loại pin</li>
                    <li class="col-md-4 list-group-item">{!! $product->battery->type !!}</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->battery->type !!}</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>
                    <li class="col-md-2 list-group-item">Công nghệ pin</li>
                    <li class="col-md-4 list-group-item">{!! $product->battery->technology !!}</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->battery->technology !!}</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>

                    <li class="col-md-12 list-group-item disabled">Tiện ích</li>
                    <li class="col-md-2 list-group-item">Bảo mật nâng cao</li>
                    <li class="col-md-4 list-group-item">{!! $product->utility->security !!}</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->utility->security !!}</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>
                    <li class="col-md-2 list-group-item">Tính năng đặc biệt</li>
                    <li class="col-md-4 list-group-item">{!! $product->utility->special_function !!}</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->utility->special_function !!}</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>
                    <li class="col-md-2 list-group-item">Ghi âm</li>
                    <li class="col-md-4 list-group-item">{!! $product->utility->recording !!}</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->utility->recording !!}</li>
                    <li class="col-md-2 list-group-item">&nbsp;</li>
                    <li class="col-md-2 list-group-item">Radio</li>
                    <li class="col-md-4 list-group-item">{!! $product->utility->radio !!}</li>
                    <li class="col-md-4 list-group-item">{!! $product_same->utility->radio !!}</li>
                    <li class="col-md-2 list-group-item"    >&nbsp;</li>
                    <li class="col-md-2 list-group-item" style="height: 62px;">Xem phim</li>
                    <li class="col-md-4 list-group-item" style="height: 62px;">{!! $product->utility->movie !!}</li>
                    <li class="col-md-4 list-group-item" style="height: 62px;">{!! $product_same->utility->movie !!}</li>
                    <li class="col-md-2 list-group-item" style="height: 62px;">&nbsp;</li>
                    <li class="col-md-2 list-group-item" style="height: 62px;">Nghe nhạc</li>
                    <li class="col-md-4 list-group-item" style="height: 62px;">{!! $product->utility->music !!}</li>
                    <li class="col-md-4 list-group-item" style="height: 62px;">{!! $product_same->utility->music !!}</li>
                    <li class="col-md-2 list-group-item" style="height: 62px;">&nbsp;</li>
                </ul>
            </div>
          </div>
        </div>  
    </div>
@endforeach 
@endforeach
</div>
@stop
