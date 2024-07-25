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
        background: white;
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
        color: black;
        margin-bottom: 15px;
        display: none;
    }

    .faq-section:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px #ffc1074d;
        background: #f5b754;
    }

    h1 {
        color: white !important;
        text-align: center;
    }

    .cross {
        color: white;
        font-size: 29px !important;
        cursor: pointer;
        padding: 0 17px !important;
        background: #f5b754;
        border-radius: 50%;
        font-weight: 600 !important;
        transition: transform 0.2s ease;
        display: block !important;
    }

    .cross.active {
        transform: rotate(45deg);
        padding: -4px 0px !important;
    }

    @media (max-width: 768px) {
        .faq-section h2 {
            color: #333;
            font-size: 19px;
        }

        .container h1 {
            font-size: 31px !important;
        }
    }
</style>

@section('content')
    <div class="container">
        <h1>Bristol Cabwise FAQs</h1>

        @php
            $faqs = [
                [
                    'question' => 'What can I expect when booking a pick and drop service?',
                    'answer' =>
                        'Reliable, Professional & Convenient Service – When you book a pick and drop service with us, you can expect punctuality and professionalism. Our drivers will arrive on time, assist you with your luggage, and ensure a comfortable journey. They are trained to provide a seamless and stress-free experience from the moment you are picked up to your drop-off.',
                ],
                [
                    'question' => 'Are your drivers licensed and vetted?',
                    'answer' =>
                        'Yes, all our drivers are fully licensed and have undergone thorough background checks. They are vetted to ensure safety and reliability.',
                ],
                [
                    'question' => 'What type of vehicles do you use for pick and drop services?',
                    'answer' =>
                        'We offer a range of vehicles to suit your needs, including economy saloons, executive saloons, compact MPVs, 7-seater MPVs, executive MPVs, and 8-seater MPVs. All our vehicles are well-maintained, clean, and equipped with modern amenities for your comfort.',
                ],
                [
                    'question' => 'Can I request a specific driver?',
                    'answer' =>
                        'Yes, you can request a specific driver. Please inform us of your preference at the time of booking, and we will do our best to accommodate your request.',
                ],
                [
                    'question' => 'what payment method do you accept.',
                    'answer' =>
                        'We accept major credit and debit cards. Please check with us at the time of booking for any additional payment options available in your area.',
                ],
                [
                    'question' => 'Whats your availability and  operating hours of the business.',
                    'answer' =>
                        'Our services are available 24/7, ensuring they are delivered whenever you need them. For any inquiries, you can contact us via phone during our business hours, which vary according to our opening times. Outside of these hours, feel free to send us an email or message for assistance.',
                ],
                [
                    'question' => 'Are there refreshments available in the vehicle?',
                    'answer' =>
                        'We offer bottled water in select vehicles for specific fleets and services. Please note that not all vehicles adhere to our standard service, but you may request this amenity in advance, and we will make every effort to accommodate your needs.',
                ],
                [
                    'question' => 'How do I identify my driver for pick-up?',
                    'answer' =>
                        'For airport and scheduled pickups, your driver will meet you at the designated pickup point. If the pickup is at an airport, we will contact you to confirm the details. For meet-and-greet service, the driver will greet you at the arrivals hall with a signboard displaying your name and assist you to your vehicle.',
                ],
                [
                    'question' => 'Will the driver help with my luggage?',
                    'answer' =>
                        'Yes, our drivers are more than happy to assist you with your luggage, both at pick-up and drop-off points.',
                ],
                [
                    'question' => 'What if my flight is delayed?',
                    'answer' =>
                        'We monitor flight schedules to accommodate any delays. Your driver will be updated with the new arrival time and will adjust the pick-up accordingly.',
                ],
                [
                    'question' => 'Can I book a round trip or recurring pick and drop service?',
                    'answer' =>
                        'Absolutely. We offer round trips and recurring services for regular commuters. Please contact us to arrange your schedule and discuss any specific requirements.',
                ],
                [
                    'question' => 'Do you charge extra for waiting time? ',
                    'answer' =>
                        'Yes, additional charges may apply for waiting time, typically calculated based on the duration of the wait. For airport pickups, we offer up to 1 hour of complimentary waiting time after your flight lands. Beyond this, a charge of £0.30 per minute applies.',
                ],
                [
                    'question' => 'How much advance notice is required to cancel my booking? ',
                    'answer' => 'You may cancel your booking free of charge up to 24 hours before your scheduled pick-up time. Cancellations made within 24 hours of the scheduled pick-up time will incur a cancellation fee equivalent to 50% of the total booking amount.
                    If the driver has already been dispatched, the full amount of the booking will be charged, regardless of the cancellation time.',
                ],
                [
                    'question' => 'How do I make a booking?',
                    'answer' =>
                        'You can make a booking through our website, by phone, or via our mobile app. Simply provide your pick-up and drop-off details, and we will take care of the rest.',
                ],
            ];
        @endphp

        @foreach ($faqs as $faq)
            <section class="faq-section">
                <div class="d-flex align-items-center justify-content-between">
                    <h2>{{ $faq['question'] }}</h2>
                    <p class="cross" onclick="toggleAnswer(this)">
                        +
                    </p>
                </div>
                <p>{{ $faq['answer'] }}</p>
            </section>
        @endforeach

    </div>
@endsection

@section('scripts')
    <script>
        function toggleAnswer(element) {
            const answer = element.parentNode.nextElementSibling;
            if (answer.style.maxHeight === '0px' || !answer.style.maxHeight) {
                answer.style.display = 'block';
                answer.style.maxHeight = answer.scrollHeight + 'px';
                answer.style.padding = '10px 0';
                element.classList.add('active');
            } else {
                answer.style.maxHeight = '0px';
                answer.style.padding = '0';
                setTimeout(() => {
                    answer.style.display = 'none';
                }, 300);
                element.classList.remove('active');
            }
        }
    </script>
@endsection
