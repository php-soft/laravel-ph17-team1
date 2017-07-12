<div id="product" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <form action="{{url('products/save')}}">
          <div class="form-group">
            <label for="name">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name" placeholder="Tên sản phẩm">
          </div>
          <div class="form-group">
            <label for="color">Màu</label>
            <select class="form-control" id="color">
              @foreach($colors as $color)
              <option>{{$color->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="img">Ảnh</label>
            <input type="file" class="form-control-file" id="img">
          </div>
          <div class="form-group">
            <label for="price">Giá</label>
            <input type="text" class="form-control" id="price" placeholder="Nhập Giá">
          </div>
          <div class="form-group">
            <label for="sale_price">Giá khuyến mãi</label>
            <input type="text" class="form-control" id="sale_price" placeholder="Nhập giá khuyến mãi">
          </div>
          <div class="form-group">
            <label for="manufactory">Hãng sản xuất</label>
            <select class="form-control" id="manufactory">
              @foreach($manus as $manu)
              <option>{{$manu->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="description">Mô tả sản phẩm</label>
            <textarea style="width: 750px; height: 100px; max-width: 750px; border-radius: 4px;" id="description"; placeholder="Mô tả sản phẩm">
            </textarea>
          </div>
          <div class="form-group">
            <label for="accessory">Phụ kiện</label>
            <input type="text" class="form-control" id="accessory" value="Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim">
          </div>
          <div class="form-group">
            <label for="warranty_moth">Thời gian bảo hành</label>
            <select class="form-control" id="warranty_moth">
              <option>12 tháng</option>
              <option>15 tháng</option>
              <option>24 tháng</option>
            </select>
          </div>
          
          
          <div class="form-group">
            <label for="category">Danh mục</label>
            <select class="form-control" id="category">
              @foreach($cates as $cate)
              <option>{{$cate->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="backcamera">Camera sau</label>
            <select class="form-control" id="backcamera">
              @foreach($backs as $back)
              <option>{{$back->resolution1}} MP</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="frontcamera">Camera trướt</label>
            <select class="form-control" id="frontcamera">
              @foreach($fronts as $front)
              <option>{{$front->resolution1}} MP</option>
              @endforeach
            </select>
          </div>
          
          <div class="form-group">
            <label for="battery">Pin</label>
            <select class="form-control" id="battery">
              @foreach($batteries as $battery)
              <option>{{$battery->battery_capacity}} mAh</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="connect">Kết nối mạng</label>
            <select class="form-control" id="connect">
              @foreach($connects as $connect)
              <option>{{$connect->network_mobile}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="memory">Bộ nhớ</label>
            <select class="form-control" id="memory">
              @foreach($memories as $memory)
              <option>{{$memory->ram}} GB</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="design">Thiết kế</label>
            <select class="form-control" id="design">
              @foreach($designs as $design)
              <option>{{$design->design}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="operasystem">Hệ điều hành</label>
            <select class="form-control" id="operasystem">
              @foreach($operas as $opera)
              <option>{{$opera->opera_system}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="screen">Ðộ phân giải màn hình</label>
            <select class="form-control" id="screen">
              @foreach($screens as $screen)
              <option>{{$screen->resolution}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="utility">Chức năng đặc biệt</label>
            <select class="form-control" id="utility">
              @foreach($utilities as $utility)
              <option>{{$utility->advanced_security}}</option>
              @endforeach
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Lưu</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>