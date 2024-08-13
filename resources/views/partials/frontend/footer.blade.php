<style>
    .custom_icon_list li{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .custom_icon_list{
        display: flex;
    }
</style>

<footer class="footer clearfix">
    <div class="container">
        <!-- first footer -->
        <div class="first-footer">
            <div class="row">
                <div class="col-md-12">
                    <div class="links dark footer-contact-links">
                        <div class="footer-contact-links-wrapper">
                            <div class="footer-contact-link-wrapper">
                                <div class="image-wrapper footer-contact-link-icon">
                                    <a  href="tel:01173322782">   <div class="icon-footer">  <i class="flaticon-phone-call"></i> </div></a>
                                </div>
                                <!-- <h5><a href="tel:01173322782">01173322782</a></h5> -->
                                <div class="footer-contact-link-content">
                                    <h6>Call us</h6>
                                    <p><a href="tel:01173322782"> 01173322782 </a></p>
                                </div>
                            </div>
                            <div class="footer-contact-links-divider"></div>
                            <div class="footer-contact-link-wrapper">
                                <div class="image-wrapper footer-contact-link-icon">
                                    <a href="mailto:info@bristolcabwise.com" ><div class="icon-footer"> <i class="omfi-envelope"></i> </div></a>
                                </div>
                                <div class="footer-contact-link-content">
                                    <h6>Write to us</h6>
                                    <p> <a href="mailto:info@bristolcabwise.com" >info@bristolcabwise.com</a></p>
                                </div>
                            </div>
                            <div class="footer-contact-links-divider"></div>
                            <div class="footer-contact-link-wrapper">
                                <div class="image-wrapper footer-contact-link-icon">
                                    <div class="icon-footer"> <i class="omfi-location"></i> </div>
                                </div>
                                <div class="footer-contact-link-content">
                                    <h6>Address</h6>
                                    <p>81 Blackberry Hill
                                        Bristol
                                        Bs161df</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- second footer -->
        <div class="second-footer">
            <div class="row">
                <!-- about & social icons -->
                <div class="col-md-4 widget-area">
                    <div class="widget clearfix">
                        <div class="footer-logo">
                            <h2>Bristol  <span style="margin-left: 5px;"> Cabwise</span>
                            </h2>
                        </div>

                        <!-- <div class="footer-logo"><h2>CARE<span>X</span></h2></div> -->
                        <div class="widget-text">
                            <p>Book a service with us to ensure smooth and comfortable travel.</p>
                            <div class="social-icons">
                                <ul class="list-inline custom_icon_list">
                                    <li><a href="#"><i class="fa-brands fa-whatsapp"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- quick links -->
                <div class="col-md-3 offset-md-1 widget-area">
                    <div class="widget clearfix usful-links">
                        <h3 class="widget-title">Quick Links</h3>
                        <ul>
                            <li><a href="{{ route('frontend.index') }}">Home</a></li>
                            <li><a href="{{ route('frontend.about') }}">About</a></li>
                            <li><a href="{{ route('frontend.services') }}">Services</a></li>
                            <li><a href="{{ route('frontend.contact') }}">Contact</a></li>
                            <li><a class="nav-link"  href="{{ route('frontend.trustVoilet') }}">Reviews</a></li>
                            <li><a href="{{ route('frontend.faqs') }}">FAQs</a></li>
                            <li><a href="{{ route('frontend.termCondition') }}">Term and Condition</a></li>
                            <!-- <li><a href="{{ route('frontend.services') }}" class="booking_online_btn">Book Now</a></li> -->
                        </ul>
                    </div>
                </div>
                <!-- subscribe -->
                <div class="col-md-4 widget-area">
                    <div class="widget clearfix">
                        <h3 class="widget-title">Subscribe</h3>
                        <p>Want to be notified about our services. Just sign up and we'll send you a notification by email.</p>
                        <div class="widget-newsletter">
                            <form action="#">
                                <input type="email" placeholder="Email Address" required>
                                <button type="submit"><i class="ti-arrow-top-right"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- bottom footer -->
        <div class="bottom-footer-text">
            <div class="row copyright">
                <div class="col-md-12">
                    <p class="mb-0">&copy;2024 <a href="#">Bristol cabwise</a>. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
