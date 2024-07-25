@extends('layouts.frontend.app')

@section('content')

<style>
    .item .text{
        min-height: auto !important;
    }
    .text p {
    display: -webkit-box;
    -webkit-line-clamp: 3; /* Change this to 4 if you want to show 4 lines */
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}


</style>
<section class="banner-header section-padding bg-img" data-overlay-dark="4"
data-background="{{ asset('frontend-assets/img/slider/city_city.jpeg') }}" style="height: 84vh;">
<div class="v-middle">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 mt-30">
                <div class="post-wrapper">
                    <a href="index-2.html">
                        <!-- <div>Home</div> -->
                    </a>
                    <!-- <div class="divider"></div> -->
                    <!-- <div class="text-white"><a href="#">Trust Piolet Reviews</a></div> -->
                </div>
                <h1>Reviews</h1>
                <p style="color: orange; font-size: 21px; font-weight: bold; line-height: 1.5;">
                    Top-Rated On Trustpilot For Our <br> Punctual And Professional Cab Service.
                </p>
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
                            <p>I had a wonderful experience with Bristol Cabwise. The booking process was seamless, and the driver was courteous and helpful. Will definitely use this service again.</p>
                        </div>
                        <div class="info mt-30">
                            <div class="img-curv">
                                <div class="img"> <img src="{{ asset('frontend-assets/img/team/review.jpeg') }}"
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
                            <p>Overall, a great service. The only reason I'm giving four stars is because the traffic was a bit heavy, but that's not their fault. The driver was very patient and friendly.</p>
                        </div>
                        <div class="info mt-30">
                            <div class="img-curv">
                                {{-- <div class="img"> <img src="img/team/4.jpg" alt=""> </div> --}}
                                <div class="img"> <img src="{{ asset('frontend-assets/img/team/review.jpeg') }}"
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
                            <p>Bristol Cabwise exceeded my expectations. The driver arrived on time and the ride was smooth. The rates are also very reasonable. I’ll be booking with them again for sure.</p>
                        </div>
                        <div class="info mt-30">
                            <div class="img-curv">
                                <div class="img"> <img src="{{ asset('frontend-assets/img/team/review.jpeg') }}"
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
                            <p>Good service with a professional touch. The car was neat and the driver knew the best routes to avoid traffic. Just wish they had more availability during peak hours.</p>
                        </div>
                        <div class="info mt-30">
                            <div class="img-curv">
                                <div class="img"> <img src="{{ asset('frontend-assets/img/team/review.jpeg') }}"
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
                            <p>Highly recommend Bristol Cabwise! They offer excellent customer service and the drivers are always friendly and prompt. Made my trip to the airport stress-free.</p>
                        </div>
                        <div class="info mt-30">
                            <div class="img-curv">
                                {{-- <div class="img"> <img src="img/team/4.jpg" alt=""> </div> --}}
                                <div class="img"> <img src="{{ asset('frontend-assets/img/team/review.jpeg') }}"
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
                            <p>Excellent service! The driver was punctual and very professional. The car was clean and comfortable. Highly recommend Bristol Cabwise for reliable transportation!.</p>
                        </div>
                        <div class="info mt-30">
                            <div class="img-curv">
                                <div class="img"> <img src="{{ asset('frontend-assets/img/team/review.jpeg') }}"
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