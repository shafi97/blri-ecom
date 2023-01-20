@extends('frontend.layout.app')
@section('content')
    <!-- Slider Area -->
    <section class="hero-slider owl-carousel owl-theme">
        <!-- Single Slider -->
        @foreach ($sliders as $slider)
            <div class="single-slider item"
                style="background-image: url({{ asset('uploads/images/slider/' . $slider->image) }});">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-lg-9 offset-lg-3 col-12">
                            <div class="text-inner">
                                <div class="row">
                                    <div class="col-lg-7 col-12">
                                        <div class="hero-text">
                                            {!! $slider->text !!}
                                            {{-- <div class="button">
											<a href="#" class="btn">Shop Now!</a>
										</div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!--/ End Single Slider -->
    </section>
    <!--/ End Slider Area -->




    <style>
        /* body{
                    background-color: #f5f4f5;
                    margin-top:20px;
                } */

        /* Tr Job Post */

        .tr-job-posted {
            padding: 60px 0px;
        }

        .job-item {
            background-color: #fff;
        }

        .job-tab .nav-tabs {
            margin-bottom: 20px;
            border-bottom: 0;
        }

        .job-tab .nav-tabs>li {
            float: none;
            display: inline;
        }

        .job-tab .nav-tabs li {
            margin-right: 15px;
        }

        .job-tab .nav-tabs li:last-child {
            margin-right: 0;
        }

        .job-tab .nav-tabs {
            position: relative;
            z-index: 1;
            display: inline-block;
        }

        .job-tab .nav-tabs:after {
            position: absolute;
            content: "";
            top: 50%;
            left: 0;
            width: 100%;
            height: 1px;
            background-color: #fff;
            z-index: -1;
        }

        .job-tab .nav-tabs>li a {
            display: inline-block;
            background-color: #fff;
            border: none;
            border-radius: 30px;
            font-size: 14px;
            color: #000;
            padding: 5px 30px;
        }

        .job-tab .nav-tabs>li>a.active,
        .job-tab .nav-tabs>li a.active>:focus,
        .job-tab .nav-tabs>li>a.active:hover,
        .job-tab .nav-tabs>li>a:hover {
            border: none;
            background-color: #008def;
            color: #fff;
        }

        .job-item {
            border-radius: 3px;
            position: relative;
            margin-bottom: 30px;
            z-index: 1;
        }

        .job-item .btn.btn-primary {
            text-transform: capitalize;
        }

        .tab-content .col-md-2 {
            padding-right: 5px;
            padding-left: 5px;
            margin-bottom: 10px
        }

        .tab-content .card-body {
            padding: 5px 5px 5px 5px;
        }

        .tr-job-posted .title {
            font-size: 30px;
        }
    </style>

    <section class="tr-job-posted section-padding">
        <div class="container">
            <p class="title">Discount's Product</p>
            <div class="job-tab text-center">
                <ul class="nav nav-tabs justify-content-center" role="tablist">
                    @foreach ($discountProducts->groupBy('category_id') as $cat)
                        @php
                            $category = $cat->first();
                        @endphp
                        <li role="presentation" class="{{ $loop->first ? 'active' : '' }}">
                            <a class="{{ $loop->first ? 'active show' : '' }}" href="#hot{{ $category->id }}"
                                aria-controls="hot-jobs" role="tab" data-toggle="tab"
                                aria-selected="true">{{ $category->category->name }}</a>
                        </li>
                    @endforeach

                </ul>
                <div class="tab-content text-left">
                    @foreach ($discountProducts->groupBy('category_id') as $cat)
                        @php
                            $category = $cat->first();
                        @endphp
                        <div role="tabpanel" class="tab-pane fade {{ $loop->first ? 'active show' : '' }}"
                            id="hot{{ $category->id }}">
                            <div class="row">
                                @foreach ($cat->take(12) as $discountProduct)
                                    <div class="col-md-2">
                                        <div class="card" style="width: 100%;">
                                            <div style="height: 130px;">
                                                <img class="card-img-top"
                                                    src="{{ imagePath('product', $discountProduct->file->file) }}">
                                            </div>

                                            <div class="card-body" style="background: #fff">
                                                {{-- <h5 class="card-title">{{ $discountProduct->id }}</h5> --}}
                                                <p class="card-text">
                                                <div class="product-price  text-center">
                                                    <span>&#2547;{{ number_format($discountProduct->price - ($discountProduct->price * $discountProduct->discount) / 100) }}</span>
                                                </div>
                                                <div class="discount  text-center">
                                                    @if ($discountProduct->discount > 0)
                                                        <span
                                                            class="tk">&#2547;{{ number_format($discountProduct->price) }}</span>
                                                        <span>-{{ number_format($discountProduct->discount) }}%</span>
                                                    @else
                                                        <br>
                                                    @endif
                                                </div>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div><!-- /.row -->
                        </div><!-- /.tab-pane -->
                    @endforeach
                </div>
            </div><!-- /.job-tab -->
        </div><!-- /.container -->
    </section>

    <!-- Start Small Banner  -->
    <section class="small-banner section">
		<div class="container">
			<div class="row">
				<!-- Single Banner  -->
				<div class="col-lg-4 col-md-6 col-12">
					<div class="single-banner">
						<img src="https://via.placeholder.com/600x370" alt="#">
						<div class="content">
							<p>Man's Collectons</p>
							<h3>Summer travel <br> collection</h3>
							<a href="#">Discover Now</a>
						</div>
					</div>
				</div>
				<!-- /End Single Banner  -->
				<!-- Single Banner  -->
				<div class="col-lg-4 col-md-6 col-12">
					<div class="single-banner">
						<img src="https://via.placeholder.com/600x370" alt="#">
						<div class="content">
							<p>Bag Collectons</p>
							<h3>Awesome Bag <br> 2020</h3>
							<a href="#">Shop Now</a>
						</div>
					</div>
				</div>
				<!-- /End Single Banner  -->
				<!-- Single Banner  -->
				<div class="col-lg-4 col-12">
					<div class="single-banner tab-height">
						<img src="https://via.placeholder.com/600x370" alt="#">
						<div class="content">
							<p>Flash Sale</p>
							<h3>Mid Season <br> Up to <span>40%</span> Off</h3>
							<a href="#">Discover Now</a>
						</div>
					</div>
				</div>
				<!-- /End Single Banner  -->
			</div>
		</div>
	</section>
    <!-- End Small Banner -->



<style>
    .product_by_cat .col-sm-6, .product_by_cat .col-md-2 {
        padding-right: 5px;
        padding-left: 5px;
        margin-bottom: 10px
    }
    .product_by_cat .title_area {
        background: #008def;
        margin-bottom: 10px;
        padding: 10px 10px 0px 10px;
    }
    .product_by_cat .title_area p, .product_by_cat .title_area a{
        color: #fff;
        font-size: 18px;
    }

    .product_by_cat .product_area {
        margin-bottom: 50px;
    }
</style>
    <section class="product_by_cat">
        <div class="container">
            @foreach ($products->groupBy('category_id') as $pro)
                @php
                    $product = $pro->first();
                @endphp
                <div class="row title_area">
                    <div class="col-sm-6"><p>{{ $product->category->name }}</p></div>
                    <div class="col-sm-6 text-right"><a href="">Show All</a></div>
                </div>
                <div class="row product_area">
                    @foreach ($products->take(6) as $product)
                        <div class="col-md-2">
                            <a href="">
                                <div class="card" style="width: 100%;">
                                    <div style="height: 130px;">
                                        <img class="card-img-top" src="{{ imagePath('product', $product->file->file) }}">
                                    </div>

                                    <div class="card-body" style="background: #fff">
                                        {{-- <h5 class="card-title">{{ $product->id }}</h5> --}}
                                        <p class="card-text">
                                        <div class="product-price  text-center">
                                            <span>&#2547;{{ number_format($product->price - ($product->price * $product->discount) / 100) }}</span>
                                        </div>
                                        <div class="discount  text-center">
                                            @if ($product->discount > 0)
                                                <span class="tk">&#2547;{{ number_format($product->price) }}</span>
                                                <span>-{{ number_format($product->discount) }}%</span>
                                            @else
                                                <br>
                                            @endif
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>





    <div class="product-area section discount_product_area">
        <div class="container discount_product">
            <div class="row ">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Latest Product</h2>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="owl-carousel-discount owl-theme">
                    @foreach ($discountProducts as $discountProduct)
                        <div class="item">
                            <div class="col-md-12">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{ route('product.show', $discountProduct->id) }}">
                                            <img class="default-img"
                                                src="{{ imagePath('product', $discountProduct->file->file) }}"
                                                alt="#">
                                            <img class="hover-img"
                                                src="{{ imagePath('product', $discountProduct->file->file) }}"
                                                alt="#">
                                        </a>
                                        <div class="button-head">
                                            <div class="product-action">
                                                {{--
                                                     <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a> --}}
                                                @auth
                                                    <a title="Wishlist" href="javascript:;"
                                                        onclick="wishlist(event,'{{ $discountProduct->id }}')"><i
                                                            class=" ti-heart "></i><span>Add to
                                                            Wishlist</span></a>
                                                @endauth
                                                @guest
                                                    <a href="javascript:;" title="Wishlist" data-toggle="modal"
                                                        data-target="#loginModal"><i class=" ti-heart "></i><span>Add to
                                                            Wishlist</span></a>
                                                @endguest
                                                {{-- <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a> --}}
                                            </div>
                                            <div class="product-action-2">
                                                <form onsubmit="cart(event,'{{ $discountProduct->id }}')">
                                                    @csrf
                                                    @auth
                                                        <button type="submit">Add to cart</button>
                                                    @endauth
                                                    @guest
                                                        <a href="javascript:;" data-toggle="modal" data-target="#loginModal">Add
                                                            to cart</a>
                                                    @endguest
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a
                                                href="{{ route('product.show', $discountProduct->id) }}">{{ $discountProduct->name }}</a>
                                        </h3>
                                        <div class="product-price">
                                            <span>&#2547;{{ number_format($discountProduct->price - ($discountProduct->price * $discountProduct->discount) / 100) }}</span>
                                        </div>
                                        <div class="discount">
                                            @if ($discountProduct->discount > 0)
                                                <span
                                                    class="tk">&#2547;{{ number_format($discountProduct->price) }}</span>
                                                <span>-{{ number_format($discountProduct->discount) }}%</span>
                                            @else
                                                <br>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Start Product Area -->
    <div class="product-area section all_product">
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
                    <div class="col-lg-2 col-md-3">
                        <div class="single-product">
                            <div class="product-img">
                                <div style="height: 130px">
                                    <a href="{{ route('product.show', $product->id) }}">
                                        <img class="default-img" src="{{ imagePath('product', $product->file->file) }}"
                                            alt="#">
                                        <img class="hover-img" src="{{ imagePath('product', $product->file->file) }}"
                                            alt="#">
                                    </a>
                                </div>

                                <div class="button-head">
                                    <div class="product-action">
                                        {{-- <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a> --}}
                                        @auth
                                            <a title="Wishlist" href="javascript:;"
                                                onclick="wishlist(event,'{{ $discountProduct->id }}')"><i
                                                    class=" ti-heart "></i><span>Add to
                                                    Wishlist</span></a>
                                        @endauth
                                        @guest
                                            <a href="javascript:;" title="Wishlist" data-toggle="modal"
                                                data-target="#loginModal"><i class=" ti-heart "></i><span>Add to
                                                    Wishlist</span></a>
                                        @endguest

                                        {{-- <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a> --}}
                                    </div>
                                    <div class="product-action-2">
                                        <form onsubmit="cart(event,'{{ $discountProduct->id }}')">
                                            @csrf
                                            @auth
                                                <button type="submit">Add to cart</button>
                                            @endauth
                                            @guest
                                                <a href="javascript:;" data-toggle="modal" data-target="#loginModal">Add to
                                                    cart</a>
                                            @endguest
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></h3>
                                <div class="product-price">
                                    <span>&#2547;{{ number_format($product->price - ($product->price * $product->discount) / 100) }}</span>
                                </div>
                                <div class="discount">
                                    @if ($product->discount > 0)
                                        <span class="tk">&#2547;{{ number_format($product->price) }}</span>
                                        <span>-{{ number_format($product->discount) }}%</span>
                                    @else
                                        <br>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Product Area -->

    <!-- Start Midium Banner  -->
    {{-- <section class="midium-banner">
		<div class="container">
			<div class="row">
				<!-- Single Banner  -->
				<div class="col-lg-6 col-md-6 col-12">
					<div class="single-banner">
						<img src="https://via.placeholder.com/600x370" alt="#">
						<div class="content">
							<p>Man's Collectons</p>
							<h3>Man's items <br>Up to<span> 50%</span></h3>
							<a href="#">Shop Now</a>
						</div>
					</div>
				</div>
				<!-- /End Single Banner  -->
				<!-- Single Banner  -->
				<div class="col-lg-6 col-md-6 col-12">
					<div class="single-banner">
						<img src="https://via.placeholder.com/600x370" alt="#">
						<div class="content">
							<p>shoes women</p>
							<h3>mid season <br> up to <span>70%</span></h3>
							<a href="#" class="btn">Shop Now</a>
						</div>
					</div>
				</div>
				<!-- /End Single Banner  -->
			</div>
		</div>
	</section> --}}
    <!-- End Midium Banner -->

    <!-- Start Most Popular -->
    {{-- <div class="product-area most-popular section">
        <div class="container">
            <div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>Hot Item</h2>
					</div>
				</div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
						<!-- Start Single Product -->
						<div class="single-product">
							<div class="product-img">
								<a href="{{ route('product.show') }}">
									<img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
									<img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
									<span class="out-of-stock">Hot</span>
								</a>
								<div class="button-head">
									<div class="product-action">
										<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
										<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
										<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="#">Add to cart</a>
									</div>
								</div>
							</div>
							<div class="product-content">
								<h3><a href="{{ route('product.show') }}">Black Sunglass For Women</a></h3>
								<div class="product-price">
									<span class="old">$60.00</span>
									<span>$50.00</span>
								</div>
							</div>
						</div>
						<!-- End Single Product -->
						<!-- Start Single Product -->
						<div class="single-product">
                            <div class="product-img">
                                <a href="{{ route('product.show') }}">
                                    <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                    <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                </a>
								<div class="button-head">
									<div class="product-action">
										<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
										<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
										<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="#">Add to cart</a>
									</div>
								</div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{ route('product.show') }}">Women Hot Collection</a></h3>
                                <div class="product-price">
                                    <span>$50.00</span>
                                </div>
                            </div>
                        </div>
						<!-- End Single Product -->
						<!-- Start Single Product -->
						<div class="single-product">
                            <div class="product-img">
                                <a href="{{ route('product.show') }}">
                                    <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                    <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
									<span class="new">New</span>
                                </a>
								<div class="button-head">
									<div class="product-action">
										<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
										<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
										<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="#">Add to cart</a>
									</div>
								</div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{ route('product.show') }}">Awesome Pink Show</a></h3>
                                <div class="product-price">
                                    <span>$50.00</span>
                                </div>
                            </div>
                        </div>
						<!-- End Single Product -->
						<!-- Start Single Product -->
						<div class="single-product">
                            <div class="product-img">
                                <a href="{{ route('product.show') }}">
                                    <img class="default-img" src="https://via.placeholder.com/550x750" alt="#">
                                    <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                                </a>
								<div class="button-head">
									<div class="product-action">
										<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
										<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
										<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="#">Add to cart</a>
									</div>
								</div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{ route('product.show') }}">Awesome Bags Collection</a></h3>
                                <div class="product-price">
                                    <span>$50.00</span>
                                </div>
                            </div>
                        </div>
						<!-- End Single Product -->
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End Most Popular Area -->

    {{-- <!-- Start Shop Home List  -->
    <section class="shop-home-list section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop-section-title">
                                <h1>On sale</h1>
                            </div>
                        </div>
                    </div>
                    <!-- Start Single List  -->
                    <div class="single-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="list-image overlay">
                                    <img src="https://via.placeholder.com/115x140" alt="#">
                                    <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 no-padding">
                                <div class="content">
                                    <h4 class="title"><a href="#">Licity jelly leg flat Sandals</a></h4>
                                    <p class="price with-discount">$59</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single List  -->
                    <!-- Start Single List  -->
                    <div class="single-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="list-image overlay">
                                    <img src="https://via.placeholder.com/115x140" alt="#">
                                    <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 no-padding">
                                <div class="content">
                                    <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                    <p class="price with-discount">$44</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single List  -->
                    <!-- Start Single List  -->
                    <div class="single-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="list-image overlay">
                                    <img src="https://via.placeholder.com/115x140" alt="#">
                                    <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 no-padding">
                                <div class="content">
                                    <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                    <p class="price with-discount">$89</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single List  -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop-section-title">
                                <h1>Best Seller</h1>
                            </div>
                        </div>
                    </div>
                    <!-- Start Single List  -->
                    <div class="single-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="list-image overlay">
                                    <img src="https://via.placeholder.com/115x140" alt="#">
                                    <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 no-padding">
                                <div class="content">
                                    <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                    <p class="price with-discount">$65</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single List  -->
                    <!-- Start Single List  -->
                    <div class="single-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="list-image overlay">
                                    <img src="https://via.placeholder.com/115x140" alt="#">
                                    <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 no-padding">
                                <div class="content">
                                    <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                    <p class="price with-discount">$33</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single List  -->
                    <!-- Start Single List  -->
                    <div class="single-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="list-image overlay">
                                    <img src="https://via.placeholder.com/115x140" alt="#">
                                    <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 no-padding">
                                <div class="content">
                                    <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                    <p class="price with-discount">$77</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single List  -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop-section-title">
                                <h1>Top viewed</h1>
                            </div>
                        </div>
                    </div>
                    <!-- Start Single List  -->
                    <div class="single-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="list-image overlay">
                                    <img src="https://via.placeholder.com/115x140" alt="#">
                                    <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 no-padding">
                                <div class="content">
                                    <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                    <p class="price with-discount">$22</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single List  -->
                    <!-- Start Single List  -->
                    <div class="single-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="list-image overlay">
                                    <img src="https://via.placeholder.com/115x140" alt="#">
                                    <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 no-padding">
                                <div class="content">
                                    <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                    <p class="price with-discount">$35</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single List  -->
                    <!-- Start Single List  -->
                    <div class="single-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="list-image overlay">
                                    <img src="https://via.placeholder.com/115x140" alt="#">
                                    <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 no-padding">
                                <div class="content">
                                    <h5 class="title"><a href="#">Licity jelly leg flat Sandals</a></h5>
                                    <p class="price with-discount">$99</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single List  -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Home List  --> --}}

    {{-- <!-- Start Shop Services Area -->
    <section class="shop-services section home">
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
    <!-- End Shop Services Area --> --}}

    @push('custom_scripts')
        <script>
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                lazyLoadEager: true,
                autoplay: true,
                dots: true,
                slideBy: 1,
                items: 1,
            })

            $('.owl-carousel-discount').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                lazyLoadEager: true,
                autoplay: true,
                dots: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            })

            // $(document).ready(function(){
            //     cartShow()
            // })

            // function cart(e, product_id){
            //     e.preventDefault();
            //     $.ajax({
            //         url: '{{ route('frontend.cart.store') }}',
            //         type: 'POST',
            //         data: {
            //             'product_id': product_id,
            //         },
            //         success: res => {
            //             cartShow()
            //             toast('success',res.message)
            //         },
            //         error: err => {
            //         }
            //     });
            // }
            // function cartDelete(e, cart_id){
            //     e.preventDefault();
            //     $.ajax({
            //         url: '{{ route('frontend.cart.destroy') }}',
            //         type: 'delete',
            //         data: {
            //             id: cart_id,
            //         },
            //         success: res => {
            //             cartShow()
            //             toast('success',res.message)
            //         },
            //         error: err => {
            //         }
            //     });
            // }
            // function cartShow(){
            //     $.ajax({
            //         url:'{{ route('frontend.cart.show') }}',
            //         method:'get',
            //         success: function (res) {
            //             if (res.status == 'success') {
            //                 $('#cart').html(res.html);
            //             }
            //         }
            //     });
            // }
        </script>
    @endpush
@endsection
