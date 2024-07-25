<?php

namespace App\Services;

use App\Mail\BookingConfirmationMail;
use App\Mail\BookingCancellationMail;
use App\Mail\BookingReminderMail;
use App\Mail\ThankYouFeedbackMail;
use App\Mail\RefundMail;
use App\Mail\DriverWaitingEmail;
use App\Mail\BookingStatusMail;
use App\Mail\RefundStatusMail;
use Illuminate\Support\Facades\Mail;

class EmailService
{
    public function sendBookingConfirmation($user, $bookingDetails)
    {
        $extraLaugage = "";
        if($bookingDetails->is_extra_lauggage == 1) {
            $extraLaugage = "6";
        }
        $data = [
            'userName' => $user->name,
            'serviceType' => $bookingDetails->serviceType,
            'pickupLocation' => $bookingDetails->pickupLocation,
            'dropoffLocation' => $bookingDetails->dropoffLocation,
            'dateAndTime' => $bookingDetails->dateAndTime,
            'name' => $bookingDetails->name,
            'telephone' => $bookingDetails->telephone,
            'email' => $bookingDetails->email,
            'no_of_passenger' => $bookingDetails->no_of_passenger,
            'is_childseat' => $bookingDetails->is_childseat,
            'is_meet_greet' => $bookingDetails->is_meet_greet,
            'no_suit_case' => $bookingDetails->no_suit_case,
            'no_of_laugage' => $bookingDetails->no_of_laugage,
            'summary' => $bookingDetails->summary,
            'other_name' => $bookingDetails->other_name,
            'other_phone_number' => $bookingDetails->other_phone_number,
            'other_email' => $bookingDetails->other_email,
            'fleet_price' => $bookingDetails->fleet_price,
            'is_extra_lauggage' => $extraLaugage,
            'coupon_discount' => $bookingDetails->coupon_discount,
        ];

        $emailAddresses = [
            $user->email,
            setting('admin_email'),
        ];

        Mail::to($emailAddresses)->send(new BookingConfirmationMail($data));
    }

    public function sendBookingCancellation($user, $bookingDetails)
    {
        $data = [
            'userName' => $user->name,
            'pickupLocation' => $bookingDetails->pickupLocation,
            'dropoffLocation' => $bookingDetails->dropoffLocation,
            'pickupDateTime' => $bookingDetails->pickupDateTime,
            'dropoffDateTime' => $bookingDetails->dropoffDateTime,
        ];

        $emailAddresses = [
            $user->email,
            setting('admin_email'),
        ];

        Mail::to($emailAddresses)->send(new BookingCancellationMail($data));
    }

    public function sendBookingReminder($user, $bookingDetails)
    {
        $data = [
            'userName' => $user->name,
            'pickupLocation' => $bookingDetails->pickupLocation,
            'dropoffLocation' => $bookingDetails->dropoffLocation,
            'pickupDateTime' => $bookingDetails->pickupDateTime,
            'dropoffDateTime' => $bookingDetails->dropoffDateTime,
        ];

        $emailAddresses = [
            $user->email,
            setting('admin_email'),
        ];

        Mail::to($emailAddresses)->send(new BookingReminderMail($data));
    }

    public function sendThankYouFeedback($user, $feedbackLink)
    {
        $data = [
            'userName' => $user->name,
            'feedbackLink' => $feedbackLink,
        ];

        Mail::to($user->email)->send(new ThankYouFeedbackMail($data));
    }

    public function sendRefundRequest($user, $feedbackLink)
    {
        $data = [
            'userName' => $feedbackLink->userName,
            'email' => $feedbackLink->email,
            'accountNumber' => $feedbackLink->accountNumber,
            'bankName' => $feedbackLink->bankName,
            'refundAmount' => $feedbackLink->refundAmount,
            'reason' => $feedbackLink->reason,
            'bookingId' => $feedbackLink->bookingId,
        ];

        $emailAddresses = [
            $user->email,
            setting('admin_email'),
        ];

        Mail::to($emailAddresses)->send(new RefundMail($data));
    }

    public function sendDriverWaitingEmail($bookingDetails)
    {
        $data = [
            'userName' => $bookingDetails['userName'],
            'pickupLocation' => $bookingDetails['pickupLocation'],
            'dropoffLocation' => $bookingDetails['dropoffLocation'],
            'pickupDateTime' => $bookingDetails['pickupDateTime'],
            'driverName' => $bookingDetails['driverName'],
            'driverContact' => $bookingDetails['driverContact'],
        ];

        $emailAddresses = [
            $bookingDetails['email'],
            setting('admin_email'),
        ];

        Mail::to($emailAddresses)->send(new DriverWaitingEmail($data));
    }

    public function sendBookingStatusEmail($bookingDetails)
    {
        $data = [
            'userName' => $bookingDetails['userName'],
            'pickupLocation' => $bookingDetails['pickupLocation'],
            'dropoffLocation' => $bookingDetails['dropoffLocation'],
            'pickupDateTime' => $bookingDetails['pickupDateTime'],
            'driverName' => $bookingDetails['driverName'],
            'driverContact' => $bookingDetails['driverContact'],
            'status' => $bookingDetails['status'],
        ];

        $emailAddresses = [
            $bookingDetails['email'],
            setting('admin_email'),
        ];

        Mail::to($emailAddresses)->send(new BookingStatusMail($data));
    }

    public function sendRefundStatusEmail($emailData)
    {
        $extraLaugage = "";
        if($emailData['is_extra_lauggage'] == 1) {
            $extraLaugage = "6";
        }
        $data = [
            'adminMessage' => $emailData['admin_message'],
            'user_email' => $emailData['user_email'],
            'userName' => $emailData['user_name'],
            'serviceType' => $emailData['serviceType'],
            'pickupLocation' => $emailData['pickupLocation'],
            'dropoffLocation' => $emailData['dropoffLocation'],
            'dateAndTime' => $emailData['dateAndTime'],
            'name' => $emailData['name'],
            'telephone' => $emailData['telephone'],
            'email' => $emailData['email'],
            'no_of_passenger' => $emailData['no_of_passenger'],
            'is_childseat' => $emailData['is_childseat'],
            'is_meet_greet' => $emailData['is_meet_greet'],
            'no_suit_case' => $emailData['no_suit_case'],
            'no_of_laugage' => $emailData['no_of_laugage'],
            'summary' => $emailData['summary'],
            'other_name' => $emailData['other_name'],
            'other_phone_number' => $emailData['other_phone_number'],
            'other_email' => $emailData['other_email'],
            'fleet_price' => $emailData['fleet_price'],
            'is_extra_lauggage' => $extraLaugage,
            'coupon_discount' => $emailData['coupon_discount'],
        ];
        if(isset($emailData['amount'])) {
            $data['amount'] = $emailData['amount'];
        }

        Mail::to($emailData['user_email'])->send(new RefundStatusMail($data));
    }
}
