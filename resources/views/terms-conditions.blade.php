@extends('layouts.app')

@section('title')
{{ $cms->page_title }}
@endsection

@section('css')
    
@endsection

@section('content')
<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image "  data-bs-bg="{{ asset('images/').'/'.$cms->page_bg_img }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">{{ $cms->page_title }}</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="{{ url('/') }}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>{{ $cms->page_title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<div class="ltn__about-us-area pt-25--- pb-120 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                {!! $cms->page_desc !!}
            </div>
        </div>
    </div>
</div>
@endsection