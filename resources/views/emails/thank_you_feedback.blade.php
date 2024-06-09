<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
      .btn-primary {
    color: #fff;
    background-color: black;
    border-color: #ef8e1c;
}
.card-body {
    background-color: #ef8e1c;
}
.btn-primary:hover {
    color: #fff;
    background-color: black;
    border-color: #eea236;
}
.header, .footer {
            width: 100%;
            text-align: left;
            background-color: #000000;
            padding: 10px 0;
        }

        .header img {
            display: block;
            justify-content: left;
            padding: 0 20px;
            height: 77px;
            width: 80px;
        }
        .content {
            padding: 20px;
            text-align: center;
        }
        .footer {
            font-size: 12px;
            color: #000000;
            padding-left: 20px;
        }
        .copyText{
            color: white;
        }
</style>
<body>
    <div class="container my-4">
        <div class="card">
            <div class="card-header text-white" style="background-color: black;display: flex;">
                <img src="{{ asset('frontend-assets/img/logo-light.png') }}" alt="logo"
                 style="height: 40px; width: 40px;" />
              
            </div>
            <div class="card-body">
                <div style="display: flex;justify-content: center;width: 100%;margin-bottom: 20px;">
                    <h3>Thank You for Choosing Our Service</h3>

                </div>
                <p>Dear {{ $userName }},</p>
                <p>Thank you for using our car pick-up and drop-off service. We hope you had a great experience. We would love to hear your feedback to help us improve our services.</p>
                <a href="{{ $feedbackLink }}" class="btn btn-primary">Leave Feedback</a>
           
            </div>
            <div class="footer">
                <p class="copyText">&copy; 2024 Your Company. All rights reserved.</p>
            </div>
        </div>
       
    </div>
 
</body>
</html>