@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('partials.messages')
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Service</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Naeme" value="{{ old('name') ?? $service->name }}">
                                @error('type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea name="description" class="form-control" rows="5" placeholder="Description">{{ old('description') ?? $service->description }}</textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image <span class="text-danger">*</span></label>
                                <input type="file" name="image" class="form-control" placeholder="Image" value="{{ old('image') }}">
                                <img src="{{ asset('uploads/services/'.$service->image) }}" alt="{{ $service->image }}" class="img-fluid mt-3" width="70">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection