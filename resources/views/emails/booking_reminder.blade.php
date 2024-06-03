<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Reminder</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-4">
        <div class="card">
            <div class="card-header bg-warning text-white">
                <h3>Booking Reminder</h3>
            </div>
            <div class="card-body">
                <p>Dear {{ $userName }},</p>
                <p>This is a friendly reminder for your upcoming car pick-up and drop-off service. Here are the details:</p>
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
