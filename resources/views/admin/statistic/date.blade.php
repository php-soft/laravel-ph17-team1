@extends('admin.layouts.master')
@section('content')
<script src="//code.jquery.com/jquery-1.12.3.js"></script>
    <div class="container">
        <div class="row">
            <div id="option-statistic">
                <div class="col-md-5">
                    <form action="">
                        <div class="form-group">
                            <label for="">Từ ngày</label>
                            <input type="date" name="fromdate" id="fromdate" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Đến ngày</label>
                            <input type="date" name="todate" id="todate" class="form-control">
                        </div>
                        <button type="button" class="btn btn-info btn-sm adm-btn-statistic"
                        data-toggle="modal" data-target="#myModal">
                        <span class="glyphicon glyphicon-folder-open"> </span> Chi tiết
                        </button>
                    </form>
                </div>
                <div class="clearfix"></div>
                <div id="statictis-detail">
                        
                </div>
            </div>
        </div>
    </div>
    <script src="/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
    <script>
        $(document).on('click', '.adm-btn-statistic', function(e) {
            
            var todate = $('#todate').val();
            var fromdate = $('#fromdate').val();
            // alert(todate);
            if(todate == 0 || fromdate==0) {
                swal(
                    'Lỗi',
                    'Xin vui lòng nhập đầy đủ thông tin!',
                    'error'
                );
            } else if(fromdate > todate){
                swal(
                    'Lỗi',
                    'Ngày bắt đầu không được lớn hơn ngày kết thúc!',
                    'error'
                );    
            } else {
                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '/admin/orders/statistic/date/detail',
                    data: "fromdate=" + fromdate + "& todate=" + todate,
                    success: function (response) {
                        console.log(response);
                        $('#statictis-detail').html(response);
                    }
                });
            }
        });
  </script>

@endsection
