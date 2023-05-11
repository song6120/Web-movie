@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
            <a href="{{route('category.create')}}" class="btn btn-primary">Thêm danh mục</a>
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
                        {!! Form::open(['method'=> 'DELETE', 'route' => ['category.destroy', $cate->id], 'onsubmit'=>'return confirm("Bạn có chắc chắn muốn xóa không?")']) !!}
                            {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        <a href="{{route('category.edit', $cate->id)}}" class="btn btn-warning">Sửa</a>
                    </td>

                    </tr>
                @endforeach
                
            </tbody>
        </table>   
        </div>
    </div>

</div>
@endsection
