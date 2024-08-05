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
        th {
    min-width: 120px;
}
.location-box{
    min-width: 180px;
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
                                            <th scope="col">Via Locations</th>
                                            <th scope="col">Dropoff</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">Other Person Name</th>
                                            <th scope="col">Other Person Phone</th>
                                            <th scope="col">Other Person Email</th>
                                            <th scope="col">Service Type</th>
                                            <th scope="col">Fleet Type</th>
                                            <th scope="col">Child Seat</th>
                                            <th scope="col">Extra Luggage</th>
                                            <th scope="col">Flight Type</th>
                                            <th scope="col">Flight Name</th>
                                            <th scope="col">Flight Time</th>
                                            <th scope="col">Total Price</th>
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
                                            <td>
                                                @if($booking->via_locations)
                                                    @php
                                                        $viaLocations = json_decode($booking->via_locations, true);
                                                    @endphp
                                            
                                                    @if(is_array($viaLocations) && !empty($viaLocations))
                                                        @foreach($viaLocations as $index => $location)
                                                            <div class="location-container">
                                                                <div class="location-box">
                                                                    <strong>Location {{ $index + 1 }}:</strong>
                                                                    <p>{{ $location }}</p>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <p>No via locations</p>
                                                    @endif
                                                @else
                                                    <p>No via locations</p>
                                                @endif
                                            </td>
                                            
                                            
                                            <td>{{ $booking->dropoff_location }}</td>
                                            <td>{{ $booking->booking_date }}</td>
                                            <td>{{ $booking->booking_time }}</td>
                                            <td>{{ $booking->other_name }}</td>
                                            <td>{{ $booking->other_phone_number }}</td>
                                            <td>{{ $booking->other_email }}</td>
                        
                                            @php 
                                            $service = \App\Models\Service::find($booking->service_id);
                                            @endphp
                                            <td>{{ $service ? $service->name : 'Service Not Found' }}</td>
                        
                                            @php 
                                            $fleet = \App\Models\Fleet::find($booking->fleet_id);
                                            @endphp
                                            <td>{{ $fleet ? $fleet->name : 'Fleet Not Found' }}</td>
                        
                                            <td>
                                                @if($booking->child_seat == 1)
                                                <span class="badge badge-success">Yes</span>
                                                @else
                                                <span class="badge badge-danger">No</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($booking->extra_luggage == 1)
                                                <span class="badge badge-success">Yes</span>
                                                @else
                                                <span class="badge badge-danger">No</span>
                                                @endif
                                            </td>
                                            <td> @if($booking->flight_name != "")
                                                 {{-- {{ $booking->flight_type }} --}}
                                                 @if($booking->flight_type == 1)
                                                    <span class="badge badge-success">Arrival</span>
                                                @else
                                                    <span class="badge badge-danger">Departure</span>
                                                    @endif
                                                 @endif
                                                </td>
                                            <td>{{ $booking->flight_name }}</td>
                                            <td>{{ $booking->flight_time }}</td>
                                            <td>{{ $booking->total_price }}£</td>
                        
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
