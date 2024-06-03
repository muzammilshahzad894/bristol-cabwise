<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>Booking Confirmation</h3>
            </div>
            <div class="card-body">
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
                    <tr>
                        <th>Drop-off Date & Time</th>
                        <td>{{ $dropoffDateTime }}</td>
                    </tr>
                </table>
                <p>We look forward to serving you!</p>
                <p>Best Regards,<br>Bristol Cabwise</p>
            </div>
        </div>
    </div>
</body>
</html>
