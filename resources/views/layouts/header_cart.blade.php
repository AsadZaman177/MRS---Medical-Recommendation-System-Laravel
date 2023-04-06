<div class="mini-cart-icon mini-cart-icon-2">
    <a href="{{ url('/cart') }}">
        <span class="mini-cart-icon">
            <i class="icon-shopping-cart"></i>
            <sup>{{ count((array) session('cart')) }}</sup>
        </span>
        @php $total = 0 @endphp
        @foreach((array) session('cart') as $id => $details)
            @php $total += $details['price'] * $details['quantity'] @endphp
        @endforeach

        <h6><span>Your Cart</span> <span
                class="ltn__secondary-color">Rs. {{ $total }}</span></h6>
    </a>
</div>