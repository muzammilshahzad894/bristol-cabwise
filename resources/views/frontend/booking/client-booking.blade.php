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


@section('content')

    <section class="banner-header section-padding bg-img" data-overlay-dark="4"
        data-background="{{ asset('frontend-assets/img/slider/booking_img.jpeg') }}">
        <input type="hidden" id="login_user" >
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

    {{-- @include('frontend.booking.booking-js') --}}
@endsection
