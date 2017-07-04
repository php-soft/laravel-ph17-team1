@extends ('layouts.app')

@section ('content')
<div class="container">
    @foreach($products as $product)
        <div id="detail-product-title">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-home" style="font-size: 10px;"></span><a href="{!!url('/')!!}" title=""> Home</a> 
                        <span class="glyphicon glyphicon-chevron-right" style="font-size: 10px;"></span><a href="{!!url('products')!!}" title=""> Điện thoại</a>
                        <span class="glyphicon glyphicon-chevron-right" style="font-size: 10px;"></span> <a href="#" title="">{!! $product->name !!}</a>
                    </h3>
                </div>
            </div>    
            <!-- end breadcrumb -->
            <div class="row">
                    <div class="rowtop">
                        <div class="col-xs-12 col-sm-12 col-md-5 product-name">
                            <h3>Điện thoại {!! $product->name !!} {!! $product->color->name !!} {!! $product->memory->rom !!}GB</h3>
                        </div>
                        <!-- end product name -->
                        <div class="col-xs-12 col-sm-12 col-md-4 rating-result">
                            <p style="margin-top:23px; margin-left: -90px; color: orange">
                                @for ($i=1; $i <= 5 ; $i++)
                                    <span class="glyphicon glyphicon-star{{ ($i <= $avgvote) ? '' : '-empty'}}"></span>
                                @endfor
                                <a href="#review">{{$count_vote}} đánh giá</a>
                            </p>
                        </div>
                        <!-- end rating result -->
                        <div class="col-xs-12 col-sm-12 col-md-3 like-share">
                            <p style="margin-top:16px; margin-left: 120px; font-size: 18px">
                                <a href=""><span class="label label-primary"> Like</span></a>
                                <a href=""><span class="label label-primary">Share</span></a>
                            </p>
                        </div>
                        <!-- end like share -->
                    </div>
            </div>
        </div>        
        <hr><!-- end detail product title -->
        <div id="detail-product-info">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 product-img">
                    <img class="img-responsive" src="{!!$product->image!!}" alt="">
                </div>
                <!-- end product image -->
                <div class="col-xs-12 col-sm-12 col-md-4 product-promotion">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            @if($product->sale_price === null)
                                <h2 style="color: red">{!! $product->price !!} đ</h2>
                            @else 
                                <h2 style="color: red">{!! $product->sale_price !!} đ</h2>
                            @endif
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            @if($product->sale_price !== null)
                                <label class="label label-warning" style="margin-left: 20px;">Đã giảm {!! number_format(round((($product->price-$product->sale_price)/$product->price)*100, 2), 2) !!} %</label>
                            @endif
                        </div>
                    </div>
                    <!-- end show price -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="panel panel-info" style="margin:0;">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Khuyễn mãi - Chính sách</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="promotion-list">
                                        @foreach ($promotions as $promotion)
                                            <tr>
                                                <td>
                                                    <li><span class="glyphicon glyphicon-hand-right"></span> {!! $promotion->name !!}</li>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><!-- end promotion -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="panel panel-info" style="margin:0;">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Phụ kiện đi kèm</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="promotion-list">
                                        <tr>
                                            <td>
                                                <li><span class="glyphicon glyphicon-hand-right"></span> {!! $product->accessory !!}</li>
                                            </td>
                                        </tr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><!-- end phu kien -->
                       <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            @if($product->status ==1)
                                <a href="" title="" class="btn btn-large btn-block btn-primary" style="font-size: 20px;">Mua ngay</a>
                            @else
                                <a href="" title="" class="btn btn-large btn-block btn-primary disabled" style="font-size: 20px;">Tạm hết hàng</a>
                            @endif
                        </div>
                    </div>
                    <br> <!-- end btn order -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="panel panel-info" style="margin: 0;">
                                <div class="panel-heading" style="padding:5px;">
                                    <h3 class="panel-title">Danh sách siêu thị</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="store-list">
                                        @foreach ($stores as $store)
                                            <tr>
                                                <td>
                                                    <li><span class="glyphicon glyphicon-flag"></span> {!! $store->name !!} <span class="glyphicon
                                                    glyphicon-chevron-right"></span> {!! $store->address !!}</li>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end list store -->
                </div>
                <!-- end product promotion -->
                <div class="col-xs-12 col-sm-12 col-md-4 product-digital">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 product-digital">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th colspan="2"><h4>CẤU HÌNH CHI TIẾT SẢN PHẨM</h4></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td style="width: 120px;">Màn hình</td>
                                      <td>{!! $product->screen->tech_screen !!}, {!! $product->screen->width_screen !!}, {!! $product->screen->resolution !!}</td>
                                    </tr>
                                    <tr>
                                      <td>Hệ điều hành</td>
                                      <td>{!! $product->operaSystem->opera_system !!}</td>
                                    </tr>
                                    <tr>
                                      <td>Camera trước</td>
                                      <td>{!! $product->frontCamera->resolution !!}</td>
                                    </tr>
                                    <tr>
                                      <td>Camera sau</td>
                                      <td>{!! $product->backCamera->resolution !!}</td>
                                    </tr>
                                    <tr>
                                      <td>CPU</td>
                                      <td>{!! $product->operaSystem->cpu_speed !!}</td>
                                    </tr>
                                    <tr>
                                      <td>RAM</td>
                                      <td>{!! $product->memory->ram !!} GB</td>
                                    </tr>
                                    <tr>
                                      <td>Bộ nhớ trong</td>
                                      <td>{!! $product->memory->rom !!} GB</td>
                                    </tr>
                                    <tr>
                                      <td>Hỗ trợ thẻ nhớ</td>
                                      <td>{!! $product->memory->external_memory_card !!}</td>
                                    </tr>
                                    <tr>
                                      <td>Thẻ SIM</td>
                                      <td>{!! $product->connect->sim !!}</td>
                                    </tr>
                                    <tr>
                                      <td>Dung lượng PIN</td>
                                      <td>{!! $product->battery->battery_capacity !!} mAh</td>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>    
                        </div>
                    </div>
                    <!-- end detail digital -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 detail-button">
                            <a href="#0" title="" class="btn btn-block btn-primary btn-view" style="font-size: 12px;">Xem chi tiết</a>
                        </div>
                    </div>
                    <!-- end detail button -->
                    <div class="mask"></div>
                    <div id="quick-view-pop-up">
                        <div class="quick-view-panel">
                            <div class="quick-view-close"></div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 product-name">
                                    <h3 class="product-name">Thông số kỹ thuật chi tiết {!! $product->name !!}</h3>
                                </div>
                            </div>
                            <hr><!-- end row title -->
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="image-large">
                                        <img class="img-responsive" src="{!!$product->image!!}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="detail">
                                        <div class="product-details">
                                            <ul class="list-group" style="width: 200%;">
                                              <li class="col-md-12 list-group-item disabled">Màn hình</li>
                                              <li class="col-md-4 list-group-item">Công nghệ màn hình</li>
                                              <li class="col-md-8 list-group-item">{!! $product->screen->tech_screen !!}</li>
                                              <li class="col-md-4 list-group-item">Độ phân giải</li>
                                              <li class="col-md-8 list-group-item">{!! $product->screen->resolution !!}</li>
                                              <li class="col-md-4 list-group-item">Màn hình rộng</li>
                                              <li class="col-md-8 list-group-item">{!! $product->screen->width_screen !!}</li>
                                              <li class="col-md-4 list-group-item">Mặt kính cảm ứng</li>
                                              <li class="col-md-8 list-group-item">{!! $product->screen->touch_screen !!}</li>

                                              <li class="col-md-12 list-group-item disabled">Camera sau</li>
                                              <li class="col-md-4 list-group-item">Độ phân giải</li>
                                              <li class="col-md-8 list-group-item">{!! $product->backCamera->resolution !!}</li>
                                              <li class="col-md-4 list-group-item">Quay phim</li>
                                              <li class="col-md-8 list-group-item">{!! $product->backCamera->film !!}</li>
                                              <li class="col-md-4 list-group-item">Đèn flash</li>
                                              <li class="col-md-8 list-group-item">{!! $product->backCamera->flash !!}</li>
                                              <li class="col-md-4 list-group-item">Chụp ảnh nâng cao</li>
                                              <li class="col-md-8 list-group-item">{!! $product->backCamera->advanced_photography !!}</li>

                                              <li class="col-md-12 list-group-item disabled">Camera trướt</li>
                                              <li class="col-md-4 list-group-item">Độ phân giải</li>
                                              <li class="col-md-8 list-group-item">{!! $product->frontCamera->resolution !!}</li>
                                              <li class="col-md-4 list-group-item">Video call</li>
                                              <li class="col-md-8 list-group-item">{!! $product->frontCamera->videocall !!}</li>
                                              <li class="col-md-4 list-group-item">Thông tin khác</li>
                                              <li class="col-md-8 list-group-item">{!! $product->frontCamera->other_info !!}</li>

                                              <li class="col-md-12 list-group-item disabled">Hệ điều hành - CPU</li>
                                              <li class="col-md-4 list-group-item">Hệ điều hành</li>
                                              <li class="col-md-8 list-group-item">{!! $product->operaSystem->opera_system !!}</li>
                                              <li class="col-md-4 list-group-item">Chipset</li>
                                              <li class="col-md-8 list-group-item">{!! $product->operaSystem->chipset !!}</li>
                                              <li class="col-md-4 list-group-item">Tốc độ CPU</li>
                                              <li class="col-md-8 list-group-item">{!! $product->operaSystem->cpu_speed !!}</li>
                                              <li class="col-md-4 list-group-item">Chip đồ họa (GPU)</li>
                                              <li class="col-md-8 list-group-item">{!! $product->operaSystem->cpu !!}</li>

                                              <li class="col-md-12 list-group-item disabled">Bộ nhớ - Lưu trữ</li>
                                              <li class="col-md-4 list-group-item">RAM</li>
                                              <li class="col-md-8 list-group-item">{!! $product->memory->ram !!} GB</li>
                                              <li class="col-md-4 list-group-item">Bộ nhớ trong</li>
                                              <li class="col-md-8 list-group-item">{!! $product->memory->rom !!} GB</li>
                                              <li class="col-md-4 list-group-item">Bộ nhớ khả dụng</li>
                                              <li class="col-md-8 list-group-item">{!! $product->memory->available_memory !!} GB</li>
                                              <li class="col-md-4 list-group-item">Thẻ nhớ ngoài</li>
                                              <li class="col-md-8 list-group-item">{!! $product->memory->external_memory_card !!}</li>

                                              <li class="col-md-12 list-group-item disabled">Kết nối</li>
                                              <li class="col-md-4 list-group-item">Mạng di động</li>
                                              <li class="col-md-8 list-group-item">{!! $product->connect->network_mobile !!}</li>
                                              <li class="col-md-4 list-group-item">SIM</li>
                                              <li class="col-md-8 list-group-item">{!! $product->connect->sim !!}</li>
                                              <li class="col-md-4 list-group-item">Wifi</li>
                                              <li class="col-md-8 list-group-item">{!! $product->connect->wifi !!}</li>
                                              <li class="col-md-4 list-group-item">GPS</li>
                                              <li class="col-md-8 list-group-item">{!! $product->connect->gps !!}</li>
                                              <li class="col-md-4 list-group-item">Bluetooth</li>
                                              <li class="col-md-8 list-group-item">{!! $product->connect->bluetooth !!}</li>
                                              <li class="col-md-4 list-group-item">Cổng kết nối/sạc</li>
                                              <li class="col-md-8 list-group-item">{!! $product->connect->connect_port !!}</li>
                                              <li class="col-md-4 list-group-item">Jack tai nghe</li>
                                              <li class="col-md-8 list-group-item">{!! $product->connect->jack_phone !!}</li>
                                              <li class="col-md-4 list-group-item">Kết nối khác</li>
                                              <li class="col-md-8 list-group-item">{!! $product->connect->other_connect !!}</li>

                                              <li class="col-md-12 list-group-item disabled">Thiết kế - Trọng lượng</li>
                                              <li class="col-md-4 list-group-item">Thiết kế</li>
                                              <li class="col-md-8 list-group-item">{!! $product->design->design !!}</li>
                                              <li class="col-md-4 list-group-item">Chất liệu</li>
                                              <li class="col-md-8 list-group-item">{!! $product->design->material !!}</li>
                                              <li class="col-md-4 list-group-item">Kích thước</li>
                                              <li class="col-md-8 list-group-item">{!! $product->design->size !!}</li>
                                              <li class="col-md-4 list-group-item">Trọng lượng</li>
                                              <li class="col-md-8 list-group-item">{!! $product->design->weigth !!}</li>

                                              <li class="col-md-12 list-group-item disabled">Thông tin pin - Sạc</li>
                                              <li class="col-md-4 list-group-item">Dung lượng pin</li>
                                              <li class="col-md-8 list-group-item">{!! $product->battery->battery_capacity !!}</li>
                                              <li class="col-md-4 list-group-item">Loại pin</li>
                                              <li class="col-md-8 list-group-item">{!! $product->battery->battery_type !!}</li>
                                              <li class="col-md-4 list-group-item">Công nghệ pin</li>
                                              <li class="col-md-8 list-group-item">{!! $product->battery->battery_tech !!}</li>

                                              <li class="col-md-12 list-group-item disabled">Tiện ích</li>
                                              <li class="col-md-4 list-group-item">Bảo mật nâng cao</li>
                                              <li class="col-md-8 list-group-item">{!! $product->utility->advanced_security !!}</li>
                                              <li class="col-md-4 list-group-item">Tính năng đặc biệt</li>
                                              <li class="col-md-8 list-group-item">{!! $product->utility->special_function !!}</li>
                                              <li class="col-md-4 list-group-item">Ghi âm</li>
                                              <li class="col-md-8 list-group-item">{!! $product->utility->recording !!}</li>
                                              <li class="col-md-4 list-group-item">Radio</li>
                                              <li class="col-md-8 list-group-item">{!! $product->utility->radio !!}</li>
                                              <li class="col-md-4 list-group-item">Xem phim</li>
                                              <li class="col-md-8 list-group-item">{!! $product->utility->movie !!}</li>
                                              <li class="col-md-4 list-group-item">Nghe nhạc</li>
                                              <li class="col-md-8 list-group-item">{!! $product->utility->music !!}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                            <!-- end row detail -->
                        </div>
                    </div>
                    <!-- end quickview -->
                </div>
                <!-- end product digital -->
            </div>
        </div>
        <hr><!-- end detail product info -->
        <div id="detail-product-news">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 product-rate">
                            <input type="checkbox" class="read-more-state" id="post-review" />
                            <ul class="read-more-wrap">
                                <h3>Đánh giá chi tiết sản phẩm</h3>
                                <p>{!!$product->description!!} Màu đỏ là trên chiếc iPhone 7 Plus Red 128GB là màu lần đầu tiên được Apple mang lên những chiếc iPhone của mình. Theo đó thì những chiếc iPhone mới sẽ có mặt lưng được làm từ nhôm nguyên khối, được sơn lên lớp sơn màu đỏ rất nổi bật và bắt mắt. Đáng tiếc là phần mặt trước của máy vẫn giữ màu trắng quen thuộc nên sẽ cho bạn đôi chút cảm thấy hụt hẫng.
                                Màu đỏ là trên chiếc iPhone 7 Plus Red 128GB là màu lần đầu tiên được Apple mang lên những chiếc iPhone của mình. Theo đó thì những chiếc iPhone mới sẽ có mặt lưng được làm từ nhôm nguyên khối, được sơn lên lớp sơn màu đỏ rất nổi bật và bắt mắt. Đáng tiếc là phần mặt trước của máy vẫn giữ màu trắng quen thuộc nên sẽ cho bạn đôi chút cảm thấy hụt hẫng.
                                Màu đỏ là trên chiếc iPhone 7 Plus Red 128GB là màu lần đầu tiên được Apple mang lên những chiếc iPhone của mình. Theo đó thì những chiếc iPhone mới sẽ có mặt lưng được làm từ nhôm nguyên khối, được sơn lên lớp sơn màu đỏ rất nổi bật và bắt mắt. Đáng tiếc là phần mặt trước của máy vẫn giữ màu trắng quen thuộc nên sẽ cho bạn đôi chút cảm thấy hụt hẫng.
                                Màu đỏ là trên chiếc iPhone 7 Plus Red 128GB là màu lần đầu tiên được Apple mang lên những chiếc iPhone của mình. Theo đó thì những chiếc iPhone mới sẽ có mặt lưng được làm từ nhôm nguyên khối, được sơn lên lớp sơn màu đỏ rất nổi bật và bắt mắt. Đáng tiếc là phần mặt trước của máy vẫn giữ màu trắng quen thuộc nên sẽ cho bạn đôi chút cảm thấy hụt hẫng. <br>
                                <img style="height: 100px; width: 100px;" class="read-more-target" src="{!!$product->image!!}" alt="{!!$product->name!!}">
                                <p class="read-more-target">{!!$product->description!!} Màu đỏ là trên chiếc iPhone 7 Plus Red 128GB là màu lần đầu tiên được Apple mang lên những chiếc iPhone của mình. Theo đó thì những chiếc iPhone</p>
                                </p>
                            </ul>
                            <label for="post-review" class="read-more-trigger"></label>
                        </div>
                    </div>    
                    <hr><!-- end product detail rate -->
                    @if(Session::has('success'))
                      <span class="alert alert-success">
                        {{Session::get('success')}}      
                      </span>
                    @endif
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 product-vote">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-5">
                                    <h3>{{$count_vote}} đánh giá {!! $product->name !!}</h3>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-3">
                                    <p>Chọn đánh giá của bạn</p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-9" style="margin-left: -120px">
                                    <div class="stars">
                                        <form action="">
                                            <input class="star star-5" id="star-5" type="radio" name="star"/>
                                            <label class="star star-5" for="star-5"></label>
                                            <input class="star star-4" id="star-4" type="radio" name="star"/>
                                            <label class="star star-4" for="star-4"></label>
                                            <input class="star star-3" id="star-3" type="radio" name="star"/>
                                            <label class="star star-3" for="star-3"></label>
                                            <input class="star star-2" id="star-2" type="radio" name="star"/>
                                            <label class="star star-2" for="star-2"></label>
                                            <input class="star star-1" id="star-1" type="radio" name="star"/>
                                            <label class="star star-1" for="star-1"></label>
                                        </form>
                                    </div>
                                </div>    
                            </div>
                              <div class="row">
                                <form action="/vote/create" method="post">
                                  <div class="col-xs-12 col-sm-12 col-md-8">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <textarea name="comment" style="height: 83px; width: 480px; max-height: 180px; max-width: 480px; border-radius: 5px;" placeholder="Nhập đánh giá về sản phẩm. (Tối thiểu 80 ký tự)" required minlength="3">
                                    </textarea>
                                  </div>
                                  <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                      <input type="text" name="name" class="form-control" placeholder="Họ tên (bắt buộc)" required>
                                    </div>
                                    <div class="form-group">
                                      <input type="text" name="email" class="form-control" placeholder="Email (bắt buộc)" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                                    </div>
                                    <div class="form-group">
                                      <input type="text" name="phone" class="form-control" placeholder="Số điện thoại (bắt buộc)" required pattern="[0]\d{3}\d{3}(d{1})?\d{3}">
                                    </div>
                                    <div class="form-group">
                                      <button type="submit" class="btn btn-large btn-block btn-primary">
                                        Gửi đánh giá
                                      </button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            <div class="row">
                              <div id="review" class="col-md-12">
                                @foreach ($votes as $vote)
                                  <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                      <p><strong>{{$vote->name}}</strong></p>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                      @for ($i=1; $i <= 5 ; $i++)
                                        <span class="glyphicon glyphicon-star{{ ($i <= $vote->star) ? '' : '-empty'}}" style="color: orange; float: left;">
                                        </span>
                                      @endfor
                                      <p>{{$vote->comment}}</p>
                                    </div>
                                  </div>
                                @endforeach
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                {{$votes->links()}}
                              </div>
                            </div>
                        </div>
                    </div>    
                    <hr><!-- end product vote -->
                    @if(Session::has('success'))
                      <span class="alert alert-success">
                        {{Session::get('success')}}  
                      </span>
                    @endif
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 product-comment">
                            <div class="row">
                                <form action="/review/create" method="post">
                                  <div class="col-xs-12 col-sm-12 col-md-8">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <textarea name="comment" style="height: 83px; width: 480px; max-height: 180px; max-width: 480px; border-radius: 5px;" placeholder="Nhập bình luận của bạn. (Tối thiểu 10 ký tự)" required minlength="3">
                                    </textarea>
                                  </div>
                                  <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                      <input type="text" name="name" class="form-control" placeholder="Họ tên (bắt buộc)" required>
                                    </div>
                                    <div class="form-group">
                                      <input type="text" name="email" class="form-control" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                                    </div>
                                    <div class="form-group">
                                      <input type="text" name="phone" class="form-control" placeholder="Số điện thoại" pattern="[0]\d{3}\d{3}(d{1})?\d{3}">
                                    </div>
                                    <div class="form-group">
                                      <button type="submit" class="btn btn-large btn-block btn-primary">
                                        Gửi phản hồi
                                      </button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            <div class="row">
                                <div class="col-md-12">
                                
                                    @foreach ($reviews as $review)
                                      
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <p><strong>{{$review->name}}</strong></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <p>{{ $review->comment}}</p>
                                            </div>
                                        </div>
                               
                                    @endforeach
                                    

                                   
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                {{$votes->links()}}
                              </div>
                            </div>
                        </div>
                    </div>
                       <!-- end product comment -->
                </div>
                <!-- end col-md-4 -->
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <div class="col-xs-12 col-sm-12 col-md-12 product-news">
                        <h2 style="padding-left: 20px;"><small>Tin tức mới</small></h2><hr>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
                            <div class="bt">
                                <div class="image-m pull-left">
                                    <a href="">
                                        <img style="height: 100px; width: 100px;" class="img-responsive" src="{!!$product->image!!}" alt="{!!$product->name!!}">
                                    </a>
                                </div>
                            </div> <!-- /div bt -->
                                <div class="ct">
                                <a href="" title="Chi tiết">
                                    <p>
                                        {!!$product->description!!} Màu đỏ là trên chiếc iPhone 7 Plus Red 128GB là màu lần đầu tiên được Apple mang lên những chiếc iPhone của mình. Theo đó thì những chiếc iPhone
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
                            <div class="bt">
                                <div class="image-m pull-left">
                                    <a href="">
                                        <img style="height: 100px; width: 100px;" class="img-responsive" src="{!!$product->image!!}" alt="{!!$product->name!!}">
                                    </a>
                                </div>
                            </div> <!-- /div bt -->
                            <div class="ct">
                                <a href="" title="Chi tiết">
                                    <p>
                                        {!!$product->description!!} Màu đỏ là trên chiếc iPhone 7 Plus Red 128GB là màu lần đầu tiên được Apple mang lên những chiếc iPhone của mình. Theo đó thì những chiếc iPhone
                                    </p>
                                </a>
                            </div>
                        </div>
                        <a href="" class="pull-right compare">Đọc thêm tin tức</a>
                    </div>
                    <!-- end product news -->
                    <div class="col-xs-12 col-sm-12 col-md-12 product-similar">
                        <h2 style="padding-left: 20px;"><small>Sản phẩm tương tự</small></h2><hr>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
                            <div class="bt">
                                <div class="image-m pull-left">
                                    <a href="">
                                        <img style="height: 150px; width: 110px;" class="img-responsive" src="{!!$product->image!!}" alt="{!!$product->name!!}">
                                    </a>
                                </div>
                            </div> <!-- /div bt -->
                            <div class="ct">
                                <h4>{!! $product->name !!}</h4>
                                <h4>{!! $product->price !!} đ</h4>
                                <a href="{!!url('mobile/'.$product->id.'-'.$product->slug)!!}" title="Chi tiết">
                                    <ul type="none">
                                        <li><strong>Màn Hình</strong> :{!!$product->screen->tech_screen!!}</li>
                                        <li><strong>Camera</strong> :{!!$product->backCamera->resolution!!} MP</li>
                                        <li><strong>Pin</strong> :{!!$product->battery->battery_capacity!!} mAh</li>
                                    </ul>
                                </a>
                            </div>
                            <a href="" class="pull-right compare">So sánh chi tiết </a>
                        </div>
                    </div>
                    <!-- end product similar -->
                </div>
            </div>
        </div>
        <hr><!-- end detail product vote, news of product and similar product -->
    @endforeach
</div>
@stop