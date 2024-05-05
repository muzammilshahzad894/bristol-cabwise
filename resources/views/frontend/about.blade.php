@extends('layouts.frontend.app')

@section('content')
<!-- Header Banner -->
<section class="banner-header section-padding bg-img" data-overlay-dark="4" data-background="{{ asset('frontend-assets/img/slider/3.jpg') }}">
    <div class="v-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h6>Rentax</h6>
                    <h1>About <span>Us</span></h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- divider line -->
<div class="line-vr-section"></div>
<!-- Team -->
<section class="team section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mb-30">
                <div class="section-subtitle">Certified Team</div>
                <div class="section-title">Our Experts Team</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme">
                    <div class="item"> <img src="{{ asset('frontend-assets/img/team/1.jpg') }}" class="img-fluid" alt="">
                        <div class="bottom-fade"></div>
                        <div class="butn icon-bg">
                            <a href="team-single.html" class="vid">
                                <div class="icon"> <i class="ti-info"></i> </div>
                            </a>
                            <div class="br-left-top">
                                <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
                                    <path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
                                </svg>
                            </div>
                            <div class="br-right-bottom">
                                <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
                                    <path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="title">
                            <h4>Dan Martin</h4>
                            <h6>Sales Consultant</h6>
                        </div>
                    </div>
                    <div class="item"> <img src="{{ asset('frontend-assets/img/team/4.jpg') }}" class="img-fluid" alt="">
                        <div class="bottom-fade"></div>
                        <div class="info">
                            <div class="butn icon-bg">
                                <a href="team-single.html" class="vid">
                                    <div class="icon"> <i class="ti-info"></i> </div>
                                </a>
                                <div class="br-left-top">
                                    <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
                                        <path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
                                    </svg>
                                </div>
                                <div class="br-right-bottom">
                                    <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
                                        <path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="title">
                                <h4>Emily Arla</h4>
                                <h6>Sales Consultant</h6>
                            </div>
                        </div>
                    </div>
                    <div class="item"> <img src="{{ asset('frontend-assets/img/team/5.jpg') }}" class="img-fluid" alt="">
                        <div class="bottom-fade"></div>
                        <div class="info">
                            <div class="butn icon-bg">
                                <a href="team-single.html" class="vid">
                                    <div class="icon"> <i class="ti-info"></i> </div>
                                </a>
                                <div class="br-left-top">
                                    <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
                                        <path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
                                    </svg>
                                </div>
                                <div class="br-right-bottom">
                                    <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
                                        <path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="title">
                                <h4>Oliva White</h4>
                                <h6>Sales Consultant</h6>
                            </div>
                        </div>
                    </div>
                    <div class="item"> <img src="{{ asset('frontend-assets/img/team/2.jpg') }}" class="img-fluid" alt="">
                        <div class="bottom-fade"></div>
                        <div class="butn icon-bg">
                            <a href="team-single.html" class="vid">
                                <div class="icon"> <i class="ti-info"></i> </div>
                            </a>
                            <div class="br-left-top">
                                <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
                                    <path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
                                </svg>
                            </div>
                            <div class="br-right-bottom">
                                <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
                                    <path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="title">
                            <h4>Margaret Nancy</h4>
                            <h6>Sales Department</h6>
                        </div>
                    </div>
                    <div class="item"> <img src="{{ asset('frontend-assets/img/team/6.jpg') }}" class="img-fluid" alt="">
                        <div class="bottom-fade"></div>
                        <div class="butn icon-bg">
                            <a href="team-single.html" class="vid">
                                <div class="icon"> <i class="ti-info"></i> </div>
                            </a>
                            <div class="br-left-top">
                                <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
                                    <path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
                                </svg>
                            </div>
                            <div class="br-right-bottom">
                                <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
                                    <path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="title">
                            <h4>Mia Jane</h4>
                            <h6>Finance Department</h6>
                        </div>
                    </div>
                    <div class="item"> <img src="{{ asset('frontend-assets/img/team/3.jpg') }}" class="img-fluid" alt="">
                        <div class="bottom-fade"></div>
                        <div class="butn icon-bg">
                            <a href="team-single.html" class="vid">
                                <div class="icon"> <i class="ti-info"></i> </div>
                            </a>
                            <div class="br-left-top">
                                <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
                                    <path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
                                </svg>
                            </div>
                            <div class="br-right-bottom">
                                <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
                                    <path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="title">
                            <h4>Micheal Brown</h4>
                            <h6>Sales Consultant</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection