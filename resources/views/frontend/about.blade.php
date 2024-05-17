@extends('layouts.frontend.app')
<style>
    .section-padding {
    padding: 70px 0px 0px 0px;
}
    @media (max-width: 767px) {
        .mobile_screen {
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }
    }
</style>
@section('content')
<!-- Header Banner -->
<section class="banner-header section-padding bg-img" data-overlay-dark="4" data-background="{{ asset('frontend-assets/img/slider/3.jpg') }}">
    <div class="v-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mobile_screen">
                    <h6>Bristol Cabwise</h6>
                    <h1>About <span>Us</span></h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about-us section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-subtitle"></div>
                <h4 class="section-title">*Pre-Booking Cab Service in Bristol and <span>Across the United Kingdom:</span></h4>
                <p>
                    Welcome to our premier pre-booking cab service, serving Bristol and cities across the United Kingdom. We offer a range of transportation solutions tailored to your needs, ensuring comfort, convenience, and reliability at affordable rates.
                </p>
            </div>
            <div class="d-flex text-center" style="width:100%; justify-content:center; padding:20px 0px">

                <h4 class="section-title">*Services<span> Offered:</span></h4>
            </div>
            <div class="col-md-12">
                <div class="section-subtitle"></div>
                <h4 class="section-title">**City-to-City<span> Tours::</span></h4>
                <p> Explore the beauty and diversity of the United Kingdom with our seamless city-to-city tour service. Whether you're planning a leisurely weekend getaway or a comprehensive exploration of multiple cities, our experienced drivers will take you there safely and comfortably.
                </p>
            </div>
            
            <div class="col-md-12">
                <div class="section-subtitle"></div>
                <h4 class="section-title">*Airport Pick and<span>Drop:</span></h4>
                <p>2. Start and end your journey stress-free with our dedicated airport pick and drop service. Our drivers track your flight's progress to ensure timely arrival and departure, providing a hassle-free experience for both domestic and international travelers.
                </p>
            </div>
            <div class="col-md-12">
                <div class="section-subtitle"></div>
                <h4 class="section-title">*Business and Corporate <span> Rides:</span></h4>
                <p>Make a lasting impression with our professional business and corporate ride service. Whether you're attending meetings, conferences, or corporate events, our fleet of executive vehicles and chauffeurs will uphold your company's image with punctuality and sophistication.
                </p>
            </div>
            <div class="col-md-12">
                <div class="section-subtitle"></div>
                <h4 class="section-title">*Events Car <span> Booking:</span></h4>
                <p>From weddings and parties to concerts and sporting events, we provide reliable transportation solutions for all your special occasions. Choose from our diverse range of vehicles, including luxury sedans, spacious SUVs, and elegant limousines, to suit the needs of your event and group size.
                </p>
            </div>
            <div class="col-md-12">
                <div class="section-subtitle"></div>
                <h4 class="section-title">*Family <span>Cars:</span></h4>
                <p>Travel comfortably with your loved ones in our family-friendly cars, equipped with ample space and modern amenities for a pleasant journey. Whether you're planning a weekend outing or a family vacation, our vehicles ensure safety and comfort for passengers of all ages.
                </p>
            </div>
            
            <div class="d-flex text-center" style="width:100%; justify-content:center; padding:20px 0px">
                <h4 class="section-title">*Why Choose <span>Us:</span></h4>
            </div>
        <div class="col-md-12">
            <div class="section-subtitle"></div>
            <h4 class="section-title">*Family <span>Cars:</span></h4>
            <p>Travel comfortably with your loved ones in our family-friendly cars, equipped with ample space and modern amenities for a pleasant journey. Whether you're planning a weekend outing or a family vacation, our vehicles ensure safety and comfort for passengers of all ages.
            </p>
        </div>
   
        <div class="col-md-12">
            <div class="section-subtitle"></div>
            <h4 class="section-title">*Low <span>Rates:</span></h4>
            <p>We offer competitive rates without compromising on the quality of service, making transportation accessible for all budgets.
            </p>
        </div>

        <div class="col-md-12">
            <div class="section-subtitle"></div>
            <h4 class="section-title">*Highly Professional <span>Staff:</span></h4>
            <p> Our team of experienced drivers undergo rigorous training and background checks to ensure professionalism, courtesy, and safety at all times.
            </p>
        </div>
        <div class="col-md-12">
            <div class="section-subtitle"></div>
            <h4 class="section-title">24/7 <span>Availability:</span></h4>
            <p>Whether you need a ride during peak hours or late at night, our services are available round-the-clock to accommodate your schedule and preferences.
            </p>
        </div>
        <div class="col-md-12">
            <div class="section-subtitle"></div>
            <h4 class="section-title">*Easy Booking<span> Process:</span></h4>
            <p>With our user-friendly booking platform, you can reserve your ride in advance with just a few clicks, eliminating the hassle of last-minute arrangements.
            </p>
            <p>Experience the ultimate convenience and comfort in transportation with our pre-booking cab service. Book your ride today and let us take you wherever you need to go in style and confidence.
            </p>
        </div>
    </div>

    </div>
</section>
<style>
    .first-footer{
        padding: 0px !important;
    }
    @media (max-width: 767px) {
       
        .section-title{
            font-size: 30px ;
        }
    }
</style>
@endsection