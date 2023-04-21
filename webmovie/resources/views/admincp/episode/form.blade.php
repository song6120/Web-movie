@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <a href="{{route('episode.index')}}" class="btn btn-primary">Danh sách</a>
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
                        {!! Form::label('movie', 'Chọn phim') !!}
                        {!! Form::select('movie_id', $list_movie, isset($episode) ? $episode->movieid : '',['class' => 'form-control select-movie']) !!}
                        </div>
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
                            <select name="episode" class="form-control" id="show_movie">
                            </select>
                        </div>
                        @endif
                        @if (!isset($episode))
                            {!! Form::submit('Thêm tập phim', ['class' => 'btn btn-success pull-right']) !!}
                        @else
                            {!! Form::submit('Cập nhật', ['class' => 'btn btn-info pull-right']) !!}
                        @endif
                    {!! Form::close() !!}
                </div>
            </div>
        </div>   
    </div>
</div>
@endsection
