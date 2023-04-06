@extends('layouts.app')

@section('title')
    {{ $cms->page_title }}
@endsection

@section('css')
    <style>
        .ltn__breadcrumb-area{
            margin-bottom: 0px!important;
        }
    </style>
@endsection

@section('content')
<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image "  data-bs-bg="{{ asset('images/').'/'.$cms->page_bg_img }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">{{ $cms->page_title }}</h1>
                </div>
            </div>
            <div class="col-lg-12">
                {!! $cms->page_desc !!}
            </div>
            <div class="col-lg-6">
                <div class="ltn__breadcrumb-list">
                    <form action="{{ url('/search-med') }}" method="POST">
                        @csrf
                        <input type="text" class="form-control" name="search" placeholder="Search Here..." required>
                        <!--
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="formuale" value="Formule">
                            <label class="form-check-label" for="generic"><strong style="color: #000">Generic</strong></label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="type" id="brand" value="brand">
                        <label class="form-check-label" for="brand"><strong style="color: #000">Brand</strong></label>
                        </div> -->
                          <button type="submit" class="theme-btn-1 btn btn-effect-1 text-uppercase">Search Now</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->


@endsection