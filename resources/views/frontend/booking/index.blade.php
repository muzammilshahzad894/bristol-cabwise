@extends('layouts.frontend.app')

<style>
    .footer-box {
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: white;
        background: #f0901d;
        padding: 5;
        border-bottom-right-radius: 10px;
        border-bottom-left-radius: 10px;

    }
    .discount_btn_div{
        margin: 10px 0;
        display: flex;
        justify-content: end;
    }
    .discount_btn{
        color: white;
        padding: 5px 20px;
        background: #f0901d;
    }

    .coupon_btn {
        padding: 10px;
        font-size: 14px;
        color: white;
        background: #f0901d;
    }

    .modal-body {
        padding: 20px;
        background: #000;
    }

    .modal {
        background: rgb(0 0 0 / 48%);
    }

    .modal-header {
        background-color: orange;

    }

    #countdown h4 {
        color: orange;
        font-family: cursive;
    }

    #countdown {
        margin-bottom: 20px;
    }

    .coupon-code {
        margin-bottom: 20px;
    }

    .coupon-heading {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .coupon {
        font-size: 36px;
        color: #f00;
        /* Red color for emphasis */
    }

    .modal-footer {
        /* justify-content: center; */
        padding: 20px;
    }

    .meet_greet input[type="checkbox"] {
        height: 25px;
        width: 25px;
        margin-top: 6px;
    }

    .meet_greet {
        padding-top: 20px;
    }

    .meet_greet label {
        cursor: pointer;
    }

    .color {
        color: #f8941d;
        display: inline-block;
        border-bottom: 1px solid white;
    }

    .p-6 strong {
        font-weight: bolder;
        font-size: 19px;
        color: #f0901d;
    }

    .footer-box p {
        margin-bottom: 0px !important;
        color: white !important;
    }

    .proceed {
        background-color: black;
        color: white;
        padding: 0px 15px;
        border-radius: 10px;

    }

    .p-6 {
        padding: 10px 10px 0 10px;
        height: 89%;
    }

    .form-container {
        background-color: black;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        /* padding: 20px; */
        margin-bottom: 20px;
        /* Adjust as needed */
        margin-right: 10px;
        max-width: 195px;
    }

    .main-div {
        display: flex;
        flex-wrap: inherit;
    }

    .new_form {
        max-width: 100% !important;
        margin-right: 10px;
        background-color: rgb(255 255 255 / 20%);
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .button-1 {
        padding: 14px 40px !important;
    }

    .button-1:hover {
        background: #f0901d !important;
        color: white !important;
        /* font-size: 19px; */
        font-weight: 600;
    }

    .both_btn {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 20px;
    }

    .previous_btn {
        background: black !important;
        color: white;
        border: none;
        padding: 14px 42px;
        cursor: pointer;
        border-radius: 30px;
        transition: border-color 300ms ease, transform 300ms ease,
            background-color 300ms ease, color 300ms ease;
        transform-style: preserve-3d;
    }

    span#select2-payment_type-container {
        padding: 9px 20px;
    }

    .previous_btn:hover {
        transform: translate3d(0px, -6px, 0.01px);
        /* font-size: 19px; */
        font-weight: 600;
    }

    .new_form label {
        display: block;
        color: white !important;
        font-family: emoji;
        font-size: 21px;
        margin-top: 5px;
        min-width: 140px;
    }

    .new_form.step2.row {
        max-height: 100vh;
        overflow-y: auto;
    }

    /* Styling for webkit browsers */
    .new_form.step2.row::-webkit-scrollbar {
        width: 4px;
        border-radius: 10px;
    }

    .new_form.step2.row::-webkit-scrollbar-thumb {
        background-color: #000000;
        border-radius: 5px;
    }

    .new_form.step2.row::-webkit-scrollbar-track {
        background-color: #333333;
        /* Track background color */
    }

    /* Styling for Firefox */
    .new_form.step2.row {
        scrollbar-width: thin;
        scrollbar-color: #000000 #333333;
        /* Thumb and track colors for Firefox */
    }


    .payment_section_main {
        margin: 10px 0;
        border-top: 1px solid #000;
    }

    .new_form button[type="submit"] {
        background-color: #f5b754;
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 16px;
        margin-left: 10px;
    }

    .new_form button[type="submit"]:hover {
        background-color: #f5b754;
    }

    .post {
        background-color: #f4f4f4;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .heading-border-bottom {
        margin-bottom: 10px;
        /* border-bottom: 1px solid #000; */
    }

    .section-padding {
        padding: 70px 0px 0px 0px;
    }

    .progress-bar_main {
        display: flex;
        justify-content: space-between;
        list-style: none;
        padding: 0;
        margin: 20px 0;
        flex-direction: row;
    }

    .progress-step {
        width: calc(100% / 4);
        text-align: center;
        position: relative;
        color: #ccc;
    }

    .progress-step.active {
        color: #f0901d;
        font-size: 19px;
    }

    .p-6 img {
        height: 160px;
        width: 100%;
    }

    .progress-step.active::after {
        content: "";
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 20px;
        height: 20px;
        background-color: #f0901d;
        border-radius: 50%;
    }

    .payment_section {
        display: flex;
        justify-content: space-between;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        background: rgb(0 0 0 / 77%);
    }

    .car_name {
        color: white;
        font-size: 15px;
        padding: 0%;
        margin: 0%;
    }

    .p-6 {
        background: black;
        border-radius: 10px;
    }

    .col-md-7,
    .col-md-5 {
        flex: 1;
        /* Equal width for both columns */
    }

    .border-botom {
        padding-bottom: 30px;
        border-bottom: 1px solid rgb(27, 27, 27) !important;
    }

    .column_type {
        align-items: center;
        gap: 1.5rem;
    }

    .summary strong {
        color: orange;
        /* Set strong tag color to orange */
        min-width: 100px;
        /* Set minimum width for strong tag */
    }

    .summary p {
        margin-bottom: 0;
        /* Remove bottom margin from p tag */
        color: white;
        /* Set p tag color to white */
    }

    .icon_text i {
        color: white;
        background: orange;
        padding: 5px;
        border-radius: 14px;
    }

    .icon_text {
        display: flex;
        align-items: baseline;
        gap: 10px;
    }

    /* Common styles for both input fields */
    .styled-input {
        background: #222222;
        color: white;
        border: none;
        border-radius: 21px;
        height: 45px;
        padding: 10px;
        box-sizing: border-box;
        width: 100%;
        /* Make sure the input fields take the full width of their container */
    }

    .styled-input::placeholder {
        color: white;
    }

    #error_msg {
        background: red;
        color: white;
        padding: 10px 20px;
        border-radius: 10px;
        border-top-right-radius: 0px;
        display: flex;
        justify-content: space-between;
        align-content: center;
    }

    #error_msg p {
        margin: 0;
        color: white;
        font-size: 17px;
        cursor: pointer;
    }

    /* Common styles for both input fields */
    .styled-input {
        background: #222222;
        color: white;
        border: none;
        border-radius: 21px;
        height: 45px;
        padding: 10px;
        box-sizing: border-box;
        width: 100%;
    }

    /* Common styles for both input fields */
    /* .styled-input {
    background: #222222;
    color: white;
    border: none;
    border-radius: 21px;
    height: 45px;
    padding: 10px;
    box-sizing: border-box;
    width: 100%;
    }

    .styled-input::placeholder {
        color: white;
    }
    .styled-input::-webkit-calendar-picker-indicator {
        filter: invert(1) brightness(2);
        background: none;
    }

    .styled-input::-webkit-inner-spin-button,
    .styled-input::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    .styled-input::-webkit-datetime-edit,
    .styled-input::-webkit-datetime-edit-text,
    .styled-input::-webkit-datetime-edit-month-field,
    .styled-input::-webkit-datetime-edit-day-field,
    .styled-input::-webkit-datetime-edit-year-field,
    .styled-input::-webkit-datetime-edit-hour-field,
    .styled-input::-webkit-datetime-edit-minute-field,
    .styled-input::-webkit-datetime-edit-ampm-field {
        color: white;
        background-color: #222222;
    } */
        /* Styling the time input */
        input[type="time"].timepicker {
            background: #222222;
            color: white;
            border: none;
            border-radius: 21px;
            height: 45px;
            padding: 10px;
            box-sizing: border-box;
        }

        /* Ensuring the placeholder text is also white */
        input[type="time"].timepicker::placeholder {
            color: white;
        }

        .plus_icon {
            color: #f5b754;
            margin-top: -16px;
            background: transparent;
            border: none;
            display: flex;
            width: 100%;
            justify-content: end;
            padding-right: 14px;
        }

        /* Styling the clock icon for webkit browsers (e.g., Chrome, Safari) */
        input[type="time"].timepicker::-webkit-calendar-picker-indicator {
            filter: invert(1);
            background-color: white;
            /* This can be adjusted or removed based on your design preference */
            border-radius: 50%;
            padding: 5px;
            /* Adjust the padding if necessary */
        }

        input[type="datetime-local"].timepicker::-webkit-calendar-picker-indicator {
            filter: invert(1);
            background-color: white;
            /* This can be adjusted or removed based on your design preference */
            border-radius: 50%;
            padding: 5px;
            /* Adjust the padding if necessary */
        }

        /* Removing the default webkit appearance */
        input[type="time"].timepicker::-webkit-inner-spin-button,
        input[type="time"].timepicker::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Styling the date and time picker popup for WebKit browsers */
        .styled-input::-webkit-calendar-picker-indicator {
            /* Apply styles to the picker popup icon */
        }

        /* Custom popup styles (limited by browser capabilities) */
        .styled-input::-webkit-datetime-edit,
        .styled-input::-webkit-datetime-edit-text,
        .styled-input::-webkit-datetime-edit-month-field,
        .styled-input::-webkit-datetime-edit-day-field,
        .styled-input::-webkit-datetime-edit-year-field,
        .styled-input::-webkit-datetime-edit-hour-field,
        .styled-input::-webkit-datetime-edit-minute-field,
        .styled-input::-webkit-datetime-edit-ampm-field {
            /* Apply styles to the popup elements */
        }

        /* Styling the header of the date and time picker popup */
        .styled-input::-webkit-datetime-edit-fields-wrapper {
            background-color: #222222;
            /* Background color of the popup */
        }

        /* Styling the text color inside the date and time picker popup */
        .styled-input::-webkit-datetime-edit,
        .styled-input::-webkit-datetime-edit-text {
            color: white;
            /* Text color inside the popup */
        }

        .date-time-picker {
            position: relative;
        }

        .picker-popup {
            display: none;
            position: absolute;
            top: calc(100% + 10px);
            left: 0;
            background-color: #fff;
            padding: 10px;
            border: 1px solid #ccc;
            z-index: 1000;
        }

        .fleet_id {
            height: 20px;
            width: 20px;
        }

        .date-time-picker.open .picker-popup {
            display: block;
        }

        .close-button {
            position: absolute;
            top: 5px;
            right: 5px;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 20px;
            color: #999;
        }

        .border-radius-0 {
            border-radius: 0 !important;
        }

        /* .selected-fleet {
            border: 2px solid #f0901d;
        } */

        .select2 {
            border-radius: 0 !important;
        }

        .styled-input1 {
            min-width: 70px;
            background: transparent;
            border: 1px solid white;
            margin-top: 5px;
        }

        .unique-dropdown {
            position: relative;
            display: inline-block;
        }

        .unique-dropdown-content {
            display: none;
            position: absolute;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            min-width: 220px;
            background: black;
            border-radius: 10px;
            margin-top: -10px;
        }

        p.unique-dropbtns {
            color: white;
            border: 1px solid #ffc107;
            padding: 10px;
            min-width: 220px;
            cursor: pointer;
            border-radius: 10px;
        }

        .unique-dropdown-content ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .unique-dropdown-content li {
            padding: 12px 16px;
            cursor: pointer;
        }

        .unique-dropdown-content li:hover {
            background-color: #ffa51c;
            color: white;
        }

        .unique-dropdown:hover .unique-dropdown-content {
            display: block;
        }


        #payment-form {
            margin-top: 20px;
        }

        .dropdown_menus {
            color: orange;
            font-size: 20px;
            font-weight: 600;
            padding: 20px 0px 0px 0px;

        }

        /* Responsive adjustments */
        @media screen and (max-width: 768px) {
            .date-time-picker {
                width: 100%;
            }

            .styled-input1 {
                width: 100%;
            }

            .picker-popup {
                width: 100%;
                left: 0;
                top: calc(100% + 5px);
            }

        }

        @media (max-width: 768px) {
            .form-container {
                max-width: 280px !important;
            }

            .column_type {
                flex-direction: column !important;
                align-items: start !important;
                text-align: left !important;
                gap: 0px !important;

            }

            .custom_input {
                height: 42px !important;
            }

            input[type=number] {
                width: 100% !important;
            }

            .color_theme {
                font-size: 23px !important;
            }

            .p-6 {
                height: auto !important;
            }

        }
</style>

@php 
$userRole = auth()->user()->role;



@endphp


@section('content')

    <section class="banner-header section-padding bg-img" data-overlay-dark="4"
        data-background="{{ asset('frontend-assets/img/slider/booking_img.jpeg') }}">
        <input type="hidden" id="login_user" value="{{$userRole}}">
        <div class="v-middle">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 mt-30">
                        <div class="post-wrapper">
                            <a href="index-2.html">
                                <div>Home</div>
                            </a>
                            <div class="divider"></div>
                            <div class="text-white"><a href="#">book online</a></div>
                        </div>
                        <h1>Book Your Ride.</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
 
    <section class="post section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        Quisque pretium fermentum quam, sit amet cursus ante sollicitudin
                        vel. Morbi consequat risus consequat, porttitor orci sit amet,
                        iaculis nisl. Integer quis sapien nec elit ultrices euismon sit
                        amet id lacus. Sed a imperdiet erat. Duis eu est dignissim lacus
                        dictum hendrerit quis vitae mi. Fusce eu nulla ac nisi cursus
                        tincidunt. Interdum et malesuada fames ac ante ipsum primis in
                        faucibus. Integer tristique sem eget leo faucibus porttiton.
                    </p>
                    <p>
                        Nulla vitae metus tincidunt, varius nunc quis, porta nulla.
                        Pellentesque vel dui nec libero auctor pretium id sed arcu. Nunc
                        consequat diam id nisl blandit dignissim. Etiam commodo diam
                        dolor, at scelerisque sem finibus sit amet. Curabitur id lectus
                        eget purus finibus laoreet.
                    </p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row payment_section">
                <ul class="progress-bar_main">
                    <li class="progress-step active" id="step1">Step 1</li>
                    <li class="progress-step" id="step2">Step 2</li>
                    <li class="progress-step" id="step3">Step 3</li>
                    <li class="progress-step" id="step4">Step 4</li>
                </ul>
                <div class="col-md-8">
                    <form action="{{ route('booking.store') }}" method="POST" id="booking-form">
                        @csrf
                        <div class="new_form step1" id="forms">
                            <h2 class="color color_theme">Journey Details</h2>
                            <div class="gap-3">
                                @php
                                    $services = \App\Models\Service::all();

                                    $id = request('id');
                                    $bookingServiceId = isset($booking_detail) ? $booking_detail->service_id : null;

                                @endphp
                                <select name="service" id="service" class="styled-input border-radius-0 mb-0 select select2"
                                    onchange="showFlightId(this);">
                                    <option value="">Select Service</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}"
                                            @if ($service->id == $id || $service->id == $bookingServiceId) selected @endif>
                                            {{ $service->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div id="service-error" class="error-message text-danger"></div>
                                <div id="flight_type" style="display: none">
                                    <label for="flight_type">Select Type:</label>
                                    <select id="carType" class="select2 select" style="width: 100%" name="flight_type"
                                        onchange="toggleFlightIdVisibility()">
                                        <option value="1">Departure</option>
                                        <option value="2">Arrival</option>

                                    </select>
                                </div>


                                <div id="flightId" style="display: none">
                                    <label for="pickupLocation">Flight Name:</label>
                                    <input type="text" name="flightName" placeholder="Enter flight Name"
                                        class="form-control pickupLocation" id="flightName" />
                                    <div id="flightName-error" class="error-message text-danger"></div>
                                    <label for="arrival time ">Arrival Time:</label>
                                    <input type="time" name="flight_time" class="input timepicker styled-input"
                                        placeholder="Arrival Time" id="flight_time" />
                                    <div id="flight_time-error" class="error-message text-danger"></div>
                                </div>
                                <div>
                                    <label for="pickupLocation">Pickup Location:</label>
                                    <input type="text" id="pickupLocation" name="pickupLocation"
                                        placeholder="Enter pickup location"
                                        class="form-control pickupLocation border-radius-0 mb-0"
                                        value={{ $booking_detail->pickup_location ?? '' }}>
                                    <div id="pickup-error" class="error-message text-danger"></div>
                                </div>
                                <div>
                                    <label for="dropLocation">Drop Location:</label>
                                    <div id="dropLocations">
                                        <div class="drop-location">
                                            <input type="text" id="dropLocation" name="dropLocation[]"
                                                placeholder="Enter drop location"
                                                class="form-control pickupLocation border-radius-0 mb-0"
                                                value={{ $booking_detail->dropoff_location ?? '' }}>
                                            <div id="drop-error" class="error-message text-danger"></div>
                                        </div>
                                    </div>
                                    {{-- <input type="text" name="dropLocation"
                                    placeholder="Enter drop location" class="form-control pickupLocation" /> --}}
                                    {{-- <button class="plus_icon mt-1" id="addLocation" onclick="addMore();">Add More location</button> --}}
                                </div>
                                @php
                                    $datetime = isset($booking_detail->booking_date, $booking_detail->booking_time)
                                        ? $booking_detail->booking_date . 'T' . $booking_detail->booking_time
                                        : '';

                                @endphp
                                <div>
                                    <label for="date">Date & Time:</label>
                                    <input type="datetime-local"
                                        class="input location styled-input timepicker border-radius-0 mb-0"
                                        placeholder="Return Date" id="date-time"
                                        value="{{ isset($booking_detail) ? (isset($booking_detail->booking_date) && isset($booking_detail->booking_time) ? $booking_detail->booking_date . 'T' . $booking_detail->booking_time : '') : '' }}" />
                                    <div id="date-time-error" class="error-message text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <div class="new_form step2 row">
                            <div id="error_msg_show" class="error-message" style="display: none">
                                <div id="error_msg" class="error-message">
                                    <p>Please select a fleet</p>
                                    <p onclick="closeAlert();">X</p>
                                </div>
                            </div>
                            <h3 class="color color_theme">Please select Fleet:</h3>
                            <div class="main-div">
                                @if ($fleets->count() > 0)
                                    @foreach ($fleets as $fleet)
                                        <div class="col-md-6 form-container @if ($loop->first) selected-fleet @endif"
                                            data-fleet-id="{{ $fleet->id }}" id="fleets-section"
                                            onclick="selectFleet(this)">
                                            <div class="p-6">
                                                <img src="{{ asset('uploads/fleets/' . $fleet->image) }}" alt="" />
                                                <Strong>{{ $fleet->name }}</Strong>
                                                <!-- <p class="car_name">car name l</p> -->
                                                <div style="display: flex;flex-direction:column;justify-content:center;">
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class="fa fa-users"></i>
                                                        <p style="margin-bottom: 0px">max.</p>
                                                        <span>{{ $fleet->max_passengers }}</span>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class="fa-solid fa-suitcase"></i>
                                                        <p style="margin-bottom: 0;">max.</p>
                                                        <span>{{ $fleet->max_suitecases }}</span>
                                                    </div>
                                                    <div class="d-flex gap-2 align-items-center">
                                                        <i class="fa fa-briefcase"></i>
                                                        <p style="margin-bottom: 0;">max.</p>
                                                        <span>{{ $fleet->max_hand_luggage }}</span>
                                                    </div>

                                                </div>
                                            </div>
                                            @php 
                                                   $fleetPrice = 9 * $fleet->price; // Initialize fleetPrice
                                                    $totalPrice = 0; // Initialize totalPrice
                                                    $taxes = \App\Models\FleetTax::where('fleet_id', $fleet->id)->get();
                                                    

                                                    foreach ($taxes as $tax) {
                                                        $totalPrice += (int)$tax->price; // Sum up the price property of each tax
                                                    }

                                                    $totalPrice += $fleetPrice;
                                            @endphp
                                            <div class="footer-box d-flex align-items-center">
                                                <p class="color">price: <strong> £{{ $totalPrice }} 
                                                    </strong></p>
                                                <div>
                                                    <input type="checkbox" class="fleet_id" name="fleet_id"
                                                        onclick="handleCheckboxClick(this)" value="{{ 9 * $fleet->price }}"
                                                        @if (isset($booking_detail) && $booking_detail->fleet_id == $fleet->id) checked @endif>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="step3 new_form">
                            <div class="heading-border-bottom">
                                <h3 class="color color_theme">Fill all the fields.</h3>
                            </div>
                            <div class="column_type">
                                <label for="name" class="passenger_lebals">Name</label>
                                <input type="text"
                                    class="form-control pickupLocation custom_input border-radius-0 mb-0" name="name"
                                    placeholder="Enter Your Name" id="name" value={{ $booking_detail->name ?? '' }}>
                                <div id="name-error" class="error-message text-danger"></div>
                            </div>
                            <div class="column_type">
                                <label for="telephone" class="passenger_lebals">Telephone</label>
                                <input type="number"
                                    class="form-control pickupLocation custom_input border-radius-0 mb-0" id="telephone"
                                    name="telephone" placeholder="Enter Your Telephone"
                                    value={{ $booking_detail->phone_number ?? '' }}>
                                <div id="telephone-error" class="error-message text-danger"></div>
                            </div>
                            <div class="column_type border-botom">
                                <label for="tele" class="passenger_lebals">Email</label>
                                <input type="email"
                                    class="form-control pickupLocation custom_input border-radius-0 mb-0" id="email"
                                    name="email" placeholder="Enter Your Email"
                                    value={{ $booking_detail->email ?? '' }}>
                                <div id="email-error" class="error-message text-danger"></div>
                            </div>
                            <div class="border-botom">
                                <div class="d-flex  column_type mt-4">
                                    <label for="no_passenger" class="passenger_lebals">No of passenger</label>
                                    <select name="no_passenger" id="no_passenger"
                                        class="styled-input1 border-radius-0 mb-0">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    <div id="passenger-error" class="error-message text-danger"></div>
                                </div>

                                <div class="d-flex  column_type">
                                    <label for="suit_case" class="passenger_lebals">SuitCases</label>
                                    <select name="suit_case" id="suit_case" class="styled-input1 border-radius-0 mb-0">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                                <div class="d-flex  column_type">
                                    <label for="hand_lauggage" class="passenger_lebals">Hand luggage</label>
                                    <select name="hand_lauggage" id="hand_lauggage"
                                        class="styled-input1 border-radius-0 mb-0">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                                <div class="d-flex meet_greet" style="gap:10px;align-items:center"
                                    onclick="showChildSeat()">
                                    <input type="checkbox" id="child_seat" name="child_seat" value=""
                                        class="mb-0" @if (isset($booking_detail) && $booking_detail->is_childseat == 1) checked @endif>
                                    <label for="child_seat" class="passenger_lebals">Child Seat (£6)</label>
                                </div>
                                <div class="d-flex meet_greet" style="gap:10px;align-items:center"
                                    onclick="meetNdGreet();">
                                    <input type="checkbox" id="meet_greet" name="meet_greet" value=""
                                        class="mb-0" @if (isset($booking_detail) && $booking_detail->is_meet_nd_greet == 1) checked @endif>
                                    <label for="meet_greet">Meet & Greet (£12 extra)</label>
                                </div>
                                <div class="d-flex meet_greet" style="gap:10px;align-items:center"
                                    onclick="showSomeoneElse()">
                                    <input type="checkbox" id="booking_for_someone" name="Booking_for_someone"
                                        value="" @if (isset($booking_detail) && $booking_detail->other_name != '') checked @endif>
                                    <label for="Booking_for_someone">
                                        Booking for someone else.
                                    </label>
                                </div>
                            </div>
                            <div class="border-botom" id="someone_else"
                                style="display: {{ isset($booking_detail) && $booking_detail->other_name != '' ? 'block' : 'none' }}">

                                <div class="column_type">
                                    <label for="someone_else_name" class="passenger_lebals">Name</label>
                                    <input type="text"
                                        class="form-control pickupLocation custom_input border-radius-0 mb-0"
                                        name="someone_else_name" placeholder="Enter Name" id="someone_else_name"
                                        value={{ $booking_detail->other_name ?? '' }}>
                                    <div id="someone_else_name_error" class="error-message text-danger"></div>
                                </div>
                                <div class="column_type">
                                    <label for="someone_else_telephone" class="passenger_lebals">Telephone</label>
                                    <input type="number"
                                        class="form-control pickupLocation custom_input border-radius-0 mb-0"
                                        id="someone_else_telephone" name="someone_else_telephone"
                                        placeholder="Enter Telephone"
                                        value={{ $booking_detail->other_phone_number ?? '' }}>
                                    <div id="someone_else_telephone_error" class="error-message text-danger"></div>
                                </div>
                                <div class="column_type">
                                    <label for="someone_else_email" class="passenger_lebals">Email</label>
                                    <input type="email"
                                        class="form-control pickupLocation custom_input border-radius-0 mb-0"
                                        id="someone_else_email" name="someone_else_email" placeholder="Enter Email"
                                        value={{ $booking_detail->other_email ?? '' }}>
                                    <div id="someone_else_email_error" class="error-message text-danger"></div>
                                </div>
                            </div>

                            <div class="mt-2">
                                <label for="comment">Comment (optional):</label>
                                <textarea name="comment" id="summary" class="form-control" rows="3">{{ $booking_detail->summary ?? '' }}</textarea>
                            </div>
                        </div>

                        <div class="step4 new_form">
                            <div class="summary">
                                <div class="heading-border-bottom">
                                    <h3 class="color color_theme">Summary.</h3>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Service Type:</strong>
                                    <p id="summary-service-type">Departure</p>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Pickup Location:</strong>
                                    <p id="summary-pickup-location">London</p>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Drop Location:</strong>
                                    <p id="summary-drop-location">Manchester</p>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Date & Time: </strong>
                                    <p id="summary-date">2022-03-09</p>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Name:</strong>
                                    <p id="summary-name">John Doe</p>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Telephone:</strong>
                                    <p id="summary-telephone">1234567890</p>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Email:</strong>
                                    <p id="summary-email">testing@gmail.com </p>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>No of passenger:</strong>
                                    <p id="summary-passengers">1</p>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Child Seat:</strong>
                                    <p id="summary-child-seat">0</p>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>SuitCases:</strong>
                                    <p id="summary-suitcases">0</p>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Hand luggage:</strong>
                                    <p id="summary-hand-luggage">0</p>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Summary:</strong>
                                    <p id="summary-summary">You need any help!.</p>
                                </div>
                                <h3 class="color color_theme">Other Details:</h3>
                                <div class="d-flex gap-4 mt-2">
                                    <strong>Name:</strong>
                                    <p id="summary-other-name"></p>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Telephone:</strong>
                                    <p id="summary-other-telephone"></p>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Email:</strong>
                                    <p id="summary-other-email"></p>
                                </div>
                                
                                <h3 class="color color_theme">Total Price:</h3>
                                <div class="d-flex gap-4">
                                    <strong>Fleet Price:</strong>
                                    <div>
                                        <p id="summary-fleet-price"></p>
                                    </div>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Child Seat:</strong>
                                    <div>
                                        <p id="summary-child-seat_price"></p>
                                    </div>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Meet & Greet:</strong>
                                    <div>
                                        <p id="summary-meet-greet"></p>
                                    </div>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Coupon Discount:</strong>
                                    <div>
                                        <p id="summary-coupon-discount"></p>
                                    </div>
                                </div>
                             
                                <div class="d-flex gap-4">
                                    <strong>Total Price:</strong>
                                    <div>
                                        <p id="summary-total-price"></p>
                                    </div>
                                </div>
                                @if($userRole != "admin")
                                <div class="gap-4">
                                    <div class="discount_btn_div">
                                        <button class="discount_btn" type="button" id="apply_coupon"
                                        onclick="AddCoupon()">Apply Coupon</button>
                                    </div>
                                    
                                    <div id="coupon_input" class="" style="display: none">
                                        <div class="d-flex gap-1">
                                            <input type="text"
                                                class="form-control pickupLocation custom_input border-radius-0 mb-0"
                                                id="coupon" name="coupon" placeholder="Enter Coupon" />
                                            <button class="coupon_btn" id="apply_coupon" type="button"
                                                onclick="applyCoupon()">submit</button>
                                        </div>
                                    </div>
                                </div>
                                @endif


                            </div>
                            @if($userRole != "admin")   
                            <div class="payment_section_main">
                                <p class="dropdown_menus">Select Payment Type:</p>
                                <div class="unique-dropdown">
                                    <p class="unique-dropbtns">Select Option</p>
                                    <div class="unique-dropdown-content">
                                        <ul>
                                            <li class="unique-payment-option" target="_blank" id="checkout-button"
                                                onclick="bookAndPay('stripe');">Debit Card</li>
                                            <li class="unique-payment-option" target="_blank" id="paypal"
                                                onclick="bookAndPay('paypal');">PayPal</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>


                        <div class="both_btn">
                            <button class="previous_btn button-1 mt-15 mb-15" onclick="prevStep()" type="button">
                                Previous
                            </button>
                            <button type="button" class="button-1 mt-15 mb-15 cutom_button" id="next_btn"
                                onclick="nextStep()">
                                Next
                            </button>
                            @if($userRole == "admin")
                             <button type="button" class="button-1 mt-15 mb-15 cutom_button" id="form_submit" style="display: none" onclick="bookAndPay('admin');">
                                Book Now
                            </button>
                            @endif

                        </div>
                    </form>
                </div>
                <div class="col-md-4" style="border-left: 1px solid #ccc">

                    <h3 class="color color_theme">Location</h3>
                    <div class="google-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1573147.7480448114!2d-74.84628175962355!3d41.04009641088412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25856139b3d33%3A0xb2739f33610a08ee!2s1616%20Broadway%2C%20New%20York%2C%20NY%2010019%2C%20Amerika%20Birle%C5%9Fik%20Devletleri!5e0!3m2!1str!2str!4v1646760525018!5m2!1str!2str"
                            width="100%" height="100%" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <div style="padding: 10px;margin-top:10px">
                        <h5 class="color">All classes include:</h5>
                        <div class="icon_text">
                            <i class="fa-solid fa-check"></i>
                            <p>
                                Free cancellation up to 24 hours before your pick-up
                            </p>
                        </div>
                        <div class="icon_text">
                            <i class="fa-solid fa-check"></i>
                            <p>
                                Free 45 minutes waiting time
                            </p>
                        </div>
                        <div class="icon_text">
                            <i class="fa-solid fa-check"></i>
                            <p>
                                Meet & Greet
                            </p>
                        </div>
                        <div class="icon_text">
                            <i class="fa-solid fa-check"></i>
                            <p>
                                Complimentary water bottle & Wi-Fi
                            </p>
                        </div>
                    </div>
                    <div style="padding: 10px;margin-top:10px">
                        <h5 class="color">Please Note:</h5>
                        <div class="icon_text">
                            <i class="fa-solid fa-exclamation"></i>
                            <p>
                                Guest/laggage capacities must be abided by for safety reasons. if you are unsure select a
                                large class as chauffeurs may turn down service when they are exceeded.
                            </p>
                        </div>
                        <div class="icon_text">
                            <i class="fa-solid fa-exclamation"></i>
                            <p>
                                The Vichle images above are examples.You may get a different vehicle of the similar quality.
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Booking Alert</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <div id="countdown">
                            <h4 id="message">Booking block for this day please contact to the support!</h4>
                            <p id="client_url"></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
      
        var payment_id = '{{ request('payment_id') }}';
        var stripeKey = '{{ config('services.stripe.key') }}';
        if (!stripeKey) {
            console.error('Stripe publishable key is not set');
        } else {
            var stripe = Stripe(stripeKey);

            function PayonStripe(bookingId) {
                console.log('bookingId', bookingId);

                var TotalPrice = parseInt(FleetPrice);

                FleetTaxes.forEach(tax => {
                    TotalPrice += parseInt(tax.price);
                });

                TotalPrice += isChildSeat ? 6 : 0;
                TotalPrice += meet_nd_greet ? 12 : 0;
                // var TotalPrice = parseInt(FleetPrice) + (isChildSeat ? 6 : 0) + (isBoosterSeat ? 12 : 0);

                fetch(`/create-checkout-session/${bookingId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                    })
                    .then(function(response) {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(function(session) {
                        console.log('Session ID:', session.id);
                        if (stripe && typeof stripe.redirectToCheckout === 'function') {
                            return stripe.redirectToCheckout({
                                sessionId: session.id
                            });
                        } else {
                            throw new Error(
                                'Stripe object is not initialized correctly or redirectToCheckout is undefined');
                        }
                    })
                    .then(function(result) {
                        if (result.error) {
                            alert(result.error.message);
                        }
                    })
                    .catch(function(error) {
                        console.error('Error:', error);
                    });
            }

        if (payment_id) {
            var button = document.getElementById('checkout-button');
            button.addEventListener('click', function() {
                PayonStripe(payment_id);
            });
        }

        document.getElementById('checkout-button').addEventListener('click', bookAndPay);
    }
      
    </script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var payment_id = '{{ request('payment_id') }}';
            var stripeKey = '{{ config('services.stripe.key') }}';
    
            if (!stripeKey) {
                console.error('Stripe publishable key is not set');
            } else {
                var stripe = Stripe(stripeKey);
    
                function PayonStripeclient(bookingId) {
                    console.log('bookingId', bookingId);
    
                    var TotalPrice = parseInt(FleetPrice);
    
                    FleetTaxes.forEach(tax => {
                        TotalPrice += parseInt(tax.price);
                    });
    
                    TotalPrice += isChildSeat ? 6 : 0;
                    TotalPrice += meet_nd_greet ? 12 : 0;
                    console.log('Total Price ', TotalPrice);
    
                    fetch(`/create-checkout-session/${bookingId}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                        })
                        .then(function(response) {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(function(session) {
                            console.log('Session ID:', session.id);
                            if (stripe && typeof stripe.redirectToCheckout === 'function') {
                                return stripe.redirectToCheckout({
                                    sessionId: session.id
                                });
                            } else {
                                throw new Error('Stripe object is not initialized correctly or redirectToCheckout is undefined');
                            }
                        })
                        .then(function(result) {
                            if (result.error) {
                                alert(result.error.message);
                            }
                        })
                        .catch(function(error) {
                            console.error('Error:', error);
                        });
                }
    
                // Check if payment_id is set and not empty on page load
                if (payment_id) {
                    PayonStripeclient(payment_id);
                }
    
                // Add event listener to the checkout button if it exists
                var checkoutButton = document.getElementById('checkout-button');
                if (checkoutButton) {
                    checkoutButton.addEventListener('click', function() {
                        var bookingId = payment_id; // Use the payment_id or retrieve a bookingId
                        PayonStripeclient(bookingId);
                    });
                }
            }
        });
    </script>
    



@endsection

@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtRWAKC7UW3kK8VNLlDe1EBHQQKu6ZTFo&libraries=places&callback=initMap">
    </script>
    <script src="{{ asset('frontend-assets/js/google-map.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/distance.js') }}"></script>

    @include('frontend.booking.booking-js')
@endsection
