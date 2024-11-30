<?php

namespace App\Services;

use App\Mail\BookingConfirmationMail;
use App\Mail\BookingConfirmationAdminMail;
use App\Mail\BookingCancellationMail;
use App\Mail\BookingCancellationAdminMail;
use App\Mail\BookingReminderMail;
use App\Mail\ThankYouFeedbackMail;
use App\Mail\RefundMail;
use App\Mail\RefundMailAdmin;
use App\Mail\DriverWaitingEmail;
use App\Mail\BookingStatusMail;
use App\Mail\BookingStatusAdminMail;
use App\Mail\RefundStatusMail;
use App\Mail\RefundStatusAdminMail;
use App\Mail\CustomEmail;
use App\Mail\DriverAssignMail;
use App\Mail\ContactEmail;
use App\Mail\ContactEmailAdmin;
use App\Mail\QuoteRequest;
use App\Mail\QuoteRequestAdmin;
use App\Models\EmailSetting;
use App\Models\EmailContentSetting;
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
            'bookingId' => $bookingDetails->bookingId,
            'userName' => $bookingDetails->name,
            'serviceType' => $bookingDetails->serviceType,
            'pickupLocation' => $bookingDetails->pickupLocation,
            'via_locations' => $bookingDetails->via_locations,
            'dropoffLocation' => $bookingDetails->dropoffLocation,
            'dateAndTime' => $bookingDetails->dateAndTime,
            'is_return' => $bookingDetails->is_return,
            'return_dateAndTime' => $bookingDetails->return_dateAndTime,
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
        
        $emailContent = EmailContentSetting::where('title', 'booking-confirmation')->first();

        $emailAddresses = [$bookingDetails->email];
        Mail::to($emailAddresses)->send(new BookingConfirmationMail($data, $emailContent));
        
        // In EmailSetting all the emails are stored that will receive the booking-confirmation email
        $emailSetting = EmailSetting::where('receiving_emails', 'like', '%booking-confirmation%')->get();
        $emailContentAdmin = EmailContentSetting::where('title', 'booking-confirmation-admin')->first();
        if ($emailSetting->count() > 0) {
            foreach ($emailSetting as $email) {
                $dataForAdmin = $data;
                $dataForAdmin['adminName'] = $email->user_name;
                
                $adminEmailAddresses = $email->user_email;
                Mail::to($adminEmailAddresses)->send(new BookingConfirmationAdminMail($dataForAdmin, $emailContentAdmin));
            }
        }
    }

    public function sendBookingCancellation($user, $bookingDetails)
    {
        $extraLaugage = "";
        if($bookingDetails->is_extra_lauggage == 1) {
            $extraLaugage = "6";
        }
        $data = [
            'bookingId' => $bookingDetails->bookingId,
            'userName' => $bookingDetails->name,
            'serviceType' => $bookingDetails->serviceType,
            'pickupLocation' => $bookingDetails->pickupLocation,
            'via_locations' => $bookingDetails->via_locations,
            'dropoffLocation' => $bookingDetails->dropoffLocation,
            'dateAndTime' => $bookingDetails->dateAndTime,
            'is_return' => $bookingDetails->is_return,
            'return_dateAndTime' => $bookingDetails->return_dateAndTime,
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
        
        $emailContent = EmailContentSetting::where('title', 'booking-cancellation')->first();
        
        $emailAddresses = [$user->email];
        Mail::to($emailAddresses)->send(new BookingCancellationMail($data, $emailContent));

        // In EmailSetting all the emails are stored that will receive the booking-cancellation email
        $emailSetting = EmailSetting::where('receiving_emails', 'like', '%booking-cancellation%')->get();
        $emailContentAdmin = EmailContentSetting::where('title', 'booking-cancellation-admin')->first();
        if ($emailSetting->count() > 0) {
            foreach ($emailSetting as $email) {
                $dataForAdmin = $data;
                $dataForAdmin['adminName'] = $email->user_name;
                
                $adminEmailAddresses = $email->user_email;
                Mail::to($adminEmailAddresses)->send(new BookingCancellationAdminMail($dataForAdmin, $emailContentAdmin));
            }
        }
    }

    public function sendDriverAssign($driver, $bookingDetails)
    {
        $extraLaugage = "";
        if($bookingDetails->is_extra_lauggage == 1) {
            $extraLaugage = "6";
        }
        $data = [
            'userName' => $driver->name,
            'serviceType' => $bookingDetails->serviceType,
            'pickupLocation' => $bookingDetails->pickupLocation,
            'via_locations' => $bookingDetails->via_locations,
            'dropoffLocation' => $bookingDetails->dropoffLocation,
            'dateAndTime' => $bookingDetails->dateAndTime,
            'is_return' => $bookingDetails->is_return,
            'return_dateAndTime' => $bookingDetails->return_dateAndTime,
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
            'is_extra_lauggage' => $extraLaugage,
        ];
        
        $emailContent = EmailContentSetting::where('title', 'driver-assign')->first();
        Mail::to($driver->email)->send(new DriverAssignMail($data, $emailContent));
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

        $emailAddresses = [$user->email];
        // In EmailSetting all the emails are stored that will receive the booking-reminder email
        $emailSetting = EmailSetting::where('receiving_emails', 'like', '%booking-reminder%')->pluck('user_email');
        if ($emailSetting->count() > 0) {
            $emailAddresses = array_merge($emailAddresses, $emailSetting->toArray());
        }

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
            'bookingId' => $feedbackLink->bookingId,
            'userName' => $feedbackLink->userName,
            'email' => $feedbackLink->email,
            'accountNumber' => $feedbackLink->accountNumber,
            'bankName' => $feedbackLink->bankName,
            'refundAmount' => $feedbackLink->refundAmount,
            'sortCode' => $feedbackLink->sortCode,
            'reason' => $feedbackLink->reason,
            'bookingId' => $feedbackLink->bookingId,
        ];

        $emailContent = EmailContentSetting::where('title', 'refund-request')->first();
        $emailAddresses = [$user->email];
        Mail::to($emailAddresses)->send(new RefundMail($data, $emailContent));
        
        // In EmailSetting all the emails are stored that will receive the refund-request email
        $emailSetting = EmailSetting::where('receiving_emails', 'like', '%refund-request%')->get();
        $emailContentAdmin = EmailContentSetting::where('title', 'refund-request-admin')->first();
        if ($emailSetting->count() > 0) {
            foreach ($emailSetting as $email) {
                $dataForAdmin = $data;
                $dataForAdmin['adminName'] = $email->user_name;
                
                $adminEmailAddresses = $email->user_email;
                Mail::to($adminEmailAddresses)->send(new RefundMailAdmin($dataForAdmin, $emailContentAdmin));
            }
        }
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

        $emailContent = EmailContentSetting::where('title', 'driver-waiting')->first();
        Mail::to($emailAddresses)->send(new DriverWaitingEmail($data, $emailContent));
    }

    public function sendBookingStatusEmail($bookingDetails)
    {
        $data = [
            'bookingId' => $bookingDetails['bookingId'],
            'userName' => $bookingDetails['userName'],
            'pickupLocation' => $bookingDetails['pickupLocation'],
            'dropoffLocation' => $bookingDetails['dropoffLocation'],
            'pickupDateTime' => $bookingDetails['pickupDateTime'],
            'driverName' => $bookingDetails['driverName'],
            'driverContact' => $bookingDetails['driverContact'],
            'status' => $bookingDetails['status'],
        ];

        $emailContent = EmailContentSetting::where('title', 'booking-status-update')->first();
        $emailAddresses = [$bookingDetails['email']];
        Mail::to($emailAddresses)->send(new BookingStatusMail($data, $emailContent));
        
        // In EmailSetting all the emails are stored that will receive the booking-status-change email
        $emailSetting = EmailSetting::where('receiving_emails', 'like', '%booking-status-change%')->get();
        $emailContentAdmin = EmailContentSetting::where('title', 'booking-status-update-admin')->first();
        if ($emailSetting->count() > 0) {
            foreach ($emailSetting as $email) {
                $dataForAdmin = $data;
                $dataForAdmin['adminName'] = $email->user_name;
                
                $adminEmailAddresses = $email->user_email;
                Mail::to($adminEmailAddresses)->send(new BookingStatusAdminMail($dataForAdmin, $emailContentAdmin));
            }
        }
    }

    public function sendRefundStatusEmail($emailData)
    {
        $extraLaugage = "";
        if($emailData['is_extra_lauggage'] == 1) {
            $extraLaugage = "6";
        }
        $data = [
            'bookingId' => $emailData['bookingId'],
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

        $emailAddresses = [$emailData['user_email']];
        Mail::to($emailAddresses)->send(new RefundStatusMail($data));
        
        // In EmailSetting all the emails are stored that will receive the refund-status-change email
        $emailSetting = EmailSetting::where('receiving_emails', 'like', '%refund-status-change%')->get();
        if ($emailSetting->count() > 0) {
            foreach ($emailSetting as $email) {
                $dataForAdmin = $data;
                $dataForAdmin['adminName'] = $email->user_name;
                
                $adminEmailAddresses = $email->user_email;
                Mail::to($adminEmailAddresses)->send(new RefundStatusAdminMail($dataForAdmin));
            }
        }
    }

    public function sendCustomEmail($emailData)
    {
        $data = [
            'userName' => $emailData['userName'],
            'email' => $emailData['email'],
            'subject' => $emailData['subject'],
            'customMessage' => $emailData['message'],
        ];

        Mail::to($data['email'])->send(new CustomEmail($data));
    }
    
    public function sendContactEmail($emailData)
    {
        $data = [
            'name' => $emailData['name'],
            'email' => $emailData['email'],
            'phone' => $emailData['phone'],
            'subject' => $emailData['subject'],
            'customerMessage' => $emailData['message'],
        ];
        
        Mail::to($data['email'])->send(new ContactEmail($data));
        
        if(setting('admin_email')) {
            Mail::to(setting('admin_email'))->send(new ContactEmailAdmin($data));
        }
    }
    
    public function sendQuoteRequest($emailData)
    {
        $data = [
            'pickup' => $emailData['pickup'],
            'dropoff' => $emailData['dropoff'],
            'dateTime' => $emailData['dateTime'],
            'fleetId' => $emailData['fleetId'],
            'userName' => $emailData['userName'],
            'email' => $emailData['email'],
            'phone' => $emailData['phone'],
            'pickupPostalCode' => $emailData['pickupPostalCode'],
            'dropoffPostalCode' => $emailData['dropoffPostalCode'],
            'pickupCity' => $emailData['pickupCity'],
            'dropoffCity' => $emailData['dropoffCity'],
            'returnJourney' => $emailData['returnJourney'],
            'comment' => $emailData['comment'],
        ];
        
        Mail::to(setting('admin_email'))->send(new QuoteRequest($data));
        
        if(setting('admin_email')) {
            Mail::to(setting('admin_email'))->send(new QuoteRequestAdmin($data));
        }
    }
}
