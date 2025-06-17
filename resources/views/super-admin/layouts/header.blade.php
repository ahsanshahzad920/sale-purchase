<header id="header">
    <!-- navbar start  -->
    <nav class="navbar navbar-expand-lg ">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset('super-admin/assets/images/logo.svg')}}" alt="CORE CRMS" data-aos="fade-down" data-aos-duration="350">
            </a>
            <button class="navbar-toggler p-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                    </svg>
                </span>
            </button>
            <div class=" collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#" data-aos="fade-down"
                            data-aos-duration="450">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about" data-aos="fade-down" data-aos-duration="550">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#feature" data-aos="fade-down" data-aos-duration="650">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pricing" data-aos="fade-down" data-aos-duration="750">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact" data-aos="fade-down" data-aos-duration="750">Contact</a>
                    </li>
                </ul>
                @hasrole('Super Admin')
                    <a href="{{ route('super.dashboard') }}" class="icon_btn" data-aos="fade-down" data-aos-duration="850">
                        Dashboard
                    </a>
                    <a href="{{ route('auth.logout') }}" class="icon_btn ms-3" data-aos="fade-down" data-aos-duration="850"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                        <img src="{{ asset('super-admin/assets/images/login_icon.svg') }}" alt="" class="img-fluid ms-2">
                    </a>
                    <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @elseif (Auth::user() && Auth::user()->hasRole('Admin'))
                    <a href="{{ route('auth.logout') }}" class="icon_btn ms-3" data-aos="fade-down" data-aos-duration="850"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                        <img src="{{ asset('super-admin/assets/images/login_icon.svg') }}" alt="" class="img-fluid ms-2">
                    </a>
                    <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('auth.login') }}" class="icon_btn" data-aos="fade-down" data-aos-duration="850">
                        Login
                        <img src="{{ asset('super-admin/assets/images/login_icon.svg') }}" alt="" class="img-fluid ms-2">
                    </a>
                @endhasrole

            </div>
        </div>
    </nav>
    <!-- navbar end -->

    <!-- hero section start  -->
    <section id="hero" class="text-center">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 col-12 text-center">
                    <h1>CORE CRM’S, Hello inventory software</h1>
                    <p class="my-4">An Inventory Management System streamlines the tracking and control of stock
                        levels,
                        ensuring
                        businesses maintain optimal inventory.</p>
                    <button class="btn-primary">Free trial</button>
                </div>
            </div>
        </div>
        <img src="{{asset('super-admin/assets/images/hero_img.svg')}}" alt="" class="img-fluid mt-5">
    </section>
    <!-- hero section end -->
</header>
