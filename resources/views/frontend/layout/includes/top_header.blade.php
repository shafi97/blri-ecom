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
            <style>
                .top_menu ul li a {
                    color: black !important;
                    padding: 2px 8px !important;
                    font-size: 14px !important;
                }
                .menu-area .top_menu ul li a i {
                    display: inline-block;
                    margin-right: 4px;
                    font-size: 14px;
                    color: #F7941D;
                    position: relative;
                }
            </style>
            <div class="col-lg-7 col-md-12 col-12">
                {{-- <!-- Top Right --> --}}
                <div class="menu-area right-content">
                    {{-- <!-- Main Menu --> --}}
                    <nav class="navbar navbar-expand-lg">
                        <div class="navbar-collapse">
                            <div class="nav-inner top_menu">
                                <ul class="nav main-menu menu navbar-nav">
                                    @auth
                                        <li><a href="#"><i class="ti-user"></i> {{ user()->name }}<i
                                                    class="ti-angle-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="#">My Account</a></li>
                                                <li><a href="#">My Order</a></li>
                                            </ul>
                                        </li>
                                    @endauth
                                    @guest
                                        <li><a href="contact.html">Login</a></li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </nav>
                    {{-- <!--/ End Main Menu --> --}}
                </div>
                {{-- <!-- End Top Right --> --}}
            </div>
        </div>
    </div>
</div>
