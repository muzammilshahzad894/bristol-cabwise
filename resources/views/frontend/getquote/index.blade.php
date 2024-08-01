@extends('layouts.frontend.app')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    .alert-success{
        background: green !important;
        color: white !important;
    }
    .custom_lable{
        color: white !important;
    }
</style>




@php
    $distance = 1;
    $totalPrice = 0;

@endphp



@section('content')
    <section class="banner-header section-padding bg-img" data-overlay-dark="4"
        data-background="{{ asset('frontend-assets/img/slider/booking_img.jpeg') }}">
        <div class="v-middle">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 mt-30">
                        <div class="post-wrapper">
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
                        We are your trusted and punctual taxi service in Bristol. We pride ourselves on professionalism and
                        reliability, offering a diverse fleet of vehicles and experienced drivers dedicated to meeting your
                        transportation needs. Our pricing is competitive and transparent, with no hidden fees. Enjoy the
                        convenience of free registration and flexible cancellation up to 48 hours before your scheduled
                        pick-up time. For airport pickups, benefit from our complimentary 1-hour waiting time. Our drivers
                        provide attentive luggage assistance, and at other pickups, enjoy a complimentary 15-minute waiting
                        period. Booking is effortless through our intuitive website or mobile app, supported by dedicated
                        customer service. Simply enter your pickup and drop-off details, select your vehicle, provide
                        passenger information, review, confirm your booking, and receive instant confirmation.
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
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="row payment_section">
                <div class="col-md-8">
                    <h3 class="color color_theme">Get a Quote</h3>
                    <form action="{{ route('frontend.getquotePost') }}" method="POST" id="booking_form">
                        @csrf
                        <div class="col-md-12">
                            <label class="custom_lable" for="fullname">Full Name</label>
                            <input name="fullname" type="text" value="{{ old('fullname') }}" class="form-control" placeholder="Full Name">
                            @if ($errors->has('fullname'))
                                <span class="text-danger">{{ $errors->first('fullname') }}</span>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label class="custom_lable" for="email">Email</label>
                            <input name="email" type="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label class="custom_lable" for="phone">Phone</label>
                            <input name="phone" type="text" value="{{ old('phone') }}" class="form-control" placeholder="Phone">
                            @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label class="custom_lable" for="date">Date & Time</label>
                            <input name="date" type="datetime-local" value="{{ old('date') }}" class="input location styled-input timepicker border-radius-0 mb-0" placeholder="Date">
                            @if ($errors->has('date'))
                                <span class="text-danger">{{ $errors->first('date') }}</span>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label for="fleet_id">Select Vehicle</label>
                            <select name="fleet_id" id="fleet_id" class="styled-input border-radius-0 mb-0 select select2">
                                <option value="">Select Vehicle</option>
                                @foreach ($fleets as $service)
                                    <option value="{{ $service->id }}" {{ old('fleet_id') == $service->id ? 'selected' : '' }}>
                                        {{ $service->name }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('service'))
                                <span class="text-danger">{{ $errors->first('service') }}</span>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label class="custom_lable" for="pickup">Pickup Location</label>
                            <input name="pickup" type="text" value="{{ old('pickup') }}" class="form-control" placeholder="Pickup">
                            @if ($errors->has('pickup'))
                                <span class="text-danger">{{ $errors->first('pickup') }}</span>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label class="custom_lable" for="dropoff">Dropoff Location</label>
                            <input name="dropoff" type="text" value="{{ old('dropoff') }}" class="form-control" placeholder="Dropoff">
                            @if ($errors->has('dropoff'))
                                <span class="text-danger">{{ $errors->first('dropoff') }}</span>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label class="custom_lable" for="return_journey">Return Journey</label>
                            <select name="return_journey" id="return_journey" class="styled-input border-radius-0 mb-0 select select2">
                                <option value="0" {{ old('return_journey') == '0' ? 'selected' : '' }}>No</option>
                                <option value="1" {{ old('return_journey') == '1' ? 'selected' : '' }}>Yes</option>
                            </select>
                            @if ($errors->has('return_journey'))
                                <span class="text-danger">{{ $errors->first('return_journey') }}</span>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label class="custom_lable" for="comment">Comment</label>
                            <textarea name="comment" class="form-control" placeholder="Comment">{{ old('comment') }}</textarea>
                            @if ($errors->has('comment'))
                                <span class="text-danger">{{ $errors->first('comment') }}</span>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <button class="button-1 mt-15 mb-15 cutom_button" id="submit">Submit</button>
                        </div>
                    </form>
                    
                </div>
                <div class="col-md-4" style="border-left: 1px solid #ccc">

                    <h3 class="color color_theme">Location</h3>

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
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const url = new URL(window.location.href);
            const source = url.searchParams.get('source');
            var element = document.getElementById('request_by_admin');
            var element1 = document.getElementById('payment_section_main');
            if (source == 'get_a_quote') {
                element.style.display = 'block';
                element1.style.display = 'none';
            } else {
                element.style.display = 'none';
                element1.style.display = 'block';
            }
        });
    </script>
@endsection

@section('scripts')
    @include('frontend.booking.style-css')
@endsection
