@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex flex-column mb-4">
        <h3 class="mb-3">Bookings </h3>
        <!-- Filters -->
        <div class="filter">
            <form action="{{ route('driver.bookings.index') }}" method="GET">
                <div class="filters-container">
                    <div class="filter-item">
                        <label for="date">From Date</label>
                        <input type="date" name="from_date" id="date" class="form-control" value="{{ request()->from_date }}">
                    </div>
                    <div class="filter-item">
                        <label for="date">To Date</label>
                        <input type="date" name="to_date" id="date" class="form-control" value="{{ request()->to_date }}">
                    </div>
                    <div class="filter-item">
                        <label for="from_time">From Time</label>
                        <input type="time" name="from_time" id="from_time" class="form-control" value="{{ request()->from_time }}">
                    </div>
                    <div class="filter-item">
                        <label for="to_time">To Time</label>
                        <input type="time" name="to_time" id="to_time" class="form-control" value="{{ request()->to_time }}">
                    </div>
                    <div class="filter-item">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="" selected>Select Status</option>
                            @foreach($statuses as $status)
                                <option value="{{ $status->id }}" {{ request()->status == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="filter-item">
                        <label for="sort">Sort</label>
                        <select name="sort" id="sort" class="form-control">
                            <option value="asc" {{ request()->sort != 'desc' ? 'selected' : '' }}>Ascending</option>
                            <option value="desc" {{ request()->sort == 'desc' ? 'selected' : '' }}>Descending</option>
                        </select>
                    </div>
                    <div class="filter-item">
                        <button type="submit" class="btn btn-primary mt-4">Filter</button>
                    </div>
                </div>
            </form>
        </div>
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
                            <th>Date</th>
                            <th>Time</th>
                            <th>Ride Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($bookings->count())
                            @foreach($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->name }}</td>
                                    <td>{{ $booking->email }}</td>
                                    <td>{{ $booking->phone_number }}</td>
                                    <td>{{ $booking->pickup_location }}</td>
                                    <td>{{ $booking->dropoff_location }}</td>
                                    <td>{{ formatDate($booking->booking_date) }}</td>
                                    <td>{{ foramtTime($booking->booking_time) }}</td>
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

@section('styles')
    <style>
        .filters-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .filter-item {
            flex: 0 0 150px;
        }

        .filter-item label {
            display: block;
            margin-bottom: 5px;
        }

        .filter-item input,
        .filter-item select {
            width: 100%;
        }

        .filter-item button {
            width: 100%;
        }

        @media (max-width: 350px) {
            .filter-item {
                flex: 1 1 100%;
            }

            .filter-item button {
                margin-top: 10px;
            }
        }
    </style>
@endsection