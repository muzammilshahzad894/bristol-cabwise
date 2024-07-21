<style>
    .nav-item.dropdown:hover .dropdown-menu {
    display: block;
    margin-top: 0; /* Adjusts the dropdown position */
}

/* Make the dropdown-toggle work on hover */
.nav-item.dropdown:hover .nav-link.dropdown-toggle::after {
    display: inline-block;
    vertical-align: 0.255em;
    content: "";
    border-top: 0.3em solid;
    border-right: 0.3em solid transparent;
    border-bottom: 0;
    border-left: 0.3em solid transparent;
}
</style>


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
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('frontend.faqs') ? 'active' : '' }}" href="{{ route('frontend.faqs') }}">FAQs</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('frontend.trustVoilet') ? 'active' : '' }}" href="{{ route('frontend.trustVoilet') }}">Reviews</a></li>


                @guest
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('frontend.login') ||  request()->routeIs('frontend.signup') ? 'active' : '' }}" href="/login">Login</a></li>
                @endguest






                @auth
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
    
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('frontend.userHistory') }}">
                            {{ __('My Bookings') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('frontend.refund') }}">
                            {{ __('Refund') }}
                        </a>

                        {{-- <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a> --}}
    
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </div>
                </li>
            @endauth









                {{-- @if (Auth::check())
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.logout') }}">Logout</a></li>
                @else --}}
                <li class="nav-item">
                    <a href="{{ route('frontend.book-online') }}" class="booking_online_btn">Book Now</a></li>
            </ul>
            <div class="navbar-right">
                <div class="wrap">
                    <div class="icon"><a href="tel:07533225970"> <i class="flaticon-phone-call"></i></a> </div>
                    <div class="text">
                        <p>Need help?</p>
                        <h5><a href="tel:07533225970">07533225970</a></h5>
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>