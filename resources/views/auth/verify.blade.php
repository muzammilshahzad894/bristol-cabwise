@extends('layouts.frontend.app')
<style>
    .card{
        width: 600px;
    background: rgba(255, 255, 255, 0.5);
    border-radius: 20px !important;
    padding: 20px 0px;
    }
    .form-control:focus{
        border-color:orange !important;
        color: white !important;
        background: black !important;
        box-shadow: none !important;
        border: 1px solid orange !important;

    }
    .form-control{
        color: white;
    }
    .booking-button:hover{
        background: black !important;
    color: white !important;
    }
    .btn-link{
        color: black !important;
    
    }
  
    .booking-box .box-shadow{
        display: flex;
        justify-content: center;
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center   booking-box">
        <div class="col-md-12 box-shadow">
            <div class="card">
                {{-- <div class="card-header">{{ __('Verify Your Email Address') }}</div> --}}
                 <h4 class="text-center" style="color: orange">
                    {{ __('Verify Your Email Address') }}
                 </h4>
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="booking-button mt-15">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
