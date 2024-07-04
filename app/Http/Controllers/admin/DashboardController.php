<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use App\Models\Fleet;
use App\Models\Service;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            return redirect()->route('admin.dashboard');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function dashboard()
    {
        try {
            $todayPendingBookings = Booking::where('status_id', 1)->whereDate('booking_date', date('Y-m-d'))->count();
            $todayInprogressBookings = Booking::whereIn('status_id', [2, 3, 4])->whereDate('booking_date', date('Y-m-d'))->count();
            $todayCompletedBookings = Booking::where('status_id', 5)->whereDate('booking_date', date('Y-m-d'))->count();
            $upcomingBookings = Booking::whereDate('booking_date', '>', date('Y-m-d'))->count();
            // get total completed bookings count
            $totalCompletedBookings = Booking::where('status_id', 5)->count();
            // get amount of all completed bookings
            $totalSales = Booking::where('status_id', 5)->sum('total_price');
            // get total completed bookings count for each month, if no booking for a month then 0

            // Step 1: Create a list of all months
            $months = collect(range(1, 12));

            // Step 2: Get the count of completed bookings for each month
            $completedBookings = Booking::where('status_id', 5)
                ->selectRaw('count(*) as total, MONTH(booking_date) as month')
                ->groupBy('month')
                ->pluck('total', 'month');

            // Step 3: Merge with the months list to ensure each month is included
            $monthlyCompletedBookings = $months->map(function ($month) use ($completedBookings) {
                return $completedBookings->get($month, 0);
            })->values()->toArray();

            // $monthlyCompletedBookings = [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 1];

            return view('admin.index', compact('todayPendingBookings', 'todayInprogressBookings', 'todayCompletedBookings', 'upcomingBookings', 'totalCompletedBookings', 'totalSales', 'monthlyCompletedBookings'));
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function profile()
    {
        try {
            $user = User::find(auth()->user()->id);
            return view('admin.profile', compact('user'));
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function profileUpdate(UpdateProfileRequest $request)
    {
        try {
            $user = User::find(auth()->user()->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password ? bcrypt($request->password) : $user->password;
            $user->save();
            return redirect()->back()->with('success', 'Profile updated successfully');
        } catch (Exception $e) {
            Log::error(__CLASS__ . '::' . __LINE__ . ' Exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
