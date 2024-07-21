<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Waiting</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #f4f4f4;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="20" cellspacing="0" border="0" style="background-color: #ffffff; border-radius: 8px; margin-top: 20px;">
                    <tr>
                        <td style="background-color: #000000; padding: 10px 20px; color: #ffffff; text-align: left; border-top-left-radius: 8px; border-top-right-radius: 8px;">
                            <img src="{{ asset('frontend-assets/img/logo-light.png') }}" alt="logo" style="height: 70px; width: 85px;" />
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #ef8e1c; padding: 20px; color: #ffffff;">
                            <h3 style="text-align: center; color: #ffffff;">Your Driver Has Arrived!</h3>
                            <p style="color: #ffffff;">Dear {{ $userName }},</p>
                            <p style="color: #ffffff;">We are pleased to inform you that your driver has arrived and is waiting for you at the designated pickup location. Here are the details of your ride:</p>
                            <table width="100%" cellpadding="10" cellspacing="0" border="1" bordercolor="#dddddd" style="border-collapse: collapse; color: #000000;">
                                <tr style="background-color: #000000; color: #ffffff;">
                                    <th style="padding: 10px; text-align: left; width: 150px;">Pickup Location</th>
                                    <td style="padding: 10px;">{{ $pickupLocation }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Dropoff Location</th>
                                    <td style="padding: 10px;">{{ $dropoffLocation }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Pickup Date & Time</th>
                                    <td style="padding: 10px;">{{ $pickupDateTime }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Driver Name</th>
                                    <td style="padding: 10px;">{{ $driverName }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Driver Contact</th>
                                    <td style="padding: 10px;">{{ $driverContact }}</td>
                                </tr>
                            </table>
                            <p style="margin-bottom: 0px; padding: 0px; color: #ffffff;">Please proceed to the pickup location at your earliest convenience. If you need to contact your driver, you can reach them at the provided contact number.</p>
                            <p style="margin: 0px; padding: 0px; color: #ffffff;">Thank you for choosing our service. We wish you a pleasant journey!</p>
                            <p style="margin-bottom: 0px; padding: 0px; color: #ffffff;">Best regards,</p>
                            <p style="margin: 0px; padding: 0px; color: #ffffff;"><strong>BristolCabwise Team</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #000000; color: #ffffff; text-align: center; padding: 10px; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;">
                            <p style="font-size: 12px; margin: 0;">&copy; {{ date('Y') }} BristolCabwise Service. All rights reserved.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
