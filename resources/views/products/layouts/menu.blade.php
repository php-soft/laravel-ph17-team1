<div class="container">
    <nav class="navbar navbar-default" role="navigation" style="margin-top: -20px; border: none; border-radius: 0px">
        <div class="container">
            <div id="navbar" class="navbar-collapse collapse" style="color: #f5f5f5">
                <ul class="nav navbar-nav navbar-left">
                    @foreach ($manu_2s as $manu_2)
                        <li><a href="{{ url('products/dtdd/' .$manu_2->name) }}">{{$manu_2->name}}</a></li>
                        <input type="hidden" name="manu" value="{{ $manu_2->name }}">
                    @endforeach    
                    <li class=" dropdown">
                        <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hãng khác <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @foreach ($manu_alls as $manu_all)
                                <li><a href="{{ url('products/dtdd/' .$manu_all->name) }}">{{ $manu_all->name }}</a></li>
                                <input type="hidden" name="manu" value="{{ $manu_all->name }}">
                            @endforeach    
                        </ul>
                    </li>
                    
                    <li><a href="{{ route('duoi1trieu') }}">Dưới 1 triệu</a></li>
                    <li><a href="{{ route('tu1den3trieu') }}">Từ 1 - 3 triệu</a></li>
                    <li><a href="{{ route('tu3den7trieu') }}">Từ 3 - 7 triệu</a></li>
                    <li class=" dropdown">
                        <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Giá khác <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('duoi1trieu') }}">Dưới 1 triệu</a></li>
                            <li><a href="{{ route('tu1den3trieu') }}">Từ 1 - 3 triệu</a></li>
                            <li><a href="{{ route('tu3den7trieu') }}">Từ 3 - 7 triệu</a></li>
                            <li><a href="{{ route('tu7den10trieu') }}">Từ 7 - 10 triệu</a></li>
                            <li><a href="{{ route('tu10den15trieu') }}">Từ 10 - 15 triệu</a></li>
                            <li><a href="{{ route('tren15trieu') }}">Trên 15 triệu</a></li>
                        </ul>
                    </li>
                    <li class=" dropdown">
                        <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tính năng <span class="caret"></span></a>
                        <ul class="dropdown-menu tinhnang">
                            <div class="col-md-6">
                                <li><span><strong>Loại điện thoại</strong></span></li>
                                <li><a href="{{ route('classicphone') }}">Điện thoại phổ thông</a></li>
                                <li><a href="{{ route('smartphone') }}">Smart Phone</a></li>
                                <li><a href="{{ route('android') }}">Android</a></li>
                                <li><a href="{{ route('ios') }}">iphone(IOS)</a></li>
                                <li class="divider"></li>
                                <li><span><strong>Camera sau</strong></span></li>
                                <li><a href="{{ route('duoi3MP') }}">Dưới 3 MP</a></li>
                                <li><a href="{{ route('tu3den5MP') }}">Từ 3 đến 5 MP</a></li>
                                <li><a href="{{ route('tu5den8MP') }}">Từ 5 đến 8 MP</a></li>
                                <li><a href="{{ route('tu8den12MP') }}">Từ 8 đến 12 MP</a></li>
                                <li><a href="{{ route('tren12MP') }}">Trên 12 MP</a></li>
                            </div>
                            <div class="col-md-6">
                                <li><span><strong>Chất liệu vỏ</strong></span></li>
                                <li><a href="{{ route('kimloainguyenkhoi') }}">Kim loại nguyên khối</a></li>
                                <li><a href="{{ route('nhuavakimloai') }}">Nhựa và kim loại</a></li>
                                <li><a href="{{ route('kimloaivakinhcuongluc') }}">Kim loại và kính cường lực</a></li>
                                <li><a href="{{route('nhua')}}">Nhựa</a></li>
                                <li class="divider"></li>
                                <li><span><strong>Tính năng đặc biệt</strong></span></li>
                                <li><a href="{{ route('vantay') }}">Bảo mật vân tay</a></li>
                                <li><a href="{{ route('chongbuinuoc') }}">Chống nước, bụi</a></li>
                                <li><a href="{{ route('2sim') }}">2 SIM</a></li>
                                <li><a href="{{ route('3dtouch') }}">3D Touch</a></li>
                                <li><a href="{{ route('pinkhung') }}">Pin khủng (>3000 mAh)</a></li>
                            </div>
                       </ul>
                    </li>

                </ul>
                <form class="navbar-form navbar-right" action="{{ route('search') }}" method="GET">
                    <div class="input-group" style="width: 250px;">
                        <input type="text" class="form-control" placeholder="Search..." id="query" name="search" value="">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </nav>
    <div class="row">   
        <div id="page-content-wrapper" style="margin-left: -20px;">
            <div class="container">
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail" style="padding: 0px;">
                            <div class="item">
                                <a href="{{ url('products/' .$product->slug) }}">
                                    <div class="item-overlay">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="{!! $product->image !!}">
                                            </div>
                                            <div class="col-md-8 info">
                                                <p>HDH: {!! $product->operaSystem->opera_system !!}</p>
                                                <p>CPU: {!! $product->operaSystem->chipset !!}</p>
                                                <p>RAM: {!! $product->memory->ram !!} GB, ROM: {!! $product->memory->rom !!} GB</p>
                                                 @if (!empty($product->backCamera->resolution2) and !empty($product->frontCamera->resolution2))
                                                    <p> Camera kép: {{ $product->backCamera->resolution1 }} MP, Selfie: Camera kép {{$product->frontCamera->resolution1}} MP</p>
                                                @elseif (!empty($product->backCamera->resolution2))
                                                    <p>Camera kép: {{ $product->backCamera->resolution1 }} MP, Selfie: {{ $product->frontCamera->resolution1 }} MP</p>
                                                @elseif (!empty($product->frontCamera->resolution2))
                                                    <p>Camera: {{ $product->backCamera->resolution1 }} MP, Selfie: Camera kép {{ $product->frontCamera->resolution1 }} MP</p>
                                                @else
                                                    <p>Camera: {{ $product->backCamera->resolution1 }} MP, Selfie: {{ $product->frontCamera->resolution1 }} MP</p>
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
                    </div>
                    @endforeach
                </div>    
            </div>
        </div>        
    </div>
</div>