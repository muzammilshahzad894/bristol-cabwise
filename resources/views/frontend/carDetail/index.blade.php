@extends('layouts.frontend.app')

@section('content')
    <section class="banner-header section-padding bg-img" data-overlay-dark="6"
        data-background="{{ asset('frontend-assets/img/slider/11.jpg') }}">
        <div class="v-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h6>What We Do</h6>
                        <h1>Our <span>Services</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-30">
                    <div class="content">
                        <div class="section-subtitle">Rentax</div>
                        <div class="section-title">We Are More Than <span>A Car Booking Company</span></div>
                        <p class="mb-30">Car repair quisque sodales dui ut varius vestibulum drana tortor turpis porttiton
                            tellus eu euismod nisl massa nutodio in the miss volume place urna lacinia eros nunta urna
                            mauris vehicula rutrum in the miss on volume interdum.</p>
                        <ul class="list-unstyled list mb-30">
                            <li>
                                <div class="list-icon"> <span class="ti-check"></span> </div>
                                <div class="list-text">
                                    <p>Sports and Luxury Cars</p>
                                </div>
                            </li>
                            <li>
                                <div class="list-icon"> <span class="ti-check"></span> </div>
                                <div class="list-text">
                                    <p>Economy Cars</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-12">
                    <div class="item"> <img src="{{ asset('frontend-assets/img/slider/11.jpg') }}" alt="about"
                            class="img-fluid">

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials ">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-30">
                    <div class="section-subtitle"></div>
                    <h1 class="section-title">Our <span>Services</span></h1>

                </div>
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme">
                        <div class="item" style="padding:10px;">
                            <div class="cars_details_view">
                                <div>
                                    <img src="{{ asset('frontend-assets/img/slider/5.jpg') }}" alt="" />
                                    <h4 class="text-white mb-0 pt-2">BMW 3-Series</h4>
                                    <p style="color: #f5b754">Moderline</p>
                                    <p style="color: white ;" class="truncate">
                                        Quisque pretium fermentum quam, sit amet cursus ante sollicitudin vel. Morbi
                                        consequat risus consequat, porttitor orci sit amet, iaculis nisl. Integer quis
                                        sapien nec elit ultrices euismon sit amet id lacus. Sed a imperdiet erat. </p>
                                    <div class="">
                                        <a class="view_details" href="{{ route('frontend.carDetails') }}">View Details</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="item" style="padding:10px;">
                            <div class="cars_details_view">
                                <div>
                                    <img src="{{ asset('frontend-assets/img/slider/11.jpg') }}" alt="" />
                                    <h4 class="text-white mb-0 pt-2">BMW 3-Series</h4>
                                    <p style="color: #f5b754">Moderline</p>
                                    <p style="color: white ;" class="truncate">
                                        Quisque pretium fermentum quam, sit amet cursus ante sollicitudin vel. Morbi
                                        consequat risus consequat, porttitor orci sit amet, iaculis nisl. Integer quis
                                        sapien nec elit ultrices euismon sit amet id lacus. Sed a imperdiet erat. </p>
                                    <div class="">
                                        <a class="view_details" href="{{ route('frontend.carDetails') }}">View Details</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="item" style="padding:10px;">
                            <div class="cars_details_view">
                                <div>
                                    <img src="{{ asset('frontend-assets/img/slider/9.jpg') }}" alt="" />
                                    <h4 class="text-white mb-0 pt-2">BMW 3-Series</h4>
                                    <p style="color: #f5b754">Moderline</p>
                                    <p style="color: white" class="truncate">
                                        Quisque pretium fermentum quam, sit amet cursus ante sollicitudin vel. Morbi
                                        consequat risus consequat, porttitor orci sit amet, iaculis nisl. Integer quis
                                        sapien nec elit ultrices euismon sit amet id lacus. Sed a imperdiet erat. </p>
                                    <div class="">
                                        <a class="view_details" href="{{ route('frontend.carDetails') }}">View Details</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <style>
        .img-fluid {
            width: 100%;
            height: 390px !important;
        }

        .new_forms {
            max-width: 400px;
            background-color: rgb(255 255 255 / 20%);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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

        .cutom_button:hover {
            background-color: #f5b754;
        }

        .header {
            height: 700px !important;
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

        .cars_details_view {
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
            padding: 10px;
            border-radius: 10px;
            background: #222222;
            margin-top: 20px;
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

        @media (max-width: 768px) {
            .header {
                height: 1000px !important;
            }

            .video-fullscreen-wrap {
                height: 1000px !important;
                overflow: hidden;
            }

            .v-middle {
                margin-top: 130px !important;
            }

            .video-fullscreen-video {
                height: 1020px !important;
            }
        }
    </style>
@endsection
