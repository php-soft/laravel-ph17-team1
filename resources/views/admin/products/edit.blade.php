@extends('admin.layouts.master')

@section('content')

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
      <form action="{{url('admin/products/update-product/' .$product->id)}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="name">Tên sản phẩm</label>
          <div class="form-formcontrols">
              {!! Form::text('name',$product->name,['class'=>'form-control']) !!}
          </div>
        </div>
        <div class="form-group">
          <label for="color">Màu</label>
          <div class="form-formcontrols">
              {!! Form::select('color', $colors, $product->color_id, ['class'=>'form-control']) !!}
          </div>
        </div>
        <div class="form-group">
            <div class="form-formcontrols">
                <img class="thumbnail" src="{{$product->image}}" style="width: 50px; height: 50px;">
            </div>
        </div>
        <div class="form-group">
            <label for="image">Ảnh</label>
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
          <label for="description">Mô tả sản phẩm</label>
          <textarea style="width: 750px; height: 100px; max-width: 750px; border-radius: 4px;" id="description" name="description">{{$product->description}}
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
        </div>
      </form>
       
    </div>
    <div class="col-md-2">
      
    </div>
  </div>

@stop

@section('js')

    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script>
        @if(Session::has('message'))
            toastr.success("{{Session::get('message')}}")
        @endif
    </script>
@stop