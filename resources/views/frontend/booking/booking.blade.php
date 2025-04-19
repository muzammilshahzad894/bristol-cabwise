@extends('layouts.frontend.app')

@section('css')
<style>
    .booking-container {
        background: #fff;
        padding-top: 60px;
        padding-bottom: 100px;
    }
</style>
@endsection

@section('content')
    <section class="banner-header section-padding bg-img" data-overlay-dark="4"
        data-background="{{ asset('frontend-assets/img/slider/booking_img2.jpeg') }}">
        <div class="v-middle">
            <div class="container">
                <div class="row design_style">
                    <div class="col-lg-6 col-md-12 mt-30">
                        <div class="post-wrapper">
                            {{-- <a href="index-2.html">
                                <div>Home</div>
                            </a>
                            <div class="divider"></div>
                            <div class="text-white"><a href="#">book online</a></div> --}}
                        </div>
                        <h1 style="color: orange">Book Your Ride</h1>
                        <p class="description" style="color: white;">Reserve your cab here. We provide a reliable 24-hour
                            cab service in Bristol and across the UK, featuring professional drivers and transparent
                            pricing. Experience hassle-free booking and exceptional service.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="booking-container">
        <iframe src="https://bristolcabwise.trial.easytaxioffice.com/booking?site_key=7e3f3d3085b900d598bc40543d611575" id="eto-iframe-booking" allow="geolocation" width="100%" height="250" scrolling="no" frameborder="0" style="width:1px; min-width:100%; border:0;"></iframe>
        <script src="https://bristolcabwise.trial.easytaxioffice.com/assets/plugins/iframe-resizer/iframeResizer.min.js"></script>
        <script>iFrameResize({log:false, targetOrigin:'*', checkOrigin:false}, "iframe#eto-iframe-booking");</script>
    </section>
@endsection

@section('scripts')
    
@endsection
