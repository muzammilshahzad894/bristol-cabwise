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
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Naeme" value="{{ old('name') ?? $service->name }}">
                                @error('type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Tag <span class="text-danger">*</span></label>
                                <input type="text" name="tag" class="form-control" placeholder="Naeme" value="{{ old('tag') ?? $service->tag }}">
                                @error('tag')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Short Description <span class="text-danger">*</span></label>
                                <textarea name="short_description" class="form-control" rows="5" placeholder="Short Description">{{ old('short_description') ?? $service->short_description }}</textarea>
                                @error('short_description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Image <span class="text-danger">*</span></label>
                                <input type="file" name="image" class="form-control" placeholder="Image" value="{{ old('image') }}">
                                <img src="{{ asset('uploads/services/'.$service->image) }}" alt="{{ $service->image }}" class="img-fluid mt-3" width="70">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <hr>
                            <!-- Detail Page section -->
                            <h4>Detail Page Data</h4>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Detail Page Tag <span class="text-danger">*</span></label>
                                <input type="text" name="detail_page_tag" class="form-control" placeholder="Detail Page Tag" value="{{ old('detail_page_tag') ?? $service->detail_page_tag }}">
                                @error('detail_page_tag')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Detail Page First Heading <span class="text-danger">*</span></label>
                                <input type="text" name="detail_page_first_heading" class="form-control" placeholder="Detail Page First Heading" value="{{ old('detail_page_first_heading') ?? $service->detail_page_first_heading }}">
                                @error('detail_page_first_heading')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Detail Page Second Heading <span class="text-danger">*</span></label>
                                <input type="text" name="detail_page_second_heading" class="form-control" placeholder="Detail Page Second Heading" value="{{ old('detail_page_second_heading') ?? $service->detail_page_second_heading }}">
                                @error('detail_page_second_heading')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Detail Page Description <span class="text-danger">*</span></label>
                                <textarea name="detail_page_description" class="form-control" rows="5" placeholder="Detail Page Description">{{ old('detail_page_description') ?? $service->detail_page_description }}</textarea>
                                @error('detail_page_description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Detail Page Features <span class="text-danger">*</span></label>
                                <input type="text" data-role="tagsinput" name="detail_page_features" class="form-control" placeholder="Detail Page Features" value="{{ old('detail_page_features') ?? $service->detail_page_features }}">
                                @error('detail_page_features')
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