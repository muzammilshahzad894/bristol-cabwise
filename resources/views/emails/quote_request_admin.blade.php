<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ride Status Change</title>
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
                            <h3 style="text-align: center; color: #ffffff;">New Quote Request Submitted – [{{ $userName }}]</h3>
                            <p style="color: #ffffff;">Dear Admin,</p>
                            <p style="color: #ffffff;">A new quote request has been submitted by a potential customer:</p>
                            <table width="100%" cellpadding="10" cellspacing="0" border="1" bordercolor="#dddddd" style="border-collapse: collapse; color: #000000;">
                                <tr style="background-color: #000000; color: #ffffff;">
                                    <th style="padding: 10px; text-align: left; width: 150px;">Customer Name</th>
                                    <td style="padding: 10px;">{{ $userName }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Pickup Location</th>
                                    <td style="padding: 10px;">{{ $pickup }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Dropoff Location</th>
                                    <td style="padding: 10px;">{{ $dropoff }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Pickup Date & Time</th>
                                    <td style="padding: 10px;">{{ $dateTime }}</td>
                                </tr>
                                @php
                                    $fleetDetails = App\Models\Fleet::where('id', $fleetId)->first();
                                @endphp
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Fleet</th>
                                    <td style="padding: 10px;">{{ @$fleetDetails->name }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Email</th>
                                    <td style="padding: 10px;">{{ $email }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Phone</th>
                                    <td style="padding: 10px;">{{ $phone }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Pickup Postal Code</th>
                                    <td style="padding: 10px;">{{ $pickupPostalCode }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Dropoff Postal Code</th>
                                    <td style="padding: 10px;">{{ $dropoffPostalCode }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Pickup City</th>
                                    <td style="padding: 10px;">{{ $pickupCity }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Dropoff City</th>
                                    <td style="padding: 10px;">{{ $dropoffCity }}</td>
                                </tr>
                            </table>
                            <p style="margin-bottom: 0px; padding: 0px; color: #ffffff;">If you have any urgent questions, feel free to contact us at *0117 332 2782*.</p>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ride Status Change</title>
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
                            <h3 style="text-align: center; color: #ffffff;">New Quote Request Submitted – [{{ $userName }}]</h3>
                            <p style="color: #ffffff;">Dear Admin,</p>
                            <p style="color: #ffffff;">A new quote request has been submitted by a potential customer:</p>
                            <table width="100%" cellpadding="10" cellspacing="0" border="1" bordercolor="#dddddd" style="border-collapse: collapse; color: #000000;">
                                <tr style="background-color: #000000; color: #ffffff;">
                                    <th style="padding: 10px; text-align: left; width: 150px;">Customer Name</th>
                                    <td style="padding: 10px;">{{ $userName }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Pickup Location</th>
                                    <td style="padding: 10px;">{{ $pickup }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Pickup City</th>
                                    <td style="padding: 10px;">{{ $pickupCity }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Pickup Postal Code</th>
                                    <td style="padding: 10px;">{{ $pickupPostalCode }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Pickup Date & Time</th>
                                    <td style="padding: 10px;">{{ $dateTime }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Dropoff Location</th>
                                    <td style="padding: 10px;">{{ $dropoff }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Dropoff City</th>
                                    <td style="padding: 10px;">{{ $dropoffCity }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Dropoff Postal Code</th>
                                    <td style="padding: 10px;">{{ $dropoffPostalCode }}</td>
                                </tr>
                                @php
                                    $fleetDetails = App\Models\Fleet::where('id', $fleetId)->first();
                                @endphp
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Fleet</th>
                                    <td style="padding: 10px;">{{ @$fleetDetails->name }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Email</th>
                                    <td style="padding: 10px;">{{ $email }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Phone</th>
                                    <td style="padding: 10px;">{{ $phone }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Comment</th>
                                    <td style="padding: 10px;">{{ $comment ? $comment : '-' }}</td>
                                </tr>
                            </table>
                            <p style="margin-bottom: 0px; padding: 0px; color: #ffffff;">Please follow up with the customer if necessary. For more details, call us at *0117 332 2782*.</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #000000; color: #ffffff; text-align: center; padding: 10px; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;">
                            <p style="font-size: 12px; margin: 0;">Best regards</p>
                            <p style="font-size: 12px; margin: 0;">Bristol Cabwise Admin Team</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
