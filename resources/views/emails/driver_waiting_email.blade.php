<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Waiting</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f8f9fa; padding: 20px; font-family: Arial, sans-serif;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-header bg-success text-white text-center">
                        <h2>Your Driver Has Arrived!</h2>
                    </div>
                    <div class="card-body">
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
                        <p><strong>Car Pick and Drop Service Team</strong></p>
                    </div>
                    <div class="card-footer text-center">
                        <small>&copy; {{ date('Y') }} Car Pick and Drop Service. All rights reserved.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
