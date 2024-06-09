@extends('layouts.frontend.app')
<style>
    .booking-box{
        background: white !important;
    }
    .section-padding{
        padding: 60px 0;
    
    }
</style>
@section('content')
<section class="section-padding" style="display: flex; justify-content:center;">
    <div class="booking-box" style="max-width: 600px;background-color:rgba(255, 255, 255, 0.5);">
        <div class="booking-inner clearfix">
            <div class="form1 clearfix">
                <img src="{{ asset('frontend-assets/img/cancel.png') }}" alt="success" style="width: 100px; height: 100px; margin: 0 auto; display: block;">
                <h3 style="text-align: center;margin-top:15px;">Payment Cancel</h3>
                <p style="text-align: center;">Your Payment has been decline by the bank. Please try again. Thank you for booking with us.
                </p>
                <a href="{{ route('frontend.index') }}" class="previous_btn button-1 mt-15 mb-15"
                 style="display: block; margin: 0 auto;border:none;">Back to Home</a>
            </div>
        </div>
    </div>
</section>
@endsection

</html>
