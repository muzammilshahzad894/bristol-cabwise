@extends('layouts.frontend.app')

@section('content')
<section class="section-padding" style="display: flex; justify-content:center;">
    <div class="booking-box" style="max-width: 600px;background-color:rgba(255, 255, 255, 0.5);">
        <div class="booking-inner clearfix">
            <form action="#0" class="form1 clearfix">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-center">Create New Account</h3>
                    </div>
                    <div class="col-md-12">
                        <label for="email">Name</label>
                        <input type="text" id="" name="name" placeholder="Name" required>
                    </div>
                    <div class="col-md-12">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="col-md-12">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="col-md-12 forget_section">
                        <a href=" {{ route('frontend.login') }}"
                        class="forget-password signup">Already have an account? Login</a>
                        </div>

                    <div class="col-md-12">
                        <button type="submit" class="booking-button mt-15" >Sign Up</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

</html>
