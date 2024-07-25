@extends('layouts.admin.app')

@section('styles')
    <style>
        .tax-row {
            border: 2px solid #F89723;
            padding: 3px;
            border-radius: 8px;
            margin-bottom: 13px;
        }
    </style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('partials.messages')
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Coupon code:</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                      <form action="{{route('admin.coupons.store')}}" method="POST" enctype="multipart/form-data">
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
                                    <label class="form-label">Create Code:<span class="text-danger">*</span></label>
                                    <input type="text" name="code" class="form-control" placeholder="Code " value="{{ old('code') }}" required>
                                    @error('code')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Discount Percent:<span class="text-danger">*</span></label>
                                    <input type="text" name="discount" class="form-control" placeholder="Discount " value="{{ old('discount') }}" required>
                                    @error('discount')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Description:<span class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control" placeholder="Description" required>{{ old('description') }}</textarea>
                                    @error('discount')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Select date: <span class="text-danger">*</span></label>
                                    <input type="text" id="daterange" name="date" class="form-control" placeholder="Select date range" >
                                    @error('date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label
                                    ">Public or Private: <span class="text-danger">*</span></label>
                                    <select name="public" class="form-control" required>
                                        <option value="public">Public</option>
                                        <option value="private">Private</option>
                                    </select>
                                    @error('public')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label
                                    ">Coupon Type: <span class="text-danger">*</span></label>
                                    <select name="coupon_type" class="form-control" required>
                                        <option value="multiple">Multiple Persons</option>
                                        <option value="single">Single Person</option>
                                    </select>
                                    @error('coupon_type')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class=" col-md-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Save</button>
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

@section('scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<!-- Include Moment.js -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/moment/min/moment.min.js"></script>
<!-- Include Daterangepicker CSS and JS -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script type="text/javascript">
    $(function() {
        $('#daterange').daterangepicker({
            opens: 'left',
            autoUpdateInput: false,
            minDate: moment(), // Disable previous dates
            locale: {
                cancelLabel: 'Clear'
            }
        });
    
        $('#daterange').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
        });
    
        $('#daterange').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    });
    </script>
    

@endsection
