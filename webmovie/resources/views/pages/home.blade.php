@extends('layout')
@section('content')
<div class="row container" id="wrapper">
    <div class="halim-panel-filter">
        <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
            <div class="ajax"></div>
        </div>
    </div>
    <div id="halim_related_movies-2xx" class="wrap-slider">
        <div class="section-bar clearfix">
            <h3 class="section-title"><span>Phim hot</span></h3>
        </div>
        <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
        @foreach ($movie_hot as $key => $hot)
           <article class="thumb grid-item post-38498">
              <div class="halim-item">
                 <a class="halim-thumb" href="{{route('movie', $hot->slug)}}" title="{{$hot->title}}">
                    <figure><img class="lazy img-responsive" src="{{asset('uploads/movie/'.$hot->image)}}" alt="{{$hot->slug}}" title="{{$hot->title}}"></figure>
                    <span class="status">
                        @if ($hot->resolution == 0)
                            HD
                        @elseif($hot->resolution == 1)
                            SD
                        @elseif($hot->resolution == 2)
                            HDCam
                        @elseif($hot->resolution == 3)
                            Cam
                        @elseif($hot->resolution == 4)
                            FULL HD
                        @elseif($hot->resolution == 5)
                              Trailer
                        @endif
                        | {{$hot->sotap}} Tập
                    </span><span class="episode">
                    <i class="fa fa-play" aria-hidden="true"></i>
                        @if ($hot->subtitle == 0)
                            Phụ đề
                        @elseif($hot->subtitle == 1)
                            Thuyết minh
                        @endif
                    </span> 
                    <div class="icon_overlay"></div>
                    <div class="halim-post-title-box">
                       <div class="halim-post-title ">
                          <p class="entry-title">{{$hot->title}}</p>
                          <p class="original_title">{{$hot->name_english}}</p>
                       </div>
                    </div>
                 </a>
              </div>
           </article>
        @endforeach
        
        </div>
            <script>
               $(document).ready(function($) {				
               var owl = $('#halim_related_movies-2');
               owl.owlCarousel({loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 5}}})});
            </script>
        </div>
    <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
    
    @foreach ($category_home as $key => $cate_home)
        
        <section id="halim-advanced-widget-2">
            <div class="section-heading">
                <a href="{{route('category', $cate_home->slug)}}" title="Phim Bộ">
                    <span class="h-text">{{$cate_home->title}}</span>
                </a>
            </div>
            <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
            @foreach ($cate_home->movie->take(8) as $key => $cate_movie)
                <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                    <div class="halim-item">
                        <a class="halim-thumb" href="{{route('movie', $cate_movie->slug)}}">
                            <figure><img class="lazy img-responsive" src="{{asset('uploads/movie/'.$cate_movie->image)}}" alt="{{$cate_movie->slug}}" title="{{$cate_movie->title}}"></figure>
                            <span class="status">
                                @if ($cate_movie->resolution == 0)
                                    HD
                                @elseif($cate_movie->resolution == 1)
                                    SD
                                @elseif($cate_movie->resolution == 2)
                                    HDCam
                                @elseif($cate_movie->resolution == 3)
                                    Cam
                                @elseif($cate_movie->resolution == 4)
                                    FULL HD
                                @elseif($cate_movie->resolution == 5)
                                    Trailer
                                @endif
                                | {{$hot->sotap}} Tập
                            </span>
                            <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                @if ($cate_movie->subtitle == 0)
                                    Phụ đề
                                @elseif($cate_movie->subtitle == 1)
                                    Thuyết minh
                                @endif
                            </span>
                            <div class="icon_overlay"></div>
                            <div class="halim-post-title-box">
                                <div class="halim-post-title ">
                                    <p class="entry-title">{{$cate_movie->title}}</p>
                                    <p class="original_title">{{$cate_movie->name_english}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </article>
            @endforeach
            </div>
        </section>
    @endforeach
    
        <div class="clearfix"></div>
    </main>
    @include('pages.include.sidebar')
    
</div>
@endsection