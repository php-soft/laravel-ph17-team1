<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script
    src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet"
    href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet"
    href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<script
    src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@if($total>0)
	<hr>
	<h3>Chi tiết thống kê</h3>
	<h2>Tổng doanh thu: {{number_format($total)}} VNĐ</h2>
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
		    </tr>
		</thead>
		<tbody>
			<?php $i=1; ?>
			@foreach($result as $item)
				<tr>
					<td class="text-center">{{$i++}}</td>        
				    <td class="text-center"> {{$item->madh}} </td>
				    <td class="text-center"> {{ $item->shipping_name }}</td>
				    <td class="text-center"> {{ $item->shipping_address }}</td>
				    <td class="text-center"> {{ $item->shipping_email }}</td>
				    <td class="text-center"> {{ number_format($item->total,0) }} VNĐ</td>
				    <td class="text-center"> {{ empty($item->status) ? ''  : $item->status->name}}</td>
				    <td class="text-center"> {{ date('d/m/Y',strtotime($item->created_at))}}</td>
			    </tr>
			@endforeach
	    </tbody>
	</table>
	{!! Charts::assets() !!}
	{!! $chart->render() !!}
@endif
<script src="/dist/sweetalert.min.js"></script>
@include('sweet::alert')
<script>
	$(document).ready(function() {
		$('#table').DataTable({
		    processing: true,
		    lengthMenu: [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
		    pageLength: 5,
		});
	});
</script>