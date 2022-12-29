<!DOCTYPE html>
<html lang="zxx">

<head>
    {{-- <!-- Meta Tag --> --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <!-- Title Tag  --> --}}
    <title>Eshop - eCommerce HTML5 Template.</title>
    {{-- <!-- Favicon --> --}}
    <link rel="icon" type="image/png" href="images/favicon.png">
    {{-- <!-- Web Font --> --}}
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">
    {{-- <!-- StyleSheet --> --}}

    {{-- <!-- Bootstrap --> --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
    {{-- <!-- Magnific Popup --> --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.min.css') }}">
    {{-- <!-- Font Awesome --> --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <!-- Fancybox --> --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.fancybox.min.css') }}">
    {{-- <!-- Themify Icons --> --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/themify-icons.css') }}">
    {{-- <!-- Nice Select CSS --> --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/niceselect.css') }}">
    {{-- <!-- Animate CSS --> --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    {{-- <!-- Flex Slider CSS --> --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/flex-slider.min.css') }}">
    {{-- <!-- Owl Carousel --> --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/owl-carousel.css') }}">
    {{-- <!-- Slicknav --> --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css') }}">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    {{-- <!-- Eshop StyleSheet --> --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
</head>

<body class="js">
    {{-- <!-- Preloader --> --}}
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    {{-- <!-- End Preloader --> --}}

    {{-- <!-- Header --> --}}
    <header class="header shop">
        {{-- <!-- Topbar --> --}}
        @include('frontend.layout.includes.top_header')
        {{-- <!-- End Topbar --> --}}
        @include('frontend.layout.includes.middle_header')
        {{-- <!-- Header Inner --> --}}
        @include('frontend.layout.includes.navigation')
        {{-- <!--/ End Header Inner --> --}}
    </header>
    {{-- <!--/ End Header --> --}}
    @yield('content')
    <!-- Start Footer Area -->
    @include('frontend.layout.includes.footer')
    <!-- /End Footer Area -->

    <!-- Login Modal -->
    <div style="max-width: 50%">
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    {{-- <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> --}}
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <div class="text-center">
                                        <h4>Sign In</h4>
                                        <p>Sign In to your account</p>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="inputEmail" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="inputEmail">
                                </div>
                                <div class="col-12">
                                    <label for="inputPassword" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="inputPassword">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-check">
                                        <input type="checkbox" name="remember" class="form-check-input"
                                            id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Remember
                                            Me</label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 text-right">
                                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                                </div>
                                <div class="col-12 text-center">
                                    <div class="">
                                        <button type="submit" class="btn btn-primary">Sign In</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery -->
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-migrate-3.0.0.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
    <!-- Popper JS -->
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <!-- Color JS -->
    <script src="{{ asset('frontend/js/colors.js') }}"></script>
    <!-- Slicknav JS -->
    <script src="{{ asset('frontend/js/slicknav.min.js') }}"></script>
    <!-- Owl Carousel JS -->
    <script src="{{ asset('frontend/js/owl-carousel.js') }}"></script>
    <!-- Magnific Popup JS -->
    <script src="{{ asset('frontend/js/magnific-popup.js') }}"></script>
    <!-- Waypoints JS -->
    <script src="{{ asset('frontend/js/waypoints.min.js') }}"></script>
    <!-- Countdown JS -->
    <script src="{{ asset('frontend/js/finalcountdown.min.js') }}"></script>
    <!-- Nice Select JS -->
    <script src="{{ asset('frontend/js/nicesellect.js') }}"></script>
    <!-- Flex Slider JS -->
    <script src="{{ asset('frontend/js/flex-slider.js') }}"></script>
    <!-- ScrollUp JS -->
    <script src="{{ asset('frontend/js/scrollup.js') }}"></script>
    <!-- Onepage Nav JS -->
    <script src="{{ asset('frontend/js/onepage-nav.min.js') }}"></script>
    <!-- Easing JS -->
    <script src="{{ asset('frontend/js/easing.js') }}"></script>
    <!-- Active JS -->
    <script src="{{ asset('frontend/js/active.js') }}"></script>
    <script src="{{ asset('backend/js/plugins-init.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        function toast(status, header, msg) {
            Command: toastr[status](header, msg)
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "2000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        }
    </script>
    @stack('custom_scripts')
    <script>
        $(document).ready(function() {
            cartShow()
        })

        function cartShow() {
            $.ajax({
                url: '{{ route('frontend.cart.show') }}',
                method: 'get',
                success: function(res) {
                    if (res.status == 'success') {
                        $('#cart').html(res.html);
                    }
                }
            });
        }

        function cartDelete(e, cart_id) {
            e.preventDefault();
            $.ajax({
                url: '{{ route('frontend.cart.destroy') }}',
                type: 'delete',
                data: {
                    uuid: cart_id,
                },
                success: res => {
                    cartShow()
                    toast('success', res.message)
                },
                error: err => {}
            });
        }

        function cart(e, product_id) {
            e.preventDefault();
            $.ajax({
                url: '{{ route('frontend.cart.store') }}',
                type: 'POST',
                data: {
                    'product_id': product_id,
                },
                success: res => {
                    cartShow()
                    toast('success', res.message)
                },
                error: err => {}
            });
        }
    </script>
</body>

</html>
