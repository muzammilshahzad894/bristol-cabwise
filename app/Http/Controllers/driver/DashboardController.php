<?php

namespace App\Http\Controllers\driver;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            return redirect()->route('driver.dashboard');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function dashboard()
    {
        try {
            $todayPendingBookings = Booking::where('status_id', 1)->where('assigned_to', auth()->user()->id)->whereDate('booking_date', date('Y-m-d'))->count();
            $todayInprogressBookings = Booking::whereIn('status_id', [2, 3, 4])->where('assigned_to', auth()->user()->id)->whereDate('booking_date', date('Y-m-d'))->count();
            $todayCompletedBookings = Booking::where('status_id', 5)->where('assigned_to', auth()->user()->id)->whereDate('booking_date', date('Y-m-d'))->count();
            $upcomingBookings = Booking::where('assigned_to', auth()->user()->id)->whereDate('booking_date', '>', date('Y-m-d'))->count();

            return view('driver.index', compact('todayPendingBookings', 'todayInprogressBookings', 'todayCompletedBookings', 'upcomingBookings'));
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
