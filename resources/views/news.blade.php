@extends('layouts.app')

@section('title','News')

@section('css')
    
@endsection

@section('content')
<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image "  data-bs-bg="{{ asset('images/bg-news.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">News</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="index.html"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>News</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<div class="ltn__blog-area ltn__blog-item-3-normal mb-100">
    <div class="container">
        <div class="row">
            <!-- Blog Item -->
            @foreach($new as $n)
                <div class="col-lg-4 col-sm-6 col-12">
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
                            <h3 class="ltn__blog-title animated fadeIn"><a href="{{ url('news/'.$n->slug) }}">{{ $n->title }}</a></h3>
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
        <div class="row">
            <div class="col-lg-12 text-center">
                {!! $new->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection