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

    .selected-fleet {
        border: 2px solid #f0901d;
    }

    .select2 {
        border-radius: 0 !important;
    }
.styled-input1{
    min-width: 70px;
    background: transparent;
    border: 1px solid white;
    margin-top: 5px;
}
    /* Responsive adjustments */
    @media screen and (max-width: 768px) {
        .date-time-picker {
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
@section('content')
<section class="banner-header section-padding bg-img" data-overlay-dark="4" data-background="{{ asset('frontend-assets/img/slider/booking_img.jpeg') }}">
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
<!-- divider line -->
<!-- Post -->
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
                <div class="new_form step1" id="forms">
                    <h2 class="color color_theme">Journey Details</h2>
                    <!-- <div>
                        <label for="carType">Select Type:</label>
                        <select id="carType" class="select2 select" style="width: 100%" name="carType" onchange="toggleFlightIdVisibility()">
                            <option value="0">Select Type</option>
                            <option value="1">Departure</option>
                            <option value="2">Arrival</option>
                        </select>
                    </div> -->

                    <div class="gap-3">
                        <div id="flightId" style="display: none">
                            <label for="pickupLocation">Flight Name:</label>
                            <input type="text" name="flightName" placeholder="Enter flight Name" class="form-control pickupLocation" />
                            <label for="arrival time ">Arrival Time:</label>
                            <input type="time" class="input timepicker styled-input" id="arrival_time" placeholder="Arrival Time" />
                        </div>
                        <div>
                            <label for="pickupLocation">Pickup Location:</label>
                            <input type="text" id="pickupLocation" name="pickupLocation" placeholder="Enter pickup location" class="form-control pickupLocation border-radius-0" />
                        </div>
                        <div>
                            <label for="dropLocation">Drop Location:</label>
                            <div id="dropLocations">
                                <div class="drop-location">
                                    <input type="text" name="dropLocation[]" placeholder="Enter drop location" class="form-control pickupLocation border-radius-0" id="dropLocation" />
                                </div>
                            </div>
                            {{-- <input type="text" id="dropLocation" name="dropLocation"
                                    placeholder="Enter drop location" class="form-control pickupLocation" /> --}}
                            <button class="plus_icon" id="addLocation" onclick="addMore();">Add More location</button>
                        </div>
                        <div>
                            <label for="date">Date & Time:</label>
                            <input type="datetime-local" class="input location styled-input timepicker border-radius-0" placeholder="Return Date" />
                        </div>
                    </div>
                </div>
                <div class="new_form step2 row">
                    <h3 class="color color_theme">Please select Fleets:</h3>
                    <div class="main-div">
                        @if($fleets->count() > 0)
                            @foreach($fleets as $fleet)
                                <div class="col-md-6 form-container @if($loop->first) selected-fleet @endif" data-fleet-id="{{ $fleet->id }}" id="fleets-section" onclick="selectFleet(this)">
                                    <div class="p-6">
                                        <img src="{{ asset('uploads/fleets/'.$fleet->image) }}" alt="" />
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
                                    <div class="footer-box">
                                        <p class="color">price: <strong> ${{ $fleet->price }}</strong></p>
                                        <button class="proceed">Proceed</button>
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
                        <input type="text" class="form-control pickupLocation custom_input border-radius-0" name="name" placeholder="Enter Your Name" />
                    </div>
                    <div class="column_type">
                        <label for="tele" class="passenger_lebals">Telephone</label>
                        <input type="text" class="form-control pickupLocation custom_input border-radius-0" id="tele" name="telephone" placeholder="Enter Your Telephone" />
                        <div id="telephone-error" class="error-message"></div>

                    </div>
                    <div class="column_type border-botom">
                        <label for="tele" class="passenger_lebals">Email</label>
                        <input type="email" class="form-control pickupLocation custom_input border-radius-0" id="" name="email" placeholder="Enter Your Email" />
                        <div id="telephone-error" class="error-message"></div>
                    </div>
                    <div class="border-botom">
                        <div class="d-flex  column_type mt-4">
                            <label for="no_passenger" class="passenger_lebals">No of passenger</label>
                            {{-- <input type="number" class="" style="width: 70px;" id="no_passenger" name="no_passenger" value="1"> --}}
                            <select name="no_passenger" id="no_passenger" class="styled-input1 border-radius-0">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                            <div id="passenger-error" class="error-message"></div>
                        </div>

                        <div class="d-flex  column_type">
                            <label for="suit_case" class="passenger_lebals">SuitCases</label>
                            {{-- <input type="number" class="" style="width: 70px;" id="suit_case" name="suit_case" value="0"> --}}
                            <select name="suit_case" id="suit_case" class="styled-input1 border-radius-0">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <div id="suit-error" class="error-message"></div>
                        </div>
                        <div class="d-flex  column_type">
                            <label for="hand_lauggage" class="passenger_lebals">Hand luggage</label>
                            {{-- <input type="number" class="" style="width: 70px;" id="hand_lauggage" name="hand_lauggage" value="0"> --}}
                            <select name="hand_lauggage" id="hand_lauggage" class="styled-input1 border-radius-0">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <div id="luggage" class="error-message"></div>
                        </div>
                        <div class="d-flex  meet_greet" style="gap:10px;align-items:center">
                            <input type="checkbox" id="child_seat" name="child_seat" value="child_seat">
                            <label for="child_seat" class="passenger_lebals">Child Seat (£6)</label>
                            <div id="child-error" class="error-message"></div>
                        </div>
                        <div class="d-flex meet_greet" style="gap:10px;align-items:center">
                            <input type="checkbox" id="meet_greet" name="meet_greet" value="meet_greet">
                            <label for="meet_greet">Meet & Greet (£12 extra)</label>

                            </label>
                        </div>
                        <div class="d-flex meet_greet" style="gap:10px;align-items:center" onclick="showSomeoneElse()">
                            <input type="checkbox" id="Booking_for_someone" name="Booking_for_someone" value="booking_for_someone" >
                            <label for="Booking_for_someone">
                                Booking for someone else. 
                            </label>
                        </div>
                    </div>
                    <div class="border-botom" id="someone_else" style="display: none;">
                        <div class="column_type">
                            <label for="else_name" class="passenger_lebals">Name</label>
                            <input type="text" class="form-control pickupLocation custom_input border-radius-0" name="else_name" placeholder="Enter Name" />
                        </div>
                        <div class="column_type">
                            <label for="else_tele" class="passenger_lebals">Telephone</label>
                            <input type="text" class="form-control pickupLocation custom_input border-radius-0" id="else_tele" name="else_tele" placeholder="Enter Telephone" />
                            <div id="else_tele-error" class="error-message"></div>

                        </div>
                        <div class="column_type">
                            <label for="else_email" class="passenger_lebals">Email</label>
                            <input type="email" class="form-control pickupLocation custom_input border-radius-0" id="else_email" name="else_email" placeholder="Enter Email" />
                            <div id="else_email" class="error-message"></div>
                        </div>
                    </div>

                    <div class="mt-2">
                        <label for="comment">Comment (optional):</label>
                        <textarea name="comment" id="comment" class="form-control" rows="3"></textarea>
                    </div>

                </div>


                <div class="step4 new_form">
                    <div class="summary">
                        <div class="heading-border-bottom">

                            <h3 class="color color_theme">Summary.</h3>
                        </div>
                        <div class="d-flex gap-4">
                            <strong>Car Type:</strong>
                            <p>Departure</p>
                        </div>
                        <div class="d-flex gap-4">
                            <strong>Pickup Location:</strong>
                            <p>London</p>
                        </div>
                        <div class="d-flex gap-4">
                            <strong>Drop Location:</strong>
                            <p>Manchester</p>
                        </div>
                        <div class="d-flex gap-4">
                            <strong>Date:</strong>
                            <p>2022-03-09</p>
                        </div>
                        <div class="d-flex gap-4">
                            <strong>Time:</strong>
                            <p>12:00</p>
                        </div>
                        <div class="d-flex gap-4">
                            <strong>Name:</strong>
                            <p>John Doe</p>
                        </div>
                        <div class="d-flex gap-4">
                            <strong>Telephone:</strong>
                            <p>1234567890</p>
                        </div>
                        <div class="d-flex gap-4">
                            <strong>Email:</strong>
                            <p>testing@gmail.com </p>
                        </div>
                        <div class="d-flex gap-4">
                            <strong>No of passenger:</strong>
                            <p>1</p>
                        </div>
                        <div class="d-flex gap-4">
                            <strong>Child Seat:</strong>
                            <p>0</p>
                        </div>
                        <div class="d-flex gap-4">
                            <strong>SuitCases:</strong>
                            <p>0</p>
                        </div>
                        <div class="d-flex gap-4">
                            <strong>Hand luggage:</strong>
                            <p>0</p>
                        </div>
                        <div class="d-flex gap-4">
                            <strong>summary:</strong>
                            <p>You need any help!.</p>
                        </div>
                    </div>
                    <div class="payment_section_main">
                        {{-- <h3 class="color color_theme">Payment for Booking.</h3> --}}
                        <div>
                            <label for="payment_type">payment type</label>
                            <select class="select2 select border-radius-0" style="width: 100%" name="payment_type" id="payment_type">
                                <option value="">Choose payment type</option>
                                <option value="1">Debit card</option>
                                <option value="2">Paypal</option>
                            </select>
                        </div>

                    </div>
                </div>



                <div class="both_btn">
                    <button class="previous_btn button-1 mt-15 mb-15" onclick="prevStep()">
                        Previous
                    </button>
                    <button type="submit" class="button-1 mt-15 mb-15 cutom_button" id="next_btn" onclick="nextStep()">
                        Next
                    </button>

                    <button type="submit" class="button-1 mt-15 mb-15 cutom_button" id="form_submit" style="display: none">
                        Book Now
                    </button>

                </div>
            </div>
            <div class="col-md-4" style="border-left: 1px solid #ccc">

                <h3 class="color color_theme">Location</h3>
                <div class="google-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1573147.7480448114!2d-74.84628175962355!3d41.04009641088412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25856139b3d33%3A0xb2739f33610a08ee!2s1616%20Broadway%2C%20New%20York%2C%20NY%2010019%2C%20Amerika%20Birle%C5%9Fik%20Devletleri!5e0!3m2!1str!2str!4v1646760525018!5m2!1str!2str" width="100%" height="100%" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
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
</section>
@endsection

@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtRWAKC7UW3kK8VNLlDe1EBHQQKu6ZTFo&libraries=places&callback=initMap"></script>
<script src="{{ asset('frontend-assets/js/google-map.js') }}"></script>
<script src="{{ asset('frontend-assets/js/distance.js') }}"></script>
<script>
    let currentStep = 1;

    function nextStep() {
        if (currentStep < 4) {
            currentStep++;
            updateProgress();
            updateFormVisibility();
            updateButtonVisibility();
        }
        if (currentStep == 4) {
            document.querySelector("#next_btn").style.display = "none";
            document.getElementById("form_submit").style.display = "block";
        }
    }

    function prevStep() {
        if (currentStep > 1) {
            currentStep--;
            updateProgress();
            updateFormVisibility();
            updateButtonVisibility();
        }
        if (currentStep < 4) {
            document.querySelector("#next_btn").style.display = "block";
            document.getElementById("form_submit").style.display = "none";
        }
    }

    function updateProgress() {
        const steps = document.querySelectorAll(".progress-step");
        steps.forEach((step) => step.classList.remove("active"));
        document.getElementById(`step${currentStep}`).classList.add("active");
    }

    function updateFormVisibility() {
        const forms = document.querySelectorAll(".new_form");
        forms.forEach((form) => (form.style.display = "none"));
        document.querySelector(`.step${currentStep}`).style.display = "block";
    }

    function updateButtonVisibility() {
        const prevButton = document.querySelector(".previous_btn");
        if (currentStep === 1) {
            prevButton.style.display = "none";
        } else {
            prevButton.style.display = "block";
        }
    }

    // Initial call to ensure correct button visibility and form visibility
    updateButtonVisibility();
    updateFormVisibility();
</script>
<script>
    $(document).ready(function() {
        // Allow only numeric input for telephone field
        $('#tele').on('input', function() {
            this.value = this.value.replace(/\D/g, '');
        });
    });

    function toggleFlightIdVisibility() {
        var selectedValue = document.getElementById('carType').value;
        var flightIdDiv = document.getElementById('flightId');

        if (selectedValue == 2) { // Arrival
            flightIdDiv.style.display = 'block';
        } else {
            flightIdDiv.style.display = 'none';
        }
    }

    function addMore() {
        const dropLocationsContainer = document.getElementById("dropLocations");
        const dropLocationCount = dropLocationsContainer.children.length;
        const newDropLocation = document.createElement("div");
        newDropLocation.classList.add("drop-location");
        newDropLocation.innerHTML = `
                <label for="dropLocation${dropLocationCount + 1}">Drop Location ${dropLocationCount + 1}:</label>
                <input type="text" name="dropLocation[]" placeholder="Enter drop location" class="form-control pickupLocation" />
            `;
        dropLocationsContainer.appendChild(newDropLocation);
    }

    function selectFleet(fleet) {
        const fleets = document.querySelectorAll("#fleets-section");
        fleets.forEach((fleet) => fleet.classList.remove("selected-fleet"));
        fleet.classList.add("selected-fleet");
    }
    function showSomeoneElse() {
        var checkBox = document.getElementById("Booking_for_someone");
        var someoneElse = document.getElementById("someone_else");
        if (checkBox.checked == true) {
            someoneElse.style.display = "block";
        } else {
            someoneElse.style.display = "none";
        }
    }
</script>
@endsection