@extends('layouts.app')

@section('title')
{{ $medicine->slug }}
@endsection

@section('css')
    <style>
       input[type="radio"] {
    display: none; /* hide the radio buttons */
  }
  
  label {
    color: #ddd; /* set the color of the star icons to gray */
    cursor: pointer; /* make the star icons clickable */
  }
  
  .filled {
    color: #ffc107; /* set the color of the selected star icons to yellow */
  }
    </style>
@endsection

@section('content')
<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image "  data-bs-bg="{{ asset('images/bg-news.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">{{ $medicine->name }}</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="{{ url('/') }}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>{{ $medicine->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- SHOP DETAILS AREA START -->
<div class="ltn__shop-details-area pb-85">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="ltn__shop-details-inner mb-60">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="ltn__shop-details-img-gallery">
                                <div class="ltn__shop-details-large-img">
                                    <div class="single-large-img">
                                        <a href="{{ asset('images/medicines/'.$medicine->image1) }}" data-rel="lightcase:myCollection">
                                            <img src="{{ asset('images/medicines/'.$medicine->image1) }}" alt="Image">
                                        </a>
                                    </div>
                                    @if(!empty($medicine->image2))
                                        <div class="single-large-img">
                                            <a href="{{ asset('images/medicines/'.$medicine->image2) }}" data-rel="lightcase:myCollection">
                                                <img src="{{ asset('images/medicines/'.$medicine->image2) }}" alt="Image">
                                            </a>
                                        </div>
                                    @endif
                                    @if(!empty($medicine->image3))
                                        <div class="single-large-img">
                                            <a href="{{ asset('images/medicines/'.$medicine->image3) }}" data-rel="lightcase:myCollection">
                                                <img src="{{ asset('images/medicines/'.$medicine->image3) }}" alt="Image">
                                            </a>
                                        </div>
                                    @endif
                                </div>
                                <div class="ltn__shop-details-small-img slick-arrow-2">
                                    <div class="single-small-img">
                                        <img src="{{ asset('images/medicines/'.$medicine->image1) }}" alt="Image">
                                    </div>
                                    @if(!empty($medicine->image2))
                                        <div class="single-small-img">
                                            <img src="{{ asset('images/medicines/'.$medicine->image2) }}" alt="Image">
                                        </div>
                                    @endif
                                    @if(!empty($medicine->image2))
                                        <div class="single-small-img">
                                            <img src="{{ asset('images/medicines/'.$medicine->image3) }}" alt="Image">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="modal-product-info shop-details-info pl-0">
                                <div class="product-ratting">
                                    @php
                                        $averageRating = $medicine->reviews()->avg('rating');
                                        
                                    @endphp
                                    <ul>
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $averageRating)
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            @elseif ($i == ceil($averageRating))
                                                <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            @else
                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                            @endif
                                        @endfor
                                        <li class="review-total"><a href="#"> ({{ $medicine->reviews()->count() }} Reviews)</a></li>
                                    </ul>
                                </div>
                                <h3>{{ $medicine->name }}</h3>
                                <div class="product-price">
                                    @if($medicine->sale_price)
                                        <span>Rs. {{ $medicine->sale_price }}</span>
                                        <del>{{ $medicine->price }}</del>
                                    @else
                                        <span>Rs. {{ $medicine->price }}</span>
                                    @endif
                                </div>
                                <div class="modal-product-meta ltn__product-details-menu-1">
                                    <ul>
                                        <li>
                                            <strong>Categories:</strong> 
                                            <span>
                                                <a href="#">{{ $medicine->medicine_category->category }}</a>
                                            </span>
                                        </li>
                                        <li>
                                            <strong>Company:</strong> 
                                            <span>
                                                <a href="#">{{ $medicine->medicine_company->company }}</a>
                                            </span>
                                        </li>
                                        <li>
                                            <strong>Brand:</strong> 
                                            <span>
                                                <a href="#">{{ $medicine->medicine_brand->brand }}</a>
                                            </span>
                                        </li>
                                        <li>
                                            <strong>Formulae:</strong> 
                                            <span>
                                                <a href="#">{{ $medicine->medicine_formulae->formulae }}</a>
                                            </span>
                                        </li>
                                        <li>
                                            <strong>Medicine Type:</strong> 
                                            <span>
                                                <a href="#">{{ $medicine->medicine_type->type }}</a>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ltn__product-details-menu-2">
                                    <ul>
                                        <li>
                                            <a href="#" class="theme-btn-1 btn btn-effect-1" title="Add to Cart" id="addtocart" data-id="{{ $medicine->id }}">
                                                <i class="fas fa-shopping-cart"></i>
                                                <span>ADD TO CART</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <hr>
                                <div class="ltn__social-media">
                                    <ul>
                                        <li>Share:</li>
                                        <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                        <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                        
                                    </ul>
                                </div>
                                <hr>
                                <div class="ltn__safe-checkout">
                                    <h5>Guaranteed Safe Checkout</h5>
                                    <img src="{{ asset('frontend/img/icons/payment-2.png') }}" alt="Payment Image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Shop Tab Start -->
                <div class="ltn__shop-details-tab-inner ltn__shop-details-tab-inner-2">
                    <div class="ltn__shop-details-tab-menu">
                        <div class="nav">
                            <a class="active show" data-bs-toggle="tab" href="#liton_tab_details_1_1">Description</a>
                            <a data-bs-toggle="tab" href="#liton_tab_details_1_2" class="">Reviews</a>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_tab_details_1_1">
                            <div class="ltn__shop-details-tab-content-inner">
                                <p>{!! $medicine->description !!}</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_tab_details_1_2">
                            <div class="ltn__shop-details-tab-content-inner">
                                <h4 class="title-2">Customer Reviews</h4>
                                <div class="product-ratting">
                                    @php
                                        $averageRating = $medicine->reviews()->avg('rating');
                                        
                                    @endphp
                                    <ul>
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $averageRating)
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            @elseif ($i == ceil($averageRating))
                                                <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            @else
                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                            @endif
                                        @endfor
                                        <li class="review-total"><a href="#"> ({{ $medicine->reviews()->count() }} Reviews)</a></li>
                                    </ul>
                                </div>
                                <hr>
                                <!-- comment-area -->
                                <div class="ltn__comment-area mb-30">
                                    <div class="ltn__comment-inner">
                                        <ul>
                                            @foreach ($medicine->reviews as $review)
                                                <li>
                                                    <div class="ltn__comment-item clearfix">
                                                        <div class="ltn__commenter-img">
                                                            <img src="{{ asset('/images/user-avator.png') }}" alt="Image">
                                                        </div>
                                                        <div class="ltn__commenter-comment">
                                                            <h6><a href="#">{{ $review->name }}</a></h6>
                                                            <div class="product-ratting">
                                                                <ul>
                                                                    @for ($i = 1; $i <= 5; $i++)
                                                                        @if ($i <= $review->rating)
                                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                        @else
                                                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                                                        @endif
                                                                    @endfor
                                                                </ul>
                                                            </div>
                                                            <p>{{ $review->comment }}.</p>
                                                            <span class="ltn__comment-reply-btn">{{ \Carbon\Carbon::parse($medicine->created_at)->toFormattedDateString() }}</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <!-- comment-reply -->
                                <div class="ltn__comment-reply-area ltn__form-box mb-30">
                                    <form action="{{ url('review/store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="medicine_id" value="{{  $medicine->id }}">
                                        <h4 class="title-2">Add a Review</h4>
                                        <div class="mb-30">
                                            <div class="add-a-review">
                                                <h6>Your Ratings: </h6>
                                                <div class="product-rating">
                                                    <input type="radio" id="star1" name="rating" value="1">
                                                    <label for="star1"><i class="fas fa-star"></i></label>
                                                    <input type="radio" id="star2" name="rating" value="2">
                                                    <label for="star2"><i class="fas fa-star"></i></label>
                                                    <input type="radio" id="star3" name="rating" value="3">
                                                    <label for="star3"><i class="fas fa-star"></i></label>
                                                    <input type="radio" id="star4" name="rating" value="4">
                                                    <label for="star4"><i class="fas fa-star"></i></label>
                                                    <input type="radio" id="star5" name="rating" value="5">
                                                    <label for="star5"><i class="fas fa-star"></i></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-item input-item-textarea ltn__custom-icon">
                                            <textarea name="comment" placeholder="Type your comments...." required></textarea>
                                            @error('comment')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="input-item input-item-name ltn__custom-icon">
                                            <input type="text" name="name" placeholder="Type your name...." required>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="input-item input-item-email ltn__custom-icon">
                                            <input type="email" name="email" placeholder="Type your email...." required>
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="btn-wrapper">
                                            <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Shop Tab End -->
            </div>
            <div class="col-lg-4">
                <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                    <!-- Top Rated Product Widget -->
                    <div class="widget ltn__top-rated-product-widget">
                        <h4 class="ltn__widget-title ltn__widget-title-border">Top Rated Product</h4>
                        <ul>
                            @foreach ($topMed as $med )
                                <li>
                                    <div class="top-rated-product-item clearfix">
                                        <div class="top-rated-product-img">
                                            <a href="{{ url('shop/'.$med->slug) }}"><img src="{{ asset('images/medicines/'.$med->image1) }}" alt="#"></a>
                                        </div>
                                        <div class="top-rated-product-info">
                                            <div class="product-ratting">
                                                @php
                                                    $averageRating = $med->reviews()->avg('rating');
                                                @endphp
                                                <ul>
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $averageRating)
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                        @elseif ($i == ceil($averageRating))
                                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                        @else
                                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                                        @endif
                                                    @endfor
                                                </ul>
                                            </div>
                                            <h6><a href="{{ url('shop/'.$med->slug) }}">{{ $med->name }}</a></h6>
                                            <div class="product-price">
                                                <span>Rs. {{ $med->sale_price }}</span>
                                                <del>Rs. {{ $med->price }}</del>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
<!-- SHOP DETAILS AREA END -->

 <!-- PRODUCT SLIDER AREA START -->
 <div class="ltn__product-slider-area ltn__product-gutter pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2">
                    <h4 class="title-2">Related Products<span>.</span></h1>
                </div>
            </div>
        </div>
        <div class="row ltn__related-product-slider-one-active slick-arrow-1">
            @foreach ($allMed as $med)
                <div class="col-lg-12">
                    <div class="ltn__product-item ltn__product-item-3 text-center">
                        <div class="product-img">
                            <a href="{{ url('shop/'.$med->slug) }}"><img src="{{ asset('images/medicines/'.$med->image1) }}" alt="#"></a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge">New</li>
                                </ul>
                            </div>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Add to Cart" id="addtocart" data-id="{{ $med->id }}">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-ratting">
                                @php
                                    $averageRating = $med->reviews()->avg('rating');
                                @endphp
                                <ul>
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $averageRating)
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        @elseif ($i == ceil($averageRating))
                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                        @else
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                        @endif
                                    @endfor
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="{{ url('shop/'.$med->slug) }}">{{ $med->name }}</a></h2>
                            <div class="product-price">
                                @if($med->is_onsale)
                                    <span>{{ $med->sale_price }}</span>
                                    <del>{{ $med->price }}</del>
                                @else
                                    <span>{{ $med->price }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- PRODUCT SLIDER AREA END -->
@endsection

@section('javascript')
    <script>
        $('.product-rating input[type="radio"]').on('click', function() {
        const numStars = $(this).val();
        $('.product-rating label').each(function(index) {
            if (index < numStars) {
            $(this).addClass('filled');
            } else {
            $(this).removeClass('filled');
            }
        });
        });
    </script>
@endsection