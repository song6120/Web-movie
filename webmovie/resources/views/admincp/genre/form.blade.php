@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản lý thể loại</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if (!isset($genre))
                    {!! Form::open(['route' => 'genre.store', 'method' => 'POST']) !!}
                        
                    @else
                    {!! Form::open(['route' => ['genre.update', $genre->id], 'method' => 'PUT']) !!}
                        
                    @endif
                    
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', isset($genre) ? $genre->title : '', ['class' => 'form-control', 'placeholder' => 'Nhập dữ liệu...', 'id'=>'title', 'onkeyup'=>'ChangeToSlug()']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('slug', 'Slug') !!}
                        {!! Form::text('slug', isset($genre) ? $genre->slug : '', ['class' => 'form-control', 'placeholder' => 'Nhập dữ liệu...', 'id'=>'convert_slug']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('descripsion', 'Description') !!}
                        {!! Form::textarea('descripsion', isset($genre) ? $genre->descripsion : '', ['style'=>'resize:none','class' => 'form-control', 'placeholder' => 'Nhập dữ liệu...', 'id'=>'descripsion']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('active', 'Active') !!}
                        {!! Form::select('status', ['1'=>'Hiển thị', '0' => 'Không'], isset($genre) ? $genre->status : '',['class' => 'form-control', 'id' => 'status']) !!}
                        </div>
                        
                        @if (!isset($genre))
                        {!! Form::submit('Thêm dữ liệu', ['class' => 'btn btn-success pull-right']) !!}
                            
                        @else
                        {!! Form::submit('Cập nhật', ['class' => 'btn btn-info pull-right']) !!}
                            
                        @endif
                        
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Nội dung</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Quản lý</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $key => $cate)
                    <tr>
                    <th scope="row">{{$key}}</th>
                    <td>{{$cate->title}}</td>
                    <td>{{$cate->slug}}</td>
                    <td>{{$cate->descripsion}}</td>
                    <td>
                        @if ($cate->status)
                            Hiển thị
                        @else
                            Không hiển thị
                        @endif
                        
                    </td>
                    <td>
                        {!! Form::open(['method'=> 'DELETE', 'route' => ['genre.destroy', $cate->id], 'onsubmit'=>'return confirm("Bạn có chắc chắn muốn xóa không?")']) !!}
                            {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        <a href="{{route('genre.edit', $cate->id)}}" class="btn btn-warning">Sửa</a>
                    </td>

                    </tr>
                @endforeach
                
            </tbody>
        </table>    
    </div>
</div>
@endsection
