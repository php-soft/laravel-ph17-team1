@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>DANH SÁCH CÁC REVIEW</h2>
            <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover" id="table">
                    <tr>
                      <th class="text-center">STT</th>
                      <th class="text-center">Tên sản phẩm</th>
                      <th class="text-center">Tên người dùng</th>
                      <th class="text-center">Số điện thoại</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Bình luận</th>
                      <th class="text-center">Xóa</th>
                    </tr>
                    {{ csrf_field() }}
                    <?php $stt=1 ?>

                    @foreach ($reviews as $review)
                      <tr>
                        <td class="text-center">{{ $stt++ }}</td>
                        @foreach ($products as $product)
                          @if ($review->product_id == $product->id)
                            <td class="text-center">{{ $product->name }}</td>
                          @endif  
                        @endforeach
                        <td class="text-center">{{ $review->name }}</td>
                        @if (empty($review->phone))
                          <td class="text-center"></td>
                        @else
                          <td class="text-center">{{$review->phone}}</td>
                        @endif
                        @if (empty($review->email))
                          <td class="text-center"></td>
                        @else
                          <td class="text-center">{{ $review->email }}</td>  
                        @endif
                        <td class="text-center">{{ $review->comment }}</td>
                        <td class="text-center">
                            <a href="{{route('reviewdelete', $review->id)}}" class="btn btn-warning" onclick="return confirm('Bạn có muốn xóa đánh giá của {{$review->name}} không?');">
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