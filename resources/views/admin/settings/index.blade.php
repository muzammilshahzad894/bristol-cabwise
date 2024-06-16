@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('partials.messages')
        <div class="">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Settings</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <div class="d-flex align-items-center">
                                        <label class="form-label mb-0">Minimum Booking Hours <span class="text-danger">*</span></label>
                                        <i class="fa fa-info-circle ms-1" data-toggle="tooltip" data-placement="top" title="User can't book ride before given hours"></i>
                                    </div>
                                    <input type="number" name="min_booking_hours" class="form-control" placeholder="" value="{{ old('min_booking_hours', setting('min_booking_hours')) }}" required>
                                    @error('min_booking_hours')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <div class="d-flex align-items-center">
                                        <label class="form-label mb-0">Parking Charges <span class="text-danger">*</span></label>
                                        <i class="fa fa-info-circle ms-1" data-toggle="tooltip" data-placement="top" title="Parking charges will only apply to the Airport Transfer Service."></i>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text">£</span>
                                        <input type="number" name="parking_charges" class="form-control" placeholder="" value="{{ old('parking_charges', setting('parking_charges')) }}" required>
                                    </div>
                                    @error('parking_charges')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <div class="d-flex align-items-center">
                                        <label class="form-label mb-0">Extra Luggage Charges <span class="text-danger">*</span></label>
                                        <i class="fa fa-info-circle ms-1" data-toggle="tooltip" data-placement="top" title="Extra luggage charges will only apply if user need more luggage that are allowed in the fleet."></i>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text">£</span>
                                        <input type="number" name="extra_luggage_charges" class="form-control" placeholder="" value="{{ old('extra_luggage_charges', setting('extra_luggage_charges')) }}" required>
                                    </div>
                                    @error('extra_luggage_charges')
                                        <span class="text-danger">{{ $message }}</span>
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