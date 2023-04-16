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
                    <span>Top Views</span>
                 </div>
            </div>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#ngay" role="tab" aria-controls="pills-home" aria-selected="true">Ngày</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#tuan" role="tab" aria-controls="pills-profile" aria-selected="false">Tuần</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#thang" role="tab" aria-controls="pills-contact" aria-selected="false">Tháng</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="ngay" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="item post-37176">
                        <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                        <div class="item-link">
                            <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798" class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                            <span class="is_trailer">Trailer</span>
                        </div>
                        <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                       </a>
                       <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                       <div style="float: left;">
                          <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                          <span style="width: 0%"></span>
                          </span>
                       </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tuan" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="item post-37176">
                        <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                        <div class="item-link">
                            <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798" class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                            <span class="is_trailer">Trailer</span>
                        </div>
                        <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                       </a>
                       <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                       <div style="float: left;">
                          <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                          <span style="width: 0%"></span>
                          </span>
                       </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="thang" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <div class="item post-37176">
                        <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                        <div class="item-link">
                            <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798" class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                            <span class="is_trailer">Trailer</span>
                        </div>
                        <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                       </a>
                       <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                       <div style="float: left;">
                          <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                          <span style="width: 0%"></span>
                          </span>
                       </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </aside>