@extends('layouts.app')
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
                <div class="card-header">{{ __('Confirm Password') }}</div>

                <div class="card-body">
                    {{ __('Please confirm your password before continuing.') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
