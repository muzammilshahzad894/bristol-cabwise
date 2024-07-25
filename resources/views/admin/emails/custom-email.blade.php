@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('partials.messages')
        <div class="">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Send Email</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('admin.custom-email.send') }}" method="POST" id="emailForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">User Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">User Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" required>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Subject <span class="text-danger">*</span></label>
                                    <input type="text" name="subject" class="form-control" required>
                                    @error('subject')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Message <span class="text-danger">*</span></label>
                                    <textarea name="message" class="form-control" rows="5" required></textarea>
                                    @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="sendEmailBtn">Send Mail</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection