<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-4">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h3>Thank You for Choosing Our Service</h3>
            </div>
            <div class="card-body">
                <p>Dear {{ $userName }},</p>
                <p>Thank you for using our car pick-up and drop-off service. We hope you had a great experience. We would love to hear your feedback to help us improve our services.</p>
                <a href="{{ $feedbackLink }}" class="btn btn-primary">Leave Feedback</a>
                <p>Best Regards,<br>Bristol Cabwise</p>
            </div>
        </div>
    </div>
</body>
</html>