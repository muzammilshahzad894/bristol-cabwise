@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center mb-4 flex-wrap">
        <h3 class="me-auto">Refund Requests</h3>
    </div>
    <div class="row">
        @include('partials.messages')
        <div class="col-xl-12">
            <div class="table-responsive">
                <table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table" id="example5">
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Customer Name</th>
                            <th>Customer Email</th>
                            <th>Card Number</th>
                            <th>Bank Name</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($refunds->count())
                            @foreach($refunds as $refund)
                                <tr>
                                    <td>#{{ $refund->booking_id }}</td>
                                    <td>{{ $refund->user_name }}</td>
                                    <td>{{ $refund->user_email }}</td>
                                    <td>{{ $refund->card_number }}</td>
                                    <td>{{ $refund->bank_name }}</td>
                                    <td>{{ $refund->reason }}</td>
                                    <!-- pending = 0, approved = 1, rejected = 2, refunded = 3 -->
                                    <td>
                                        @if($refund->status == 0)
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($refund->status == 1)
                                            <span class="badge bg-info">Approved</span>
                                        @elseif($refund->status == 2)
                                            <span class="badge bg-danger">Rejected</span>
                                        @elseif($refund->status == 3)
                                            <span class="badge bg-success">Refunded</span>
                                        @endif
                                    </td>
                                    <td>{{ $refund->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm" onclick="editRefund({{ $refund }})"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this refund request?')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="9" class="text-center">No Records Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-3">
                {{ $refunds->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Refund Model -->
<div class="modal fade" id="refundModal" tabindex="-1" aria-labelledby="refundModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="refundModalLabel">Refund Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" id="refundForm">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="booking_id" class="form-label">Booking ID</label>
                            <input type="text" class="form-control" id="booking_id" name="booking_id" readonly disabled>
                            <input type="hidden" id="refund_id" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" id="status" name="status" onchange="statusChange()">
                                <option value="0">Pending</option>
                                <option value="1">Approved</option>
                                <option value="2">Rejected</option>
                                <option value="3">Refunded</option>
                            </select>
                            <p class="m-0 p-0 text-danger" id="status_error"></p>
                        </div>
                    </div>
                    <div class="row mb-3" id="amount_field">
                        <div class="col-md-12">
                            <label for="amount" class="form-label">Amount</label>
                            <div class="input-group">
                                <span class="input-group-text">£</span>
                                <input type="text" name="amount" class="form-control" placeholder="" oninput="validateDecimal(this)">
                            </div>
                            <p class="m-0 p-0 text-danger" id="amount_error"></p>
                        </div>
                    </div>
                    <div class="row mb-3" id="message_field">
                        <div class="col-md-12">
                            <label for="message" class="form-label">Message</label>
                            <textarea name="admin_message" class="form-control" id="message" rows="6"></textarea>
                            <p class="m-0 p-0 text-danger" id="message_error"></p>
                        </div>
                    </div>
                    <div class="row mb-3" id="content_option_field">
                        <div class="col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="use_pending_content" name="content_option" value="pending" onclick="setContent()">
                                <label class="form-check-label" for="use_pending_content">Use Pending Content</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="use_approved_content" name="content_option" value="approved" onclick="setContent()">
                                <label class="form-check-label" for="use_approved_content">Use Approved Content</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="use_reject_content" name="content_option" value="reject" onclick="setContent()">
                                <label class="form-check-label" for="use_reject_content">Use Reject Content</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="use_refund_content" name="content_option" value="refund" onclick="setContent()">
                                <label class="form-check-label" for="use_refund_content">Use Refund Content</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submit-btn">Save & Send Email</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function editRefund(refundData) {
        $('#booking_id').val('#'+refundData.booking_id);
        $('#refund_id').val(refundData.id);

        $('#status').val(refundData.status);
        $('input[name="content_option"]').prop('checked', false);
        $('#message').val(refundData.admin_message);

        if(refundData.status == 3 || refundData.status == 1) {
            $('#amount_field').show();
            $('#amount').val(refundData.amount);
        } else {
            $('#amount_field').hide();
        }
        $('#refundModal').modal('show');
    }

    function statusChange() {
        var status = $('#status').val();
        if(status == 3 || status == 1) {
            $('#amount_field').show();
        } else {
            $('#amount_field').hide();
        }
    }
    function setContent() {
        var content_option = $('input[name="content_option"]:checked').val();
        if(content_option == 'pending') {
            $('#message').val('Your refund request is pending.');
        } else if(content_option == 'approved') {
            $('#message').val('Your refund request has been approved.');
        } else if(content_option == 'refund') {
            $('#message').val('Your refund has been processed successfully.');
        } else {
            $('#message').val('Your refund request has been rejected.');
        }
    }

    $('#refundForm').submit(async function(e) {
        e.preventDefault();
        let validate = await validateForm();
        if(validate) {
            // show loading on submit button
            $('#submit-btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...').prop('disabled', true);
            let bookingId = $('#booking_id').val().replace('#', '');
            let refundId = $('#refund_id').val();
            
            $.ajax({
                url: `/admin/refunds/update/${refundId}`,
                type: 'POST',
                data: $('#refundForm').serialize() + '&booking_id=' + bookingId,
                success: function(response) {
                    if(response.status == 'success') { 
                        $('#refundModal').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message,
                        });
                    }
                },
                error: function(error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong, please try again later.',
                    });
                }
            }).always(function() {
                $('#submit-btn').html('Save & Send Email').prop('disabled', false);
            });
        }
    });

    async function validateForm() {
        var status = $('#status').val();
        var amount = $('#amount').val();
        var message = $('#message').val();

        let isValid = true;
        if (status == 3) {
            if (amount == '') {
                displayError('#amount_error', 'Amount is required');
                isValid = false;
            } else {
                displayError('#amount_error');
            }
        }
        if (message == '') {
            displayError('#message_error', 'Message is required');
            isValid = false;
        } else {
            displayError('#message_error');
        }
        return isValid;
    }

    function displayError(element, message) {
        if (message) {
            $(element).text(message);
        } else {
            $(element).text('');
        }
    }
    
    function validateDecimal(input) {
        // Remove any non-numeric characters except for a dot
        let value = input.value.replace(/[^0-9.]/g, '');

        // Ensure only one dot is allowed
        const dotIndex = value.indexOf('.');
        if (dotIndex !== -1) {
            value = value.slice(0, dotIndex + 1) + value.slice(dotIndex + 1).replace(/\./g, '');
        }

        // Update the input field value
        input.value = value;
    }
</script>
@endsection

@section('styles')
<style>
    .modal-dialog {
        max-width: 800px !important;
    }
    .modal-body {
        padding: 1.5rem !important;
        margin-bottom: 0px !important;
        padding-bottom: 0px !important;
    }
    .form-control:disabled {
        background-color: #ccd0d4 !important;
    }
    .modal-footer {
        padding: 0.5rem 1rem !important;
    }
</style>
@endsection