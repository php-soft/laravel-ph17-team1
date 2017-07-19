@extends ('layouts.app')

@section ('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/rating5star.css') }}">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('css/seemore.css') }}">
<link rel="stylesheet" href="{{ asset('css/detail-product.css') }}">
<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

@stop

@section ('content')
<div class="container">
    @foreach($products as $product)
        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">Thông số kỹ thuật chi tiết {{$product->name}}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div id="wrapper">    
                            <div id="yourdiv">
                                <img src="{!!$product->image!!}">
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 modal-detail">
                      <div class="detail">
                        <div class="product-details">
                          <ul class="list-group">
                            <li class="col-md-12 list-group-item disabled">Màn hình</li>
                            <li class="col-md-4 list-group-item">Công nghệ màn hình</li>
                            <li class="col-md-8 list-group-item">{!! $product->screen->technology !!}</li>
                            <li class="col-md-4 list-group-item">Độ phân giải</li>
                            <li class="col-md-8 list-group-item">{!! $product->screen->resolution !!}</li>
                            <li class="col-md-4 list-group-item">Màn hình rộng</li>
                            <li class="col-md-8 list-group-item">{!! $product->screen->width !!}</li>
                            <li class="col-md-4 list-group-item">Mặt kính cảm ứng</li>
                            <li class="col-md-8 list-group-item">{!! $product->screen->touch!!}</li>
                            <li class="col-md-12 list-group-item disabled">Camera sau</li>
                            <li class="col-md-4 list-group-item">Độ phân giải</li>
                            @if(!empty($product->backCamera->resolution2))
                                @if($product->backCamera->resolution2 == $product->backCamera->resolution1)
                                    <li class="col-md-8 list-group-item">Camera kép {{$product->backCamera->resolution1}} MP</li>
                                @else
                                    <li class="col-md-8 list-group-item">2 camera {{$product->backCamera->resolution1}} MP và {{$product->backCamera->resolution2}} MP</li>
                                @endif    
                            @else
                                <li class="col-md-8 list-group-item">{{$product->backCamera->resolution1}} MP</li>
                            @endif
                            <li class="col-md-4 list-group-item">Quay phim</li>
                            <li class="col-md-8 list-group-item">{!! $product->backCamera->film !!}</li>
                            <li class="col-md-4 list-group-item">Đèn flash</li>
                            <li class="col-md-8 list-group-item">{!! $product->backCamera->flash !!}</li>
                            <li class="col-md-4 list-group-item chupanh">Chụp ảnh nâng cao</li>
                            <li class="col-md-8 list-group-item chupanh">{!! $product->backCamera->advanced !!}</li>
                            <li class="col-md-12 list-group-item disabled">Camera trướt</li>
                            <li class="col-md-4 list-group-item">Độ phân giải</li>
                            @if(!empty($product->frontCamera->resolution2))
                                @if($product->frontCamera->resolution2 == $product->frontCamera->resolution1)
                                    <li class="col-md-8 list-group-item">Camera kép {{$product->frontCamera->resolution1}}</li>
                                @else
                                    <li class="col-md-8 list-group-item">2 camera {{$product->frontCamera->resolution1}} MP và {{$product->frontCamera->resolution2}} MP</li>
                                @endif    
                            @else
                                <li class="col-md-8 list-group-item">{{$product->frontCamera->resolution1}} MP</li>
                            @endif
                            <li class="col-md-4 list-group-item">Video call</li>
                            @if($product->frontCamera->videocall == 1)
                                <li class="col-md-8 list-group-item">Có</li>
                            @else
                                <li class="col-md-8 list-group-item">Không</li>
                            @endif
                            <li class="col-md-4 list-group-item info-khac">Thông tin khác</li>
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
                            <li class="col-md-8 list-group-item">{!! $product->connect->network !!}</li>
                            <li class="col-md-4 list-group-item">SIM</li>
                            <li class="col-md-8 list-group-item">{!! $product->connect->sim !!}</li>
                            <li class="col-md-4 list-group-item info-khac">Wifi</li>
                            <li class="col-md-8 list-group-item info-khac">{!! $product->connect->wifi !!}</li>
                            <li class="col-md-4 list-group-item">GPS</li>
                            <li class="col-md-8 list-group-item">{!! $product->connect->gps !!}</li>
                            <li class="col-md-4 list-group-item">Bluetooth</li>
                            <li class="col-md-8 list-group-item">{!! $product->connect->bluetooth !!}</li>
                            <li class="col-md-4 list-group-item">Cổng kết nối/sạc</li>
                            <li class="col-md-8 list-group-item">{!! $product->connect->port !!}</li>
                            <li class="col-md-4 list-group-item">Jack tai nghe</li>
                            <li class="col-md-8 list-group-item">{!! $product->connect->jack !!}</li>
                            <li class="col-md-4 list-group-item">Kết nối khác</li>
                            <li class="col-md-8 list-group-item">{!! $product->connect->other !!}</li>
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
                            <li class="col-md-8 list-group-item">{!! $product->battery->capacity !!}</li>
                            <li class="col-md-4 list-group-item">Loại pin</li>
                            <li class="col-md-8 list-group-item">{!! $product->battery->type !!}</li>
                            <li class="col-md-4 list-group-item">Công nghệ pin</li>
                            <li class="col-md-8 list-group-item">{!! $product->battery->technology !!}</li>
                            <li class="col-md-12 list-group-item disabled">Tiện ích</li>
                            <li class="col-md-4 list-group-item">Bảo mật nâng cao</li>
                            <li class="col-md-8 list-group-item">{!! $product->utility->security !!}</li>
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
        <div id="detail-product-title">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <h3 class="panel-title">
                        <a href="{!!url('/')!!}" title="">Trang chủ</a>
                        <span class="glyphicon glyphicon-menu-right"></span>
                        <a href="{!!url('products')!!}" title=""> Điện thoại</a>
                        <span class="glyphicon glyphicon-menu-right"></span>
                        <a href="{{url('products/dtdd/' .$product->manufactory->name)}}">{!! $product->manufactory->name !!}</a>
                    </h3>
                </div>
            </div>
            <!-- end breadcrumb -->
            <div class="row">
                <div class="rowtop">
                    <div class="col-xs-12 col-sm-12 col-md-8 product-name">
                        <h3>Điện thoại {!! $product->name !!}</h3>
                        <p>
                            @for ($i=1; $i <= 5 ; $i++)
                                <span class="glyphicon glyphicon-star{{ ($i <= $avgvote) ? '' : '-empty'}}"></span>
                            @endfor
                            <a href="#review">{{$count_vote}} đánh giá</a>
                        </p>
                    </div>
                    <!-- end product name -->
                    <div class="col-xs-12 col-sm-12 col-md-4 like-share">
                        <p>
                            <a href=""><span class="label label-primary"><i class="fa fa-facebook color-facebook"></i> Like</span></a>
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
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            @if($product->sale_price === null)
                                <h2>{!! number_format($product->price) !!} đ</h2>
                            @else 
                                <h2>{!! number_format($product->sale_price) !!} đ</h2>
                            @endif
                            @if($product->sale_price !== null)
                                <p>
                                    <label class="label label-warning">Đã giảm {!! number_format(round((($product->price-$product->sale_price)/$product->price)*100, 2), 2) !!} %</label>
                                </p>
                            @endif
                        </div>
                    </div>
                    <!-- end show price -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 promotion-info">
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
                        <div class="col-xs-12 col-sm-12 col-md-12 accessory-info">
                            <div class="panel panel-info">
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
                        <div class="col-xs-12 col-sm-12 col-md-12 btn-buy">
                            @if ($product->status == 1)
                                <a href="{{ url('them-gio-hang/' .$product->id) }}" class="btn btn-large btn-block btn-primary">MUA NGAY</a>
                            @elseif ($product->status == 2)
                                <a class="btn btn-large btn-block btn-primary disabled">Tạm hết hàng</a>
                            @else
                                <a class="btn btn-large btn-block btn-primary disabled">Hàng sắp về</a>
                            @endif
                        </div>
                    </div>
                    <br> <!-- end btn order -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 store-info">
                            <div class="panel panel-info">
                                <div class="panel-heading">
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
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="table-responsive">
                                <table class="table table-hover config-product">
                                  <thead>
                                    <tr>
                                      <th colspan="2"><h4>CẤU HÌNH CHI TIẾT SẢN PHẨM</h4></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>Màn hình</td>
                                      <td>{!! $product->screen->technology !!}, {!! $product->screen->width !!}, {!! $product->screen->resolution !!}</td>
                                    </tr>
                                    <tr>
                                      <td>Hệ điều hành</td>
                                      <td>{!! $product->operaSystem->opera_system !!}</td>
                                    </tr>
                                    <tr>
                                      <td>Camera trước</td>
                                        <td><p>{{$product->frontCamera->resolution}} MP</p>
                                    </tr>
                                    <tr>
                                      <td>Camera sau</td>
                                        @if(!empty($product->backCamera->resolution2))
                                            @if($product->backCamera->resolution2 == $product->backCamera->resolution1)
                                                <td><p>Camera kép {{$product->backCamera->resolution1}} MP</p></td>
                                            @else
                                                <td><p>2 Camera {{$product->backCamera->resolution1}} MP và {{$product->backCamera->resolution2}} MP</p></td>
                                            @endif    
                                        @else
                                            <td><p>{{$product->backCamera->resolution1}} MP</p></td>
                                        @endif
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
                                      <td>{!! $product->battery->capacity !!} mAh</td>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>    
                        </div>
                    </div>
                    <!-- end detail digital -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-block btn-primary btn-view" data-toggle="modal" data-target="#exampleModalLong">
                      Xem chi tiết
                    </button>

                </div>
                <!-- end product digital -->
            </div>
        </div>
        <hr><!-- end detail product info -->
        <div id="detail-product-news">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8">
                    <div id="baiviet-danhgia">
                      <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-12 product-rate">
                                <input type="checkbox" class="read-more-state" id="post-review" />
                                <ul class="read-more-wrap">
                                    <h3>Đánh giá chi tiết sản phẩm</h3>
                                    <p>{!!$product->description!!} Với thiết kế không quá nhiều thay đổi, vẫn bảo tồn vẻ đẹp truyền thống từ thời iPhone 6 Plus,  iPhone 7 Plus được trang bị nhiều nâng cấp đáng giá như camera kép, đạt chuẩn chống nước chống bụi cùng cấu hình cực mạnh.</p>
                                    <div id="wrapper">    
                                        <div id="yourdiv">
                                            <img src="{!!$product->image!!}">
                                        </div>
                                    </div>
                                    <p class="read-more-target" class="img-responsive">{!!$product->description!!} Với thiết kế không quá nhiều thay đổi, vẫn bảo tồn vẻ đẹp truyền thống từ thời iPhone 6 Plus,  iPhone 7 Plus được trang bị nhiều nâng cấp đáng giá như camera kép, đạt chuẩn chống nước chống bụi cùng cấu hình cực mạnh.</p>
                                </ul>
                                <label for="post-review" class="read-more-trigger"></label>
                          </div>
                      </div>
                    </div>  
                    <hr><!-- end product detail rate -->
                    <div id="ketqua-danhgia">
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
                                @if ($login == 1)
                                    @foreach ($users as $user)
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Họ tên (bắt buộc)" disabled>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control" value="{{ $user->email }}" placeholder="Email (bắt buộc)" disabled>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" class="form-control" value="{{ $user->phonenumber }}" placeholder="Số điện thoại (bắt buộc)" disabled>
                                        </div>
                                    @endforeach
                                @else ($login ==1)
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Họ tên (bắt buộc)">
                                      </div>
                                      <div class="form-group">
                                        <input type="text" name="email" class="form-control" placeholder="Email (bắt buộc)">
                                      </div>
                                      <div class="form-group">
                                        <input type="text" name="phone" class="form-control" placeholder="Số điện thoại (bắt buộc)">
                                      </div>      
                                @endif
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
                    <hr><!-- end product vote -->
                    <div id="binhluan">
                        <div class="row">
                            <div class="col-md-12 form-comment">
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
                                            <textarea name="comment" placeholder="Nhập bình luận của bạn. (Tối thiểu 10 ký tự)">
                                            </textarea>
                                        </div>   
                                    </div>
                                    @if ($login == 1)
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary pull-right">GỬI BÌNH LUẬN</button>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group btn-send-comment">
                                                    <button type="button" class="btn btn-large btn-block btn-primary pull-right" data-toggle="modal" data-target="#comment">
                                                    Gửi
                                                    </button>
                                                </div>
                                                <div class="modal fade" id="comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">THÔNG TIN NGƯỜI GỬI</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                    <button type="submit" class="btn btn-large btn-block btn-primary">GỬI BÌNH LUẬN</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>     
                                    @endif
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
                <div class="col-xs-12 col-sm-12 col-md-4 tintuc-lienquan">
                    <div class="col-xs-12 col-sm-12 col-md-12 news-lienquan">
                        <h2><small>Tin tức mới</small></h2><hr>
                        @foreach($news as $new)
                            <a href="{{url('news/' .$new->slug)}}">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
                                    <div class="bt">
                                        <div class="image-m pull-left">
                                            <img class="img-responsive" src="{{url('uploads/news/'.$new->image)}}">
                                        </div>
                                    </div> <!-- /div bt -->
                                    <div class="ct">
                                        <a href="" title="Chi tiết">
                                            <p>{!!$new->description!!}</p>
                                        </a>
                                    </div>
                                </div>
                            </a>    
                        @endforeach
                        <a href="{{url('/news')}}" class="pull-right">Đọc thêm tin tức</a>
                    </div>    
                    <!-- end product news -->
                    <div class="col-xs-12 col-sm-12 col-md-12 product-similar">
                        <h2><small>Sản phẩm tương tự</small></h2><hr>
                        @foreach($product_sames as $product_same)
                            <a href="{{url('products/' .$product_same->slug)}}">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
                                    <div class="bt">
                                        <div class="image-m pull-left">
                                            <img class="img-responsive" src="{!!$product_same->image!!}">
                                        </div>
                                    </div> <!-- /div bt -->
                                    <div class="ct">
                                        <h4 class="same-name">{!! $product_same->name !!}</h4>
                                        @if($product_same->sale_price === null)
                                            <h4 class="same-price">{!! number_format($product_same->price) !!} đ</h4>
                                        @else 
                                            <h4 class="same-price">{!! number_format($product_same->sale_price) !!} đ</h4>
                                        @endif
                                        <ul type="none">
                                            <li>Màn Hình: {!!$product_same->screen->technology!!}</li>
                                            @if(!empty($product_same->backCamera->resolution2))
                                                @if($product_same->backCamera->resolution2 == $product_same->backCamera->resolution1)
                                                    <li>Camera kép: {{$product_same->backCamera->resolution1}} MP</li>
                                                @else
                                                    <li>2 Cameera: {{$product_same->backCamera->resolution1}} MP và {{$product_same->backCamera->resolution2}} MP</li>
                                                @endif    
                                            @else
                                                <li>Camera sau: {{$product_same->backCamera->resolution1}} MP</li>
                                            @endif
                                            <li>Pin: {!!$product_same->battery->capacity!!} mAh</li>
                                        </ul>
                                    </div>
                                    <a href="{{url('/products/compare/' .$product->slug .'VS' .$product_same->slug)}}" class="pull-right">So sánh chi tiết </a>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <!-- end col-md-4 -->
            </div>
        </div>
        <hr><!-- end detail-product-news -->
    @endforeach
</div>
@stop

@section ('js')
<script src="{{asset('js/toastr.min.js')}}"></script>
<script>
    @if(Session::has('message'))
        toastr.success("{{Session::get('message')}}")
    @endif
</script>
@stop
