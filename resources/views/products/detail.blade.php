@extends ('layouts.app')

@section ('content')
<div class="container">
    @foreach($products as $product)
        <div id="detail-product-title">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <h3 class="panel-title">
                        <a href="{!!url('/')!!}" title="">Trang chủ</a>
                        <span class="glyphicon glyphicon-menu-right" style="font-size: 14px;"></span>
                        <a href="{!!url('products')!!}" title=""> Điện thoại</a>
                        <span class="glyphicon glyphicon-menu-right" style="font-size: 14px;"></span>
                        <a href="{{url('products/category/name')}}">{!! $product->manufactory->name !!}</a>
                    </h3>
                </div>
            </div>    
            <!-- end breadcrumb -->
            <div class="row" style="margin-bottom: -20px">
                <div class="rowtop">
                    <div class="col-xs-12 col-sm-12 col-md-8 product-name">
                        <h3 style="float: left; margin-right: 10px;">Điện thoại {!! $product->name !!}</h3>
                        <p style="margin-top:25px; color: orange">
                            @for ($i=1; $i <= 5 ; $i++)
                                <span class="glyphicon glyphicon-star{{ ($i <= $avgvote) ? '' : '-empty'}}"></span>
                            @endfor
                            <a href="#review">{{$count_vote}} đánh giá</a>
                        </p>
                    </div>
                    <!-- end product name -->
                    <div class="col-xs-12 col-sm-12 col-md-4 like-share">
                        <p style="margin-top:16px; margin-left: 260px; font-size: 15px">
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
                    <img class="img-responsive" src="{!!$product->image!!}">
                </div>
                <!-- end product image -->
                <div class="col-xs-12 col-sm-12 col-md-4 product-promotion">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: -20px;">
                            @if($product->sale_price === null)
                                <h2 style="color: #d0021b; float: left; margin-right: 15px;">{!! $product->price !!} đ</h2>
                            @else 
                                <h2 style="color: #d0021b; float: left; margin-right: 15px;">{!! $product->sale_price !!} đ</h2>
                            @endif
                            @if($product->sale_price !== null)
                                <p style="margin-top: 25px;">
                                    <label class="label label-warning">Đã giảm {!! number_format(round((($product->price-$product->sale_price)/$product->price)*100, 2), 2) !!} %</label>
                                </p>
                            @endif
                        </div>
                    </div>
                    <!-- end show price -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: -30px;">
                            <div class="panel panel-info">
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
                        <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: -10px;">
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
                                <a href="{{url('')}}" class="btn btn-large btn-block btn-primary" style="font-size: 20px;">Mua ngay</a>
                            @else
                                <a href="" title="" class="btn btn-large btn-block btn-primary disabled" style="font-size: 20px;">Tạm hết hàng</a>
                            @endif
                        </div>
                    </div>
                    <br> <!-- end btn order -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: -10px;">
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
                    <div class="row" style="margin-top: -20px;">
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
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-block btn-primary btn-view" style="font-size: 12px;" data-toggle="modal" data-target="#exampleModalLong">
                      Xem chi tiết
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content" style="width: 725px;">
                          <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLongTitle">Thông số kỹ thuật chi tiết {{$product->name}}</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -25px; margin-right: 10px;">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div id="wrapper" style="text-align: center">    
                                        <div id="yourdiv" style="display: inline-block;">
                                            <img style="height: 300px; width: 300px; text-align: center;"src="{!!$product->image!!}">
                                        </div>
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                  <div class="detail" style="width: 345px;">
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
                                        <li class="col-md-4 list-group-item" style="height: 82px;">Chụp ảnh nâng cao</li>
                                        <li class="col-md-8 list-group-item" style="height: 82px;">{!! $product->backCamera->advanced_photography !!}</li>
                                        <li class="col-md-12 list-group-item disabled">Camera trướt</li>
                                        <li class="col-md-4 list-group-item">Độ phân giải</li>
                                        <li class="col-md-8 list-group-item">{!! $product->frontCamera->resolution !!}</li>
                                        <li class="col-md-4 list-group-item">Video call</li>
                                        @if($product->frontCamera->videocall == 1)
                                            <li class="col-md-8 list-group-item">Có</li>
                                        @else
                                            <li class="col-md-8 list-group-item">Không</li>
                                        @endif
                                        <li class="col-md-4 list-group-item" style="height: 62px;">Thông tin khác</li>
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
                                        <li class="col-md-4 list-group-item" style="height: 62px;">Wifi</li>
                                        <li class="col-md-8 list-group-item" style="height: 62px;">{!! $product->connect->wifi !!}</li>
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
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- end product digital -->
            </div>
        </div>
        <hr><!-- end detail product info -->
        <div id="detail-product-news">
            <div class="row" style="margin-top: -20px;">
                <div class="col-xs-12 col-sm-12 col-md-8">
                    <div id="baiviet-danhgia">
                      <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-12 product-rate" style="margin-left: -40px;">
                                <input type="checkbox" class="read-more-state" id="post-review" />
                                <ul class="read-more-wrap">
                                    <h3>Đánh giá chi tiết sản phẩm</h3>
                                    <p>{!!$product->description!!} Với thiết kế không quá nhiều thay đổi, vẫn bảo tồn vẻ đẹp truyền thống từ thời iPhone 6 Plus,  iPhone 7 Plus được trang bị nhiều nâng cấp đáng giá như camera kép, đạt chuẩn chống nước chống bụi cùng cấu hình cực mạnh.</p>
                                    <div id="wrapper" style="text-align: center">    
                                        <div id="yourdiv" style="display: inline-block;">
                                            <img style="height: 300px; width: 300px; text-align: center;"src="{!!$product->image!!}">
                                        </div>
                                    </div>
                                    <p class="read-more-target" class="img-responsive">{!!$product->description!!} Với thiết kế không quá nhiều thay đổi, vẫn bảo tồn vẻ đẹp truyền thống từ thời iPhone 6 Plus,  iPhone 7 Plus được trang bị nhiều nâng cấp đáng giá như camera kép, đạt chuẩn chống nước chống bụi cùng cấu hình cực mạnh.</p>
                                </ul>
                                <label for="post-review" class="read-more-trigger" style="margin-left: 40px;"></label>
                          </div>
                      </div>
                    </div>  
                    <hr><!-- end product detail rate -->
                    <div id="danhgia" style="margin-top: -20px;">
                      <div class="row">
                          <div class="col-md-12">
                            <h3>{{$count_vote}} đánh giá {!! $product->name !!}</h3>
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                          </div>
                      </div>
                      <div class="row">
                          <form action="{{url('products/' .$product->slug .'/create-vote')}}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-md-8">
                              <div class="row">
                                <div class="col-md-5">
                                    <p>Chọn đánh giá của bạn</p>
                                </div>
                                <div class="col-md-7" style="margin-left: -200px">
                                  <div class="stars" style="margin-top: 0px; margin-left: 70px;">
                                      <input class="star star-5" id="star-5" type="radio" name="star" value="5" />
                                      <label class="star star-5" for="star-5"></label>
                                      <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
                                      <label class="star star-4" for="star-4"></label>
                                      <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
                                      <label class="star star-3" for="star-3"></label>
                                      <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
                                      <label class="star star-2" for="star-2"></label>
                                      <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
                                      <label class="star star-1" for="star-1"></label>
                                  </div>
                                </div>  
                              </div>  
                              <div class="row">
                                <div class="col-md-12">
                                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <textarea name="comment" style="height: 138px; width: 480px; max-height: 138px; max-width: 480px; border-radius: 5px;" placeholder="Nhập đánh giá về sản phẩm. (Tối thiểu 80 ký tự)">
                                    </textarea>
                                </div>
                              </div>  
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Họ tên (bắt buộc)">
                              </div>
                              <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="Email (bắt buộc)">
                              </div>
                              <div class="form-group">
                                <input type="text" name="phone" class="form-control" placeholder="Số điện thoại (bắt buộc)">
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
                                            <p style="color: orange; float: left;">
                                                <span class="glyphicon glyphicon-star{{ ($i <= $vote->star) ? '' : '-empty'}}">
                                                </span>
                                            </p>
                                        @endfor
                                        <p style="margin-left: 10px;">{{$vote->comment}}</p>
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
                    <hr><!-- end product vote -->
                    <div id="binhluan">
                      <div class="row">
                        <div class="col-md-12">
                          <form action="{{url('products/' .$product->slug .'/create-review')}}" method="post">
                              <div class="row">
                                      <div class="col-md-12">
                                        {{ csrf_field() }}
                                          <input type="hidden" name="product_id" value="{{ $product->id }}">
                                          @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                          <textarea name="comment" style="height: 100px; width: 750px; max-height: 180px; max-width: 750px; border-radius: 5px;" placeholder="Nhập bình luận của bạn. (Tối thiểu 10 ký tự)">
                                          </textarea>
                                      </div>
                              </div>
                              <div class="row">
                                      <div class="col-md-12">
                                        <!-- Button trigger modal -->
                                        <div class="form-group">
                                              <button type="button" class="btn btn-large btn-block btn-primary pull-right" data-toggle="modal" data-target="#exampleModal" style="width: 50px;">
                                                Gửi
                                              </button>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                          <div class="modal-dialog" role="document" style="margin-right: 250px;">
                                            <div class="modal-content" style="width: 350px;">
                                              <div class="modal-header" style="height: 45px;">
                                                <h5 class="modal-title" id="exampleModalLongTitle">THÔNG TIN NGƯỜI GỬI</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute; top: 15px;right: 10px;">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                <div class="form-group">
                                                  <input type="text" name="name" class="form-control" placeholder="Họ tên (bắt buộc)">
                                                </div>
                                                <div class="form-group">
                                                  <input type="text" name="email" class="form-control" placeholder="Email">
                                                </div>
                                                <div class="form-group">
                                                  <input type="text" name="phone" class="form-control" placeholder="Số điện thoại">
                                                </div>
                                                <div class="form-group">
                                                  <button type="submit" class="btn btn-large btn-block btn-primary">
                                                    GỬI BÌNH LUẬN
                                                  </button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                              </div>
                          </form>
                        </div>
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
                          {{$reviews->links()}}
                        </div>
                      </div>
                    </div> 
                </div>
                <!-- end col-md-8 -->
                <div class="col-xs-12 col-sm-12 col-md-4">
                    <div class="col-xs-12 col-sm-12 col-md-12 product-news" style="margin-top: -10px">
                        <h2 style="margin-bottom: -10px"><small>Tin tức mới</small></h2><hr>
                        @foreach($news as $new)
                            <a href="{{url('news/' .$new->slug)}}">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
                                    <div class="bt" style="margin-left: -15px">
                                        <div class="image-m pull-left">
                                            <img style="height: 100px; width: 100px;" class="img-responsive" src="{!!$new->image!!}">
                                        </div>
                                    </div> <!-- /div bt -->
                                    <div class="ct">
                                        <a href="" title="Chi tiết">
                                            <p style="color: #333">{!!$new->description!!}</p>
                                        </a>
                                    </div>
                                </div>
                            </a>    
                        @endforeach
                        <a href="{{url('/news')}}" class="pull-right news">Đọc thêm tin tức</a>
                    </div>    
                        <!-- end product news -->
                        <div class="col-xs-12 col-sm-12 col-md-12 product-similar">
                            <h2 style="margin-bottom: -10px;"><small>Sản phẩm tương tự</small></h2><hr>
                            @foreach($product_sames as $product_same)
                                <a href="{{url('products/' .$product_same->slug)}}">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding" style="margin-left: -15px">
                                        <div class="bt">
                                            <div class="image-m pull-left">
                                                <img style="height: 120px; width: 110px;" class="img-responsive" src="{!!$product_same->image!!}">
                                            </div>
                                        </div> <!-- /div bt -->
                                        <div class="ct" style="width: 400px;">
                                            <h4 style="color: #333">{!! $product_same->name !!}</h4>
                                            <h4 style="color: #d0021b">{!! $product_same->price !!} đ</h4>
                                            <ul type="none" style="color: #666  ">
                                                <li>Màn Hình: {!!$product_same->screen->tech_screen!!}</li>
                                                <li>Camera sau: {!!$product_same->backCamera->resolution!!}</li>
                                                <li>Pin: {!!$product_same->battery->battery_capacity!!} mAh</li>
                                            </ul>
                                        </div>
                                        <a href="{{url('/products/compare/' .$product->slug .'VS' .$product_same->slug)}}" class="pull-right compare">So sánh chi tiết </a>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <!-- end product similar -->
                </div>
                <!-- end col-md-4 -->
            </div>
        </div>
        <hr><!-- end detail product vote, news of product and similar product -->
    @endforeach
</div>
@stop
