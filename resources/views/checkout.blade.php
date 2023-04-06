@extends('layouts.app')

@section('title','Checkout')

@section('css')

@endsection

@section('content')
<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image "  data-bs-bg="{{ asset('images/bg-news.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">Checkout</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="{{ url('/') }}"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->


<div class="ltn__checkout-area mb-105">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
        @auth
            <form action="{{ url('store/checkout') }}" method="POST">
                @csrf
                <div class="row">
                        <div class="text-center">
                            <h5 class="ltn__secondary-color">Please Fill Out Your Shipping Details To Place Your Order</h5>
                        </div>
                        <div class="col-lg-12">
                            <div class="ltn__checkout-inner">
                                <!--Billing Form -->
                                <div class="ltn__checkout-single-content mt-50">
                                    <h4 class="title-2">Billing Details</h4>
                                    <div class="ltn__checkout-single-content-info">
                                        <h6>Personal Information</h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-item input-item-name ltn__custom-icon">
                                                    <input type="text" name="name" value="{{ Auth::user()->name }}" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-item-email ltn__custom-icon">
                                                    <input type="email" name="email" value="{{ Auth::user()->email }}" placeholder="email address">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-item-phone ltn__custom-icon">
                                                    <input type="text" name="phone" value="{{ Auth::user()->userDetail && Auth::user()->userDetail->phone ? Auth::user()->userDetail->phone : ''}}" placeholder="phone number">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item">
                                                    <input type="text" name="country" value="{{ Auth::user()->userDetail && Auth::user()->userDetail->country ? Auth::user()->userDetail->country : ''}}" placeholder="country">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item">
                                                    <input type="text" name="state" value="{{ Auth::user()->userDetail && Auth::user()->userDetail->state ? Auth::user()->userDetail->state : ''}}" placeholder="state">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item">
                                                    <input type="text" name="city" value="{{ Auth::user()->userDetail && Auth::user()->userDetail->city ? Auth::user()->userDetail->city : ''}}" placeholder="city">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item">
                                                    <input type="text" name="zip_code" value="{{ Auth::user()->userDetail && Auth::user()->userDetail->zip_code ? Auth::user()->userDetail->zip_code : ''}}" placeholder="zip code">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item">
                                                    <input type="text" name="address" value="{{ Auth::user()->userDetail && Auth::user()->userDetail->address ? Auth::user()->userDetail->address : ''}}" placeholder="address">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h6>Order Notes (optional)</h6>
                                                <div class="input-item input-item-textarea ltn__custom-icon">
                                                    <textarea name="notes" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Billing Form End-->
                            </div>
                        </div>
                        
                        <!--Payment Methods -->
                        <div class="col-lg-6">
                            <div class="ltn__checkout-payment-method mt-50">
                                <h4 class="title-2">Payment Method</h4>
                                <div>
                                    <div>
                                        <input type="radio" name="paymentMethod" value="cashOnDelivery" id="cashOnDelivery" checked>
                                        <label for="cashOnDelivery">Cash on Delivery</label>
                                        <div id="cashOnDeliveryDetails" class="paymentDetails card-body">
                                            <p>Pay with cash upon delivery.</p>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <input type="radio" name="paymentMethod" value="bankTransfer" id="bankTransfer">
                                        <label for="bankTransfer">Bank Transfer</label>
                                        <div id="bankTransferDetails" class="paymentDetails card-body" style="display: none;">
                                            <p><strong>INSTRUCTIONS FOR BANK TRANSFER:</strong><br>
                                            Please transfer/deposit the order amount to the following bank account and email the deposit receipt to payment@mrs.com to confirm your order.<br>
                                            <strong>Account Title:</strong> Mrs Pharmacy.<br>
                                            <strong>Account Number:</strong>0122224332023<br>
                                            <strong>Bank Name:</strong> ALBARAKA ISLAMIC BANK IBAN # PK49HBL0000123445678901</p>
                                        </div>
                                    </div>
                                    <div>
                                        <input type="radio" name="paymentMethod" value="easyPaisa" id="easyPaisa">
                                        <label for="easyPaisa">Easy Paisa</label>
                                        <div id="easyPaisaDetails" class="paymentDetails card-body" style="display: none;">
                                            <p>Pay with Easy Paisa</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ltn__payment-note mt-30 mb-30">
                                    <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
                                </div>
                                <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Place order</button>
                            </div>
                        </div>
                        <!-- Order Details -->
                        <div class="col-lg-6">
                            <div class="shoping-cart-total mt-50">
                                <h4 class="title-2">Order Details</h4>
                                <table class="table">
                                    <tbody>
                                        @php $total = 0 @endphp
            
                                        @if(session('cart'))
                                            @foreach((array) session('cart') as $id => $details)
                                                @php $total += $details['price'] * $details['quantity'] @endphp
                                                <tr>
                                                    <td>{{ $details['name'] }}<strong> × {{ $details['quantity'] }}</strong></td>
                                                    <td>Rs {{ $details['price'] * $details['quantity'] }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        <tr>
                                            <td><strong>Order Total</strong></td>
                                            <td><strong>Rs {{ $total }}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </form>
        @else
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__checkout-inner">
                        <div class="text-center">
                            <h5 class="ltn__secondary-color">Please Login Or Register To Place Your Order</h5>
                        </div>
                    
                        <!-- Login Form -->
                        <div class="ltn__checkout-single-content ltn__returning-customer-wrap">
                            <h5>Returning customer? <a class="ltn__secondary-color" href="#ltn__returning-customer-login" data-bs-toggle="collapse">Click here to login</a></h5>
                            <div id="ltn__returning-customer-login" class="collapse ltn__checkout-single-content-info">
                                <div class="ltn_coupon-code-form ltn__form-box">
                                    <p>Please login your accont.</p>
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-item input-item-email ltn__custom-icon">
                                                    <input type="email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Enter email address">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-item-subject ltn__custom-icon">
                                                    <input type="password" name="password" autocomplete="current-password" placeholder="Enter your name">
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn theme-btn-1 btn-effect-1 text-uppercase">Login</button>
                                        <label class="input-info-save mb-0"><input type="checkbox" name="agree"> Remember me</label>
                                        <p class="mt-30"><a href="register.html">Lost your password?</a></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Login Form End-->
    
                        <!-- Register Form -->
                        <div class="ltn__checkout-single-content ltn__coupon-code-wrap">
                            <h5>Don't Have account? <a class="ltn__secondary-color" href="#ltn__coupon-code" data-bs-toggle="collapse">Click here to create</a></h5>
                            <div id="ltn__coupon-code" class="collapse ltn__checkout-single-content-info">
                                <div class="ltn__coupon-code-form">
                                    <p>Register your account below.</p>
                                    <form action="{{ route('register') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-item input-item-name ltn__custom-icon">
                                                    <input type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-item-email ltn__custom-icon">
                                                    <input type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-item-subject ltn__custom-icon">
                                                    <input type="password" name="password" required autocomplete="new-password" autofocus placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-item-subject ltn__custom-icon">
                                                    <input type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Re-Type Password">
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn theme-btn-1 btn-effect-1 text-uppercase">Register</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Register Form End-->
                    </div>
                </div>
            </div>
        @endauth
    </div>
</div>


@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            // Get all payment details divs
            var paymentDetails = $('.paymentDetails');
            
            // Add event listener to payment method radio buttons
            $('input[name="paymentMethod"]').on('change', function() {
                // Hide all payment details divs
                paymentDetails.hide();
                // Show the payment details div for the selected payment method
                var selectedPaymentMethod = $('input[name="paymentMethod"]:checked').val();
                $('#' + selectedPaymentMethod + 'Details').show();
            });
        });
    </script>
@endsection