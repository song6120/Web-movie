@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <a href="{{route('movie.create')}}" class="btn btn-primary">Thêm phim</a>
        </div>
        <table class="table table-bordered" id="tablephim">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Tên tiếng anh</th>
                    <th scope="col">Thời lượng</th>
                    <th scope="col">slug</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Định dạng</th>
                    <th scope="col">Phụ đề</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Thể loại</th>
                    <th scope="col">Quốc gia</th>
                    <th scope="col">Hot</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Năm phim</th>
                    <th scope="col">Top views</th>
                    <th scope="col">Quản lý</th>
                </tr>
            </thead>
            <tbody> 
                @foreach ($list as $key => $cate)
                    <tr>
                    <th scope="row">{{$key}}</th> 
                    <td>{{$cate->title}}</td>
                    <td>{{$cate->name_english}}</td>
                    <td>{{$cate->time}}</td>
                    <td>{{$cate->slug}}</td>
                    <td><img width="40%" src="{{asset('uploads/movie/'.$cate->image)}}"/></td>
                    <td>{{$cate->descripsion}}</td>
                    <td>{{$cate->tags}}</td>
                    <td>
                        @if ($cate->resolution == 0)
                            HD
                        @elseif($cate->resolution == 1)
                            SD
                        @elseif($cate->resolution == 2)
                            HDCam
                        @elseif($cate->resolution == 3)
                            Cam
                        @elseif($cate->resolution == 4)
                            FULL HD
                        @endif
                    </td>
                    <td>
                        @if ($cate->subtitle == 0)
                            Phụ đề
                        @elseif($cate->subtitle == 1)
                            Thuyết minh
                        @endif
                    </td>
                    <td>{{$cate->category->title}}</td>
                    <td>{{$cate->country->title}}</td>
                    <td>{{$cate->genre->title}}</td>
                    <td>
                        @if ($cate->movie_hot)
                            Có
                        @else
                            Không
                        @endif
                    </td>
                    <td>
                        @if ($cate->status)
                            Hiển thị
                        @else
                            Không hiển thị
                        @endif
                    </td>
                    <td>
                    {!! Form::selectYear('year', 2000, 2023, isset($cate->year) ? $cate->year : '', ['class'=>'select-year', 'id'=>$cate->id]) !!}
                    </td>
                    <td>
                    {!! Form::select('topview', ['0'=>'Ngày', '1'=>'Tuần', '2'=>'Tháng'], isset($cate->topview) ? $cate->topview : '', ['class'=>'select-topview', 'id'=>$cate->id]) !!}
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
