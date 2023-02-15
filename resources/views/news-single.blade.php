@extends('layouts.app')

@section('title')
    {{ $news->slug }}
@endsection

@section('css')
    
@endsection

@section('content')
<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image "  data-bs-bg="{{ asset('images/bg-news.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">{{ $news->title }}</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="{{ url('/news') }}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> News</a></li>
                            <li>{{ $news->title }}</li>
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
        <div class="col-lg-12">
            <div class="ltn__blog-details-wrap">
                <div class="ltn__page-details-inner ltn__blog-details-inner">
                    <h2 class="ltn__blog-title">{{ $news->title }}</h2>
                    <div class="ltn__blog-meta">
                        <ul>
                            <li class="ltn__blog-author">
                                <a href="#">By: {{ $news->user->name }}</a>
                            </li>
                            <li class="ltn__blog-date">
                                <i class="far fa-calendar-alt"></i>{{ \Carbon\Carbon::parse($news->created_at)->toFormattedDateString() }}
                            </li>
                        </ul>
                    </div>
                    <div>
                        <img src="{{ asset('images/').'/'.$news->featured_image }}" alt="Image">
                    </div>
                    <div>
                        {!! $news->content !!}
                    </div>
                </div>
              
                <hr>
                
            </div>
        </div>
    </div>
</div>
@endsection