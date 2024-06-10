<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Waiting</title>
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
                    <h3 style="color: white;">Your Driver Has Arrived!</h3>
                </div>
                <p>Dear {{ $userName }},</p>
                <p>We are pleased to inform you that your driver has arrived and is waiting for you at the designated pickup location. Here are the details of your ride:</p>
                <table class="table table-bordered">
                    <tr>
                        <th>Pickup Location</th>
                        <td>{{ $pickupLocation }}</td>
                    </tr>
                    <tr>
                        <th>Dropoff Location</th>
                        <td>{{ $dropoffLocation }}</td>
                    </tr>
                    <tr>
                        <th>Pickup Date & Time</th>
                        <td>{{ $pickupDateTime }}</td>
                    </tr>
                    <tr>
                        <th>Driver Name</th>
                        <td>{{ $driverName }}</td>
                    </tr>
                    <tr>
                        <th>Driver Contact</th>
                        <td>{{ $driverContact }}</td>
                    </tr>
                </table>
                <p>Please proceed to the pickup location at your earliest convenience. If you need to contact your driver, you can reach them at the provided contact number.</p>
                <p>Thank you for choosing our service. We wish you a pleasant journey!</p>
                <p>Best regards,</p>
                <p><strong>BristolCabwise Team</strong></p>
            </div>
            <div class="footer">
                <p class="copyText">&copy; {{ date('Y') }} BristolCabwise Service. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>
