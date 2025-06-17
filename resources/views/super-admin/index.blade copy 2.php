@extends('super-admin.layouts.app')

@section('content')
    <!-- made-for-everyone section start  -->
    <section id="made-for-everyone">
        <div class="container">
            <div class="row align-items-center">
                <div class="row mb-3 mb-md-5">
                    <div class="col-md-7 ">
                        <h2 data-aos="zoom-in-up" data-aos-duration="300">Made for everyone</h2>

                    </div>
                    <div class="col-md-5">
                        <p data-aos="zoom-in-up" data-aos-duration="350">
                            Life is short why spent to design
                            from scratch, Use finalui templates and its
                            dummy
                            text like lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box" data-aos="fade-up" data-aos-duration="450">
                        <img src="{{ asset('super-admin/assets/images/e-commerce.svg') }}" alt="" class="img-fluid">
                        <h3>For E-commerce</h3>
                        <p class="my-3">Our goal from day one was to build the best landing page platform </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box" data-aos="fade-up" data-aos-duration="550">
                        <img src="{{ asset('super-admin/assets/images/Startups.svg') }}" alt="" class="img-fluid">
                        <h3>For Startups</h3>
                        <p class="my-3">Our goal from day one was to build the best landing page platform </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box" data-aos="fade-up" data-aos-duration="650">
                        <img src="{{ asset('super-admin/assets/images/Vendors-2.svg') }}" alt="" class="img-fluid">
                        <h3>For Vendors</h3>
                        <p class="my-3">Our goal from day one was to build the best landing page platform </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- made-for-everyone section end -->

    <!-- selling product section start  -->
    <section id="made-for-everyone" class="selling_product">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="row align-items-center justify-content-center mb-3 mb-md-5 align-items-center">
                    <div class="col-md-7 col-12">
                        <h2 data-aos="zoom-in-up" data-aos-duration="300">Selling Digital <br> Product Is Easier.</h2>
                    </div>
                    <div class="col-md-5 col-12 mb-5">
                        <p data-aos="zoom-in-up" data-aos-duration="350">Life is short why spent to
                            design
                            from scratch, Use finalui templates and its
                            dummy
                            text like lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button data-aos="zoom-in-up" data-aos-duration="450" class="btn-primary mt-4">Learn
                            More</button>
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="{{ asset('super-admin/assets/images/img_3.svg') }}" alt="" class="img-fluid mt-2 "
                            data-aos="zoom-in-up" data-aos-duration="300">
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="{{ asset('super-admin/assets/images/img_4.svg') }}" alt="" class="img-fluid mt-2 "
                            data-aos="zoom-in-up" data-aos-duration="450">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- selling product section end -->



    <!-- about section start  -->
    <section id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6"><img src="{{ asset('super-admin/assets/images/about_2.svg') }}" alt=""
                        class="img-fluid w-70 mb-5 mb-md-0" data-aos="fade-right" data-aos-duration="400">
                </div>
                <div class="col-md-6">
                    <h2 data-aos="fade-up" data-aos-duration="350">What Can Our CRM Sales Do For You?</h2>
                    <div class="icon_box d-flex mt-4">
                        <img src="{{ asset('super-admin/assets/images/lead_managment.svg') }}" alt=""
                            class="img-fluid me-3">
                        <div class="text">
                            <h3>Batter Lead Managment</h3>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Labore, cupiditate.</p>
                        </div>
                    </div>
                    <div class="icon_box d-flex mt-3">
                        <img src="{{ asset('super-admin/assets/images/data.svg') }}" alt="" class="img-fluid me-3">
                        <div class="text">
                            <h3>Batter Lead Managment</h3>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Labore, cupiditate.</p>
                        </div>
                    </div>
                    <button class="btn-primary btn mt-3" data-aos="fade-up" data-aos-duration="800">Free trial</button>
                </div>
            </div>
        </div>
    </section>
    <!-- about section end -->

    <section id="feature">
        <div class="container">
            <h2 class="text-center " data-aos="zoom-in-up" data-aos-duration="300">Our Best Features</h2>
            <p class="text-center mt-3" data-aos="zoom-in-up" data-aos-duration="350">Life is short why spent to design
                from scratch, Use finalui templates and its
                dummy <br>
                text like lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm" data-aos="flip-left" data-aos-duration="450">
                        <img src="{{ asset('super-admin/assets/images/dashboard.svg') }}" alt="" class="img-fluid">
                        <h3 class="my-3">Super Dashboard</h3>
                        <p>Our goal from day one was to build the best landing page platform for Figma</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm" data-aos="fade-up" data-aos-duration="550">
                        <img src="{{ asset('super-admin/assets/images/Product_Managment.svg') }}" alt=""
                            class="img-fluid">
                        <h3 class="my-3">Product Managment</h3>
                        <p>Our goal from day one was to build the best landing page platform for Figma</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm" data-aos="flip-right" data-aos-duration="650">
                        <img src="{{ asset('super-admin/assets/images/sale_managment.svg') }}" alt=""
                            class="img-fluid">
                        <h3 class="my-3">Sale Managment</h3>
                        <p>Our goal from day one was to build the best landing page platform for Figma</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm" data-aos="flip-left" data-aos-duration="450">
                        <img src="{{ asset('super-admin/assets/images/payment.svg') }}" alt=""
                            class="img-fluid">
                        <h3 class="my-3">Secure Payments</h3>
                        <p>Our goal from day one was to build the best landing page platform for Figma</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm" data-aos="fade-up" data-aos-duration="550">
                        <img src="{{ asset('super-admin/assets/images/Inventry.svg') }}" alt=""
                            class="img-fluid">
                        <h3 class="my-3">Inventry Managment</h3>
                        <p>Our goal from day one was to build the best landing page platform for Figma</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm" data-aos="flip-right" data-aos-duration="650">
                        <img src="{{ asset('super-admin/assets/images/Customer.svg') }}" alt=""
                            class="img-fluid">
                        <h3 class="my-3">Customer Managment</h3>
                        <p>Our goal from day one was to build the best landing page platform for Figma</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm" data-aos="flip-left" data-aos-duration="450">
                        <img src="{{ asset('super-admin/assets/images/Vendors.svg') }}" alt=""
                            class="img-fluid">
                        <h3 class="my-3">Manage Vendors</h3>
                        <p>Our goal from day one was to build the best landing page platform for Figma</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm" data-aos="fade-up" data-aos-duration="550">
                        <img src="{{ asset('super-admin/assets/images/Shipment.svg') }}" alt=""
                            class="img-fluid">
                        <h3 class="my-3">Shipment Managment</h3>
                        <p>Our goal from day one was to build the best landing page platform for Figma</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm" data-aos="flip-right" data-aos-duration="650">
                        <img src="{{ asset('super-admin/assets/images/Account.svg') }}" alt=""
                            class="img-fluid">
                        <h3 class="my-3">Account Operation</h3>
                        <p>Our goal from day one was to build the best landing page platform for Figma</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm" data-aos="flip-left" data-aos-duration="450">
                        <img src="{{ asset('super-admin/assets/images/reporting.svg') }}" alt=""
                            class="img-fluid">
                        <h3 class="my-3">Reporting</h3>
                        <p>Our goal from day one was to build the best landing page platform for Figma</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm" data-aos="fade-up" data-aos-duration="550">
                        <img src="{{ asset('super-admin/assets/images/Content.svg') }}" alt=""
                            class="img-fluid">
                        <h3 class="my-3">Content Management System</h3>
                        <p>Our goal from day one was to build the best landing page platform for Figma</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center" data-aos="flip-right" data-aos-duration="650">
                    <button class="btn-primary btn">Start Free trial</button>
                </div>
            </div>
        </div>
    </section>
    <!-- feature section end -->

    <!-- pricing section start  -->
    {{-- <section id="pricing">
        <div class="container">
            <h1 class="text-center" data-aos="zoom-in-up" data-aos-duration="300">Pricing plans</h1>
            <p class="text-center mt-3" data-aos="zoom-in-up" data-aos-duration="350">Life is short why spent to design
                from scratch, Use finalui templates and its
                dummy
                text
                <br>
                like lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>
            <div class="row">

                @foreach ($plans as $plan)
                    <div class="col-lg-4">
                        <div class="card shadow-lg" data-aos="fade-up" data-aos-duration="300">
                            <h4>{{ $plan->title ?? '' }}</h4>
                            <h3>${{ $plan->price ?? '' }}<span>/ {{ $plan->type }}</span></h3>
                            <p>{{ $plan->sub_title ?? '' }}</p>
                            <ul>
                                @foreach ($plan->services as $service)
                                    <li><img src="{{ asset('super-admin/assets/images/chech_mark.svg') }}" alt=""
                                            class="img-fluid">{{ $service->title ?? 'N/A' }}</li>
                                @endforeach
                            </ul>
                            <form action="{{ route('purchasePlan') }}" method="POST">
                                @csrf
                                <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                <button type="submit" class="btn btn-primary btn-block">Get started</button>
                            </form>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section> --}}
    <section id="pricing">
        <div class="container">
            <h1 class="text-center" data-aos="zoom-in-up" data-aos-duration="300">
                Pricing plans
            </h1>
            <p class="text-center mt-3 mb-0" data-aos="zoom-in-up" data-aos-duration="350">
                Life is short why spent to design from scratch, Use finalui templates
                and its dummy text
                <br />
                like lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>

            <div class="d-flex gap-4 align-items-center justify-content-center my-5">
                <div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="switchMonthly" checked
                            onclick="togglePlan('monthly')" />
                        <label class="form-check-label" for="switchMonthly">Monthly</label>
                    </div>
                </div>
                <div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="switchYearly"
                            onclick="togglePlan('yearly')" />
                        <label class="form-check-label" for="switchYearly">Yearly</label>
                    </div>
                </div>
            </div>

            <!-- Toggleable Content -->
            <div id="monthlyContent">
                <div class="row">

                    @foreach ($monthlyPlans as $plan)
                        <div class="col-lg-4">
                            <div class="card shadow-lg" data-aos="fade-up" data-aos-duration="300">
                                <h4>{{ $plan->title ?? '' }}</h4>
                                <h3>${{ $plan->price ?? '' }}<span>/ {{ $plan->type }}</span></h3>
                                <p>{{ $plan->sub_title ?? '' }}</p>
                                <ul>
                                    @foreach ($plan->features as $feature)
                                        <li>
                                            @if ($feature->is_enabled)
                                                <img src="{{ asset('super-admin/assets/images/chech_mark.svg') }}"
                                                    alt="" class="img-fluid">
                                            @else
                                                <img src="{{ asset('super-admin/assets/images/download.png') }}"
                                                    width="15" alt="" class="img-fluid">
                                            @endif
                                            {{ isset($feature->limit) && $feature->limit == -1 ? 'Unlimited ' : $feature->limit . ' ' }}{{ $feature->feature_name ?? 'N/A' }}

                                        </li>
                                    @endforeach
                                </ul>
                                <form action="{{ route('purchasePlan') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="plan_id" value="{{ $plan->id }}">

                                    <div>
                                        <a type="button" class="mb-2" id="toggleCouponBtn-{{ $plan->id }}">
                                            Have a coupon code click here?
                                        </a>
                                    </div>

                                    <div class="form-group mb-2" id="couponField-{{ $plan->id }}"
                                        style="display: none;">
                                        <div class="input-group">
                                            <input type="text" name="coupon_code" id="coupon_code"
                                                class="form-control" placeholder="Enter coupon code">
                                        </div>
                                        <small class="text-muted">Enter your coupon code for discounts</small>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block">Get started</button>
                                </form>
                            </div>
                        </div>
                    @endforeach


                </div>
                {{-- <div class="row">
                    <div class="col-lg-4">
                        <div class="card shadow-lg" data-aos="fade-up" data-aos-duration="300">
                            <h4>Team</h4>
                            <h3>$97<span>per user</span></h3>
                            <p>A team license for multiple designers, freelancers</p>
                            <ul>
                                <li>
                                    <img src="./assets/images/chech_mark.svg" alt="" class="img-fluid" />2000
                                    requests
                                </li>
                                <li>
                                    <img src="./assets/images/chech_mark.svg" alt="" class="img-fluid" />Suport
                                    by Author
                                </li>
                                <li>
                                    <img src="./assets/images/chech_mark.svg" alt=""
                                        class="img-fluid" />Imaginary feature
                                </li>
                            </ul>
                            <button class="btn btn-primary btn-block">Get started</button>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card shadow-lg" data-aos="fade-up" data-aos-duration="550">
                            <h4>Team</h4>
                            <h3>$97<span>per user</span></h3>
                            <p>A team license for multiple designers, freelancers</p>
                            <ul>
                                <li>
                                    <img src="./assets/images/chech_mark.svg" alt="" class="img-fluid" />2000
                                    requests
                                </li>
                                <li>
                                    <img src="./assets/images/chech_mark.svg" alt="" class="img-fluid" />Suport
                                    by Author
                                </li>
                                <li>
                                    <img src="./assets/images/chech_mark.svg" alt=""
                                        class="img-fluid" />Imaginary feature
                                </li>
                            </ul>
                            <button class="btn btn-primary btn-block">Get started</button>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card shadow-lg" data-aos="fade-up" data-aos-duration="750">
                            <h4>Team</h4>
                            <h3>$97<span>per user</span></h3>
                            <p>A team license for multiple designers, freelancers</p>
                            <ul>
                                <li>
                                    <img src="./assets/images/chech_mark.svg" alt="" class="img-fluid" />2000
                                    requests
                                </li>
                                <li>
                                    <img src="./assets/images/chech_mark.svg" alt="" class="img-fluid" />Suport
                                    by Author
                                </li>
                                <li>
                                    <img src="./assets/images/chech_mark.svg" alt=""
                                        class="img-fluid" />Imaginary feature
                                </li>
                            </ul>
                            <button class="btn btn-primary btn-block">Get started</button>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div id="yearlyContent" style="display: none">
                <div class="row">

                    @foreach ($yearlyPlans as $plan)
                        {{-- <div class="col-lg-4">
                        <div class="card shadow-lg" data-aos="fade-up" data-aos-duration="300">
                            <h4>{{ $plan->title ?? '' }}</h4>
                            <h3>${{ $plan->price ?? '' }}<span>/ {{ $plan->type }}</span></h3>
                            <p>{{ $plan->sub_title ?? '' }}</p>
                            <ul>
                                @foreach ($plan->services as $service)
                                    <li><img src="{{ asset('super-admin/assets/images/chech_mark.svg') }}" alt=""
                                            class="img-fluid">{{ $service->title ?? 'N/A' }}</li>
                                @endforeach
                            </ul>
                            <form action="{{ route('purchasePlan') }}" method="POST">
                                @csrf
                                <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                <div>
                                    <a type="button" class="mb-2" id="toggleCouponBtn-{{ $plan->id }}">
                                        Have a coupon code click here?
                                    </a>
                                </div>

                                <div class="form-group mb-2" id="couponField-{{ $plan->id }}" style="display: none;">
                                    <div class="input-group">
                                        <input type="text" name="coupon_code" id="coupon_code" class="form-control"
                                            placeholder="Enter coupon code">
                                    </div>
                                    <small class="text-muted">Enter your coupon code for discounts</small>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Get started</button>
                            </form>
                        </div>
                    </div> --}}
                        <div class="col-lg-4">
                            <div class="card shadow-lg" data-aos="fade-up" data-aos-duration="300">
                                <h4>{{ $plan->title ?? '' }}</h4>
                                <h3>${{ $plan->price ?? '' }}<span>/ {{ $plan->type }}</span></h3>
                                <p>{{ $plan->sub_title ?? '' }}</p>
                                <ul>
                                    @foreach ($plan->features as $feature)
                                        <li>
                                            @if ($feature->is_enabled)
                                                <img src="{{ asset('super-admin/assets/images/chech_mark.svg') }}"
                                                    alt="" class="img-fluid">
                                            @else
                                                <img src="{{ asset('super-admin/assets/images/download.png') }}"
                                                    width="15" alt="" class="img-fluid">
                                            @endif
                                            {{ isset($feature->limit) && $feature->limit == -1 ? 'Unlimited ' : $feature->limit . ' ' }}{{ $feature->feature_name ?? 'N/A' }}

                                        </li>
                                    @endforeach
                                </ul>
                                <form action="{{ route('purchasePlan') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="plan_id" value="{{ $plan->id }}">

                                    <div>
                                        <a type="button" class="mb-2" id="toggleCouponBtn-{{ $plan->id }}">
                                            Have a coupon code click here?
                                        </a>
                                    </div>

                                    <div class="form-group mb-2" id="couponField-{{ $plan->id }}"
                                        style="display: none;">
                                        <div class="input-group">
                                            <input type="text" name="coupon_code" id="coupon_code"
                                                class="form-control" placeholder="Enter coupon code">
                                        </div>
                                        <small class="text-muted">Enter your coupon code for discounts</small>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block">Get started</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- pricing section end -->

    <!-- Testimonials section start  -->
    <section id="review">
        <div class="container-fluid">
            <h2 class="text-center" data-aos="zoom-in-up" data-aos-duration="300">Testimonials</h2>
            <p class="text-center mt-3" data-aos="zoom-in-up" data-aos-duration="350">Life is short why spent to design
                from scratch, Use finalui templates and its
                dummy
                <br> text like lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>
            <!-- slider start  -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="review_card" data-aos="flip-left">
                            <div class="star d-flex align-items-center">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                            </div>
                            <div class="review_text my-3">
                                <p>The Design System is the most versatile I could get my hands on. Compared to all the
                                    others I have tried, this is the best premium library out there!</p>
                            </div>
                            <div class="client_name d-flex align-items-center justify-content-between">
                                <h4>John Mike</h4>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="review_card" data-aos="flip-left">
                            <div class="star d-flex align-items-center">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                            </div>
                            <div class="review_text my-3" data-aos="flip-left">
                                <p>The Design System is the most versatile I could get my hands on. Compared to all the
                                    others I have tried, this is the best premium library out there!</p>
                            </div>
                            <div class="client_name d-flex align-items-center justify-content-between">
                                <h4>John Mike</h4>

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="review_card" data-aos="flip-left">
                            <div class="star d-flex align-items-center">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                            </div>
                            <div class="review_text my-3">
                                <p>The Design System is the most versatile I could get my hands on. Compared to all the
                                    others I have tried, this is the best premium library out there!</p>
                            </div>
                            <div class="client_name d-flex align-items-center justify-content-between">
                                <h4>John Mike</h4>

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="review_card" data-aos="flip-left">
                            <div class="star d-flex align-items-center">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                            </div>
                            <div class="review_text my-3" data-aos="flip-left">
                                <p>The Design System is the most versatile I could get my hands on. Compared to all the
                                    others I have tried, this is the best premium library out there!</p>
                            </div>
                            <div class="client_name d-flex align-items-center justify-content-between">
                                <h4>John Mike</h4>

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="review_card" data-aos="flip-left">
                            <div class="star d-flex align-items-center">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                            </div>
                            <div class="review_text my-3">
                                <p>The Design System is the most versatile I could get my hands on. Compared to all the
                                    others I have tried, this is the best premium library out there!</p>
                            </div>
                            <div class="client_name d-flex align-items-center justify-content-between">
                                <h4>John Mike</h4>

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="review_card" data-aos="flip-left">
                            <div class="star d-flex align-items-center">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                            </div>
                            <div class="review_text my-3">
                                <p>The Design System is the most versatile I could get my hands on. Compared to all the
                                    others I have tried, this is the best premium library out there!</p>
                            </div>
                            <div class="client_name d-flex align-items-center justify-content-between">
                                <h4>John Mike</h4>

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="review_card" data-aos="flip-left">
                            <div class="star d-flex align-items-center">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                            </div>
                            <div class="review_text my-3">
                                <p>The Design System is the most versatile I could get my hands on. Compared to all the
                                    others I have tried, this is the best premium library out there!</p>
                            </div>
                            <div class="client_name d-flex align-items-center justify-content-between">
                                <h4>John Mike</h4>

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="review_card" data-aos="flip-left">
                            <div class="star d-flex align-items-center">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                                <img src="{{ asset('super-admin/assets/images/star.svg') }}" alt=""
                                    class="img-fluid">
                            </div>
                            <div class="review_text my-3">
                                <p>The Design System is the most versatile I could get my hands on. Compared to all the
                                    others I have tried, this is the best premium library out there!</p>
                            </div>
                            <div class="client_name d-flex align-items-center justify-content-between">
                                <h4>John Mike</h4>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- slider end -->
        </div>
    </section>
    <!-- Testimonials section end -->

    {{-- contact us  --}}
    <section id="contact" class="contact section" style="background: #fafafa">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Get in Touch</h2>
            <!-- <p>
                              Necessitatibus eius consequatur ex aliquid fuga eum quidem sint
                              consectetur velit
                            </p> -->
        </div>
        <!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-5">
                    <div class="info-wrap">
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                            <div>
                                <h3>Address</h3>
                                <p>London, Paros</p>
                            </div>
                        </div>
                        <!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <div>
                                <h3>Call Us</h3>
                                <p>+61 XXXX XXX XXX</p>
                            </div>
                        </div>
                        <!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <div>
                                <h3>Email Us</h3>
                                <p>example@mail.com</p>
                            </div>
                        </div>
                        <!-- End Info Item -->

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus"
                            frameborder="0" style="border: 0; width: 100%; height: 270px" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

                <div class="col-lg-7">
                    <form action="{{ route('contact.store') }}" method="post" class="php-email-form"
                        data-aos="fade-up" data-aos-delay="200">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <label for="name-field" class="pb-2">Your Name</label>
                                <input type="text" name="name" id="name-field" class="form-control"
                                    required="" />
                            </div>

                            <div class="col-md-6">
                                <label for="email-field" class="pb-2">Your Email</label>
                                <input type="email" class="form-control" name="email" id="email-field"
                                    required="" />
                            </div>

                            <div class="col-md-12">
                                <label for="subject-field" class="pb-2">Subject</label>
                                <input type="text" class="form-control" name="subject" id="subject-field"
                                    required="" />
                            </div>

                            <div class="col-md-12">
                                <label for="message-field" class="pb-2">Message</label>
                                <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                            </div>

                            <div class="col-md-12">
                                <!-- <button type="submit">Send Message</button> -->
                                <button class="btn btn-primary btn-block" type="submit">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End Contact Form -->
            </div>
        </div>
    </section>
@endsection


@push('scripts')
    <script>
        function togglePlan(selected) {
            const monthlySwitch = document.getElementById("switchMonthly");
            const yearlySwitch = document.getElementById("switchYearly");
            const monthlyContent = document.getElementById("monthlyContent");
            const yearlyContent = document.getElementById("yearlyContent");

            if (selected === "monthly") {
                monthlySwitch.checked = true;
                yearlySwitch.checked = false;
                monthlyContent.style.display = "block";
                yearlyContent.style.display = "none";
            } else {
                monthlySwitch.checked = false;
                yearlySwitch.checked = true;
                monthlyContent.style.display = "none";
                yearlyContent.style.display = "block";
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all toggle buttons
            const toggleButtons = document.querySelectorAll('[id^="toggleCouponBtn-"]');

            toggleButtons.forEach(button => {
                // Extract plan ID from button ID
                const planId = button.id.split('-')[1];
                const couponField = document.getElementById(`couponField-${planId}`);

                button.addEventListener('click', function() {
                    if (couponField.style.display === 'none') {
                        couponField.style.display = 'block';
                        button.textContent = 'Hide coupon';
                    } else {
                        couponField.style.display = 'none';
                        button.textContent = 'Have a coupon code click here?';
                    }
                });
            });
        });
    </script>
@endpush
