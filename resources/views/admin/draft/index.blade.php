@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex flex-column mb-4">
        <h3 class="me-auto">Draft Bookings</h3>
        <!-- Filters -->
        <div class="filter">
            <form action="{{ route('admin.draft.index') }}" method="GET">
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
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($draftUsers->count())
                            @foreach($draftUsers as $draft)
                                <tr>
                                    <td>{{ $draft->name }}</td>
                                    <td> {{ $draft->email }}</td>
                                    <td> {{ $draft->phone_number }}</td>
                                    <td> <div class="max-content-display">{{ $draft->pickup_location }} </div></td>
                                    <td> <div class="max-content-display">{{ $draft->dropoff_location }} </div></td>
                                    <td> £{{ $draft->total_price }}</td>
                                    <td> {{ formatDate($draft->booking_date) }}</td>
                                    <td> {{ foramtTime($draft->booking_time) }}</td>
                                    <td class="text-nowrap">
                                        <div class="btn-group" role="group" aria-label="Action Buttons">
                                            <a href="{{ route('admin.draft.delete', $draft->id) }}" class="btn btn-danger btn-sm mx-sm-1" onclick="return confirm('Are you sure to delete this draft booking?')"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">No Records Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-3">
                {{ $draftUsers->links() }}
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