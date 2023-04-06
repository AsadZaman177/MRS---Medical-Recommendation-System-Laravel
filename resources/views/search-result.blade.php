@extends('layouts.app')

@section('title','Search Result')

@section('css')
    <style>
        .product-badge ul {
            margin: -15px;
            padding: 0;
        }
    </style>
@endsection

@section('content')
<div class="ltn__product-area ltn__product-gutter pt-50 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2 text-center">
                    <h2 class="text-center ltn__secondary-color">Search Result...</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- ltn__product-item -->
            @forelse($medicines as $medicine)
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__product-item ltn__product-item-3 text-center">
                        <div class="product-img">
                            <a href="{{ url('/shop/'.$medicine->slug) }}"><img src="{{ asset('images/medicines/'.$medicine->image1) }}"
                                    alt="#"></a>
                            <div class="product-badge">
                                @if ($loop->first)
                                    <ul>
                                        <li class="sale-badge">Recommended</li>
                                    </ul>
                                @endif
                            </div>
                            <div class="product-hover-action">
                                <ul>
                                    
                                    <li>
                                        <a href="#" title="Add to Cart" id="addtocart" data-id="{{ $medicine->id }}">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
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
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="{{ url('/shop/'.$medicine->slug) }}">{{ $medicine->name }}</a></h2>
                            <div class="product-price">
                                @if($medicine->sale_price)
                                    <span>Rs {{ $medicine->sale_price }}</span>
                                    <del>{{ $medicine->price }}</del>
                                @else
                                    <span>Rs {{ $medicine->price }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h2 class="text-center ltn__secondary-color">Sorry! Not Found</h2>
            @endforelse
        </div>
        <div class="ltn__pagination-area text-center">
            <div class="ltn__pagination">
                {!! $medicines->links() !!}
            </div>
        </div>
    </div>
    
</div>
@endsection

@section('javascript')
    
@endsection