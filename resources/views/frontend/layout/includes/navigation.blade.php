@php
    $categories = App\Models\Category::with('subCategories')
        ->orderBy('name')
        ->get(['id', 'name']);
@endphp
<div class="header-inner">
    <div class="container">
        <div class="cat-nav-head">
            <div class="row">
                @if (request()->routeIs('index'))
                    <div class="col-lg-3">
                        <div class="all-category">
                            <h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>CATEGORIES</h3>
                            <ul class="main-category">
                                @foreach ($categories as $category)
                                    <li><a href="{{ route('productByCat', $category->id) }}">{{ $category->name }}
                                            @if ($category->subCategories->count() > 0)
                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                            @endif
                                        </a>
                                        @if ($category->subCategories->count() > 0)
                                            <ul class="sub-category">
                                                @foreach ($category->subCategories as $subCategory)
                                                    <li><a
                                                            href="{{ route('productBySubCat', $subCategory->id) }}">{{ $subCategory->name }}</a>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                <div class="col-lg-9 col-12">
                    <div class="menu-area">
                        {{-- <!-- Main Menu --> --}}
                        <nav class="navbar navbar-expand-lg">
                            <div class="navbar-collapse">
                                <div class="nav-inner ">
                                    <ul class="nav main-menu menu navbar-nav">
                                        <li class="active"><a href="{{ route('index') }}">Home</a></li>
                                        {{-- <li><a href="#">Service</a></li> --}}
                                        <li><a href="#">Product<i class="ti-angle-down"></i></a>
                                            <ul class="dropdown main_menu">
                                                @foreach ($categories as $category)
                                                    <li><a href="{{ route('productByCat', $category->id) }}">{{ $category->name }}
                                                            @if ($category->subCategories->count() > 0)
                                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                            @endif
                                                        </a>
                                                        @if ($category->subCategories->count() > 0)
                                                            <ul class="sub_category">
                                                                @foreach ($category->subCategories as $subCategory)
                                                                    <li>
                                                                        <a
                                                                            href="{{ route('productBySubCat', $subCategory->id) }}">{{ $subCategory->name }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        {{-- <li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
                                                <ul class="dropdown">
                                                    <li><a href="cart.html">Cart</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                </ul>
                                            </li> --}}
                                        {{-- <li><a href="#">Pages</a></li>
                                            <li><a href="#">Blog<i class="ti-angle-down"></i></a>
                                                <ul class="dropdown">
                                                    <li><a href="blog-single-sidebar.html">Blog Single Sidebar</a></li>
                                                </ul>
                                            </li> --}}
                                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        {{-- <!--/ End Main Menu --> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
