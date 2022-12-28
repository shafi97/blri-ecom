@extends('frontend.layout.app')
@section('content')

	<!-- Start Product Area -->
    <div class="product-area section">
            <div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title">
							<h2>Trending Item</h2>
						</div>
					</div>
				</div>
				<div class="row">
                    @foreach ($products as $product)
                    <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img class="default-img" src="{{ imagePath('product', $product->file->file) }}" alt="#">
                                    <img class="hover-img" src="{{ imagePath('product', $product->file->file) }}" alt="#">
                                </a>
                                <div class="button-head">
                                    <div class="product-action">
                                        {{-- <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a> --}}
                                        <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                        {{-- <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a> --}}
                                    </div>
                                    <div class="product-action-2">
                                        <form onsubmit="cart(event,'{{ $product->uuid }}')">
                                            @csrf
                                            <button type="submit">Add to cart </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">{{ $product->name }}</a></h3>
                                <div class="product-price">
                                    <span>{{ $product->price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

				</div>
            </div>
    </div>
	<!-- End Product Area -->


    @push('custom_scripts')
    
   @endpush
@endsection
