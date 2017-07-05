@extends('admin.layouts.master')
@section('title')
    Danh sách các tags
@stop
@section('content')
    <h3>Danh sách tag
        <a href="{{url('admin/tags/create')}}" class="btn btn-success pull-right">Thêm tag mới</a>
    </h3>
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif
    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên tag</th>
                <th>Chỉnh sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->name }}</td>
                    <td><a href="{{url('admin/tags/edit/'.$tag->id)}}"><strong><span class="glyphicon glyphicon-edit"></span></strong></a></td>
                    <td><a href="{{url('admin/tags/delete/'.$tag->id)}}"><strong><span class="glyphicon glyphicon-trash"></span></strong></a></td>  
                </tr>
            @endforeach
        </tbody>
    </table>
@stop