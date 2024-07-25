<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refund Status Change</title>
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
                            <h3 style="text-align: center; color: #ffffff;">Refund Request Update</h3>
                            <p style="color: #ffffff;">Dear {{ $userName }},</p>
                            <p style="color: #ffffff;">{{ $adminMessage }}</p>
                            @if(isset($amount))
                                <p style="color: #ffffff;">Amount: £{{ $amount }}</p>
                            @endif
                            <table width="100%" cellpadding="10" cellspacing="0" border="1" bordercolor="#dddddd" style="border-collapse: collapse; color: #000000;">
                                <tr style="background-color: #000000; color: #ffffff;">
                                    <th style="padding: 10px; text-align: left; width: 150px;">Service Type</th>
                                    <td style="padding: 10px;">{{ $serviceType }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Pickup Location</th>
                                    <td style="padding: 10px;">{{ $pickupLocation }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Drop Location</th>
                                    <td style="padding: 10px;">{{ $dropoffLocation }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Date & Time</th>
                                    <td style="padding: 10px;">{{ $dateAndTime }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Name</th>
                                    <td style="padding: 10px;">{{ $name }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Telephone</th>
                                    <td style="padding: 10px;">{{ $telephone }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Email</th>
                                    <td style="padding: 10px;">{{ $email }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">No of Passenger</th>
                                    <td style="padding: 10px;">{{ $no_of_passenger }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Child Seat</th>
                                    <td style="padding: 10px;">{{ $is_childseat }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Meet & Greet</th>
                                    <td style="padding: 10px;">{{ $is_meet_greet }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Suitcases</th>
                                    <td style="padding: 10px;">{{ $no_suit_case }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Hand Luggage</th>
                                    <td style="padding: 10px;">{{ $no_of_laugage }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Summary</th>
                                    <td style="padding: 10px;">{{ $summary }}</td>
                                </tr>
                            </table>
                            <h3 style="color: #000000;">Other Details:</h3>
                            <table width="100%" cellpadding="10" cellspacing="0" border="1" bordercolor="#dddddd" style="border-collapse: collapse; color: #000000;">
                                <tr style="background-color: #000000; color: #ffffff;">
                                    <th style="padding: 10px; text-align: left; width: 150px;">Name</th>
                                    <td style="padding: 10px;">{{ $other_name }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Telephone</th>
                                    <td style="padding: 10px;">{{ $other_phone_number }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Email</th>
                                    <td style="padding: 10px;">{{ $other_email }}</td>
                                </tr>
                            </table>
                            <h3 style="color: #000000;">Total Price:</h3>
                            <table width="100%" cellpadding="10" cellspacing="0" border="1" bordercolor="#dddddd" style="border-collapse: collapse; color: #000000;">
                                <tr style="background-color: #000000; color: #ffffff;">
                                    <th style="padding: 10px; text-align: left; width: 150px;">Fleet Price</th>
                                    <td style="padding: 10px;">£{{ $fleet_price }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Child Seat</th>
                                    <td style="padding: 10px;">{{ $is_childseat }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Meet & Greet</th>
                                    <td style="padding: 10px;">{{ $is_meet_greet }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Extra Luggage</th>
                                    <td style="padding: 10px;">{{ $is_extra_lauggage }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Coupon Discount</th>
                                    <td style="padding: 10px;">{{ $coupon_discount }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px; text-align: left; width: 150px;">Total Price</th>
                                    <td style="padding: 10px;">£{{ $fleet_price }}</td>
                                </tr>
                            </table>
                            <p style="margin-bottom: 0px; padding: 0px; color: #ffffff;">If you have any questions or need further assistance, please contact us.</p>
                            <p style="margin: 0px; padding: 0px; color: #ffffff;">Thank you for choosing our service!</p>
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
