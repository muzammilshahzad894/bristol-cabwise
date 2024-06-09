<?php

namespace App\Services;

use App\Mail\BookingConfirmationMail;
use App\Mail\BookingCancellationMail;
use App\Mail\BookingReminderMail;
use App\Mail\ThankYouFeedbackMail;
use App\Mail\RefundMail;
use Illuminate\Support\Facades\Mail;

class EmailService
{
    public function sendBookingConfirmation($user, $bookingDetails)
    {
        $data = [
            'userName' => $user->name,
            'pickupLocation' => $bookingDetails->pickupLocation,
            'dropoffLocation' => $bookingDetails->dropoffLocation,
            'pickupDateTime' => $bookingDetails->pickupDateTime,
            'dropoffDateTime' => $bookingDetails->dropoffDateTime,
        ];

        Mail::to($user->email)->send(new BookingConfirmationMail($data));
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

        Mail::to($user->email)->send(new BookingCancellationMail($data));
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

        Mail::to($user->email)->send(new BookingReminderMail($data));
    }

    public function sendThankYouFeedback($user, $feedbackLink)
    {
        $data = [
            'userName' => $user->name,
            'feedbackLink' => $feedbackLink,
        ];

        Mail::to($user->email)->send(new ThankYouFeedbackMail($data));
    }
    public function sendRefundRequest($user, $feedbackLink )
    {
        $data = [
            'userName' => $feedbackLink->name,
            'email' => $feedbackLink->email,
            'accountNumber' => $feedbackLink->account_number,
            'bankName' => $feedbackLink->bank_name,
            'refundAmount' => $feedbackLink->refund_amount,
            'reason' => $feedbackLink->reason,
            'bookingId' => $feedbackLink->booking_id,
        ];
        Mail::to($user->email)->send(new RefundMail($data));
    }
}
