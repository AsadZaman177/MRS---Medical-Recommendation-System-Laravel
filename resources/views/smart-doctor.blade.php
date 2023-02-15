@extends('layouts.app')

@section('title')
    {{ $cms->page_title }}
@endsection

@section('css')
    <style>
        .ltn__breadcrumb-area{
            margin-bottom: 0px!important;
        }
        .custom-t{
                height: 40px!important;
            }
    </style>
@endsection

@section('content')
<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image "  data-bs-bg="{{ asset('images/'.'/'.$cms->page_bg_img) }}">
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
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->



<!-- SEARCH Resultt -->
<div class="ltn__product-area ltn__product-gutter pt-115 pb-70">
    <div class="container">

        <div class="row mb-5">
            <div class="col-lg-6">
                <form id="#123" method="get" action="#">
                    <div class="mb-3 row">
                        <label for="age" class="col-sm-4 col-form-label"><strong style="color: #000">Age:</strong></label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="age" value="" placeholder="Age">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="age" class="col-sm-4 col-form-label"><strong style="color: #000">Gender:</strong></label>
                        <div class="col-sm-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                                <label class="form-check-label" for="male"><strong style="color: #000">Male</strong></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                <label class="form-check-label" for="female"><strong style="color: #000">Female</strong></label>
                            </div>
                        </div>
                    </div>
        
                    <div class="mb-3 row">
                        <label for="age" class="col-sm-4 col-form-label"><strong style="color: #000">Body Part:</strong></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control custom-t" id="head" value="" placeholder="Body Part">
                        </div>
                    </div>
        
                    <div class="mb-3 row">
                        <label for="age" class="col-sm-4 col-form-label"><strong style="color: #000">Select Symptoms:</strong></label>
                        <div class="col-sm-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="sneezing" value="sneezing">
                                <label class="form-check-label" for="sneezing">Sneezing</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="coughing" value="coughing">
                                <label class="form-check-label" for="coughing">Coughing</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="stuffy_nose" value="stuffy_nose">
                                <label class="form-check-label" for="stuffy_nose">Stuffy Nose</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="sore_throat" value="sore_throat">
                                <label class="form-check-label" for="sore_throat">Sore Throat</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="watery_eyes" value="watery_eyes">
                                <label class="form-check-label" for="watery_eyes">Watery Eyes</label>
                                </div>
                        </div>
                    </div>
                        <button type="submit" class="theme-btn-1 btn btn-effect-1 text-uppercase">Diagnose Now</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2 text-center">
                    <h1 class="section-title">Best Recommended Medicines</h1>
                </div>
            </div>
        </div>
        <div class="row ltn__tab-product-slider-one-active--- slick-arrow-1">
            <!-- ltn__product-item -->
            <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="ltn__product-item ltn__product-item-3 text-center">
                    <div class="product-img">
                        <a href="product-details.html"><img src="{{ asset('frontend/img/product-2/1.png') }}"
                                alt="#"></a>
                        <div class="product-badge">
                            <ul>
                                <li class="sale-badge">Recommend</li>
                            </ul>
                        </div>
                        <div class="product-hover-action">
                            <ul>
                                <li>
                                    <a href="#" title="Quick View" data-bs-toggle="modal"
                                        data-bs-target="#quick_view_modal">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Add to Cart" data-bs-toggle="modal"
                                        data-bs-target="#add_to_cart_modal">
                                        <i class="fas fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Wishlist" data-bs-toggle="modal"
                                        data-bs-target="#liton_wishlist_modal">
                                        <i class="far fa-heart"></i></a>
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
                        <h2 class="product-title"><a href="product-details.html">Antiseptic Spray</a></h2>
                        <div class="product-price">
                            <span>$32.00</span>
                            <del>$46.00</del>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ltn__product-item -->
            <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="ltn__product-item ltn__product-item-3 text-center">
                    <div class="product-img">
                        <a href="product-details.html"><img src="{{ asset('frontend/img/product-2/2.png') }}"
                                alt="#"></a>
                        <div class="product-hover-action">
                            <ul>
                                <li>
                                    <a href="#" title="Quick View" data-bs-toggle="modal"
                                        data-bs-target="#quick_view_modal">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Add to Cart" data-bs-toggle="modal"
                                        data-bs-target="#add_to_cart_modal">
                                        <i class="fas fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Wishlist" data-bs-toggle="modal"
                                        data-bs-target="#liton_wishlist_modal">
                                        <i class="far fa-heart"></i></a>
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
                        <h2 class="product-title"><a href="product-details.html">Digital Stethoscope</a>
                        </h2>
                        <div class="product-price">
                            <span>$25.00</span>
                            <del>$35.00</del>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ltn__product-item -->
            <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="ltn__product-item ltn__product-item-3 text-center">
                    <div class="product-img">
                        <a href="product-details.html"><img src="{{ asset('frontend/img/product-2/3.png') }}"
                                alt="#"></a>
                        <div class="product-badge">
                            <ul>
                                <li class="sale-badge">Recommend</li>
                            </ul>
                        </div>
                        <div class="product-hover-action">
                            <ul>
                                <li>
                                    <a href="#" title="Quick View" data-bs-toggle="modal"
                                        data-bs-target="#quick_view_modal">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Add to Cart" data-bs-toggle="modal"
                                        data-bs-target="#add_to_cart_modal">
                                        <i class="fas fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Wishlist" data-bs-toggle="modal"
                                        data-bs-target="#liton_wishlist_modal">
                                        <i class="far fa-heart"></i></a>
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
                        <h2 class="product-title"><a href="product-details.html">Cosmetic Containers</a>
                        </h2>
                        <div class="product-price">
                            <span>$75.00</span>
                            <del>$92.00</del>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ltn__product-item -->
            <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="ltn__product-item ltn__product-item-3 text-center">
                    <div class="product-img">
                        <a href="product-details.html"><img src="{{ asset('frontend/img/product-2/3.png') }}"
                                alt="#"></a>
                        <div class="product-badge">
                            <ul>
                                <li class="sale-badge">Recommend</li>
                            </ul>
                        </div>
                        <div class="product-hover-action">
                            <ul>
                                <li>
                                    <a href="#" title="Quick View" data-bs-toggle="modal"
                                        data-bs-target="#quick_view_modal">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Add to Cart" data-bs-toggle="modal"
                                        data-bs-target="#add_to_cart_modal">
                                        <i class="fas fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Wishlist" data-bs-toggle="modal"
                                        data-bs-target="#liton_wishlist_modal">
                                        <i class="far fa-heart"></i></a>
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
                        <h2 class="product-title"><a href="product-details.html">Cosmetic Containers</a>
                        </h2>
                        <div class="product-price">
                            <span>$78.00</span>
                            <del>$85.00</del>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ltn__product-item -->
            <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="ltn__product-item ltn__product-item-3 text-center">
                    <div class="product-img">
                        <a href="product-details.html"><img src="{{ asset('frontend/img/product-2/5.png') }}"
                                alt="#"></a>
                        <div class="product-badge">
                            <ul>
                                <li class="sale-badge">Recommend</li>
                            </ul>
                        </div>
                        <div class="product-hover-action">
                            <ul>
                                <li>
                                    <a href="#" title="Quick View" data-bs-toggle="modal"
                                        data-bs-target="#quick_view_modal">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Add to Cart" data-bs-toggle="modal"
                                        data-bs-target="#add_to_cart_modal">
                                        <i class="fas fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Wishlist" data-bs-toggle="modal"
                                        data-bs-target="#liton_wishlist_modal">
                                        <i class="far fa-heart"></i></a>
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
                        <h2 class="product-title"><a href="product-details.html">Blue Hand Gloves</a></h2>
                        <div class="product-price">
                            <span>$150.00</span>
                            <del>$180.00</del>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ltn__product-item -->
            <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="ltn__product-item ltn__product-item-3 text-center">
                    <div class="product-img">
                        <a href="product-details.html"><img src="{{ asset('frontend/img/product-2/6.png') }}"
                                alt="#"></a>
                        <div class="product-badge">
                            <ul>
                                <li class="sale-badge">Recommend</li>
                            </ul>
                        </div>
                        <div class="product-hover-action">
                            <ul>
                                <li>
                                    <a href="#" title="Quick View" data-bs-toggle="modal"
                                        data-bs-target="#quick_view_modal">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Add to Cart" data-bs-toggle="modal"
                                        data-bs-target="#add_to_cart_modal">
                                        <i class="fas fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Wishlist" data-bs-toggle="modal"
                                        data-bs-target="#liton_wishlist_modal">
                                        <i class="far fa-heart"></i></a>
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
                        <h2 class="product-title"><a href="product-details.html">Thermometer Gun</a></h2>
                        <div class="product-price">
                            <span>$150.00</span>
                            <del>$180.00</del>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ltn__product-item -->
            <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="ltn__product-item ltn__product-item-3 text-center">
                    <div class="product-img">
                        <a href="product-details.html"><img src="{{ asset('frontend/img/product-2/7.png') }}"
                                alt="#"></a>
                        <div class="product-badge">
                            <ul>
                                <li class="sale-badge">Recommend</li>
                            </ul>
                        </div>
                        <div class="product-hover-action">
                            <ul>
                                <li>
                                    <a href="#" title="Quick View" data-bs-toggle="modal"
                                        data-bs-target="#quick_view_modal">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Add to Cart" data-bs-toggle="modal"
                                        data-bs-target="#add_to_cart_modal">
                                        <i class="fas fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Wishlist" data-bs-toggle="modal"
                                        data-bs-target="#liton_wishlist_modal">
                                        <i class="far fa-heart"></i></a>
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
                        <h2 class="product-title"><a href="product-details.html">Cosmetic Containers</a>
                        </h2>
                        <div class="product-price">
                            <span>$75.00</span>
                            <del>$92.00</del>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ltn__product-item -->
            <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                <div class="ltn__product-item ltn__product-item-3 text-center">
                    <div class="product-img">
                        <a href="product-details.html"><img src="{{ asset('frontend/img/product-2/8.png') }}"
                                alt="#"></a>
                        <div class="product-badge">
                            <ul>
                                <li class="sale-badge">Recommend</li>
                            </ul>
                        </div>
                        <div class="product-hover-action">
                            <ul>
                                <li>
                                    <a href="#" title="Quick View" data-bs-toggle="modal"
                                        data-bs-target="#quick_view_modal">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Add to Cart" data-bs-toggle="modal"
                                        data-bs-target="#add_to_cart_modal">
                                        <i class="fas fa-shopping-cart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Wishlist" data-bs-toggle="modal"
                                        data-bs-target="#liton_wishlist_modal">
                                        <i class="far fa-heart"></i></a>
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
                        <h2 class="product-title"><a href="product-details.html">Cosmetic Containers</a>
                        </h2>
                        <div class="product-price">
                            <span>$78.00</span>
                            <del>$85.00</del>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
        </div>
    </div>
</div>
<!-- SMALL PRODUCT LIST AREA END -->
@endsection