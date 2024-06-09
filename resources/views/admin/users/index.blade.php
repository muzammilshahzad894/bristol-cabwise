@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center mb-4 flex-wrap">
        <h3 class="me-auto">Bookings</h3>
    </div>
    <div class="row">
        @include('partials.messages')
        <div class="col-xl-12">
            <div class="table-responsive" style="overflow-x: auto;">
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
                            <th>Status</th>
                            <th>Assign To</th>
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
                                    <td> <div class="max-content-display"> {{ $draft->pickup_location }}</div></td>
                                    <td> <div class="max-content-display"> {{ $draft->dropoff_location }}</div></td>
                                    <td> {{ $draft->total_price }}£</td>
                                    <td> {{ $draft->booking_date }}</td>
                                    <td> {{ $draft->booking_time }}</td>
                                    <td>
                                        @if($draft->status == 0)
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($draft->status == 1)
                                            <span class="badge bg-success">Confirmed</span>
                                        @else
                                            <span class="badge bg-danger">Rejected</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.confirm.assign', $draft->id) }}" method="POST" class="select_driver">
                                            @csrf
                                            <select name="assigned_to" class="form-control">
                                                <option value="">Select Driver</option>
                                                @foreach($drivers as $driver)
                                                    <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="btn btn-primary btn-sm">Assign</button>
                                        </form>
                                    </td>
                                    <td class="">
                                        <div class="accept_reject">
                                        @if($draft->status == 0)
                                        <form action="{{ route('admin.confirm.update', $draft->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="1">
                                            <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check"></i></button>
                                        </form>
                                        <form action="{{ route('admin.confirm.update', $draft->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="2">
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></button>
                                        </form>
                                        @endif
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