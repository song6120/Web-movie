@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
            <a href="{{route('episode.create')}}" class="btn btn-primary">Thêm phim</a>
            </div>
            <table class="table table-bordered" id="tablephim">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tên phim</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Tập</th>
                        <th scope="col">Link phim</th>
                        <th scope="col">Trạng thái</th>
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
                            @if ($cate->status)
                                Hiển thị
                            @else
                                Không hiển thị
                            @endif
                            
                        </td>
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
