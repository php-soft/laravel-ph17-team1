@extends ('admin.layouts.master')
@section ('content')
<div class="row">
  <div class="col-md-12">
    <h2>DANH SÁCH CÁC BÀI ĐÁNH GIÁ</h2>
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="table">
        <tr>
          <th class="text-center">STT</th>
          <th class="text-center">Tên sản phẩm</th>
          <th class="text-center">Tên người dùng</th>
          <th class="text-center">Số điện thoại</th>
          <th class="text-center">Email</th>
          <th class="text-center">Số sao</th>
          <th class="text-center">Bình luận</th>
          <th class="text-center">Xóa</th>
        </tr>
        {{ csrf_field() }}
        <?php $stt=1 ?>

        @foreach ($votes as $vote)
          <tr>
            <td class="text-center">{{ $stt++ }}</td>
            @foreach ($products as $product)
              @if ($vote->product_id == $product->id)
                <td class="text-center">{{ $product->name }}</td>
              @endif  
            @endforeach
            <td class="text-center">{{ $vote->name }}</td>
            <td class="text-center">{{ $vote->phone }}</td>
            <td class="text-center">{{ $vote->email }}</td>
            <td class="text-center">{{ $vote->star }}</td>
            <td class="text-center">{{ $vote->comment }}</td>
            <td class="text-center">
                <a href="{{url('admin/votes/delete/' .$vote->id)}}" class="btn btn-warning" onclick="return confirm('Bạn có muốn xóa đánh giá của {{$vote->name}} không?');">
                  <span class="glyphicon glyphicon-trash"></span>
                  Delete
                </a>
            </td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
@stop