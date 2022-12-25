@if ($inputs->count() > 0)
    <a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{ $inputs->count() }}</span></a>
    {{-- <!-- Shopping Item --> --}}
    <div class="shopping-item">
        <div class="dropdown-cart-header">
            <span>{{ $inputs->count() }} Items</span>
            <a href="#">View Cart</a>
        </div>
        <ul class="shopping-list">
            @foreach ($inputs as $input)
                <li>
                    <a href="#" onClick="cartDelete(event, '{{ $input->uuid }}')" class="remove"
                        title="Remove this item"><i class="fa fa-remove"></i></a>
                    <a class="cart-img" href="#"><img
                            src="{{ imagePath('product', $input->product->file->file) }}" alt="#"></a>
                    <h4><a href="#">{{ $input->product->name }}</a></h4>
                    <p class="quantity"><span class="amount">&#2547; {{ $input->product->price }}</span></p>
                </li>
            @endforeach
        </ul>
        <div class="bottom">
            <div class="total">
                <span>Total</span>
                <span class="total-amount">&#2547; {{ $input->product->sum('price') }}</span>
            </div>
            <a href="checkout.html" class="btn animate">Checkout</a>
        </div>
    </div>
    {{-- <!--/ End Shopping Item --> --}}
@endif
