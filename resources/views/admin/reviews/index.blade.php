@extends('admin.layouts.master')

@section ('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 style="text-align: center;">DANH SÁCH CÁC REVIEW</h2><br>
            <table id="myTable" class="display" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th class="text-center">STT</th>
                  <th class="text-center">Tên sản phẩm</th>
                  <th class="text-center">Tên người dùng</th>
                  <th class="text-center">Số điện thoại</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Bình luận</th>
                  <th class="text-center">Xóa</th>
                </tr>
              </thead>
              <tbody>
                  <?php $stt=1; ?>
                  @foreach ($reviews as $review)
                      <tr class="text-center">
                        <td class="text-center">{{ $stt++ }}</td>
                        @foreach ($products as $product)
                          @if ($review->product_id == $product->id)
                            <td>{{ $product->name }}</td>
                          @endif  
                        @endforeach
                        <td>{{ $review->name }}</td>
                        @if (empty($review->phone))
                          <td></td>
                        @else
                          <td>{{$review->phone}}</td>
                        @endif
                        @if (empty($review->email))
                          <td></td>
                        @else
                          <td>{{ $review->email }}</td>  
                        @endif
                        <td>{{ $review->comment }}</td>
                        <td>
                            <a href="{{url('admin/reviews/delete/' .$review->id)}}" class="btn btn-warning" onclick="return confirm('Bạn có muốn xóa đánh giá của {{$review->name}} không?');">
                              <span class="glyphicon glyphicon-trash"></span>
                              Delete
                            </a>
                        </td>
                      </tr>
                    @endforeach
              </tbody>
        </table>
        </div>
    </div>
@stop

@section ('js')
  <script>
    $(document).ready(function(){
        $('#myTable').DataTable({
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        });
    });
  </script>
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
  <script>
    @if (Session::has('message'))
        toastr.success("{{Session::get('message')}}")
    @endif
  </script>
@stop
