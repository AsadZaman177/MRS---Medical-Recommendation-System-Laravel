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
                    <form id="#123" method="get" action="#">
                        <input type="text" class="form-control" name="name" placeholder="Search Here...">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="generic" value="generic">
                            <label class="form-check-label" for="generic"><strong style="color: #000">Generic</strong></label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="brand" value="brand">
                            <label class="form-check-label" for="brand"><strong style="color: #000">Brand</strong></label>
                          </div>
                          <button type="submit" class="theme-btn-1 btn btn-effect-1 text-uppercase">Search Now</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- SEARCH Resultt -->
<div class="ltn__small-product-list-area section-bg-1 pt-115 pb-90 mb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2 text-center">
                    <h1 class="section-title">Search Result</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- small-product-item -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="ltn__small-product-item">
                    <div class="small-product-item-img">
                        <a href="product-details.html"><img src="{{ asset('frontend/img/product/1.png') }}"
                                alt="Image"></a>
                    </div>
                    <div class="small-product-item-info">
                        <div class="product-ratting">
                            <ul>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                <li><a href="#"><i class="far fa-star"></i></a></li>
                            </ul>
                        </div>
                        <h2 class="product-title"><a href="product-details.html">Antiseptic Spray</a></h2>
                        <h2 class="product-title">Brand: Vamol</h2>
                        <h2 class="product-title">Manufacturer: Vamol Pharma</h2>
                        <div class="product-price">
                            <span>$129.00</span>
                            <del>$140.00</del>
                        </div>
                        <a href="#" class="product-price">Add To Cart</a>
                    </div>
                </div>
            </div>
            <!-- small-product-item -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="ltn__small-product-item">
                    <div class="small-product-item-img">
                        <a href="product-details.html"><img src="{{ asset('frontend/img/product/1.png') }}"
                                alt="Image"></a>
                    </div>
                    <div class="small-product-item-info">
                        <div class="product-ratting">
                            <ul>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                <li><a href="#"><i class="far fa-star"></i></a></li>
                            </ul>
                        </div>
                        <h2 class="product-title"><a href="product-details.html">Antiseptic Spray</a></h2>
                        <h2 class="product-title">Brand: Vamol</h2>
                        <h2 class="product-title">Manufacturer: Vamol Pharma</h2>
                        <div class="product-price">
                            <span>$129.00</span>
                            <del>$140.00</del>
                        </div>
                        <a href="#" class="product-price">Add To Cart</a>
                    </div>
                </div>
            </div>
            <!-- small-product-item -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="ltn__small-product-item">
                    <div class="small-product-item-img">
                        <a href="product-details.html"><img src="{{ asset('frontend/img/product/1.png') }}"
                                alt="Image"></a>
                    </div>
                    <div class="small-product-item-info">
                        <div class="product-ratting">
                            <ul>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                <li><a href="#"><i class="far fa-star"></i></a></li>
                            </ul>
                        </div>
                        <h2 class="product-title"><a href="product-details.html">Antiseptic Spray</a></h2>
                        <h2 class="product-title">Brand: Vamol</h2>
                        <h2 class="product-title">Manufacturer: Vamol Pharma</h2>
                        <div class="product-price">
                            <span>$129.00</span>
                            <del>$140.00</del>
                        </div>
                        <a href="#" class="product-price">Add To Cart</a>
                    </div>
                </div>
            </div>
            <!-- small-product-item -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="ltn__small-product-item">
                    <div class="small-product-item-img">
                        <a href="product-details.html"><img src="{{ asset('frontend/img/product/1.png') }}"
                                alt="Image"></a>
                    </div>
                    <div class="small-product-item-info">
                        <div class="product-ratting">
                            <ul>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                <li><a href="#"><i class="far fa-star"></i></a></li>
                            </ul>
                        </div>
                        <h2 class="product-title"><a href="product-details.html">Antiseptic Spray</a></h2>
                        <h2 class="product-title">Brand: Vamol</h2>
                        <h2 class="product-title">Manufacturer: Vamol Pharma</h2>
                        <div class="product-price">
                            <span>$129.00</span>
                            <del>$140.00</del>
                        </div>
                        <a href="#" class="product-price">Add To Cart</a>
                    </div>
                </div>
            </div>
            <!-- small-product-item -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="ltn__small-product-item">
                    <div class="small-product-item-img">
                        <a href="product-details.html"><img src="{{ asset('frontend/img/product/1.png') }}"
                                alt="Image"></a>
                    </div>
                    <div class="small-product-item-info">
                        <div class="product-ratting">
                            <ul>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                <li><a href="#"><i class="far fa-star"></i></a></li>
                            </ul>
                        </div>
                        <h2 class="product-title"><a href="product-details.html">Antiseptic Spray</a></h2>
                        <h2 class="product-title">Brand: Vamol</h2>
                        <h2 class="product-title">Manufacturer: Vamol Pharma</h2>
                        <div class="product-price">
                            <span>$129.00</span>
                            <del>$140.00</del>
                        </div>
                        <a href="#" class="product-price">Add To Cart</a>
                    </div>
                </div>
            </div>
            <!-- small-product-item -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="ltn__small-product-item">
                    <div class="small-product-item-img">
                        <a href="product-details.html"><img src="{{ asset('frontend/img/product/1.png') }}"
                                alt="Image"></a>
                    </div>
                    <div class="small-product-item-info">
                        <div class="product-ratting">
                            <ul>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                <li><a href="#"><i class="far fa-star"></i></a></li>
                            </ul>
                        </div>
                        <h2 class="product-title"><a href="product-details.html">Antiseptic Spray</a></h2>
                        <h2 class="product-title">Brand: Vamol</h2>
                        <h2 class="product-title">Manufacturer: Vamol Pharma</h2>
                        <div class="product-price">
                            <span>$129.00</span>
                            <del>$140.00</del>
                        </div>
                        <a href="#" class="product-price">Add To Cart</a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- SMALL PRODUCT LIST AREA END -->
@endsection