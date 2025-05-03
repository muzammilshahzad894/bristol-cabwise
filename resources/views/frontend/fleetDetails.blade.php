@extends('layouts.frontend.app')

@section('content')
    <section class="banner-header section-padding bg-img" data-overlay-dark="6"
        data-background="{{ asset('uploads/fleets/' . $fleet->image) }}">
        <div class="v-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <!--<h6>Our Fleet</h6>-->
                        {{-- <h1>Our <span>Services</span></h1> --}}
                        <h1>{{ $fleet->name }}</h1>
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
                        <div class="section-subtitle">{{ $fleet->name }}</div>
                        <div class="section-title">
                            {{ $fleet->about_car }} <span></span>
                        </div>
                        <p class="mb-30">{{ $fleet->detail_page_description }}</p>
                        @if($fleet->features)
                            <ul class="list-unstyled list mt-30">
                                @foreach(explode(',', $fleet->features) as $feature)
                                    <li>
                                        <div class="list-icon"> <span class="ti-check"></span> </div>
                                        <div class="list-text">
                                            <p>{{ $feature }}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="row ml-20">
                            <div class="col-md-12">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex gap-2 align-items-center" >
                                        <div class="icon"><i class="fas fa-users"></i></div>
                                        <div class="d-flex align-items-center gap-2">
                                            <p>Max Passengers:</p>
                                            <h6>({{ $fleet->max_passengers }})</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex gap-2 align-items-center">
                                        <div class="icon"><i class="fas fa-suitcase"></i></div>
                                        <div class="d-flex align-items-center gap-2">
                                            <p>Max Suitcases:</p>
                                            <h6>({{ $fleet->max_suitecases }})</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex gap-2 align-items-center">
                                        <div class="icon"><i class="fas fa-briefcase"></i></div>
                                        <div class="d-flex align-items-center gap-2">
                                            <p>Max Hand Luggage:</p>
                                            <h6>({{ $fleet->max_hand_luggage }})</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-12">
                    <div class="item">
                        <img src="{{ asset('uploads/fleets/'.$fleet->image) }}" alt="about" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        
        .d-flex h6{
            margin: 0px !important;
        }
        .fa-users:before {
            content: "\f0c0";
            color: orange;
            border: 1px solid white;
            padding: 5px;
            border-radius: 50%;
        }
        .fa-suitcase:before{
            content: "\f0f2";
            color: orange;
            border: 1px solid white;
            padding: 5px;
            border-radius: 50%;
        }
        .fa-briefcase:before{
            content: "\f0b1";
            color: orange;
            border: 1px solid white;
            padding: 5px;
            border-radius: 50%;
        }
        .d-flex p{
            color: white;
            margin-bottom: 0 !important;
        }
        .d-flex h6{
            color: orange;
        }
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

        .section-padding {
            padding: 70px 0px 0px 0px;
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

        .owl-carousel .owl-item img {
            height: 200px !important;
        }

        @media (max-width: 768px) {
            .header {
                height: 1000px !important;
            }
            .row{
                flex-direction: column-reverse;
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
