@extends('admin.layouts.master')

@section ('css')
<script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
@stop

@section('content')  
  <div class="row">
    <div class="col-md-2">   
    </div>
    <div class="col-md-8">
      @if (count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
      <form action="{{url('admin/products/update/' .$product->id)}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="name">Tên sản phẩm</label>
          <div class="form-formcontrols">
              {!! Form::text('name', $product->name,['class'=>'form-control']) !!}
          </div>
        </div>
        <div class="form-group">
          <label for="color">Màu</label>
          <div class="form-formcontrols">
              {!! Form::select('color', $colors, $product->color_id, ['class'=>'form-control']) !!}
          </div>
        </div>
        <div class="form-group">
            <label for="image">Ảnh</label>
            <input type="hidden" name="img" value="{{$product->image}}">
            <img class="thumbnail" src="{{$product->image}}" style="width: 100px; height: 100px;">
            <input type="file" name="image" id="image">
        </div>
        <div class="form-group">
          <label for="price">Giá</label>
          <input type="text" class="form-control" id="price" name="price" value="{{$product->price}}">
        </div>
        <div class="form-group">
          <label for="sale_price">Giá khuyến mãi</label>
          <input type="text" class="form-control" id="sale_price" name="sale_price" value="{{$product->sale_price}}">
        </div>
        <div class="form-group">
          <label for="manufactory">Hãng sản xuất</label>
          <div class="form-formcontrols">
              {!! Form::select('manufactory', $manus, $product->manufactory_id, ['class'=>'form-control']) !!}
          </div>
        </div>
        <div class="form-group">
          <label for="editor1">Mô tả sản phẩm</label>
          <textarea name="editor1" style="width: 750px; height: 100px; max-width: 750px; border-radius: 4px;">{{ $product->description }}</textarea>
          <script>
              CKEDITOR.replace( 'editor1' );
          </script>
        </div>
        <div class="form-group">
          <label for="status">Tình trạng</label>
          @if ($product->status == 1)
          <div class="radio">
            <label><input type="radio" name="status" value="1" checked>Có hàng</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="status" value="2">Hết hàng</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="status" value="3">Hàng sắp về</label>
          </div>
          @elseif ($product->status == 2)
          <div class="radio">
            <label><input type="radio" name="status" value="1">Có hàng</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="status" value="2" checked>Hết hàng</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="status" value="3">Hàng sắp về</label>
          </div>
          @else
          <div class="radio">
            <label><input type="radio" name="status" value="1">Có hàng</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="status" value="2">Hết hàng</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="status" value="3" checked>Hàng sắp về</label>
          </div>
          @endif
        </div>
        <div class="form-group">
          <label for="accessory">Phụ kiện</label>
          <input type="text" class="form-control" id="accessory" name="accessory" value="Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim">
        </div>
        <div class="form-group">
          <label for="warranty_moth">Thời gian bảo hành</label>
          @if ($product->warranty_moth == '12 tháng')
          <div class="radio">
            <label><input type="radio" name="warranty_moth" value="12" checked>12 tháng</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="warranty_moth" value="24">24 tháng (Bảo hành vàng )</label>
          </div>
          @else
          <div class="radio">
            <label><input type="radio" name="warranty_moth" value="12">12 tháng</label>
          </div>
          <div class="radio">
            <label><input type="radio" name="warranty_moth" value="24" checked>24 tháng (Bảo hành vàng )</label>
          </div>
          @endif
        </div>
        <div class="form-group">
          <label for="category">Danh mục</label>
          <div class="form-formcontrols">
            <div class="checkbox">
              <label><input type="checkbox" name="category1" value="1">Smart Phone</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" name="category2" value="2">Classic Phone</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" name="category3" value="3">Android</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" name="category4" value="4">iPhone(IOS)</label>
            </div>
          </div>
          
        </div>
        <div class="form-group">
          <label for="backcamera">Camera sau</label>
          <div class="form-formcontrols">
              {!! Form::select('backcamera', $backs, $product->back_camera_id, ['class'=>'form-control']) !!}
          </div>
        </div>
        <div class="form-group">
          <label for="frontcamera">Camera trướt</label>
          <div class="form-formcontrols">
              {!! Form::select('frontcamera', $fronts, $product->front_camera_id, ['class'=>'form-control']) !!}
          </div>
        </div>        
        <div class="form-group">
          <label for="battery">Thời lượng pin</label>
          <div class="form-formcontrols">
              {!! Form::select('battery', $batteries, $product->battery_id, ['class'=>'form-control']) !!}
          </div>
        </div>
        <div class="form-group">
          <label for="connect">Kết nối</label>
          <div class="form-formcontrols">
              {!! Form::select('connect', $connects, $product->connect_id, ['class'=>'form-control']) !!}
          </div>
        </div>
        <div class="form-group">
          <label for="memory">Bộ nhớ</label>
          <div class="form-formcontrols">
              {!! Form::select('memory', $memories, $product->memory_id, ['class'=>'form-control']) !!}
          </div>
        </div>
        <div class="form-group">
          <label for="design">Thiết kế</label>
          <div class="form-formcontrols">
              {!! Form::select('design', $designs, $product->design_id, ['class'=>'form-control']) !!}
          </div>
        </div>
        <div class="form-group">
          <label for="operasystem">Hệ điều hành</label>
          <div class="form-formcontrols">
              {!! Form::select('operasystem', $operas, $product->opera_system_id, ['class'=>'form-control']) !!}
          </div>
        </div>
        <div class="form-group">
          <label for="screen">Màn hình</label>
          <div class="form-formcontrols">
              {!! Form::select('screen', $screens, $product->screen_id, ['class'=>'form-control']) !!}
          </div>
        </div>
        <div class="form-group">
          <label for="utility">Chức năng đặc biệt</label>
          <div class="form-formcontrols">
              {!! Form::select('utility', $utilities, $product->utility_id, ['class'=>'form-control']) !!}
          </div>
        </div>        
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Lưu</button>
          <button type="reset" class="btn btn-default" value="Reset">Reset</button>
          <a href="{{ url('admin/products') }}" class="btn btn-success">Quay lại</a>
        </div>
      </form>      
    </div>
    <div class="col-md-2">     
    </div>
  </div>
@stop

@section('js')

@stop