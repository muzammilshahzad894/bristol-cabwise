@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center mb-4 flex-wrap">
        <h3 class="me-auto">Draft</h3>
    </div>
    <div class="row">
        @include('partials.messages')
        <div class="col-xl-12">
            <div class="table-responsive">
                <table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table" id="example5">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone </th>
                            <th>Pickup </th>
                            <th>DropOff </th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($bookByAdmin ->count())
                            @foreach($bookByAdmin  as $draft)
                                <tr>
                                    <td>{{ $draft->name }}</td>
                                    <td> {{ $draft->email }}</td>
                                    <td> {{ $draft->phone_number }}</td>
                                    <td> {{ $draft->pickup_location }}</td>
                                    <td> {{ $draft->dropoff_location }}</td>
                                    <td> {{ $draft->total_price }}£</td>
                                    <td> {{ $draft->booking_date }}</td>
                                    <td> {{ $draft->booking_time }}</td>
                                    <td style="display: flex;justify-content:right">
                                     <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="editDraft({{ $draft->id }})">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">No Records Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-3">
                {{ $bookByAdmin->links() }}
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Booking Alert</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
            <div id="countdown">
                <div id="first_url " class="">
                    <p id="client_url"></p>
                    <button class="view_details" id="copy_btn" onclick="copyToClipboard()">Copy</button>
                </div>
                <div id="second_url " class="">
                    <p id="client_url_2"></p>
                    <button class="view_details" id="copy_btn" onclick="copyToClipboardsecond()">Copy</button>

                </div>
            </div>
        </div>

    </div>
</div>
</div>
<style>
     .modal-body {
        padding: 20px;
        background: #000;
    }
    .view_details {
        color: white;
        background: #ff8120;
        border: none;
        padding: 5px 10px;
        border-radius: 10px;
        width: 100%;
        text-align: center;
        cursor: pointer;
    }

    .view_details:hover {
        background: #ff8120;
        color: wheat;
        cursor: pointer;
    }
    .modal {
        background: rgb(0 0 0 / 48%);
    }

    .modal-header {
        background-color: orange;

    }

    #countdown h4 {
        color: orange;
        font-family: cursive;
    }

    #countdown {
        margin-bottom: 20px;
    }

    .coupon-code {
        margin-bottom: 20px;
    }

    .coupon-heading {
        font-size: 18px;
        margin-bottom: 10px;
    }
    .modal_style_p{
        display: none;
    }

    .coupon {
        font-size: 36px;
        color: #f00;
        /* Red color for emphasis */
    }

    .modal-footer {
        /* justify-content: center; */
        padding: 20px;
    }
</style>

<script>
    function editDraft(id) {
    var Debitcard = window.location.origin + '/client-booking-payment?payment_id=' + id;
    var paypal = window.location.origin + '/paypal/payment?id=' + id;
    document.getElementById("client_url").innerHTML = Debitcard;
    document.getElementById("client_url_2").innerHTML = paypal;
                       
    
    
    }
    function copyToClipboard() {
        var copyText = document.getElementById("client_url");
        copyText.select();
        copyText.setSelectionRange(0, 99999)
        document.execCommand("copy");
        alert("Copied the text: " + copyText.value);
    }

    function copyToClipboard() {
    var urlText = document.getElementById('client_url').innerText; // Get the URL text
    navigator.clipboard.writeText(urlText).then(function() {
        alert('URL copied to clipboard'); // Success
    }, function(err) {
        alert('Unable to copy URL'); // Error
    });
}
function copyToClipboardsecond() {
    var urlText = document.getElementById('client_url_2').innerText; // Get the URL text
    navigator.clipboard.writeText(urlText).then(function() {
        alert('URL copied to clipboard');
    }, function(err) {
    });
}
</script>



@endsection