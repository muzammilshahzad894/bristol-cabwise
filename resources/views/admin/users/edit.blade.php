@extends('layouts.admin.app')
<style>
    .checkboxes {
        display: flex;
        align-items: center;
        flex-direction: row-reverse;
        justify-content: left;
        gap: 5px;
    }
    .checkboxes label{
        margin-bottom: 0px !important;
        font-size: 19px;
        cursor: pointer;
    
    }
    .checkboxes input {
        width: 20px;
        height: 30px;
    }
</style>

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('partials.messages')
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Booking</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('admin.confirm.bookingupdate', $booking->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">User Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') ?? $booking->name }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">User Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') ?? $booking->email }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">User Phone <span class="text-danger">*</span></label>
                                    <input type="text" name="phone_number" class="form-control" placeholder="Phone" value="{{ old('phone_number') ?? $booking->phone_number }}">
                                    @error('phone_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Other Name</label>
                                    <input type="text" name="other_name" class="form-control" placeholder="Other Name" value="{{ old('other_name') ?? $booking->other_name }}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Other Email</label>
                                    <input type="email" name="other_email" class="form-control" placeholder="Other Email" value="{{ old('other_email') ?? $booking->other_email }}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Other Phone</label>
                                    <input type="text" name="other_phone_number" class="form-control" placeholder="Other Phone" value="{{ old('other_phone_number') ?? $booking->other_phone_number }}">
                                </div>
                              
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Pickup Location</label>
                                    <input type="text" name="pickup_location" class="form-control" placeholder="Pickup Location" value="{{ old('pickup_location') ?? $booking->pickup_location }}" disabled>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Dropoff Location</label>
                                    <input type="text" name="dropoff_location" class="form-control" placeholder="Dropoff Location" value="{{ old('dropoff_location') ?? $booking->dropoff_location }}" disabled>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Booking Date</label>
                                    <input type="date" name="booking_date" class="form-control" placeholder="Booking Date" value="{{ old('booking_date') ?? $booking->booking_date }}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Booking Time</label>
                                    <input type="time" name="booking_time" class="form-control" placeholder="Booking Time" value="{{ old('booking_time') ?? $booking->booking_time }}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Fleet Name</label>
                                    @php 
                                        $fleet = \App\Models\Fleet::find($booking->fleet_id);
                                        $service = \App\Models\Service::find($booking->service_id);
                                    @endphp
                                    <input type="text" name="fleet_id" class="form-control" placeholder="Fleet ID" value="{{ old('fleet_id') ?? $fleet->name }}" disabled>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Service Name</label>
                                    <input type="text" name="service_id" class="form-control" placeholder="Service ID" value="{{ old('service_id') ?? $service->name }}" disabled>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Number of Passengers</label>
                                    <input type="number" name="no_of_passenger" class="form-control" placeholder="Number of Passengers" value="{{ old('no_of_passenger') ?? $booking->no_of_passenger }}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Number of Suitcases</label>
                                    <input type="number" name="no_suit_case" class="form-control" placeholder="Number of Suitcases" value="{{ old('no_suit_case') ?? $booking->no_suit_case }}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Summary</label>
                                    <textarea name="summary" class="form-control" placeholder="Summary">{{ old('summary') ?? $booking->summary }}</textarea>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Number of Luggage</label>
                                    <input type="number" name="no_of_laugage" class="form-control" placeholder="Number of Luggage" value="{{ old('no_of_laugage') ?? $booking->no_of_laugage }}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Flight Time</label>
                                    <input type="time" name="flight_time" class="form-control" placeholder="Flight Time" value="{{ old('flight_time') ?? $booking->flight_time }}" @if($booking->flight_name =="") disabled @endif>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Flight Name</label>
                                    <input type="text" name="flight_name" class="form-control" placeholder="Flight Name" value="{{ old('flight_name') ?? $booking->flight_name }}" @if($booking->flight_name =="") disabled @endif>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Flight Type</label>
                                    <input type="text" name="flight_type" class="form-control" placeholder="Flight Type" value="{{ old('flight_type') ?? $booking->flight_type }}" @if($booking->flight_name =="") disabled @endif>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Total Price</label>
                                    <input type="text" name="total_price" class="form-control" placeholder="Total Price" value="{{ old('total_price') ?? $booking->total_price }}">
                                </div>
                                @if($booking->is_draft == 1)
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="is_payment">Payment Status</label>
                                    <select name="is_payment" class="form-control">
                                        <option value="">Select Payment</option>
                                        <option value="0" {{ old('is_paid', $booking->is_payment) == 0 ? 'selected' : '' }}>Unpaid</option>
                                        <option value="1" {{ old('is_paid', $booking->is_payment) == 1 ? 'selected' : '' }}>Paid</option>
                                    </select>
                                </div>
                            @endif
                                <div class="mb-3 col-md-6 d-flex align-items-center">
                                    <div class="checkboxes">
                                    <label class="form-label">Extra Luggage</label>
                                    <input type="checkbox" name="is_extra_lauggage" value="1" {{ old('is_extra_lauggage') ?? $booking->is_extra_lauggage ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <div class="checkboxes">
                                        <label class="form-label" for="is_childseat"
                                        >Child Seat</label>
                                        <input type="checkbox" name="is_childseat" id="is_childseat" value="1" {{ old('is_childseat') ?? $booking->is_childseat ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <div class="checkboxes">
                                    <label class="form-label" for="is_meet_nd_greet"
                                    >Meet and Greet</label>
                                    <input type="checkbox" name="is_meet_nd_greet" value="1" id="is_meet_nd_greet"
                                     {{ old('is_meet_nd_greet') ?? $booking->is_meet_nd_greet ? 'checked' : '' }}>
                                    </div>
                                </div>
                               
                            

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
