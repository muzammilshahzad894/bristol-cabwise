@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('partials.messages')
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Email Content</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('admin.email-content-settings.update', $emailContentSetting->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Title" value="{{ $emailContentSetting->title }}" disabled>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Subject <span class="text-danger">*</span></label>
                                    <input type="text" name="subject" class="form-control" placeholder="Subject" value="{{ old('subject') ? old('subject') : $emailContentSetting->subject }}" required>
                                    @error('subject')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Introductory Message <span class="text-danger">*</span></label>
                                    <textarea name="introductory_message" class="form-control mceEditor" rows="7" placeholder="Introductory Message" required>{{ old('introductory_message') ? old('introductory_message') : $emailContentSetting->introductory_message }}</textarea>
                                    @error('introductory_message')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Note <span class="text-danger">*</span></label>
                                    <textarea name="note" class="form-control mceEditor" rows="7" placeholder="Note" required>{{ old('note') ? old('note') : $emailContentSetting->note }}</textarea>
                                    @error('note')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Closing Text <span class="text-danger">*</span></label>
                                    <textarea name="closing_text" class="form-control mceEditor" rows="7" placeholder="Closing Text" required>{{ old('closing_text') ? old('closing_text') : $emailContentSetting->closing_text }}</textarea>
                                    @error('closing_text')
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
</div>
@endsection