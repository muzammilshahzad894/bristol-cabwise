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
                            <th>Ride Status</th>
                            <th>Wait</th>
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
                                    <td> £{{ $booking->total_price }}</td>
                                    <td> {{ $booking->booking_date }}</td>
                                    <td> {{ $booking->booking_time }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php
                                                $status = App\Models\Status::find($booking->status_id);
                                            ?>
                                            {{ $status->name }}
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                @foreach($statuses as $status)
                                                    <li><a class="dropdown-item" href="{{ route('driver.booking.status', ['booking' => $booking->id, 'status' => $status->id]) }}">{{ $status->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('driver.booking.wait', $booking->id) }}" class="btn btn-primary btn-sm">Wait</a>
                                    </td>
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