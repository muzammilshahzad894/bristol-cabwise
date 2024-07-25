@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex flex-column mb-4">
        <h3 class="me-auto">Draft Bookings</h3>
        <!-- Filters -->
        <div class="filter">
            <form action="{{ route('admin.draft.index') }}" method="GET">
                <div class="filters-container">
                    <div class="filter-item">
                        <label for="date">From Date</label>
                        <input type="date" name="from_date" id="date" class="form-control" value="{{ request()->from_date }}">
                    </div>
                    <div class="filter-item">
                        <label for="date">To Date</label>
                        <input type="date" name="to_date" id="date" class="form-control" value="{{ request()->to_date }}">
                    </div>
                    <div class="filter-item">
                        <label for="from_time">From Time</label>
                        <input type="time" name="from_time" id="from_time" class="form-control" value="{{ request()->from_time }}">
                    </div>
                    <div class="filter-item">
                        <label for="to_time">To Time</label>
                        <input type="time" name="to_time" id="to_time" class="form-control" value="{{ request()->to_time }}">
                    </div>
                    <div class="filter-item">
                        <label for="sort">Sort</label>
                        <select name="sort" id="sort" class="form-control">
                            <option value="asc" {{ request()->sort != 'desc' ? 'selected' : '' }}>Ascending</option>
                            <option value="desc" {{ request()->sort == 'desc' ? 'selected' : '' }}>Descending</option>
                        </select>
                    </div>
                    <div class="filter-item">
                        <button type="submit" class="btn btn-primary mt-4">Filter</button>
                    </div>
                </div>
            </form>
        </div>
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
                        @if($draftUsers->count())
                            @foreach($draftUsers as $draft)
                                <tr>
                                    <td>{{ $draft->name }}</td>
                                    <td> {{ $draft->email }}</td>
                                    <td> {{ $draft->phone_number }}</td>
                                    <td> <div class="max-content-display">{{ $draft->pickup_location }} </div></td>
                                    <td> <div class="max-content-display">{{ $draft->dropoff_location }} </div></td>
                                    <td> £{{ $draft->total_price }}</td>
                                    <td> {{ formatDate($draft->booking_date) }}</td>
                                    <td> {{ foramtTime($draft->booking_time) }}</td>
                                    <td class="text-nowrap">
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="editDraft({{ $draft->id }})">
                                            Payment Link
                                         </button>
                                        <div class="btn-group" role="group" aria-label="Action Buttons">
                                            <a href="{{ route('admin.draft.delete', $draft->id) }}" class="btn btn-danger btn-sm mx-sm-1" onclick="return confirm('Are you sure to delete this draft booking?')"><i class="fas fa-trash"></i></a>
                                        </div>
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
                {{ $draftUsers->links() }}
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

                </div>
            </div>
        </div>

    </div>
</div>
</div>

<script>
    function editDraft(id) {
    var Debitcard = window.location.origin + '/client-booking-payment?payment_id=' + id;
    var paypal = window.location.origin + '/paypal/payment?id=' + id;
    document.getElementById("client_url").innerHTML = Debitcard;
                       
    
    
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

@section('styles')
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

    .filters-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .filter-item {
        flex: 0 0 150px;
    }

    .filter-item label {
        display: block;
        margin-bottom: 5px;
    }

    .filter-item input,
    .filter-item select {
        width: 100%;
    }

    .filter-item button {
        width: 100%;
    }

    @media (max-width: 350px) {
        .filter-item {
            flex: 1 1 100%;
        }

        .filter-item button {
            margin-top: 10px;
        }
    }
</style>