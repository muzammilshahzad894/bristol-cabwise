@extends('layouts.frontend.app')

@section('content')
    <style>
        .user-history {
            padding: 20px 0;
        }
        .card {
            border-radius: 10px;
            border: none;
        }
        .card-header {
            background-color: #f8941d; /* Darker shade for header */
        }
        .card-body {
            background-color:white !important; /* Lighter shade for body */
        }
    </style>

    <!-- User History -->
    <section class="user-history">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card bg-dark text-white">
                        <div class="card-header">
                            <h2 class="card-title">My Bookings</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Pickup</th>
                                            <th scope="col">Dropoff</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($booking_detail as $booking)
                                            <tr>
                                                <td>{{ $booking->name }}</td>
                                                <td>{{ $booking->email }}</td>
                                                <td>{{ $booking->phone_number }}</td>
                                                <td>{{ $booking->pickup_location }}</td>
                                                <td>{{ $booking->dropoff_location }}</td>
                                                <td>{{ $booking->booking_date }}</td>
                                                <td>{{ $booking->booking_time }}</td>
                                                @if($booking->status == 0)
                                                   
                                                    <td>Pending</td>
                                                @elseif($booking->status == 1)

                                                    <td>Accepted</td>
                                                @else
                                                    <td>Rejected</td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- User History -->
@endsection
