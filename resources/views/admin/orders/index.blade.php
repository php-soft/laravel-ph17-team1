@extends('admin.layouts.master')
@section('content')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script
    src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet"
    href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet"
    href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script
    src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <div class="container">
        <div class="row">
        <form action="">
                <div class="form-group col-md-3">
                    <select name="StatusOP" id="StatusOP" class="form-control">
                        @foreach($status as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                        <option value="all">All</option>
                    </select>
                </div>
                <div class="pull-right col-md-2">
                    <div class="dropdown">
                        <button class="btn btn-info dropdown-toggle" style="width: 100%" type="button" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-align-left"> </span> Thống kê
                        <span class="caret"> </span></button>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/admin/orders/statistic/date" class="text-center">
                                    <span class="glyphicon glyphicon-arrow-right pull-left"></span>Theo ngày
                                </a>
                            </li>
                            <li>
                                <a href="/admin/orders/statistic/month" class="text-center">
                                    <span class="glyphicon glyphicon-arrow-right pull-left"></span>Theo tháng
                                </a>
                            </li>
                            <li>
                                <a href="/admin/orders/statistic/year" class="text-center">
                                    <span class="glyphicon glyphicon-arrow-right pull-left"></span>Theo năm
                                </a>
                            </li>
                            <li>
                                <a href="/admin/orders/statistic/group-year" class="text-center">
                                    <span class="glyphicon glyphicon-arrow-right pull-left"></span>Năm gần đây
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                </form>
                <div>
                    <br>
                    <div class="clearfix"></div>
                </div>
            <div class="row-order">
            <table width="100%" class="table table-striped table-bordered table-hover" id="table">
                
                <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Mã đơn hàng</th>
                        <th class="text-center">Tên khách hàng</th>
                        <th class="text-center">Địa chỉ</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Tổng cộng</th>
                        <th class="text-center">Trạng thái</th>
                        <th class="text-center">Ngày tạo</th>
                        <th class="text-center">chức năng</th>
                        <th class="text-center">Chi tiết</th>
                    </tr>
                </thead>
                <?php $i=1 ?>
                <tbody>
                @foreach($orders as $item)
                <tr>           
                    <td class="text-center">{{$i++}}</td>
                    <td class="text-center"> {{$item->madh}} </td>
                    <td class="text-center"> {{ $item->shipping_name }}</td>
                    <td class="text-center"> {{ $item->shipping_address }}</td>
                    <td class="text-center"> {{ $item->shipping_email }}</td>
                    <td class="text-center"> {{ number_format($item->total,0) }} VNĐ</td>
                    <td class="text-center"> {{ empty($item->status) ? ''  : $item->status->name}}</td>
                    <td class="text-center"> {{ date('d/m/Y',strtotime($item->created_at))}}</td>
                
                    <td class="text-center"><a href="{{route('adminUpdateOrder',$item->id)}}" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></a>
                    <button class="btn btn-danger btn-del" value="{{$item->id}}"><span class="glyphicon glyphicon-trash"></span></button>
                    </td>

                    <td>
                        
                        <button type="button" class="btn btn-info btn-sm adm-btn-view" data-toggle="modal" data-target="#myModal" value="{{$item->id}}"> <span class="glyphicon glyphicon-folder-open"> </span></span> Chi tiết</button>
                        <!-- Modal -->
                        
                    </td>                                    
                </tr>
                
                @endforeach
                </tbody>
                
            </table>
            </div>
            <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                
                      <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="submit" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Chi tiết đơn hàng</h4>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <div class="order-detail">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                  
                    </div>
                </div>
        </div>
    <script src="/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
    <script>
        $(document).on('click', '.btn-del', function(e) {
            var id =$(this).val();
            swal({
                title: "Bạn cón muốn xóa?",
                text: "Mọi dữ liệu sẽ bị mất đi!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Vâng, Xóa!",
                cancelButtonText: "Hủy, hủy thao tác!",
                closeOnConfirm: false,
                closeOnCancel: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        $.ajax({
                            type : "get",
                            url  : '/admin/orders/deleteRecord/'+id,
                            dataType: "JSON",
                            data : {"id": id},
                            success:function(data)
                            {
                                if(data == "Bảng ghi đã được xử lý, không thể xóa!"){
                                    swal("Cancelled", "Bảng ghi đã được xử lý, không thể xóa!",
                                     "error");
                                } else {
                                    swal("Xóa thành công!", "Dữ liệu đã được xóa thành công.", "success");
                                    window.location.href = "/admin/orders";
                                }
                            }
                        })    
                        
                    } else {
                        swal("Cancelled", "Hủy thao tác :)", "error");
                    }
                });
        });
        $(document).on('click', '.adm-btn-view', function(e) {
            var id = $(this).val();
            $.get("/admin/orders/detail/"+id, function(data){
                $(".order-detail").html(data);
            });
        });
        $(document).on('click', '.adm-btn-edit', function(e) {
            var id = $(this).val();
            $.get("/admin/orders/edit/order/"+id, function(data){
                $(".order-detail").html(data);
            })
        });
        $(document).on('click', '.btn-restore', function(e) {
            var id = $(this).val();
            swal({
                title: "Bạn cón muốn khôi phục dữ liệu cho bản ghi?",
                text: "Mọi dữ liệu sẽ được khôi phục!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Vâng, khôi phục!",
                cancelButtonText: "Hủy, hủy thao tác!",
                closeOnConfirm: false,
                closeOnCancel: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        $.ajax({
                            type : "get",
                            url  : '/admin/orders/restoreRecord/'+id,
                            dataType: "JSON",
                            data : {"id": id},
                            success:function(data)
                            {
                                swal("Khôi phục thành thành công!", "Dữ liệu đã được xóa thành công.", "success");
                                window.location.href = "/admin/orders";
                            }
                        })    
                        
                    } else {
                        swal("Cancelled", "Hủy thao tác :)", "error");
                    }
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $('#StatusOP').change(function() {
                var id = $(this).val();
                $.get("/admin/orders/group/"+id, function(data){
                    $(".row-order").html(data);
                });
                // $.ajax({
                //             type : "get",
                //             url  : '/admin/orders/group/'+id,
                //             dataType: "JSON",
                //             data : {"id": id},
                //             success:function(data)
                //             {
                //                 alert(data['id']);
                //             }
                //         });
            });
        });

    </script>
    <script>
    $(document).ready(function() {
    $('#table').DataTable({
        processing: true,
        lengthMenu: [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
        pageLength: 5,
    });
});
  </script>
@endsection
