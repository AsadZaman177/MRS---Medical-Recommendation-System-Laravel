@extends('layouts.app')

@section('title','Order Tracking')

@section('css')
    
@endsection

@section('content')
<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image "  data-bs-bg="{{ asset('images/bg-news.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">Track Your Order</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="{{ url('/') }}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>Order Tracking</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->
<div class="ltn__login-area mb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                @if(empty($track))
                    <div class="account-login-inner section-bg-1">
                        <form action="{{ url('track-order-result') }}" method="POST" class="ltn__form-box contact-form-box">
                            @csrf
                            <p class="text-center"> To track your order please enter your Order Number in the box below and press the "Track Order" button. This was given to you on your receipt and in the confirmation email you should have received. </p>
                            <label>Order ID</label>
                            <input type="text" name="order_number" placeholder="Found in your order confirmation email.">
                            <div class="btn-wrapper mt-0 text-center">
                                <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Track Order</button>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="account-login-inner section-bg-1">
                        <div class="ltn__form-box contact-form-box">
                            <p> 
                                <span><strong>Order #:</strong> {{ $track->order_number }}</span><br>
                                <span><strong>Customer Name:</strong> {{ $track->user->name }}</span><br>
                                <span><strong>Order Status:</strong> {{ $track->status }}</span><br>
                                <span><strong>Payment Status:</strong> {{ $track->payment_status }}</span><br>
                                <span><strong>Order Date:</strong> {{ $track->created_at }}</span><br>
                                <span><strong>Bill Total:</strong> {{ $track->total }}</span><br>
                            </p>
                            <p class="text-center text-primary"><a href="{{ url('/') }}">Return Home</a></p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection