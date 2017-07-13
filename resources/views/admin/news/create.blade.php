@extends('admin.layouts.master')
@section('header')
    <h3>Thêm tin tức</h3>
@stop

@section('content')
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
    {!! Form::open(['url'=>'/admin/news', 'method'=>'POST', 'enctype' =>'multipart/form-data']) !!}
        <div class="form-group">
            {!! Form::label('title', 'Tiêu đề') !!}
            <div class="form-formcontrols">
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Mô tả') !!}
            <div class="form-formcontrols">
                {!! Form::text('description', null, ['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('list_new_id', 'Danh mục') !!}
            <div class="form-formcontrols">

                {!! Form::select('list_new_id',$listNews,null,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group tags">
            {!! Form::label('tags', 'Tags') !!}
            <div class="form-formcontrols">
                {!! Form::select('tags[]', $tags,null,['class'=>'form-control select2-multi', 'multiple' => 'multiple']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('content', 'Nội dung') !!}
            <div class="form-formcontrols">
                {!! Form::textarea('content', null, ['class'=>'form-control ckeditor']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('image', 'Hình ảnh') !!}
            <div class="form-formcontrols">
                {!! Form::file('image', null, ['class'=>'form-control']) !!}
            </div>
        </div>
        {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
        <a href="#" class="btn btn-warning">Xem trước</a>
    {!!  Form::close() !!}

@stop

@section('js')
    <link href="{{url('css/select2.min.css')}}" rel="stylesheet">
    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('js/jquery.js') }}"></script>

    <script src="{{ url('js/select2.min.js') }}"></script></script>
    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>

    <script src="{{ url('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script src="{{ url('vendor/unisharp/laravel-ckeditor/adapters/jquery.js') }}"></script>
    <script>
      var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
      };
    </script>
    <script>
        $('textarea').ckeditor(options);
        // $('.textarea').ckeditor(); // if class is prefered.
    </script>
@stop
