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

class BookingController extends Controller
{
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
            return redirect()->back()->with('success', 'Status updated successfully');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function wait($bookingId)
    {
        try {
            
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }


    // public function sendDriverWaitingEmail($user, $bookingDetails)
    // {
    //     $data = [
    //         'userName' => $user->name,
    //         'pickupLocation' => $bookingDetails->pickupLocation,
    //         'dropoffLocation' => $bookingDetails->dropoffLocation,
    //         'pickupDateTime' => $bookingDetails->pickupDateTime,
    //         'driverName' => $bookingDetails->driverName,
    //         'driverContact' => $bookingDetails->driverContact,
    //     ];

    //     Mail::to($user->email)->send(new DriverWaitingEmail($data));
    // }
}
