<?php

namespace App\Http\Controllers\driver;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Booking;
use App\Models\Status;
use App\Models\User;
use App\Services\EmailService;
use Carbon\Carbon;

class BookingController extends Controller
{
    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function index(Request $request)
    {
        try {
            $user = Auth::user();
            $bookings  = Booking::where('assigned_to', $user->id);
            $drivers = User::where('role', 'driver')->get();
            $statuses = Status::all();

            if (isset($request->from_date) && !empty($request->from_date)) {
                $bookings = $bookings->where('booking_date', '>=', $request->from_date);
            }

            if (isset($request->to_date) && !empty($request->to_date)) {
                $bookings = $bookings->where('booking_date', '<=', $request->to_date);
            }

            if (isset($request->from_time) && !empty($request->from_time)) {
                $bookings = $bookings->where('booking_time', '>=', $request->from_time);
            }

            if (isset($request->to_time) && !empty($request->to_time)) {
                $bookings = $bookings->where('booking_time', '<=', $request->to_time);
            }

            if (isset($request->status) && !empty($request->status)) {
                $bookings = $bookings->where('status_id', $request->status);
            }

            if (isset($request->sort) && !empty($request->sort)) {
                $bookings = $bookings->orderBy('booking_date', $request->sort)->orderBy('booking_time', $request->sort);
            } else {
                $bookings = $bookings->orderBy('booking_date', 'asc')->orderBy('booking_time', 'asc');
            }

            $bookings = $bookings->paginate(10);

            return view('driver.bookings.index', compact('bookings', 'drivers', 'statuses'));
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function updateStatus($bookingId, $statusId)
    {
        try {
            $booking = Booking::find($bookingId);
            $booking->status_id = $statusId;
            $booking->save();

            $statusDetails = getStatusDetails($statusId);

            $data = [
                'bookingId' => $booking->id,
                'userName' => $booking->name,
                'email' => $booking->email,
                'pickupLocation' => $booking->pickup_location,
                'dropoffLocation' => $booking->dropoff_location,
                'pickupDateTime' => Carbon::createFromFormat('Y-m-d H:i', $booking->booking_date . ' ' . $booking->booking_time)->format('l, F j, Y, g:i A'),
                'driverName' => $booking->driver->name,
                'driverContact' => $booking->driver->phone,
                'status' => $statusDetails->name,
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
