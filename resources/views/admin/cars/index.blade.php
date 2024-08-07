@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center mb-4 flex-wrap">
        <h3 class="me-auto">Car List</h3>
        <div>
            <a href="{{ route('admin.cars.create') }}" class="btn btn-primary me-3 btn-sm"><i class="fas fa-plus me-2"></i>Add New</a>
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
                            <th>Image</th>
                            <th>Max Passengers</th>
                            <th>Max Suitecases</th>
                            <th>Max Hand Luggage</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($cars->count())
                            @foreach($cars as $car)
                                <tr>
                                    <td>{{ $car->name }}</td>
                                    <td><img src="{{ asset('uploads/cars/'.$car->image) }}" alt="{{ $car->type }}" class="img-fluid" width="70"></td>
                                    <td>{{ $car->max_passengers }}</td>
                                    <td>{{ $car->max_suitecases }}</td>
                                    <td>{{ $car->max_hand_luggage }}</td>
                                    <td>
                                        <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.cars.delete', $car->id) }}" 
                                        class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')"><i class="fas fa-trash"></i></a>
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
                {{ $cars->links() }}
            </div>
        </div>
    </div>
</div>
@endsection