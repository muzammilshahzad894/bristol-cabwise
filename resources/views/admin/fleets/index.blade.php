@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center mb-4 flex-wrap">
        <h3 class="me-auto">Our Fleets</h3>
        <div>
            <a href="{{ route('admin.fleets.create') }}" class="btn btn-primary me-3 btn-sm"><i class="fas fa-plus me-2"></i>Add New</a>
        </div>
    </div>
    <div class="row">
        @include('partials.messages')
        <div class="col-xl-12">
            <div class="table-responsive">
                <table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table" id="example5">
                    <thead>
                        <tr>
                            <th>Fleet Name</th>
                            <th>Image</th>
                            <th>Price <small>(per mile)</small></th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($fleets->count())
                            @foreach($fleets as $fleet)
                                <tr>
                                    <td>{{ $fleet->name }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/fleets/'.$fleet->image) }}" alt="{{ $fleet->image }}" class="img-fluid" width="70">
                                    </td>
                                    <td>£{{ $fleet->price }}</td>
                                    <td>
                                        <a href="{{ route('admin.fleets.edit', $fleet->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.fleets.delete', $fleet->id) }}"
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
                {{ $fleets->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
