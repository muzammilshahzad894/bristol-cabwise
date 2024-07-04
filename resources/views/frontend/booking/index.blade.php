@extends('layouts.frontend.app')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFnXfbd7cYC4CknS2DpDvO6EskP95Z_7M&libraries=places">
</script>
<style>
    #map {
        overflow: unset !important;
        height: 400px;
        width: 100%;
        border: 0;
        /* Remove border */
        padding: 0;
        margin: 0;
    }

    .about_car {
        font-size: 12px;
        color: white;
        margin: 0px;
    }

    #mapContainer {
        height: 400px;
        width: 100%;
    }

    .pickupLocation {
        border-radius: 0px !important;
    }
</style>




@php
    $userRole = auth()->user()->role;
    $distance = 1;
    $totalPrice = 0;

@endphp
<script>
    let allFleetPrices = [];

    function updatefleetValue(fleetId, currentPrice) {
        allFleetPrices.push({
            id: fleetId,
            price: currentPrice
        });
    }

    function updatefleetPrice(distance) {
        let ids = allFleetPrices;
        ids.forEach(function(item) {
            let priceElement = document.getElementById(item.id);
            if (priceElement) {
                let updatedPrice = item.price * distance;
                priceElement.textContent = '£' + updatedPrice.toFixed(2);
            }
        });
    }
</script>


@section('content')
    <section class="banner-header section-padding bg-img" data-overlay-dark="4"
        data-background="{{ asset('frontend-assets/img/slider/booking_img.jpeg') }}">
        <input type="hidden" id="login_user" value="{{ $userRole }}">
        <div class="v-middle">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 mt-30">
                        <div class="post-wrapper">
                            {{-- <a href="index-2.html">
                                <div>Home</div>
                            </a>
                            <div class="divider"></div>
                            <div class="text-white"><a href="#">book online</a></div> --}}
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
                        We are your trusted and punctual taxi service in Bristol. We pride ourselves on professionalism and reliability, offering a diverse fleet of vehicles and experienced drivers dedicated to meeting your transportation needs. Our pricing is competitive and transparent, with no hidden fees. Enjoy the convenience of free registration and flexible cancellation up to 48 hours before your scheduled pick-up time. For airport pickups, benefit from our complimentary 1-hour waiting time. Our drivers provide attentive luggage assistance, and at other pickups, enjoy a complimentary 15-minute waiting period. Booking is effortless through our intuitive website or mobile app, supported by dedicated customer service. Simply enter your pickup and drop-off details, select your vehicle, provide passenger information, review, confirm your booking, and receive instant confirmation.
                    </p>
                    {{-- <p>
                        Nulla vitae metus tincidunt, varius nunc quis, porta nulla.
                        Pellentesque vel dui nec libero auctor pretium id sed arcu. Nunc
                        consequat diam id nisl blandit dignissim. Etiam commodo diam
                        dolor, at scelerisque sem finibus sit amet. Curabitur id lectus
                        eget purus finibus laoreet.
                    </p> --}}
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
                                    $bookingServiceId = !empty($booking_detail) ? $booking_detail->service_id : '';

                                @endphp
                                <select name="service" id="service"
                                    class="styled-input border-radius-0 mb-0 select select2" onchange="showFlightId(this);">
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
                                        class="form-control pickupLocation" id="flightName"
                                        @if (isset($booking_detail) && $booking_detail->flight_name != '') value="{{ $booking_detail->flight_name }}" @endif>
                                    <div id="flightName-error" class="error-message text-danger"></div>
                                    <label for="arrival time ">Flight Arrival Time:</label>
                                    <input type="time" name="flight_time" class="input timepicker styled-input"
                                        placeholder="Arrival Time" id="flight_time"
                                        @if (isset($booking_detail) && $booking_detail->flight_time != '') value="{{ $booking_detail->flight_time }}" @endif>
                                    <div id="flight_time-error" class="error-message text-danger"></div>
                                </div>
                                <div>
                                    <label for="pickupLocation">Pickup Location:</label>
                                    <input type="text" id="pickupLocation" name="pickupLocation"
                                        placeholder="Enter pickup location"
                                        class="form-control pickupLocation border-radius-0 mb-0">
                                    <div id="pickup-error" class="error-message text-danger"></div>
                                </div>
                                <div>
                                    <label for="dropLocation">Drop Location:</label>
                                    <div id="dropLocations">
                                        <div class="drop-location mb-2">
                                            <input type="text" id="dropLocation0" name="dropLocation[]"
                                                placeholder="Enter drop location" class="form-control border-radius-0 mb-0">
                                            <div id="drop-error" class="error-message text-danger"></div>
                                        </div>
                                    </div>
                                    {{-- <input type="text" name="dropLocation"
                                    placeholder="Enter drop location" class="form-control pickupLocation" /> --}}
                                    <button class="plus_icon mt-1" type="button" id="addLocation" onclick="addMore();">Add
                                        Via Location</button>
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
                            <div id="fleets-section" class="main-div">
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
                                <div class=" meet_greet airportservice" style="gap:10px;align-items:center"
                                    onclick="showChildSeat()">
                                    <input type="checkbox" id="child_seat" name="child_seat" value=""
                                        class="mb-0" @if (isset($booking_detail) && $booking_detail->is_childseat == 1) checked @endif>
                                    <label for="child_seat" class="passenger_lebals">Child Seat (£6)</label>
                                </div>
                                <div class="d-flex meet_greet " style="gap:10px;align-items:center"
                                    onclick="showExtraLauggage()">
                                    <input type="checkbox" id="extra_lauggage" name="extra_lauggage" value=""
                                        class="mb-0" @if (isset($booking_detail) && $booking_detail->is_extra_lauggage == 1) checked @endif>
                                    <label for="extra_lauggage" class="passenger_lebals">Extra Lauggage (£6)</label>
                                </div>
                                <div class=" meet_greet airportservice" style="gap:10px;align-items:center"
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
                                <div class=" flightDetails gap-4" id="summary-flight-type-div">
                                    <strong>Flight Type:</strong>
                                    <p id="summary-flight-type"></p>
                                </div>
                                <div class=" flightDetails gap-4" id="summary-flight-name-div">
                                    <strong>Flight Name:</strong>
                                    <p id="summary-flight-name"></p>
                                </div>
                                <div class=" flightDetails gap-4" id="summary-flight-time-div">
                                    <strong>Flight Arrival Time:</strong>
                                    <p id="summary-flight-time"></p>
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
                                    <strong>Meet & Greet:</strong>
                                    <p id="summary-meets-greets">0</p>
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
                                <div class="d-flex gap-4" id="summary-child-seat_price_div" style="display: none">
                                    <strong>Child Seat:</strong>
                                    <div>
                                        <p id="summary-child-seat_price"></p>
                                    </div>
                                </div>
                                <div class="d-flex gap-4" id="summary-extra-lauggage_price_div" style="display: none">
                                    <strong>Meet & Greet:</strong>
                                    <div>
                                        <p id="summary-meet-greet"></p>
                                    </div>
                                </div>
                                <div class="d-flex gap-4 " id="summary-meet-greet_price_div" style="display: none">
                                    <strong>Extra Lauggage:</strong>
                                    <div>
                                        <p id="summary-extra-lauggage"></p>
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
                                            <button class="coupon_btn" id="add_coupon" type="button"
                                                onclick="applyCoupon()">submit</button>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            @if ($userRole != 'admin')
                                <div class="payment_section_main">
                                    <p class="dropdown_menus">Select Payment Type:</p>
                                    <div class="unique-dropdown">
                                        <p class="unique-dropbtns">Select Option</p>
                                        <div class="unique-dropdown-content">
                                            <ul>
                                                <li class="unique-payment-option" target="_blank" id="checkout-button"
                                                    onclick="PayonStripe();">Debit Card</li>
                                                {{-- <li class="unique-payment-option" target="_blank" id="paypal"
                                                    onclick="bookAndPay('paypal');">PayPal</li> --}}
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
                            @if ($userRole == 'admin')
                                <button type="button" class="button-1 mt-15 mb-15 cutom_button" id="form_submit"
                                    style="display: none" onclick="bookAndPay('admin');">
                                    Book Now
                                </button>
                            @endif

                        </div>
                    </form>
                    <div id="mapMarkplaces"></div>

                </div>
                <div class="col-md-4" style="border-left: 1px solid #ccc">

                    <h3 class="color color_theme">Location</h3>
                    <div class="google-map">
                        {{-- <iframe id="map"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24301.0311484067!2d-2.6174498609618677!3d51.45451443765247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48719c1653d8c9a9%3A0xb47bdb0a605f0a0!2sBristol%2C%20UK!5e0!3m2!1sen!2s!4v1605382028827!5m2!1sen!2s"
                            width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0"></iframe> --}}

                        <div id="map"></div>
                    </div>
                    <div style="padding: 10px;margin-top:10px">
                        <h5 class="color">All classes include:</h5>
                        <div class="icon_text">
                            <i class="fa-solid fa-check"></i>
                            <p>
                                Free registration
                            </p>
                        </div>
                        <div class="icon_text">
                            <i class="fa-solid fa-check"></i>
                            <p>
                                Free cancellation up to 48 hours before your scheduled  pick-up
                            </p>
                        </div>
                        <div class="icon_text">
                            <i class="fa-solid fa-check"></i>
                            <p>
                                Enjoy complimentary 1 hour waiting time for airport pickups
                            </p>
                        </div>
                        <div class="icon_text">
                            <i class="fa-solid fa-check"></i>
                            <p>
                                Luggage assistance
                            </p>
                        </div>
                        <div class="icon_text">
                            <i class="fa-solid fa-check"></i>
                            <p>
                                Complimentary 15 min waiting period at all other pickups 
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
                            <div id="first_url " class="modal_style_p">
                                <p id="client_url"></p>
                                <button class="view_details" id="copy_btn" onclick="copyToClipboard()">Copy</button>
                            </div>

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

            function PayonStripe() {
                bookingId = current_booking_id;

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

        }
    </script>
@endsection

@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>



    {{-- <script src="{{ asset('frontend-assets/js/google-map.js') }}"></script> --}}
    {{-- <script src="{{ asset('frontend-assets/js/distance.js') }}"></script> --}}

{{-- 
    <script>
        let geocoder;
        let distanceService;
        let originAutocomplete;
        let map;
        let originPlace = null;
        let destinationPlaces = [];
        let distances = [];
        let totalDistance = 0;

        $(document).ready(function() {
            // Initialize Google Maps centered on Sargodha, Pakistan
            const sargodhaLocation = {
                lat: 32.0836,
                lng: 72.6712
            };
            map = new google.maps.Map(document.getElementById('map'), {
                center: sargodhaLocation,
                zoom: 13
            });

            const pickupInput = document.getElementById('pickupLocation');
            originAutocomplete = new google.maps.places.Autocomplete(pickupInput, {
                bounds: new google.maps.LatLngBounds(
                    new google.maps.LatLng(32.0000, 72.5000), // South West Corner
                    new google.maps.LatLng(32.1500, 72.8000) // North East Corner
                ),
                componentRestrictions: {
                    country: 'pk'
                },
                types: ['geocode']
            });
            originAutocomplete.addListener('place_changed', handleOriginPlaceChange);

            geocoder = new google.maps.Geocoder();
            distanceService = new google.maps.DistanceMatrixService();

            // Initialize the first drop location autocomplete
            handleDestinationPlaceChange(0);
        });

        function handleOriginPlaceChange() {
            originPlace = originAutocomplete.getPlace();
            if (!originPlace || !originPlace.geometry || !isPlaceInSargodha(originPlace)) {
                alert('Invalid pickup location. Please select a valid location within Sargodha.');
                originPlace = null; // Reset originPlace if it's invalid
                return;
            }
            checkAndCalculateDistances();
        }

        function handleDestinationPlaceChange(index) {
            const input = document.querySelectorAll('#dropLocations input')[index];
            const autocomplete = new google.maps.places.Autocomplete(input, {
                bounds: new google.maps.LatLngBounds(
                    new google.maps.LatLng(32.0000, 72.5000), // South West Corner
                    new google.maps.LatLng(32.1500, 72.8000) // North East Corner
                ),
                componentRestrictions: {
                    country: 'pk'
                },
                types: ['geocode']
            });
            autocomplete.addListener('place_changed', () => {
                const place = autocomplete.getPlace();
                if (!place || !place.geometry || !isPlaceInSargodha(place)) {
                    alert('Invalid drop location. Please select a valid location within Sargodha.');
                    destinationPlaces[index] = null; // Reset the invalid destination place
                    return;
                }
                destinationPlaces[index] = place;
                checkAndCalculateDistances();
            });
        }

        function addMore() {
            const dropLocationsDiv = document.getElementById('dropLocations');
            const newDropLocationDiv = document.createElement('div');
            const newIndex = destinationPlaces.length;

            newDropLocationDiv.className = 'drop-location mb-2';
            newDropLocationDiv.innerHTML = `
        <input type="text" id="dropLocation${newIndex}" name="dropLocation[]" placeholder="Enter drop location" class="form-control border-radius-0 mb-0">
        <div id="drop-error" class="error-message text-danger"></div>
        `;

            dropLocationsDiv.appendChild(newDropLocationDiv);
            handleDestinationPlaceChange(newIndex);
        }

        function checkAndCalculateDistances() {
            if (!originPlace || destinationPlaces.length === 0) {
                return;
            }

            const allPlaces = [originPlace, ...destinationPlaces].filter(place => place);
            if (allPlaces.length < 2) {
                return;
            }

            totalDistance = 0;
            distances = [];
            for (let i = 0; i < allPlaces.length - 1; i++) {
                const originLatLng = allPlaces[i].geometry.location;
                const destinationLatLng = allPlaces[i + 1].geometry.location;

                calculateDistance(originLatLng, destinationLatLng, i);
            }
        }

        function calculateDistance(origin, destination, index) {
            distanceService.getDistanceMatrix({
                origins: [origin],
                destinations: [destination],
                travelMode: google.maps.TravelMode.DRIVING
            }, (response, status) => {
                if (status === 'OK') {
                    const distanceValueInMeters = response.rows[0].elements[0].distance.value;
                    const distanceValueInMiles = distanceValueInMeters / 1609.34; // Convert meters to miles
                    distances[index] = distanceValueInMiles;
                    updateTotalDistance();
                } else {
                    console.error('Error:', status);
                }
            });
        }

        function updateTotalDistance() {
            totalDistance = distances.reduce((acc, distance) => acc + distance, 0);
            const totalDistanceInMiles = totalDistance.toFixed(2);
            distance = totalDistanceInMiles;
        }

        function isPlaceInSargodha(place) {
            const sargodhaBounds = new google.maps.LatLngBounds(
                new google.maps.LatLng(32.0000, 72.5000), // South West Corner
                new google.maps.LatLng(32.1500, 72.8000) // North East Corner
            );
            return sargodhaBounds.contains(place.geometry.location);
        }
    </script> --}}
    <script>
        let geocoder;
        let distanceService;
        let originAutocomplete;
        let map;
        let originPlace = null;
        let destinationPlaces = [];
        let distances = [];
        let totalDistance = 0;
        let markers = [];
        let directionsService;
        let directionsRenderer;
        let infoWindow;
    
        $(document).ready(function() {
            // Initialize Google Maps centered on Sargodha, Pakistan
            const sargodhaLocation = { lat: 32.0836, lng: 72.6712 };
            map = new google.maps.Map(document.getElementById('map'), {
                center: sargodhaLocation,
                zoom: 13
            });
    
            directionsService = new google.maps.DirectionsService();
            directionsRenderer = new google.maps.DirectionsRenderer();
            directionsRenderer.setMap(map);
    
            infoWindow = new google.maps.InfoWindow();
    
            const pickupInput = document.getElementById('pickupLocation');
            originAutocomplete = new google.maps.places.Autocomplete(pickupInput, {
                bounds: new google.maps.LatLngBounds(
                    new google.maps.LatLng(32.0000, 72.5000), // South West Corner
                    new google.maps.LatLng(32.1500, 72.8000) // North East Corner
                ),
                componentRestrictions: { country: 'pk' },
                types: ['geocode']
            });
            originAutocomplete.addListener('place_changed', handleOriginPlaceChange);
    
            geocoder = new google.maps.Geocoder();
            distanceService = new google.maps.DistanceMatrixService();
    
            // Initialize the first drop location autocomplete
            handleDestinationPlaceChange(0);
        });
    
        function handleOriginPlaceChange() {
            originPlace = originAutocomplete.getPlace();
            if (!originPlace || !originPlace.geometry || !isPlaceInSargodha(originPlace)) {
                alert('Invalid pickup location. Please select a valid location within Sargodha.');
                originPlace = null; // Reset originPlace if it's invalid
                return;
            }
            addMarker(originPlace.geometry.location, originPlace.formatted_address);
            checkAndCalculateDistances();
        }
    
        function handleDestinationPlaceChange(index) {
            const input = document.querySelectorAll('#dropLocations input')[index];
            const autocomplete = new google.maps.places.Autocomplete(input, {
                bounds: new google.maps.LatLngBounds(
                    new google.maps.LatLng(32.0000, 72.5000), // South West Corner
                    new google.maps.LatLng(32.1500, 72.8000) // North East Corner
                ),
                componentRestrictions: { country: 'pk' },
                types: ['geocode']
            });
            autocomplete.addListener('place_changed', () => {
                const place = autocomplete.getPlace();
                if (!place || !place.geometry || !isPlaceInSargodha(place)) {
                    alert('Invalid drop location. Please select a valid location within Sargodha.');
                    destinationPlaces[index] = null; // Reset the invalid destination place
                    return;
                }
                destinationPlaces[index] = place;
                addMarker(place.geometry.location, place.formatted_address);
                checkAndCalculateDistances();
            });
        }
    
        function addMore() {
            const dropLocationsDiv = document.getElementById('dropLocations');
            const newDropLocationDiv = document.createElement('div');
            const newIndex = destinationPlaces.length;
    
            newDropLocationDiv.className = 'drop-location mb-2';
            newDropLocationDiv.innerHTML = `
                <input type="text" id="dropLocation${newIndex}" name="dropLocation[]" placeholder="Enter drop location" class="form-control border-radius-0 mb-0">
                <div id="drop-error" class="error-message text-danger"></div>
            `;
    
            dropLocationsDiv.appendChild(newDropLocationDiv);
            handleDestinationPlaceChange(newIndex);
        }
    
        function checkAndCalculateDistances() {
            if (!originPlace || destinationPlaces.length === 0) {
                return;
            }
    
            const allPlaces = [originPlace, ...destinationPlaces].filter(place => place);
            if (allPlaces.length < 2) {
                return;
            }
    
            totalDistance = 0;
            distances = [];
            clearMarkers();
            for (let i = 0; i < allPlaces.length - 1; i++) {
                const originLatLng = allPlaces[i].geometry.location;
                const destinationLatLng = allPlaces[i + 1].geometry.location;
    
                addMarker(originLatLng, allPlaces[i].formatted_address);
                addMarker(destinationLatLng, allPlaces[i + 1].formatted_address);
    
                calculateDistance(originLatLng, destinationLatLng, i);
            }
    
            drawRoute(allPlaces);
        }
    
        function calculateDistance(origin, destination, index) {
            distanceService.getDistanceMatrix({
                origins: [origin],
                destinations: [destination],
                travelMode: google.maps.TravelMode.DRIVING
            }, (response, status) => {
                if (status === 'OK') {
                    const distanceValueInMeters = response.rows[0].elements[0].distance.value;
                    const distanceValueInMiles = distanceValueInMeters / 1609.34; // Convert meters to miles
                    distances[index] = distanceValueInMiles;
                    updateTotalDistance();
                } else {
                    console.error('Error:', status);
                }
            });
        }
    
        function updateTotalDistance() {
            totalDistance = distances.reduce((acc, distance) => acc + distance, 0);
            const totalDistanceInMiles = totalDistance.toFixed(2);
            distance = totalDistanceInMiles;
        }
    
        function isPlaceInSargodha(place) {
            const sargodhaBounds = new google.maps.LatLngBounds(
                new google.maps.LatLng(32.0000, 72.5000), // South West Corner
                new google.maps.LatLng(32.1500, 72.8000) // North East Corner
            );
            return sargodhaBounds.contains(place.geometry.location);
        }
    
        function addMarker(location, title) {
            const marker = new google.maps.Marker({
                position: location,
                map: map,
                title: title
            });
            marker.addListener('click', () => {
                infoWindow.setContent(title);
                infoWindow.open(map, marker);
            });
            markers.push(marker);
        }
    
        function clearMarkers() {
            markers.forEach(marker => marker.setMap(null));
            markers = [];
        }
    
        function drawRoute(places) {
            const waypoints = places.slice(1, -1).map(place => ({ location: place.geometry.location, stopover: true }));
            directionsService.route({
                origin: places[0].geometry.location,
                destination: places[places.length - 1].geometry.location,
                waypoints: waypoints,
                travelMode: google.maps.TravelMode.DRIVING
            }, (response, status) => {
                if (status === 'OK') {
                    directionsRenderer.setDirections(response);
                } else {
                    console.error('Directions request failed due to ' + status);
                }
            });
        }
    </script>
    
    




    @include('frontend.booking.booking-js')
    @include('frontend.booking.style-css')
@endsection
