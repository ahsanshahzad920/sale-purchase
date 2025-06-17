@extends('super-admin.layouts.app')

@section('content')
    <!-- Start Page Heading -->
    <section class="cs_page_heading cs_bg_filed text-center cs_gray_bg_2 position-relative overflow-hidden"
        data-src="{{asset('super-admin/assets/img/page-heading-bg.svg')}}">
        <div class="container">
            <h1 class="cs_fs_64 cs_bold cs_mb_8">Contact Us</h1>
            <ol class="breadcrumb cs_fs_18 cs_heading_font">
                <li class="breadcrumb-item"><a aria-label="/" href="/">Home</a></li>
                <li class="breadcrumb-item active">Contact Us</li>
            </ol>
        </div>
    </section>
    <!-- End Page Heading -->
    <!-- Start Contact Section -->
    <section>
        <div class="cs_height_120 cs_height_lg_80"></div>
        <div class="container">
            <div class="row cs_gap_y_30 align-items-center">
                <div class="col-lg-6">
                    <div class="cs_contact_desc">
                        <ul class="cs_contact_info_list cs_mp_0">
                            <li>
                                <div class="cs_iconbox cs_style_6">
                                    <span class="cs_iconbox_icon cs_center cs_radius_100 position-relative">
                                        <img src="{{asset('super-admin/assets/img/icons/call.svg')}}" alt="Telephone icon">
                                    </span>
                                    <div class="cs_iconbox_info">
                                        <p class="cs_white_color cs_heading_font cs_mb_4">Call Us</p>
                                        <a href="tel:+2085550112" aria-label="Phone call button"
                                            class="cs_fs_24 cs_bold cs_white_color cs_heading_font">+1 4703574652</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="cs_iconbox cs_style_6">
                                    <span class="cs_iconbox_icon cs_center cs_radius_100 position-relative">
                                        <img src="{{asset('super-admin/assets/img/icons/email.svg')}}" alt="Email icon">
                                    </span>
                                    <div class="cs_iconbox_info">
                                        <p class="cs_white_color cs_heading_font cs_mb_4">Make a Quote</p>
                                        <a href="mailto:Infotek@gmail.com" aria-label="Phone call button"
                                            class="cs_fs_24 cs_bold cs_white_color cs_heading_font">info@corecrms.com</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="cs_iconbox cs_style_6">
                                    <span class="cs_iconbox_icon cs_center cs_radius_100 position-relative">
                                        <img src="{{asset('super-admin/assets/img/icons/location.svg')}}" alt="Location icon">
                                    </span>
                                    <div class="cs_iconbox_info">
                                        <p class="cs_white_color cs_heading_font cs_mb_4">Location</p>
                                        <p class="cs_fs_24 cs_bold cs_white_color cs_heading_font mb-0">Atlanta GA 30030 USA
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <a href="https://www.youtube.com/embed/HC-tgFdIcB0" aria-label="Click to play video"
                            class="cs_video cs_style_1 cs_center cs_video_open cs_bg_filed position-relative"
                            data-src="{{asset('super-admin/assets/img/contact-img-1.jpg')}}">
                            <span
                                class="cs_player_btn cs_style_1 cs_center cs_radius_100 cs_white_bg cs_theme_color_3 position-relative"><i
                                    class="fa-solid fa-play"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="cs_contact_form_wrapper">
                        <h2 class="cs_fs_36 cs_semibold cs_mb_21">Ready to Get Started?</h2>
                        <p class="cs_mb_26">Feel free to fill your contact information and we shall get back to you soon</p>
                        <form action="{{route('contact.store')}}" method="POST"
                        class="cs_contact_form row cs_gap_y_20" >
                        @csrf
                            <input type="hidden" name="access_key" value="YOUR_ACCESS_KEY_HERE">
                            <div class="col-sm-6">
                                <label for="name">Your Name*</label>
                                <input type="text" name="name" id="name" placeholder="Your Name"
                                    class="cs_form_field cs_radius_8">
                            </div>
                            <div class="col-sm-6">
                                <label for="email">Your Email*</label>
                                <input type="email" name="email" id="email" placeholder="Email Address"
                                    class="cs_form_field cs_radius_8">
                            </div>
                            <div class="col-sm-12">
                                <label for="subject">Your Subject*</label>
                                <input type="text" name="subject" id="subject" placeholder="Subject"
                                    class="cs_form_field cs_radius_8">
                            </div>
                            <div class="col-sm-12">
                                <label for="message">Message*</label>
                                <textarea name="message" rows="6" id="message" placeholder="Write Message" class="cs_form_field cs_radius_8"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit"
                                    class="cs_btn cs_style_1 cs_bg_1 cs_semibold cs_white_color text-capitalize">
                                    <span>Send Message</span>
                                    <span class="cs_btn_icon"><i class="fa-solid fa-arrow-right"></i></span>
                                </button>
                                {{-- <div id="cs_result" class="cs_result"></div> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="cs_height_120 cs_height_lg_80"></div>
    </section>
    <div class="cs_location_map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158857.8398865339!2d-0.2664029591612951!3d51.52873980508483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C%20UK!5e0!3m2!1sen!2sbd!4v1745143522273!5m2!1sen!2sbd"
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@endsection


@push('scripts')
@endpush
