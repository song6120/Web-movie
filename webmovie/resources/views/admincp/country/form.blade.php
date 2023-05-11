@extends('layouts.app')

@section('content')
<div class="container" style="margin: 0;padding: 0;width: 100%;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="padding: 10px 30px;">
                <div class="card-header"><h2 style="text-align: center;">Quản lý quốc gia</h2></div>
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
                    
                    @if (!isset($country))
                    {!! Form::open(['route' => 'country.store', 'method' => 'POST']) !!}
                        
                    @else
                    {!! Form::open(['route' => ['country.update', $country->id], 'method' => 'PUT']) !!}
                        
                    @endif
                    
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', isset($country) ? $country->title : '', ['class' => 'form-control', 'placeholder' => 'Nhập dữ liệu...', 'id'=>'title', 'onkeyup'=>'ChangeToSlug()']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('slug', 'Slug') !!}
                        {!! Form::text('slug', isset($country) ? $country->slug : '', ['class' => 'form-control', 'placeholder' => 'Nhập dữ liệu...', 'id'=>'convert_slug']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('descripsion', 'Description') !!}
                        {!! Form::textarea('descripsion', isset($country) ? $country->descripsion : '', ['style'=>'resize:none','class' => 'form-control', 'placeholder' => 'Nhập dữ liệu...', 'id'=>'descripsion']) !!}
                        </div>
                        <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('active', 'Active') !!}
                        {!! Form::select('status', ['1'=>'Hiển thị', '0' => 'Không'], isset($country) ? $country->status : '',['class' => 'form-control', 'id' => 'status']) !!}
                        </div>
                        
                        @if (!isset($country))
                        {!! Form::submit('Thêm dữ liệu', ['class' => 'btn btn-success pull-right']) !!}
                            
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
