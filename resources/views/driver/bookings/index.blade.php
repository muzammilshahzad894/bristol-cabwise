@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center mb-4 flex-wrap">
        <h3 class="me-auto">Bookings</h3>
    </div>
    <div class="row">
        @include('partials.messages')
        <div class="col-xl-12">
            <div class="table-responsive">
                <table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table" id="example5">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone </th>
                            <th>Pickup </th>
                            <th>DropOff </th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($bookings->count())
                            @foreach($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->name }}</td>
                                    <td> {{ $booking->email }}</td>
                                    <td> {{ $booking->phone_number }}</td>
                                    <td> {{ $booking->pickup_location }}</td>
                                    <td> {{ $booking->dropoff_location }}</td>
                                    <td> {{ $booking->total_price }}£</td>
                                    <td> {{ $booking->booking_date }}</td>
                                    <td> {{ $booking->booking_time }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" class="text-center">No Records Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-3">
                {{ $bookings->links() }}
            </div>
        </div>
    </div>
</div>
@endsection