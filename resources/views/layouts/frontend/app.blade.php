<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>BRISTOL CABWISE</title>
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ asset('frontend-assets/img/favicon.ico') }}" />

	<!-- Meta Tags for SEO -->
	<meta name="description" content="BRISTOL CABWISE offers reliable and convenient cab services in Bristol. Book your ride today!">
	<meta name="keywords" content="Bristol, Cab, Taxi, Ride, Transportation, Booking">

	<!-- Open Graph / Facebook -->
	<meta property="og:type" content="website">
	<meta property="og:title" content="BRISTOL CABWISE - Reliable Cab Service in Bristol">
	<meta property="og:description" content="BRISTOL CABWISE offers reliable and convenient cab services in Bristol. Book your ride today!">
	<meta property="og:image" content="{{ asset('frontend-assets/img/logo-light.png') }}">
	<meta property="og:url" content="{{ url('/') }}">
	<meta property="og:site_name" content="BRISTOL CABWISE">

	<!-- Twitter Meta Tags -->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="BRISTOL CABWISE - Reliable Cab Service in Bristol">
	<meta name="twitter:description" content="BRISTOL CABWISE offers reliable and convenient cab services in Bristol. Book your ride today!">
	<meta name="twitter:image" content="{{ asset('frontend-assets/img/logo-light.png') }}">
	<meta name="twitter:site" content="@yourtwitterhandle"> <!-- Replace with your Twitter handle -->

	<!-- Google Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap">

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('frontend-assets/css/plugins.css') }}" />
	<link rel="stylesheet" href="{{ asset('frontend-assets/css/style.css') }}" />

	<!-- Stripe JS -->
	<script src="https://js.stripe.com/v3/"></script>
	
	@yield('css')
</head>

<body>
	<!-- Preloader -->
	<div class="preloader-bg"></div>
	<div id="preloader">
		<div id="preloader-status">
			<div class="preloader-position loader"> <span></span> </div>
		</div>
	</div>
	<!-- Progress scroll totop -->
	<div class="progress-wrap cursor-pointer">
		<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
		</svg>
	</div>
	<!-- Navbar -->
	@include('partials.frontend.navbar')

    <!-- Content -->
    @yield('content')

	<!-- Footer -->
	@include('partials.frontend.footer')
	<!-- jQuery -->
	<script src="{{ asset('frontend-assets/js/jquery-3.7.1.min.js') }}"></script>
	<script src="{{ asset('frontend-assets/js/jquery-migrate-3.4.1.min.js') }}"></script>
	<script src="{{ asset('frontend-assets/js/modernizr-2.6.2.min.js') }}"></script>
	<script src="{{ asset('frontend-assets/js/imagesloaded.pkgd.min.js') }}"></script>
	<script src="{{ asset('frontend-assets/js/jquery.isotope.v3.0.2.js') }}"></script>
	<script src="{{ asset('frontend-assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('frontend-assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('frontend-assets/js/scrollIt.min.js') }}"></script>
	<script src="{{ asset('frontend-assets/js/jquery.waypoints.min.js') }}"></script>
	<script src="{{ asset('frontend-assets/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('frontend-assets/js/jquery.stellar.min.js') }}"></script>
	<script src="{{ asset('frontend-assets/js/jquery.magnific-popup.js') }}"></script>
	<script src="{{ asset('frontend-assets/js/select2.js') }}"></script>
	<script src="{{ asset('frontend-assets/js/datepicker.js') }}"></script>
	<script src="{{ asset('frontend-assets/js/YouTubePopUp.js') }}"></script>
	<script src="{{ asset('frontend-assets/js/custom.js') }}"></script>
    <script src="https://js.stripe.com/v3/"></script>
	
    <script>
        var logoLightUrl = "{{ asset('frontend-assets/img/logo-light.png') }}";
    </script>
	@yield('scripts')
</body>

</html>