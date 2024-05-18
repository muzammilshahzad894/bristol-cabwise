@extends('layouts.frontend.app')

@section('content')

<section class="banner-header section-padding bg-img" data-overlay-dark="4"
data-background="{{ asset('frontend-assets/img/slider/city_city.jpg') }}" style="height: 84vh;">
<div class="v-middle">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 mt-30">
                <div class="post-wrapper">
                    <a href="index-2.html">
                        <div>Home</div>
                    </a>
                    <div class="divider"></div>
                    <div class="text-white"><a href="#">Trust Violet</a></div>
                </div>
                <h1>Book Your Ride.</h1>
            </div>
        </div>
    </div>
</div>
</section>
<section class="testimonials section-padding mt-15">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mb-30">
                <div class="section-subtitle">Testimonials</div>
                <div class="section-title">What Clients Say</div>
            </div>
           
                    <div class="col-md-4 mb-4">
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
                        
                    </div>
                    <div class="col-md-4 mb-4">
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
                       
                    </div>
                    <div class="col-md-4 mb-4">
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
                    <div class="col-md-4 mb-4">
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
                        
                    </div>
                    <div class="col-md-4 mb-4">
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
                       
                    </div>
                    <div class="col-md-4 mb-4">
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
</section>
@endsection