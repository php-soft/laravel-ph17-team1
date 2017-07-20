@extends('admin.layouts.master')
@section('content')
	<script src="//code.jquery.com/jquery-1.12.3.js"></script>
	<h3>Thống kê theo tháng</h3>
	<div class="col-md-4">
		<form action="">
	        <select name="monthSTT" id="monthSTT" class="form-control">
	        	<option value="1">Tháng 1</option>
	        	<option value="2">Tháng 2</option>
	        	<option value="3">Tháng 3</option>
	        	<option value="4">Tháng 4</option>
	        	<option value="5">Tháng 5</option>
	        	<option value="6">Tháng 6</option>
	        	<option value="7">Tháng 7</option>
	        	<option value="8">Tháng 8</option>
	        	<option value="9">Tháng 9</option>
	        	<option value="10">Tháng 10</option>
	        	<option value="11">Tháng 11</option>
	        	<option value="12">Tháng 12</option>
	        </select>
        </form>
    </div>
    <div class="clearfix"></div>
    <div id="detail-month">
    	{!! Charts::assets() !!}
		{!! $chart->render() !!}
    </div>
	
    <script>
        $(document).ready(function(){
            $('#monthSTT').change(function() {
            	var month = $(this).val();
                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '/admin/orders/statistic/month/detail/'+ month,
                    // data: "month=" + month,
                    success: function (response) {
                        console.log(response);
                        $('#detail-month').html(response);
                    }
                });
            });
        });

    </script>
@endsection