    <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
        <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
            <div class="section-bar clearfix">
                <div class="section-title">
                    <span>Phim hot</span>
                </div>
            </div>
            <section class="tab-content">
                <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                    <div class="halim-ajax-popular-post-loading hidden"></div>
                    <div id="halim-ajax-popular-post" class="popular-post">
                    
                    @foreach ($movie_sidebar as $key => $movie_side)
                        
                        <div class="item post-37176">
                            <a href="{{route('movie',$movie_side->slug)}}" title="{{$movie_side->title}}">
                                <div class="item-link">
                                    <img src="{{asset('uploads/movie/'.$movie_side->image)}}" class="lazy post-thumb" alt="{{$movie_side->title}}" title="{{$movie_side->title}}" />
                                    <span class="is_trailer">
                                        @if ($movie_side->resolution == 0)
                                            HD
                                        @elseif($movie_side->resolution == 1)
                                            SD
                                        @elseif($movie_side->resolution == 2)
                                            HDCam
                                        @elseif($movie_side->resolution == 3)
                                            Cam
                                        @elseif($movie_side->resolution == 4)
                                            FULL HD
                                        @endif
                                    </span>
                                </div>
                                <p class="title">{{$movie_side->title}}</p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                            <div style="float: left;">
                                <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                                    <span style="width: 0%"></span>
                                </span>
                            </div>
                        </div>
                    @endforeach
                    
                    </div>
                </div>
            </section>
            <div class="clearfix"></div>
        </div>
    </aside>
    <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
        <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
            <div class="section-bar clearfix">
                <div class="section-title">
                    <span>Phim sắp chiếu</span>
                </div>
            </div>
            <section class="tab-content">
                <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                    <div class="halim-ajax-popular-post-loading hidden"></div>
                    <div id="halim-ajax-popular-post" class="popular-post">
                    
                    @foreach ($movie_trailer as $key => $movie_side)
                        
                        <div class="item post-37176">
                            <a href="{{route('movie',$movie_side->slug)}}" title="{{$movie_side->title}}">
                                <div class="item-link">
                                    <img src="{{asset('uploads/movie/'.$movie_side->image)}}" class="lazy post-thumb" alt="{{$movie_side->title}}" title="{{$movie_side->title}}" />
                                    <span class="is_trailer">
                                        @if ($movie_side->resolution == 0)
                                            HD
                                        @elseif($movie_side->resolution == 1)
                                            SD
                                        @elseif($movie_side->resolution == 2)
                                            HDCam
                                        @elseif($movie_side->resolution == 3)
                                            Cam
                                        @elseif($movie_side->resolution == 4)
                                            FULL HD
                                        @elseif($movie_side->resolution == 5)
                                            Trailer
                                        @endif
                                    </span>
                                </div>
                                <p class="title">{{$movie_side->title}}</p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                            <div style="float: left;">
                                <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                                    <span style="width: 0%"></span>
                                </span>
                            </div>
                        </div>
                    @endforeach
                    
                    </div>
                </div>
            </section>
            <div class="clearfix"></div>
        </div>
    </aside>
    {{--  <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
        <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
            <div class="section-bar clearfix">
                <div class="section-title">
                    <span>Top Views</span>
                 </div>
            </div>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link filter-sidebar" id="pills-home-tab" data-toggle="pill" href="#ngay" role="tab" aria-controls="pills-home" aria-selected="true">Ngày</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link filter-sidebar" id="pills-profile-tab" data-toggle="pill" href="#tuan" role="tab" aria-controls="pills-profile" aria-selected="false">Tuần</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link filter-sidebar" id="pills-contact-tab" data-toggle="pill" href="#thang" role="tab" aria-controls="pills-contact" aria-selected="false">Tháng</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade" id="ngay" role="tabpanel" aria-labelledby="pills-home-tab">
                    <span id="show0"></span>
                </div>
                <div class="tab-pane fade" id="tuan" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <span id="show1"></span>
                </div>
                <div class="tab-pane fade" id="thang" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <span id="show2"></span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </aside>  --}}