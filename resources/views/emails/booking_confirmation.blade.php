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
                <table class="table">
                    <tr>
                        <th>Pick-up Location</th>
                        <td>{{ $pickupLocation }}</td>
                    </tr>
                    <tr>
                        <th>Drop-off Location</th>
                        <td>{{ $dropoffLocation }}</td>
                    </tr>
                    <tr>
                        <th>Pick-up Date & Time</th>
                        <td>{{ $pickupDateTime }}</td>
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
