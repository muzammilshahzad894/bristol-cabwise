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
                {{-- <div class="card-header">{{ __('Reset Password') }}</div> --}}
                  <h4 class="text-center" style="color: orange">
                    {{ __('Reset Password') }}
                  </h4>
                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}

                            <div class="col-md-12">
                                <input id="email" placeholder="Email Address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> --}}

                            <div class="col-md-12">
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label> --}}

                            <div class="col-md-6">
                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12 offset-md-4">
                                <button type="submit" class="">
                                    {{ __('Reset Password') }}
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
