<?php

namespace App\Services;

use App\Mail\BookingConfirmationMail;
use App\Mail\BookingCancellationMail;
use App\Mail\BookingReminderMail;
use App\Mail\ThankYouFeedbackMail;
use App\Mail\RefundMail;
use App\Mail\DriverWaitingEmail;
use App\Mail\BookingStatusMail;
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

        Mail::to($user->email)->send(new RefundMail($data));
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

        Mail::to($bookingDetails['email'])->send(new DriverWaitingEmail($data));
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

        Mail::to($bookingDetails['email'])->send(new BookingStatusMail($data));
    }
}
