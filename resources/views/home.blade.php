@extends('layouts.app')

@section('title','Home')

@section('content')
    <!-- Main AREA START (slider-3) -->
    <div class="ltn__contact-address-area pt-90 pb-90" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center ltn__secondary-color">{{ $cms->page_title }}</h1>
                    <p class="text-center">{{ $cms->page_desc }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <img src="{{ asset('images/').'/'.$cms->search_widget_img }}" alt="Icon Image">
                        </div>
                        <h3 class="animated fadeIn">{{ $cms->search_widget_title }}</h3>
                        <p>{{ $cms->search_widget_desc }}</p>
                        <a href="{{ url('/search-medcine') }}" class="theme-btn-1 btn btn-effect-1 text-uppercase">Search Now</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <img src="{{ asset('images/').'/'.$cms->buy_widget_img }}" alt="Icon Image">
                        </div>
                        <h3 class="animated fadeIn">{{ $cms->buy_widget_title }}</h3>
                        <p>{{ $cms->search_widget_desc }}</p>
                        <a href="{{ url('/shop') }}" class="theme-btn-1 btn btn-effect-1 text-uppercase">Buy Now</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <img src="{{ asset('images/').'/'.$cms->diagnose_img }}" alt="Icon Image">
                        </div>
                        <h3 class="animated fadeIn">{{ $cms->diagnose_title }}</h3>
                        <p>{{ $cms->diagnose_desc }}</p>
                        <a href="{{ url('/smart-doctor') }}" class="theme-btn-1 btn btn-effect-1 text-uppercase">Diagnose Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main AREA END -->

    <!-- FEATURE AREA START ( Feature - 3) -->
    <div class="ltn__feature-area mt-35 mt--65---">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__feature-item-box-wrap ltn__feature-item-box-wrap-2 ltn__border section-bg-1">
                        <div class="ltn__feature-item ltn__feature-item-8">
                            <div class="ltn__feature-icon">
                                <img src="{{ asset('images/').'/'.$cms->free_ship_icon }}" alt="#">
                            </div>
                            <div class="ltn__feature-info">
                                <h4>{{ $cms->free_ship_title }}</h4>
                                <p>{{ $cms->free_ship_desc }}</p>
                            </div>
                        </div>
                        <div class="ltn__feature-item ltn__feature-item-8">
                            <div class="ltn__feature-icon">
                                <img src="{{ asset('images/').'/'.$cms->return_icon }}" alt="#">
                            </div>
                            <div class="ltn__feature-info">
                                <h4>{{ $cms->return_title }}</h4>
                                <p>{{ $cms->return_desc }}</p>
                            </div>
                        </div>
                        <div class="ltn__feature-item ltn__feature-item-8">
                            <div class="ltn__feature-icon">
                                <img src="{{ asset('images/').'/'.$cms->secure_icon }}" alt="#">
                            </div>
                            <div class="ltn__feature-info">
                                <h4>{{ $cms->secure_title }}</h4>
                                <p>{{ $cms->secure_desc }}</p>
                            </div>
                        </div>
                        <div class="ltn__feature-item ltn__feature-item-8">
                            <div class="ltn__feature-icon">
                                <img src="{{ asset('images/').'/'.$cms->gifts_icon }}" alt="#">
                            </div>
                            <div class="ltn__feature-info">
                                <h4>{{ $cms->gifts_title }}</h4>
                                <p>{{ $cms->gifts_desc }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FEATURE AREA END -->

    <!-- PRODUCT TAB AREA START (product-item-3) -->
    <div class="ltn__product-tab-area ltn__product-gutter pt-115 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <!-- <h6 class="section-subtitle ltn__secondary-color">// Cars</h6> -->
                        <h1 class="section-title">{{ $cms->our_products_title }}</h1>
                        <p>{{ $cms->our_products_desc }}</p>
                    </div>
                
                    <div class="ltn__tab-menu ltn__tab-menu-2 ltn__tab-menu-top-right-- text-uppercase text-center">
                        <div class="nav">
                            @foreach ($categories as $category )
                                <a class="{{ $catTab == $category->id ? 'active show' : '' }}" data-bs-toggle="tab" href="#liton_tab_3_{{ $category->id }}">{{ $category->category }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-content">
                        @foreach ($categories as $category )
                            <div class="tab-pane fade  {{ $catTab == $category->id ? 'active show' : '' }}" id="liton_tab_3_{{ $category->id }}">
                                <div class="ltn__product-tab-content-inner">
                                    <div class="row ltn__tab-product-slider-one-active slick-arrow-1">
                                        <!-- ltn__product-item -->
                                        @foreach ($category->medicines as $medicine )
                                            <div class="col-lg-4">
                                                <div class="ltn__product-item ltn__product-item-3 text-center">
                                                    <div class="product-img">
                                                        <a href="{{ url('shop/'.$medicine->slug) }}"><img
                                                                src="{{ asset('images/medicines/').'/'.$medicine->image1 }}"
                                                                alt="#"></a>
                                                        @if ($medicine->sale_price)
                                                            <div class="product-badge">
                                                                <ul>
                                                                    <li class="sale-badge">Sale</li>
                                                                </ul>
                                                            </div>
                                                        @endif
                                                        <div class="product-hover-action">
                                                            <ul>
                                                                <li>
                                                                    <a href="#" title="Add to Cart" data-bs-toggle="modal"
                                                                        data-bs-target="#add_to_cart_modal">
                                                                        <i class="fas fa-shopping-cart"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <div class="product-ratting">
                                                            <ul>
                                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                <li><a href="#"><i class="fas fa-star-half-alt"></i></a>
                                                                </li>
                                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                                                <li class="review-total"> <a href="#"> (24)</a></li>
                                                            </ul>
                                                        </div>
                                                        <h2 class="product-title"><a href="{{ url('shop/'.$medicine->slug) }}">{{ $medicine->name }}</a></h2>
                                                        <div class="product-price">
                                                            <span>{{ $medicine->price }}</span>
                                                            @if($medicine->sale_price)
                                                                <del>{{ $medicine->sale_price }}</del>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <!--  -->
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT TAB AREA END -->


    <!-- COUNTDOWN AREA START -->
    @include('layouts.countdown')
    <!-- COUNTDOWN AREA END -->

    <!-- PRODUCT AREA START (product-item-3) -->
    <div class="ltn__product-area ltn__product-gutter pt-115 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h1 class="section-title">{{ $cms->sale_products_title }}</h1>
                        <p>{{ $cms->sale_products_desc }}</p>
                    </div>
                </div>
            </div>
            <div class="row ltn__tab-product-slider-one-active--- slick-arrow-1">
                @foreach ($medicine_onsale as $sale )
                     <!-- ltn__product-item -->
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="ltn__product-item ltn__product-item-3 text-center">
                            <div class="product-img">
                                <a href="{{ url('shop/'.$sale->slug) }}"><img src="{{ asset('images/medicines/').'/'.$sale->image1 }}"
                                        alt="#"></a>
                                <div class="product-badge">
                                    <ul>
                                        <li class="sale-badge">New</li>
                                    </ul>
                                </div>
                                <div class="product-hover-action">
                                    <ul>
                                        
                                        <li>
                                            <a href="#" title="Add to Cart" data-bs-toggle="modal"
                                                data-bs-target="#">
                                                <i class="fas fa-shopping-cart"></i>
                                            </a>
                                        </li>
                    
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-ratting">
                                    <ul>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                        <li><a href="#"><i class="far fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <h2 class="product-title"><a href="{{ url('shop/'.$sale->slug) }}">{{ $sale->name }}</a></h2>
                                <div class="product-price">
                                    <span>{{ $sale->price }}</span>
                                    <del>{{ $sale->sale_price }}</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                @endforeach
            </div>
        </div>
    </div>
    <!-- PRODUCT AREA END -->

    <!-- SMALL PRODUCT LIST AREA START -->
    <div class="ltn__small-product-list-area section-bg-1 pt-115 pb-90 mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h1 class="section-title">{{ $cms->featured_products_title }}</h1>
                        <p>{{ $cms->featured_products_desc }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($medicine_featured as $featured )
                    <!-- small-product-item -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="ltn__small-product-item">
                            <div class="small-product-item-img">
                                <a href="{{ url('shop/'.$featured->slug) }}"><img src="{{ asset('images/medicines/'.$featured->image1) }}"></a>
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
                                <h2 class="product-title"><a href="{{ url('shop/'.$featured->slug) }}">{{ $featured->name }}</a></h2>
                                <div class="product-price">
                                    @if($featured->sale_price)
                                        <span>Rs. {{ $featured->sale_price }}</span>
                                        <del>Rs. {{ $featured->price }}</del>
                                    @else
                                        <span>Rs. {{ $featured->price }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- SMALL PRODUCT LIST AREA END -->


    <!-- TESTIMONIAL AREA START (testimonial-4) -->
    @include('layouts.testimonial')
    <!-- TESTIMONIAL AREA END -->

    <!-- BLOG AREA START (blog-3) -->
    @include('layouts.recent-blogs')
    <!-- BLOG AREA END -->

    <!-- Product Modals  -->
    @include('layouts.product-modals')
    <!-- Product End  -->
@endsection
