<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .bg-danger {
        background-color: black !important;
    }
    .card-body {
        background-color: #ef8e1c;
    }
    th {
        color: white;
    }
    td {
        color: black;
        font-weight: 500;
    }
    .footer {
        font-size: 12px;
        color: white;
        padding-left: 20px;
    }
    .header, .footer {
        width: 100%;
        text-align: left;
        background-color: #000000;
        padding: 10px 0;
    }
</style>
<body>
    <div class="container my-4">
        <div class="card">
            <div class="card-header bg-danger text-white">
                <img src="{{ asset('frontend-assets/img/logo-light.png') }}" alt="logo" style="height: 40px; width: 40px;" />
            </div>
            <div class="card-body">
                <div style="display: flex; justify-content: center; width: 100%; margin-bottom: 20px;">
                    <h3 style="color: white;">Booking Confirmation</h3>
                </div>
                <p>Dear {{ $userName }},</p>
                <p>Thank you for booking a car pick-up and drop-off service with us. Here are your booking details:</p>
                <h3 class="color_theme">Summary:</h3>
                <table class="table">
                    <tr>
                        <th>serviceType</th>
                        <td>{{ $serviceType }}</td>
                    </tr>
                    <tr>
                        <th>Pickup Location</th>
                        <td>{{ $pickupLocation }}</td>
                    </tr>
                    <tr>
                        <th>Drop Location</th>
                        <td>{{ $dropoffLocation }}</td>
                    </tr>
                    <tr>
                        <th>Date & Time</th>
                        <td>{{ $dateAndTime }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $name }}</td>
                    </tr>
                    <tr>
                        <th>Telephone</th>
                        <td>{{ $telephone }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $email }}</td>
                    </tr>
                    <tr>
                        <th>No of passenger</th>
                        <td>{{ $no_of_passenger }}</td>
                    </tr>
                    <tr>
                        <th>Child Seat</th>
                        <td>{{ $is_childseat }}</td>
                    </tr>
                    <tr>
                        <th>Meet & Greet</th>
                        <td>{{ $is_meet_greet }}</td>
                    </tr>
                    <tr>
                        <th>SuitCases</th>
                        <td>{{ $no_suit_case }}</td>
                    </tr>
                    <tr>
                        <th>Hand Luggage</th>
                        <td>{{ $no_of_laugage }}</td>
                    </tr>
                    <tr>
                        <th>Summary</th>
                        <td>{{ $summary }}</td>
                    </tr>
                </table>
                <h3 class="color_theme">Other Details:</h3>
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <td>{{ $other_name }}</td>
                    </tr>
                    <tr>
                        <th>Telephone</th>
                        <td>{{ $other_phone_number }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $other_email }}</td>
                    </tr>
                </table>
                <h3 class="color_theme">Total Price:</h3>
                <table class="table">
                    <tr>
                        <th>Fleet Price</th>
                        <td>£{{ $fleet_price }}</td>
                    </tr>
                    <tr>
                        <th>Child Seat</th>
                        <td>{{ $is_childseat }}</td>
                    </tr>
                    <tr>
                        <th>Meet & Greet</th>
                        <td>{{ $is_meet_greet }}</td>
                    </tr>
                    <tr>
                        <th>Extra Luggage</th>
                        <td>{{ $is_extra_lauggage }}</td>
                    </tr>
                    <tr>
                        <th>Coupon Discount</th>
                        <td>{{ $coupon_discount }}</td>
                    </tr>
                    <tr>
                        <th>Total Price</th>
                        <td>£{{ $fleet_price }}</td>
                    </tr>
                </table>
                <p>We will process your request and notify you once it has been completed. If you have any questions, please contact our support team at 07533225970.</p>
            </div>
            <div class="footer">
                <p class="copyText">&copy; {{ date('Y') }} BristolCabwise Service. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>