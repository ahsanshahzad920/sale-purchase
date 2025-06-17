<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon Icon -->
    <link rel="icon" href="{{ asset('super-admin/assets/img/favicon.png') }}">
    <!-- Site Title -->
    <title>CoreCrms | CRM management</title>
    <link rel="stylesheet" href="{{ asset('super-admin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('super-admin/assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('super-admin/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('super-admin/assets/css/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('super-admin/assets/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('super-admin/assets/css/style.css') }}">
    {{-- simple notify  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.css" />


</head>

<body>

    <!-- Start Preloader -->
    {{-- <div class="cs_preloader cs_white_bg">
        <div class="cs_preloader_in position-relative">
          <span></span>
        </div>
      </div> --}}
    <!-- End Preloader -->
    <!-- Start Header Section -->

    {{-- @if (request()->routeIs('contacts'))
        <header class="cs_site_header cs_style_1 cs_sticky_header position-relative">
            <div class="cs_main_header cs_heading_font">
                <div class="container">
                    <div class="cs_main_header_in position-relative">
                        <div class="cs_header_shape position-absolute">
                            <img src="assets/img/header-shape.svg" alt="Header shape">
                        </div>
                        <div class="cs_main_header_left position-relative z-1">
                            <a class="cs_site_branding" href="home-v2.html" aria-label="Home page link">
                                <img src="assets/img/logo-194x36.png" alt="Logo">
                            </a>
                        </div>
                        <div class="cs_main_header_center">
                            <div class="cs_nav">
                                <ul class="cs_nav_list">
                                    <li class="menu-item-has-children">
                                        <a href="/" aria-label="Menu link">Home</a>

                                    </li>
                                    <li><a href="#about" aria-label="Menu link">About Us</a></li>
                                    <li><a href="#services" aria-label="Menu link">Services</a></li>
                                    <li><a href="#pricing" aria-label="Menu link">Pricing</a></li>

                                    <li><a href="{{ route('contacts') }}" aria-label="Menu link">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="cs_main_header_right">
                            <a href="{{ route('auth.login') }}" aria-label="Get started button"
                                class="cs_btn cs_style_1 cs_bg_1 cs_fs_14 cs_bold cs_white_color text-uppercase">
                                <span>Get Started</span>
                                <span class="cs_btn_icon"><i class="fa-solid fa-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    @else
    @endif --}}

    <header class="cs_site_header cs_style_1 cs_type_2 cs_sticky_header cs_white_color cs_heading_font">
        <div class="cs_main_header">
            <div class="container">
                <div class="cs_main_header_in">
                    <div class="cs_main_header_left">
                        <a class="cs_site_branding" href="/" aria-label="Home page link">
                            <img src="{{ asset('super-admin/assets/img/logo-194x36.png') }}" alt="Logo">
                        </a>
                    </div>
                    <div class="cs_main_header_center">
                        <div class="cs_nav">
                            <ul class="cs_nav_list">
                                <li class="menu-item-has-children">
                                    <a href="/" aria-label="Menu link">Home</a>

                                </li>
                                <li><a href="#about" aria-label="Menu link">About Us</a></li>
                                <li><a href="#services" aria-label="Menu link">Services</a></li>
                                <li><a href="#pricing" aria-label="Menu link">Pricing</a></li>

                                <li><a href="{{ route('contacts') }}" aria-label="Menu link">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="cs_main_header_right">
                        <a href="{{ route('auth.login') }}" aria-label="Get started button"
                            class="cs_btn cs_style_1 cs_theme_bg_4 cs_fs_14 cs_bold cs_heading_color text-uppercase">
                            <span>Get Started</span>
                            <span class="cs_btn_icon"><i class="fa-solid fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!-- End Header Section -->

    @yield('content')
    <!-- Start Footer Section -->
    <footer class="cs_footer cs_style_1 cs_type_2 cs_accent_bg cs_bg_filed" data-src="assets/img/footer-bg-3.svg">
        <div class="cs_height_130 cs_height_lg_80"></div>
        <div class="container">
            <div class="cs_footer_top position-relative">
                <ul class="cs_location_list cs_mp_0">
                    <li>
                        <span class="cs_location_icon cs_center cs_heading_color cs_radius_100">
                            <i class="fa-solid fa-location-dot"></i></span>
                        <div class="cs_location_info cs_fs_18">
                            <p class="cs_fs_14 cs_theme_color_4 mb-0">ADDRESS</p>
                            <p class="cs_white_color mb-0">Atlanta, GA 30030 USA</p>
                        </div>
                    </li>
                    <li>
                        <span class="cs_location_icon cs_center cs_heading_color cs_radius_100">
                            <i class="fa-solid fa-envelope"></i></span>
                        <div class="cs_location_info cs_fs_18">
                            <p class="cs_fs_14 cs_theme_color_4 mb-0">EMAIL</p>
                            <a href="mailto:info@corecrms.com" aria-label="Send mail link">info@corecrms.com</a>
                            <!--<a href="mailto:info@corecrms.com" aria-label="Send mail link">info@corecrms.com</a> -->
                        </div>
                    </li>
                    <li>
                        <span class="cs_location_icon cs_center cs_heading_color cs_radius_100">
                            <i class="fa-solid fa-phone"></i></span>
                        <div class="cs_location_info cs_fs_18">
                            <p class="cs_fs_14 cs_theme_color_4 mb-0">CALL</p>
                            <a href="tel:+4703574652" aria-label="Make a call link">+1 4703574652</a><br>
                            <!-- <a href="tel:+452369421587" aria-label="Make a call link">+(452) 3694-21587</a> -->
                        </div>
                    </li>
                </ul>
            </div>
            <div class="cs_footer_main cs_radius_30">
                <div class="cs_footer_desc">
                    <div class="cs_brand">
                        <img src="{{ asset('super-admin/assets/img/logo-194x36.png') }}" alt="Logo">
                    </div>
                    <div class="cs_footer_desc_text">Their team's technical expertise is truly outstanding. They took
                        the time to thoroughly understand our goals and requirements and then designed and implemented
                        solutions that not only addressed our immediate challenges but also positioned us for future
                        growth.</div>
                </div>
                <div class="cs_footer_header cs_radius_30">
                    <ul class="cs_footer_menu cs_semibold cs_white_color cs_mp_0">
                        <li><a href="/" aria-label="Home page link">Home</a></li>
                        <li><a href="/#about" aria-label="About page link">About Us</a></li>
                        <li><a href="/#service" aria-label="Services page link">Services</a></li>
                        <li><a href="/#pricing" aria-label="Services page link">Pricing</a></li>
                        <li><a href="{{ route('contacts') }}" aria-label="Contact page link">Contact Us</a></li>
                    </ul>
                    <div class="cs_social_links cs_style_1 cs_heading_color">
                        <a href="#" aria-label="Social link"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" aria-label="Social link"><i class="fa-brands fa-x-twitter"></i></a>
                        <a href="#" aria-label="Social link"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" aria-label="Social link"><i class="fa-brands fa-behance"></i></a>
                    </div>
                </div>
            </div>
            <div class="cs_footer_bottom position-relative">
                <div class="cs_footer_text cs_white_color text-center">Copyright &copy; <span
                        class="cs_getting_year"></span> Theme by 77Clouds</div>
            </div>
        </div>
    </footer>
    <!-- End Footer Section -->
    <!-- Start Scroll Up Button -->
    <button type="button" aria-label="Scroll to top button"
        class="cs_scrollup cs_purple_bg cs_white_color cs_radius_100">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 10L1.7625 11.7625L8.75 4.7875V20H11.25V4.7875L18.225 11.775L20 10L10 0L0 10Z"
                fill="currentColor" />
        </svg>
    </button>
    <!-- End Scroll Up Button -->




    <script src="{{ asset('super-admin/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('super-admin/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('super-admin/assets/js/jquery.slick.min.js') }}"></script>
    <script src="{{ asset('super-admin/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('super-admin/assets/js/odometer.js') }}"></script>
    <script src="{{ asset('super-admin/assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.min.js"></script>


    <script>
        function customAlert(status, title, message) {
            new Notify({
                status: status,
                title: title,
                text: message,
                effect: 'fade',
                speed: 300,
                customClass: '',
                customIcon: '',
                showIcon: true,
                showCloseButton: true,
                autoclose: true,
                autotimeout: 3000,
                notificationsGap: null,
                notificationsPadding: null,
                type: 'outline',
                position: 'right top',
                customWrapper: '',
            });
        }
    </script>


    @if (session('success'))
        <script>
            customAlert('success', 'Success', '{{ session('success') }}');
        </script>
    @endif

    @if (session('error'))
        <script>
            customAlert('error', 'Error', '{{ session('error') }}');
        </script>
    @endif

    @if (session('info'))
        <script>
            customAlert('info', 'Info', '{{ session('info') }}');
        </script>
    @endif

    @if ($errors->any())
        <script>
            @foreach ($errors->all() as $error)
                customAlert('error', 'Error', '{{ $error }}');
            @endforeach
        </script>
    @endif

    @stack('scripts')

</body>

</html>
