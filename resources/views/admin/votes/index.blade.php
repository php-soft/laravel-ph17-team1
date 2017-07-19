@extends ('admin.layouts.master')

@section ('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@stop

@section ('content')
<div class="row">
  <div class="col-md-12">
    <h2 style="text-align: center;">DANH SÁCH CÁC BÀI ĐÁNH GIÁ</h2><br>
    <table id="myTable" class="display" cellspacing="0" width="100%">
        <thead>
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
        </thead>
        <tbody>
            <?php $stt=1; ?>
            @foreach ($votes as $vote)
            <tr class="text-center">
              <td>{{ $stt++ }}</td>
              @foreach ($products as $product)
                @if ($vote->product_id == $product->id)
                  <td>{{ $product->name }}</td>
                @endif  
              @endforeach
              <td>{{ $vote->name }}</td>
              <td>{{ $vote->phone }}</td>
              <td>{{ $vote->email }}</td>
              <td>{{ $vote->star }}</td>
              <td>{{ $vote->comment }}</td>
              <td>
                  <a href="{{url('admin/votes/delete/' .$vote->id)}}" class="btn btn-warning" onclick="return confirm('Bạn có muốn xóa đánh giá của {{$vote->name}} không?');">
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
@stop
