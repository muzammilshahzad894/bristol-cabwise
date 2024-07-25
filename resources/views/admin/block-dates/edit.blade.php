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
                    <h4 class="card-title">Add Block Dates:</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                      <form action="{{ route('admin.block-dates.update', $date->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Event Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') ?? $date->name }}" required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Select date: <span class="text-danger">*</span></label>
                                    <input type="text" id="daterange" name="date_range" class="form-control" placeholder="Select date" value="{{ old('date_range') ?? $date->date_range }}" required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">From Time </label>
                                    <input type="time" name="from_time" class="form-control" value="{{ old('from_time') ?? $date->from_time }}">
                                    @error('from_time')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">To Time </label>
                                    <input type="time" name="to_time" class="form-control" value="{{ old('to_time') ?? $date->to_time }}">
                                    @error('to_time')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class=" col-md-12 d-flex">
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
    // Assuming you have the date range from the database
    // var dateRange = '{{ $dateRange ?? '' }}';
    var singleDate = '{{ $dateRange ?? '' }}';
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
    if (singleDate) {
        $('#daterange').val(formattedDate.format('YYYY-MM-DD'));
    }
    $('#daterange').on('apply.daterangepicker', function(ev, picker) {
        // $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
        $(this).val(picker.startDate.format('YYYY-MM-DD'));
    });

    // Clear the input value when the selection is canceled
    $('#daterange').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });
});



</script>

@endsection
