@extends('layouts.frontend.app')
<style>
    .booking-box{
        background: white !important;
    }
</style>
@section('content')
<section class="section-padding" style="display: flex; justify-content:center;">
    <div class="booking-box" style="max-width: 600px;background-color:rgba(255, 255, 255, 0.5);">
        <div class="booking-inner clearfix">
            <div class="form1 clearfix">
                <img src="{{ asset('frontend-assets/img/success.png') }}" alt="success" style="width: 100px; height: 100px; margin: 0 auto; display: block;">
                <h3 style="text-align: center;margin-top:15px;">Payment Successful</h3>
                <p style="text-align: center;">Your Payment has been successfully processed. Thank you for booking with us.You will receive an email confirmation shortly.
                </p>
                <a href="{{ route('frontend.index') }}" class="previous_btn button-1 mt-15 mb-15"
                 style="display: block; margin: 0 auto;border:none;">Back to Home</a>
            </div>
        </div>
    </div>
</section>
@endsection

</html>
