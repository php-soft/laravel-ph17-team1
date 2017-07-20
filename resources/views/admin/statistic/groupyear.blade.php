@extends('admin.layouts.master')
@section('content')
    <script src="//code.jquery.com/jquery-1.12.3.js"></script>
    <div class="col-md-4">
        <label for="" class="">Số lượng: </label>
        <input type="number" name="quantity" min="3" max="10" id="quantity"
        value="3" class="form-control col-md-4"><br>
    </div>
    <div id="detail-year">
        {!! Charts::assets() !!}
        {!! $chart->render() !!}
    </div>
    <script>
        $(document).ready(function(){
            $('#quantity').on('change keyup', function() {
                var quantity =$(this).val();
                if(quantity > 10 || quantity < 3) {
                    alert('Bạn vui lòng không nhập dưới 3 năm và trên 10 năm');
                } else {
                    $.ajax({
                        type: 'get',
                        dataType: 'html',
                        url: '/admin/orders/statistic/group-year/'+ quantity,
                        success: function (response) {
                            console.log(response);
                            $('#detail-year').html(response);
                        }
                    });
                }
               
            });

        });
    </script>
    
@endsection