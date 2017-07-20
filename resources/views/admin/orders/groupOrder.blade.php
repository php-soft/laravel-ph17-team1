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
        @foreach($order as $item)
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
<script>
    $(document).ready(function() {
        $('#table').DataTable({
            processing: true,
            lengthMenu: [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
            pageLength: 5,
        });
    });
</script>