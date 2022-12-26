<div class="topbar">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12 col-12">
                {{-- <!-- Top Left --> --}}
                <div class="top-left">
                    <ul class="list-main">
                        <li><i class="ti-headphone-alt"></i> +060 (800) 801-582</li>
                        <li><i class="ti-email"></i> support@shophub.com</li>
                    </ul>
                </div>
                {{-- <!--/ End Top Left --> --}}
            </div>
            <div class="col-lg-7 col-md-12 col-12 _top_menu">
                {{-- <!-- Top Right --> --}}
                <div class="right-content">
                    {{-- <!-- Main Menu --> --}}
                            <div class="top_menu">
                                <ul class="">
                                    @auth
                                        <li><a href="#"><i class="ti-user"></i> {{ user()->name }}<i
                                                    class="ti-angle-down"></i></a>
                                            <ul class="">
                                                <li><a href="#">My Account</a></li>
                                                <li><a href="#">My Order</a></li>
                                                <li><a href="{{ route('frontend.logout') }}">Logout</a></li>
                                            </ul>
                                        </li>
                                    @endauth
                                    @guest
                                        <li><a href="javascript:;" data-toggle="modal" data-target="#exampleModal">Login</a></li>
                                    @endguest
                                </ul>
                            </div>
                    {{-- <!--/ End Main Menu --> --}}
                </div>
                {{-- <!-- End Top Right --> --}}
            </div>
        </div>
    </div>
</div>
