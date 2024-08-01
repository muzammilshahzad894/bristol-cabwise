@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('partials.messages')
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add New Email</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('admin.email-settings.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">User Name <span class="text-danger">*</span></label>
                                    <input type="text" name="user_name" class="form-control" placeholder="User Name" value="{{ old('user_name') }}" required>
                                    @error('user_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">User Email <span class="text-danger">*</span></label>
                                    <input type="email" name="user_email" class="form-control" placeholder="User Email" value="{{ old('user_email') }}" required>
                                    @error('user_email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-12">
                                    <label class="form-label">Receiving Emails <span class="text-danger">*</span></label>
                                    <div class="row">
                                        @foreach($sendingEmailList as $list)
                                            <div class="col-md-3 mt-2 mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="receiving_emails[]" value="{{ $list->label }}" id="{{ $list->label }}">
                                                    <label class="form-check" for="{{ $list->label }}">
                                                        {{ $list->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('receiving_emails')
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