<?php

namespace App\Http\Controllers\driver;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Booking;
use App\Services\EmailService;
use Carbon\Carbon;

class BookingController extends Controller
{
    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function index()
    {
        try {
            $user = Auth::user();
            $bookings  = Booking::where('assigned_to', $user->id)->paginate(10);
            return view('driver.bookings.index', compact('bookings'));
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function updateStatus($bookingId, $status)
    {
        try {
            $booking = Booking::find($bookingId);
            $booking->ride_status = $status;
            $booking->save();

            $data = [
                'userName' => $booking->name,
                'email' => $booking->email,
                'pickupLocation' => $booking->pickup_location,
                'dropoffLocation' => $booking->dropoff_location,
                'pickupDateTime' => Carbon::createFromFormat('Y-m-d H:i', $booking->booking_date . ' ' . $booking->booking_time)->format('l, F j, Y, g:i A'),
                'driverName' => $booking->driver->name,
                'driverContact' => $booking->driver->phone,
                'status' => $status,
            ];

            $this->emailService->sendBookingStatusEmail($data);
            return redirect()->back()->with('success', 'Status updated successfully');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function wait($bookingId)
    {
        try {
            $booking = Booking::find($bookingId);

            $pickupDateTime = Carbon::createFromFormat('Y-m-d H:i', $booking->booking_date . ' ' . $booking->booking_time);

            $data = [
                'userName' => $booking->name,
                'email' => $booking->email,
                'pickupLocation' => $booking->pickup_location,
                'dropoffLocation' => $booking->dropoff_location,
                'pickupDateTime' => $pickupDateTime->format('l, F j, Y, g:i A'),
                'driverName' => $booking->driver->name,
                'driverContact' => $booking->driver->phone,
            ];

            $this->emailService->sendDriverWaitingEmail($data);
            return redirect()->back()->with('success', 'Email sent successfully');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
