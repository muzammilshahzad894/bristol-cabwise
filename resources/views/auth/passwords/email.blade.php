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
    label{
        color:black;
        font-weight: bold;
        font-size: 18px;
        margin-left: 10px;
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center booking-box">
        <div class="col-md-12 box-shadow">
            <div class="card">
                {{-- <div class="card-header">{{ __('Reset Password') }}</div> --}}
                  <h4 class="text-center" style="color: orange">
                    {{ __('Reset Password') }}
                  </h4>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class=" col-form-label ">{{ __('Email Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" placeholder="Email Address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="booking-button mt-15">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
