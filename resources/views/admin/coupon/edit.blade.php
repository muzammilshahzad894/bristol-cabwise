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
                    <h4 class="card-title">Update Coupon Code:</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                      <form action="{{ route('admin.coupons.update', $date->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{$date->name ?? ''}}"
                                     required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Coupon Code <span class="text-danger">*</span></label>
                                    <input type="text" name="code" class="form-control" placeholder="Code" value="{{$date->code ?? ''}}"
                                     required>
                                    @error('code')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Discount<span class="text-danger">*</span></label>
                                    <input type="text" name="discount" class="form-control" placeholder="Discount" value="{{$date->discount ?? ''}}"
                                     required>
                                    @error('discount')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Description <span class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control" placeholder="Description" required>{{$date->description ?? ''}}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Select date: <span class="text-danger">*</span></label>
                                    <input type="text" id="daterange" name="date" class="form-control" placeholder="Select date range" value="{{$date->date?? ''}}" required>
                                    @error('date')
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
    // Assuming you have the single date from the database
    var singleDate = '{{ $dateRange ?? '' }}';

    // Format the single date for the date picker
    var formattedDate = singleDate ? moment(singleDate, 'YYYY-MM-DD') : moment();

    $('#daterange').daterangepicker({
        singleDatePicker: true, // Set single date picker
        opens: 'left',
        autoUpdateInput: false,
        minDate: moment(), // Disable previous dates
        startDate: formattedDate,
        locale: {
            cancelLabel: 'Clear'
        }
    });

    // Set the input value to the formatted date
    if (singleDate) {
        $('#daterange').val(formattedDate.format('YYYY-MM-DD'));
    }

    // Update the input value when a new date is applied
    $('#daterange').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('YYYY-MM-DD'));
    });

    // Clear the input value when the selection is canceled
    $('#daterange').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });
});




</script>

@endsection
