@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('partials.messages')
        <div class="">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Emails</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="#" method="POST" id="emailForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Email Template <span class="text-danger">*</span></label>
                                    <select name="email_template" class="form-control" required>
                                        <option value="" selected disabled>Select Email Template</option>
                                        <option value="booking_confirmation">Booking Confirmation</option>
                                        <option value="booking_cancellation">Booking Cancellation</option>
                                        <option value="booking_reminder">Booking Reminder</option>
                                        <option value="thank_you_feedback">Thank You & Feedback</option>
                                    </select>
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

@section('scripts')
<script>
    $('#emailForm').submit(function (e) {
        e.preventDefault();
        $('#sendEmailBtn').html('Sending...').attr('disabled', true);
        var emailTemplate = $('select[name="email_template"]').val();

        if (emailTemplate == 'booking_confirmation') {
            sendBookingConfirmationEmail();
        }
        if(emailTemplate == 'booking_cancellation'){
            sendBookingCancellationEmail();
        }
        if(emailTemplate == 'booking_reminder'){
            sendBookingReminderEmail();
        }
        if(emailTemplate == 'thank_you_feedback'){
            sendThankYouFeedbackEmail();
        }
    });

    function sendBookingConfirmationEmail() {
        $.ajax({
            url: "{{ route('admin.emails.confirm-booking') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function (response) {
                if (response.status == 'success') {
                    alert(response.message);
                } else {
                    alert('Failed to send Booking Confirmation email');
                }
            },error: function (error) {
                alert('Something went wrong! Please try again later.')
            },complete: function () {
                $('#sendEmailBtn').html('Send Mail').attr('disabled', false);
            }
        });
    }

    function sendBookingCancellationEmail() {
        $.ajax({
            url: "{{ route('admin.emails.cancel-booking') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function (response) {
                if (response.status == 'success') {
                    alert(response.message);
                } else {
                    alert('Failed to send Booking Cancellation email');
                }
            },error: function (error) {
                alert('Something went wrong! Please try again later.')
            },complete: function () {
                $('#sendEmailBtn').html('Send Mail').attr('disabled', false);
            }
        });
    }

    function sendBookingReminderEmail() {
        $.ajax({
            url: "{{ route('admin.emails.reminder-booking') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function (response) {
                if (response.status == 'success') {
                    alert(response.message);
                } else {
                    alert('Failed to send Booking Reminder email');
                }
            },error: function (error) {
                alert('Something went wrong! Please try again later.')
            },complete: function () {
                $('#sendEmailBtn').html('Send Mail').attr('disabled', false);
            }
        });
    }

    function sendThankYouFeedbackEmail() {
        $.ajax({
            url: "{{ route('admin.emails.thank-you-feedback') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function (response) {
                if (response.status == 'success') {
                    alert(response.message);
                } else {
                    alert('Failed to send Thank You & Feedback email');
                }
            },error: function (error) {
                alert('Something went wrong! Please try again later.')
            },complete: function () {
                $('#sendEmailBtn').html('Send Mail').attr('disabled', false);
            }
        });
    }
</script>
@endsection