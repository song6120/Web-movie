@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card-header">Quản lý tập phim</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                    @if (!isset($episode))
                    {!! Form::open(['route' => 'episode.store', 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
                        
                    @else
                    {!! Form::open(['route' => ['episode.update', $episode->id], 'method' => 'PUT', 'enctype'=>'multipart/form-data']) !!}
                        
                    @endif
                        
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('movie_id', 'Phim') !!}
                        {!! Form::text('movie_id', isset($movie) ? $movie->title : '',['class' => 'form-control select-movie', 'readonly']) !!}
                        </div>
                        
                        {!! Form::hidden('movie_id', isset($movie) ? $movie->id : '') !!}
                        
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('link', 'Link movie') !!}
                        {!! Form::text('link', isset($episode) ? $episode->linkmovie : '', ['class' => 'form-control', 'placeholder' => 'Nhập link...']) !!}
                        </div>
                        @if(isset($episode))
                            <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                                {!! Form::label('episode', 'Tập phim') !!}
                                {!! Form::text('episode', isset($episode) ? $episode->episode : '', ['class'=>'form-control', isset($episode) ? 'readonly' : '']) !!}
                                
                            </div>
                        @else
                            <div class="form-group">
                            {!! Form::label('episode', 'Tập phim') !!}
                            {!! Form::selectRange('episode', 1, $movie->sotap, $movie->sotap,['class'=>'form-control']) !!}
                            </div>
                        @endif
                        @if (!isset($episode))
                            {!! Form::submit('Thêm tập phim', ['class' => 'btn btn-success pull-right']) !!}
                        @else
                            {!! Form::submit('Cập nhật', ['class' => 'btn btn-info pull-right']) !!}
                        @endif
                    {!! Form::close() !!}
                </div>
            <table class="table table-bordered" id="tablephim">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên phim</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Tập</th>
                        <th scope="col">Link phim</th>
                        <th scope="col">Quản lý</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_episode as $key => $cate)
                        <tr>
                        <th scope="row">{{$key}}</th>
                        <td>{{$cate->movie->title}}</td>
                        <td><img width="100%" src="{{asset('uploads/movie/'.$cate->movie->image)}}"/></td>
                        <td>{{$cate->episode}}</td>
                        <td>{!!$cate->linkmovie!!}</td>
                        <td>
                            {!! Form::open(['method'=> 'DELETE', 'route' => ['episode.destroy', $cate->id], 'onsubmit'=>'return confirm("Bạn có chắc chắn muốn xóa không?")']) !!}
                                {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                            <a href="{{route('episode.edit', $cate->id)}}" class="btn btn-warning">Sửa</a>
                        </td>

                        </tr>
                    @endforeach
                    
                </tbody>
            </table>    
        </div>
    </div>

</div>
@endsection
