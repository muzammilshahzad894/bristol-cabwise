<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refund Request Received</title>
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
                <img src="{{ asset('frontend-assets/img/logo-light.png') }}" alt="logo"
                style="height: 40px; width: 40px;" />
            </div>
            <div class="card-body">
                <div style="display: flex; justify-content: center; width: 100%; margin-bottom: 20px;">
                    <h3 style="color: white;">Refund Request</h3>
                </div>
                <p>Dear Admin,</p>
                <p>We have received your refund request. Here are the details:</p>
                <table class="table">
                 
                    <tr>
                        <th>User name</th>
                        <td>{{ $userName }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $email }}</td>
                    </tr>
                    <tr>
                        <th>Account Number</th>
                        <td>{{ $accountNumber }}</td>
                    </tr>
                    <tr>
                        <th>Bank Name</th>
                        <td>{{ $bankName }}</td>
                    </tr>
                    <tr>
                        <th>Reason</th>
                        <td>{{ $reason }}</td>
                    </tr>
                  
                </table>
            </div>
            <div class="footer">
                <p class="copyText">&copy; {{ date('Y') }} BristolCabwise Service. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>
    