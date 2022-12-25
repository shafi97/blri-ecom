<div class="middle-inner">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-12">
                {{-- <!-- Logo --> --}}
                <div class="logo">
                    <a href="index.html"><img src="{{ asset('backend/images/logo.png') }}" alt="logo"></a>
                </div>
                {{-- <!--/ End Logo -->
                <!-- Search Form --> --}}
                <div class="search-top">
                    <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                    <!-- Search Form -->
                    <div class="search-top">
                        <form class="search-form">
                            <input type="text" placeholder="Search here..." name="search">
                            <button value="search" type="submit"><i class="ti-search"></i></button>
                        </form>
                    </div>
                    {{-- <!--/ End Search Form --> --}}
                </div>
                {{-- <!--/ End Search Form --> --}}
                <div class="mobile-nav"></div>
            </div>
            <div class="col-lg-8 col-md-7 col-12">
                <div class="search-bar-top">
                    <div class="search-bar">
                        <select>
                            <option selected="selected">All Category</option>
                            <option>watch</option>
                            <option>mobile</option>
                            <option>kid’s item</option>
                        </select>
                        <form>
                            <input name="search" placeholder="Search Products Here....." type="search">
                            <button class="btnn"><i class="ti-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-12">
                <div class="right-bar">
                    {{-- <!-- Search Form --> --}}
                    <div class="sinlge-bar">
                        <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                    </div>
                    {{-- <div class="sinlge-bar">
                        <a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                    </div> --}}
                    <div class="sinlge-bar shopping" id="cart">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
