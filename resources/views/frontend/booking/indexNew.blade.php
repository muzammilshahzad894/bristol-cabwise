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
    .minimum_hours{
        font-size: 12px;
        color: orange;

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
    .design_style{
        display: flex;
        justify-content: center;
        text-align: center;
    }
    .description{
        font-size: 17px !important;
        font-weight: 500 !important;
    }
</style>

@section('content')
    <section class="banner-header section-padding bg-img" data-overlay-dark="4"
        data-background="{{ asset('frontend-assets/img/slider/booking_img2.jpeg') }}">
        <div class="v-middle">
            <div class="container">
                <div class="row design_style">
                    <div class="col-lg-6 col-md-12 mt-30">
                        <div class="post-wrapper">
                            {{-- <a href="index-2.html">
                                <div>Home</div>
                            </a>
                            <div class="divider"></div>
                            <div class="text-white"><a href="#">book online</a></div> --}}
                        </div>
                        <h1 style="color: orange">Book Your Ride</h1>
                        <p class="description" style="color: white;">Reserve your cab here. We provide a reliable 24-hour cab service in Bristol and across the UK, featuring professional drivers and transparent pricing. Experience hassle-free booking and exceptional service.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="post section-padding">
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
                                    <button class="plus_icon mt-1" type="button" id="addLocation" onclick="addMore();">Add
                                        Via Location</button>
                                    <div id="via_locatoins_input"></div>
                                    <label for="dropLocation">Dropoff Location:</label>
                                    <div id="dropLocations">
                                        <div class="drop-location mb-2">
                                            <input type="text" id="dropLocation0" name="dropLocation[]"
                                                placeholder="Enter dropoff location"
                                                class="form-control border-radius-0 mb-0 dropoffLocations">
                                            <div id="drop-error" class="error-message text-danger"></div>
                                        </div>
                                    </div>
                                    {{-- <input type="text" name="dropLocation"
                                    placeholder="Enter drop location" class="form-control pickupLocation" /> --}}

                                </div>

                                @php
                                    $datetime = isset($booking_detail->booking_date, $booking_detail->booking_time)
                                        ? $booking_detail->booking_date . 'T' . $booking_detail->booking_time
                                        : '';

                                @endphp
                                <div>
                                    <label for="date">Date & Time:</label>
                                    <input type="datetime-local"
                                        class="styled-input timepicker border-radius-0 mb-0"
                                        placeholder="Return Date"
                                         id="date-time"
                                        value="{{ isset($booking_detail) ? (isset($booking_detail->booking_date) && isset($booking_detail->booking_time) ? $booking_detail->booking_date . 'T' . $booking_detail->booking_time : '') : '' }}" />
                                        <p class="minimum_hours"></p>
                                    <div id="date-time-error" class="error-message text-danger"></div>
                                </div>
                                <div class=" meet_greet d-flex" style="gap:10px;align-items:center"
                                    onclick="showReturn();">
                                        <input type="checkbox" id="return" name="return" value=""
                                        class="mb-0" @if (isset($booking_detail) && $booking_detail->is_return == 1) checked @endif>
                                        <label for="return">Return Journey</label>
                                </div>

                                <div id="return_location" style="display: none;margin-top:24px;">
                                    <div id="return_date">
                                        <label for="return_date">Return Date & Time:</label>
                                        <input type="datetime-local" name="return_date_time"
                                            class="styled-input timepicker border-radius-0 mb-0"
                                            placeholder="Return Date" id="return_date_time"
                                            value="{{ isset($booking_detail) ? (isset($booking_detail->return_date) && isset($booking_detail->return_time) ? $booking_detail->return_date . 'T' . $booking_detail->return_time : '') : '' }}" />
                                            <p class="minimum_hours"></p>
                                        <div id="return_date_time-error" class="error-message text-danger"></div>
                                    </div>
                                    <label for="return_pickupLocation">Return Pickup Location:</label>
                                    <input type="text"  name="return_pickupLocation"
                                        placeholder="" id="return_pickupLocation"
                                        class="form-control  border-radius-0 mb-0" disabled>
                                    <label for="return_dropLocation">Return Dropoff Location:</label>
                                    <div id="return_dropLocations">
                                        <div class=" mb-2">
                                            <input type="text" name="return_dropLocation" disabled
                                            id="return_dropLocation"
                                                placeholder=""
                                                class="form-control border-radius-0 mb-0 ">
                                        </div>
                                    </div>
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
                                    <label for="child_seat" class="passenger_lebals">Child Seat (£5)</label>
                                </div>
                                <div class="d-none" style="" style="display: none">
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
                                    <strong>Fleet:</strong>
                                    <p id="summary-fleet-type">fleet</p>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Pickup Location:</strong>
                                    <p id="summary-pickup-location">London</p>
                                </div>
                                <div class=" " id="via_locations">
                                    {{-- <strong>Via Location:</strong>
                                    <p id="summary-via-location">Manchester</p> --}}
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Dropoff Location:</strong>
                                    <p id="summary-drop-location">Manchester</p>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Date & Time: </strong>
                                    <p id="summary-date">2022-03-09</p>
                                </div>
                                <div class="" id="return_summary">

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
                                    <strong>Comments:</strong>
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
                                <div  id="summary-service_texas" style="display: unset;">
                                </div>
                                <div class="d-none gap-4 " id="summary-meet-greet_price_div" style="display: none">
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
                        </div>


                        <div class="both_btn">
                            <button class="previous_btn button-1 mt-15 mb-15" onclick="prevStep()" type="button">
                                Previous
                            </button>
                            <button type="button" class="button-1 mt-15 mb-15 cutom_button" id="next_btn"
                                onclick="nextStep()">
                                Next
                            </button>

                        </div>
                    </form>
                    <div id="mapMarkplaces"></div>

                </div>
                <div class="col-md-4" style="border-left: 1px solid #ccc">

                    <h3 class="color color_theme">Location</h3>
                    <div class="google-map">
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
                                Free cancellation up to 24 hours before your scheduled pick-up
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
                                large class as drivers may turn down service when they are exceeded.
                            </p>
                        </div>
                        <div class="icon_text">
                            <i class="fa-solid fa-exclamation"></i>
                            <p>
                                The vehicle images above are examples.You may get a different vehicle of the similar quality.
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

@endsection

@section('scripts')
    <script src="https://js.stripe.com/v3/"></script> 

    @include('frontend.booking.booking-js')
    @include('frontend.booking.style-css')
@endsection
