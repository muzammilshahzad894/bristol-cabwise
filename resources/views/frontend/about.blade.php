@extends('layouts.frontend.app')
<style>
    .section-padding {
        padding: 70px 0px 0px 0px;
    }

    .home_heading {
        font-size: 60px;
    }

    .banner-header {
        min-height: 520px;
    }

    .offer_img {
        height: 300px;
        max-width: 450px !important;

    }

    .img-fluid {
        height: 450px !important;

    }

    .padding-top {
        margin-top: 4.5rem !important;
    }

    .inner-title {
        font-weight: bold;
        color: #fff;
        font-size: 17px;
    }

    @media (max-width: 767px) {
        .mobile_screen {
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }

        .home_heading {
            font-size: 40px;
        }

        .order_1 {
            order: 2 !important;
        }

        .order_2 {
            order: 1 !important;
        }
    }
</style>
@section('content')
    <!-- Header Banner -->
    <section class="banner-header section-padding bg-img" data-overlay-dark="4"
        data-background="{{ asset('frontend-assets/img/slider/3.jpg') }}">
        <div class="v-middle">
            <div class="container">
                <div class="row">
                    {{-- <div class="col-md-12 mobile_screen">
                    <h1>About <span>Us</span></h1>
                </div> --}}


                    <div class="col-md-12 text-center " style="">
                        <h1 style="" class="home_heading">About Us </h1>
                        <!-- <p class="home_p" style="max-width: 600px; margin: 0 auto; color:#ffc107;">
                            Your premier pre-booking platform for reliable taxi services in Bristol, UK. Enjoy seamless
                            travel from airport transfers to city tours. Book now for stress-free journeys!
                        </p> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-us section-padding">
        <div class="container">
            <div class="row">
                <div class="section-subtitle"></div>
                <h4 class="section-title">Pre-Booking Cab Service in Bristol and <span>Across the United Kingdom</span>
                </h4>
                <p>
                    Welcome to our premier pre-booking cab service, serving Bristol and cities across the United
                    Kingdom. We offer a range of transportation solutions tailored to your needs, ensuring comfort,
                    convenience, and reliability at affordable rates.
                </p>
            </div>
            <div class="container-fluid about-section">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="about-card">
                            <div class="d-flex text-center" style="width:100%; justify-content:center; padding:20px 0px">
                                <h4 class="section-title">Our Story – The Family <span> Business</span></h4>
                            </div>
                            <div class="section-text">
                                <p class="highlight">At Bristol Cabwise, we take pride in delivering a premium door-to-door cab service that emphasizes comfort and convenience. Our fleet consists of top-of-the-range executive and comfort vehicles, operated by experienced drivers dedicated to making every journey enjoyable.</p>
                                <p class="highlight">
                                    <span class="inner-title">Established in 2022,</span> Bristol Cabwise was founded with the vision of providing high-quality transportation services tailored to the needs of business professionals, tourists, residents, and others requiring reliable pre-booked cabs. We began with a small fleet, including a Mercedes E-Class, a Mercedes Vito, and a VW Transporter, supported by a team of two drivers. From the start, our focus was on delivering exceptional service, ensuring that every journey was safe, comfortable, and efficient.
                                </p>
                                <p>Our dedication to quality earned us a loyal customer base, leading to increased demand for our services. As a result, we expanded our fleet and team. Today, Bristol Cabwise operates a diverse range of executive and comfort vehicles, all meticulously maintained to meet the highest standards of safety and comfort.</p>
                                <p>We offer a comprehensive range of services to meet the diverse needs of our clients. These include city-to-city transfers, airport pickups and drop-offs, private journeys, business transfers, and event transportation. Additionally, we provide specialized services for events, private tours, and corporate functions. Whether you need a ride to a business meeting, a family outing, or a seamless airport transfer, we have a solution to fit your needs.</p>
                                <p>Our user-friendly pre-booking system allows customers to secure their rides with just a few clicks, and our highly professional staff is available 24/7 to ensure top-notch service. We offer competitive rates without compromising on quality.</p>
                                <p class="highlight">At Bristol Cabwise, our mission is to make every journey a positive and memorable experience. We believe that transportation should be more than just getting from point A to point B, it should be an experience you look forward to. As we continue to grow, we remain committed to providing reliable, comfortable, and high-quality transportation services that you can trust.</p>
                                <p>Book your ride with Bristol Cabwise today and experience the convenience and reliability our clients have come to expect. Let us take you where you need to go with confidence and style.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <div class="d-flex text-center" style="width:100%; justify-content:center; padding:20px 0px">

                            <h4 class="section-title">Our Story – The Family <span> Business</span></h4>
                        </div>
                        <div class="row">
                            <div class="col-md-6 order_2">
                                <div class="section-subtitle"></div>
                                {{-- <h4 class="section-title">Competitive <span>Rates:</span></h4> --}}
                                <p>At Bristol Cabwise, we take great pleasure in providing a premium, door-to-door cab
                                    service
                                    designed to make our passengers' lives easier. We do this by utilizing top-of-the-range
                                    executive and comfort vehicles and experienced drivers who are dedicated to making your
                                    journey a pleasure.
                                </p>
                            </div>
                            <div class="col-md-6 order_2">
                                <div class="item">
                                    <img src="{{ asset('frontend-assets/img/about/about_1.webp') }}" alt="about"
                                        style="max-height:  300px !important;" class="img-fluid offer_img">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 padding-top  order_1">
                                <div class="item">
                                    <img src="{{ asset('frontend-assets/img/about/about_2.jpeg') }}" alt="about"
                                        style="max-height:  300px !important;" class="img-fluid offer_img">
                                </div>
                            </div>

                            <div class="col-md-6 padding-top order_2">
                                <div class="section-subtitle"></div>
                                {{-- <h4 class="section-title">Highly Professional <span>Staff:</span></h4> --}}
                                <p> O*Bristol Cabwise was established in 2022* by M. Malik and Umair Riaz with a vision to
                                    offer
                                    a premium transportation service to business professionals, tourists, residents, and
                                    many
                                    others who require pre-booked cabs for airport transfers, business needs, and various
                                    other
                                    journeys. We launched the family business with a Mercedes E-Class, a Mercedes Vito, and
                                    a VW
                                    Transporter, supported by a small team of two drivers. This initial setup was driven by
                                    a
                                    commitment to providing high-quality, reliable transport services catering to a diverse
                                    range of needs.
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 padding-top order_1">
                                <div class="section-subtitle"></div>
                                {{-- <h4 class="section-title">24/7 <span>Availability:</span></h4> --}}
                                <p>From the outset, our focus has been on delivering exceptional service and maintaining the
                                    highest standards of professionalism. We believe that every journey should be
                                    comfortable,
                                    safe, and efficient, and our early success was built on these core principles. Our
                                    dedication to quality quickly earned us the trust of our clients, leading to a steady
                                    increase in demand for our services.
                                </p>
                            </div>
                            <div class="col-md-6 padding-top  order_2">
                                <div class="item">
                                    <img src="{{ asset('frontend-assets/img/about/about_6.jpg') }}" alt="about"
                                        style="max-height:  300px !important;" class="img-fluid offer_img">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 padding-top order_1">
                                <div class="item">
                                    <img src="{{ asset('frontend-assets/img/about/about_5.jpg') }}" alt="about"
                                        style="max-height:  300px !important;" class="img-fluid offer_img">
                                </div>
                            </div>
                            <div class="col-md-6 padding-top order_2">
                                <div class="section-subtitle"></div>
                                {{-- <h4 class="section-title">Easy Booking <span> Process:</span></h4> --}}
                                <p>Over time, we have experienced significant growth, which has allowed us to expand our
                                    fleet
                                    and services. We have added a variety of new vehicles to accommodate a broader range of
                                    transportation needs, and our team of drivers has grown to ensure we continue to provide
                                    exceptional service. This expansion has enabled us to offer an even more comprehensive
                                    suite
                                    of services, including city-to-city transfers, airport pickups and drop-offs, private
                                    journeys, business transfers, and event transportation.
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 order_2">
                                <div class="section-subtitle"></div>
                                {{-- <h4 class="section-title">Competitive <span>Rates:</span></h4> --}}
                                <p>Today, Bristol Cabwise operates with a diverse fleet of executive and comfort vehicles,
                                    each
                                    meticulously maintained to ensure the highest levels of safety and comfort. Our team of
                                    professional drivers are skilled, courteous, and attentive, ensuring that every trip is
                                    a
                                    pleasant experience. We continue to serve a broad range of clients, from business
                                    professionals needing reliable transportation for meetings and events to tourists
                                    exploring
                                    new destinations and residents seeking dependable travel options.
                                </p>
                            </div>
                            <div class="col-md-6 order_2">
                                <div class="item">
                                    <img src="{{ asset('frontend-assets/img/about/about_4.webp') }}" alt="about"
                                        style="max-height:  300px !important;" class="img-fluid offer_img">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 padding-top  order_1">
                                <div class="item">
                                    <img src="{{ asset('frontend-assets/img/about/about_7.jpg') }}" alt="about"
                                        style="max-height:  300px !important;" class="img-fluid offer_img">
                                </div>
                            </div>

                            <div class="col-md-6 padding-top order_2">
                                <div class="section-subtitle"></div>
                                {{-- <h4 class="section-title">Highly Professional <span>Staff:</span></h4> --}}
                                <p>
                                    Our premium transport services now include not only airport transfers and city-to-city
                                    journeys but also specialized services for events, private tours, and business
                                    functions.
                                    Whether you're heading to a corporate event, planning a family outing, or requiring a
                                    seamless airport transfer, we offer a range of options to suit your needs. Our
                                    pre-booking
                                    system is designed for convenience, allowing you to secure your ride with just a few
                                    clicks
                                    and ensuring that your transportation is taken care of well in advance.
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 padding-top order_1">
                                <div class="section-subtitle"></div>
                                {{-- <h4 class="section-title">24/7 <span>Availability:</span></h4> --}}
                                <p>
                                    At Bristol Cabwise, we pride ourselves on our competitive rates, highly professional
                                    staff,
                                    and 24/7 availability. We are committed to making every journey with us a positive and
                                    memorable experience. Book your ride today and experience the convenience, comfort, and
                                    reliability of Bristol Cabwise. Let us take you where you need to go in style and
                                    confidence, knowing that you are in the hands of a trusted and experienced
                                    transportation
                                    provider.
                                </p>
                            </div>
                            <div class="col-md-6 padding-top  order_2">
                                <div class="item">
                                    <img src="{{ asset('frontend-assets/img/about/about_8.jpg') }}" alt="about"
                                        style="max-height:  300px !important;" class="img-fluid offer_img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->


            <div class="row">
                <div class="d-flex text-center" style="width:100%; justify-content:center; padding:20px 0px">
                    <h4 class="section-title">Services <span>Offered</span></h4>
                </div>

                <!-- Desktop version -->
                <div class="row d-none d-lg-flex">
                    @php $counter = 0; @endphp
                    @foreach ($services as $service)
                        @if ($counter % 2 == 0)
                            <!-- Normal order -->
                            <div class="col-lg-6 col-md-12 mb-30 mt-2">
                                <div class="content">
                                    <div class="section-title">{{ $service->detail_page_first_heading }}
                                        <span>{{ $service->detail_page_second_heading }}</span>
                                    </div>
                                    <p class="mb-30">{{ $service->detail_page_description }}</p>
                                    <ul class="list-unstyled list mb-30">
                                        @foreach (explode(',', $service->detail_page_features) as $feature)
                                            <li>
                                                <div class="list-icon"> <span class="ti-check"></span> </div>
                                                <div class="list-text">
                                                    <p>{{ $feature }}</p>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-5 offset-lg-1 col-md-12 mt-2">
                                <div class="item">
                                    <img src="{{ asset('uploads/services/' . $service->image) }}" alt="about"
                                        class="img-fluid">
                                </div>
                            </div>
                        @else
                            <!-- Reversed order -->
                            <div class="col-lg-5 col-md-12 mb-30 mt-2">
                                <div class="item">
                                    <img src="{{ asset('uploads/services/' . $service->image) }}" alt="about"
                                        class="img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-6 offset-lg-1 col-md-12 mt-2">
                                <div class="content">
                                    <div class="section-title">{{ $service->detail_page_first_heading }}
                                        <span>{{ $service->detail_page_second_heading }}</span>
                                    </div>
                                    <p class="mb-30">{{ $service->detail_page_description }}</p>
                                    <ul class="list-unstyled list mb-30">
                                        @foreach (explode(',', $service->detail_page_features) as $feature)
                                            <li>
                                                <div class="list-icon"> <span class="ti-check"></span> </div>
                                                <div class="list-text">
                                                    <p>{{ $feature }}</p>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        @php $counter++; @endphp
                    @endforeach
                </div>
                <!-- Mobile version -->
                <div class="row d-lg-none">
                    @foreach ($services as $service)
                        <!-- Normal order for all items -->
                        <div class="col-md-12 mb-30 mt-2">
                            <div class="content">
                                <div class="section-title">{{ $service->detail_page_first_heading }}
                                    <span>{{ $service->detail_page_second_heading }}</span>
                                </div>
                                <p class="mb-30">{{ $service->detail_page_description }}</p>
                                <ul class="list-unstyled list mb-30">
                                    @foreach (explode(',', $service->detail_page_features) as $feature)
                                        <li>
                                            <div class="list-icon"> <span class="ti-check"></span> </div>
                                            <div class="list-text">
                                                <p>{{ $feature }}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <div class="item">
                                <img src="{{ asset('uploads/services/' . $service->image) }}" alt="about"
                                    class="img-fluid">
                            </div>
                        </div>
                    @endforeach
                </div>


                <div class="d-flex text-center" style="width:100%; justify-content:center; padding:20px 0px">
                    <h4 class="section-title">Why Choose <span>Us</span></h4>
                </div>


                <div class="col-md-6 order_2">
                    <div class="section-subtitle"></div>
                    <h4 class="section-title">Competitive <span>Rates:</span></h4>
                    <p>We offer competitive rates without compromising on the quality of service, making transportation
                        accessible for all budgets.
                    </p>
                </div>
                <div class="col-md-6 order_2">
                    <div class="item">
                        <img src="{{ asset('frontend-assets/img/about/low_rate.jpg') }}" alt="about"
                            style="max-height:  300px !important;" class="img-fluid offer_img">
                    </div>
                </div>
                <div class="col-md-6 padding-top  order_1">
                    <div class="item">
                        <img src="{{ asset('frontend-assets/img/about/staff.jpg') }}" alt="about"
                            style="max-height:  300px !important;" class="img-fluid offer_img">
                    </div>
                </div>

                <div class="col-md-6 padding-top order_2">
                    <div class="section-subtitle"></div>
                    <h4 class="section-title">Highly Professional <span>Staff:</span></h4>
                    <p> Our team of experienced drivers undergo rigorous training and background checks to ensure
                        professionalism, courtesy, and safety at all times.
                    </p>
                </div>
                <div class="col-md-6 padding-top order_1">
                    <div class="section-subtitle"></div>
                    <h4 class="section-title">24/7 <span>Availability:</span></h4>
                    <p>Our services are available 24/7, ensuring they are delivered whenever you need them. For any
                        inquiries, you can contact us via phone during our business hours, which vary according to our
                        opening times. Outside of these hours, feel free to send us an email or message for assistance.
                    </p>
                </div>
                <div class="col-md-6 padding-top  order_2">
                    <div class="item">
                        <img src="{{ asset('frontend-assets/img/about/247.jpeg') }}" alt="about"
                            style="max-height:  300px !important;" class="img-fluid offer_img">
                    </div>
                </div>
                <div class="col-md-6 padding-top order_1">
                    <div class="item">
                        <img src="{{ asset('frontend-assets/img/about/booking.jpg') }}" alt="about"
                            style="max-height:  300px !important;" class="img-fluid offer_img">
                    </div>
                </div>
                <div class="col-md-6 padding-top order_2">
                    <div class="section-subtitle"></div>
                    <h4 class="section-title">Easy Booking <span> Process:</span></h4>
                    <p>With our user-friendly booking platform, you can reserve your ride in advance with just a few clicks,
                        eliminating the hassle of last-minute arrangements.
                    </p>
                    <p>Experience the ultimate convenience and comfort in transportation with our pre-booking cab service.
                        Book your ride today and let us take you wherever you need to go in style and confidence.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <style>
        .first-footer {
            padding: 0px !important;
        }

        @media (max-width: 767px) {

            .section-title {
                font-size: 19px;
            }
        }
    </style>
@endsection
