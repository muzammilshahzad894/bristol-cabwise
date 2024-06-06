<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\EmailService;
use App\Models\Booking;
use Carbon\Carbon;

class SendBookingReminders extends Command
{
    protected $signature = 'bookings:send-reminders';
    protected $description = 'Send reminder emails for upcoming bookings';
    
    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        parent::__construct();
        $this->emailService = $emailService;
    }

    public function handle()
    {
        $user = $this->user();
        $bookingDetails = $this->bookingDetails();

        $this->emailService->sendBookingReminder($user, $bookingDetails);

        // // Define the reminder time window (e.g., 1 hour before the booking time)
        // $reminderTimeWindowStart = Carbon::now();
        // $reminderTimeWindowEnd = Carbon::now()->addHour();

        // // Find bookings within the reminder time window
        // $bookings = Booking::whereBetween('booking_time', [$reminderTimeWindowStart, $reminderTimeWindowEnd])
        //                    ->where('reminder_sent', false)
        //                    ->get();

        // foreach ($bookings as $booking) {
        //     // Send reminder email
        //     $this->emailService->sendBookingReminder($booking->user, $booking);

        //     // Mark the booking as reminder sent
        //     $booking->reminder_sent = true;
        //     $booking->save();
        // }

        $this->info('Reminder emails sent successfully.');
    }

    public function user() {
        return (object) [
            'name' => 'John Doe',
            'email' => 'test@gmail.com',
        ];
    }

    public function bookingDetails() {
        return (object) [
            'pickupLocation' => 'Airport',
            'dropoffLocation' => 'Hotel',
            'pickupDateTime' => '2021-12-01 10:00:00',
            'dropoffDateTime' => '2021-12-01 12:00:00',
        ];
    }
}