@extends('layout')
@section('content')
<div class="row container" id="wrapper">
         <div class="halim-panel-filter">
            <div class="panel-heading">
               <div class="row">
                  <div class="col-xs-6">
                     <div class="yoast_breadcrumb hidden-xs"><span><span><a href="{{route('country', $movie->country->slug)}}">{{$movie->country->title}}</a> » <span><a href="{{route('genre', $movie->genre->slug)}}">{{$movie->genre->title}}</a> » <span class="breadcrumb_last" aria-current="page">{{$movie->title}}</span></span></span></span></div>
                  </div>
               </div>
            </div>
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
               <div class="ajax"></div>
            </div>
         </div>
         <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8" style="width: 100%;">
            <section id="content" class="test">
               <div class="clearfix wrap-content">
               <style type="text/css">
                  .iframe_phim iframe {
                     width: 100%;
                     height: 600px;
                  }
               </style>
                  <div class="iframe_phim">
                     {!!$episode->linkmovie!!}
                  </div>
                  
                  
                  <div class="button-watch">
                     <ul class="halim-social-plugin col-xs-4 hidden-xs">
                        <li class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></li>
                     </ul>
                     <ul class="col-xs-12 col-md-8">
                        <div id="autonext" class="btn-cs autonext">
                           <i class="icon-autonext-sm"></i>
                           <span><i class="hl-next"></i> Autonext: <span id="autonext-status">On</span></span>
                        </div>
                        <div id="explayer" class="hidden-xs"><i class="hl-resize-full"></i>
                           Expand 
                        </div>
                        <div id="toggle-light"><i class="hl-adjust"></i>
                           Light Off 
                        </div>
                        <div id="report" class="halim-switch"><i class="hl-attention"></i> Report</div>
                        <div class="luotxem"><i class="hl-eye"></i>
                           <span>1K</span> lượt xem 
                        </div>
                        <div class="luotxem">
                           <a class="visible-xs-inline" data-toggle="collapse" href="#moretool" aria-expanded="false" aria-controls="moretool"><i class="hl-forward"></i> Share</a>
                        </div>
                     </ul>
                  </div>
                  <div class="collapse" id="moretool">
                     <ul class="nav nav-pills x-nav-justified">
                        <li class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></li>
                        <div class="fb-save" data-uri="" data-size="small"></div>
                     </ul>
                  </div>
               
                  <div class="clearfix"></div>
                  <div class="clearfix"></div>
                  <div class="title-block">
                        <h1 class="entry-title"><a href="#" title="{{$movie->title}}" class="tl">{{$movie->title}}</a></h1>
                     </div>
                  <div class="entry-content htmlwrap clearfix collapse" id="expand-post-content">
                     <article id="post-37976" class="item-content post-37976"></article>
                  </div>
                  <div class="clearfix"></div>
                  <div class="text-center">
                     <div id="halim-ajax-list-server"></div>
                  </div>
                  <div id="halim-list-server">
                     <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active server-1"><a href="#server-0" aria-controls="server-0" role="tab" data-toggle="tab"><i class="hl-server"></i>
                           @if ($movie->resolution == 0)
                            HD
                           @elseif($movie->resolution == 1)
                              SD
                           @elseif($movie->resolution == 2)
                              HDCam
                           @elseif($movie->resolution == 3)
                              Cam
                           @elseif($movie->resolution == 4)
                              FULL HD
                           @endif
                        </a></li>
                        <li role="presentation" class="active server-1"><a href="#server-0" aria-controls="server-0" role="tab" data-toggle="tab"><i class="hl-server"></i> 
                           @if ($movie->subtitle == 0)
                              Phụ đề
                           @elseif($movie->subtitle == 1)
                              Thuyết minh
                           @endif

                        </a></li>
                     </ul>
                     <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active server-1" id="server-0">
                           <div class="halim-server">
                              <ul class="halim-list-eps">
                              
                              @foreach ($movie->episode as $key => $sotap)
                                 <a href="{{url('xem-phim/'.$movie->slug.'/tap-'.$sotap->episode)}}"><li class="halim-episode"><span class="halim-btn halim-btn-2 {{ $tapphim==$sotap->episode ? 'active': ''}} halim-info-1-1 box-shadow" data-post-id="37976" data-server="1" data-episode="1" data-position="first" data-embed="0" data-title="Xem phim {{$movie->title}} - Tập {{$sotap->episode}}" data-h1="{{$movie->title}} - tập {{$sotap->episode}}">{{$sotap->episode}}</span></li></a>
                              @endforeach
                              
                              </ul>
                              <div class="clearfix"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="htmlwrap clearfix">
                     <div id="lightout"></div>
                  </div>
            </section>
            <section class="related-movies">
            <div id="halim_related_movies-2xx" class="wrap-slider">
            <div class="section-bar clearfix">
            <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
            </div>
            <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
            @foreach ($related as $key => $relate)
                        <article class="thumb grid-item post-38498">
                           <div class="halim-item">
                              <a class="halim-thumb" href="{{route('movie', $relate->slug)}}" title="{{$relate->title}}">
                                 <figure><img class="lazy img-responsive" src="{{asset('uploads/movie/'.$relate->image)}}" alt="{{$relate->title}}" title="{{$relate->title}}"></figure>
                                 <span class="status">
                                    @if ($relate->resolution == 0)
                                       HD
                                    @elseif($relate->resolution == 1)
                                       SD
                                    @elseif($relate->resolution == 2)
                                       HDCam
                                    @elseif($relate->resolution == 3)
                                       Cam
                                    @elseif($relate->resolution == 4)
                                       FULL HD
                                    @elseif($relate->resolution == 5)
                                       Trailer
                                    @endif
                                 </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                    @if ($relate->subtitle == 0)
                                    @if($relate->resolution != 5)
                                       Phụ đề
                                    @endif
                                    @if($relate->season != 0)
                                       - Season {{$relate->season}}
                                    @endif
                                 @elseif($relate->subtitle == 1)
                                    @if($relate->resolution != 5)
                                       Thuyết minh
                                    @endif
                                    @if($relate->season != 0)
                                       - Season {{$relate->season}}
                                    @endif
                                 @endif
                                 </span> 
                                 <div class="icon_overlay"></div>
                                 <div class="halim-post-title-box">
                                    <div class="halim-post-title ">
                                       <p class="entry-title">{{$relate->title}}</p>
                                       <p class="original_title">{{$relate->name_english}}</p>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </article>
                     @endforeach
            </div>
            <script>
               jQuery(document).ready(function($) {				
               var owl = $('#halim_related_movies-2');
               owl.owlCarousel({loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 4}}})});
            </script>
            </div>
            </section>
         </main>
@endsection