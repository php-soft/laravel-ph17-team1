@extends('admin.layouts.master')

@section('content')
<meta name="_token" content="{!! csrf_token() !!}">

<style>
  .dataTables_length{
    margin-right: 390px;
  }
  .dataTables_info{
    margin-left: -290px;
  }
</style>
    <div class="row">
      <div class="col-md-12"> 
        @if (count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#product" style="margin-right: 520px;">Thêm sản phẩm</button>
        <div id="product" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm sản phẩm</h4>
              </div>
              <div class="modal-body">
                <form action="{{url('admin/products/new-product')}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <div class="form-group">
                    <label for="name">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Tên sản phẩm">
                  </div>
                  <div class="form-group">
                    {!! Form::label('color', 'Màu') !!}
                    <div class="form-formcontrols">
                        {!! Form::select('color',$colors_add,null,['class'=>'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="image">Ảnh</label>
                      <input type="file" name="image" id="image">
                  </div>
                  <div class="form-group">
                    <label for="price">Giá</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Nhập Giá">
                  </div>
                  <div class="form-group">
                    <label for="sale_price">Giá khuyến mãi</label>
                    <input type="text" class="form-control" id="sale_price" name="sale_price" placeholder="Nhập giá khuyến mãi">
                  </div>
                  <div class="form-group">
                    {!! Form::label('manufactory', 'Hãng sản xuất') !!}
                    <div class="form-formcontrols">
                        {!! Form::select('manufactory',$manus_add,null,['class'=>'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="description">Mô tả sản phẩm</label>
                    <textarea style="width: 568px; height: 100px; max-width: 568px; border-radius: 4px;" id="description" name="description" placeholder="Mô tả sản phẩm">
                    </textarea>
                  </div>
                  <div class="form-group">
                    <label for="accessory">Phụ kiện</label>
                    <input type="text" class="form-control" id="accessory" name="accessory" value="Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim">
                  </div>
                  <div class="form-group">
                    <label for="warranty_moth">Thời gian bảo hành</label>
                    <div class="radio">
                      <label><input type="radio" name="warranty_moth" value="12" checked>12 tháng</label>
                    </div>
                    <div class="radio">
                      <label><input type="radio" name="warranty_moth" value="24">24 tháng (Bảo hành vàng )</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="category">Danh mục</label>
                    <div class="form-formcontrols">
                      <div class="checkbox">
                        <label><input type="checkbox" name="category" value="1" checked>Smart Phone</label>
                      </div>
                      <div class="checkbox">
                        <label><input type="checkbox" name="category" value="2">Classic Phone</label>
                      </div>
                      <div class="checkbox">
                        <label><input type="checkbox" name="category" value="3" >Android</label>
                      </div>
                      <div class="checkbox">
                        <label><input type="checkbox" name="category" value="4" >iPhone(IOS)</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    {!! Form::label('backcamera', 'Camera sau') !!}
                    <div class="form-formcontrols">
                        {!! Form::select('backcamera',$backs_add,null,['class'=>'form-control']) !!}
                    </div>  
                  </div>
                  <div class="form-group">
                    {!! Form::label('frontcamera', 'Camera trướt') !!}
                    <div class="form-formcontrols">
                        {!! Form::select('frontcamera',$fronts_add,null,['class'=>'form-control']) !!}
                    </div>
                  </div>
                  
                  <div class="form-group">
                    {!! Form::label('battery', 'DUng lượng pin') !!}
                    <div class="form-formcontrols">
                        {!! Form::select('battery',$batteries_add,null,['class'=>'form-control']) !!}
                    </div>
                  </div>

                  <div class="form-group">
                    {!! Form::label('connect', 'Kết nối mạng') !!}
                    <div class="form-formcontrols">
                        {!! Form::select('connect',$connects_add,null,['class'=>'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    {!! Form::label('memory', 'Bộ nhớ') !!}
                    <div class="form-formcontrols">
                        {!! Form::select('memory',$memories_add,null,['class'=>'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    {!! Form::label('design', 'Thiết kế') !!}
                    <div class="form-formcontrols">
                        {!! Form::select('design',$designs_add,null,['class'=>'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    {!! Form::label('operasystem', 'HDH') !!}
                    <div class="form-formcontrols">
                        {!! Form::select('operasystem',$operas_add,null,['class'=>'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    {!! Form::label('screen', 'Màn hình') !!}
                    <div class="form-formcontrols">
                        {!! Form::select('screen',$screens_add,null,['class'=>'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    {!! Form::label('utility', 'Chức năng đặc biệt') !!}
                    <div class="form-formcontrols">
                        {!! Form::select('utility',$utilities_add,null,['class'=>'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                  </div>
                </form>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="table-responsive text-center">
          <table class="table table-borderless" style="overflow-x:auto;" id="table">
            <thead>
              <tr>
                <th class="text-center">STT</th>
                <th class="text-center">Tên sản phẩm</th>
                <th class="text-center">Màu</th>
                <th class="text-center">Hãng</th>
                <th class="text-center">Slug</th>
                <th class="text-center">Giá</th>
                <th class="text-center">Giá KM</th>
                <th class="text-center">Mô tả</th>
                <th class="text-center">Ảnh</th>
                <th class="text-center">Phụ kiện</th>
                <th class="text-center">Bảo hành</th>
                <th class="text-center">Danh mục</th>
                <th class="text-center">Camera trướt</th>
                <th class="text-center">Camera sau</th>
                <th class="text-center">Pin</th>
                <th class="text-center">Kết nối mạng - Sim</th>
                <th class="text-center">Wifi</th>
                <th class="text-center">GPS</th>
                <th class="text-center">Loại kết nối</th>
                <th class="text-center">Bộ nhớ</th>
                <th class="text-center">Thiết kế</th>
                <th class="text-center">Kích thướt</th>
                <th class="text-center">HDH</th>
                <th class="text-center">Chip xử lý</th>
                <th class="text-center">Màn hình</th>
                <th class="text-center">Tính năng chính</th>
                <th class="text-center">Tính năng phụ</th>
              </tr>
            </thead>
            <tbody>
              <?php $stt=1; ?>
              {{ csrf_field() }}
              @foreach($products as $key => $product)
              <tr>
                <td><p>{{$stt++}}</p>
                  <a href="{{url('admin/products/edit-product/' .$product->id)}}" class="btn btn-danger">Sửa</a><br><br>
                    <a href="{{url('admin/products/delete-product', $product->id)}}" class="btn btn-warning" onclick="return confirm('Bạn có muốn xóa sản phẩm {{$product->name}} không?');">
                      <span class="glyphicon glyphicon-trash"></span>
                      Delete
                    </a>
                </td>
                <td>{{$product->name}}</td>
                <td>{{$product->color->name}}</td>
                <td>{{$product->manufactory->name}}</td>
                <td>{{$product->slug}}</td>
                <td>{{number_format($product->price)}} đ</td>
                @if(empty($product->sale_price))
                  <td> đ</td>
                @else  
                  <td>{{number_format($product->sale_price)}} đ</td>
                @endif  
                <td>{{$product->description}}</td>
                <td><img src="{!!$product->image!!}" class="thumbnail" height="100" width="auto"></td>
                <td>{{$product->accessory}}</td>
                <td>{{$product->warranty_moth}} tháng</td>
                <td>
                @foreach($cates as $cate)
                  <p>{{$cate}}</p>
                @endforeach
                </td>
                
                <td>
                  @if(empty($product->frontCamera->resolution2))
                  <p>{{$product->frontCamera->resolution1}} MP</p>
                  @else
                  <p>{{$product->frontCamera->resolution1}} MP</p>
                  <p>{{$product->frontCamera->resolution2}} MP</p>
                  @endif
                </td>
                <td>
                  @if(empty($product->backCamera->resolution2))
                  <p>{{$product->backCamera->resolution1}} MP</p>
                  @else
                  <p>{{$product->backCamera->resolution1}} MP</p>
                  <p>{{$product->backCamera->resolution2}} MP</p>
                  @endif
                </td>
                <td>
                  <p>{{$product->battery->battery_capacity}}</p>
                  <p>{{$product->battery->battery_type}}</p>
                  <p>{{$product->battery->battery_tech}}</p>
                </td>
                <td>
                  <p>{{$product->connect->network_mobile}}</p>
                  <p>{{$product->connect->sim}}</p>
                </td>
                <td><p>{{$product->connect->wifi}}</p></td>
                <td>
                  <p>{{$product->connect->gps}}</p>
                  <p>{{$product->connect->bluetooth}}</p>
                </td>
                <td>
                  <p>{{$product->connect->connect_port}}</p>
                  <p>{{$product->connect->jack_phone}}</p>
                  <p>{{$product->connect->other_connect}}</p>
                </td>
                <td>
                  <p>{{$product->memory->ram}} GB</p>
                  <p>{{$product->memory->rom}} GB</p>
                  <p>{{$product->memory->available_memory}} GB</p>
                  <p>{{$product->memory->external_memory_card}} GB</p>
                </td>
                <td>
                  <p>{{$product->design->design}}</p>
                  <p>{{$product->design->material}}</p>
                </td>
                <td>
                  <p>{{$product->design->size}}</p>
                  <p>{{$product->design->weigth}}</p>
                </td>
                <td>
                  <p>{{$product->operaSystem->opera_system}}</p>
                  <p>{{$product->operaSystem->chipset}}</p>
                </td>
                <td>
                  <p>{{$product->operaSystem->cpu_speed}}</p>
                  <p>{{$product->operaSystem->cpu}}</p> </td>
                <td>
                  <p>{{$product->screen->tech_screen}}</p>
                  <p>{{$product->screen->resolution}}</p>
                  <p>{{$product->screen->width_screen}}</p>
                  <p>{{$product->screen->touch_screen}}</p>
                </td>
                <td>
                  <p>{{$product->utility->advanced_security}}</p>
                  <p>{{$product->utility->special_function}}</p>

                </td>
                <td>
                  <p>{{$product->utility->recording}}</p>
                  <p>{{$product->utility->radio}}</p>
                  <p>{{$product->utility->movie}}</p>
                  <p>{{$product->utility->music}}</p>
                </td>
                
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
@stop

@section('js')
  
    <script src="//code.jquery.com/jquery-1.12.3.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script
      src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet"
      href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <script
      src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>  
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script>
        @if(Session::has('message'))
            toastr.success("{{Session::get('message')}}")
        @endif
    </script>
    <script>
      $(document).ready(function() {
        $('#table').DataTable( {
            "lengthMenu": [[1, 2, 5, 10, 25, 50, -1], [1, 2, 5, 10, 25, 50, "All"]],
        } );
    } );
    </script>
@stop
