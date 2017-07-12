@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
        @if(!empty($error))
        <div class="alert alert-danger">
            <ul>
                <li>{!! $error !!}</li>
            </ul>    
        </div>
        @else
            <div class="alert alert-success">
                <h3>Cảm ơn bạn đã mua hàng tại: <strong style="color: red">shop phone team 1</strong></h3>
                <p>Đơn hàng của quý khách sẽ sớm được xử lý.</p>
                <p>Chúng tôi sẽ cố gắng hoàn thiện hơn nữa.</p>
                <p>Chúc quý khách sức khỏe.</p>
            </div>
        @endif
        </div>
    </div>
@endsection
