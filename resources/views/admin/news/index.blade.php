@extends('admin.layouts.master')
@section('content')
    <h3>Danh sách tin
        <a href="{{url('admin/news/create')}}" class="btn btn-success pull-right">Thêm tin mới</a>
        <a href="{{url('admin/tags')}}" class="btn btn-success pull-right" style="margin-right: 10px">Quản lý tags tin tức</a>
    </h3>
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
    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Tiêu đề</th>
                <th>Mô tả</th>
                <th>Tags</th>
                <th>hình ảnh</th>
                <th>Chỉnh sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>

            @foreach($news as $new)

                <tr>
                <td>{{$new->id}}</td>
                    <td>{{$new->title}}</td>
                    <td>{{$new->description}}</td>
                    <td>
                        @foreach ($new->tags as $tag)
                            <span class="label label-default">{{ $tag->name }}</span>
                        @endforeach
                    </td>
                    <td><img src="{{url('uploads/news/'.$new->image)}}" alt="{{$new->image}}" class="thumbnail" height="100" width="auto"></td>
                    <td><a href="{{url('admin/news/edit/'.$new->id)}}"><strong><span class="glyphicon glyphicon-edit"></span></strong></a></td>
                    <td><a href="{{url('admin/news/delete/'.$new->id)}}"><strong><span class="glyphicon glyphicon-trash"></span></strong></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
