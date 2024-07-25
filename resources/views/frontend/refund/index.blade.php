@extends('layouts.frontend.app')

@section('content')
<style>
    .card-header {
        background: rgb(245, 169, 29) !important;
        color: white !important;
        font-size: 21px !important;
        font-weight: 600px !important;
    }
    .side_card {
        height: 100% !important;
    }
    label {
        color: white;
        font-size: 21px;
    }
    .form-control {
        background: white !important;
    }
    .card-body {
        background-color: black !important;
    }
    .button-1 {
        width: 100% !important;
    }
    .table-responsive-scroll {
        overflow-x: auto;
    }
  
    
    @media (max-width: 768px) {
        .card {
            margin-top: 50px !important;
        }
        .order_2 {
            order: 2;
        }.section-title {
        text-align: center !important;
    }
    .section-padding {
        padding: 10px;
    }
    }
   

</style>

<section class="banner-header section-padding bg-img" data-overlay-dark="4"
data-background="{{ asset('frontend-assets/img/slider/booking_img.jpeg') }}">
<div class="v-middle">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 mt-30">
                <div class="post-wrapper">
                    <a href="index-2.html">
                        <div>Home</div>
                    </a>
                    <div class="divider"></div>
                    <div class="text-white"><a href="#">book online</a></div>
                </div>
                <h1>Refunds page.</h1>
            </div>
        </div>
    </div>
</div>
</section>


<div class="container section-padding">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <h4 class="section-title">Booking <span> Requests:</span></h4>
    <div class="row ">
        <div class="col-md-8 order_2">
            <div class="card ">
                <div class="card-header">Pending Bookings</div>
                <div class="">
                    @if($pending_bookings->isEmpty())
                        <p>No pending bookings found.</p>
                    @else
                        <div class="table-responsive-scroll">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Booking ID</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Pickup</th>
                                        <th scope="col">Dropoff</th>
                                        <th scope="col">Total Price</th>
                                        
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pending_bookings as $booking)
                                        <tr>
                                            <td>{{ $booking->id }}</td>
                                            <td>{{ $booking->booking_date }}</td>
                                            <td>{{ $booking->booking_time }}</td>
                                            <td>{{ $booking->pickup_location }}</td>
                                            <td>{{ $booking->dropoff_location }}</td>
                                            <td>{{ $booking->total_price }}£</td>
                                            @if($booking->status == 0)
                                                <td>Pending</td>
                                            @elseif($booking->status == 1)
                                                <td>Approved</td>
                                            @else
                                                <td>Rejected</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
            
    <h4 class="section-title">Refunds <span> Requests:</span></h4>


            <div class="card ">
                <div class="card-header">Refunds</div>
                <div class="">
                    @php 
                        $refunds = App\Models\Refund::where('user_id', Auth::user()->id)->get();
                    @endphp
                    @if($refunds->isEmpty())
                        <p>No pending bookings found.</p>
                    @else
                        <div class="table-responsive-scroll">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Booking ID</th>
                                        <th scope="col">UserName</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Bank Name</th>
                                        <th scope="col">Account Number</th>
                                        <th scope="col">Sort Code</th>
                                        <th scope="col">Reason</th>
                                        <th scope="col">Applied At</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($refunds as $booking)
                                        <tr>
                                            <td>{{ $booking->booking_id }}</td>
                                            <td>{{ $booking->user_name }}</td>
                                            <td>{{ $booking->user_email }}</td>
                                            <td>{{ $booking->bank_name }}</td>
                                            <td>{{ $booking->card_number }}</td>
                                            <td>{{ $booking->sort_code }}</td>
                                            <td>{{ $booking->reason }}</td>
                                            <td>{{ $booking->created_at }}</td>
                                            @if($booking->status == 0)
                                                <td>Pending</td>
                                            @elseif($booking->status == 1)

                                                <td>Approved</td>
                                            @else
                                                <td>Rejected</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mt-6 side_card">
                <div class="card-header">Refund Form</div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('frontend.refundRequest') }}">
                        @csrf
                        <div class="form-group">
                            <label for="booking_id">Booking ID</label>
                            <select class="form-control" id="booking_id" name="booking_id" required>
                                <option value="">Select Booking ID</option>
                                @foreach($pending_bookings as $booking)
                                    <option value="{{ $booking->id }}">{{ $booking->id }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="user_name">User Name</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" value="{{ old('user_name') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="bank_name">Bank Name</label>
                            <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{ old('bank_name') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="card_number">Sort Code</label>
                            <input type="text" class="form-control" id="sort_code" name="sort_code" value="{{ old('sort_code') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="account_number">Account Number</label>
                            <input type="number" class="form-control" id="account_number" name="account_number" value="{{ old('account_number') }}" required>
                        </div>
                       
                        <div class="form-group">
                            <label for="reason">Reason</label>
                            <textarea class="form-control" id="reason" name="reason" rows="3" required>{{ old('reason') }}</textarea>
                        </div>

                        <button type="submit" class="button-1 ">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    
    </div>
</div>
@endsection
