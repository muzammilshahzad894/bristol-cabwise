<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
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
                            <h3 style="text-align: center; color: #ffffff;">Thank You for Contacting Bristol Cabwise</h3>
                            <p style="color: #ffffff;">Dear {{ $name }},</p>
                            <p style="color: #ffffff;">Thank you for getting in touch with Bristol Cabwise. We have received your message and will get back to you as soon as possible.</p>
                            <p>If your inquiry is urgent, please feel free to call us directly at *0117 332 2782*.</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #000000; color: #ffffff; text-align: center; padding: 10px; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;">
                            <p style="font-size: 12px; margin: 0;">Best regards</p>
                            <p style="font-size: 12px; margin: 0;">The Bristol Cabwise Team</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
