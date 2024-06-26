@extends('layouts.frontend.app')

    <style>
    
        .container {
        width: 80%;
        margin: auto;
        overflow: hidden;
    }
    header {
        background: #333;
        color: #fff;
        padding-top: 30px;
        min-height: 70px;
        border-bottom: #0779e4 3px solid;
    }
    header a {
        color: #fff;
        text-decoration: none;
        text-transform: uppercase;
        font-size: 16px;
    }
    header ul {
        padding: 0;
        list-style: none;
    }
    header li {
        display: inline;
        padding: 0 20px 0 20px;
    }
    header #branding {
        float: left;
    }
    header #branding h1 {
        margin: 0;
    }
    header nav {
        float: right;
        margin-top: 10px;
    }
    .faq-section {
        background: #f5b754;
        padding: 10px;
        margin: 10px 0;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px !important;
        color: white;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .faq-section h2 {
        color: #333;
    }
    .faq-section p {
        font-family: 'Outfit', sans-serif;
        font-size: 14px;
        font-weight: 300;
        line-height: 1.95em;
        color: white;
        margin-bottom: 15px;
    }
    .faq-section:hover {
        transform: translateY(-5px);

        box-shadow: 0 10px 20px #ffc1074d;
    }
    h1{
        color: white !important;
        text-align: center;

    }
</style>
    </style>
    
@section('content')

   

    <div class="container">
        <h1>Bristol Cabwise FAQs</h1>
        <section class="faq-section">
            <h2>What can I expect when booking a pick and drop service?</h2>
            <p>Reliable, Professional & Convenient Service – When you book a pick and drop service with us, you can expect punctuality and professionalism. Our drivers will arrive on time, assist you with your luggage, and ensure a comfortable journey. They are trained to provide a seamless and stress-free experience from the moment you are picked up to your drop-off.</p>
        </section>

        <section class="faq-section">
            <h2>Are your drivers licensed and vetted?</h2>
            <p>Yes, all our drivers are fully licensed and have undergone thorough background checks. They are vetted to ensure safety and reliability.</p>
        </section>

        <section class="faq-section">
            <h2>What type of vehicles do you use for pick and drop services?</h2>
            <p>We use a variety of vehicles to cater to your needs, including sedans, SUVs, and vans. All our vehicles are well-maintained, clean, and equipped with modern amenities for your comfort.</p>
        </section>

        <section class="faq-section">
            <h2>How do your drivers dress?</h2>
            <p>Our drivers maintain a professional appearance, typically wearing a uniform or smart casual attire.</p>
        </section>

        <section class="faq-section">
            <h2>Do your vehicles have in-car WiFi?</h2>
            <p>Yes, all our vehicles are equipped with in-car WiFi. You can stay connected during your journey by requesting the login details from your driver.</p>
        </section>

        <section class="faq-section">
            <h2>Are there refreshments available in the vehicle?</h2>
            <p>Yes, we provide bottled water in all our vehicles. If you have any specific requests for refreshments, please let us know in advance, and we will do our best to accommodate them.</p>
        </section>

        <section class="faq-section">
            <h2>How do I identify my driver for pick-up?</h2>
            <p>For airport pickups or other scheduled pick-ups, your driver will meet you at the designated location holding a sign with your name on it. If preferred, we can arrange for custom signboards with your company logo or specific instructions.</p>
        </section>

        <section class="faq-section">
            <h2>Will the driver help with my luggage?</h2>
            <p>Yes, our drivers are more than happy to assist you with your luggage, both at pick-up and drop-off points.</p>
        </section>

        <section class="faq-section">
            <h2>What if my flight is delayed?</h2>
            <p>We monitor flight schedules to accommodate any delays. Your driver will be updated with the new arrival time and will adjust the pick-up accordingly.</p>
        </section>

        <section class="faq-section">
            <h2>Can I book a round trip or recurring pick and drop service?</h2>
            <p>Absolutely. We offer round trips and recurring services for regular commuters. Please contact us to arrange your schedule and discuss any specific requirements.</p>
        </section>

        <section class="faq-section">
            <h2>How do I make a booking?</h2>
            <p>You can make a booking through our website, by phone, or via our mobile app. Simply provide your pick-up and drop-off details, and we will take care of the rest.</p>
        </section>
    </div>
    @endsection
