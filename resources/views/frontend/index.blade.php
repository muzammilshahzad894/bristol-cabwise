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
.view_details{
	color: white;
    background: #ff8120;
    border: none;
    padding: 5px 10px;
    border-radius: 10px;
}
.cars_details_view{
	box-shadow: 0 0 10px 0 rgba(0,0,0,0.1);
	padding: 10px;
	border-radius: 10px;
	background: #222222;
	margin-top: 20px;
}
.special_rate{
	box-shadow: 0 0 10px 0 rgba(0,0,0,0);
	padding: 25px;
	border-radius: 10px;
	background: #222222;
	margin-top: 20px;
    display: flex;
    flex-direction: column;
    text-align: center;
}
.special_rate h4{
	color: white;
}
.icon_bg i{
	background: #ff8120;
    margin: 5px;
    border-radius: 10px;
    font-size: 25px;
    color: white;
    height: 50px;
    width: 50px;
    padding-top: 10px;
}
.right_border{
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

    <header class="header">
        <div class="video-fullscreen-wrap">
            <!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->
            <div class="video-fullscreen-video" data-overlay-dark="2" style="height: 800px;">
                <video playsinline="" autoplay="" loop="" muted="">
                    <source src="https://duruthemes.com/demo/html/renax/video.mp4" type="video/mp4" autoplay=""
                        loop="" muted="">
                    <source src="https://duruthemes.com/demo/html/renax/video.webm" type="video/webm" autoplay=""
                        loop="" muted="">
                </video>
            </div>
            <div class="v-middle" style="margin-top: 90px;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 text-center"
                            style="display: flex;flex-direction: column; justify-content: center;">
                            <h6>* Premium</h6>
                            <h1 style="font-size: 60px;">Bristol Cabwise </h1>
                            <h5></h5>
                            <a href="#0" class="button-1 mt-15 mb-15 mr-15">View Details <span
                                    class="ti-arrow-top-right"></span></a>
                            <a href="#0" class="button-2 mt-15 mb-15">Rent Now <span
                                    class="ti-arrow-top-right"></span></a>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-lg-5 col-md-12 mb-30">
                            <form class="new_forms">
                                <div>
                                    <label for="carType">Book Car:</label>
                                    <select name="carType" id="carType" class="form-control" style="color: gray">
                                        <option value="">Choose Car Type</option>
                                        <option value="1">Luxury Cars</option>
                                        <option value="2">Business Cars</option>
                                        <option value="3">Standard</option>
                                    </select>
                                </div>
                                <div class="gap-3">
                                    <div>
                                        <label for="pickupLocation">Pickup Location:</label>
                                        <input type="text" id="pickupLocation" name="pickupLocation"
                                            placeholder="Enter pickup location" class="form-control pickupLocation" />
                                    </div>
                                    <div>
                                        <label for="dropLocation">Drop Location:</label>
                                        <input type="text" id="dropLocation" name="dropLocation"
                                            placeholder="Enter drop location" class="form-control pickupLocation" />
                                    </div>
                                    <div>
                                        <label for="date">Date:</label>
                                        <input type="text" class="form-control input datepicker"
                                            placeholder="Return Date" />
                                    </div>
                                </div>
                                <div class="align-items-center">
                                    <label for="time">Time:</label>
                                    <div class="d-flex gap-2">
                                        <select name="hours" id="" class="w-100">
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                        </select>
                                        <select name="minutes" id="" class="w-100">
                                            <option value="00">00</option>
                                            <option value="05">05</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="25">25</option>
                                            <option value="30">30</option>
                                            <option value="35">35</option>
                                            <option value="40">40</option>
                                            <option value="45">45</option>
                                            <option value="50">50</option>
                                            <option value="55">55</option>
                                        </select>
                                    </div>
                                    <button type="button" class="button-1 mt-15 mb-15 cutom_button">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Car Category -->
    <section class="car-types1 section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-30">
                    <div class="section-subtitle">Categories</div>
                    <div class="section-title">Rental <span>Car Types</span></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme">
                        @if ($cars->count() > 0)
                            @foreach ($cars as $car)
                                <div class="item"> <img src="{{ asset('uploads/cars/' . $car->image) }}"
                                        class="img-fluid" alt="">
                                    <div class="title">
                                        <h4>{{ $car->type }}</h4>
                                    </div>
                                    <div class="curv-butn icon-bg">
                                        <a href="{{ route('frontend.book-online') }}" class="vid">
                                            <div class="icon"> <i class="ti-arrow-top-right"></i> </div>
                                        </a>
                                        <div class="br-left-top">
                                            <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                class="w-11 h-11">
                                                <path
                                                    d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                                    fill="#1b1b1b"></path>
                                            </svg>
                                        </div>
                                        <div class="br-right-bottom">
                                            <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                class="w-11 h-11">
                                                <path
                                                    d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                                    fill="#1b1b1b"></path>
                                            </svg>
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
    <!-- divider line -->
    <div class="line-vr-section"></div>
    <!-- Process -->
    <section class="process section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center mb-30">
                    <div class="section-subtitle">Steps</div>
                    <div class="section-title white">Car Rental <span>Process</span></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-30">
                    <div class="item">
                        <div class="text">
                            <h5>Choose A Car</h5>
                            <p>View our range of cars, find your perfect car for the coming days.</p>
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
                            <h5>Come In Contact</h5>
                            <p>Our advisor team is ready to help you with the booking process or any questions.</p>
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
                            <h5>Enjoy Driving</h5>
                            <p>Receive the key and enjoy your car. We treat all our cars with respect.</p>
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
	{{-- Additional Section  --}}

	<section class="process section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="cars_details_view">
						<div>
							 <img src="{{ asset('frontend-assets/img/slider/5.jpg') }}" alt="" />
							<h4 class="text-white mb-0 pt-2">BMW 3-Series</h4>
							<p style="color: #f5b754">Moderline</p>
							<div class="d-flex justify-content-around">
								<div class="right_border">
									<i class="fas fa-car"></i>
									<p>4</p>
								</div>
								<div class="right_border">
									<i class="fas fa-chair"></i>
									<p>4</p>
								</div>
								<div class="right_border">
									<i class="fas fa-suitcase"></i>
									<p>2 bags</p>
								</div>
							</div>
							<div class="d-flex justify-content-between mt-4 align-items-center">
								<p class="text-white pt-2"> $100/day</p>
								<button class="view_details">View Details</button>
							</div>
						</div>
						
					</div>
				</div>
				<div class="col-md-4">
					<div class="cars_details_view">
						<div>
							 <img src="{{ asset('frontend-assets/img/slider/11.jpg') }}" alt="" />
							<h4 class="text-white mb-0 pt-2">BMW 3-Series</h4>
							<p style="color: #f5b754">Moderline</p>
							<div class="d-flex justify-content-around">
								<div class="right_border">
									<i class="fas fa-car"></i>
									<p>4</p>
								</div>
								<div class="right_border">
									<i class="fas fa-chair"></i>
									<p>4</p>
								</div>
								<div class="right_border">
									<i class="fas fa-suitcase"></i>
									<p>2 bags</p>
								</div>
							</div>
							<div class="d-flex justify-content-between mt-4 align-items-center">
								<p class="text-white pt-2"> $100/day</p>
								<button class="view_details">View Details</button>
							</div>
						</div>
						
					</div>
				</div>
				<div class="col-md-4">
					<div class="cars_details_view">
						<div>
							 <img src="{{ asset('frontend-assets/img/slider/9.jpg') }}" alt="" />
							<h4 class="text-white mb-0 pt-2">BMW 3-Series</h4>
							<p style="color: #f5b754">Moderline</p>
							<div class="d-flex justify-content-around">
								<div class="right_border">
									<i class="fas fa-car"></i>
									<p>4</p>
								</div>
								<div class="right_border">
									<i class="fas fa-chair"></i>
									<p>4</p>
								</div>
								<div class="right_border">
									<i class="fas fa-suitcase"></i>
									<p>2 bags</p>
								</div>
							</div>
							<div class="d-flex justify-content-between mt-4 align-items-center">
								<p class="text-white pt-2"> $100/day</p>
								<button class="view_details">View Details</button>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</section>

	{{-- second addtional section  --}}
	
	<section class="process">
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
						<h4>On Way Rental</h4>
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
                                <p>Lorem posuere in miss drana en the nisan semere sceriun amiss etiam ornare in the miss
                                    drana is lorem fermen nunta urnase mauris in the interdum.</p>
                            </div>
                            <div class="info mt-30">
                                <div class="img-curv">
                                    <div class="img"> <img src="{{ asset('frontend-assets/img/team/1.jpg') }}"
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
                                    <h6>Dan Martin</h6>
                                    <p>Customer</p>
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
                                <p>Lorem posuere in miss drana en the nisan semere sceriun amiss etiam ornare in the miss
                                    drana is lorem fermen nunta urnase mauris in the interdum.</p>
                            </div>
                            <div class="info mt-30">
                                <div class="img-curv">
                                    {{-- <div class="img"> <img src="img/team/4.jpg" alt=""> </div> --}}
                                    <div class="img"> <img src="{{ asset('frontend-assets/img/team/4.jpg') }}"
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
                                    <h6>Olivia Brown</h6>
                                    <p>Customer</p>
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
                                <p>Lorem posuere in miss drana en the nisan semere sceriun amiss etiam ornare in the miss
                                    drana is lorem fermen nunta urnase mauris in the interdum.</p>
                            </div>
                            <div class="info mt-30">
                                <div class="img-curv">
                                    <div class="img"> <img src="{{ asset('frontend-assets/img/team/6.jpg') }}"
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
                                    <h6>Emily Martin</h6>
                                    <p>Customer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- divider line -->
    <div class="line-vr-section"></div>
    <!-- Lets Talk -->
    <section class="lets-talk bg-img bg-fixed section-padding" data-overlay-dark="5"
        data-background="{{ asset('frontend-assets/img/slider/3.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h6>Rent Your Car</h6>
                    <h5>Interested in Renting?</h5>
                    <p>Don't hesitate and send us a message.</p> <a href="tel:+8001234567"
                        class="button-1 mt-15 mb-15 mr-10"><i class="fa-brands fa-whatsapp"></i> WhatsApp</a> <a
                        href="contact.html" class="button-2 mt-15 mb-15">Contact Us <span
                            class="ti-arrow-top-right"></span></a>
                </div>
            </div>
        </div>
    </section>
@endsection
