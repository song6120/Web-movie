@extends('layouts.app')

@section('content')
<div class="container"  style="margin: 0;padding: 0;width: 100%;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="padding: 10px 30px 20px 30px;">
            <h2 style="text-align: center;">Quản lý phim</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
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
                        {!! Form::label('time', 'Thời gian') !!}
                        {!! Form::text('time', isset($movie) ? $movie->time : '', ['class' => 'form-control', 'placeholder' => 'Nhập dữ liệu...', 'id'=>'title']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('name_english', 'Name english') !!}
                        {!! Form::text('name_english', isset($movie) ? $movie->name_english : '', ['class' => 'form-control', 'placeholder' => 'Nhập dữ liệu...', 'id'=>'name_english']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('sotap', 'Số tập') !!}
                        {!! Form::text('sotap', isset($movie) ? $movie->sotap : '', ['class' => 'form-control', 'placeholder' => 'Nhập dữ liệu...', 'id'=>'name_english']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('slug', 'Slug') !!}
                        {!! Form::text('slug', isset($movie) ? $movie->slug : '', ['class' => 'form-control', 'placeholder' => 'Nhập dữ liệu...', 'id'=>'convert_slug']) !!}
                        </div>
                         <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('trailer', 'Trailer') !!}
                        {!! Form::text('trailer', isset($movie) ? $movie->trailer : '', ['class' => 'form-control', 'placeholder' => 'Nhập dữ liệu...', 'id'=>'convert_slug']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('descripsion', 'Description') !!}
                        {!! Form::textarea('descripsion', isset($movie) ? $movie->descripsion : '', ['style'=>'resize:none','class' => 'form-control', 'placeholder' => 'Nhập dữ liệu...', 'id'=>'descripsion']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('tags', 'Tags') !!}
                        {!! Form::textarea('tags', isset($movie) ? $movie->tags : '', ['style'=>'resize:none','class' => 'form-control', 'placeholder' => 'Nhập dữ liệu...']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('active', 'Active') !!}
                        {!! Form::select('status', ['1'=>'Hiển thị', '0' => 'Không'], isset($movie) ? $movie->status : '',['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('resolution', 'Resolution') !!}
                        {!! Form::select('resolution', ['0'=>'HD', '1' => 'SD', '2'=>'HDCam', '3'=>'Cam', '4'=>'FULL HD', '5'=>'Trailer'], isset($movie) ? $movie->resolution : '',['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('subtitle', 'Subtitle') !!}
                        {!! Form::select('subtitle', ['0'=>'Phụ đề', '1' => 'Thuyết minh'], isset($movie) ? $movie->subtitle : '',['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('thuocphim', 'Thuộc thể loại phim') !!}
                        {!! Form::select('thuocphim', ['0'=>'Phim bộ', '1' => 'Phim lẻ'], isset($movie) ? $movie->thuocphim : '',['class' => 'form-control']) !!}
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
                        {!! Form::label('genre', 'Thể loại ', []) !!} <br/>
                        {{--  {!! Form::select('genre_id', $genre, isset($movie) ? $movie->genre_id : '',['class' => 'form-control']) !!}  --}}
                        
                            @foreach ($list_genre as $key => $gen)
                            @if(isset($movie))
                                {!! Form::checkbox('genre[]', $gen->id, isset($movie_genre) && $movie_genre->contains($gen->id) ? true : false) !!}
                            @else
                                {!! Form::checkbox('genre[]', $gen->id,'') !!}
                            @endif
                                {!! Form::label('genre', $gen->title) !!}
                            @endforeach
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('hot', 'Hot') !!}
                        {!! Form::select('movie_hot', ['1'=>'Có', '0' => 'Không'], isset($movie) ? $movie->movie_hot : '',['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('year', 'Năm phim') !!}
                        {!! Form::selectYear('year', 2000, 2023, isset($movie) ? $movie->year : '' , ['class'=>'select_year']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('image', 'Image') !!}
                        {!! Form::file('image', ['class' => 'form-control-file']) !!}
                        </div>
                        @if(isset($movie))
                            <img width="20%" src="{{asset('uploads/movie/'.$movie->image)}}"/>
                        @endif
                        </div>
                            @if (!isset($movie))
                                {!! Form::submit('Thêm dữ liệu', ['class' => 'btn btn-success pull-right pt-4']) !!}
                            @else
                                {!! Form::submit('Cập nhật', ['class' => 'btn btn-info pull-right pt-4']) !!}
                            @endif
                    {!! Form::close() !!}
                </div>
            </div>
        </div>   
    </div>
</div>
@endsection
