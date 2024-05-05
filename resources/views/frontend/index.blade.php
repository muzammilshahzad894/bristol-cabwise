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
					@if($cars->count() > 0)
						@foreach($cars as $car)
							<div class="item"> <img src="{{ asset('uploads/cars/'.$car->image) }}" class="img-fluid" alt="">
								<div class="title">
									<h4>{{ $car->type }}</h4>
								</div>
								<div class="curv-butn icon-bg">
									<a href="{{ route('frontend.book-online') }}" class="vid">
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
@endsection