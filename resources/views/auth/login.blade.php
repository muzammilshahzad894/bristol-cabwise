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

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="col-md-12">
                        <h3 class="text-center" style="color: orange">Create New Account</h3>
                    </div>

                        <div class="row ">
                            <div class="col-md-12">
                                <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-12">
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12" style="display: flex;align-items:center; justify-content:space-between;">
                                <div class="form-check">
                                    <div style="display: none">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" checked >

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>

                                    </div>
                                    <a href="/register"
                                    class="forget-password signup">Don't have an account? Sign up</a>
                                    
                                </div>
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12">
                                {{-- <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button> --}}
                                <button type="submit" class="booking-button mt-15" > {{ __('Login') }}</button>

                             
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
