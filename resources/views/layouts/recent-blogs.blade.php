<div class="ltn__blog-area pt-115 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area ltn__section-title-2--- text-center">
                            <h6 class="section-subtitle section-subtitle-2--- ltn__secondary-color">News & Blogs</h6>
                            <h1 class="section-title">Leatest News Feeds</h1>
                        </div>
                    </div>
                </div>
                <div class="row  ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
                    @foreach ($news as $n )
                        <!-- Blog Item -->
                        <div class="col-lg-12">
                            <div class="ltn__blog-item ltn__blog-item-3">
                                <div class="ltn__blog-img">
                                    <a href="{{ url('news/'.$n->slug) }}"><img src="{{ asset('images/').'/'.$n->featured_image }}" alt="#"></a>
                                </div>
                                <div class="ltn__blog-brief">
                                    <div class="ltn__blog-meta">
                                        <ul>
                                            <li class="ltn__blog-author">
                                                <a href="#"><i class="far fa-user"></i>by: {{ $n->user->name }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="ltn__blog-title"><a href="{{ url('news/'.$n->slug) }}">{{ $n->title }}</a></h3>
                                    <div class="ltn__blog-meta-btn">
                                        <div class="ltn__blog-meta">
                                            <ul>
                                                <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($n->created_at)->toFormattedDateString() }}</li>
                                            </ul>
                                        </div>
                                        <div class="ltn__blog-btn">
                                            <a href="{{ url('news/'.$n->slug) }}">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>