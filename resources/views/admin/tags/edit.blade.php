@extends('admin.layouts.master')
@section('title')
    Chỉnh sửa tag | {{ $tag->name }}
@stop
@section('content')
    <h3>Thêm chỉnh sửa tag</h3>
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
    @endif
    {!! Form::model($tag, ['url'=>'admin/tags/edit/'.$tag->id, 'method'=>'POST']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Tiêu đề') !!}
            <div class="form-formcontrols">
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
        </div>

        {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
    {!!  Form::close() !!}
@stop
