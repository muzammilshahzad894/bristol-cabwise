<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>BRISTOL CABWISE</title>
	<link rel="shortcut icon" href="{{ asset('frontend-assets/img/favicon.ico') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap">
	<link rel="stylesheet" href="{{ asset('frontend-assets/css/plugins.css') }}" />
	<link rel="stylesheet" href="{{ asset('frontend-assets/css/style.css') }}" />
	<script src="https://js.stripe.com/v3/"></script>
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