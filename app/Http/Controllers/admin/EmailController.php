<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\EmailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class EmailController extends Controller
{
    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function index()
    {
        return view('admin.emails.index');
    }

    public function confirmBooking(Request $request)
    {
        try {
            $user = $this->user();
            $bookingDetails = $this->bookingDetails();

            $this->emailService->sendBookingConfirmation($user, $bookingDetails);

            return response()->json(['status' => 'success', 'message' => 'Booking confirmation email sent successfully'], 200);
        } catch (Exception $e) {
            Log::error('Error sending booking confirmation email: ' . $e->getMessage());
            return response()->json(['message' => 'Error sending booking confirmation email'], 500);
        }
    }

    public function cancelBooking(Request $request)
    {
        try {
            $user = $this->user();
            $bookingDetails = $this->bookingDetails();

            $this->emailService->sendBookingCancellation($user, $bookingDetails);

            return response()->json(['status' => 'success', 'message' => 'Booking cancellation email sent successfully'], 200);
        } catch (Exception $e) {
            Log::error('Error sending booking cancellation email: ' . $e->getMessage());
            return response()->json(['message' => 'Error sending booking cancellation email'], 500);
        }
    }

    public function reminderBooking(Request $request)
    {
        try {
            $user = $this->user();
            $bookingDetails = $this->bookingDetails();

            $this->emailService->sendBookingReminder($user, $bookingDetails);

            return response()->json(['status' => 'success', 'message' => 'Booking reminder email sent successfully'], 200);
        } catch (Exception $e) {
            Log::error('Error sending booking reminder email: ' . $e->getMessage());
            return response()->json(['message' => 'Error sending booking reminder email'], 500);
        }
    }

    public function feedback(Request $request)
    {
        try {
            $user = $this->user();
            $feedbackLink = 'http://example.com/feedback';

            $this->emailService->sendThankYouFeedback($user, $feedbackLink);

            return response()->json(['status' => 'success', 'message' => 'Thank you feedback email sent successfully'], 200);
        } catch (Exception $e) {
            Log::error('Error sending thank you feedback email: ' . $e->getMessage());
            return response()->json(['message' => 'Error sending thank you feedback email'], 500);
        }
    }

    public function user() {
        return (object) [
            'name' => 'John Doe',
            'email' => 'test@gmail.com',
        ];
    }

    public function bookingDetails() {
        $pickupDateTime = Carbon::createFromFormat('Y-m-d H:i', '2021-12-01 10:00:00');

        return (object) [
            'pickupLocation' => 'Airport',
            'dropoffLocation' => 'Hotel',
            'pickupDateTime' => $pickupDateTime->format('l, F j, Y, g:i A'),
        ];
    }
}
