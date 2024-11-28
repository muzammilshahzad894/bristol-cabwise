<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailContentSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('email_content_settings')->insert([
            [
                'title' => 'booking-confirmation',
                'subject' => 'Your Booking with Bristol Cabwise is Confirmed!',
                'introductory_message' => 'Thank you for choosing Bristol Cabwise for your upcoming journey! We are pleased to confirm your booking:',
                'note' => '<p>If you have any questions or need to make changes to your booking, please don\'t hesitate to contact us at <strong>*0117 332 2782*</strong>.</p>
                <p>Wishing you a safe and pleasant journey!</p>
                <p>
                    To view our terms and conditions, please click on the link given below:
                </p>
                <p>
                    <a href="https://bristolcabwise.com/term-condition" target="_blank">Terms and Conditions</a>
                </p>',
                'closing_text' => '<p>Best regards</p>
                <p>Bristol Cabwise Team</p>',
                'display_order' => 1,
            ],
            [
                'title' => 'booking-confirmation-admin',
                'subject' => 'New Booking Confirmed',
                'introductory_message' => 'A new booking has been successfully confirmed. Below are the details:',
                'note' => '<p>Please ensure that all arrangements are in place for this booking. For any inquiries, you can reach us at *0117 332 2782*.</p>',
                'closing_text' => '<p>Best regards</p>
                <p>Bristol Cabwise Team</p>',
                'display_order' => 2,
            ],
            [
                'title' => 'booking-cancellation',
                'subject' => 'Booking Alert',
                'introductory_message' => 'We regret to inform you that your booking has been cancelled. Here are the details:',
                'note' => '<p>If you have any questions, please contact our support team at 07533225970</p>',
                'closing_text' => '<p>Best regards</p>
                <p>Bristol Cabwise Team</p>',
                'display_order' => 3,
            ],
            [
                'title' => 'booking-cancellation-admin',
                'subject' => 'Booking Alert',
                'introductory_message' => 'We regret to inform you that the booking has been cancelled. Here are the details:',
                'note' => '<p>If you have any questions, please contact our support team at 07533225970</p>',
                'closing_text' => '<p>Best regards</p>
                <p>Bristol Cabwise Team</p>',
                'display_order' => 4,
            ],
            [
                'title' => 'booking-reminder',
                'subject' => 'Booking Reminder',
                'introductory_message' => 'This is a friendly reminder for your upcoming car pick-up and drop-off service. Here are the details:',
                'note' => '<p>If you have any questions, please contact our support team at 07533225970.</p>',
                'closing_text' => '<p>Best regards</p>
                <p>Bristol Cabwise Team</p>',
                'display_order' => 5,
            ],
            [
                'title' => 'booking-status-update',
                'subject' => 'Update: Your Bristol Cabwise Booking Status',
                'introductory_message' => 'We wanted to inform you that the status of your booking with Bristol Cabwise has changed.',
                'note' => 'Please reach out if you have any questions. You can contact us at *0117 332 2782*.',
                'closing_text' => '<p>Best regards</p>
                <p>Bristol Cabwise Team</p>',
                'display_order' => 6,
            ],
            [
                'title' => 'booking-status-update-admin',
                'subject' => 'Booking Status Updated',
                'introductory_message' => 'The status of the following booking has been updated:',
                'note' => 'Please reach out if you have any questions. You can contact us at *0117 332 2782*.',
                'closing_text' => '<p>Best regards</p>
                <p>Bristol Cabwise Team</p>',
                'display_order' => 7,
            ],
            [
                'title' => 'driver-assign',
                'subject' => 'Ride Assigned',
                'introductory_message' => 'You have been assigned a driver for your booking. Please find the details below:',
                'note' => '<p>If you have any questions, please contact our support team at 07533225970.</p>',
                'closing_text' => '<p>Best regards</p>
                <p>Bristol Cabwise Team</p>',
                'display_order' => 8,
            ],
            [
                'title' => 'driver-waiting',
                'subject' => 'Your Driver Has Arrived!',
                'introductory_message' => 'We are pleased to inform you that your driver has arrived and is waiting for you at the designated pickup location. Here are the details of your ride:',
                'note' => 'Please process the request as soon as possible. For further details, call us at *0117 332 2782*.',
                'closing_text' => '<p>Best regards</p>
                <p>Bristol Cabwise Team</p>',
                'display_order' => 9,
            ],
            [
                'title' => 'refund-request',
                'subject' => 'Refund Request Received for Your Bristol Cabwise Booking',
                'introductory_message' => '<p>Our team is currently processing your request. You will be updated on the status shortly. For any questions, please contact us at *0117 332 2782*.</p>
                <p>Thank you for your patience.</p>',
                'note' => '',
                'closing_text' => '<p>Best regards</p>
                <p>Bristol Cabwise Team</p>',
                'display_order' => 10,
            ],
            [
                'title' => 'refund-request-admin',
                'subject' => 'New Refund Request',
                'introductory_message' => 'A refund request has been submitted for the following booking:',
                'note' => 'Please process the request as soon as possible. For further details, call us at *0117 332 2782*.',
                'closing_text' => '<p>Best regards</p>
                <p>Bristol Cabwise Team</p>',
                'display_order' => 11,
            ],
            [
                'title' => 'refund-status-update',
                'subject' => 'Update: Your Bristol Cabwise Refund Status',
                'introductory_message' => 'The status of your refund request for the following booking has been updated:',
                'note' => 'Please reach out if you have any questions. You can contact us at *0117 332 2782*.',
                'closing_text' => '<p>Best regards</p>
                <p>Bristol Cabwise Team</p>',
                'display_order' => 12,
            ],
            [
                'title' => 'refund-status-update-admin',
                'subject' => 'Refund Status Updated',
                'introductory_message' => 'The status of the refund request for the following booking has been updated:',
                'note' => 'Please reach out if you have any questions. You can contact us at *0117 332 2782*.',
                'closing_text' => '<p>Best regards</p>
                <p>Bristol Cabwise Team</p>',
                'display_order' => 13,
            ],
            [
                'title' => 'quote-request',
                'subject' => 'Your Quote from Bristol Cabwise',
                'introductory_message' => 'We would like to inform you that we have received your quote request. Our team will contact you soon with the details.',
                'note' => 'Please reach out if you have any questions. You can contact us at *0117 332 2782*.',
                'closing_text' => '<p>Best regards</p>
                <p>Bristol Cabwise Team</p>',
                'display_order' => 14,
            ],
            [
                'title' => 'quote-request-admin',
                'subject' => 'New Quote Request Submitted',
                'introductory_message' => 'A new quote request has been submitted by a potential customer:',
                'note' => 'Please reach out if you have any questions. You can contact us at *0117 332 2782*.',
                'closing_text' => '<p>Best regards</p>
                <p>Bristol Cabwise Team</p>',
                'display_order' => 15,
            ],
        ]);
    }
}
