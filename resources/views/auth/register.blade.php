@extends('layouts.frontend.app')
<style>
    .card{
        width: 600px;
    background: rgba(255, 255, 255, 0.5);
    border-radius: 20px !important;
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

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="col-md-12">
                            <h3 class="text-center" style="color: orange;">Create New Account</h3>
                        </div>
                        <div class="row ">
                            <div class="col-md-12">
                            {{-- <label for="name" class="col-md-4 col-form-label">{{ __('Name') }}</label> --}}

                                <input id="name" placeholder="Enter Your Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                            {{-- <label for="email" class="col-md-4 col-form-label">{{ __('Email Address') }}</label> --}}

                                <input id="email" placeholder="Enter Your Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                            {{-- <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label> --}}

                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                            {{-- <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label> --}}

                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="col-md-12 forget_section">
                            <a href="/login"
                            class="forget-password signup">Already have an account? Login</a>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12 ">
                                <button type="submit" class="booking-button mt-15" > {{ __('Register') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
