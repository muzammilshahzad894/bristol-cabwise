@extends('layouts.frontend.app')

@section('content')

    <style>
        .new_forms {
            max-width: 400px;
            background-color: rgb(255 255 255 / 20%);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .item .text{
            min-height: 220px;
        }
        .modal-body {
            padding: 20px;
        }

        .modal-header {
            background: orange;
            color: white;
        }

        .modal-body {
            background: black;
        }

        #countdown {
            margin-bottom: 20px;
        }

        .coupon-code {
            margin-bottom: 20px;
        }

        .coupon-heading {
            font-size: 18px;
            color: white;
            margin-bottom: 10px;
        }

        .coupon {
            font-size: 36px;
            color: #f00;
            /* Red color for emphasis */
        }

        .modal-footer {
            /* justify-content: center; */
            display: none;
            padding: 20px;
        }


        .cutom_button {
            width: 100%;
        }

        label {
            display: block;
            color: white;
            font-family: emoji;
            font-size: 21px;
            /* margin-bottom: 5px; */
            margin-top: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: white;
        }

        .cutom_button {
            background-color: #f5b754;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 40px !important;
            margin-left: 10px;
        }

        #countdown h4 {
            color: white !important;
        }

        .cutom_button:hover {
            background-color: #f5b754;
        }

        .header {
            height: 700px !important;
        }

        .modal {
            background: rgb(0 0 0 / 75%);
        }

        .view_details {
            color: white;
            background: #ff8120;
            border: none;
            padding: 5px 10px;
            border-radius: 10px;
            width: 100%;
            text-align: center;
            cursor: pointer;
        }

        .view_details:hover {
            background: #ff8120;
            color: wheat;
            cursor: pointer;
        }

        .section-padding {
            padding: 70px 0px 0px 0px;
        }

        .cars_details_view {
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
            padding: 10px;
            border-radius: 10px;
            background: #222222;
            margin-top: 20px;
        }

        .cars_details_view div img {
            height: 200px;
        }


        .special_rate {
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0);
            padding: 25px;
            border-radius: 10px;
            background: #222222;
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            text-align: center;
        }

        .special_rate h4 {
            color: white;
        }

        .icon_bg i {
            background: #ff8120;
            margin: 5px;
            border-radius: 10px;
            font-size: 25px;
            color: white;
            height: 50px;
            width: 50px;
            padding-top: 10px;
        }

        .truncate {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            /* Number of lines to show */
            -webkit-box-orient: vertical;
            text-overflow: ellipsis;
        }

        .right_border {
            border-right: 1px solid rgb(237, 235, 235);
            height: 40px;
            padding-right: 30px;
        }

        .video-fullscreen-wrap video {
            object-fit: cover !important;
        }

        .home_p {
            font-size: 17px !important;
        }

        @media (max-width: 768px) {
            .header {
                height: 100% !important;
            }

            .video-fullscreen-video {
                height: 700px !important;
            }

            .home_heading {
                font-size: 47px !important;
            }

            .cars_details_view div img {
                height: 300px;
                object-fit: cover;
            }

            .button-2 {
                padding: 10px 32px !important;
            }

            .button-1 {
                padding: 10px 32px !important;
            }

            .lets-talk[data-overlay-dark] h5,
            .lets-talk h5 {
                font-size: 32px !important;
            }

            .video-fullscreen-wrap {
                height: 100% !important;
                overflow: hidden;
            }

            .section-padding {
                padding: 40px 0 !important;
            }

            .section-title {
                font-size: 30px !important;
            }

            .v-middle {
                margin-top: 70px !important;
            }

            .video-fullscreen-video {
                height: 100%;
            }
        }

        [data-overlay-dark]::before {
            background: url('/frontend-assets/img/homevideo.mp4') no-repeat center center !important;
        }

        .fleet-item {
            position: relative;
            overflow: hidden;
        }

        .fleet-item .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Black with 50% opacity */
            z-index: 1;
        }

        .fleet-item .title {
            position: absolute;
            bottom: 20px;
            left: 20px;
            z-index: 2;
        }

    </style>
    <header class="header">
        <div class="video-fullscreen-wrap">
            <!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->
            <div class="video-fullscreen-video" data-overlay-dark="2" style="height: 800px;">

                <video preload="auto" autoplay muted playsinline loop alt="Senior Adult, People, Lifestyles, Lu"
                    poster="{{ asset('frontend-assets/img/home-video.jpg') }}" style="width: 100%; height: 100%;">
                    <source src="{{ asset('frontend-assets/img/homevideo.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

            </div>
            <div class="v-middle" style="margin-top: 90px;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center " style="">
                            <h6>Welcome To</h6>
                            <h1 style="font-size: 60px;" class="home_heading">Bristol Cabwise </h1>
                            <p class="home_p" style="max-width: 600px; margin: 0 auto; color:#ffc107;">
                                Your premier pre-booking platform for reliable taxi services in Bristol, UK. Enjoy seamless
                                travel from airport transfers to city tours. Book now for stress-free journeys!
                            </p>
                            <a href="{{ route('frontend.getquote') }}" class="button-1 mt-15 mb-15 mr-15">Get A Quote</a>


                            <a href="{{ route('frontend.book-online') }}" class="button-2 mt-15 mb-15">Book Online</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    {{-- Additional Section  --}}

    <section class="about section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-30">
                    <div class="content">
                        <div class="section-subtitle">Trusted &</div>
                        <div class="section-title">RELIABLE CAB <span>SERVICE IN BRISTOL</span> <br> AND ACROSS UK</div>
                        <p class="mb-30">Introducing Bristol Cabwise, your one-stop solution for reliable taxi services.
                            From airport transfers to city tours, corporate rides to in-city journeys, Bristol Cabwise
                            offers seamless pre-booking options at competitive rates. Experience convenience and comfort
                            with our trusted transportation services. Book your ride with Bristol Cabwise today for a
                            stress-free travel experience.</p>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-12">
                    <div class="item"> <img style="max-height:350px;"
                            src="{{ asset('frontend-assets/img/slider/chaufer.jpg') }}" alt="about" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials section-padding mt-15">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-30">
                    <div class="section-subtitle"></div>
                    <h1 class="section-title">Our <span>Services</span></h1>
                </div>
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme">
                        @if ($services->count() > 0)
                            @foreach ($services as $service)
                                <div class="item" style="padding:10px;">
                                    <div class="cars_details_view">
                                        <div>
                                            <img src="{{ asset('uploads/services/' . $service->image) }}" alt="" />
                                            <h4 class="text-white mb-0 pt-2" style="font-size:24px;">{{ $service->name }}
                                            </h4>
                                            <p style="color: #f5b754">{{ $service->tag }}</p>
                                            <p style="color: white;" class="truncate">
                                                {{ $service->short_description }}
                                            </p>
                                            <div class="d-flex justify-content-between gap-4">
                                                <a class="view_details"
                                                    href="{{ route('frontend.carDetails', $service->id) }}">View Details</a>
                                                <a class="view_details"
                                                    href="{{ route('frontend.book-online', ['id' => $service->id, 'name' => str_replace(' ', '-', $service->name)]) }}">Book
                                                    Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Car Category -->
    <section class="car-types1 section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-30">
                    <div class="section-title">Our <span>Fleets</span></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme">
                        @if ($fleets->count() > 0)
                            @foreach ($fleets as $fleet)
                                <div class="item position-relative fleet-item">
                                    <img src="{{ asset('uploads/fleets/' . $fleet->image) }}" class="img-fluid" alt="">
                                    <div class="overlay"></div>
                                    <div class="title text-white">
                                        <h4 class="primary-white">{{ $fleet->name }}</h4>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- divider line -->
    <!-- Process -->
    <section class="process section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center mb-30">
                    <div class="section-title white">Booking <span>Process</span></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-30">
                    <div class="item">
                        <div class="text">
                            <h5>Book Online or Get a Quote</h5>
                            <p>Make your booking online or request a quote through our user-friendly website, ensuring safe
                                payments, data protection, and customer safety.</p>
                        </div>
                        <div class="numb">
                            <div class="numb-curv">
                                <div class="number">01.</div>
                                <div class="shap-left-top">
                                    <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="w-11 h-11">
                                        <path
                                            d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                            fill="#1b1b1b"></path>
                                    </svg>
                                </div>
                                <div class="shap-right-bottom">
                                    <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="w-11 h-11">
                                        <path
                                            d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                            fill="#1b1b1b"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-30">
                    <div class="item">
                        <div class="text">
                            <h5>Choose Your Vehicle</h5>
                            <p>Explore Bristol Cabwise's diverse fleet and service options for a seamless and enjoyable
                                ride.</p>
                        </div>
                        <div class="numb">
                            <div class="numb-curv">
                                <div class="number">02.</div>
                                <div class="shap-left-top">
                                    <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="w-11 h-11">
                                        <path
                                            d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                            fill="#1b1b1b"></path>
                                    </svg>
                                </div>
                                <div class="shap-right-bottom">
                                    <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="w-11 h-11">
                                        <path
                                            d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                            fill="#1b1b1b"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-30">
                    <div class="item">
                        <div class="text">
                            <h5>Enjoy Your Ride</h5>
                            <p>Experience each journey with Bristol Cabwise, where our skilled drivers guarantee a smooth
                                and secure ride.</p>
                        </div>
                        <div class="numb">
                            <div class="numb-curv">
                                <div class="number">03.</div>
                                <div class="shap-left-top">
                                    <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="w-11 h-11">
                                        <path
                                            d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                            fill="#1b1b1b"></path>
                                    </svg>
                                </div>
                                <div class="shap-right-bottom">
                                    <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="w-11 h-11">
                                        <path
                                            d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                            fill="#1b1b1b"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- second addtional section  --}}

    <section class="process d-none">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="special_rate">
                        <div class="icon_bg">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <h4>Phone reservation</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="special_rate">
                        <div class="icon_bg">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <h4>Speical Rates</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="special_rate">
                        <div class="icon_bg">
                            <i class="fas fa-road"></i>
                        </div>
                        <h4>On Way booking</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="special_rate">
                        <div class="icon_bg">
                            <i class="fas fa-umbrella"></i>
                        </div>
                        <h4>Life Insurance</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="special_rate">
                        <div class="icon_bg">
                            <i class="fas fa-car"></i>
                        </div>
                        <h4>Free Rides</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials section-padding mt-15">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-30">
                    <div class="section-subtitle">Testimonials</div>
                    <div class="section-title">What Clients Say</div>
                </div>
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="stars"> <span class="rate">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                                <div class="shap-left-top">
                                    <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="w-11 h-11">
                                        <path
                                            d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                            fill="#1b1b1b"></path>
                                    </svg>
                                </div>
                                <div class="shap-right-bottom">
                                    <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="w-11 h-11">
                                        <path
                                            d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                            fill="#1b1b1b"></path>
                                    </svg>
                                </div>
                            </div> <i class="fa-solid fa-quote-left"></i>
                            <div class="text">
                                <p>Ali arrived at the airport early to be guaranteed sure that he was there for us. Great communication, very clean and sleek car (with sweets), very friendly. Safe driving and efficient, any helpful. A young company that puts customer service as a priority: what a gift after a long flight! Will use again.</p>
                            </div>
                            <div class="info mt-30">
                                <div class="img-curv">
                                    <div class="img"> <img src="{{ asset('frontend-assets/img/team/trustvoilet.jpeg') }}"
                                            alt=""> </div>
                                    <div class="shap-left-top">
                                        <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                            class="w-11 h-11">
                                            <path
                                                d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                                fill="#1b1b1b"></path>
                                        </svg>
                                    </div>
                                    <div class="shap-right-bottom">
                                        <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                            class="w-11 h-11">
                                            <path
                                                d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                                fill="#1b1b1b"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-30">
                                    <h6>Review by C R</h6>
                                    <p>25 October 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="stars"> <span class="rate">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                                <div class="shap-left-top">
                                    <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="w-11 h-11">
                                        <path
                                            d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                            fill="#1b1b1b"></path>
                                    </svg>
                                </div>
                                <div class="shap-right-bottom">
                                    <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="w-11 h-11">
                                        <path
                                            d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                            fill="#1b1b1b"></path>
                                    </svg>
                                </div>
                            </div> <i class="fa-solid fa-quote-left"></i>
                            <div class="text">
                                <p>Fast, reliable and very friendly service. I’ve used this company on numerous occasions, they have always been on time, with great communication. Would definitely recommend!</p>
                            </div>
                            <div class="info mt-30">
                                <div class="img-curv">
                                    {{-- <div class="img"> <img src="img/team/4.jpg" alt=""> </div> --}}
                                    <div class="img"> <img src="{{ asset('frontend-assets/img/team/trustvoilet.jpeg') }}"
                                            alt=""> </div>
                                    <div class="shap-left-top">
                                        <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                            class="w-11 h-11">
                                            <path
                                                d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                                fill="#1b1b1b"></path>
                                        </svg>
                                    </div>
                                    <div class="shap-right-bottom">
                                        <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                            class="w-11 h-11">
                                            <path
                                                d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                                fill="#1b1b1b"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-30">
                                    <h6>Review by Becky Hawker</h6>
                                    <p>02 October 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="stars"> <span class="rate">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                                <div class="shap-left-top">
                                    <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="w-11 h-11">
                                        <path
                                            d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                            fill="#1b1b1b"></path>
                                    </svg>
                                </div>
                                <div class="shap-right-bottom">
                                    <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="w-11 h-11">
                                        <path
                                            d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                            fill="#1b1b1b"></path>
                                    </svg>
                                </div>
                            </div> <i class="fa-solid fa-quote-left"></i>
                            <div class="text">
                                <p>A return journey from the airport. Cabwise were on time and in a convenient meeting place. The driver kept me informed of where he was, which meant I could be on my way home quickly.
                                </p>
                            </div>
                            <div class="info mt-30">
                                <div class="img-curv">
                                    <div class="img"> <img src="{{ asset('frontend-assets/img/team/trustvoilet.jpeg') }}"
                                            alt=""> </div>
                                    <div class="shap-left-top">
                                        <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                            class="w-11 h-11">
                                            <path
                                                d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                                fill="#1b1b1b"></path>
                                        </svg>
                                    </div>
                                    <div class="shap-right-bottom">
                                        <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                            class="w-11 h-11">
                                            <path
                                                d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                                fill="#1b1b1b"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-30">
                                    <h6>Review by Richard Jarvis</h6>
                                    <p>08 November 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="stars"> <span class="rate">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                                <div class="shap-left-top">
                                    <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="w-11 h-11">
                                        <path
                                            d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                            fill="#1b1b1b"></path>
                                    </svg>
                                </div>
                                <div class="shap-right-bottom">
                                    <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="w-11 h-11">
                                        <path
                                            d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                            fill="#1b1b1b"></path>
                                    </svg>
                                </div>
                            </div> <i class="fa-solid fa-quote-left"></i>
                            <div class="text">
                                <p>Punctual, professional, and very welcoming! Have used multiple times and won’t use anyone else now.
                                </p>
                            </div>
                            <div class="info mt-30">
                                <div class="img-curv">
                                    <div class="img"> <img src="{{ asset('frontend-assets/img/team/trustvoilet.jpeg') }}"
                                            alt=""> </div>
                                    <div class="shap-left-top">
                                        <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                            class="w-11 h-11">
                                            <path
                                                d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                                fill="#1b1b1b"></path>
                                        </svg>
                                    </div>
                                    <div class="shap-right-bottom">
                                        <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                            class="w-11 h-11">
                                            <path
                                                d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                                fill="#1b1b1b"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-30">
                                    <h6>Review by Jamie Cahill</h6>
                                    <p>01 March 2025</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="stars"> <span class="rate">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                                <div class="shap-left-top">
                                    <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="w-11 h-11">
                                        <path
                                            d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                            fill="#1b1b1b"></path>
                                    </svg>
                                </div>
                                <div class="shap-right-bottom">
                                    <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="w-11 h-11">
                                        <path
                                            d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                            fill="#1b1b1b"></path>
                                    </svg>
                                </div>
                            </div> <i class="fa-solid fa-quote-left"></i>
                            <div class="text">
                                <p>I had an excellent experience with Bristol Cabwise’s executive fleet. Booking was quick and hassle-free. On the day, a Mercedes E-Class arrived on time, offering a comfortable ride. Special thanks to the driver, Ali, for his professionalism and friendly service. Highly recommend!
                                </p>
                            </div>
                            <div class="info mt-30">
                                <div class="img-curv">
                                    <div class="img"> <img src="{{ asset('frontend-assets/img/team/yell.jpeg') }}"
                                            alt=""> </div>
                                    <div class="shap-left-top">
                                        <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                            class="w-11 h-11">
                                            <path
                                                d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                                fill="#1b1b1b"></path>
                                        </svg>
                                    </div>
                                    <div class="shap-right-bottom">
                                        <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                            class="w-11 h-11">
                                            <path
                                                d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                                fill="#1b1b1b"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-30">
                                    <h6>Review by MisbahS-6</h6>
                                    <p>03 October 2024</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="stars"> <span class="rate">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                                <div class="shap-left-top">
                                    <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="w-11 h-11">
                                        <path
                                            d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                            fill="#1b1b1b"></path>
                                    </svg>
                                </div>
                                <div class="shap-right-bottom">
                                    <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="w-11 h-11">
                                        <path
                                            d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                            fill="#1b1b1b"></path>
                                    </svg>
                                </div>
                            </div> <i class="fa-solid fa-quote-left"></i>
                            <div class="text">
                                <p>My experience was smooth and surpassed my expectations. The driver was professional and polite throughout the journey, ensuring we arrived at Heathrow with plenty of time to spare. If you’re looking for dependable, punctual, and comfortable transportation, I highly recommend Bristol Cabwise.
                                </p>
                            </div>
                            <div class="info mt-30">
                                <div class="img-curv">
                                    <div class="img"> <img src="{{ asset('frontend-assets/img/team/google.jpeg') }}"
                                            alt=""> </div>
                                    <div class="shap-left-top">
                                        <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                            class="w-11 h-11">
                                            <path
                                                d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                                fill="#1b1b1b"></path>
                                        </svg>
                                    </div>
                                    <div class="shap-right-bottom">
                                        <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                            class="w-11 h-11">
                                            <path
                                                d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                                fill="#1b1b1b"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-30">
                                    <h6>Review by Sarah</h6>
                                    <p> 25 March 2025</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- divider line -->

    <!-- Lets Talk -->
    <section class="lets-talk bg-img bg-fixed section-padding" data-overlay-dark="5"
        data-background="{{ asset('frontend-assets/img/slider/25.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h6>Book Your Ride</h6>
                    <h5>Interested in booking?</h5>
                    <p>Don’t hesitate to call or send us a message instead.</p> <a href="https://wa.me/447533225970"
                        target="_blank" class="button-1 mt-15 mb-15 mr-10"><i class="fa-brands fa-whatsapp text-white"></i>
                        WhatsApp</a> <a href="{{ route('frontend.contact') }}" class="button-2 mt-15 mb-15">Contact Us
                        <span class="ti-arrow-top-right"></span></a>
                </div>
            </div>
        </div>
    </section>

    @if ($coupon)
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Get {{ $coupon->discount }}% Off Now!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <div id="countdown">
                            <h4>{{ $coupon->description }}</h4>
                        </div>
                        <div class="coupon-code">
                            <h2 class="coupon-heading">Your Coupon Code:</h2>
                            <h1 class="coupon" id="couponCode">{{ $coupon->code }}</h1>
                            <button class="view_details" onclick="copyToClipboard()">Copy copoun</button>
                        </div>
                        <div id="copyAlert" class="alert alert-success mt-3" style="display: none;">Coupon code copied to
                            clipboard!</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const video = document.querySelector('video');
            video.play().catch(() => {
                video.muted = true;
                video.play();
            });
        });

        // window.addEventListener('DOMContentLoaded', (event) => {
        //     // Get the video element
        //     const video = document.getElementById('fullscreen-video');

        //     // Play the video
        //     video.play().then(() => {
        //         // Autoplay started successfully
        //         console.log('Video autoplay started successfully');
        //     }).catch((error) => {
        //         // Autoplay failed
        //         console.error('Video autoplay failed:', error);
        //     });
        // });

        document.addEventListener('DOMContentLoaded', function() {
            // Check if the modal has been closed before
            // if (!localStorage.getItem('modalClosed')) {
            var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
            myModal.show();
            // }
        });

        var myModalEl = document.getElementById('exampleModal');
        myModalEl.addEventListener('hidden.bs.modal', function() {
            // Set the modalClosed item in localStorage when the modal is closed
            localStorage.setItem('modalClosed', 'true');
        });

        // Function to copy coupon code to clipboard
        function copyToClipboard() {
            var couponCode = document.getElementById('couponCode').innerText;
            navigator.clipboard.writeText(couponCode).then(function() {
                var copyAlert = document.getElementById('copyAlert');
                copyAlert.style.display = 'block';
                setTimeout(function() {
                    copyAlert.style.display = 'none';
                }, 2000);
            }, function(err) {
                console.error('Could not copy text: ', err);
            });
        }

        function copyToClipboard() {
            var couponCode = document.getElementById('couponCode').innerText;
            navigator.clipboard.writeText(couponCode).then(function() {
                // Show copy success alert
                var copyAlert = document.getElementById('copyAlert');
                copyAlert.style.display = 'block';
                setTimeout(function() {
                    copyAlert.style.display = 'none';
                }, 2000); // Hide the alert after 2 seconds
            }, function(err) {
                console.error('Failed to copy: ', err);
            });
        }
    </script>
@endsection
