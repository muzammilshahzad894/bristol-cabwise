@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('partials.messages')
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add New Car</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Image <span class="text-danger">*</span></label>
                                    <input type="file" name="image" class="form-control" placeholder="Image" value="{{ old('image') }}" required>
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Max Passengers <span class="text-danger">*</span></label>
                                    <input type="number" name="max_passengers" class="form-control" placeholder="Max Passengers" value="{{ old('max_passengers') }}" required>
                                    @error('max_passengers')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Max Suitecases <span class="text-danger">*</span></label>
                                    <input type="number" name="max_suitecases" class="form-control" placeholder="Max Suitecases" value="{{ old('max_suitecases') }}" required>
                                    @error('max_suitecases')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Max Hand Luggage <span class="text-danger">*</span></label>
                                    <input type="number" name="max_hand_luggage" class="form-control" placeholder="Max Hand Luggage" value="{{ old('max_hand_luggage') }}" required>
                                    @error('max_hand_luggage')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection