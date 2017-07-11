<script>
$(document).ready(function(){
<?php for($i=1;$i<20;$i++){?>
  $('#upCart<?php echo $i;?>').on('change keyup', function(){

  var newqty = $('#upCart<?php echo $i;?>').val();
  var rowId = $('#rowId<?php echo $i;?>').val();
  var proId = $('#proId<?php echo $i;?>').val();

   if(newqty <=0 || newqty > 5){ alert('Số lượng không lớn hơn 5 và nhỏ hơn 1') }
  else {

    $.ajax({
        type: 'get',
        dataType: 'html',
        url: '/gio-hang/cap-nhat',
        data: "qty=" + newqty + "& rowId=" + rowId + "& proId=" + proId,
        success: function (response) {
            console.log(response);
            $('#updateDiv').html(response);
        }
    });
  }

  });
  <?php } ?>
});
</script>
<div class="container">
    <div class="row">
        <div class="beta-select text-center">
            <i class="fa fa-shopping-cart fa-2x"> Giỏ hàng</i>
                <?php $count=1; ?>
                @if($qtysp == 0)
                    <h2>trống</h2>     
                @else
                    <h2>có {{$qtysp}} mặt hàng,tổng cộng {{$qty}} sản phẩm</h2>
                @endif
            <i class="fa fa-chevron-down"></i>
        </div>
        <div class="beta-dropdown cart-body">
            @if($qtysp == 0)
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                        <h2 style="text-align: center">No Items in Cart!</h2>
                    </div>
                </div>
                <a href="/" class="text-center"><span class="glyphicon glyphicon-chevron-left"></span>Tiếp tục mua hàng</a>
            @else
                <div class="col-md-9">
                    @foreach($content as $product)
                        <input type="hidden" id="rowId{{$count}}" name="{{$product->rowId}}" value="{{$product->rowId}}">
                        <input type="hidden" id="proId{{$count}}" value="{{$product->id}}">
                        <div style=" padding: 20px;">
                            <div class="cart-item cyc col-md-3">
                                <img src="{{$product->options->image}}" class="img-responsive" alt=""  />
                            </div>
                            <div class="cart-item-info col-md-9">
                                <div class="col-md-5">
                                    <h3><a href="#" class="text-center">{{$product->name}}</a></h3>
                                    <ul class="qty">
                                        <li><p>Ram : {{$product->options->ram}} Gb</p></li>
                                        <li><p>Rom : {{$product->options->rom}} Gb</p></li>
                                        <li><p>Màu : {{$product->options->color}} </p></li>
                                    </ul>
                                </div>
                                
                                <div class="delivery col-md-6">
                                    <br>
                                    <label for="quantity" class="">Số lượng: </label>
                                    <input type="number" name="quantity" min="1" max="5" id="upCart{{$count}}"
                                    value="{{$product->qty}}" class="form-control col-md-4"><br>
                                    <label for="">Giá: </label>
                                    <span class="label label-warning"> {{number_format($product->price)}} VNĐ</span><br>
                                    <label for="">Thành tiền: </label>
                                    <span class="label label-success"> {{number_format($product->subtotal)}} VNĐ</span>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="close1 col-md-1">
                                    <a href="/gio-hang/xoa-san-pham/{{$product->id}}" >
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <?php $count++; ?>
                    @endforeach
                </div>
                <div class="col-md-3" style="border: 1px solid black; padding: 20px; border-radius: 5% ">
                    <table class="table-responsive table-hover table-striped container-fluid">
                        <tr>
                            <td>
                                <a href="/" class="btn btn-success" style="width: 100%; font-weight: bold;">
                                <span class="glyphicon glyphicon-arrow-left"></span>Tiếp tục mua hàng</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Tổng cộng:</strong><span class="label label-info" style="font-size: 16px"> {{number_format($subtotal)}} VNĐ </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="/gio-hang/xoa-gio-hang" class="btn btn-danger" style="width: 100%;font-weight: bold;"><span class="glyphicon glyphicon-trash"></span>Xoá giỏ hàng</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="/dat-hang" class="btn btn-success" style="width: 100%; font-weight: bold;">Đặt hàng <span class="glyphicon glyphicon-arrow-right"></span></a>
                            </td>
                        </tr>
                    </table>   
                </div>
            @endif
        </div>
    </div>
    <div class="clearfix"></div>
    <div>
        <hr>
        <p class="text-danger text-right">Designer by Lê Đức Thiện</p>
    </div>
</div>