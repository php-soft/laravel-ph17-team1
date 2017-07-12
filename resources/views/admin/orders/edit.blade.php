@extends('admin.layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::model($order, ['url' => '/admin/orders/edit/'.$order->id, 
                'method'=>'put']) !!}
                    <input type="hidden" name="_token" value="{{csrf_token()}}" >
                
                    <div class="form-group">
                        {!! Form::label('shipping_name', 'Tên khách hàng: ')!!}
                        <div class="form-controls">
                            {!!Form::text('shipping_name', null, ['class' => 'form-control', 'readonly'])!!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!!Form::label('shipping_phone', 'Số điện thoại:')!!}
                        <div class="form-controls">
                            {!!Form::text('shipping_phone', null, ['class' => 'form-control', 'readonly'])!!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!!Form::label('shipping_email', 'Eamil:')!!}
                        <div class="form-controls">
                            {!!Form::text('shipping_email', null, ['class' => 'form-control', 'readonly'])!!}
                        </div>
                    </div><div class="form-group">
                        {!!Form::label('shipping_address', 'Đại chỉ:')!!}
                        <div class="form-controls">
                            {!!Form::text('shipping_address', null, ['class' => 'form-control', 'readonly'])!!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!!Form::label('statuses', 'Trạng thái')!!}
                        <div class="form-controls">
                            {!!Form::select('status_id', $statuses, null, ['class' =>'form-control'])!!}
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default">Cập nhật</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <a href="/admin/orders" class="btn btn-primary">Quay lại</a>
                </form>
            </div>            
        </div>
    </div>
    <script src="/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
@endsection
