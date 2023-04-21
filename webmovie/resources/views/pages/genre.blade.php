@extends('layout')
@section('content')
<div class="row container" id="wrapper">
            <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
               <section>
                  <div class="section-bar clearfix">
                     <h1 class="section-title"><span>{{$genre_slug->title}}</span></h1>
                  </div>
                  <div class="halim_box">
                     @foreach ($movie as $key => $movie_cate)
                        <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                           <div class="halim-item">
                              <a class="halim-thumb" href="{{route('movie', $movie_cate->slug)}}" title="{{$movie_cate->title}}">
                                 <figure><img class="lazy img-responsive" src="{{asset('uploads/movie/'.$movie_cate->image)}}" alt="{{$movie_cate->slug}}" title="{{$movie_cate->title}}"></figure>
                                 <span class="status">
                                    @if ($movie_cate->resolution == 0)
                                    HD
                                 @elseif($movie_cate->resolution == 1)
                                       SD
                                 @elseif($movie_cate->resolution == 2)
                                       HDCam
                                 @elseif($movie_cate->resolution == 3)
                                       Cam
                                 @elseif($movie_cate->resolution == 4)
                                       FULL HD
                                 @elseif($movie_cate->resolution == 5)
                                       Trailer
                                 @endif
                                 </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                    @if ($movie_cate->subtitle == 0)
                                    @if($movie_cate->resolution != 5)
                                       Phụ đề
                                    @endif
                                    @if($movie_cate->season != 0)
                                       - Season {{$movie_cate->season}}
                                    @endif
                                 @elseif($movie_cate->subtitle == 1)
                                    @if($movie_cate->resolution != 5)
                                       Thuyết minh
                                    @endif
                                    @if($movie_cate->season != 0)
                                       - Season {{$movie_cate->season}}
                                    @endif
                                 @endif
                                 </span> 
                                 <div class="icon_overlay"></div>
                                 <div class="halim-post-title-box">
                                    <div class="halim-post-title ">
                                       <p class="entry-title">{{$movie_cate->title}}</p>
                                       <p class="original_title">{{$movie_cate->name_english}}</p>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </article>
                     @endforeach
                  </div>
                  <div class="clearfix"></div>
                  <div class="text-center">
                     {!! $movie->links("pagination::bootstrap-4") !!}
                  </div>
               </section>
            </main>
   @include('pages.include.sidebar')
</div>
@endsection