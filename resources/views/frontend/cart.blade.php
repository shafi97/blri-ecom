@extends('frontend.layout.app')
@section('content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="blog-single.html">Cart</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Shopping Summery -->
                    {{-- <table class="table shopping-summery">
                        <thead>
                            <tr class="main-hading">
                                <th>PRODUCT</th>
                                <th>NAME</th>
                                <th class="text-center">UNIT PRICE</th>
                                <th class="text-center">QUANTITY</th>
                                <th class="text-center">TOTAL</th>
                                <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $k => $cart)
                                <tr class="cal">
                                    <td class="image" data-title="No"><img src="https://via.placeholder.com/100x100"
                                            alt="#"></td>
                                    <td class="product-des" data-title="Description">
                                        <p class="product-name"><a href="#">{{ $cart->product->name }}</a></p>
                                        <p class="product-des">Maboriosam in a tonto nesciung eget  distingy magndapibus.</p>
                                    </td>
                                    <td class="price" data-title="Price"><span>&#2547; {{ $cart->product->price }} </span>
                                    </td>
                                    <td class="qty" data-title="Qty">
                                        <!-- Input Order -->
                                        <div class="input-group">
                                            <div class="button minus">
                                                <input type="hidden" class="price" value="{{ $cart->product->price }}">
                                                <button type="button" class="btn btn-primary cart-qty-minus" type="button"
                                                    value="-">
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" class="input-number qty" name="qty" data-min="1"
                                                data-max="100" value="1">
                                            <div class="button plus">
                                                <button type="button" class="btn btn-primary cart-qty-plus" type="button"
                                                    value="+">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!--/ End Input Order -->
                                    </td>
                                    <td class="total-amount" data-title="Total"><span>&#2547;
                                            {{ $cart->product->price }}</span></td>
                                    <td class="action" data-title="Remove"><a href="#"><i
                                                class="ti-trash remove-icon"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> --}}



                    <table id="myTable" class="table shopping-summery">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Name</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th class="text-right"><span id="amount" class="amount">Amount</span> </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $cart)
                                <tr>
                                    <td>
                                        <div class="product-img">
                                            <div class="img-prdct">
                                                <img src="{{ imagePath('product', $cart->product->file->file) }}">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p>{{ $cart->product->name }}</p>
                                    </td>
                                    <td>
                                        <div class="button-container d-flex">
                                            <button class="cart-qty-minus p-2" type="button" value="-" onclick="decrementStore(event, '{{ $cart->uuid }}')">
                                                <i class="fa-solid fa-minus"></i>
                                            </button>
                                            <input type="text" name="qty" min="1" class="qty form-control" value="{{ $cart->quantity }}" />
                                            <button class="cart-qty-plus p-2" type="button" value="+" onclick="incrementStore(event, '{{ $cart->uuid }}')">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" value="{{ $cart->product->price }}" class="price form-control"
                                            disabled>
                                    </td>
                                    <td align="right">
                                        &#2547; <span id="amount" class="amount">{{ $cart->quantity * $cart->product->price }}</span>
                                    </td>
                                    <td class="action" data-title="Remove">
                                        <a href="{{ route('frontend.cart.delete', $cart->uuid) }}">
                                            <i class="ti-trash remove-icon"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        {{-- <tfoot>
                            <tr>
                                <td colspan="4"></td>
                                <td align="right"><strong>TOTAL = &#2547; <span id="total" class="total">0</span></strong>
                                </td>
                            </tr>
                        </tfoot> --}}
                    </table>
                </div>
            </div>
            <!--/ End Shopping Summery -->
            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-5 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <button class="btn">Apply</button>
                                        </form>
                                    </div>
                                    <div class="checkbox">
                                        <label class="checkbox-inline" for="2"><input name="news" id="2"
                                                type="checkbox"> Shipping (+10$)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-7 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Cart Subtotal &#2547; <span id="total" class="total">0</span></li>
                                        <li>Shipping<span>Free</span></li>
                                        <li>You Save<span>$20.00</span></li>
                                        <li class="last">You Pay<span>$310.00</span></li>
                                    </ul>
                                    <div class="button5">
                                        <a href="#" class="btn">Checkout</a>
                                        <a href="#" class="btn">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->

    <!-- Start Shop Services Area  -->
    <section class="shop-services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>Free shiping</h4>
                        <p>Orders over $100</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-reload"></i>
                        <h4>Free Return</h4>
                        <p>Within 30 days returns</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>Sucure Payment</h4>
                        <p>100% secure payment</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-tag"></i>
                        <h4>Best Peice</h4>
                        <p>Guaranteed price</p>
                    </div>
                    <!-- End Single Service -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Newsletter -->
    @push('custom_scripts')
        <script>
            // -----------------for-Shopping-cart-------------
            $(document).ready(function() {
                update_amounts();
                $('.qty, .price').on('keyup keypress blur change', function(e) {
                    update_amounts();
                });
            });

            function update_amounts() {
                var sum = 0.0;
                $('#myTable > tbody  > tr').each(function() {
                    var qty = $(this).find('.qty').val();
                    var price = $(this).find('.price').val();
                    var amount = (qty * price)
                    sum += amount;
                    $(this).find('.amount').text('' + amount);
                });
                $('.total').text(sum);
            }



            //----------------for quantity-increment-or-decrement-------
            var incrementQty;
            var decrementQty;
            var plusBtn = $(".cart-qty-plus");
            var minusBtn = $(".cart-qty-minus");
            var incrementQty = plusBtn.click(function() {
                var $n = $(this)
                    .parent(".button-container")
                    .find(".qty");
                $n.val(Number($n.val()) + 1);
                update_amounts();
            });

            var decrementQty = minusBtn.click(function() {
                var $n = $(this)
                    .parent(".button-container")
                    .find(".qty");
                var QtyVal = Number($n.val());
                if (QtyVal > 1) {
                    $n.val(QtyVal - 1);
                }
                update_amounts();
            });




            function incrementStore(e, cart_id) {
                e.preventDefault();
                $.ajax({
                    url: '{{ route('frontend.cart.incrementStore') }}',
                    type: 'POST',
                    data: {
                        'cart_id': cart_id,
                    },
                    success: res => {
                        cartShow()
                        toast('success', res.message)
                    },
                    error: err => {}
                });
            }

            function decrementStore(e, cart_id) {
                e.preventDefault();
                $.ajax({
                    url: '{{ route('frontend.cart.decrementStore') }}',
                    type: 'POST',
                    data: {
                        'cart_id': cart_id,
                    },
                    success: res => {
                        cartShow()
                        toast('success', res.message)
                    },
                    error: err => {}
                });
            }




        </script>
    @endpush
@endsection
