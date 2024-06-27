@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center mb-4 flex-wrap">
        <h3 class="me-auto">Block dates</h3>
        <div>
            <a href="{{ route('admin.block-dates.create') }}" class="btn btn-primary me-3 btn-sm"><i class="fas fa-plus me-2"></i>Add New</a>
        </div>
    </div>
    <div class="row">
        @include('partials.messages')
        <div class="col-xl-12">
            <div class="table-responsive">
                <table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table" id="example5">
                    <thead>
                        <tr>
                            <th>Event name </th>
                            <th>Date</th>
                            <th>From Time</th>
                            <th>To Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($dates->count())
                            @foreach($dates as $date)
                                <tr>
                                    <td>{{ $date->name }}</td>
                                    <td> {{ $date->date_range }}</td>
                                    <td>{{ $date->from_time ? foramtTime($date->from_time) : 'N/A' }}</td>
                                    <td>{{ $date->to_time ? foramtTime($date->to_time) : 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('admin.block-dates.edit', $date->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.block-dates.delete', $date->id) }}" 
                                        class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete, all related cars will be deleted?')"><i class="fas fa-trash"></i></a>
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
                {{ $dates->links() }}
            </div>
        </div>
    </div>
</div>
@endsection