@extends('layouts.frontend.app')
<style>
    .section-padding {
        padding: 70px 0px 0px 0px;
    }

    .banner-header {
        min-height: 520px;
    }
    .offer_img{
        max-height: 300px;
        max-width: 450px !important;
    }
    .padding-top{
        margin-top: 4.5rem !important;
    }

    @media (max-width: 767px) {
        .mobile_screen {
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
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
                        <h1 style="font-size: 60px;" class="home_heading">About Us </h1>
                        <p class="home_p" style="max-width: 600px; margin: 0 auto; color:#ffc107;">
                            Your premier pre-booking platform for reliable taxi services in Bristol, UK. Enjoy seamless
                            travel from airport transfers to city tours. Book now for stress-free journeys!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-us section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-subtitle"></div>
                    <h4 class="section-title">Pre-Booking Cab Service in Bristol and <span>Across the United Kingdom</span>
                    </h4>
                    <p>
                        Welcome to our premier pre-booking cab service, serving Bristol and cities across the United
                        Kingdom. We offer a range of transportation solutions tailored to your needs, ensuring comfort,
                        convenience, and reliability at affordable rates.
                    </p>
                </div>
                <div class="d-flex text-center" style="width:100%; justify-content:center; padding:20px 0px">

                    <h4 class="section-title" style="font-family: cursive;">Services <span>Offered</span></h4>
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
                    <h4 class="section-title"  style="font-family: cursive;">Why Choose <span>Us</span></h4>
                </div>


                <div class="col-md-6">
                    <div class="section-subtitle"></div>

                    <h4 class="section-title">Competitive <span>Rates:</span></h4>
                    <p>We offer competitive rates without compromising on the quality of service, making transportation
                        accessible for all budgets.
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="item">
                        <img src="{{ asset('frontend-assets/img/about/low_rate.jpg') }}" alt="about" class="img-fluid offer_img">
                    </div>
                </div>
                <div class="col-md-6 padding-top">
                    <div class="item">
                        <img src="{{ asset('frontend-assets/img/about/staff.jpg') }}" alt="about" class="img-fluid offer_img">
                    </div>
                </div>

                <div class="col-md-6 padding-top">
                    <div class="section-subtitle"></div>
                    <h4 class="section-title">*Highly Professional <span>Staff:</span></h4>
                    <p> Our team of experienced drivers undergo rigorous training and background checks to ensure
                        professionalism, courtesy, and safety at all times.
                    </p>
                </div>
                <div class="col-md-6 padding-top">
                    <div class="section-subtitle"></div>
                    <h4 class="section-title">24/7 <span>Availability:</span></h4>
                    <p>Our services are available 24/7, ensuring that you can access our support at any time of the day.
                        However, our business contact hours vary according to our opening times. If you need to reach us
                        outside of these hours, please book an appointment online. For any other issues, feel free to email
                        us or send us a message.
                    </p>
                </div>
                <div class="col-md-6 padding-top">
                    <div class="item">
                        <img src="{{ asset('frontend-assets/img/about/247.jpg') }}" alt="about" class="img-fluid offer_img">
                    </div>
                </div>
                <div class="col-md-6 padding-top">
                    <div class="item">
                        <img src="{{ asset('frontend-assets/img/about/booking.png') }}" alt="about" class="img-fluid offer_img">
                    </div>
                </div>
                <div class="col-md-6 padding-top">
                    <div class="section-subtitle"></div>
                    <h4 class="section-title">*Easy Booking<span> Process:</span></h4>
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
                font-size: 30px;
            }
        }
    </style>
@endsection
