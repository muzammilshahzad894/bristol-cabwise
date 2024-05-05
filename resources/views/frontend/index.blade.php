@extends('layouts.frontend.app')

@section('content')
<!-- Header Video -->
<header class="header">
	<div class="video-fullscreen-wrap">
		<!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->
		<div class="video-fullscreen-video" data-overlay-dark="2">
			<video playsinline="" autoplay="" loop="" muted="">
				<source src="https://duruthemes.com/demo/html/renax/video.mp4" type="video/mp4" autoplay="" loop="" muted="">
				<source src="https://duruthemes.com/demo/html/renax/video.webm" type="video/webm" autoplay="" loop="" muted="">
			</video>
		</div>
		<div class="v-middle">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h6>* Premium</h6>
						<h1>Rental Car</h1>
						<h5>Bugatti Mistral W16 <span>$800 <i>/ day</i></span></h5>
						<a href="#0" class="button-1 mt-15 mb-15 mr-15">View Details <span class="ti-arrow-top-right"></span></a>
						<a href="#0" class="button-2 mt-15 mb-15">Rent Now <span class="ti-arrow-top-right"></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- About -->
<section class="about section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12 mb-30">
				<div class="content">
					<div class="section-subtitle">Rentax</div>
					<div class="section-title">We Are More Than <span>A Car Rental Company</span></div>
					<p class="mb-30">Car repair quisque sodales dui ut varius vestibulum drana tortor turpis porttiton tellus eu euismod nisl massa nutodio in the miss volume place urna lacinia eros nunta urna mauris vehicula rutrum in the miss on volume interdum.</p>
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
					</ul> <a href="about.html" class="button-1">Read More <span class="ti-arrow-top-right"></span></a>
				</div>
			</div>
			<div class="col-lg-5 offset-lg-1 col-md-12">
				<div class="item"> <img src="{{ asset('frontend-assets/img/about.jpg') }}" class="img-fluid" alt="">
					<div class="curv-butn icon-bg">
						<a href="https://youtu.be/1LxcTt1adfY" class="vid">
							<div class="icon"> <i class="ti-control-play"></i> </div>
						</a>
						<div class="br-left-top">
							<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
								<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
							</svg>
						</div>
						<div class="br-right-bottom">
							<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
								<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
							</svg>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Booking Search -->
{{-- <section class="background bg-img bg-fixed section-padding" data-overlay-dark="5" data-background="img/slider/2.jpg">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center mb-15">
				<div class="section-subtitle">Rent Now</div>
				<div class="section-title">Book Auto Rental</div>
			</div>
		</div>
		<div class="booking-inner clearfix">
			<form action="#0" class="form1 brdr clearfix">
				<div class="col2 c3">
					<div class="select1_wrapper">
						<label>Choose Car Type</label>
						<div class="select1_inner">
							<select class="select2 select" style="width: 100%">
								<option value="0">Choose Car Type</option>
								<option value="1">All</option>
								<option value="2">Luxury Cars</option>
								<option value="3">Sport Cars</option>
								<option value="4">SUVs</option>
								<option value="5">Convertible</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col2 c4">
					<div class="select1_wrapper">
						<label>Pick Up Location</label>
						<div class="select1_inner">
							<select class="select2 select" style="width: 100%">
								<option value="0">Pick Up Location</option>
								<option value="1">Dubai</option>
								<option value="2">Abu Dhabi</option>
								<option value="3">Sharjah</option>
								<option value="4">Alain</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col1 c1">
					<div class="input1_wrapper">
						<label>Pick Up Date</label>
						<div class="input1_inner">
							<input type="text" class="form-control input datepicker" placeholder="Pick Up Date">
						</div>
					</div>
				</div>
				<div class="col2 c5">
					<div class="select1_wrapper">
						<label>Drop Off Location</label>
						<div class="select1_inner">
							<select class="select2 select" style="width: 100%">
								<option value="0">Drop Off Location</option>
								<option value="1">Alain</option>
								<option value="2">Sharjah</option>
								<option value="3">Abu Dhabi</option>
								<option value="4">Dubai</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col1 c2">
					<div class="input1_wrapper">
						<label>Return Date</label>
						<div class="input1_inner">
							<input type="text" class="form-control input datepicker" placeholder="Return Date">
						</div>
					</div>
				</div>
				<div class="col3 c6">
					<button type="submit" class="booking-button">Rent Now</button>
				</div>
			</form>
		</div>
	</div>
</section> --}}
<!-- Cars 1 -->
<section class="cars1 section-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center mb-30">
				<div class="section-subtitle">Select Your Car</div>
				<div class="section-title">Luxury <span>Car Fleet</span></div>
			</div>
		</div>
		<div class="cars1-carousel owl-theme owl-carousel">
			<div class="item">
				<div class="img"> <img src="{{ asset('frontend-assets/img/slider/7.jpg') }}" alt=""> </div>
				<div class="con opacity-1">
					<div class="row">
						<div class="col-md-7">
							<div class="title"><a href="#">Lamborghini Urus</a></div>
							<div class="details"> <span><i class="omfi-door"></i> 4 Seats</span> <span><i class="omfi-transmission"></i> Auto</span> <span><i class="omfi-luggage"></i> 2 Bags</span> <span><i class="omfi-age"></i> Age 25</span> </div>
						</div>
						<div class="col-md-5">
							<div class="book">
								<div><a href="car-details.html" class="btn"><span>Rent Now</span></a></div>
								<div><span class="price">$750</span><span>/day</span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="img"> <img src="{{ asset('frontend-assets/img/slider/8.jpg') }}" alt=""> </div>
				<div class="con opacity-1">
					<div class="row">
						<div class="col-md-7">
							<div class="title"><a href="#">Aston Martin DBX</a></div>
							<div class="details"> <span><i class="omfi-door"></i> 4 Seats</span> <span><i class="omfi-transmission"></i> Auto</span> <span><i class="omfi-luggage"></i> 2 Bags</span> <span><i class="omfi-age"></i> Age 25</span></div>
						</div>
						<div class="col-md-5">
							<div class="book">
								<div><a href="car-details.html" class="btn"><span>Rent Now</span></a></div>
								<div><span class="price">$500</span><span>/day</span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="img"> <img src="{{ asset('frontend-assets/img/slider/9.jpg') }}" alt=""> </div>
				<div class="con opacity-1">
					<div class="row">
						<div class="col-md-7">
							<div class="title"><a href="#">Bugatti Mistral W16</a></div>
							<div class="details"> <span><i class="omfi-door"></i> 2 Seats</span> <span><i class="omfi-transmission"></i> Auto</span> <span><i class="omfi-luggage"></i> 2 Bags</span> <span><i class="omfi-age"></i> Age 25</span></div>
						</div>
						<div class="col-md-5">
							<div class="book">
								<div><a href="car-details.html" class="btn"><span>Rent Now</span></a></div>
								<div><span class="price">$800</span><span>/day</span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="img"> <img src="{{ asset('frontend-assets/img/slider/11.jpg') }}" alt=""> </div>
				<div class="con opacity-1">
					<div class="row">
						<div class="col-md-7">
							<div class="title"><a href="#">Bentley Bentayga</a></div>
							<div class="details"> <span><i class="omfi-door"></i> 4 Seats</span> <span><i class="omfi-transmission"></i> Auto</span> <span><i class="omfi-luggage"></i> 2 Bags</span> <span><i class="omfi-age"></i> Age 25</span></div>
						</div>
						<div class="col-md-5">
							<div class="book">
								<div><a href="car-details.html" class="btn"><span>Rent Now</span></a></div>
								<div><span class="price">$600</span><span>/day</span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="img"> <img src="{{ asset('frontend-assets/img/slider/12.jpg') }}" alt=""> </div>
				<div class="con opacity-1">
					<div class="row">
						<div class="col-md-7">
							<div class="title"><a href="#">Rolls Royce Cullinan</a></div>
							<div class="details"> <span><i class="omfi-door"></i> 4 Seats</span> <span><i class="omfi-transmission"></i> Auto</span> <span><i class="omfi-luggage"></i> 4 Bags</span> <span><i class="omfi-age"></i> Age 25</span></div>
						</div>
						<div class="col-md-5">
							<div class="book">
								<div><a href="car-details.html" class="btn"><span>Rent Now</span></a></div>
								<div><span class="price">$900</span><span>/day</span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="img"> <img src="{{ asset('frontend-assets/img/slider/13.jpg') }}" alt=""> </div>
				<div class="con opacity-1">
					<div class="row">
						<div class="col-md-7">
							<div class="title"><a href="#">Bentley Continental</a></div>
							<div class="details"> <span><i class="omfi-door"></i> 4 Seats</span> <span><i class="omfi-transmission"></i> Auto</span> <span><i class="omfi-luggage"></i> 2 Bags</span> <span><i class="omfi-age"></i> Age 25</span></div>
						</div>
						<div class="col-md-5">
							<div class="book">
								<div><a href="car-details.html" class="btn"><span>Rent Now</span></a></div>
								<div><span class="price">$500</span><span>/day</span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="img"> <img src="{{ asset('frontend-assets/img/slider/14.jpg') }}" alt=""> </div>
				<div class="con opacity-1">
					<div class="row">
						<div class="col-md-7">
							<div class="title"><a href="#">Audi RS7 Sportback</a></div>
							<div class="details"> <span><i class="omfi-door"></i> 4 Seats</span> <span><i class="omfi-transmission"></i> Auto</span> <span><i class="omfi-luggage"></i> 2 Bags</span> <span><i class="omfi-age"></i> Age 25</span></div>
						</div>
						<div class="col-md-5">
							<div class="book">
								<div><a href="car-details.html" class="btn"><span>Rent Now</span></a></div>
								<div><span class="price">$450</span><span>/day</span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="item">
				<div class="img"> <img src="{{ asset('frontend-assets/img/slider/15.jpg') }}" alt=""> </div>
				<div class="con opacity-1">
					<div class="row">
						<div class="col-md-7">
							<div class="title"><a href="#">AUDI Q8</a></div>
							<div class="details"> <span><i class="omfi-door"></i> 4 Seats</span> <span><i class="omfi-transmission"></i> Auto</span> <span><i class="omfi-luggage"></i> 3 Bags</span> <span><i class="omfi-age"></i> Age 25</span></div>
						</div>
						<div class="col-md-5">
							<div class="book">
								<div><a href="car-details.html" class="btn"><span>Rent Now</span></a></div>
								<div><span class="price">$450</span><span>/day</span></div>
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
					<div class="item"> <img src="{{ asset('frontend-assets/img/cars/03.jpg') }}" class="img-fluid" alt="">
						<div class="title">
							<h4>Luxury Cars</h4>
						</div>
						<div class="curv-butn icon-bg">
							<a href="car-details.html" class="vid">
								<div class="icon"> <i class="ti-arrow-top-right"></i> </div>
							</a>
							<div class="br-left-top">
								<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
									<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
								</svg>
							</div>
							<div class="br-right-bottom">
								<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
									<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
								</svg>
							</div>
						</div>
					</div>
					<div class="item"> <img src="{{ asset('frontend-assets/img/cars/04.jpg') }}" class="img-fluid" alt="">
						<div class="title">
							<h4>Sport Cars</h4>
						</div>
						<div class="curv-butn icon-bg">
							<a href="car-details.html" class="vid">
								<div class="icon"> <i class="ti-arrow-top-right"></i> </div>
							</a>
							<div class="br-left-top">
								<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
									<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
								</svg>
							</div>
							<div class="br-right-bottom">
								<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
									<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
								</svg>
							</div>
						</div>
					</div>
					<div class="item"> <img src="{{ asset('frontend-assets/img/cars/02.jpg') }}" class="img-fluid" alt="">
						<div class="title">
							<h4>SUV</h4>
						</div>
						<div class="curv-butn icon-bg">
							<a href="car-details.html" class="vid">
								<div class="icon"> <i class="ti-arrow-top-right"></i> </div>
							</a>
							<div class="br-left-top">
								<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
									<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
								</svg>
							</div>
							<div class="br-right-bottom">
								<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
									<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
								</svg>
							</div>
						</div>
					</div>
					<div class="item"> <img src="{{ asset('frontend-assets/img/cars/01.jpg') }}" class="img-fluid" alt="">
						<div class="title">
							<h4>Convertible</h4>
						</div>
						<div class="curv-butn icon-bg">
							<a href="car-details.html" class="vid">
								<div class="icon"> <i class="ti-arrow-top-right"></i> </div>
							</a>
							<div class="br-left-top">
								<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
									<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
								</svg>
							</div>
							<div class="br-right-bottom">
								<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
									<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
								</svg>
							</div>
						</div>
					</div>
					<div class="item"> <img src="{{ asset('frontend-assets/img/cars/05.jpg') }}" class="img-fluid" alt="">
						<div class="title">
							<h4>Sedan</h4>
						</div>
						<div class="curv-butn icon-bg">
							<a href="car-details.html" class="vid">
								<div class="icon"> <i class="ti-arrow-top-right"></i> </div>
							</a>
							<div class="br-left-top">
								<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
									<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
								</svg>
							</div>
							<div class="br-right-bottom">
								<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
									<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
								</svg>
							</div>
						</div>
					</div>
					<div class="item"> <img src="{{ asset('frontend-assets/img/cars/06.jpg') }}" class="img-fluid" alt="">
						<div class="title">
							<h4>Small Cars</h4>
						</div>
						<div class="curv-butn icon-bg">
							<a href="car-details.html" class="vid">
								<div class="icon"> <i class="ti-arrow-top-right"></i> </div>
							</a>
							<div class="br-left-top">
								<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
									<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
								</svg>
							</div>
							<div class="br-right-bottom">
								<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
									<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
								</svg>
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
								<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
									<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
								</svg>
							</div>
							<div class="shap-right-bottom">
								<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
									<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
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
								<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
									<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
								</svg>
							</div>
							<div class="shap-right-bottom">
								<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
									<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
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
								<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
									<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
								</svg>
							</div>
							<div class="shap-right-bottom">
								<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
									<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
								</svg>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-12 text-center mt-15">
				<p><span class="ti-info"></span> If you've never rented a car before, we'll guide you through the process.</p>
			</div>
		</div>
	</div>
</section>
<!-- Video -->
<section class="video-wrapper video section-padding bg-img bg-fixed" data-overlay-dark="4" data-background="{{ asset('frontend-assets/img/slider/1.jpg') }}">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="section-subtitle">Explore</div>
				<div class="section-title white">Car <span>Promo</span> Video</div>
			</div>
		</div>
		<div class="row">
			<div class="text-center col-md-12">
				<a class="vid" href="https://youtu.be/1LxcTt1adfY">
					<div class="vid-butn"> <span class="icon"> <i class="ti-control-play"></i> </span> </div>
				</a>
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
								<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
									<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
								</svg>
							</div>
							<div class="shap-right-bottom">
								<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
									<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
								</svg>
							</div>
						</div> <i class="fa-solid fa-quote-left"></i>
						<div class="text">
							<p>Lorem posuere in miss drana en the nisan semere sceriun amiss etiam ornare in the miss drana is lorem fermen nunta urnase mauris in the interdum.</p>
						</div>
						<div class="info mt-30">
							<div class="img-curv">
								<div class="img"> <img src="{{ asset('frontend-assets/img/team/1.jpg') }}" alt=""> </div>
								<div class="shap-left-top">
									<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
										<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
									</svg>
								</div>
								<div class="shap-right-bottom">
									<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
										<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
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
								<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
									<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
								</svg>
							</div>
							<div class="shap-right-bottom">
								<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
									<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
								</svg>
							</div>
						</div> <i class="fa-solid fa-quote-left"></i>
						<div class="text">
							<p>Lorem posuere in miss drana en the nisan semere sceriun amiss etiam ornare in the miss drana is lorem fermen nunta urnase mauris in the interdum.</p>
						</div>
						<div class="info mt-30">
							<div class="img-curv">
								{{-- <div class="img"> <img src="img/team/4.jpg" alt=""> </div> --}}
								<div class="img"> <img src="{{ asset('frontend-assets/img/team/4.jpg') }}" alt=""> </div>
								<div class="shap-left-top">
									<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
										<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
									</svg>
								</div>
								<div class="shap-right-bottom">
									<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
										<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
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
								<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
									<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
								</svg>
							</div>
							<div class="shap-right-bottom">
								<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
									<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
								</svg>
							</div>
						</div> <i class="fa-solid fa-quote-left"></i>
						<div class="text">
							<p>Lorem posuere in miss drana en the nisan semere sceriun amiss etiam ornare in the miss drana is lorem fermen nunta urnase mauris in the interdum.</p>
						</div>
						<div class="info mt-30">
							<div class="img-curv">
								<div class="img"> <img src="{{ asset('frontend-assets/img/team/6.jpg') }}" alt=""> </div>
								<div class="shap-left-top">
									<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
										<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
									</svg>
								</div>
								<div class="shap-right-bottom">
									<svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
										<path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
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
<!-- Blog 1 -->
<section class="blog1 section-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center mb-30">
				<div class="section-subtitle">Our Blog</div>
				<div class="section-title">Latest <span>News</span></div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="owl-carousel owl-theme">
					<div class="item">
						<div class="img"> <img src="{{ asset('frontend-assets/img/blog/03.jpg') }}" alt=""> </div>
						<div class="wrapper">
							<div class="date"> <a href="#">29 Dec, 2024</a> </div>
							<div class="con">
								<div class="category"> <a href="#"><i class="ti-user"></i>Olivia D.</a> <a href="#"><i class="ti-comment"></i>5 Comments</a> </div>
								<div class="text"> <a href="post.html">Documents required for car rental</a> </div> <a href="post.html" class="icon-btn"><i class="ti-arrow-top-right"></i></a>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="img"> <img src="{{ asset('frontend-assets/img/blog/05.jpg') }}" alt=""> </div>
						<div class="wrapper">
							<div class="date"> <a href="#">27 Dec, 2024</a> </div>
							<div class="con">
								<div class="category"> <a href="#"><i class="ti-user"></i>Martin C.</a> <a href="#"><i class="ti-comment"></i>5 Comments</a> </div>
								<div class="text"> <a href="post.html">Rental cost of sport and other cars</a> </div> <a href="post.html" class="icon-btn"><i class="ti-arrow-top-right"></i></a>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="img"> <img src="{{ asset('frontend-assets/img/blog/06.jpg') }}" alt=""> </div>
						<div class="wrapper">
							<div class="date"> <a href="#">25 Dec, 2024</a> </div>
							<div class="con">
								<div class="category"> <a href="#"><i class="ti-user"></i>Martin C.</a> <a href="#"><i class="ti-comment"></i>5 Comments</a> </div>
								<div class="text"> <a href="post.html">Rental cars how to check driving fines?</a> </div> <a href="post.html" class="icon-btn"><i class="ti-arrow-top-right"></i></a>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="img"> <img src="{{ asset('frontend-assets/img/blog/03.jpg') }}" alt=""> </div>
						<div class="wrapper">
							<div class="date"> <a href="#">23 Dec, 2024</a> </div>
							<div class="con">
								<div class="category"> <a href="#"><i class="ti-user"></i>Arya T.</a> <a href="#"><i class="ti-comment"></i>5 Comments</a> </div>
								<div class="text"> <a href="post.html">How to Rent a Car at the Airport Terminal?</a> </div> <a href="post.html" class="icon-btn"><i class="ti-arrow-top-right"></i></a>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="img"> <img src="{{ asset('frontend-assets/img/blog/01.jpg') }}" alt=""> </div>
						<div class="wrapper">
							<div class="date"> <a href="blog1.html">22 Dec, 2024</a> </div>
							<div class="con">
								<div class="category"> <a href="#"><i class="ti-user"></i>Micheal B.</a> <a href="#"><i class="ti-comment"></i>5 Comments</a> </div>
								<div class="text"> <a href="post.html">Penalties for violating the rules in rental cars</a> </div> <a href="post.html" class="icon-btn"><i class="ti-arrow-top-right"></i></a>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="img"> <img src="{{ asset('frontend-assets/img/blog/02.jpg') }}" alt=""> </div>
						<div class="wrapper">
							<div class="date"> <a href="#">21 Dec, 2024</a> </div>
							<div class="con">
								<div class="category"> <a href="#"><i class="ti-user"></i>Daniel K.</a> <a href="#"><i class="ti-comment"></i>5 Comments</a> </div>
								<div class="text"> <a href="post.html">How to check a car before renting?</a> </div> <a href="post.html" class="icon-btn"><i class="ti-arrow-top-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Lets Talk -->
<section class="lets-talk bg-img bg-fixed section-padding" data-overlay-dark="5" data-background="img/slider/3.jpg">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h6>Rent Your Car</h6>
				<h5>Interested in Renting?</h5>
				<p>Don't hesitate and send us a message.</p> <a href="tel:+8001234567" class="button-1 mt-15 mb-15 mr-10"><i class="fa-brands fa-whatsapp"></i> WhatsApp</a> <a href="contact.html" class="button-2 mt-15 mb-15">Contact Us <span class="ti-arrow-top-right"></span></a>
			</div>
		</div>
	</div>
</section>
<!-- Clients -->
<section class="clients">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="owl-carousel owl-theme">
					<div class="clients-logo">
						<a href="#0"><img src="{{ asset('frontend-assets/img/clients/1.png') }}" alt=""></a>
					</div>
					<div class="clients-logo">
						<a href="#0"><img src="{{ asset('frontend-assets/img/clients/2.png') }}" alt=""></a>
					</div>
					<div class="clients-logo">
						<a href="#0"><img src="{{ asset('frontend-assets/img/clients/3.png') }}" alt=""></a>
					</div>
					<div class="clients-logo">
						<a href="#0"><img src="{{ asset('frontend-assets/img/clients/4.png') }}" alt=""></a>
					</div>
					<div class="clients-logo">
						<a href="#0"><img src="{{ asset('frontend-assets/img/clients/5.png') }}" alt=""></a>
					</div>
					<div class="clients-logo">
						<a href="#0"><img src="{{ asset('frontend-assets/img/clients/6.png') }}" alt=""></a>
					</div>
					<div class="clients-logo">
						<a href="#0"><img src="{{ asset('frontend-assets/img/clients/7.png') }}" alt=""></a>
					</div>
					<div class="clients-logo">
						<a href="#0"><img src="{{ asset('frontend-assets/img/clients/8.png') }}" alt=""></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection