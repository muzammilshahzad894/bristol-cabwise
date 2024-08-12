@extends('layouts.frontend.app')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> --}}

<style>
    @media (max-width: 767px) {
       .button-1{
        padding : 14px 30px !important;
       }
       .button-2{
        padding : 14px 30px !important;
       }
    }
</style>
@section('content')
<!-- Header Banner -->
<section class="banner-header middle-height section-padding bg-img" data-overlay-dark="5" data-background="{{ asset('frontend-assets/img/slider/about.jpeg') }}">
    <div class="v-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h6>Get in touch</h6>
                    <h1>Contact <span>Us</span></h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Box -->
<div class="contact-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 animate-box" data-animate-effect="fadeInUp">
                <div class="item"> <span class="icon omfi-envelope"></span>
                    <h5>Email us</h5>
                   <a href="mailto:info@bristolcabwise.com"> <p>info@bristolcabwise.com</p> <i class="numb omfi-envelope"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 animate-box" data-animate-effect="fadeInUp">
                <div class="item"> <span class="icon omfi-location"></span>
                    <h5>Our address</h5>
                    <p>81 Blackberry Hill Bristol Bs161df</p> <i class="numb omfi-location"></i>
                </div>
            </div>
            {{-- <div class="col-lg-3 col-md-6 animate-box" data-animate-effect="fadeInUp">
                <div class="item"> <span class="icon ti-time"></span>
                    <h5>Opening Hours</h5>
                    <p>Open Hours 24/7</p> <i class="numb ti-time"></i>
                </div>
            </div> --}}
            <div class="col-lg-3 col-md-6 animate-box" data-animate-effect="fadeInUp">
                <div class="item active">
                    <!-- Phone icon with clickable link -->
                    <a href="tel:+441173322782">
                        <span class="icon omfi-phone"></span>
                        <h5>Call us</h5>
                        <p>0117 332 2782</p>
                    </a>
                    <i class="numb omfi-phone"></i>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 animate-box" data-animate-effect="fadeInUp">
                <div class="item active">
                    <!-- WhatsApp icon with clickable link -->
                    <a href="https://wa.me/447533225970" target="_blank">
                        <span class="fab fa-whatsapp"></span>
                        <h5>WhatsApp us</h5>
                        <p>+44 7533 225970</p>
                    </a>
                    <i class="numb fa fa-whatsapp"></i>
                </div>
            </div>
            
            
        </div>
    </div>
</div>
<!-- Contact -->
<section class="contact section-padding">
    <div class="container">
        <div class="row">
            <!-- Form -->
            <div class="col-lg-6 col-md-12 mb-30">
                <div class="form-box">
                    <h5>Get in touch</h5>
                    <form method="post" class="contact__form" action="https://duruthemes.com/demo/html/renax/dark/mail.php">
                        <!-- form message -->
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success contact__msg" style="display: none" role="alert"> Your message was sent successfully. </div>
                            </div>
                        </div>
                        <!-- form elements -->
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input name="name" type="text" placeholder="Your Name *" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <input name="email" type="email" placeholder="Your Email *" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <input name="phone" type="text" placeholder="Your Number *" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <input name="subject" type="text" placeholder="Subject *" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <textarea name="message" id="message" cols="30" rows="4" placeholder="Message *" required></textarea>
                            </div>
                            <div class="col-md-12">
                                <input name="submit" type="submit" value="Send Message">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Map -->
            <div class="col-lg-5 offset-lg-1 col-md-12">
                <h5>Location</h5>
                <div class="google-map">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24312.81061564066!2d-2.602046251494366!3d51.45451429765481!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48719c0a15db7f05%3A0x3d1d0c49b5b7e08d!2sBristol%2C%20UK!5e0!3m2!1sen!2suk!4v1646760525018!5m2!1sen!2suk" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- Lets Talk -->
<section class="lets-talk bg-img bg-fixed section-padding" data-overlay-dark="6" data-background="{{ asset('frontend-assets/img/slider/3.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h6>BOOK YOUR RIDE</h6>
                <h5>Interested in Booking?</h5>
                <p>Don't hesitate and send us a message.</p> <a href="https://wa.me/447533225970" class="button-1 mt-15 mb-15 mr-10"><i class="fa-brands fa-whatsapp"></i> WhatsApp</a> <a href="contact" class="button-2 mt-15 mb-15">Contact Us <span class="ti-arrow-top-right"></span></a>
            </div>
        </div>
    </div>
</section>
@endsection