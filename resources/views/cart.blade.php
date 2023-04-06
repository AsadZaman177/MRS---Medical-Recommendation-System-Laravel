@extends('layouts.app')

@section('title','Cart')

@section('css')
    
@endsection

@section('content')
<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image "  data-bs-bg="{{ asset('images/bg-news.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">Cart</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="index.html"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->


<!-- SHOPING CART AREA START -->
<div class="liton__shoping-cart-area mb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping-cart-inner">
                    <div class="shoping-cart-table table-responsive">
                        <table class="table">
                            {{-- <thead>
                                <th class="cart-product-image">Image</th>
                                <th class="cart-product-info">Product</th>
                                <th class="cart-product-price">Price</th>
                                <th class="cart-product-quantity">Quantity</th>
                                <th class="cart-product-subtotal">Subtotal</th>
                                <th class="cart-product-remove">Remove</th>

                            </thead>  --}}
                            <tbody>
                                @php $total = 0 @endphp

                                @if(session('cart'))
                                    @foreach((array) session('cart') as $id => $details)
                        
                                        @php $total += $details['price'] * $details['quantity'] @endphp
                                        <tr>
                                            <td class="cart-product-image">
                                                <a href="product-details.html"><img src="{{ asset('images/medicines/'.$details['image'] ) }}" alt="#"></a>
                                            </td>
                                            <td class="cart-product-info">
                                                <h4><a href="product-details.html">{{ $details['name'] }}</a></h4>
                                            </td>
                                            <td class="cart-product-price">Rs {{ $details['price'] }}</td>
                                            <td class="cart-product-quantity">
                                                <div class="cart-plus-minus" id="update-cart" data-id="{{ $id }}">
                                                    <input type="text" value="{{ $details['quantity'] }}"  name="qtybutton" min="1" class="cart-plus-minus-box quantity">
                                                </div>
                                            </td>
                                            <td class="cart-product-subtotal">Rs <span class="product-subtotal">{{ $details['price'] * $details['quantity'] }}</span></td>
                                            <td class="cart-product-remove"><button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash" style="color: #fff"></i></button></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center"><strong>Cart is Empty!</strong></td>
                                    </tr>
                                @endif
                              
                                <tr class="">
                                    <td colspan="6">
                                        <a href="{{ url('/') }}" class="btn btn-sm btn-warning">Continue Shopping</a>
                                    </td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="shoping-cart-total mt-50">
                        <h4>Cart Totals</h4>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Subtotal</td>
                                    <td>Rs <span class="cart-total">{{ $total }}</span></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="btn-wrapper text-right mt-3">
                            <a href="{{ url('/checkout') }}" class="theme-btn-1 btn btn-effect-1">Proceed to checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- SHOPING CART AREA END -->


@endsection

@section('javascript')
    <script type="text/javascript">
    
        // Update Cart
        $(document).on("click", "#update-cart", function(e) {
            var ele = $(this);

            var parent_row = ele.parents("tr");

            var quantity = parent_row.find(".quantity").val();

            var product_subtotal = parent_row.find("span.product-subtotal");

            var cart_total = $(".cart-total");

            $.ajax({
                url: '{{ url('update-cart') }}',
                method: "patch",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: quantity},
                dataType: "json",
                success: function (response) {


                    toastr.success(response.msg);

                    $("#header-bar").html(response.data);

                    product_subtotal.text(response.subTotal);

                    cart_total.text(response.total);
                }
            });
        });

        // Remove From Cart
        $(document).on("click", ".remove-from-cart", function(e) {
            e.preventDefault();

            var ele = $(this);

            var parent_row = ele.parents("tr");

            var cart_total = $(".cart-total");

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    dataType: "json",
                    success: function (response) {

                        parent_row.remove();

                        toastr.success(response.msg);

                        $("#header-bar").html(response.data);

                        cart_total.text(response.total);
                    }
                });
            }
        });

    </script>
@endsection