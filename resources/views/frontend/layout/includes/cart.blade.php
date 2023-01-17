@if ($datum->count() > 0)
    <a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{ $datum->count() }}</span></a>
    {{-- <!-- Shopping Item --> --}}
    <div class="shopping-item">
        <div class="dropdown-cart-header">
            <span>{{ $datum->count() }} Items</span>
            <a href="{{ route('frontend.cart.index') }}">View Cart</a>
        </div>
        <ul class="shopping-list">
            @foreach ($datum as $data)
                <li>
                    <a href="#" onClick="cartDelete(event, '{{ $data->id }}')" class="remove"
                        title="Remove this item"><i class="fa fa-remove"></i></a>
                    <a class="cart-img" href="#"><img
                            src="{{ imagePath('product', $data->product->file->file) }}" alt="#"></a>
                    <h4><a href="#">{{ $data->product->name }}</a></h4>
                    <p class="quantity"><span class="amount">&#2547; {{ $data->product->price }}</span></p>
                </li>
            @endforeach
        </ul>
        <div class="bottom">
            <div class="total">
                <span>Total</span>
                <span class="total-amount">&#2547; {{ $data->product->sum('price') }}</span>
            </div>
            <a href="checkout.html" class="btn animate">Checkout</a>
        </div>
    </div>
    {{-- <!--/ End Shopping Item --> --}}
@endif
