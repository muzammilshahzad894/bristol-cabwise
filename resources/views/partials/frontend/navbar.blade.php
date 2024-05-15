<nav class="navbar navbar-expand-lg">
    <div class="container">
        <!-- Logo -->
        <div class="logo-wrapper">
            <!-- <a class="logo" href="index-2.html"> <img src="img/logo-light.png" class="logo-img" alt=""> </a> -->
            <!-- <a class="logo" href="index.html"><h2>Renta<span>x</span></h2></a> -->
            <a class="logo" href="{{ route('frontend.index') }}">
                <img src="{{ asset('frontend-assets/img/logo-light.png') }}" class="logo-img" alt="" />
            </a>
            <!-- <div class="footer-logo">
                <h2>Bristol
                    <span> Cabwise</span>
                </h2>
            </div> -->


        </div>
        <!-- Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span> </button>
        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('frontend.index') ? 'active' : '' }}" href="{{ route('frontend.index') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('frontend.about') ? 'active' : '' }}" href="{{ route('frontend.about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('frontend.services') ? 'active' : '' }}" href="{{ route('frontend.services') }}">Services</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('frontend.contact') ? 'active' : '' }}" href="{{ route('frontend.contact') }}">Contact</a></li>
                <li class="nav-item">
                    <a href="{{ route('frontend.services') }}" class="booking_online_btn">Book Now</a></li>
            </ul>
            <div class="navbar-right">
                <div class="wrap">
                    <div class="icon"> <i class="flaticon-phone-call"></i> </div>
                    <div class="text">
                        <p>Need help?</p>
                        <h5><a href="tel:07533225970">07533225970</a></h5>
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>