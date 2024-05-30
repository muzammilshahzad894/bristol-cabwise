<!DOCTYPE html>
<html>
<head>
    <title>Test Email</title>
    <style>
        .header, .footer {
            width: 100%;
            text-align: center;
            background-color: #f8f9fa;
            padding: 10px 0;
        }
        .header img {
            display: block;
            margin: 0 auto;
        }
        .content {
            padding: 20px;
        }
        .footer {
            font-size: 12px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ asset('frontend/images/logo.png') }}" 
         alt="Logo" width="100">
    </div>
    <div class="content">
        <h1>This is a test email from Laravel countdown!</h1>
        <p>If you received this email, your SMTP configuration is correct.</p>
    </div>
    <div class="footer">
        <p>&copy; 2024 Your Company. All rights reserved.</p>
    </div>
</body>
</html>
