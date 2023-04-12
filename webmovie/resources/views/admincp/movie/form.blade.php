@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản lý phim</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if (!isset($movie))
                    {!! Form::open(['route' => 'movie.store', 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
                        
                    @else
                    {!! Form::open(['route' => ['movie.update', $movie->id], 'method' => 'PUT', 'enctype'=>'multipart/form-data']) !!}
                        
                    @endif
                    
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', isset($movie) ? $movie->title : '', ['class' => 'form-control', 'placeholder' => 'Nhập dữ liệu...', 'id'=>'title', 'onkeyup'=>'ChangeToSlug()']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('slug', 'Slug') !!}
                        {!! Form::text('slug', isset($movie) ? $movie->slug : '', ['class' => 'form-control', 'placeholder' => 'Nhập dữ liệu...', 'id'=>'convert_slug']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('descripsion', 'Description') !!}
                        {!! Form::textarea('descripsion', isset($movie) ? $movie->descripsion : '', ['style'=>'resize:none','class' => 'form-control', 'placeholder' => 'Nhập dữ liệu...', 'id'=>'descripsion']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('active', 'Active') !!}
                        {!! Form::select('status', ['1'=>'Hiển thị', '0' => 'Không'], isset($movie) ? $movie->status : '',['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('category', 'Category') !!}
                        {!! Form::select('category_id', $category, isset($movie) ? $movie->category_id : '',['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('country', 'Country') !!}
                        {!! Form::select('country_id', $country, isset($movie) ? $movie->country_id : '',['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('genre', 'Genre') !!}
                        {!! Form::select('genre_id', $genre, isset($movie) ? $movie->genre_id : '',['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('image', 'Image') !!}
                        {!! Form::file('image', ['class' => 'form-control-file']) !!}
                        @if(isset($movie))
                            <img width="20%" src="{{asset('uploads/movie/'.$movie->image)}}"/>
                        @endif
                        
                        </div>
                        
                        @if (!isset($movie))
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
                    <th scope="col">slug</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Thể loại</th>
                    <th scope="col">Quốc gia</th>
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
                    <td><img width="40%" src="{{asset('uploads/movie/'.$cate->image)}}"/></td>
                    <td>{{$cate->descripsion}}</td>
                    <td>{{$cate->category->title}}</td>
                    <td>{{$cate->country->title}}</td>
                    <td>{{$cate->genre->title}}</td>
                    <td>
                        @if ($cate->status)
                            Hiển thị
                        @else
                            Không hiển thị
                        @endif
                        
                    </td>
                    <td>
                        {!! Form::open(['method'=> 'DELETE', 'route' => ['movie.destroy', $cate->id], 'onsubmit'=>'return confirm("Bạn có chắc chắn muốn xóa không?")']) !!}
                            {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        <a href="{{route('movie.edit', $cate->id)}}" class="btn btn-warning">Sửa</a>
                    </td>

                    </tr>
                @endforeach
                
            </tbody>
        </table>    
    </div>
</div>
@endsection
